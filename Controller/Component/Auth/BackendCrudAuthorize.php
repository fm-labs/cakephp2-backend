<?php
App::uses('BackendAuthorize', 'Backend.Controller/Component/Auth');

class BackendAuthorize extends BackendAuthorize {

	public function __construct(ComponentCollection $collection, $settings = array()) {
		parent::__construct($collection,$settings);
		$this->_setPrefixMappings();		
	}
	
/**
 * sets the crud mappings for prefix routes.
 *
 * @return void
 */
	protected function _setPrefixMappings() {
		$crud = array('create', 'read', 'update', 'delete');
		$map = array_combine($crud, $crud);

		//TODO get backend prefixes from config
		// $prefixes = Router::prefixes();
		$prefixes = array('admin');
		foreach ((array) $prefixes as $prefix) {
			$map = array_merge($map, array(
				$prefix . '_index' => 'read',
				$prefix . '_add' => 'create',
				$prefix . '_edit' => 'update',
				$prefix . '_view' => 'read',
				$prefix . '_remove' => 'delete',
				$prefix . '_create' => 'create',
				$prefix . '_read' => 'read',
				$prefix . '_update' => 'update',
				$prefix . '_delete' => 'delete'
			));
		}
		$this->mapActions($map);
	}

/**
 * Checks user authorization using Controller::$permissions
 * or Configure::read('Permissions.controller_name.action_name')
 *
 * @param array $user Active user data
 * @param CakeRequest $request
 * @return boolean
 */
	public function authorize($user, CakeRequest $request) {

		$permissions = array();
		// load permissions from controller
		if (isset($this->_Controller->crudPermissions)) {
			$permissions = $this->_Controller->crudPermissions;
		}
			
		// load permissions from configuration
		/*
		$app = ($request->params['plugin']) ? $request->params['plugin'] : 'app';
		$path = join('.', array('CrudPermissions', $app, $request->params['controller']));
		if (Configure::read($path)) {
			$permissions = array_merge($permissions, Configure::read($path));
		}
		*/
			
		return $this->_authorize(
			$permissions, 
			$this->settings['actionMap'][$request->params['action']], 
			$user
		);
	}

}
