<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $helpers = array("Html","Form", "Js", "Csv");
	public $components = array(
			'Session',
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
		'RequestHandler',
	);
	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('login','logout','register','pages','display','forgotPassword','resetPassword');
	        $this->Auth->loginAction = array('controller' => 'Users', 'action' => 'login');
	        $this->Auth->logoutRedirect = array('controller' => 'pages', 'action' => 'display');
	        $this->Auth->loginRedirect = array('controller' => 'Trials', 'action' => 'train');
	}
	public function isAuthorized($user = null, $request = null) {
		$admin = $user['Group']['name']==='admin';
		if($admin) return $admin; # admins can do anything 
	}
}
App::uses('CakeEmail', 'Network/Email');