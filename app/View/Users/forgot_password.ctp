<?php
$this->assign('title', 'Passwort vergessen');
?>
<h2>Passwort vergessen</h2>
<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
	<p><?php echo __('Haben Sie Ihr Passwort vergessen? Bitte geben Sie Ihre E-Mail-Adresse ein, wir schicken Ihnen
	einen Link, um Ihr Passwort zurückzusetzen.'); ?></p>
	<?php   
	echo $this->Form->input('email', array(
		'autofocus'=>'autofocus',
		'type' => 'email',
	));
    	?>
<?php echo $this->Form->end(array(
		'label' => 'Link zuschicken',
		'class' => 'btn btn-success')); ?>
</div>