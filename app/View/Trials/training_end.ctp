<?php
$this->assign('title', 'Aufmerksamkeitstraining erfolgreich');
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
	
<h3>Ende der Trainingseinheit. Sie haben es geschafft!</h3>

<p>Vielen Dank für Ihre heutige Teilnahme!</p>

<p>Sie können Radio, Dropbox, Chat und andere Programme jetzt wieder einschalten :)</p>

<p>Wenn Sie möchten, können Sie auch <?php echo $this->Html->link('noch eine Runde trainieren','/trials/train');?>.</p>

</div>