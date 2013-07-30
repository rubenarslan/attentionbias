<?php
App::uses('AppController', 'Controller');
class TrialsController extends AppController {
	function isAuthorized($user = null, $request = null) {	
		$req_action = $this->request->params['action'];
		if(in_array($req_action, array('train','cg_train'))) return true; # viewing and adding is allowed to all users

		return parent::isAuthorized($user); # allow admins to do anything
	}
	public function train() {
		$prevSessions = $this->Trial->TrainingSession->find('count', array(
			'conditions' => array('TrainingSession.user_id' => $this->Auth->user('id') ),
			"recursive" => -1,
			)
		);
		$progress =  current( $this->Trial->getProgress($this->Auth->user('id')) ); // current so I don't have a nested array with just one entry for the user id on the first level
		$minimum_end_reached = $this->Trial->TrainingSession->find('first', array(
			'fields' => array('DATE_ADD( DATE( TrainingSession.began ) , INTERVAL 4 WEEK) < DATE(NOW()) AS minimum_end_reached'),
			'conditions' => array('TrainingSession.user_id' => $this->Auth->user('id') ),
			'order' => 'TrainingSession.began ASC',
			'limit' => 1,
			"recursive" => -1,
			)
		);
		if(empty($minimum_end_reached))
			$minimum_end_reached = 0;
		else
			$minimum_end_reached = $minimum_end_reached[0]['minimum_end_reached'];
		if($minimum_end_reached AND $prevSessions > 8) {
			$lastSession = true; 
			$hadLastSession = (2 === $this->Trial->TrainingSession->find('count', array(
				'conditions' => array(
					'TrainingSession.user_id' => $this->Auth->user('id'),		
					'TrainingSession.condition' =>  'bias_assessment'
				),
				"recursive" => -1,
				)
			) );
		}
		else $lastSession = $hadLastSession = false;
				
		if($prevSessions==0) $condition = 'bias_assessment';
		elseif($lastSession) $condition = 'bias_assessment2';
		else $condition = $this->Auth->user('condition'); 
		
		$this->set(compact('progress','condition','hadLastSession','prevSessions'));
	}
	public function cg_train() {
		$condition = 'bias_manipulation'; 
		$hadLastSession = false;
		$progress =  current( $this->Trial->getProgress($this->Auth->user('id')) ); // current so I don't have a nested array with just one entry for the user id on the first level
		$prevSessions = $this->Trial->TrainingSession->find('count', array(
			'conditions' => array('TrainingSession.user_id' => $this->Auth->user('id') ),
			"recursive" => -1,
			)
		);
		
		$this->set(compact('progress','condition','hadLastSession','prevSessions'));
		$this->render('train');
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