<?php
App::uses('BackendAppModel','Backend.Model');

/**
 * BackendUserRolesUsers - JoinModel
 * 
 * @todo add associations
 */
class BackendUserRolesUsers extends BackendAppModel {

	public $belongsTo = array(
		'BackendUser' => array(
			'className' => 'Backend.BackendUser'
		),
		'BackendUserRole' => array(
			'className' => 'Backend.BackendUserRole'
		),
	);
}
