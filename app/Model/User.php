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
	 public $components = array(
			'Session',
			'Security', # the one addition
	        'Auth' => array(
				'authenticate' => array(
				            'Form' => array(
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
		if (isset($this->data['User']['password'])) {
            $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']); ## hash
		}
        return true;
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
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'password' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => "Password can't be empty.",
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
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
