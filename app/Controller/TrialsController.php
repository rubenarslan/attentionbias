<?php
App::uses('AppController', 'Controller');
class TrialsController extends AppController {
	function isAuthorized($user = null, $request = null) {	
		$req_action = $this->request->params['action'];
		if(in_array($req_action, array('train'))) return true; # viewing and adding is allowed to all users

		return parent::isAuthorized($user); # allow admins to do anything
	}
	public function train() {
		$prevSessions = $this->Trial->TrainingSession->find('count', array(
			'conditions' => array('TrainingSession.user_id' => $this->Auth->user('id') ),
			"recursive" => -1,
			)
		);
		$progress =  current( $this->Trial->getProgress($this->Auth->user('id')) ); // current so I don't have a nested array with just one entry for the user id on the first level
		$lastSession = false;
		if($prevSessions==0 OR $lastSession OR $this->Auth->user('condition')=='') $condition = 'bias_assessment';
		else $condition = $this->Auth->user('condition'); 
		
		$this->set(compact('progress','condition'));
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