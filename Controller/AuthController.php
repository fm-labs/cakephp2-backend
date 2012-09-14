<?php
App::uses('BackendAppController','Backend.Controller');

class AuthController extends BackendAppController {
	
	public $uses = array('Backend.BackendUser');
	
	public function beforeFilter() {
		parent::beforeFilter();
		
		$this->Auth->allow('admin_login');
	}
	
/**
 * Auth Login page
 */
	public function admin_login() {

		$this->layout = "Backend.auth";
		
	    if ($this->request->is('post')) {
	        if (!$this->Auth->login()) {
	            $this->Session->setFlash(__d('backend','Username or password is incorrect'), 'default', array(), 'auth');	            
	        } else {
	        	//Write LastLogin Date
	        	$userId = $this->Auth->user('id');
	        	$this->BackendUser->id = $userId;
	        	$this->BackendUser->saveField('last_login',date("Y-m-d H:i:s"));
	        	
	            $this->Session->setFlash(__d('backend','Login successful'));
	            return $this->redirect($this->Auth->redirect());
	        }
	    } elseif ($this->Auth->user()) {
	    	//$this->redirect($this->referer(array('controller'=>'backend','action'=>'index')));
	    	//$this->redirect($this->referer(array('controller'=>'backend','action'=>'index')));
	    	//$this->redirect(array('action'=>'session'));
	    }
	}

/**
 * Displays session data of currently logged in user
 */	
	public function admin_user() {
		$this->set('authUser', $this->Auth->user());
	}
	
/**
 * Auth Logout
 */	
	public function admin_logout() {
	    $this->redirect($this->Auth->logout());
	}	
}
?>