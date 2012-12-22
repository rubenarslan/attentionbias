<?php
if($exportformat!='excel') {
	if($exportformat=='TSV') {
		$this->CSV->delimiter = "\t";
	}

	$line= $joinedCodedpapers[0]['JoinedCodedpaper'];
	$this->CSV->addRow(array_keys($line)); // add headers

	foreach ($joinedCodedpapers as $JC) { // loop through DB output
		$line = $JC['JoinedCodedpaper'];
		$this->CSV->addRow($line); // add lines
	}
	$filename='joinedCodedpapers';

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
				<th>DOI</th>
				<th>APA</th>
				<th>title</th>
				<th>first_author</th>
				<th>journal</th>
				<th>volume</th>
				<th>issue</th>
				<th>publisher</th>
				<th>URL</th>
				<th>year</th>
				<th>page</th>
				<th>type</th>
				<th>abstract</th>
				<th>readers</th>
				<th>pubmed_id</th>
				<th>pubmed_nr_of_citations</th>
				<th>paper_id</th>
				<th>user_id</th>
				<th>created</th>
				<th>modified</th>
				<th>completed</th>
				<th>group_id</th>
				<th>username</th>
				<th>email</th>
				<th>affiliated_institution</th>
				<th>occupation</th>
				<th>your_expertise</th>
				<th>codedpaper_id</th>
				<th>study_name</th>
				<th>replication_code</th>
				<th>replicates_study_id</th>
				<th>study_id</th>
				<th>test_name</th>
				<th>analytic_design_code</th>
				<th>methodology_codes</th>
				<th>independent_variables</th>
				<th>dependent_variables</th>
				<th>other_variables</th>
				<th>hypothesized</th>
				<th>prior_hypothesis</th>
				<th>data_points_excluded</th>
				<th>reasons_for_exclusions</th>
				<th>type_of_statistical_test_used</th>
				<th>N_used_in_analysis</th>
				<th>inferential_test_statistic</th>
				<th>inferential_test_statistic_value</th>
				<th>degrees_of_freedom</th>
				<th>reported_significance_of_test</th>
				<th>computed_significance_of_test</th>
				<th>hypothesis_supported</th>
				<th>reported_effect_size_statistic</th>
				<th>reported_effect_size_statistic_value</th>
			</tr>		
			<?php
			foreach ($joinedCodedpapers as $joinedCodedpaper): ?>
			<tr>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['DOI']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['APA']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['title']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['first_author']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['journal']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['volume']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['issue']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['publisher']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['URL']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['year']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['page']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['type']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['abstract']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['readers']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['pubmed_id']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['pubmed_nr_of_citations']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['paper_id']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['user_id']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['created']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['modified']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['completed']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['group_id']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['username']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['email']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['affiliated_institution']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['occupation']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['your_expertise']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['codedpaper_id']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['study_name']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['replication_code']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['replicates_study_id']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['study_id']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['test_name']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['analytic_design_code']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['methodology_codes']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['independent_variables']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['dependent_variables']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['other_variables']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['hypothesized']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['prior_hypothesis']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['data_points_excluded']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['reasons_for_exclusions']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['type_of_statistical_test_used']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['N_used_in_analysis']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['inferential_test_statistic']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['inferential_test_statistic_value']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['degrees_of_freedom']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['reported_significance_of_test']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['computed_significance_of_test']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['hypothesis_supported']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['reported_effect_size_statistic']); ?></td>
				<td><?php echo h($joinedCodedpaper['JoinedCodedpaper']['reported_effect_size_statistic_value']); ?></td>
			</tr>
		<?php endforeach; ?>
	</table>

<?php	
}
?>