<?php
/**
 * BackendUserFixture
 *
 */
class BackendUserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'username' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 255, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'password' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'first_name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'last_name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'mail' => array('type' => 'string', 'null' => false, 'default' => null, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'last_login' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'published' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'mail' => array('column' => 'mail', 'unique' => 1),
			'username' => array('column' => 'username', 'unique' => 1),
			'username_pwd_published' => array('column' => array('username', 'password', 'published'), 'unique' => 0),
			'username_pwd' => array('column' => array('username', 'password'), 'unique' => 0)
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
			'username' => 'user1',
			'password' => 'Lorem ipsum dolor sit amet',
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet',
			'mail' => 'mail1@example.org',
			'last_login' => '2013-09-23 10:05:39',
			'published' => 1,
			'created' => '2013-09-23 10:05:39'
		),
		array(
			'id' => 2,
			'username' => 'user2',
			'password' => 'Lorem ipsum dolor sit amet',
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet',
			'mail' => 'mail2@example.org',
			'last_login' => '2013-09-23 10:05:39',
			'published' => 1,
			'created' => '2013-09-23 10:05:39'
		),
		array(
			'id' => 3,
			'username' => 'user3',
			'password' => 'Lorem ipsum dolor sit amet',
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet',
			'mail' => 'mail3@example.org',
			'last_login' => '2013-09-23 10:05:39',
			'published' => 1,
			'created' => '2013-09-23 10:05:39'
		),
		array(
			'id' => 4,
			'username' => 'user4',
			'password' => 'Lorem ipsum dolor sit amet',
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet',
			'mail' => 'mail4@example.org',
			'last_login' => '2013-09-23 10:05:39',
			'published' => 1,
			'created' => '2013-09-23 10:05:39'
		),
		array(
			'id' => 5,
			'username' => 'user5',
			'password' => 'Lorem ipsum dolor sit amet',
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet',
			'mail' => 'mail5@example.org',
			'last_login' => '2013-09-23 10:05:39',
			'published' => 1,
			'created' => '2013-09-23 10:05:39'
		),
	);

}
