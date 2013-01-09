<?php
App::uses('AppController', 'Controller');
/**
 * TrainingSessions Controller
 *
 * @property TrainingSession $TrainingSession
 */
class TrainingSessionsController extends AppController {

	function isAuthorized($user = null, $request = null) {	
		$admin = parent::isAuthorized($user); # allow admins to do anything
		if($admin) return true;

		$req_action = $this->request->params['action'];
		if(in_array($req_action, array('ajaxAdd'))) return true; # viewing and adding is allowed to all registered users

		$session_id = $this->request->params['pass'][0];
		$this->TrainingSession->id = $session_id;
		if (!$this->TrainingSession->exists()) {
		    throw new NotFoundException('Invalid training session.');
		}
		else {
			$allowed = $this->TrainingSession->find('first',array(
				"recursive" => -1,
				"conditions" => array(
					'user_id' => $this->Auth->user('id'),
					'id' => $session_id
					)
				));
			if( $allowed['Codedpaper']['user_id'] == $this->Auth->user('id')) { # is this the creator of the coded paper
				return true;
			}
		}
		return false;
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
				debug($this->request->data);
				if ($this->TrainingSession->saveAssociated($this->request->data,array("deep" => TRUE) ) ) {
					echo 'The training session has been saved';
				} else {
					echo 'The training session could not be saved. Please, try again.';
				}
			} else {
				echo 'Not your session.';
			}
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