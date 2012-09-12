<?php
App::uses('LayoutsModule', 'Backend.Model');

/**
 * LayoutsModule Test Case
 *
 */
class LayoutsModuleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.backend.layouts_module',
		'plugin.backend.layout',
		'plugin.backend.module'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->LayoutsModule = ClassRegistry::init('Backend.LayoutsModule');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->LayoutsModule);

		parent::tearDown();
	}

}
