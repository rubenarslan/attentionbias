<h1>Training</h1>
<div id="trial_outer">
<div id="trial">
<button id="begin_session" class="btn btn-large btn-primary">Klicken Sie hier, um mit dem Training anzufangen.</a>
</div>
</div>
<?php $this->start('script'); ?>
<script src="<?php echo $this->webroot; ?>js/jquery.fullscreen.js"></script>
<script type="text/javascript">
//<![CDATA[
/* TODO:
 * test images am anfang
 * periodically sync
 * feedback
*/
function repeatArray(arr, count) {
  var ln = arr.length;
  var b = new Array();
  for(i=0; i<count; i++) {
    b.push(arr[i%ln]);
  }
  return b;
}

function shuffle ( myArray ) {
  var i = myArray.length;
  if ( i == 0 ) return false;
  while ( --i ) {
     var j = Math.floor( Math.random() * ( i + 1 ) );
     var tempi = myArray[i];
     var tempj = myArray[j];
     myArray[i] = tempj;
     myArray[j] = tempi;
   }
 return myArray;
}
var imgpath = "<?php echo $this->webroot; ?>" + "img/training/";
var condition = <?php echo "'learn'"; # todo: set condition ?>;
var fixation_duration = 500;
var img_duration = 4000; // fixme: 500
var key_top = 'O'; // have to be uppercase
var key_bottom = 'V';
var ocd_imgs = [1, 2, 3];
var neutral_imgs = [4, 5, 6];

/* BLOCKS */
var ocd_block1 = repeatArray(shuffle(ocd_imgs), ocd_imgs.length *2 );
var neutral_block1 = repeatArray(shuffle(neutral_imgs), ocd_imgs.length *2 ); // shuffle them once, repeat
var ocd_top_block1 = shuffle(repeatArray([false,true], ocd_imgs.length)); // make array of positions, shuffle
ocd_top_block1 = ocd_top_block1.concat( $(ocd_top_block1).map(function(m) { return !m; }) );  // inverse and concatenate
var ocd_block2 = repeatArray(shuffle(ocd_imgs), ocd_imgs.length *2 );
var neutral_block2 = repeatArray(shuffle(neutral_imgs), ocd_imgs.length *2 );
var ocd_top_block2 = shuffle(repeatArray([false,true], ocd_imgs.length));
ocd_top_block2 = ocd_top_block2.concat( $(ocd_top_block2).map(function(m) { return !m; }) );

var ocd_sequence = ocd_block1.concat(ocd_block2);
var neutral_sequence = neutral_block1.concat(neutral_block2);
var ocd_top_sequence = ocd_top_block1.concat(ocd_top_block2);

var number_of_trials = ocd_sequence.length;


window.performance = window.performance || {};
performance.now = (function() {
  return performance.now       ||
         performance.mozNow    ||
         performance.msNow     ||
         performance.oNow      ||
         performance.webkitNow ||
         function() { return new Date().getTime(); };
})();

window.Trial = {
	'fixation': $('<div class="fixation">+</div>'),
	'img' : $('<div class="trial_images"><img class="top" src="' + imgpath + 'x.jpg"><br><img class="bottom" src="'+ imgpath + 'x.jpg"></div>'),
	'probe': $('<div class="probe">x</div>'),
	'CurrentlyDisplayed': 'nothing',
};

Trial.begin = (function() { // start a trial
	console.log('Trial.begin');
	Session.db.trials[Trial.current].began_unixtime = new Date().getTime();
	Trial.TrialBegan = performance.now();
	Trial.showFixation();
});

Trial.showFixation = (function() { 
	console.log('Trial.showFixation');
	
	$('#trial').empty();
	$('#trial').append(Trial.fixation);
	Trial.CurrentlyDisplayed = 'fixation';
	
	Session.waitForNextStep = setTimeout(Trial.showImages, fixation_duration);
});

Trial.showImages = (function() { 
	console.log('Trial.showImages');
	
	$('#trial').empty();
	if(Session.db.trials[Trial.current].ocd_on_top) {
		var toppath = imgpath + Session.db.trials[Trial.current].ocd_image_id + ".jpg";
		var botpath = imgpath + Session.db.trials[Trial.current].neutral_image_id + ".jpg";
	} else {
		var botpath = imgpath + Session.db.trials[Trial.current].ocd_image_id + ".jpg";
		var toppath = imgpath + Session.db.trials[Trial.current].neutral_image_id + ".jpg";
	}
	Trial.img.children('.top').attr('src', toppath);
	Trial.img.children('.bottom').attr('src', botpath);
	$('#trial').empty();
	$('#trial').append(Trial.img);
	Trial.CurrentlyDisplayed = 'images';
	
	Session.waitForNextStep = setTimeout(Trial.showProbe, img_duration);
});

Trial.showProbe = (function() {
	console.log('Trial.showProbe');
	
	$('#trial').empty();
	Trial.probe.toggleClass('probe_on_top',Session.db.trials[Trial.current].probe_on_top); // is the probe on top or not?
	$('#trial').append(Trial.probe);
	Trial.ProbeShown = performance.now();
	Trial.CurrentlyDisplayed = 'probe';
	$(window).one('keydown',Trial.response);
});

Trial.response = (function(e) { // log valid responses
	console.log('Trial.response');
	
	var valid_response_time = performance.now(); // same time for both time indices
	var key = String.fromCharCode( e.keyCode ? e.keyCode : e.which );
	key = key.toUpperCase();
	if(key == key_top || key == key_bottom) { // if it's valid input
		Session.db.trials[Trial.current].first_reaction_time_since_trial_began = valid_response_time - Trial.TrialBegan;
		Session.db.trials[Trial.current].first_reaction_time_since_probe_shown = valid_response_time - Trial.ProbeShown;
		Session.db.trials[Trial.current].first_valid_response = (key == key_top); // bool: pressed top, false = pressed bottom
		$(window).off('keydown',Trial.response); // just one valid response per trial
		Session.nextTrial(); // trigger
	}
});

window.Reaction = {};
Reaction.logReaction = (function(e) { // simply log all keypresses during the session
	console.log('Reaction.logReaction');
	
	var valid_response_time = performance.now(); // same time for both time indices
	var key = String.fromCharCode( e.keyCode ? e.keyCode : e.which );
	console.log(key);
	key = key.toUpperCase();
	Session.db.trials[Trial.current].reactions.push({
		'response': key,
		'time_since_session_began': valid_response_time - Session.SessionBegan,
		'time_since_trial_began': valid_response_time - Trial.TrialBegan,
		'time_since_last_probe_shown': valid_response_time - Trial.ProbeShown,
		'currently_displayed': Trial.CurrentlyDisplayed
	});
});


window.Session = {
	'db': { // object where we hierarchically store all the session-related db
		'loaded': new Date(),
		'loaded_unixtime': new Date().getTime(),
		'trials': [] ,// array for all trials in this session
	},
	'interrupted': false,
	'sequence_ocd': ocd_sequence, // todo: shuffle, decide which is on top.
	'sequence_neutral': neutral_sequence,
	'sequence_ocd_top': ocd_top_sequence,
	'number_of_trials': number_of_trials,
	'condition': condition,
};

Session.preload = function(begin) {
	console.log('Session.preload');
	
	preload_these = ocd_imgs.concat(neutral_imgs);
	var len = preload_these.length;
    $(preload_these).each(function(index,img){
		if(begin && index == len-1) // if session should begin and this is the last image
			$('<img id="last_image"/>').attr('src', imgpath + img + ".jpg").one('load',Session.begin); // after preloading begin session
        else 
			$('<img/>')[0].src = imgpath + img + ".jpg";
    });
};


Session.begin = (function() {
	console.log('Session.begin');
	
	if(Session.interrupted == true) return;
	
	console.log(Session.interrupted);
	Session.db.began = new Date();
	Session.db.began_unixtime = new Date().getTime();
	Session.SessionBegan = performance.now();
	Session.instructions = $('<div class="session_instructions">Bitte klicken Sie auf den Knopf, wenn Sie anfangen wollen.<br>Drücken Sie "o", wenn der Punkt oben erscheint, und "v", wenn der Punkt unten	erscheint.</div>');
	$('#trial').empty();
	$('#trial').append(Session.instructions);
	Session.waitForNextStep = setTimeout(function () {
		$('#trial').children('.session_instructions').append($('<br><button id="begin_trial" class="btn btn btn-success">Es kann losgehen!</button>').one('click',Session.nextTrial));
	}, 6000); // wait for full-screen note to disappear
});

Session.nextTrial = (function() {
	console.log('Session.nextTrial');
	$(window).one('keydown',Reaction.logReaction); // log key strokes for the whole session, only attached once
	
	if(Session.interrupted == true) return;
	
	if(Session.number_of_trials == Session.db.trials.length) // last trial
		Session.end();
	else {
		Trial.current = Session.db.trials.length;
		Session.db.trials.push( {
			'ocd_image_id': Session.sequence_ocd[Trial.current],
			'neutral_image_id': Session.sequence_neutral[Trial.current],
			'ocd_on_top': Session.sequence_ocd_top[Trial.current],
			'reactions': [],
			});
			
		if(condition == 'bias_assessment')
			Session.db.trials[Trial.current].probe_on_top = !round(Math.random()); // ! to ensure it's a bool
		else if (condition == 'bias_manipulation')
			Session.db.trials[Trial.current].probe_on_top = ! Session.db.trials[Trial.current].ocd_on_top;
		else if(condition == 'bias_control')
			Session.db.trials[Trial.current].probe_on_top = !round(Math.random());
		
		Trial.begin();
	}
});

Session.end = (function() {
	console.log('Session.end');
	
	Session.instructions2 = $('<div class="session_instructions">Vielen Dank für Ihre heutige Teilnahme.</div>');
	$('#trial').empty();
	$('#trial').append(Session.instructions2);
	$(document).off("fullscreenchange", Session.interrupt); // remove error message
	$('#trial_outer').fullScreen(false); // leave fullscreen
	$(window).off('keydown',Reaction.logReaction); // log key strokes for the whole session
	
});

Session.interrupt = (function() { // on leaving fullscreen
	console.log('Session.interrupt');
	
	if( $('#trial_outer').fullScreen() == false) { // if they have left fullscreen
		clearTimeout(Session.waitForNextStep); // don't do next step
		$(window).off('keydown'); // don't log reactions and valid responses anymore
		Session.interrupted = true;
		
		Session.interruption = $('<div class="session_interruption">Training unterbrochen. Bitte drücken Sie während der Sitzung nicht "escape" um den Vollbildschirmmodus zu verlassen.</div>');
		$('#trial').empty();
		$('#trial').append(Session.interruption);
	}
});

Session.fullscreenFail = (function() { // on leaving fullscreen
	console.log('Session.fullscreenFail');
	
	Session.interrupt();
	Session.fail = $('<div class="session_fail">Ihr Web-Browser scheint den Vollbildmodus nicht zu unterstützen. Ein alternativer Browser ist z.B. <a href="http://getfirefox.com">Firefox</a>.</div>');
	$('#trial').empty();
	$('#trial').append(Session.fail);
});

$(document).ready(function () {
	Session.preload(false); // call it on domready to load
	
	$(document).one("fullscreenerror", Session.fullscreenFail);
	$(document).one("fullscreenchange", Session.interrupt); // only does something if fullscreen was left
	
	$('#begin_session').click(function () {
		if($('#trial_outer').fullScreen() != null) { // supports full screen
			$('#trial_outer').fullScreen(true);
			
			Session.preload(true); // call it again, once button was clicked, this time make it run session afterwards
			
		} else { // different browser needed
			Session.fullscreenFail();
		}
		
	});
	
});
//]]>
</script>
<?php $this->end(); ?>