<?php
App::uses('BackendAppController','Backend.Controller');
App::uses('CakeEvent','Event');

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
	        	
	        	//Event Backend.Auth.onLoginFail
	        	$event = new CakeEvent('Backend.Controller.Auth.onLoginFail', $this, $this->request->data['BackendUser']);
	        	$this->getEventManager()->dispatch($event);
	        	
	            $this->Session->setFlash(__d('backend','Username or password is incorrect'), 'default', array(), 'auth');	            
	        } else {
	        	
	        	//Event Backend.Auth.onLogin
	        	$event = new CakeEvent('Backend.Controller.Auth.onLogin', $this, $this->Auth->user());
	        	$this->getEventManager()->dispatch($event);
	        	
	            $this->Session->setFlash(__d('backend','Login successful'));
	            
	            //TODO should the event result return an redirect url?
	            if ($event->result)
	            	$redirect = $event->result;
	            else
	            	$redirect = $this->Auth->redirect();

	            $this->redirect($redirect);
	        }
	    } elseif ($this->Auth->user()) {
	        $this->redirect($this->referer(array('plugin'=>'backend','controller'=>'auth','action'=>'home')));
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
        //Event Backend.Auth.onLogout
        $event = new CakeEvent('Backend.Controller.Auth.onLogout', $this, $this->Auth->user());
        $this->getEventManager()->dispatch($event);
        	
	    $this->redirect($this->Auth->logout());
	}	
}
?>