<?php
App::uses('AppController', 'Controller');
/**
 * TrainingSessions Controller
 *
 * @property TrainingSession $TrainingSession
 */
class TrainingSessionsController extends AppController {

	function isAuthorized($user = null, $request = null) {	
		$req_action = $this->request->params['action'];
		if(in_array($req_action, array('ajaxAdd'))) return true; # viewing and adding is allowed to all registered users

		return parent::isAuthorized($user, $request); # allow admins to do anything	
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TrainingSession->recursive = 0;
		$this->set('trainingSessions', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->TrainingSession->id = $id;
		if (!$this->TrainingSession->exists()) {
			throw new NotFoundException(__('Invalid training session'));
		}
		$this->set('trainingSession', $this->TrainingSession->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function ajaxAdd() {
		if ($this->request->is('ajax')) {
			$this->layout = 'ajax'; // empty layout
			$this->TrainingSession->create();
			if(!isset($this->request->data['TrainingSession']['user_id']))
				$this->request->data['TrainingSession']['user_id'] = $this->Auth->user('id');
			if( $this->request->data['TrainingSession']['user_id'] == $this->Auth->user('id')) { # is the 	creator of the training session the logged in user.
				if ($this->TrainingSession->saveAssociated($this->request->data,array("deep" => TRUE) ) ) 
				{
					echo __('Gespeichert.');
                    
					$url = Configure::read('Survey.api') . 'api/'. Configure::read('Survey.run_name').'/end_last_external';
					$ch = curl_init($url);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_POST, 1);
					$post = array('api_secret' => Configure::read('Survey.api_secret'), 'session' => $this->Auth->user('code'));
					curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
					$output = curl_exec($ch);
					curl_close($ch);
					
				} else {
					echo __('Ihre Trainingssitzung konnte nicht gespeichert werden. Kontaktieren Sie bitte die Studienleitung.');
					debug($this->TrainingSession->validationErrors);
					
				}
			} else {
				echo __('Haben Sie versucht, den Account zu wechseln, während Sie trainiert haben? Falls dieses Problem unerwartet auftritt, kontaktieren Sie die Studienleitung.');
			}
		}
	}
	function admin_export($exportformat='CSV')
		{
			$toExport = $this->TrainingSession->find('all');

		    $this->set(compact('toExport','exportformat'));
			if($exportformat=='excel') $this->layout = 'export_xls';
			else { 
				$this->layout = null;
		    	$this->autoLayout = false;
			}
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->TrainingSession->create();
			if ($this->TrainingSession->save($this->request->data)) {
				$this->Session->setFlash(__('The training session has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The training session could not be saved. Please, try again.'));
			}
		}
		$users = $this->TrainingSession->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->TrainingSession->id = $id;
		if (!$this->TrainingSession->exists()) {
			throw new NotFoundException(__('Invalid training session'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TrainingSession->save($this->request->data)) {
				$this->Session->setFlash(__('The training session has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The training session could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->TrainingSession->read(null, $id);
		}
		$users = $this->TrainingSession->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->TrainingSession->id = $id;
		if (!$this->TrainingSession->exists()) {
			throw new NotFoundException(__('Invalid training session'));
		}
		if ($this->TrainingSession->delete()) {
			$this->Session->setFlash(__('Training session deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Training session was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->TrainingSession->recursive = 0;
		$this->set('trainingSessions', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->TrainingSession->id = $id;
		if (!$this->TrainingSession->exists()) {
			throw new NotFoundException(__('Invalid training session'));
		}
		$this->set('trainingSession', $this->TrainingSession->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->TrainingSession->create();
			if ($this->TrainingSession->save($this->request->data)) {
				$this->Session->setFlash(__('The training session has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The training session could not be saved. Please, try again.'));
			}
		}
		$users = $this->TrainingSession->User->find('list');
		$this->set(compact('users'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->TrainingSession->id = $id;
		if (!$this->TrainingSession->exists()) {
			throw new NotFoundException(__('Invalid training session'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TrainingSession->save($this->request->data)) {
				$this->Session->setFlash(__('The training session has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The training session could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->TrainingSession->read(null, $id);
		}
		$users = $this->TrainingSession->User->find('list');
		$this->set(compact('users'));
	}

/**
 * admin_delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->TrainingSession->id = $id;
		if (!$this->TrainingSession->exists()) {
			throw new NotFoundException(__('Invalid training session'));
		}
		if ($this->TrainingSession->delete()) {
			$this->Session->setFlash(__('Training session deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Training session was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
