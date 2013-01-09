<?php
App::uses('AppController', 'Controller');
/**
 * TrainingSessions Controller
 *
 * @property TrainingSession $TrainingSession
 */
class TrainingSessionsController extends AppController {

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
			$this->TrainingSession->create();
			debug($this->request->data);
			if ($this->TrainingSession->saveAll($this->request->data)) {
				echo 'The training session has been saved';
				exit;
			} else {
				echo 'The training session could not be saved. Please, try again.';
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
