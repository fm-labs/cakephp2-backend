<?php
App::uses('BackendUser', 'Backend.Model');

/**
 * BackendUser Test Case
 *
 */
class BackendUserTest extends CakeTestCase {

	public $fixtures = array(
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
		//MUST VALIDATE
		$data = array(
			'username' => 'test_add_1',
		);
		$this->BackendUser->create(array('BackendUser'=>$data));
		$result = $this->BackendUser->validates();
		$this->assertTrue($result);
		
		//Scenario: Simple add with Username and password
		//MUST FAIL
		$data = array(
			'username' => 'test_add_1',
			'password' => 'my_test_password',
		);
		$this->BackendUser->create(array('BackendUser'=>$data));
		$result = $this->BackendUser->validates();
		debug($this->BackendUser->validationErrors);
		$this->assertFalse($result);
		$this->assertTrue(array_key_exists('password', $this->BackendUser->validationErrors));
		
		
		//Scenario: Simple add with Username and password
		//MUST FAIL
		$data = array(
			'username' => 'test_add_1',
			'password' => 'my_test_password',
			'password2' => ''
		);
		$this->BackendUser->create(array('BackendUser'=>$data));
		$result = $this->BackendUser->validates();
		debug($this->BackendUser->validationErrors);
		$this->assertFalse($result);
		$this->assertTrue(array_key_exists('password2', $this->BackendUser->validationErrors));
		
		//Scenario: Simple add with Username and password
		//MUST FAIL
		$data = array(
			'username' => 'test_add_1',
			'password' => 'my_test_password',
			'password2' => 'wrong_test_password'
		);
		$this->BackendUser->create(array('BackendUser'=>$data));
		$result = $this->BackendUser->validates();
		$this->assertFalse($result);
		//$this->assertTrue(array_key_exists('password', $this->BackendUser->validationErrors));
		$this->assertTrue(array_key_exists('password2', $this->BackendUser->validationErrors));
		debug($this->BackendUser->validationErrors);
		
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
