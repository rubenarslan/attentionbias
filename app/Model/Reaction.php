<?php
App::uses('AppModel', 'Model');
/**
 * Reaction Model
 *
 * @property User $User
 * @property ActiveTrial $ActiveTrial
 */
class Reaction extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'response';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Trial' => array(
			'className' => 'Trial',
			'foreignKey' => 'active_trial_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
