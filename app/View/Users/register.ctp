<h1><?php echo __('Neuanmeldung'); ?></h1>
<?php echo $this->Form->create('User', array('class' => 'form-horizontal')); ?>

<div class="control-group">
<?php		echo $this->Form->input('email', array(
	'class' => 'span12',
	'style' => 'width:329px',
	'between'=> '<div class="controls"><span class="add-on"><i class="icon-envelope"></i></span>', 
	'after' => '</div>',
	'div' => array('class' => 'input-prepend'), 
	'label' => array(
		'text' => 'E-Mail-Adresse',
		'class' => 'control-label')));
?>
</div>
<div class="control-group">
<?php
echo $this->Form->input('password', array(
	'class' => 'span4', 
	'after' => '<span class="help-inline">Bitte wählen Sie eine sichere, leicht zu erinnernde Passwort-Phrase.</span></div>', 
	'label' => array(
		'text' => 'Passwort',
		'class' => 'control-label'), 
	'between'=> '<div class="controls">'));
    ?>
<br></div>


<?php echo $this->Form->end(array(
	'label' => 'Register',
	'class' => 'btn btn-success btn-large offset3')); ?>