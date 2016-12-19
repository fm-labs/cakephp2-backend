<?php
App::uses('BackendUserRole', 'Backend.Model');

/**
 * BackendUserRole Test Case
 *
 */
class BackendUserRoleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.backend.backend_user_role'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BackendUserRole = ClassRegistry::init('Backend.BackendUserRole');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BackendUserRole);

		parent::tearDown();
	}

}
