<h2>Login</h2>
<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
        <p><?php echo __('Bitte geben Sie Ihren Benutzernamen und Ihr Passwort ein.'); ?></p>
    <?php   
		echo $this->Form->input('name', array('autofocus'=>'autofocus'));
        echo $this->Form->input('password');
    ?>
<?php echo $this->Form->end(array(
		'label' => 'Login',
		'class' => 'btn btn-success')); ?>
</div>