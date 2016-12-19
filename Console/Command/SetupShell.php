<?php 
App::uses('AppShell','Console/Command');

class SetupShell extends AppShell {

	public function main() {
		$this->hr();
		$this->out('Backend Setup');
		$this->hr();

		$this->out('<warning>What do you want to do:</warning>');
		$this->out('[1] Setup defaults (Creates root and admin roles and a root user');
		$this->out('[2] Setup a new user');

		$task = $this->in('Choose', array(1, 2), 1);
		switch($task) {
			case 1:
				$this->defaults();
				break;
			case 2:
				$this->user();
				break;
			default:
				$this->out('<error>Invalid task</error>');
		}

	}
	
	public function defaults() {
		//TODO check if tables are present in db. If not, trigger schema create --plugin Backend
		
		// setup default backend user roles
		$BackendUser = ClassRegistry::init('Backend.BackendUser');
		$roleIds = array();
		foreach(array('root', 'admin') as $role) {
			$_role = $BackendUser->BackendUserRole->findByName($role);
			if ($_role) {
				$roleIds[$role] = $_role['BackendUserRole']['id'];
				$this->out('<info>BackendUserRole '.$role.' already exists</info>');
				continue;
			}
			
			$BackendUser->BackendUserRole->create();
			if (!$BackendUser->BackendUserRole->save(array('BackendUserRole'=>array('name'=>$role)))) {
				$this->error('<warning>Failed to create BackendUserRole '.$role.'</warning>');
			} else {
				$roleIds[$role] = $BackendUser->BackendUserRole->id;
				$this->out('<success>Created BackendUserRole '.$role.'</success>');
			}
		}

	}

	public function user() {

		// setup user
		$BackendUser = ClassRegistry::init('Backend.BackendUser');
		$firstName = $this->_forceInput('First Name',null,'Mickey');
		$lastName = $this->_forceInput('Last Name',null,'Mouse');
		do {
			$userName = $this->_forceInput('User Name',null,'admin');
			$userNameExists = $BackendUser->findByUsername($userName);
		} while($userNameExists == true);

		$email = $this->_forceInput('Email',null, $userName.'@example.org');
		$pass = $this->_forceInput('Password',null,$userName.'Pass');
		$pass2 = $this->_forceInput('Repeat Password',null,$userName.'Pass');

		$backendUser = array(
			'BackendUser' => array(
				'username' => $userName,
				'pass' => $pass,
				'pass2' => $pass2,
				'first_name' => $firstName,
				'last_name' => $lastName,
				'mail' => $email,
				'published' => true
			),
			'BackendUserRole' => array(
				'name' => 'root'
			)
		);

		if (!$BackendUser->save($backendUser,true)) {
			foreach($BackendUser->validationErrors as $field => $errors) {
				$this->out($field.':'.$errors[0]);
			}
			$this->error('<warning>Failed to create BackendUser</warning>');
		} else {
			$this->out('<success>BackendUser created</success>');
		}
		$backendUserId = $BackendUser->id;

		// add roles
		$roles = $this->in('User Roles (comma separated)');
		if ($roles) {
			$roles = explode(',',$roles);
			foreach($roles as $role) {
				$BackendUser->saveAll(array(
					'BackendUser'=>array(
						'id'=>$backendUserId
					),
					'BackendUserRole' => array(
						'name' => $role
					)
				));
			}
		}
	}
	
	protected function _forceInput($title, $options = null, $default = null) {
		do {
			$in = $this->in($title, $options, $default);
		} while(strlen($in) < 1);
		
		return $in;
	}
}