<h2>Login</h2>
<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
        <p><?php echo __('Bitte geben Sie Ihre Email-Adresse und Ihr Passwort ein.'); ?></p>
    <?php   
		echo $this->Form->input('email', array(
			'autofocus'=>'autofocus',
			'type' => 'email',
		));
        echo $this->Form->input('password');
    ?>
<?php echo $this->Form->end(array(
		'label' => 'Login',
		'class' => 'btn btn-success')); ?>
</div>