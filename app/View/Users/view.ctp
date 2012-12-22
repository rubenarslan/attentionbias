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
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions btn-group">
	<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><?php echo __('Actions'); ?><span class="caret"></span>
	  </a>
	<ul class="dropdown-menu">
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Codedpapers'), array('controller' => 'codedpapers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Codedpaper'), array('controller' => 'codedpapers', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Codedpapers'); ?></h3>
	<?php if (!empty($user['Codedpaper'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Paper Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Codedpaper'] as $codedpaper): ?>
		<tr>
			<td><?php echo $codedpaper['id']; ?></td>
			<td><?php echo $codedpaper['paper_id']; ?></td>
			<td><?php echo $codedpaper['user_id']; ?></td>
			<td><?php echo $codedpaper['created']; ?></td>
			<td><?php echo $codedpaper['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'codedpapers', 'action' => 'view', $codedpaper['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'codedpapers', 'action' => 'edit', $codedpaper['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'codedpapers', 'action' => 'delete', $codedpaper['id']), null, __('Are you sure you want to delete # %s?', $codedpaper['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

<div class="actions btn-group">
	<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><?php echo __('Actions'); ?><span class="caret"></span>
	  </a>
	<ul class="dropdown-menu">
			<li><?php echo $this->Html->link(__('New Codedpaper'), array('controller' => 'codedpapers', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
