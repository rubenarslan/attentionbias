<?php
function reverse($x) { return -1 * round($x); }
    
?>
<div class="users index">
	<h2><?php echo __('Users'); ?></h2>
	<table class="table">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('group_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('lastname','Name'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('code'); ?></th>
			<th><?php echo $this->Paginator->sort('condition'); ?></th>
			<th><?php echo h('Progress'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
		</td>
		<td><small><?php echo h($user['User']['created']); ?></small>&nbsp;</td>
		<td><small><?php echo h($user['User']['modified']); ?></small>&nbsp;</td>
		<td><?php echo h($user['User']['firstname'])." ".h($user['User']['lastname']); ?>&nbsp;</td>
		<td><small><?php echo h($user['User']['email']); ?></small>&nbsp;</td>
		<td><div style="width:95px;word-wrap:break-word;"><small style="font-size:8px"><?php echo h($user['User']['code']); ?>&nbsp;</small></div></td>
		<td><?php echo h($user['User']['condition']); ?>&nbsp;</td>
		<td><?php 
		$progress = $user['User']['progress'];
    if(count($progress)>1) {
        $sesscount = range(1,count($progress));
        #chxr=1,'. min($progress) . ',' . max($progress) .'|0,'. count($progress) . ',0'
    #        chdl=Ihre+Schnelligkeit&amp;
    #        chdlp=b&amp;
        $progress = array_map("reverse",$progress);
    	$dataseturl = 'chd=t:' . implode(',',$sesscount) .'|'. implode(',',$progress);
    	if(max($progress)!=0) $dataseturl .= '&amp;chds=1,'.max($sesscount).','.min($progress).','.max($progress);
    	echo '<img src="http://chart.apis.google.com/chart?
chs=300x70&amp;
chm=B,0,0,0,0&amp;
chxl=0:|'.implode($sesscount,'. TE|').'. TE|1:|langsam|schnell&amp;
chxr=0,'. min($sesscount) . ',' . max($sesscount) .',1|1,'. min($progress) . ',' . max($progress) .'&amp;
chxt=x,y&amp;
chco=0077CC&amp;
cht=lxy&amp;
'
    .$dataseturl . '" 
    
        alt="Graph des Fortschritt" title="User-Fortschritt." />';
    		} elseif (count($progress)==1) {
			echo 'just 1 Session, AVG '. round(current($progress));
		}
		 ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Training Sessions'), array('controller' => 'training_sessions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Training Session'), array('controller' => 'training_sessions', 'action' => 'add')); ?> </li>
	</ul>
</div>
