<?php
App::uses('Module', 'Backend.Model');

/**
 * Module Test Case
 *
 */
class ModuleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.backend.module'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Module = ClassRegistry::init('Backend.Module');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Module);

		parent::tearDown();
	}

}
