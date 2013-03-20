<?php
$this->assign('title', 'Login');
?><h2>Login</h2>
<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
	<p><?php echo __('Bitte geben Sie Ihre E-Mail-Adresse und Ihr Passwort ein.'); ?></p>
	<p><?=$this->Html->link('Haben Sie Ihr Passwort vergessen?','/users/forgotPassword'); ?></p>
	<?php   
	echo $this->Form->input('email', array(
		'autofocus'=>'autofocus',
		'type' => 'email',
		'label' => 'E-Mail',
	));
        echo $this->Form->input('password');
    	?>
<?php echo $this->Form->end(array(
		'label' => 'Login',
		'class' => 'btn btn-success')); ?>
</div>