<?php
App::uses('BackendAppModel','Backend.Model');
App::uses('AuthComponent','Controller/Component');

/**
 * BackendUser Model
 *
 * @property BackendUserRole $BackendUserRole
 */
class BackendUser extends BackendAppModel {

	//public $actsAs = array('Containable', 'Acl' => array('type' => 'requester'));
	public $actsAs = array('Containable');

	public $validate = array(
		'username' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'Enter a valid username',
				'required' => true,
				'last' => true,
				'on' => 'create'
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'This username is already taken',
				'allowEmpty' => false,
			),
		),
		'mail' => array(
			'required' => array(
				'rule' => array('email'),
				'message' => 'Enter a valid email address',
				'required' => true,
				'last' => true,
				'on' => 'create',
			),
			'email' => array(
				'rule' => array('email'),
				'message' => 'Enter a valid email address',
				'allowEmpty' => false,
				'last' => true,
				'on' => 'update',
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'This email address is already taken',
			)
		),
		'pass' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'Password is required',
				'required' => true,
				'last' => true,
				'on' => 'create',
			),
			'minLength' => array(
				'rule' => array('minLength', '8'),
				'message' => 'Minimum 8 characters long',
				'allowEmpty' => false,
			)
		),
		'pass2' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Repeat the password',
				'last' => true
			),
			'repeat' => array(
				'rule' => array('validateRepeat', 'pass'),
				'message' => 'Passwords do not match!'
			)
		),
		'pass_old' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty')
			)
		),
		'first_name' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'This field cannot be left empty',
				'required' => true,
				'last' => true,
				'on' => 'create'
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Enter a first name'
			)
		),
		'last_name' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'This field cannot be left empty',
				'required' => true,
				'last' => true,
				'on' => 'create'
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Enter a last name'
			)
		),
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'BackendUserRole' => array(
			'className' => 'BackendUserRole',
			//'joinTable' => 'backend_user_roles_users',
			'foreignKey' => 'backend_user_id',
			'associationForeignKey' => 'backend_user_role_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'with' => 'BackendUserRolesUsers'
		)
	);

	public function __construct($id = false, $table = null, $ds = null) {
		/*
		if (!Configure::read('Backend.Acl.enabled')) {
			unset($this->actsAs['Acl']);
		}
		*/
		parent::__construct($id, $table, $ds);
	}

/**
 * Validates that a field is an exact duplicate of another field
 *
 * @param array $check
 * @param string $field Name of 'master' field
 * @return boolean Returns TRUE, if value in master-field matches the check value
 */
	public function validateRepeat($check, $field) {
		if (count($check) > 1) {
			return false;
		}

		$_field = key($check);
		$_check = current($check);

		return $_check === $this->data[$this->alias][$field];
	}

/**
 * (non-PHPdoc)
 * @see Model::beforeValidate()
 */
	public function beforeValidate($options = array()) {
		// make sure the password validation field (pass2) is present, if password field (pass) is set
		if (array_key_exists('pass', $this->data[$this->alias]) && !isset($this->data[$this->alias]['pass2'])) {
			$this->data[$this->alias]['pass2'] = '';
		}

		// reset password
		// TODO: re-evaluate usefulness or refactor
		if (isset($this->data[$this->alias]['pass_old'])) {
			$oldPass = AuthComponent::password($this->data[$this->alias]['pass_old']);
			#$this->id = $this->data[$this->alias]['id'];
			#$this->Behaviors->disable('*');
			if (!$this->find('first', array(
				'recursive' => -1,
				'conditions' => array(
					'id' => $this->data[$this->alias]['id'],
					'password' => $oldPass
				)
			))) {
				$this->invalidate('pass_old', __d('backend', "The current password does not match"));
			}
		}

		return true;
	}

/**
 * (non-PHPdoc)
 * @see Model::beforeSave()
 */
	public function beforeSave($options = array()) {
		// disallow direct access to password field
		if (array_key_exists('password', $this->data[$this->alias])) {
			unset($this->data[$this->alias]['password']);
		}

		// generate password
		if (array_key_exists('pass', $this->data[$this->alias]) && !empty($this->data[$this->alias]['pass'])) {
			$this->data[$this->alias]['password'] = $this->_generatePassword($this->data[$this->alias]['pass']);
			unset($this->data[$this->alias]['pass']);
			unset($this->data[$this->alias]['pass2']);
		}
		return true;
	}

/**
 * Generate Password from plain-text password
 *
 * @param string $password
 * @return string
 */
	protected function _generatePassword($password) {
		return AuthComponent::password($password);
	}

/**
 * Wrapper for Model::save()
 *
 * @param array $data
 * @return mixed|boolean
 */
	public function saveAdd($data) {
		$data[$this->alias]['published'] = false;

		$this->create();
		return $this->save($data, true);
	}

/**
 * Wrapper for Model::save()
 * Ignores password fields if not set
 *
 * @param array $data
 * @return mixed|boolean
 */
	public function saveEdit($data) {
		if (array_key_exists('pass', $data[$this->alias]) && empty($data[$this->alias]['pass'])) {
			unset($data[$this->alias]['pass']);
			unset($data[$this->alias]['pass2']);
			$this->validator()
				->remove('pass')
				->remove('pass2');
		}
		return $this->save($data);
	}

	public function addUser($username, $userdata = array()) {
		$userdata = array_merge(array(
			'username' => $username,
			'first_name' => $username,
			'last_name' => $username,
			'mail' => $username . '@example.org',
			'allow_login' => true,
			'published' => true,
			//'password_force_change' => true,
		), $userdata);

		if (isset($userdata['id'])) {
			unset($userdata['id']);
		}

		$this->create();
		return $this->save(array($this->alias => $userdata));
	}

	public function addUserRole($role) {
		$this->BackendUserRole->create();
		return $this->BackendUserRole->save(array('BackendUserRole' => array('name' => $role)));
	}

	public function setUserRole($username, $roles) {
		if (is_string($roles)) {
			$roles = array($roles);
		}

		$user = $this->findByUsername($username);
		if (!$user) {
			throw new Exception(__('BackendUser %s does not exist', $username));
		}

		foreach ($roles as $rolename) {
			$role = $this->BackendUserRole->findByName($rolename);
			if (!$role) {
				throw new Exception(__('BackendUserRole %s does not exist', $rolename));
			}
			$_roles[] = $role['BackendUserRole']['id'];
		}

		$this->create();
		if (!$this->saveAll(array(
			'BackendUser' => array(
				'id' => $user[$this->alias]['id']
			),
			'BackendUserRole' => array(
				'BackendUserRole' => $_roles
			)
		))) {
			throw new Exception(__('BackendUserRoles %s could not be added for user %s', join(', ', $_roles), $username));
		}

		return $this;
	}

	/*
	 * ACL Support
	 * @deprecated
	 * 
	public function parentNode() {
		if (!$this->id && empty($this->data)) {
		return null;
		}
		
		if (isset($this->data[$this->alias]['backend_user_group_id'])) {
		$groupId = $this->data[$this->alias]['backend_user_group_id'];
		} else {
		$groupId = $this->field('backend_user_group_id');
		}
		if (!$groupId) {
		return null;
		} else {
		return array('BackendUserGroup' => array('id' => $groupId));
		}
	
	}
	
	public function bindNode($user) {
		$user = array_pop($user);
		return array('model' => 'BackendUserGroup', 'foreign_key' => $user['backend_user_group_id']);
	}
	*/

}