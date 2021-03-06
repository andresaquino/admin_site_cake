<?php
class UsersController extends AppController {
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('logout', 'login');
	}
	
	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirect());
			}
			$this->Session->setFlash(__('Invalid username or password'));
		}
	}
	
	public function logout() {
		return $this->redirect($this->Auth->logout());
	}
	
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
		$this->loadModel('Member');
		$user_id = CakeSession::read('Auth.User.id');
		$this->set('members', $this->Member->find('all', array('conditions' => array('Member.specialist' => $user_id))));
	}
	
	public function all() {
		$this->set('users', $this->User->find('all'));
	}
	
	public function view($id = null) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException;
		}
		
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user.'));
		}
		$this->set('user', $this->User->read(null, $id));
	}
	
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('New user added.'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('Unable to save new user'));
		}
	}
	
	public function edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user.'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Your profile has been updated'));
				return $this->redirect(array('action' => 'view', $id));
			}
			$this->Session->setFlash(__('Your profile could not be updated'));
		} else {
			$this->request->data = $this->User->read(null, $id);
			unset($this->request->data['User']['password']);
		}
	}
	
	public function delete($id = null) {
		$this->request->onlyAllow('post');
		
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		return $this->redirect(array('action' => 'index'));
	}
}