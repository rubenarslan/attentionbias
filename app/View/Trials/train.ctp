<?php
$this->start('script'); ?>
<script src="<?php echo $this->webroot; ?>js/jquery.fullscreen.js"></script>
<script type="text/javascript">
//<![CDATA[

/*
--------- CONFIGURATION
 */
var imgpath_base = "<?php echo $this->webroot; ?>" + "img/training/";
var webroot = "<?php echo $this->webroot; ?>";
var condition = "<?=$condition?>";
var session_number = <?=++$prevSessions;?>;
var fixation_duration = 500; // how long fixations are displayed
var img_duration = 500;
var mistake_message_duration = 2000;

// keys for user input "probe was at the top", ".. down". use keys that are usually located in the same place for your target group (i.e. not y/z, umlauts, commas brackets, arrow keys etc.), and note that this uses the keydown event, not the keypress event (which is better at understanding the keyboard mapping)
var key_probe1 = 'R'; // have to be uppercase here (user input is recognised either way)
var key_probe2 = 'P';

// image ids, that also double as file names (could easily be changed)
var ocd_imgs = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,
21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40];
var neutral_imgs = [41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,
61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80];
var test_imgs = [101, 102, 103, 104, 105, 106, 107, 108, 109, 110, 111, 112];
//]]>
</script>
<script src="<?php echo $this->webroot; ?>js/train.js"></script>
<?php $this->end(); ?>
<?php
$this->assign('title', 'Aufmerksamkeitstrainingsprogramm');
?>
<div class="span10">
	<?php
    function reverse($x) { return -1 * round($x); }
if(count($progress)>1) {
    $sesscount = range(1,count($progress));
    $sess_verbal = $sesscount;
    for($i=0;$i<count($sess_verbal);$i++)
    {
        $sess_verbal[$i] = '';
    }
    $sess_verbal[$i] = 'heute';
    #chxr=1,'. min($progress) . ',' . max($progress) .'|0,'. count($progress) . ',0'
#        chdl=Ihre+Schnelligkeit&amp;
#        chdlp=b&amp;
	echo "<h4>Ihr ATP-Fortschritt</h4>";
	echo '<div class="row"><p class="span5">';
    $progress = array_map("reverse",$progress);
	$dataseturl = 'chd=t:' . implode(',',$sesscount) .'|'. implode(',',$progress);
	if(max($progress)!=0) $dataseturl .= '&amp;chds=1,'.max($sesscount).','.min($progress).','.max($progress);
	echo '<img src="http://chart.apis.google.com/chart?
chs=500x150&amp;
chm=B,0,0,0,0&amp;
chxl=0:|'.implode($sess_verbal,'|').'|1:|'.implode($sesscount,'. TE|').'. TE|2:|langsam|schnell&amp;
chxr=0,'. min($sesscount) . ',' . max($sesscount) .',1|1,'. min($progress) . ',' . max($progress) .'&amp;
chxt=x,x,y&amp;
chco=0077CC&amp;
cht=lxy&amp;
'
.$dataseturl . '" 
    
    alt="Graph Ihres Fortschritt" title="Ihr Fortschritt. Ihre neuesten Ergebnisse stehen rechts, die Zahlen auf der x-Achse zeigen die Trainingssitzungen an." />';
	echo '</p>';
echo "<p class='span4'>Hier sehen Sie Ihren persönlichen Fortschritt beim ATP. In der Grafik können Sie Ihren heutigen Trainingserfolg mit Ihren bisherigen Leistungen vergleichen. 
Je steiler die blaue Linie, desto größer ist ihr Trainingserfolg!</p></div>";
}

	?>
	<?php
	if(!$hadLastSession):
	?>
	<div id="session_outer">
	
	<div id="session">
	
		<h4>Hier gelangen Sie zu Ihrem persönlichen Trainingsbereich.</h4>
		<p>	Bitte klicken Sie auf „Weiter“, um mit dem Training anzufangen.</p>
	
			<div class="session_begin">
				Für die korrekte Darstellung der Aufgabe, müssen Sie JavaScript in Ihren Browser-Einstellungen erlauben.
				Eine genaue Anleitung dafür finden Sie <a href="http://www.enable-javascript.com/de/">auf dieser Homepage</a>.
			</div>
		</div>
		<div id="trial">
			<div style="visibility:hidden" id="fixation"></div>
			<div style="visibility:hidden" id="probe1_top" class="probe_top"></div>
			<div style="visibility:hidden" id="probe1_bottom" class="probe"></div>
			<div style="visibility:hidden" id="probe2_top" class="probe_top"></div>
			<div style="visibility:hidden" id="probe2_bottom" class="probe"></div>
			<div style="visibility:hidden" id="mistake_message">Falsche Antwort</div>
		</div>
	</div>
	<?php 
	else: ?>
	<h4>Das Training ist beendet.</h4>
	<p>Vielen Dank für Ihre Teilnahme!</p>
	
	<?php
	endif;
	?>
</div>