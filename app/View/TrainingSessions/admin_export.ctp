<?php
$title_for_layout = 'TrainingSession';
function d($field) {
	if(is_bool($field)) return $field ? 1 : 0;
	else return h($field);
}

if($exportformat!='excel') {
	if($exportformat=='TSV') {
		$this->CSV->delimiter = "\t";
	}

	$line= $toExport[0][$title_for_layout];
	$this->CSV->addRow(array_keys($line)); // add headers

	foreach ($toExport AS $line) { // loop through DB output
		$this->CSV->addRow($line[$title_for_layout]); // add lines
	}
	$filename =  date('Ymdhis'). "_" . $title_for_layout;

	echo  $this->CSV->render($filename); // display for download
} else {
	?>
	<STYLE type="text/css">
		.tableTd {
		   	border-width: 0.5pt; 
			border: solid; 
		}
		.tableTdContent{
			border-width: 0.5pt; 
			border: solid;
		}
		#titles{
			font-weight: bold;
		}
	</STYLE>
	<table>
			<tr id="titles">
			<?php
			foreach(array_keys($toExport[0][$title_for_layout]) AS $field):
			?>
				<th><?=$field?></th>
			<?php endforeach; ?>
			</tr>		
			<?php
			foreach($toExport AS $TS): ?>
			<tr>
				<?php 
				foreach($TS[$title_for_layout] AS $field_content):
				?>
				<td><?=d($field_content); ?></td>
				<?php endforeach; ?>
			</tr>
		<?php endforeach; ?>
	</table>

<?php	
}
?>