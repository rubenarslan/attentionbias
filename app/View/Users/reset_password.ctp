<?php
$this->assign('title', 'Passwort zurücksetzen');
?>
<h2>Passwort vergessen</h2>
<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
	<p><?php echo __('Geben Sie ein neues Passwort ein. Sie können sich daraufhin mit Ihrer E-Mail-Adresse und dem neuen Passwort einloggen.'); ?></p>
	<?php   
	echo $this->Form->input('password', array(
		'type' => 'password',
	));
    	?>
<?php echo $this->Form->end(array(
		'label' => 'Passwort ändern',
		'class' => 'btn')); ?>
</div>