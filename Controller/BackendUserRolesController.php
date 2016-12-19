<?php
App::uses('BackendAppController', 'Backend.Controller');
/**
 * BackendUserRoles Controller
 *
 * @property BackendUserRole $BackendUserRole
 * @property PaginatorComponent $Paginator
 */
class BackendUserRolesController extends BackendAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->BackendUserRole->recursive = 0;
		$this->set('backendUserRoles', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->BackendUserRole->exists($id)) {
			throw new NotFoundException(__('Invalid %s',__('backend user role')));
		}
		$options = array('conditions' => array('BackendUserRole.' . $this->BackendUserRole->primaryKey => $id));
		$this->set('backendUserRole', $this->BackendUserRole->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->BackendUserRole->create();
			if ($this->BackendUserRole->save($this->request->data)) {
				$this->Session->setFlash(__('The %s has been saved',__('backend user role')),'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The %s could not be saved. Please, try again.',__('backend user role')),'error');
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->BackendUserRole->exists($id)) {
			throw new NotFoundException(__('Invalid %s',__('backend user role')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BackendUserRole->save($this->request->data)) {
				$this->Session->setFlash(__('The %s has been saved',__('backend user role')),'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The %s could not be saved. Please, try again.',__('backend user role')),'error');
			}
		} else {
			$options = array('conditions' => array('BackendUserRole.' . $this->BackendUserRole->primaryKey => $id));
			$this->request->data = $this->BackendUserRole->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->BackendUserRole->id = $id;
		if (!$this->BackendUserRole->exists()) {
			throw new NotFoundException(__('Invalid %s',__('backend user role')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BackendUserRole->delete()) {
			$this->Session->setFlash(__('%s deleted',__('Backend user role')),'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('%s was not deleted',__('Backend user role')),'error');
		$this->redirect(array('action' => 'index'));
	}}
