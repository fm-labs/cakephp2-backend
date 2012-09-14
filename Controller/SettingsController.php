<?php
App::uses('BackendAppController', 'Backend.Controller');
/**
 * Settings Controller
 *
 * @property Setting $Setting
 */
class SettingsController extends BackendAppController {


	public $uses = array('Settings.Setting');
	
	public $paginate = array(
		'order' => 'Setting.path ASC, Setting.namespace ASC',
		'limit' => 100,
		'maxLimit' => 250
	);
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Setting->recursive = 0;
		$this->set('settings', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Setting->id = $id;
		if (!$this->Setting->exists()) {
			throw new NotFoundException(__d('backend','Invalid setting'));
		}
		$this->set('setting', $this->Setting->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Setting->create();
			if ($this->Setting->save($this->request->data)) {
				$this->Session->setFlash(__d('backend','The setting has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('backend','The setting could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Setting->id = $id;
		if (!$this->Setting->exists()) {
			throw new NotFoundException(__d('backend','Invalid setting'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Setting->save($this->request->data)) {
				$this->Session->setFlash(__d('backend','The setting has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('backend','The setting could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Setting->read(null, $id);
		}
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
		$this->Setting->id = $id;
		if (!$this->Setting->exists()) {
			throw new NotFoundException(__d('backend','Invalid setting'));
		}
		if ($this->Setting->delete()) {
			$this->Session->setFlash(__d('backend','Setting deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('backend','Setting was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
