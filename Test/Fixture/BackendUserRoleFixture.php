<?php
/**
 * BackendUserRoleFixture
 *
 */
class BackendUserRoleFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'name' => 'root'
		),
		array(
			'id' => 2,
			'name' => 'admin'
		),
		array(
			'id' => 3,
			'name' => 'usermanager'
		),
		array(
			'id' => 4,
			'name' => 'contentmanager'
		),
		array(
			'id' => 5,
			'name' => 'guest'
		),
	);

}
