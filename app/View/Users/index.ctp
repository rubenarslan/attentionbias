<div class="users index">
	<h2><?php echo __('Users'); ?></h2>
	<table class="table">
	<tr>
			<th><?php echo $this->Paginator->sort('group_id'); ?></th>
			<th><?php echo $this->Paginator->sort('username'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('affiliated_institution','Institution'); ?></th>
			<th><?php echo $this->Paginator->sort('occupation'); ?></th>
			<th><?php echo $this->Paginator->sort('your_expertise','Expertise'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($users as $user): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
		</td>
		<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
		<td title="<?=h($user['User']['created']);?>"><?php echo h(date('Y-m-d',strtotime($user['User']['created']))); ?>&nbsp;</td>
		<td><?php echo h($user['User']['affiliated_institution']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['occupation']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['your_expertise']); ?>&nbsp;</td>
		<td class="actions">
			<div class="btn-group">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id']),array('class'=>'btn btn-small')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id']),array('class'=>'btn btn-small')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array('class'=>'btn  btn-small'), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
			</div>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
<div class="actions btn-group">
	<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><?php echo __('Actions'); ?><span class="caret"></span>
	  </a>
	<ul class="dropdown-menu">
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Codedpapers'), array('controller' => 'codedpapers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Codedpaper'), array('controller' => 'codedpapers', 'action' => 'add')); ?> </li>
	</ul>
</div>


	<div class="pagination pagination-centered">
		<ul>
	<?php
		echo "<li>";
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo "</li><li>";
		echo $this->Paginator->numbers(array('separator' => '</li><li>'));
		echo "</li><li>";
		echo $this->Paginator->next(__('next') . ' >',array(), null, array('class' => 'next disabled'));
		echo "</li><li>";
	?>
		</ul>
	</div>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>