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
/*
 * preload images
 * add trial rows (and update them)
 * periodically sync
 * display stuff
*/

var imgpath = "<?php echo $this->webroot; ?>" + "img/training/";
var fixation_duration = 500;
var img_duration = 4000;

console.log(imgpath);
function fisherYates ( myArray ) {
  var i = myArray.length;
  if ( i == 0 ) return false;
  while ( --i ) {
     var j = Math.floor( Math.random() * ( i + 1 ) );
     var tempi = myArray[i];
     var tempj = myArray[j];
     myArray[i] = tempj;
     myArray[j] = tempi;
   }
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

window.trial = {};
trial.begin = (function(top, bot) {
	console.log(top);
	trial.fixation = $('<div class="fixation">+</div>');
	$('#trial').empty();
	$('#trial').append(trial.fixation);
	setTimeout((function() {
		console.log(top);
		$('#trial').empty();
		trial.img = $('<div class="trial_images"><img src="' + imgpath + top + '.jpg"><br><img src="'+ imgpath + bot + '.jpg"></div>');
		$('#trial').append(trial.img);
		setTimeout((function() {
			$('#trial').empty();
			trial.img = $('<div class="probe +'+ probe_top +'">x</div>');
		}), img_duration);
	}), fixation_duration);
});

trial.add = (function() {
	
})();

window.session = {};
session.loaded = new Date();
session.loaded_unixtime = new Date().getTime();

ocd_stimuli = [1,2,3];
neutral_stimuli = [4,5,6];

session.sequence_top = ocd_stimuli;
session.sequence_bottom = neutral_stimuli; 
session.counter = 0;
session.begin = (function() {
	session.began = new Date();
	session.began_unixtime = new Date().getTime();
	session.began_performance = performance.now();
	session.instructions = $('<div class="session_instructions">Bitte klicken Sie auf den Knopf, wenn Sie anfangen wollen.<br>Drücken Sie "o", wenn der Punkt oben erscheint, und "v", wenn der Punkt unten	erscheint.<br><button id="begin_trial" class="btn btn btn-success">Es kann losgehen!</button></div>');
	$('#trial').empty();
	$('#trial').append(session.instructions);
	$('#begin_trial').click(function () {
		session.nextTrial();
	});
});
session.nextTrial = (function() {	
	trial.begin(session.sequence_top[session.counter] , session.sequence_bottom[session.counter]);
	session.counter++;
});


$(document).ready(function () {
		
		//$(document).fullScreen(false); // exit full screen
	$('#begin_session').click(function () {
		if($('#trial_outer').fullScreen() != null) { // supports full screen
			$('#trial_outer').fullScreen(true);
			session.begin();
			
		} else { // different browser needed
			alert('Bitte benutzen Sie einen Browser, der Fullscreen unterstützt.');
		}
		
	});
	
});
//]]>
</script>
<?php $this->end(); ?>