<?php
App::uses('AppController', 'Controller');
class TrialsController extends AppController {
	function isAuthorized($user = null, $request = null) {	
		$req_action = $this->request->params['action'];
		if(in_array($req_action, array('train'))) return true; # viewing and adding is allowed to all users

		return parent::isAuthorized($user); # allow admins to do anything
	}
	public function train() {
		
	}
	function admin_export($exportformat='CSV')
		{
			$toExport = $this->Trial->find('all');

		    $this->set(compact('toExport','exportformat'));
			if($exportformat=='excel') $this->layout = 'export_xls';
			else { 
				$this->layout = null;
		    	$this->autoLayout = false;
			}
	}
	
}