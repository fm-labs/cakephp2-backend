<?php
App::uses('BackendUser', 'Backend.Model');

/**
 * BackendUser Test Case
 *
 */
class BackendUserTest extends CakeTestCase {

	public $fixture = array(
		'plugin.backend.backend_user'	
	);
	
/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BackendUser = ClassRegistry::init('Backend.BackendUser');
	}
	
	public function testAdd() {
		//Scenario: Simple add with Username only
		$data = array(
			'username' => 'test_add_1',
		);
		$this->BackendUser->create(array('BackendUser'=>$data));
		$result = $this->BackendUser->validates();
		$this->assertTrue($result);
		
		//Scenario: Simple add with Username and password
		$data = array(
			'username' => 'test_add_1',
			'password' => 'my_test_password',
			'password2' => ''	
		);
		$this->BackendUser->create(array('BackendUser'=>$data));
		$result = $this->BackendUser->validates();
		$this->assertTrue($result);
		
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BackendUser);

		parent::tearDown();
	}

}
