<?php
App::uses('AppController', 'Controller');
class UsersController extends AppController {
	function isAuthorized($user = null, $request = null) {	
		$req_action = $this->request->params['action'];
		if(in_array($req_action, array(''))) return true; # viewing and adding is allowed to all users

		return parent::isAuthorized($user); # allow admins to do anything
	}
	public function login() {
	    if ($this->request->is('post')) {
			if ($this->Auth->login()) {
	            $this->redirect($this->Auth->redirect());
	        } else {
	            $this->Session->setFlash(__('Invalid email or password, try again'));
	        }
	    }
	}
	public function logout() {
	    $this->redirect($this->Auth->logout());
	}
	
	public function forgotPassword() {
		if ($this->request->is('post')) {
		 	$user = $this->User->find('first', array(
				'fields' => array('firstname','lastname','email','id'),
				'conditions' => array('User.email' => $this->request->data['User']['email'] ),
				'limit' => 1,
			))['User'];
	    		$reset_token = $this->User->generateResetToken($user['id']);
			$email = new CakeEmail('smtp');
			$email
			    ->to(array($user['email'] => $user['firstname']." ".$user['lastname']))
			    ->subject(__('Passwort zurücksetzen Zwang-Studie ATP.'))
			    ->send(
"Hallo ".$user['firstname']." ".$user['lastname']."

Sie haben uns gebeten Ihnen einen Link zuzuschicken, um Ihr
Passwort zurückzusetzen. Falls Sie den Link nicht angefordert
haben, kontaktieren Sie bitte die Studienleitung, indem Sie
auf diese Email antworten.

".Router::url( "/users/resetPassword/".$reset_token, true )."

Freundliche Grüße,

Ihr Studienteam");
			$this->redirect("/");
		}
	}
	public function resetPassword($reset_token = null) {
		if($reset_token == '' OR $reset_token == null) throw new MethodNotAllowedException(__('Invalid reset token.'));
		if ($this->request->is('post')) {
		 	$user_id = $this->User->field('id', array(
					'User.hashed_reset_token' => AuthComponent::password($reset_token),
					'User.reset_token_expiration >' => date('Y-m-d H:i:s') 
				)
			);
			if($user_id) { // returns false if not found
				$this->User->read(null,$user_id);
				$this->User->set(array(
					'hashed_reset_token' => null,
					'reset_token_expiration' => null,
					'password' => $this->request->data['User']['password'],
				));
				if($this->User->save()) {
					$this->Session->setFlash(__('Passwort successfully changed. Log in now.'));
					$this->redirect("/users/login");
				}
			} else {
				$this->Session->setFlash(__('Passwort reset token was invalid. Please follow the link in your email or copy it to the browser.'));
			}
		}
	}
	public function register() {
	    if ($this->request->is('post')) {
	        $this->User->create();
	$this->request->data['User']['group_id'] = 2; # set to user group
	$this->request->data['User']['condition'] = (mt_rand(0,1)===1) ? 'bias_manipulation' : 'bias_control'; # randomly choose condition
	        if ($this->User->save($this->request->data)) {
		$id = $this->User->id;
	   $this->request->data['User'] = array_merge($this->request->data['User'], array('id' => $id));
	   if($this->Auth->login())
	            	$this->Session->setFlash(__('You have been registered and logged in.'));
	else
		$this->Session->setFlash(__('Login went wrong.'));
	         $this->redirect($this->Auth->redirect());
	        } else {
	            $this->Session->setFlash(__('Registration unsuccessful. Please, try again.'));
	        }
	    }
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->User->recursive = 0;
		$paginate = $this->paginate();
		$user_ids = Set::extract('/User/id',$paginate);
		$progress = $this->User->TrainingSession->Trial->getProgress($user_ids);
		$p2 = array();
		foreach($paginate AS $k=>$v) {
			if(isset($progress[$v['User']['id']])) $v['User']['progress'] = $progress[$v['User']['id']];
			else $v['User']['progress'] = array();
			$p2[$k] = $v;
		}
		$this->set('users',$p2);
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
