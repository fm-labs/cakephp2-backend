<?php
App::uses('Component','Controller');
App::uses('BackendEventListener','Backend.Event');

/**
 * 
 * @author flow
 * @property AuthComponent $Auth
 * @property SessionComponent $Session
 */
class BackendComponent extends Component {
	
	public $components = array('Session', 'Auth');
	
	public $viewClass = 'CakeLayout.CakeLayout';
	
	public $layout = 'Backend.backend';
	
	public $prefixes = array('admin');
	
	protected $_enabled = false;
	
	/**
	 * Initialize Controller and CakeRequest
	 *
	 * This method applies Controller attributes.
	 * Should be called in Component::initialize() or Controller::beforeFilter()
	 *
	 * @param Controller $controller
	 * @param CakeRequest $request
	 * @return boolean
	*/
	public function initialize(Controller $controller) {
		
			
		//Attach EventListeners
		$controller->getEventManager()->attach(new BackendEventListener());
		
		//add backend detector
		$controller->request->addDetector('backend', array('callback' => array($this,'isBackendRequest')));
		$controller->request->addDetector('iframe', array('callback' => array($this,'isIframeRequest')));
		
		
		if ($controller->request->is('backend')) {
			
			$controller->Components->load('Auth');
	
			$this->_enabled = true;
			
			//Controller
			$controller->layout = $this->layout;
			$controller->viewClass = $this->viewClass;

			//Auth
			//$controller->Components->enable('Auth',false);
			AuthComponent::$sessionKey = "Auth.Backend";
				
			$this->Auth->authenticate = array(
					'Form' => array(
							'userModel' => 'Backend.BackendUser',
					)
			);
			$this->Auth->loginAction = array(
					'plugin' => 'backend',
					'controller'=> 'auth',
					'action'=>'login',
					
			);
			
		}
	}
	
	
	public function startup(Controller $controller) {
		
		//iframe
		if ($controller->request->is('iframe')) {
			$controller->layout = "Backend.iframe";
		}
	}
	
	
	/**
	 * Check if given CakeRequest should be handled by Backend
	 * by checking registered routing prefixes.
	 * Backend can be bound to one or more routing prefixes.
	 *
	 * @param CakeRequest $request
	 * @return string|bool If valid, returns name of the prefix, otherwise FALSE
	 */
	public function isBackendRequest(CakeRequest $request) {
		foreach($this->prefixes as $prefix => $config) {
			if (is_numeric($prefix)) {
				$prefix = $config;
				$config = array();
			}
			if (isset($request->params[$prefix]) && $request->params[$prefix] === true)
				return true;
		}
	
		return false;
	}
	
	/**
	 * Detector function for Iframes
	 *
	 * @param CakeRequest $request
	 * @return boolean
	 */
	public function isIframeRequest(CakeRequest $request) {
		return (isset($request->params['named']['iframe'])) ? $request->params['named']['iframe'] : false;
	}	
}
?>