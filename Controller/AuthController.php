<?php
App::uses('BackendAppController','Backend.Controller');
App::uses('CakeEvent','Event');
App::uses('CakeTime','Utility');

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
		$defaultRedirect = array('plugin'=>'backend','controller'=>'backend','action'=>'dashboard');
		
	    if ($this->request->is('post')) {
	        if (!$this->Auth->login()) {
	        	
	        	//Event Backend.Auth.onLoginFail
	        	$eventData = array(
	        		'user' => $this->request->data['BackendUser'],
	        		'ip' => $this->request->clientIp()
	        	);
	        	$event = new CakeEvent('Backend.Controller.Auth.onLoginFail', $this, $eventData);
	        	$this->getEventManager()->dispatch($event);
	        	
	            $this->Session->setFlash(__d('backend','Login failed'), 'error', array(), 'auth');	            
	        } else {
	        	
	        	//Event Backend.Auth.onLogin
	        	$event = new CakeEvent('Backend.Controller.Auth.onLogin', $this, $this->Auth->user());
	        	$this->getEventManager()->dispatch($event);
	        	
	            $this->Session->setFlash(__d('backend','Login successful'), 'success');
	            $this->Session->setFlash(__d('backend','Last login: %s', CakeTime::timeAgoInWords($this->Auth->user('last_login'))), 'default',array(),'auth');
	            
	            //TODO should the event result return an redirect url?
	            if ($event->result)
	            	$redirect = $event->result;
	            else
	            	$redirect = $this->Auth->redirect();

	            
	            $redirect = Router::normalize($redirect);
	            if ($redirect == '/' || !preg_match('/^\/admin\//',$redirect))
	            	$redirect = array('plugin'=>'backend','controller'=>'backend','action'=>'dashboard');
	            
	            
	            $this->redirect($redirect);
	        }
	    } elseif ($this->Auth->user()) {
	        $this->redirect($this->referer($defaultRedirect));
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