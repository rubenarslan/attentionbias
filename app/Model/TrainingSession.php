<?php
App::uses('AppModel', 'Model');
/**
 * TrainingSession Model
 *
 * @property User $User
 * @property session_id $Trial
 */
class TrainingSession extends AppModel {
	 public $actsAs = array('Containable');
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
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Trial' => array(
			'className' => 'Trial',
			'foreignKey' => 'session_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
