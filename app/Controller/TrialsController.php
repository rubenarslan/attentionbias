<?php
App::uses('AppController', 'Controller');
class TrialsController extends AppController {
	function isAuthorized($user = null, $request = null) {	
		$admin = parent::isAuthorized($user); # allow admins to do anything
		if($admin) return true;		

		$req_action = $this->request->params['action'];
		if(in_array($req_action, array('train'))) return true; # viewing and adding is allowed to all users
	}
	public function train() {
		
	}
}