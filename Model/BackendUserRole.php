<?php
App::uses('BackendAppModel', 'Backend.Model');
/**
 * BackendUserGroup Model
 *
 * @property BackendUser $BackendUser
 */
class BackendUserRole extends BackendAppModel {
	
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
			),
			'isUnique' => array(
				'rule' => array('isunique'),
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

}
