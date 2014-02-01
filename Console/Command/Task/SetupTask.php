<?php
class SetupTask extends AppShell {

/**
 * @var array
 */
	public $tasks = array('Backend.User');

/**
 * @var BackendUser
 */
	public $BackendUser;

/**
 * @return ConsoleOptionParser
 */
	public function getOptionParser() {
		$parser = parent::getOptionParser();
		$parser->description(__d('backend', "Backend Setup Task"));

		$parser->addSubcommand('defaults', array(
			'help' => __('Setup default roles and a root user'),
		));

		/*
		$parser->addArgument('username', array(
			'help' => __d('backend', "Username"),
			'required' => true,
		));

		$parser->addOption('password', array(
			'help' => __d('backend', "Password"),
			'short' => 'p'
		));
		$parser->addOption('mail', array(
			'help' => __d('backend', "Mail"),
			'short' => 'm'
		));
		*/

		return $parser;
	}

	public function initialize() {
		$this->BackendUser = ClassRegistry::init('Backend.BackendUser');
	}

	public function main() {
		$this->out("main from SetupTask");

		if ($this->hasMethod($this->args[0])) {
			$this->dispatchMethod($this->args[0]);
		} else {
			$this->out('<error>Method not found</error>');
		}
	}

	public function defaults() {
		//TODO check if tables are present in db. If not, trigger schema create --plugin Backend

		// setup default backend user roles
		$roleIds = array();
		foreach (array('root', 'admin') as $role) {
			$_role = $this->BackendUser->BackendUserRole->findByName($role);
			if ($_role) {
				$roleIds[$role] = $_role['BackendUserRole']['id'];
				$this->out('<info>BackendUserRole ' . $role . ' already exists</info>');
				continue;
			}

			$this->BackendUser->BackendUserRole->create();
			if (!$this->BackendUser->BackendUserRole->save(array('BackendUserRole' => array('name' => $role)))) {
				$this->error('<warning>Failed to create BackendUserRole ' . $role . '</warning>');
			} else {
				$roleIds[$role] = $this->BackendUser->BackendUserRole->id;
				$this->out('<success>Created BackendUserRole ' . $role . '</success>');
			}
		}
	}

	public function root() {
		// check if root user exists
		if ($this->BackendUser->findByUsername('root')) {
			$this->out('<info>Root user already exists</info>');
			return;
		}

		$pass = 'root' . substr(uniqid(), -4);
		$rootdata = array(
			'pass' => $pass,
			'pass2' => $pass,
			//'password_force_change' => true,
		);
		if ($this->BackendUser->addUser('root', $rootdata) && $this->BackendUser->setUserRole('root', array('root', 'admin'))) {
			$this->out('<success>Root user created. Pass: ' . $pass . '</success>');
		} else {
			debug($this->BackendUser->validationErrors);
		}
	}
} 