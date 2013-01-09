<div class="trainingSessions index">
	<h2><?php echo __('Training Sessions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('number'); ?></th>
			<th><?php echo $this->Paginator->sort('loaded'); ?></th>
			<th><?php echo $this->Paginator->sort('loaded_unixtime'); ?></th>
			<th><?php echo $this->Paginator->sort('began'); ?></th>
			<th><?php echo $this->Paginator->sort('began_unixtime'); ?></th>
			<th><?php echo $this->Paginator->sort('ended'); ?></th>
			<th><?php echo $this->Paginator->sort('ended_unixtime'); ?></th>
			<th><?php echo $this->Paginator->sort('condition'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($trainingSessions as $trainingSession): ?>
	<tr>
		<td><?php echo h($trainingSession['TrainingSession']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($trainingSession['User']['name'], array('controller' => 'users', 'action' => 'view', $trainingSession['User']['id'])); ?>
		</td>
		<td><?php echo h($trainingSession['TrainingSession']['number']); ?>&nbsp;</td>
		<td><?php echo h($trainingSession['TrainingSession']['loaded']); ?>&nbsp;</td>
		<td><?php echo h($trainingSession['TrainingSession']['loaded_unixtime']); ?>&nbsp;</td>
		<td><?php echo h($trainingSession['TrainingSession']['began']); ?>&nbsp;</td>
		<td><?php echo h($trainingSession['TrainingSession']['began_unixtime']); ?>&nbsp;</td>
		<td><?php echo h($trainingSession['TrainingSession']['ended']); ?>&nbsp;</td>
		<td><?php echo h($trainingSession['TrainingSession']['ended_unixtime']); ?>&nbsp;</td>
		<td><?php echo h($trainingSession['TrainingSession']['condition']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $trainingSession['TrainingSession']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $trainingSession['TrainingSession']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $trainingSession['TrainingSession']['id']), null, __('Are you sure you want to delete # %s?', $trainingSession['TrainingSession']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Training Session'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Trials'), array('controller' => 'trials', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trial'), array('controller' => 'trials', 'action' => 'add')); ?> </li>
	</ul>
</div>
