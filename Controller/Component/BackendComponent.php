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
	
	public $layout = 'Backend.backend';
	
	public $authorize = false;
	
	private $_isBackendRequest = false;
	
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
			
			$this->_isBackendRequest = true;
			
			try {
				Configure::load('backend');
			} catch (Exception $e) {
				$this->log($e->getMessage(),'debug');
			}
			
	
			//Controller
			$controller->layout = $this->layout;
			$controller->viewClass = 'Backend.Backend';
			$controller->helpers[] = 'Backend.BackendHtml';

			//Auth
			$controller->Components->load('Auth');
			//TODO check if backend auth sessionkey overwrite can be avoided
			AuthComponent::$sessionKey = "Auth.Backend"; 
				
			$this->Auth->authenticate = array(
					'Form' => array(
						'userModel' => 'Backend.BackendUser',
						'scope' => array('BackendUser.published' => true)
					)
			);
			$this->Auth->loginAction = array(
					'plugin' => 'backend',
					'controller'=> 'auth',
					'action'=>'login',
			);
			
			if ($this->authorize == true) {
				//TODO check if acl tables are present
				$this->Auth->authorize = array(
					'Backend.Backend' => array('actionPath' => 'controllers')
				);
			}
			
		}
	}
	
	
	public function startup(Controller $controller) {
		
		//iframe
		if ($controller->request->is('iframe')) {
			$controller->layout = "Backend.iframe";
		}
	}
	
	public function beforeRender($controller) {

		if ($this->_isBackendRequest) {
			
			// pretty flash messages
			//TODO make configurable option to enable/disable this feature
			$messages = $this->Session->read('Message');
			if (is_array($messages)) {
				foreach($messages as $key => $message) {
					$type = $message['element'];
					if (!in_array($type,array('default','success', 'error','info','warning')))
						continue;
					
					
					$params = am(array(
						'plugin'=>'backend',
						'class'=>'alert',
						'type'=>$type,
						'title'=>Inflector::humanize($type)
					),$message['params']);
					
					if (isset($params['validationErrors'])) {
						$params['validationErrors'] = $controller->{$params['validationErrors']}->validationErrors;
					}
					
					$this->Session->write('Message.'.$key, array(
						'message' => $message['message'],
						'element' => 'flash',
						'params' => $params
					));
				}
			}
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
		
		//TODO remove global constant
		if (defined('BACKEND'))
			return true;
		
		if (isset($request->params['admin']) && $request->params['admin'] === true)
			return true;
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
	
	public function log($msg, $type = 'debug') {
		CakeLog::write($type, $msg, 'backend');
	}
}
?>