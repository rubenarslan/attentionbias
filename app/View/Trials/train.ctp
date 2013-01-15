<h1>Reaktionen auf Bilder</h1>
<p>Herzlich Willkommen bei unserer Studie „Reaktionen auf Bilder“.<br>
Vielen Dank, dass Sie teilnehmen wollen!<br>
Bitte klicken Sie auf „Weiter“, um zu den Instruktionen zu gelangen.</p>

<div id="session_outer">
	<div id="session">
		<div class="session_begin">
			Sie benötigen einen aktuellen Browser, um teilnehmen zu können.<br>
			Wir unterstützen Firefox, Chrome und Safari. Opera und Internet Explorer haben leider nicht alle nötigen Features.<br>
			Sie benötigen Javascript, bzw. müssen JavaScript in Ihren Browser-Einstellungen erlauben.
		</div>
	</div>
	<div id="trial"></div>
</div>
<?php $this->start('script'); ?>
<script src="<?php echo $this->webroot; ?>js/jquery.fullscreen.js"></script>
<script type="text/javascript">
//<![CDATA[
/* TODO:
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
var img_duration = 500;
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
var session_first_instructions = 'Bitte stellen Sie sicher, dass Sie 15 Minuten Zeit haben, um die Aufgabe ohne Unterbrechung zu bearbeiten. Achten Sie darauf, dass Sie in einer bequemen Position sitzen, und schalten Sie gegebenenfalls Radio, Musik, Fernseher, Handy, möglicherweise störende Programme am Computer (Dropbox, Chat, Facebook), etc. aus, damit Sie möglichst nicht gestört werden.<br>Bitte schließen Sie sämtliche Browser-Fenster und Tabs außer diesem.<br>Stellen Sie bitte den Ton am Computer ab.<br><br>Bitte klicken Sie auf „Weiter“, wenn Sie bereit für weitere Instruktionen sind.';

var session_walkthrough1 = 'Als erstes werden Sie in der Mitte des Bildschirms kurz ein weißes Kreuz sehen, wie unten abgebildet. Bitte fixieren Sie dieses Kreuz am Anfang jedes Durchgangs, sobald es erscheint. <br><br>Bitte klicken Sie „Weiter“, wenn Sie bereit für weitere Instruktionen sind.';
var session_walkthrough2 = 'Als nächstes werden zwei Fotos auf dem Bildschirm erscheinen, so wie unten abgebildet. Die Fotos werden kurz gezeigt und verschwinden dann wieder.<br><br>Bitte klicken Sie „Weiter“, wenn Sie bereit für weitere Instruktionen sind.';
var session_walkthrough3 = 'Sobald die Fotos verschwinden, erscheint oben oder unten ein weißer Kreis auf dem Bildschirm.<br>Ihre Aufgabe ist es, auf die Position des Kreises (oben oder unten) zu reagieren, indem Sie die entsprechende Taste auf der Tastatur drücken.<br><br>Befindet sich der Kreis oben, drücken Sie bitte „' + key_top + '“, befindet er sich unten, drücken Sie bitte „' + key_bottom + '“.<br><br>Dabei ist es wichtig, dass Sie so schnell und genau wie möglich reagieren.<br><br>Im Beispiel unten wäre „' + key_top + '“ die richtige Antwort, da der Kreis sich oben befindet.<br><br>Bitte klicken Sie „Weiter“, wenn Sie bereit für weitere Instruktionen sind.';
var session_walkthrough4 = 'Sobald Sie eine der beiden Tasten gedrückt haben, erscheint wieder das weiße Kreuz auf dem Bildschirm und der nächste Durchgang beginnt.<br><br>Damit Sie sich mit dem Ablauf vertraut machen können, folgt jetzt eine kurze Übungsphase. Ihre Reaktionen werden in dieser Phase noch nicht aufgezeichnet. (Hier bekommen Sie nach jeder Reaktion Feedback, ob Sie richtig oder falsch reagiert haben.)<br><br>Klicken Sie „Weiter“, um mit der Übungsphase anzufangen.<br><br>Wenn Sie die Anleitung gerne noch einmal durchlesen möchten, bevor Sie mit der Übungsphase beginnen, klicken Sie bitte „Zurück“.';


var trial_tryout_instructions = 'Bitte platzieren Sie den Zeigefinger ihrer rechten Hand auf den Buchstaben „' + key_top + '“ (für oben) und den ihrer linken Hand auf „' + key_bottom + '“ (für unten).<br>Ihre Finger sollten während der ganzen Aufgabe auf diesen Tasten liegen bleiben. Das ist wichtig, damit Sie so schnell und genau wie möglich auf die Position des Kreises reagieren können.<br>Wenn gleich der "Weiter"-Knopf erscheint, drücken Sie „' + key_top + '“ um anzufangen.';
var begin_tryout_button = 'Drücken Sie „' + key_top + '“';
var fast_and_right_feedback = 'Gut gemacht';
var slow_and_wrong_feedback = 'Zu langsam und zu viele Fehler.';
var slow_and_right_feedback = 'Zu langsam.';
var fast_and_wrong_feedback = 'Zu viele Fehler.';

var trial_test_instructions = 'Sehr gut, Sie haben die Übungsphase geschafft. Jetzt sind Sie bereit, um mit der richtigen Aufgabe anzufangen. <br> Stellen Sie sicher, dass Ihre Finger immernoch auf den richtigen Buchstaben liegen: rechter Zeigefinger auf „' + key_top + '“ für oben und linker Zeigefinger auf „' + key_bottom + '“ für unten.<br><br>Es gibt ab jetzt keine Rückmeldungen mehr, ob Sie richtig oder falsch reagiert haben. Konzentrieren Sie sich einfach darauf, möglichst genau und schnell auf die Position des Kreises zu reagieren.<br><br><button class="btn btn-primary btn-large">Drücken Sie  „' + key_top + '“ um jetzt anzufangen.</button>';

var mistake_message = 'Falsche Antwort.';

var session_end_message = 'Ende der Aufgabe. Sie haben es geschafft.<br><br>Vielen Dank für Ihre Teilnahme!<br><br>Sie können Radio, Dropbox, Chat und andere Programme jetzt wieder einschalten :-)';
var session_interruption = 'Training unterbrochen. Bitte drücken Sie während der Sitzung nicht "escape" um den Vollbildschirmmodus zu verlassen und verlassen Sie nicht den Test. Bitte schließen Sie vor dem Test Programme, die Sie während des Tests ablenken könnten (durch Töne oder indem sie Sie zwingen, das Test-Fenster zu verlassen).';
var session_fullscreenFail = 'Ihr Web-Browser scheint den Vollbildmodus nicht zu unterstützen. Ein alternativer Browser ist z.B. <a href="http://getfirefox.com">Firefox</a>.';
var session_featureFail = 'Ihr Web-Browser unterstützt nötige Funktionen nciht. Ein alternativer Browser ist z.B. <a href="http://getfirefox.com">Firefox</a>.';
var go_on_button_message = 'Weiter';
var back_button_message = 'Zurück';

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
var can_be_wrong = 1; // number of test trials that can be wrong without triggering neg. feedback
var sufficiently_fast_reaction_time = 500; // if the subject's mean RT in the test trials is smaller than this: neg. feedback

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
function mysqldate (myDate) {
	var myDate_string = myDate.toISOString();
	var myDate_string = myDate_string.replace("T"," ");
	return myDate_string.substring(0, myDate_string.length - 5);
}

window.performance = window.performance || {};
performance.now = (function() {
  return performance.now       ||
         performance.mozNow    ||
         performance.msNow     ||
         performance.oNow      ||
         performance.webkitNow
})();


$(document).ready(function () {
	Session.preLoad(); // call it on domready to preload images
	
	$(document).one("fullscreenerror", Session.fullscreenFail);
	$(document).on("fullscreenchange", function () {
		if( $('#session_outer').fullScreen() == false || $('#session_outer').fullScreen() == null) { // if they have left fullscreenchange
			Session.interrupt();
		}
	}); // only does something if fullscreen was left
	
	$('#session div.session_begin').empty();
	$('#trial').hide();
	$('#session div.session_begin').append($('<button class="btn btn-large btn-primary">' + go_on_button_message + '</button>').click(Session.featureDetection));
	
});


window.Session = {
	'db': { // object where we hierarchically store all the session-related db
		'number': session_number,
		'condition': condition,
		'loaded': mysqldate( new Date() ),
		'loaded_unixtime': new Date().getTime(),
		'browser': navigator.appName || "Unknown browser",
		'browser_version': navigator.userAgent || navigator.appVersion || "Unknown version",
		'operating_system': navigator.platform || "Unknown OS",
		'browser_language': navigator.language || "Unknown language",
		'Trial': [] ,// array for all trials in this session
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

Session.featureDetection = (function () {
	if(!($.support.ajax && $.support.boxModel && $.support.opacity && performance.now)) {
		Session.featureFail();
	}
	else {
		Session.firstInstructions();
	}
});

Session.firstInstructions = (function () {
	$('#session div.session_begin').hide();
	$('#session').append($('<div class="session_first_instructions">'+ session_first_instructions +'<br><br></div>').append($('<button class="btn btn-large btn-primary">' + go_on_button_message + '</button>').one('click', Session.goFullscreen)));
});

Session.goFullscreen = (function () {
	if($('#session_outer').fullScreen() != null) { // supports full screen
		$('#session_outer').fullScreen(true);
		Session.preRender(); // pre render once button was clicked, runs session afterwards		
	} else { // different browser needed
		Session.fullscreenFail();
	}
});

Session.preRender = (function() {
	console.log('Session.preRender');
	
	for(i=0; i < Session.number_of_trials; i++) {
		var toppath = imgpath + (Session.sequence_ocd_top[i] ?  Session.sequence_ocd[i] : Session.sequence_neutral[i] ) + ".jpg";
		var botpath = imgpath + (Session.sequence_ocd_top[i] ?  Session.sequence_neutral[i] : Session.sequence_ocd[i] ) + ".jpg";
		var imgdiv = $('<div class="trial_images" id="trial_images_'+i+'" style="display:none"><img class="top" src="' + toppath + '"><br></div>');
		if(Session.number_of_trials-1 == i)
			var botimg = $('<img class="bottom" src="'+ botpath + '">').one('load',Session.showWalkthrough1);
		else
			var botimg = $('<img class="bottom" src="'+ botpath + '">');
		Session.imgs[i] = imgdiv.append(botimg);
		$('#trial').append(Session.imgs);
	}
});

Session.showWalkthrough1 = (function() {
	$('#session div.session_first_instructions').hide();
	$('#session div.session_walkthrough:visible').hide();
	$('#session').append($('<div class="session_walkthrough">'+ session_walkthrough1 +'<br><br></div>').append($('<button class="btn btn-large btn-primary">' + go_on_button_message + '</button>').one('click', Session.showWalkthrough2)));
});

Session.showWalkthrough2 = (function() {
	$('#session div.session_walkthrough:visible').hide();
	$('#session').append($('<div class="session_walkthrough">'+ session_walkthrough2 +'<br><br></div>').append($('<button class="btn btn-large btn-primary">' + go_on_button_message + '</button>').one('click', Session.showWalkthrough3)));
});
Session.showWalkthrough3 = (function() {
	$('#session div.session_walkthrough:visible').hide();
	$('#session').append($('<div class="session_walkthrough">'+ session_walkthrough3 +'<br><br></div>').append($('<button class="btn btn-large btn-primary">' + go_on_button_message + '</button>').one('click', Session.showWalkthrough4)));
});
Session.showWalkthrough4 = (function() {
	$('#session div.session_walkthrough:visible').hide();
	$('#session').append($('<div class="session_walkthrough">'+ session_walkthrough4 +'<br><br></div>').append( $('<button class="btn btn-large">' + back_button_message + '</button>').one('click', Session.showWalkthrough1) ).append( $('<button class="btn btn-large btn-primary">' + go_on_button_message + '</button>').one('click', Session.showTryoutInstructions) ) );
});

Session.showTryoutInstructions = (function() {
	console.log('Session.showTryoutInstructions');
	if(Session.interrupted == true) return;
	
	$('#trial').hide();
	$('#session').show().empty();
	
	$('#session').append($('<div class="trial_instructions">'+ trial_tryout_instructions +'<br><br></div>').append($('<button id="begin_trial" class="btn btn btn-success">' + begin_tryout_button +'</button>')));
	$(document).on('keydown',function(e) {
		if( String.fromCharCode( e.which )  == key_top)
			Session.beginTryout();
			$(document).off('keydown');
	});
});

Session.beginTryout = (function() {
	console.log('Session.beginTryout');
	$(window).blur(Session.interrupt);
	$('#trial').show();
	Session.nextTrial();
});

Session.showTryoutFeedback = (function() {
	console.log('Session.showTryoutFeedback');
	// % correct
	// mean RT
	// 4 FBs: Too slow & too wrong, too slow (but right), too wrong (but fast), everything dandy
	var RTsum = 0; var Csum = 0;
	for(i=0;i<number_of_test_trials;i++) {
		RTsum += Session.db.Trial[i].first_reaction_time_since_probe_shown;
		Csum += (Session.db.Trial[i].probe_on_top == Session.db.Trial[i].first_valid_response) ? 1 : 0;
	}
	var toowrong = false; var tooslow = false;
	if(Csum < number_of_test_trials - can_be_wrong) toowrong = true;
	if(RTsum/number_of_test_trials > sufficiently_fast_reaction_time) tooslow = true;
	
	var tryout_feedback = fast_and_right_feedback;
	if(tooslow && toowrong) tryout_feedback = slow_and_wrong_feedback;
	else if(tooslow) tryout_feedback = slow_and_right_feedback;
	else if(toowrong) tryout_feedback = fast_and_wrong_feedback;
	
	tryout_feedback = tryout_feedback + "<br><br>" + Csum + "/" + number_of_test_trials + " richtig.<br><br>" + "Durchschnittliche Reaktionszeit: " + Math.round(RTsum/number_of_test_trials) + " Millisekunden"; 
	
	$('#session').append($('<div class="trial_instructions">'+ tryout_feedback +'<br><br></div>').append($('<button class="btn btn-large btn-primary">' + go_on_button_message + '</button>').one('click', Session.showTestInstructions) )).show();
		
});

Session.showTestInstructions = (function() {
	console.log('Session.showTestInstructions');
	
	if(Session.interrupted == true) return;
	$('#trial').hide();
	$('#session').show().empty();
	
	
	$('#session').append($('<div class="trial_instructions">'+ trial_test_instructions +'</div>'));
	
	$(document).on('keydown',function(e) {
		if( String.fromCharCode( e.which )  == key_top)
			Session.beginTest();
			$(document).off('keydown');
	});
});

Session.beginTest = (function() {
	console.log('Session.begin');
	
	Session.db.window_width = $(window).width();
	Session.db.document_width = $(document).width(); // should be identical in full screen
	Session.db.window_height =  $(window).height();
	Session.db.document_height = $(document).height();
	
	$(window).on('keypress click',Reaction.logReaction); // log key strokes and clicks for the whole session, only attached once
	Session.db.began = mysqldate( new Date() );
	Session.db.began_unixtime = new Date().getTime();
	Session.SessionBegan = performance.now();

	$('#trial').show();
	Session.nextTrial();
});

Session.nextTrial = (function() {
	console.log('Session.nextTrial');
	
	if(Session.interrupted == true) return;
	
	if(Session.number_of_trials == Session.db.Trial.length) // last trial
		Session.end();
	else {
		Trial.current = Session.db.Trial.length;
		Session.db.Trial.push( {
			'number': Trial.current,
			'ocd_image_id': Session.sequence_ocd[Trial.current],
			'neutral_image_id': Session.sequence_neutral[Trial.current],
			'ocd_on_top': (Session.sequence_ocd_top[Trial.current] ) ? 1:0,
			'Reaction': [],
		});
			
		if(condition == 'bias_assessment' || condition || 'bias_control')
			Session.db.Trial[Trial.current].probe_on_top = ( ! Math.round(Math.random()) ) ? 1 : 0; // ! to ensure it's a bool
		else if (condition == 'bias_manipulation')
			Session.db.Trial[Trial.current].probe_on_top = (! Session.db.Trial[Trial.current].ocd_on_top) ? 1 : 0;
		
		Trial.begin();
	}
});
//SELECT AVG(fixation_duration),STDDEV(fixation_duration),AVG(images_duration),STDDEV(images_duration) FROM trials 	 WHERE 1

Session.end = (function() {
	Session.db.ended = mysqldate( new Date() );
	Session.db.ended_unixtime = new Date().getTime();
	
	console.log('Session.end');
	var data = {TrainingSession: Session.db };
	$.ajax('../TrainingSessions/ajaxAdd',{
		data: data,
		type: 'post',
		cache: false,
		complete: function (resp) {
			console.log("Session.saved");
			console.log(resp);
		}
	});
	$(document).off("fullscreenchange"); // remove error message	
	$(window).off("blur"); // remove error message	
	$('#trial').empty().hide();
	$('#session').append($('<div class="session_end_message">' + session_end_message +'</div>')).show();
	$('#session_outer').fullScreen(false); // leave fullscreen
	$(window).off('keypress click',Reaction.logReaction); // stop log key strokes for the whole session
	
});

Session.interrupt = (function() { // on leaving fullscreen
	console.log('Session.interrupt');
	clearTimeout(Session.waitForNextStep); // don't do next step
	$(window).off('keydown'); // don't log valid responses anymore
	$(window).off('keypress click',Reaction.logReaction); // stop log key strokes for the whole session
	$(document).off("fullscreenchange"); // remove error message	
	$('#session_outer').fullScreen(false); // leave fullscreen
	
	Session.interrupted = true;
	
	Session.interruption = $('<div class="session_interruption">' + session_interruption + '</div>');
	$('#trial').empty().hide();
	$('#session').empty().append(Session.interruption).show();
});

Session.fullscreenFail = (function() { // on leaving fullscreen
	console.log('Session.fullscreenFail');
	
	Session.interrupt();
	Session.fail = $('<div class="session_fail">' + session_fullscreenFail + '</div>');
	$('#session').append(Session.fail).show();
});

Session.featureFail = (function() { // on leaving fullscreen
	console.log('Session.featureFail');
	
	Session.interrupt();
	Session.fail = $('<div class="session_fail">' + session_featureFail + '</div>');
	$('#session').append(Session.fail).show();
});

window.Trial = {
	'fixation': $('<div style="display:none" class="fixation">+</div>'),
	'probe': $('<div style="display:none" class="probe">●</div>'),
	'mistake_message': $('<div style="display:none" class="mistake_message">' + mistake_message + '</div>'),
	'CurrentlyDisplayed': 'nothing',
};

Trial.begin = (function() { // start a trial
	console.log('Trial.begin');
	Session.db.Trial[Trial.current].began_unixtime = new Date().getTime();
	$('#session').empty().hide();
	$('#trial').append(Trial.fixation,Trial.probe,Trial.mistake_message);
	Trial.showFixation();
});

Trial.showFixation = (function() { 
	console.log('Trial.showFixation');
	
	$('#trial div.fixation').show();
	Trial.FixationShown = performance.now();
	
	Trial.CurrentlyDisplayed = 'fixation';
	
	Session.waitForNextStep = setTimeout(Trial.showImages, fixation_duration);
});

Trial.showImages = (function() { 
	console.log('Trial.showImages');
	
	$('#trial div.fixation').hide();
	$(window).one('MozAfterPaint', function () {
		Trial.FixationHidden = performance.now();
	});
	$('#trial_images_'+Trial.current).show();
	Trial.ImagesShown = performance.now();

	Trial.CurrentlyDisplayed = 'images';

	Session.waitForNextStep = setTimeout(Trial.showProbe, img_duration);
});

Trial.showProbe = (function() {
	console.log('Trial.showProbe');

	$(window).one('MozAfterPaint', function () {
		Trial.ImagesHidden = performance.now();
	});
	$('#trial_images_'+Trial.current).hide();
	Trial.ProbeShown = performance.now();
							// is the probe on top or not?
	$('#trial div.probe').toggleClass('probe_on_top',!! Session.db.Trial[Trial.current].probe_on_top).show(); // !! to ensure it's cast as a bool

	Trial.CurrentlyDisplayed = 'probe';
	$(window).on('keydown',Trial.response);
});
// SELECT AVG( first_reaction_time_since_trial_began - first_reaction_time_since_probe_shown), STDDEV(first_reaction_time_since_trial_began - first_reaction_time_since_probe_shown) FROM trials
// should be 1000 and 0
Trial.response = (function(e) { // log valid responses
	console.log('Trial.response');
	
	var valid_response_time = performance.now(); // same time for both time indices
	var key = String.fromCharCode( e.which );
	key = key.toUpperCase();
	if(key == key_top || key == key_bottom) { // if it's valid input
		Session.db.Trial[Trial.current].first_reaction_time_since_trial_began = valid_response_time - Trial.FixationShown;
		Session.db.Trial[Trial.current].first_reaction_time_since_probe_shown = valid_response_time - Trial.ProbeShown;
		Session.db.Trial[Trial.current].first_valid_response = (key == key_top) ? 1 : 0; // bool: pressed top, false = pressed bottom
		$(window).off('keydown',Trial.response); // just one valid response per trial
		
		$('#trial div.probe').hide();
		
		
		if(Trial.current > number_of_test_trials - 1) // for non test trials
			Trial.end();
		else {
			if( Session.db.Trial[Trial.current].probe_on_top !=
				Session.db.Trial[Trial.current].first_valid_response)
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
	Session.db.Trial[Trial.current].fixation_duration = Trial.ImagesShown - Trial.FixationShown;
	Session.db.Trial[Trial.current].fixation_duration = Trial.ImagesHidden - Trial.FixationHidden;
	Session.db.Trial[Trial.current].images_duration = Trial.ProbeShown - Trial.ImagesShown;
	if(Trial.current != number_of_test_trials - 1)
		Session.nextTrial(); // trigger
	else
		Session.showTryoutFeedback();
});


window.Reaction = {};
Reaction.logReaction = (function(e) { // simply log all keypresses during the session
	console.log('Reaction.logReaction');
	// fixme: fullscreened elm in window with navbars isn't what we want, but it doesn't affect the fullscreen API 
	
	var valid_response_time = performance.now(); // same time for both time indices
	if(e.which > 3) key = String.fromCharCode( e.which );
	else key = e.which;
	
	console.log(key);
	
	Session.db.Trial[Trial.current].Reaction.push({
		'response': key,
		'time_since_session_began': valid_response_time - Session.SessionBegan,
		'time_since_trial_began': valid_response_time - Trial.FixationShown,
		'time_since_last_probe_shown': valid_response_time - Trial.ProbeShown,
		'currently_displayed': Trial.CurrentlyDisplayed
	});
});
//]]>
</script>
<?php $this->end(); ?>