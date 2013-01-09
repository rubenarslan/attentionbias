<?php
App::uses('AppModel', 'Model');
/**
 * Trial Model
 *
 * @property User $User
 * @property Session $Session
 */
class Trial extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'number';


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
		'Session' => array(
			'className' => 'Session',
			'foreignKey' => 'session_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
