<?php
App::uses('Component', 'Controller');
App::uses('BackendEventListener', 'Backend.Event');

/**
 * BackendComponent
 * 
 * @property SessionComponent $Session
 */
class BackendComponent extends Component {

	public $components = array('Session');

/**
 * @see Controller::$layout
 * @var string
 */
	public $layout = 'Backend.backend';

/**
 * @see Controller::$layout
 * @var string
 */
	public $errorLayout = 'Backend.error';

/**
 * @see AuthComponent::$authenticate
 * @var array
 */
	public $authenticate = array(
		'Form' => array(
			'userModel' => 'Backend.BackendUser',
			'scope' => array('BackendUser.published' => true),
			'contain' => array('BackendUserRole') // since CakePHP 2.2
		)
	);

/**
 * @see AuthComponent::$authorize
 * @var array
 */
	public $authorize = array('Backend.Backend');

/**
 * @see AuthComponent::$loginAction
 * @var array
 */
	public $loginAction = array(
			'plugin' => 'backend',
			'controller' => 'auth',
			'action' => 'login',
	);

/**
 * Backend request flag
 * TRUE, if all conditions for a backend request are fullfilled
 *
 * @see BackendComponent::isBackendRequest()
 * @var bool
 */
	protected $_isBackendRequest = false;

/**
 * Plugin name of current request
 *
 * @var string
 */
	protected $plugin;


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
		// attach event listeners
		$controller->getEventManager()->attach(new BackendEventListener());

		// add request detectors
		$controller->request->addDetector('backend',
			array('callback' => array($this, 'isBackendRequest')));
		$controller->request->addDetector('iframe',
			array('callback' => array($this, 'isIframeRequest')));

		if (!$controller->request->is('backend')) {
			return;
		}

		$this->_isBackendRequest = true;

		// plugin support
		if ($controller->request->params['plugin']) {
			$this->plugin = $controller->request->params['plugin'];

			// Load plugin specific config
			if ($this->plugin != "backend") {
				try {
					Configure::load(Inflector::camelize($this->plugin) . '.backend');
				} catch(Exception $e) {
					// $this->log(__('The plugin %s has no backend configuration', $this->plugin), 'debug');
				}
			}
		}

		// Setup Controller
		$controller->layout = $this->layout;
		$controller->viewClass = 'Backend.Backend';


		// Setup Auth
		if (Configure::read('Backend.Auth.enabled') === true) {

			if (!$controller->Components->loaded('Auth')) {
				$controller->Auth = $controller->Components->load('Auth');
				$controller->Auth->initialize($controller);
			}
		
			//TODO check if backend auth sessionkey overwrite can be avoided
			AuthComponent::$sessionKey = "Auth.Backend"; 
				
			$controller->Auth->authenticate = $this->authenticate;
			$controller->Auth->loginAction = $this->loginAction;

			/*
			// enable Access Control List
			if (Configure::read('Backend.Acl.enabled') === true) {
				$this->authorize = array(
					'Actions' => array(
						'actionPath' => 'controllers',
						'userModel' => 'Backend.BackendUser'
					)
				);
			}
			*/
			$controller->Auth->authorize = $this->authorize;
		}
		
		// Setup Error Handling
		if (is_a($controller,'CakeErrorController')) {
			// use backend error layout
			$controller->layout = $this->errorLayout;
		}
	}
	
	public function startup(Controller $controller) {
		
		//iframe
		if ($controller->request->is('iframe')) {
			$controller->layout = "Backend.iframe";
		}
	}
	
	public function beforeRender(Controller $controller) {

		if (!$this->_isBackendRequest) {
			return;
		}
			
		// load backendhelpers
		$controller->helpers[] = 'Backend.BackendHtml';
		
		//TODO check for possible bugs
		if ($controller->layout) {
			$controller->helpers[] = 'Backend.BackendLayout';
		}
		
		// pretty flash messages
		//TODO make configurable option to enable/disable this feature
		//TODO use Flash Plugin instead
		$messages = $this->Session->read('Message');
		if (is_array($messages)) {
			foreach($messages as $key => $message) {
				$type = $message['element'];
				if (!in_array($type,array('default','success', 'error','info','warning')))
					continue;
				
				$params = am(array(
					'plugin' => 'backend',
					'class' => 'alert',
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
	
	/**
	 * Check if given CakeRequest should be handled by Backend
	 * by checking registered routing prefixes.
	 * TODO: Backend can be bound to one or more routing prefixes.
	 *
	 * @param CakeRequest $request
	 * @return string|bool If valid, returns name of the prefix, otherwise FALSE
	 */
	public function isBackendRequest(CakeRequest $request) {
		
		if (isset($request->params['admin']) && $request->params['admin'] === true)
			return true;
		
		return false;
	}
	
	/**
	 * Detector function for Iframes
	 *
	 * @param CakeRequest $request
	 * @return boolean
	 * @todo Use query string instead of named params
	 */
	public function isIframeRequest(CakeRequest $request) {
		return (isset($request->params['named']['iframe'])) ? $request->params['named']['iframe'] : false;
	}	

}