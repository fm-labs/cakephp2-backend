<?php
App::uses('BackendAppModel','Backend.Model');
App::uses('AuthComponent','Controller/Component');

class BackendUser extends BackendAppModel {

	public $actsAs = array('Containable');

	public $validate = array(
		'username' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
			),
		),
		'mail' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty')
			),
			'isUnique' => array(
				'rule' => array('isUnique')
			)
		),
		'pass_old' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty')
			)
		),
		'password' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			)
		),
		'password2' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
			)
		),
		'first_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty')
			)
		),
		'last_name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty')
			)
		),
	);
	public function beforeValidate($options = array()) {
		//change password
		if (isset($this->data[$this->alias]['pass_old'])) {
			$oldPass = AuthComponent::password($this->data[$this->alias]['pass_old']);
			#$this->id = $this->data[$this->alias]['id'];
			#$this->Behaviors->disable('*');
			if (!$this->find('first',array(
				'recursive' => -1,
				'conditions'=>array(
					'id' => $this->data[$this->alias]['id'],
					'password' => $oldPass
				)
			))) {
				$this->invalidate('pass_old',__d('backend',"The current password does not match"));
			}
		}
		
		//when password field 
		if (isset($this->data[$this->alias]['password']) && isset($this->data[$this->alias]['password2'])) {
			if (empty($this->data[$this->alias]['password']) && empty($this->data[$this->alias]['password2'])) {
				unset($this->data[$this->alias]['password']);
				unset($this->data[$this->alias]['password2']);
			} elseif (!empty($this->data[$this->alias]['password']) ) {
				if ($this->data[$this->alias]['password'] != $this->data[$this->alias]['password2']) {
					#$this->invalidate('password',__d('backend',"The passwords do not match"));
					$this->invalidate('password2',__d('backend',"The passwords do not match"));
					$this->data[$this->alias]['password2'] = null;
				}
			}
		} elseif (isset($this->data[$this->alias]['password'])) {
			$this->invalidate('password', __d('backend','Password verification not submitted'));
		}
		return true;
	}
	
	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password']) && !empty($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		return true;
	}

/**
 * Routine to create default root admin user
 * @todo load default values from config file
 */	
	public function createSuperUser() {
		$this->create();
		return $this->save(array($this->alias => array(
			'root' => true,
			'mail' => 'admin@localhost',
			'username' => 'flowmotion',
			'password' => 'adminpanel',
			'published'=> true
		)),false);
	}
	
}
?>