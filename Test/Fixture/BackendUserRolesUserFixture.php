<?php
/**
 * BackendUserRolesUserFixture
 *
 */
class BackendUserRolesUserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'backend_user_role_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'backend_user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'backend_user_role_id' => array('column' => 'backend_user_role_id', 'unique' => 0),
			'backend_user_id' => array('column' => 'backend_user_id', 'unique' => 0),
			'user_role' => array('column' => array('backend_user_role_id', 'backend_user_id'), 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'backend_user_role_id' => 1,
			'backend_user_id' => 1
		),
		array(
			'id' => 2,
			'backend_user_role_id' => 2,
			'backend_user_id' => 2
		),
		array(
			'id' => 3,
			'backend_user_role_id' => 3,
			'backend_user_id' => 3
		),
		array(
			'id' => 4,
			'backend_user_role_id' => 4,
			'backend_user_id' => 4
		),
		array(
			'id' => 5,
			'backend_user_role_id' => 5,
			'backend_user_id' => 5
		),
	);

}
