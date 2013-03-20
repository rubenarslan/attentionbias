<div class="users view">
<h2><?php  echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('E-Mail'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($user['User']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Condition'); ?></dt>
		<dd>
			<?php echo h($user['User']['condition']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Training Sessions'), array('controller' => 'training_sessions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Training Session'), array('controller' => 'training_sessions', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Training Sessions'); ?></h3>
	<?php if (!empty($user['TrainingSession'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Number'); ?></th>
		<th><?php echo __('Loaded'); ?></th>
		<th><?php echo __('Loaded Unixtime'); ?></th>
		<th><?php echo __('Began'); ?></th>
		<th><?php echo __('Began Unixtime'); ?></th>
		<th><?php echo __('Ended'); ?></th>
		<th><?php echo __('Ended Unixtime'); ?></th>
		<th><?php echo __('Condition'); ?></th>
		<th><?php echo __('Browser'); ?></th>
		<th><?php echo __('Browser Version'); ?></th>
		<th><?php echo __('Operating System'); ?></th>
		<th><?php echo __('Browser Language'); ?></th>
		<th><?php echo __('Window Width'); ?></th>
		<th><?php echo __('Document Width'); ?></th>
		<th><?php echo __('Window Height'); ?></th>
		<th><?php echo __('Document Height'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['TrainingSession'] as $trainingSession): ?>
		<tr>
			<td><?php echo $trainingSession['id']; ?></td>
			<td><?php echo $trainingSession['user_id']; ?></td>
			<td><?php echo $trainingSession['number']; ?></td>
			<td><?php echo $trainingSession['loaded']; ?></td>
			<td><?php echo $trainingSession['loaded_unixtime']; ?></td>
			<td><?php echo $trainingSession['began']; ?></td>
			<td><?php echo $trainingSession['began_unixtime']; ?></td>
			<td><?php echo $trainingSession['ended']; ?></td>
			<td><?php echo $trainingSession['ended_unixtime']; ?></td>
			<td><?php echo $trainingSession['condition']; ?></td>
			<td><?php echo $trainingSession['browser']; ?></td>
			<td><?php echo $trainingSession['browser_version']; ?></td>
			<td><?php echo $trainingSession['operating_system']; ?></td>
			<td><?php echo $trainingSession['browser_language']; ?></td>
			<td><?php echo $trainingSession['window_width']; ?></td>
			<td><?php echo $trainingSession['document_width']; ?></td>
			<td><?php echo $trainingSession['window_height']; ?></td>
			<td><?php echo $trainingSession['document_height']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'training_sessions', 'action' => 'view', $trainingSession['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'training_sessions', 'action' => 'edit', $trainingSession['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'training_sessions', 'action' => 'delete', $trainingSession['id']), null, __('Are you sure you want to delete # %s?', $trainingSession['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Training Session'), array('controller' => 'training_sessions', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
