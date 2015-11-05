/*
---- INSTRUCTIONS, localisation
*/
var session_first_instructions = 'Bitte stellen Sie sicher, dass Sie 15 Minuten Zeit haben, um die Aufgabe ohne Unterbrechung zu bearbeiten. Achten Sie darauf, dass Sie in einer bequemen Position sitzen und schalten Sie gegebenenfalls Radio, Musik, Fernseher, Handy und möglicherweise störende Programme am Computer (Dropbox, Chat, Facebook etc.) aus. <br>Bitte schließen Sie sämtliche Browser-Fenster und Tabs außer diesem. Stellen Sie bitte den Ton am Computer ab. <br><br> Wenn Sie auf "Weiter" klicken, beginnt nun der Vollbildmodus. Klicken Sie bitte auf "Erlauben" und setzen ein Häkchen bei "Entscheidung für hu-berlin.de merken", damit Sie den Vollbildmodus nicht bei jedem Training neu erlauben müssen. <br><br> Wenn Sie gefragt werden, ob Ihr Passwort gespeichert werden soll, klicken Sie entweder "Ja" oder "Nie für diese Seite" an. Das ist nötig, damit die Frage wieder verschwindet und Sie die Aufgabe richtig sehen können. <br><br> Brechen Sie den Vollbildmodus während des Trainings nicht ab, da sonst auch die Trainingseinheit unterbrochen wird. Der Vollbildmodus wird nach dem Training automatisch beendet. <br><br>Bitte klicken Sie auf „Weiter“, wenn Sie bereit für weitere Instruktionen sind.';

var session_walkthrough1 = '<div class="instruction_image"><img src="'+imgpath_base+'instructions/screen_fixation.png" width="400" height="250"></div>Als erstes werden Sie in der Mitte des Bildschirms kurz ein weißes Kreuz sehen, wie hier abgebildet. Bitte schauen Sie am Anfang jedes Durchgangs konzentriert auf dieses Kreuz, sobald es erscheint. <br><br>Bitte klicken Sie „Weiter“, wenn Sie bereit für weitere Instruktionen sind.';
var session_walkthrough2 = '<div class="instruction_image"><img src="'+imgpath_base+'instructions/screen_stimuli.png" width="400" height="250"></div>Als nächstes werden zwei Fotos auf dem Bildschirm erscheinen, so wie hier abgebildet. Die Fotos werden kurz gezeigt und verschwinden dann wieder.<br><br>Bitte klicken Sie „Weiter“, wenn Sie bereit für weitere Instruktionen sind.';
var session_walkthrough3 = '<div class="instruction_image"><img src="'+imgpath_base+'instructions/screen_probe.png" width="400" height="250"></div>Sobald die Fotos verschwinden, erscheint oben oder unten der Buchstabe „' + key_probe1 + '“ oder „' + key_probe2 + '“ auf dem Bildschirm.<br>Ihre Aufgabe ist es, so schnell wie möglich den angezeigten Buchstaben auf Ihrer Tastatur zu drücken. Die Position des Buchstabens spielt dabei keine Rolle. <br><br>Es ist wichtig, dass Sie immer so schnell und genau wie möglich reagieren.<br><br>Im hier gezeigten Beispiel müssten Sie „' + key_probe1 + '“ drücken, da „' + key_probe1 + '“ auf dem Bildschirm zu sehen ist. <br><br>Bitte klicken Sie „Weiter“, wenn Sie bereit für weitere Instruktionen sind.';
var session_walkthrough4 = 'Sobald Sie eine der beiden Tasten gedrückt haben beginnt der nächste Durchgang. Bitte schauen Sie wieder konzentriert auf das weiße Kreuz in der Mitte des Bildschirms. <br><br>Damit Sie sich mit dem Ablauf vertraut machen können, folgt jetzt eine kurze Übungsphase. Ihre Reaktionen werden in dieser Phase noch nicht aufgezeichnet (falls Sie Fehler machen, wird Ihnen das rückgemeldet, nach richtigen Reaktionen geht es ohne Rückmeldung sofort weiter).<br><br>Klicken Sie „Weiter“, um mit der Übungsphase anzufangen.<br><br>Wenn Sie die Anleitung gerne noch einmal durchlesen möchten, bevor Sie mit der Übungsphase beginnen, klicken Sie bitte „Zurück“.';


var trial_tryout_instructions = 'Bitte platzieren Sie den Zeigefinger Ihrer linken Hand auf den Buchstaben „' + key_probe1 + '“ und den Ihrer rechten Hand auf „' + key_probe2 + '“. <br>Ihre Finger sollen während der ganzen Trainingseinheit auf diesen Tasten liegen bleiben. Das ist wichtig, damit Sie so schnell und genau wie möglich auf den gezeigten Buchstaben reagieren können.<br><br><button class="btn btn-primary btn-large">Drücken Sie  „' + key_probe1 + '“ um jetzt anzufangen.</button>'; 

var fast_and_right_feedback = 'Sehr gut! Sie haben in der Übungsphase schnell und genau reagiert. Weiter so!';
var slow_and_wrong_feedback = 'Gut, die Übungsphase ist geschafft! Bitte versuchen Sie nun noch schneller und genauer zu reagieren.';
var slow_and_right_feedback = 'Gut, Sie haben in der Übungsphase sehr genau reagiert. Bitte versuchen Sie im folgenden Teil aber noch schneller zu reagieren.';
var fast_and_wrong_feedback = 'Gut, Ihre Reaktionsgeschwindigkeit war sehr hoch. Bitte versuchen Sie aber im folgenden Teil noch weniger Fehler zu machen.';

var trial_test_instructions = 'Nun haben Sie die Übungsphase geschafft und sind bereit, um mit der richtigen Aufgabe anzufangen. <br> Stellen Sie sicher, dass Ihre Finger immernoch auf den richtigen Buchstaben liegen: linker Zeigefinger auf „' + key_probe1 + '“ und rechter Zeigefinger auf „' + key_probe2 + '“. <br><br>Es gibt ab jetzt keine Rückmeldung mehr, wenn Sie die falsche Taste drücken. Konzentrieren Sie sich bitte einfach darauf, möglichst genau und schnell durch Tastendruck auf den gezeigten Buchstaben zu reagieren. <br><br><button class="btn btn-primary btn-large">Drücken Sie  „' + key_probe1 + '“ um jetzt anzufangen.</button>'; 


var session_end_message = '<h3>Ende der Trainingseinheit.</h3> Sie haben es geschafft.<br><br>Vielen Dank für Ihre heutige Teilnahme!<br><br>Sie können Radio, Dropbox, Chat und andere Programme jetzt wieder einschalten :)';
var session_interruption = 'Training unterbrochen. Bitte drücken Sie während der Sitzung nicht "escape" um den Vollbildschirmmodus zu verlassen und verlassen Sie nicht den Test. Bitte schließen Sie vor dem Test Programme, die Sie während des Tests ablenken könnten (durch Töne oder indem sie Sie zwingen, das Test-Fenster zu verlassen). Um Ihre Trainingseinheit jetzt von vorne anzufangen, drücken Sie in der Menüleiste oben auf "Trainieren".';
var session_fullscreenFail = 'Ihr Web-Browser unterstützt den Vollbildmodus nicht. Um das Problem zu beheben, installieren Sie bitte die aktuelle Version der Browser Mozilla Firefox oder Google Chrome. Diese Browser sind kostenlos und Sie können sie einfach hier herunterladen:<br><a href="//affiliates.mozilla.org/link/banner/33002"><img width="110" height="32" src="//affiliates.mozilla.org/media/uploads/banners/c535b958c0ce9b59b5f33b61b53c2bab38baf601.png" alt="Firefox herunterladen" /></a> <a href="//www.google.com/intl/de/chrome/browser/"><img width="110" height="30" src="'+webroot+'img/getchrome.png" alt="Google Chrome herunterladen" /></a> <br>Bitte folgen Sie zum Herunterladen und Installieren den Anweisungen auf der Seite <br>Wenn das Problem bestehen bleibt, schreiben Sie uns bitte eine E-Mail an <a href="mailto:zwang.psychologie@hu-berlin.de">zwang.psychologie@hu-berlin.de</a> wir werden Ihnen sobald wie möglich mit der Lösung helfen!';

var session_featureFail = 'Ein Fehler ist aufgetreten. Ihr Web-Browser wird nicht unterstützt oder ist nicht aktuell. Um das Problem zu beheben, installieren Sie bitte die aktuelle Version der Browser Mozilla Firefox oder Google Chrome. Diese Browser sind kostenlos und Sie können sie einfach hier herunterladen:<br><a href="//affiliates.mozilla.org/link/banner/33002"><img width="110" height="32" src="//affiliates.mozilla.org/media/uploads/banners/c535b958c0ce9b59b5f33b61b53c2bab38baf601.png" alt="Firefox herunterladen" /></a> <a href="//www.google.com/intl/de/chrome/browser/"><img width="110" height="30" src="'+webroot+'img/getchrome.png" alt="Google Chrome herunterladen" /></a> <br>Bitte folgen Sie zum Herunterladen und Installieren den Anweisungen auf der Seite <br>Wenn das Problem bestehen bleibt, schreiben Sie uns bitte eine E-Mail an <a href="mailto:zwang.psychologie@hu-berlin.de">zwang.psychologie@hu-berlin.de</a> wir werden Ihnen sobald wie möglich mit der Lösung helfen!';

var go_on_button_message = 'Weiter';
var back_button_message = 'Zurück';

var session_saveFail = 'Die Daten dieser Trainingssitzung konnten nicht gespeichert werden!<br>Bitte versuchen Sie es erneut (nachdem Sie bspw. die Internetverbindung wiederhergestellt haben). Falls es nicht gelingt, kontaktieren Sie bitte die Studienleitung mit den unten angezeigten Informationen.';
var try_saving_again_button = 'Erneut versuchen, zu speichern';
var session_close_with_unsaved_changes_prompt = 'Ihre Sitzung ist noch nicht gespeichert. Bitte verlassen Sie die Seite erst, wenn dies geschehen ist (es kann nicht mehr lange dauern).';

/* BLOCKS */
var test_trials_part1 = shuffle(test_imgs);
var test_trials_part2 = test_trials_part1.splice(0,6);
var test_trials_top = repeatArray([false], test_trials_part1.length); // dont need to shuffle twice
var ocd_block1 = shuffle(ocd_imgs);
var neutral_block1 = shuffle(neutral_imgs); // shuffle them once, repeat
var ocd_top_block1 = shuffle(repeatArray([false,true], ocd_imgs.length)); // make array of positions, shuffle
var ocd_top_block1R = $.makeArray( ocd_top_block1.map(function(m) { return !m; }) );

var n = ocd_block1.length;
var randomIndices = [];
for (var i=0; i<n; i++) {
   randomIndices[i] = i;
}
randomIndices = shuffle(randomIndices);
function sortByArray(toSort,byArray) {
	var n = byArray.length;
	var sortedArray = [];
	for (var i=0; i < n; i++) {
    	sortedArray[i] = toSort[byArray[i]];
	}
	return sortedArray;
}
ocd_block1 = ocd_block1.concat(sortByArray(ocd_block1,randomIndices));
neutral_block1 = neutral_block1.concat(sortByArray(neutral_block1,randomIndices));
ocd_top_block1 = ocd_top_block1.concat(sortByArray(ocd_top_block1R,randomIndices));

var ocd_block2 = shuffle(ocd_imgs);
var neutral_block2 = shuffle(neutral_imgs); // shuffle them once, repeat
var ocd_top_block2 = shuffle(repeatArray([false,true], ocd_imgs.length)); // make array of positions, shuffle

var ocd_top_block2R = $.makeArray( ocd_top_block2.map(function(m) { return !m; }) );


randomIndices = shuffle(randomIndices); // new pair shuffle
ocd_block2 = ocd_block2.concat(sortByArray(ocd_block2,randomIndices));
neutral_block2 = neutral_block2.concat(sortByArray(neutral_block2,randomIndices));
ocd_top_block2 = ocd_top_block2.concat(sortByArray(ocd_top_block2R,randomIndices));

var ocd_sequence = test_trials_part1.concat(ocd_block1.concat(ocd_block2)); // first test trials then block 1 then B2
var neutral_sequence = test_trials_part2.concat(neutral_block1.concat(neutral_block2)); // accordingly
var ocd_top_sequence = test_trials_top.concat(ocd_top_block1.concat(ocd_top_block2));

var number_of_trials = ocd_sequence.length; // includes test trials, so increase it accordingly
var number_of_test_trials = 6;
var can_be_wrong = 1; // number of test trials that can be wrong without triggering neg. feedback
var sufficiently_fast_reaction_time = 650; // if the subject's mean RT in the test trials is smaller than this: neg. feedback


// console.log(number_of_trials);
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
// http://paulirish.com/2011/requestanimationframe-for-smart-animating/
// http://my.opera.com/emoller/blog/2011/12/20/requestanimationframe-for-smart-er-animating
 
// requestAnimationFrame polyfill by Erik Möller
// fixes from Paul Irish and Tino Zijdel
 
(function() {
    var lastTime = 0;
    var vendors = ['ms', 'moz', 'webkit', 'o'];
    for(var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x) {
        window.requestAnimationFrame = window[vendors[x]+'RequestAnimationFrame'];
        window.cancelAnimationFrame = window[vendors[x]+'CancelAnimationFrame'] 
                                   || window[vendors[x]+'CancelRequestAnimationFrame'];
    }
 //removed setTimeout fallback
}());

/**
Drop in replace functions for setTimeout() & setInterval() that 
make use of requestAnimationFrame() for performance where available
http://www.joelambert.co.uk
 
Copyright 2011, Joe Lambert.
Free to use under the MIT license.
http://www.opensource.org/licenses/mit-license.php
*/
/**
 * Behaves the same as setTimeout except uses requestAnimationFrame() where possible for better performance
 * @param {function} fn The callback function
 * @param {int} delay The delay in milliseconds
 */


window.requestTimeout = function(fn, delay) {
	var start = performance.now(),
	    handle = new Object();
	function loop(){
		var current = performance.now(),
			delta = current - start;
		
		delta >= delay ? fn.call() : handle.value = window.requestAnimationFrame(loop);
	};
	handle.value = window.requestAnimationFrame(loop);
	return handle;
};


// shorthands for hiding/showing without reflow
(function($){ 
 $.fn.makeVisible = function() {  
    return this.css('visibility','visible');
 };  
})(jQuery);
(function($){  
 $.fn.makeInvisible = function() {  
    return this.css('visibility','hidden');
 };  
})(jQuery);

/* ====================================
   SESSION LOGIC
   ==================================== */

$(document).ready(function () {
	// cache selectors
	$trial = $('#trial');
	$session = $('#session');
	$fixation = $('#fixation');
	$probe1_top = $('#probe1_top');
	$probe1_bottom = $('#probe1_bottom');
	$probe2_top = $('#probe2_top');
	$probe2_bottom = $('#probe2_bottom');
	$mistake_message = $('#mistake_message');
	
	Session.featureDetection();
	Session.preLoad(); // call it on domready to preload images
	
	$(document).one("fullscreenerror", Session.fullscreenFail);
	$(document).on("fullscreenchange", function () {
		if( $('#session_outer').fullScreen() == false || $('#session_outer').fullScreen() == null) { // if they have left fullscreenchange
			Session.interrupt();
		}
	}); // only does something if fullscreen was left

	$trial.makeInvisible();
	$('#session div.session_begin').empty().append($('<button class="btn btn-large btn-primary">' + go_on_button_message + '</button>').click(Session.firstInstructions));
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
//	console.log('Session.preLoad');
	
	var swidth = screen.width;
	var sheight = screen.height;
	var available_sheights = [600,720,768,800,900,1024,1200,1440];
	var chosen_height = 600;
	for(var i = 0; i < available_sheights.length; i++) {
//		console.log(available_sheights[i]);
		if(sheight >= available_sheights[i]) chosen_height = available_sheights[i];
	}
	Session.db.displayed_height = chosen_height;
    
    if(chosen_height==600)
    {
        $session.addClass("session600");
    }
	
	imgpath = imgpath_base + chosen_height + "/"; // append to path
	$trial.addClass('sh' + chosen_height); // add class for widths and heights
	
	preload_these = ocd_imgs.concat(neutral_imgs);
	var len = preload_these.length;
	    $(preload_these).each(function(index,img){
			$('<img/>')[0].src = imgpath + img + ".jpg";
	    });
	$('<img/>')[0].src = imgpath + "fixation.png";
	$('<img/>')[0].src = imgpath + "probe1.png";
	$('<img/>')[0].src = imgpath + "probe2.png";
	$('<img/>')[0].src = imgpath_base + "instructions/Monitor.png";
	$('<img/>')[0].src = imgpath_base + "instructions/screen_probe.png";
	$('<img/>')[0].src = imgpath_base + "instructions/screen_fixation.png";
	$('<img/>')[0].src = imgpath_base + "instructions/screen_stimuli.png";
});

Session.featureDetection = (function () {
	if(!($.support.ajax && $.support.boxModel && performance.now && window.requestAnimationFrame && window.cancelAnimationFrame)) {
		Session.featureFail();
	}
});

Session.firstInstructions = (function () {
	$('#session div.session_begin').makeInvisible();
	$session.append($('<div class="session_first_instructions">'+ session_first_instructions +'<br><br></div>').append($('<button class="btn btn-large btn-primary">' + go_on_button_message + '</button>').one('click', Session.goFullscreen)));
});

Session.goFullscreen = (function () {
	if($('#session_outer').fullScreen() != null) { // supports full screen
		$trial.addClass('fullscreen');
		$session.addClass('fullscreen');
		$('#session_outer').fullScreen(true);
		Session.preRender(); // pre render once button was clicked, runs session afterwards		
	} else { // different browser needed
		Session.fullscreenFail();
	}
});

Session.preRender = (function() {
//	console.log('Session.preRender');
	
	for(i=0; i < Session.number_of_trials; i++) {
		var toppath = imgpath + (Session.sequence_ocd_top[i] ?  Session.sequence_ocd[i] : Session.sequence_neutral[i] ) + ".jpg";
		var botpath = imgpath + (Session.sequence_ocd_top[i] ?  Session.sequence_neutral[i] : Session.sequence_ocd[i] ) + ".jpg";
		var imgdiv = $('<div class="trial_images" id="trial_images_'+i+'" style="visibility:hidden"><img class="top" src="' + toppath + '"><img class="bottom" src="'+ botpath + '"></div>');
		Session.imgs[i] = imgdiv;
	}
		$probe1_top.append($('<img src="' +imgpath+ 'probe1.png'  + '">'));
		$probe1_bottom.append($('<img src="' +imgpath+ 'probe1.png'  + '">'));
		$probe2_top.append($('<img src="' +imgpath+ 'probe2.png'  + '">'));
		$probe2_bottom.append($('<img src="' +imgpath+ 'probe2.png'  + '">'));
		$fixation.append($('<img src="' +imgpath+ 'fixation.png'  + '">').one('load',Session.showWalkthrough1));
		$trial.append(Session.imgs);
});

Session.showWalkthrough1 = (function() {
	$session.empty().append($('<div class="session_walkthrough">'+ session_walkthrough1 +'<br><br></div>').append($('<button class="btn btn-large btn-primary">' + go_on_button_message + '</button>').one('click', Session.showWalkthrough2)));
});

Session.showWalkthrough2 = (function() {
	$('#session div.session_walkthrough:visible').hide();
	$session.append($('<div class="session_walkthrough">'+ session_walkthrough2 +'<br><br></div>').append($('<button class="btn btn-large btn-primary">' + go_on_button_message + '</button>').one('click', Session.showWalkthrough3)));
});
Session.showWalkthrough3 = (function() {
	$('#session div.session_walkthrough:visible').hide();
	$session.append($('<div class="session_walkthrough">'+ session_walkthrough3 +'<br><br></div>').append($('<button class="btn btn-large btn-primary">' + go_on_button_message + '</button>').one('click', Session.showWalkthrough4)));
});
Session.showWalkthrough4 = (function() {
	$('#session div.session_walkthrough:visible').hide();
	$session.append($('<div class="session_walkthrough">'+ session_walkthrough4 +'<br><br></div>').append( $('<button class="btn btn-large">' + back_button_message + '</button>').one('click', Session.showWalkthrough1) ).append( $('<button class="btn btn-large btn-primary">' + go_on_button_message + '</button>').one('click', Session.showTryoutInstructions) ) );
});

Session.showTryoutInstructions = (function() {
//	console.log('Session.showTryoutInstructions');
	if(Session.interrupted == true) return;
	
	$trial.makeInvisible();
	$(document).on('keydown',function(e) {
		if( String.fromCharCode( e.which ).toUpperCase()  == key_probe1) {
			$(document).off('keydown');
			Session.beginTryout();
            return false;
		}
	});
	
	$session.empty().append($('<div class="trial_instructions">'+ trial_tryout_instructions +'</div>')).makeVisible();
});


Session.beginTryout = (function() {
//	console.log('Session.beginTryout');
//	$(window).blur(Session.interrupt);

	$session.makeInvisible();
	$trial.makeVisible();
	Session.nextTrial();
});

Session.showTryoutFeedback = (function() {
//	console.log('Session.showTryoutFeedback');
	// % correct
	// mean RT
	// 4 FBs: Too slow & too wrong, too slow (but right), too wrong (but fast), everything dandy
	var RTsum = 0; var Csum = 0;
	for(i=0;i<number_of_test_trials;i++) {
		RTsum += Session.db.Trial[i].first_reaction_time_since_probe_shown;
		Csum += (Session.db.Trial[i].stimulus_1 == Session.db.Trial[i].responded_1) ? 1 : 0;
	}
	var toowrong = false; var tooslow = false;
	if(Csum < number_of_test_trials - can_be_wrong) toowrong = true;
	if(RTsum/number_of_test_trials > sufficiently_fast_reaction_time) tooslow = true;
	
	var tryout_feedback = fast_and_right_feedback;
	if(tooslow && toowrong) tryout_feedback = slow_and_wrong_feedback;
	else if(tooslow) tryout_feedback = slow_and_right_feedback;
	else if(toowrong) tryout_feedback = fast_and_wrong_feedback;
	
	tryout_feedback = tryout_feedback + "<br><br>" + Csum + "/" + number_of_test_trials + " richtig.<br><br>" + "Durchschnittliche Reaktionszeit: " + Math.round(RTsum/number_of_test_trials) + " Millisekunden"; 

	$trial.makeInvisible();
	$session.append($('<div class="trial_instructions">'+ tryout_feedback +'<br><br></div>').append($('<button class="btn btn-large btn-primary">' + go_on_button_message + '</button>').one('click', Session.showTestInstructions) )).makeVisible();
		
});

Session.showTestInstructions = (function() {
//	console.log('Session.showTestInstructions');
	
	if(Session.interrupted == true) return;
	$trial.makeInvisible();
	
	$(document).on('keydown',function(e) {
		if( String.fromCharCode( e.which ).toUpperCase()  == key_probe1) {
				$(document).off('keydown');
				Session.beginTest();
                return false;
			}
	});
	
	$session.empty().append($('<div class="trial_instructions">'+ trial_test_instructions +'</div>')).makeVisible();
	
});

Session.beginTest = (function() {
//	console.log('Session.begin');
	
	Session.db.screen_width = screen.width;
	Session.db.window_width = $(window).width();
	Session.db.document_width = $(document).width(); // should be identical in full screen
	Session.db.screen_height =  screen.height;
	Session.db.window_height =  $(window).height();
	Session.db.document_height = $(document).height();
	
	$(window).on('keypress click',Reaction.logReaction); // log key strokes and clicks for the whole session, only attached once
	Session.db.began = mysqldate( new Date() );
	Session.db.began_unixtime = new Date().getTime();
	Session.SessionBegan = performance.now();

	$session.makeInvisible();
	$trial.makeVisible();
	Session.nextTrial();
});

Session.nextTrial = (function() {
//	console.log('Session.nextTrial');
	
	if(Session.interrupted == true) return;
//    console.log(Trial.current);
	
	if(Session.number_of_trials == Session.db.Trial.length) // last trial
		Session.end();
	else {
		Trial.current = Session.db.Trial.length;
		Session.db.Trial.push( {
			'number': Trial.current,
			'ocd_image_id': Session.sequence_ocd[Trial.current],
			'neutral_image_id': Session.sequence_neutral[Trial.current],
			'ocd_on_top': (Session.sequence_ocd_top[Trial.current] ) ? 1:0,
			'stimulus_1': ( ! Math.round(Math.random()) ) ? 1 : 0,
			'Reaction': [],
		});
					
		if(condition == 'bias_assessment' || condition == 'bias_assessment2' || condition == 'bias_control')
			Session.db.Trial[Trial.current].probe_on_top = ( ! Math.round(Math.random()) ) ? 1 : 0; // ! to ensure it's a bool
		else if (condition == 'bias_manipulation')
			Session.db.Trial[Trial.current].probe_on_top = (! Session.db.Trial[Trial.current].ocd_on_top)? 1 : 0;
		
		var position = (Session.db.Trial[Trial.current].probe_on_top) ? 'top' : 'bottom';// is the probe on top or not?
		var stimulus = (Session.db.Trial[Trial.current].stimulus_1) ? '1' : '2'; // which probe is it?
		Trial.CurrentProbe = '$probe'+stimulus+"_"+position;
		
		
		Trial.begin();
	}
});
//SELECT AVG(fixation_duration),STDDEV(fixation_duration),AVG(images_duration),STDDEV(images_duration) FROM trials 	 WHERE 1

Session.end = (function() {
	Session.db.ended = mysqldate( new Date() );
	Session.db.ended_unixtime = new Date().getTime();
//	console.log('Session.end');
	
	$(window).off('keypress click',Reaction.logReaction); // stop logging key strokes
	$(document).off("fullscreenchange"); // remove error message	
	$(window).off("blur"); // remove error message
	$trial.makeInvisible().empty().removeClass('fullscreen');
	$session.removeClass('fullscreen').makeVisible();
	
	window.onbeforeunload = function() {
		return session_close_with_unsaved_changes_prompt;
	};
	Session.save();
	$('#session_outer').fullScreen(false); // leave fullscreen
});
Session.save = (function () {
	var data = {TrainingSession: Session.db };
	$.ajax(webroot+'TrainingSessions/ajaxAdd',{
		data: data,
		type: 'post',
		dataType: 'text',
		cache: false,
	}).done(function (data, textStatus, jqXHR) {
		if(data!='Gespeichert.') {
			$session.empty().append($('<div class="session_saveFail">' + session_saveFail + "<br>" + data + '</div>').append($('<button class="btn btn-large btn-primary">' + try_saving_again_button + '</button>').one('click', Session.save)));
		}
		else {
//			console.log("Session.saved");
			$session.empty().append($('<div class="session_end_message">' + session_end_message +'</div>')).makeVisible();
			window.onbeforeunload = function() {};
            location.href = location.href+'ing_end';
		}
		
	}).fail(ajaxErrorHandling);
});

Session.interrupt = (function() { // on leaving fullscreen
//	console.log('Session.interrupt');
	window.cancelAnimationFrame(Session.waitForNextStep); // don't do next step
	$(window).off('keydown'); // don't log valid responses anymore
	$(window).off('keypress click',Reaction.logReaction); // stop log key strokes for the whole session
	$(document).off("fullscreenchange"); // remove error message	
	Session.interrupted = true;

	$trial.empty().removeClass('fullscreen').makeInvisible();
	$session.empty().removeClass('fullscreen').append($('<div class="session_interruption">' + session_interruption + '</div>')).makeVisible();
	
	$('#session_outer').fullScreen(false); // leave fullscreen
});

Session.fullscreenFail = (function() { // on leaving fullscreen
//	console.log('Session.fullscreenFail');
	
	Session.interrupt();
	$session.empty().append($('<div class="session_fullscreenFail">' + session_fullscreenFail + '</div>')).makeVisible();
});

Session.featureFail = (function() { // on leaving fullscreen
//	console.log('Session.featureFail');
	
	Session.interrupt();
	
	$session.empty().append($('<div class="session_featureFail">' + session_featureFail + '</div>')).makeVisible();
});

/* ====================================
   TRIAL LOGIC
   ==================================== */

window.Trial = {
	'CurrentlyDisplayed': 'nothing',
};

Trial.begin = (function() { // start a trial
//	console.log('Trial.begin');
	Session.db.Trial[Trial.current].began_unixtime = new Date().getTime();
	$session.empty().makeInvisible();
	Trial.showFixation();
});

Trial.showFixation = (function() { 
//	console.log('Trial.showFixation');
	
	$fixation.makeVisible();
	Trial.FixationShown = performance.now();
	
	Trial.CurrentlyDisplayed = 'fixation';
	
	Session.waitForNextStep = requestTimeout(Trial.showImages, fixation_duration);
});

Trial.showImages = (function() { 
//	console.log('Trial.showImages');
	
	$fixation.makeInvisible();
//	$(window).one('MozAfterPaint', function () {
//		Trial.FixationHidden = performance.now();
//	});
	Session.imgs[Trial.current].makeVisible();
	if(console.markTimeline) console.markTimeline("images visible");
	Trial.ImagesShown = performance.now();

	Trial.CurrentlyDisplayed = 'images';
 
	Session.waitForNextStep = window.requestTimeout(Trial.showProbe, img_duration);
});

Trial.showProbe = (function() {
//	console.log('Trial.showProbe');

//	$(window).one('MozAfterPaint', function () {
//		Trial.ImagesHidden = performance.now();
//	});
	Session.imgs[Trial.current].makeInvisible();
	if(console.markTimeline) console.markTimeline("images INvisible");
	Trial.ProbeShown = performance.now();
	
	window[Trial.CurrentProbe].makeVisible();

	$(window).on('keydown',Trial.response);
	Trial.CurrentlyDisplayed = Trial.CurrentProbe;
});

// SELECT AVG( first_reaction_time_since_trial_began - first_reaction_time_since_probe_shown), STDDEV(first_reaction_time_since_trial_began - first_reaction_time_since_probe_shown) FROM trials
// should be 1000 and 0

Trial.response = (function(e) { // log valid responses
//	console.log('Trial.response');
	
	var valid_response_time = performance.now(); // same time for both time indices
	var key = String.fromCharCode( e.which ).toUpperCase();
	if(key == key_probe1 || key == key_probe2) { // if it's valid input
		Session.db.Trial[Trial.current].first_reaction_time_since_trial_began = valid_response_time - Trial.FixationShown;
		Session.db.Trial[Trial.current].first_reaction_time_since_probe_shown = valid_response_time - Trial.ProbeShown;
		Session.db.Trial[Trial.current].responded_1 = (key == key_probe1) ? 1 : 0; // bool: pressed top, false = pressed bottom
		
		$(window).off('keydown',Trial.response); // just one valid response per trial
		
		window[Trial.CurrentProbe].makeInvisible();
		
		
		if(Trial.current > number_of_test_trials - 1) // for non test trials
			Trial.end();
		else {
			if( Session.db.Trial[Trial.current].stimulus_1 !=
				Session.db.Trial[Trial.current].responded_1)
				Trial.showMistakeMessage(); // incorrect trials get reprimanded
			else {
				Trial.end();
			}
		}
        return false;
	}
});


Trial.showMistakeMessage = (function() { // log valid responses
	$mistake_message.makeVisible();
	Session.waitForNextStep = window.requestTimeout(function() {
		$mistake_message.makeInvisible();
		Trial.end()
	}, mistake_message_duration);
});

Trial.end = (function() { // log valid responses
	Session.db.Trial[Trial.current].fixation_duration = Trial.ImagesShown - Trial.FixationShown;
	
//	if(Trial.ImagesHidden)
//		Session.db.Trial[Trial.current].fixation_duration = Trial.ImagesHidden - Trial.FixationHidden;
		// commented out moz after paint code mozafterpaint code completely when live
	Session.db.Trial[Trial.current].images_duration = Trial.ProbeShown - Trial.ImagesShown;
	if(Trial.current != number_of_test_trials - 1)
		Session.nextTrial(); // trigger
	else
		Session.showTryoutFeedback();
});

Session.nobug = (function() { // log valid responses
	Session.interrupt = (function () { return true; });
});

window.Reaction = {};
Reaction.logReaction = (function(e) { // simply log all keypresses during the session
//	console.log('Reaction.logReaction');
	
	var valid_response_time = performance.now(); // same time for both time indices
	if(e.which > 3) key = String.fromCharCode( e.which );
	else key = e.which;
	
//	console.log(key);
	
	Session.db.Trial[Trial.current].Reaction.push({
		'response': key,
		'time_since_session_began': valid_response_time - Session.SessionBegan,
		'time_since_trial_began': valid_response_time - Trial.FixationShown,
		'time_since_last_probe_shown': valid_response_time - Trial.ProbeShown,
		'currently_displayed': Trial.CurrentlyDisplayed
	});
});
function saving_error(message) 
{
	$session.empty().append($('<div class="session_saveFail">' + session_saveFail + "<br>" + message + '</div>').append($('<button class="btn btn-large btn-primary">' + try_saving_again_button + '</button>').one('click', Session.save)));
}

function ajaxErrorHandling (e, x, settings, exception) 
{
	var message;
	var statusErrorMap = 
	{
	    '400' : "Server understood the request but request content was invalid.",
	    '401' : "Sie haben keinen Zugang.",
	    '403' : "Sie wurden ausgeloggt, während Sie das Formular bearbeitet haben. Bitte laden Sie neu oder loggen Sie sich in einem neuen Tab ein, damit möglichst keine Daten verloren gehen.",
	    '404' : "Seite nicht gefunden.",
	    '500' : "Interner Server Fehler.",
	    '503' : "Server nicht erreichbar."
	};
	if (e.status) 
	{
	    message =statusErrorMap[e.status];
		if(!message)
			message= (typeof e.statusText != 'undefined' && e.statusText != 'error') ? e.statusText : 'Unknown error. Check your internet connection.';
	}
	else if(e.statusText=='parsererror')
	    message="Parsing JSON Request failed.";
	else if(e.statusText=='timeout')
	    message="Speicheranfrage hat das Zeitlimit überschritten. Sind Sie mit dem Internet verbunden?";
	else if(e.statusText=='abort')
	    message="Anfrage vom Server abgebrochen.";
	else
		message= (typeof e.statusText != 'undefined' && e.statusText != 'error') ? e.statusText : 'Unbekannter Fehler. Sind Sie mit dem Internet verbunden?';

	saving_error(message);
}
