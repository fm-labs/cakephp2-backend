<?php
App::uses('BaseAuthorize', 'Controller/Component/Auth');

class BackendAuthorize extends BaseAuthorize {

	protected function _authorize($permissions, $action, $user) {

		$roles = Hash::extract($user, 'BackendUserRole.{n}.name');
		
		if (isset($permissions[$action])) {
				
			$allowedRoles = $permissions[$action];
				
			if (is_string($allowedRoles))
				$allowedRoles = array($allowedRoles);

			if ($allowedRoles === array('*') || in_array('*', $allowedRoles)) {
				return true;
			}
			
			if (array_intersect($allowedRoles, $roles)) {
				return true;
			}
			
			// root access
			if (in_array('root', $roles)) {
				return true;
			}
			
			return false;
		}
		
		// no permissions defined
		// TODO: should fail in "paranoid"-mode
		return true;		
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
		if (isset($this->_Controller->permissions)) {
			$permissions = $this->_Controller->permissions;
		}
		
		// load permissions from configuration
		/*
		$app = ($request->params['plugin']) ? $request->params['plugin'] : 'app'; 
		$path = join('.', array('Permissions', $app, $request->params['controller']));
		if (Configure::read($path)) {
			$permissions = array_merge($permissions, Configure::read($path));
		}
		*/
		
		return $this->_authorize($permissions, $request->params['action'], $user);
	}

}
