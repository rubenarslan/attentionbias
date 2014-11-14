<?php
$this->assign('title', 'Anmeldung zur Studie');
?>
<div class="span10">

	<h1><?php echo __('Anmeldung zur Studie'); ?></h1>
	<?php echo $this->Form->create('User', array('class' => 'form-horizontal')); ?>

	<div class="control-group">

		<div class="control-group">
		<?php		echo $this->Form->input('email', array(
			'class' => 'span12',
			'style' => 'width:329px',
			'type' => 'email',
			'between'=> '<div class="controls"><span class="add-on"><i class="icon-envelope"></i></span>', 
			'after' => '</div>',
			'div' => array('class' => 'input-prepend'), 
			'label' => array(
				'text' => 'E-Mail-Adresse',
				'class' => 'control-label')));
		?>
		</div>
	
		<div class="control-group">
		<?php		echo $this->Form->input('birthdate', array(
			'between'=> '<div class="controls">',
			'after' => '</div>', 
			'label' => array(
				'text' => 'Geburtsdatum',
				'class' => 'control-label',
			),
			'minYear' => date('Y') - 130,
			'maxYear' => date('Y') - 17,
			'dateFormat' => 'DMY',
			'separator' => '.',
			));
		?>
		</div>
	
		<div class="control-group controls-checkbox">
		<?php
		echo $this->Form->input('am18', array(
			'div' => array('class' => 'span4 controls'), 
			'type' => 'checkbox',
			'value'=> 1,
			'label' => 'Ich bin mindestens 18 Jahre alt.',
		));
		?>
		</div>
	
		<div class="control-group controls-checkbox">
		<?php
		echo $this->Form->input('participate_agree', array(
			'div' => array('class' => 'span4 controls'), 
			'type' => 'checkbox',
			'value'=> 1,
			'label' => array('text' => 'Ich erkläre mich freiwillig bereit, an der genannten Untersuchung teilzunehmen. Ich bin über Wesen, Bedeutung und  Tragweite der Untersuchung aufgeklärt worden.<br>Ich habe die Information zum '.$this->Html->link('Zweck der Untersuchung', '/').' und den '.$this->Html->link('Aufklärungsbogen', '/pages/study').'  gelesen und verstanden. Ich bin darauf aufmerksam gemacht worden, dass die Teilnahme jederzeit von  beiden Seiten ohne Angabe von Gründen widerrufen werden kann, ohne dass mir daraus Nachteile entstehen. Die laufende Untersuchung kann jederzeit unterbrochen werden.', 'escape' => false),
		));
		    ?>
		</div>
		<div class="control-group controls-checkbox">
		<?php
		echo $this->Form->input('data_agree', array(
			'div' => array('class' => 'span4 controls'), 
			'type' => 'checkbox',
			'value'=> 1,
			'label' => 'Ich erkläre mich damit einverstanden, dass die im Rahmen dieser Studie erhobenen Daten – wie im '.$this->Html->link('Aufklärungsbogen', '/pages/study#datenschutz').' beschrieben – aufgezeichnet, verarbeitet, und in anonymisierter Form veröffentlicht werden.',
		));
		    ?>
		</div>
	
		<div class="control-group">
		<?php
		echo $this->Form->input('password', array(
			'class' => 'span4', 
			'after' => '<span class="help-inline">Bitte wählen Sie ein sicheres, leicht zu erinnerndes Passwort.</span></div>', 
			'label' => array(
				'text' => 'Passwort',
				'class' => 'control-label'), 
			'between'=> '<div class="controls">'));
		    ?>
		</div>
	</div>


	<?php echo $this->Form->end(array(
		'label' => 'Anmeldung',
		'class' => 'btn btn-success btn-large offset3')); ?>
		
</div>