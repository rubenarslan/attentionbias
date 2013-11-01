<div class="trainingSessions view">
<h2><?php  echo __('Training Session'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($trainingSession['TrainingSession']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($trainingSession['User']['name'], array('controller' => 'users', 'action' => 'view', $trainingSession['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Number'); ?></dt>
		<dd>
			<?php echo h($trainingSession['TrainingSession']['number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Loaded'); ?></dt>
		<dd>
			<?php echo h($trainingSession['TrainingSession']['loaded']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Loaded Unixtime'); ?></dt>
		<dd>
			<?php echo h($trainingSession['TrainingSession']['loaded_unixtime']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Began'); ?></dt>
		<dd>
			<?php echo h($trainingSession['TrainingSession']['began']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Began Unixtime'); ?></dt>
		<dd>
			<?php echo h($trainingSession['TrainingSession']['began_unixtime']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ended'); ?></dt>
		<dd>
			<?php echo h($trainingSession['TrainingSession']['ended']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ended Unixtime'); ?></dt>
		<dd>
			<?php echo h($trainingSession['TrainingSession']['ended_unixtime']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Condition'); ?></dt>
		<dd>
			<?php echo h($trainingSession['TrainingSession']['condition']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Training Session'), array('action' => 'edit', $trainingSession['TrainingSession']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Training Session'), array('action' => 'delete', $trainingSession['TrainingSession']['id']), null, __('Are you sure you want to delete # %s?', $trainingSession['TrainingSession']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Training Sessions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Training Session'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Trials'), array('controller' => 'trials', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trial'), array('controller' => 'trials', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Trials'); ?></h3>
	<?php if (!empty($trainingSession['Trial'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Session Id'); ?></th>
		<th><?php echo __('Number'); ?></th>
		<th><?php echo __('Began Unixtime'); ?></th>
		<th><?php echo __('Ocd Image Id'); ?></th>
		<th><?php echo __('Neutral Image Id'); ?></th>
		<th><?php echo __('Ocd On Top'); ?></th>
		<th><?php echo __('Probe On Top'); ?></th>
		<th><?php echo __('First Reaction Time Since Trial Began'); ?></th>
		<th><?php echo __('First Reaction Time Since Probe Shown'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($trainingSession['Trial'] as $trial): ?>
		<tr>
			<td><?php echo $trial['id']; ?></td>
			<td><?php echo $trial['session_id']; ?></td>
			<td><?php echo $trial['number']; ?></td>
			<td><?php echo $trial['began_unixtime']; ?></td>
			<td><?php echo $trial['ocd_image_id']; ?></td>
			<td><?php echo $trial['neutral_image_id']; ?></td>
			<td><?php echo $trial['ocd_on_top']; ?></td>
			<td><?php echo $trial['probe_on_top']; ?></td>
			<td><?php echo $trial['first_reaction_time_since_trial_began']; ?></td>
			<td><?php echo $trial['first_reaction_time_since_probe_shown']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'trials', 'action' => 'view', $trial['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'trials', 'action' => 'edit', $trial['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'trials', 'action' => 'delete', $trial['id']), null, __('Are you sure you want to delete # %s?', $trial['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Trial'), array('controller' => 'trials', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
