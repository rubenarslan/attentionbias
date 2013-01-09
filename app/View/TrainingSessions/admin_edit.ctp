<div class="trainingSessions form">
<?php echo $this->Form->create('TrainingSession'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Training Session'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('number');
		echo $this->Form->input('loaded');
		echo $this->Form->input('loaded_unixtime');
		echo $this->Form->input('began');
		echo $this->Form->input('began_unixtime');
		echo $this->Form->input('ended');
		echo $this->Form->input('ended_unixtime');
		echo $this->Form->input('condition');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('TrainingSession.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('TrainingSession.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Training Sessions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Trials'), array('controller' => 'trials', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trial'), array('controller' => 'trials', 'action' => 'add')); ?> </li>
	</ul>
</div>
