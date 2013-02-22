<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Group $Group
 * @property Reaction $Reaction
 * @property Session $Session
 * @property Trial $Trial
 */
class User extends AppModel {
	 public $actsAs = array('Containable');
	 public $components = array(
			'Session',
			'Security', # the one addition
	        'Auth' => array(
				'authenticate' => array(
				            'Blowfish' => array(
				                'fields' => array(
									'username' => 'email',
									'password' => 'password',
								),
				            )
				),
				'authorize' => 
					array(
						'Controller' => 
							array(
								'recursive' => 3,
							)
					)
			), # Controller means that the controller's function isAuthorized will be called

			'RequestHandler'
	);
	public function beforeSave($options = array()) {
		if (isset($this->data['User']['password']))
            $this->data['User']['password'] = Security::hash($this->data['User']['password'],'blowfish'); ## hash
		if (isset($this->data['User']['hashed_reset_token']))
        $this->data['User']['hashed_reset_token'] = Security::hash($this->data['User']['hashed_reset_token'],'blowfish'); ## hash
        return true;
	}
	public function generateResetToken($id) {
		$reset_token = md5(mt_rand()*mt_rand());
		$this->read(null,$id);
		$this->set(array(
			'hashed_reset_token' => $reset_token,
			'reset_token_expiration' => date('Y-m-d H:i:s',strtotime("+2 days")),
		));		
		if($this->save())
			return $reset_token;
		else return false;
	}
	
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'email';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'group_id' => array(
			'naturalnumber' => array(
				'rule' => array('naturalnumber'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'created' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'modified' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'Email address has to be valid.',
				'allowEmpty' => false,
				'required' => true,
			),
			'isUnique' => array(
				'rule' => 'isUnique',
				'message' => 'This email address is already registered.'
			),
		),
		'code' => array(
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'birthdate' => array(
			'date' => array(
				'rule' => array('date'),
				'message' => "Bitte geben Sie ein gültiges Geburtsdatum ein.",
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'am18' => array(
	        'rule'    => array('comparison', '==', 1),
			'message' => "Sie müssen mindestens 18 sein, um teilzunehmen.",
			'allowEmpty' => false,
			'required' => true,
			'on' => 'create', // Limit validation to 'create' or 'update' operations
		),
		'data_agree' => array(
	        'rule'    => array('comparison', '==', 1),
			'message' => "Sie müssen der Verwendung Ihrer Daten zustimmen.",
			'allowEmpty' => false,
			'required' => true,
			'on' => 'create', // Limit validation to 'create' or 'update' operations
			
		),
		'participate_agree' => array(
	        'rule'    => array('comparison', '==', 1),
			'message' => "Sie müssen den Teilnahmebedingungen zustimmen.",
			'allowEmpty' => false,
			'required' => true,
			'on' => 'create', // Limit validation to 'create' or 'update' operations
			
		),
		'password' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => "Password can't be empty.",
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
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

		'TrainingSession' => array(
			'className' => 'TrainingSession',
			'foreignKey' => 'user_id',
			'dependent' => false,
		),
	);

}
