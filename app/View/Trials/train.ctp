<h1>Training</h1>
<p>Sie benötigen einen aktuellen Browser, um teilnehmen zu können.<br>Wir unterstützen Firefox, Chrome und Safari. Opera und Internet Explorer haben leider nicht alle nötigen Features.</p>
<div id="trial_outer">
	<div id="trial">
		<div class="session_begin">
			<button id="begin_session" class="btn btn-large btn-primary">Klicken Sie hier, um mit dem Training anzufangen.</button>
		</div>
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


/*
--------- CONFIGURATION
 */
var imgpath = "<?php echo $this->webroot; ?>" + "img/training/";
var condition = <?php 
	echo "'bias_manipulation'"; 
	# todo: set condition 
?>;
var session_number = 1; // todo: dynamic
var fixation_duration = 500; // how long fixations are displayed
var img_duration = 500; // how long images are displayed. fixme: 500
var mistake_message_duration = 2000;

// keys for user input "probe was at the top", ".. down". use keys that are usually located in the same place for your target group (i.e. not y/z, umlauts, commas brackets, arrow keys etc.), and note that this uses the keydown event, not the keypress event (which is better at understanding the keyboard mapping)
var key_top = 'O'; // have to be uppercase here (user input is recognised either way)
var key_bottom = 'V';

// image ids, that also double as file names (could easily be changed)
var ocd_imgs = [1, 2, 3];
var neutral_imgs = [4, 5, 6];

/*
---- INSTRUCTIONS, localisation
*/
var session_tryout_instructions = 'Gleich erscheint ein Knopf, bitte klicken Sie darauf oder drücken Sie eine beliebige Taste, wenn Sie bereit sind, mit zehn Übungsaufgaben anzufangen.<br><br>In diesen zehn Übungsaufgaben wird Ihnen noch angezeigt, wenn Sie einen Fehler machen, später nicht mehr.<br><br>Drücken Sie "' + key_top + '" / "' + key_top.toLowerCase() + '", wenn der Punkt oben erscheint, und "' + key_bottom + '" / "' + key_bottom.toLowerCase() + '", wenn der Punkt unten erscheint.';

var session_test_instructions = 'Bitte klicken Sie auf den Knopf oder drücken Sie eine beliebige Taste, wenn Sie bereit sind mit dem richtigen Training anzufangen.<br><br>Drücken Sie "' + key_top + '" / "' + key_top.toLowerCase() + '", wenn der Punkt oben erscheint, und "' + key_bottom + '" / "' + key_bottom.toLowerCase() + '", wenn der Punkt unten erscheint.';

var mistake_message = 'Falsche Antwort.';


var session_end_message = 'Vielen Dank für Ihre heutige Teilnahme.';
var session_interruption = 'Training unterbrochen. Bitte drücken Sie während der Sitzung nicht "escape" um den Vollbildschirmmodus zu verlassen.';
var begin_tryout_button = 'Test-Training starten!';
var begin_test_button = 'Training starten!';
var session_fullscreenFail = 'Ihr Web-Browser scheint den Vollbildmodus nicht zu unterstützen. Ein alternativer Browser ist z.B. <a href="http://getfirefox.com">Firefox</a>.';
var session_featureFail = 'Ihr Web-Browser unterstützt nötige Funktionen nciht. Ein alternativer Browser ist z.B. <a href="http://getfirefox.com">Firefox</a>.';

/* BLOCKS */
var ocd_block1 = repeatArray(shuffle(ocd_imgs), ocd_imgs.length *2 );
var neutral_block1 = repeatArray(shuffle(neutral_imgs), ocd_imgs.length *2 ); // shuffle them once, repeat
var ocd_top_block1 = shuffle(repeatArray([false,true], ocd_imgs.length)); // make array of positions, shuffle
ocd_top_block1 = ocd_top_block1.concat( $.makeArray( $(ocd_top_block1).map(function(m) { return !m; }) ) );  // inverse and concatenate
var ocd_block2 = repeatArray(shuffle(ocd_imgs), ocd_imgs.length *2 );
var neutral_block2 = repeatArray(shuffle(neutral_imgs), ocd_imgs.length *2 );
var ocd_top_block2 = shuffle(repeatArray([false,true], ocd_imgs.length));
ocd_top_block2 = ocd_top_block2.concat( $.makeArray( $(ocd_top_block2).map(function(m) { return !m; }) ) );

var ocd_sequence = ocd_block1.concat(ocd_block2);
var neutral_sequence = neutral_block1.concat(neutral_block2);
var ocd_top_sequence = ocd_top_block1.concat(ocd_top_block2);

var number_of_trials = ocd_sequence.length; // includes test trials, so increase it accordingly
var number_of_test_trials = 10;

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
	'fixation': $('<div style="display:none" class="fixation">+</div>'),
//	'img' : $('<div class="trial_images"><img class="top" src="' + imgpath + 'x.jpg"><br><img class="bottom" src="'+ imgpath + 'x.jpg"></div>'),
	'probe': $('<div style="display:none" class="probe">x</div>'),
	'mistake_message': $('<div style="display:none" class="mistake_message">' + mistake_message + '</div>'),
	'CurrentlyDisplayed': 'nothing',
};

Trial.begin = (function() { // start a trial
	console.log('Trial.begin');
	Session.db.trials[Trial.current].began_unixtime = new Date().getTime();
	Trial.TrialBegan = performance.now();
	$('#trial div.session_instructions').remove();
	$('#trial').append(Trial.fixation,Trial.probe,Trial.mistake_message);
	Trial.showFixation();
});

Trial.showFixation = (function() { 
	console.log('Trial.showFixation');
	
	$('#trial div.fixation').show();
	Trial.CurrentlyDisplayed = 'fixation';
	
	Session.waitForNextStep = setTimeout(Trial.showImages, fixation_duration);
});

Trial.showImages = (function() { 
	console.log('Trial.showImages');
	
	$('#trial div.fixation').hide();
	$('#trial_images_'+Trial.current).show();

	Trial.CurrentlyDisplayed = 'images';
	
	Session.waitForNextStep = setTimeout(Trial.showProbe, img_duration);
});

Trial.showProbe = (function() {
	console.log('Trial.showProbe');
	
	$('#trial_images_'+Trial.current).hide();
							// is the probe on top or not?
	$('#trial div.probe').toggleClass('probe_on_top',Session.db.trials[Trial.current].probe_on_top).show();

	Trial.ProbeShown = performance.now();
	Trial.CurrentlyDisplayed = 'probe';
	$(window).on('keydown',Trial.response);
});

Trial.response = (function(e) { // log valid responses
	console.log('Trial.response');
	
	var valid_response_time = performance.now(); // same time for both time indices
	var key = String.fromCharCode( e.which );
	key = key.toUpperCase();
	if(key == key_top || key == key_bottom) { // if it's valid input
		Session.db.trials[Trial.current].first_reaction_time_since_trial_began = valid_response_time - Trial.TrialBegan;
		Session.db.trials[Trial.current].first_reaction_time_since_probe_shown = valid_response_time - Trial.ProbeShown;
		Session.db.trials[Trial.current].first_valid_response = (key == key_top); // bool: pressed top, false = pressed bottom
		$(window).off('keydown',Trial.response); // just one valid response per trial
		
		$('#trial div.probe').hide();
		
		
		if(Trial.current > number_of_test_trials) // for non test trials
			Trial.end();
		else {
			if( Session.db.trials[Trial.current].probe_on_top !=
				Session.db.trials[Trial.current].first_valid_response)
				Trial.showMistakeMessage(); // incorrect trials get reprimanded
			else {
				Trial.end();
			}
		}
	}
});


Trial.showMistakeMessage = (function() { // log valid responses
	$('#trial div.mistake_message').show();
	Session.waitForNextStep = setTimeout(function() {
		$('#trial div.mistake_message').hide();
		Trial.end()
	}, mistake_message_duration);
});

Trial.end = (function() { // log valid responses
	if(Trial.current != number_of_test_trials)
		Session.nextTrial(); // trigger
	else
		Session.showTestInstructions();
});


window.Reaction = {};
Reaction.logReaction = (function(e) { // simply log all keypresses during the session
	console.log('Reaction.logReaction');
	// fixme: fullscreened elm in window with navbars isn't what we want, but it doesn't affect the fullscreen API 
	
	var valid_response_time = performance.now(); // same time for both time indices
	if(e.which > 3) key = String.fromCharCode( e.which );
	else key = e.which;
	
	console.log(key);
	
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
		'number': session_number,
		'condition': condition,
		'loaded': new Date(),
		'loaded_unixtime': new Date().getTime(),
		'browser': navigator.userAgent,
		'window_width': $(window).width(),
		'document_width': $(document).width(), // should be identical in full screen
		'window_height': $(window).height(),
		'document_height': $(document).height(),
		'trials': [] ,// array for all trials in this session
	},
	'interrupted': false,
	'sequence_ocd': ocd_sequence,
	'sequence_neutral': neutral_sequence,
	'sequence_ocd_top': ocd_top_sequence,
	'number_of_trials': number_of_trials,
	'imgs': [],
};

Session.preLoad = (function() {
	console.log('Session.preLoad');
	
	preload_these = ocd_imgs.concat(neutral_imgs);
	var len = preload_these.length;
    $(preload_these).each(function(index,img){
		$('<img/>')[0].src = imgpath + img + ".jpg";
    });
});

Session.preRender = (function() {
	console.log('Session.preRender');
	
	for(i=0; i < Session.number_of_trials; i++) {
		var toppath = imgpath + (Session.sequence_ocd_top[i] ?  Session.sequence_ocd[i] : Session.sequence_neutral[i] ) + ".jpg";
		var botpath = imgpath + (Session.sequence_ocd_top[i] ?  Session.sequence_neutral[i] : Session.sequence_ocd[i] ) + ".jpg";
		var imgdiv = $('<div class="trial_images" id="trial_images_'+i+'" style="display:none"><img class="top" src="' + toppath + '"><br></div>');
		if(Session.number_of_trials-1 == i)
			var botimg = $('<img class="bottom" src="'+ botpath + '">').one('load',Session.showTryoutInstructions);
		else
			var botimg = $('<img class="bottom" src="'+ botpath + '">');
		Session.imgs[i] = imgdiv.append(botimg);
		$('#trial').append(Session.imgs);
	}
});

Session.showTryoutInstructions = (function() {
	console.log('Session.showTryoutInstructions');
	
	if(Session.interrupted == true) return;
	
	Session.db.began = new Date();
	Session.db.began_unixtime = new Date().getTime();
	Session.SessionBegan = performance.now();
	Session.instructions = $('<div class="session_instructions">'+ session_tryout_instructions +'</div>');
	
	$('#trial div.session_begin').remove();
	
	$('#trial').append(Session.instructions);
	
	Session.waitForNextStep = setTimeout(function () {
		$('#trial').children('.session_instructions').append($('<br><button id="begin_trial" class="btn btn btn-success">' + begin_tryout_button +'</button>').one('click',Session.beginTryout));
		$(document).one('keydown',Session.beginTryout);
	}, 6000); // wait for full-screen note to disappear
});

Session.beginTryout = (function() {
	console.log('Session.beginTryout');	
	$(window).on('keypress click',Reaction.logReaction); // log key strokes for the whole session, only attached once
	Session.nextTrial();
});

Session.showTestInstructions = (function() {
	console.log('Session.showTestInstructions');
	
	if(Session.interrupted == true) return;
	
	Session.instructions = $('<div class="session_instructions">'+ session_test_instructions +'</div>');
	
	$('#trial div.session_begin').remove();
	
	$('#trial').append(Session.instructions);
	
	
	$('#trial').children('.session_instructions').append($('<br><button id="begin_trial" class="btn btn btn-success">' + begin_test_button +'</button>').one('click',Session.beginTest));
	$(document).one('keydown',Session.beginTest);	
});

Session.beginTest = (function() {
	console.log('Session.begin');	
	Session.nextTrial();
});

Session.nextTrial = (function() {
	console.log('Session.nextTrial');
	
	if(Session.interrupted == true) return;
	
	if(Session.number_of_trials == Session.db.trials.length) // last trial
		Session.end();
	else {
		Trial.current = Session.db.trials.length;
		Session.db.trials.push( {
			'number': Trial.current,
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

	$(document).off("fullscreenchange"); // remove error message	
	Session.end_message = $('<div class="session_end_message">' + session_end_message +'</div>');
	$('#trial').empty();
	$('#trial').append(Session.end_message);
	$('#trial_outer').fullScreen(false); // leave fullscreen
	$(window).off('keypress click',Reaction.logReaction); // stop log key strokes for the whole session
	
});

Session.interrupt = (function() { // on leaving fullscreen
	console.log('Session.interrupt');
	clearTimeout(Session.waitForNextStep); // don't do next step
	$(window).off('keydown'); // don't log valid responses anymore
	$(window).off('keypress click',Reaction.logReaction); // stop log key strokes for the whole session
	
	Session.interrupted = true;
	
	Session.interruption = $('<div class="session_interruption">' + session_interruption + '</div>');
	$('#trial').empty();
	$('#trial').append(Session.interruption);
});

Session.fullscreenFail = (function() { // on leaving fullscreen
	console.log('Session.fullscreenFail');
	
	Session.interrupt();
	Session.fail = $('<div class="session_fail">' + session_fullscreenFail + '</div>');
	$('#trial').empty();
	$('#trial').append(Session.fail);
});

Session.featureFail = (function() { // on leaving fullscreen
	console.log('Session.featureFail');
	
	Session.interrupt();
	Session.fail = $('<div class="session_fail">' + session_featureFail + '</div>');
	$('#trial').empty();
	$('#trial').append(Session.fail);
});

$(document).ready(function () {
	Session.preLoad(); // call it on domready to load
	
	$(document).one("fullscreenerror", Session.fullscreenFail);
	$(document).on("fullscreenchange", function () {
		if( $('#trial_outer').fullScreen() == false || $('#trial_outer').fullScreen() == null) { // if they have left fullscreenchange
			Session.interrupt();
		}
	}); // only does something if fullscreen was left
	
	$('#begin_session').click(function () {
		if(!($.support.ajax && $.support.boxModel && $.support.opacity)) {
			Session.featureFail();
		}
		else if($('#trial_outer').fullScreen() != null) { // supports full screen
			$('#trial_outer').fullScreen(true);
			
			Session.preRender(); // pre render once button was clicked, runs session afterwards
			
		} else { // different browser needed
			Session.fullscreenFail();
		}
		
	});
	
});
//]]>
</script>
<?php $this->end(); ?>