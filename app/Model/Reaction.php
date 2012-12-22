<?php
App::uses('AppModel', 'Model');
/**
 * Reaction Model
 *
 * @property User $User
 * @property ActiveTrial $ActiveTrial
 */
class Reaction extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ActiveTrial' => array(
			'className' => 'ActiveTrial',
			'foreignKey' => 'active_trial_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
