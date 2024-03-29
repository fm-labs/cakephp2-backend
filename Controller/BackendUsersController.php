<?php
App::uses('BackendAppController', 'Backend.Controller');

class BackendUsersController extends BackendAppController {
	
	public $uses = array('Backend.BackendUser');
	
	public $permissions = array(
		'admin_index' => '*',
		'admin_add' => '*',
		'admin_view' => '*',
		'admin_edit' => array('admin', 'usermanager'),
		'admin_delete' => array('admin', 'usermanager'),
	);
	
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->BackendUser->recursive = 1;
		$this->set('backendUsers', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->BackendUser->id = $id;
		if (!$this->BackendUser->exists()) {
			throw new NotFoundException(__d('backend','Invalid admin user'));
		}
		$this->set('backendUser', $this->BackendUser->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->BackendUser->create();
			if ($this->BackendUser->saveAdd($this->request->data)) {
				$this->Session->setFlash(__d('backend','The admin user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('backend','The admin user could not be saved. Please, try again.'));
			}
		}
		$backendUserRoles = $this->BackendUser->BackendUserRole->find('list');
		$this->set(compact('backendUserRoles'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->BackendUser->id = $id;
		if (!$this->BackendUser->exists()) {
			throw new NotFoundException(__d('backend','Invalid admin user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BackendUser->saveEdit($this->request->data)) {
				$this->Session->setFlash(__d('backend','The admin user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('backend','The admin user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->BackendUser->read(null, $id);
			unset($this->request->data['BackendUser']['password']);
		}
		$backendUserRoles = $this->BackendUser->BackendUserRole->find('list');
		$this->set(compact('backendUserRoles'));
	}

/**
 * admin_delete method
 *
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->BackendUser->id = $id;
		if (!$this->BackendUser->exists()) {
			throw new NotFoundException(__d('backend','Invalid admin user'));
		}
		if ($this->BackendUser->delete()) {
			$this->Session->setFlash(__d('backend','Admin user deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('backend','Admin user was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
?>