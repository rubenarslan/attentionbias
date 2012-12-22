<div class="users form">
	<h2><?php echo __('Edit User'); ?></h2>
<?php echo $this->Form->create('User'); ?>
	<?php
		echo $this->Form->input('id');
	?>
		<div class="control-group">
		<?php   echo $this->Form->input('username', array('class' => 'span4','autofocus'=>'autofocus', 'label' => array('class' => 'control-label'), 'between'=> '<div class="controls">', 'after' => '</div>'));
		?>
		</div>
		<div class="control-group">
		<?php		echo $this->Form->input('email', array('class' => 'span12','style' => 'width:254px','between'=> '<div class="controls"><span class="add-on"><i class="icon-envelope"></i></span>', 'after' => '</div>', 'div' => array('class' => 'input-prepend'), 'label' => array('class' => 'control-label')));
		?>
		</div>
		
		<div class="control-group">
		<?php	echo $this->Form->input('group_id', array('class' => 'span4','autofocus'=>'autofocus', 'label' => array('class' => 'control-label'), 'between'=> '<div class="controls">', 'after' => '</div>'));
		?>
		</div>
		
		<div class="control-group">
		<?php
		echo $this->Form->input('affiliated_institution', array('class' => 'span4', 'after' => '<span class="help-inline">Which, if any, institution are you affiliated with?</span></div>', 'label' => array('class' => 'control-label'), 'between'=> '<div class="controls">'));
		    ?>
		</div>

		<div class="control-group">
		<?php
		echo $this->Form->input('occupation', array('class' => 'span4', 'after' => '<span class="help-inline">What is your occupation?</span></div>', 'label' => array('class' => 'control-label'), 'between'=> '<div class="controls">'));
		    ?>
		</div>

		<div class="control-group">
		<?php
		echo $this->Form->input('your_expertise', array('options' => 
			array('Very low (no statistics classes taken)', 
			'Low (undergraduate statistics training)',
			'Average (undergraduate statistics training, some interest in statistics)', 
			'High (graduate statistics training)', 
			'Very high (taught statistics classes, PhD in psychological methods, etc.)'),

			'class' => 'span4', 'after' => '<span class="help-inline">Where do you see yourself in terms of the statistical expertise needed for this meta-analysis?</span></div>', 'label' => array('class' => 'control-label'), 'between'=> '<div class="controls">'));
		    ?>
		</div>

<?php echo $this->Form->end(		array(
			'label' => 'Edit this user',
			'class' => 'btn btn-success btn-large offset1')); ?>
</div>

<div class="actions btn-group">
	<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><?php echo __('Actions'); ?><span class="caret"></span>
	  </a>
	<ul class="dropdown-menu">
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Codedpapers'), array('controller' => 'codedpapers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Codedpaper'), array('controller' => 'codedpapers', 'action' => 'add')); ?> </li>
	</ul>
</div>
