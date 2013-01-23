<?php
App::uses('BackendAppModel', 'Backend.Model');
/**
 * BackendUserGroup Model
 *
 * @property BackendUser $BackendUser
 */
class BackendUserGroup extends BackendAppModel {


	public $actsAs = array('Acl' => array('type' => 'requester'));
	
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'BackendUser' => array(
			'className' => 'BackendUser',
			'foreignKey' => 'backend_user_group_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	public function parentNode() {
		return null;
	}
}
