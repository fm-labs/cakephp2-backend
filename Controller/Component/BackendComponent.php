<?php
App::uses('Component','Controller');
App::uses('Backend','Backend.Lib');

/**
 * 
 * @author flow
 * @property AuthComponent $Auth
 * @property SessionComponent $Session
 */
class BackendComponent extends Component {
	
	public $controller;
	
	public $components = array('Session', 'Auth');
	
	protected $_enabled = false;
	
	public function initialize(Controller $controller) {
		$this->Auth->initialize($controller);
		
		if (Backend::initialize($controller)) {
			$this->_enabled = true;
		}
		
		$this->controller = $controller;
	}
	
	public function startup(Controller $controller) {
		
		if ($this->_enabled) {
			//Auth
			//Configure::write('Session.cookie','ADMINPANEL');
			$this->Auth->authenticate = array(
					'Form' => array(
						'userModel' => 'Backend.BackendUser',
					)
			);
			$this->Auth->loginAction = array(
					'controller'=>'auth',
					'action'=>'login',
					'plugin'=>'backend'
			);
			/*
			$this->Auth->loginRedirect = array(
					'controller'=>'auth',
					'action'=>'session',
					'plugin'=>'backend'
			);
			*/
			//$this->Auth->authorize = array('Backend.backend' => array());
			//AuthComponent::$sessionKey = "Auth.Admin"; 
			$this->Auth->startup($controller);
		}
	}
}
?>