<?php
App::uses('LayoutModule', 'Backend.Model');

/**
 * LayoutModule Test Case
 *
 */
class LayoutModuleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.backend.layout_module',
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
		$this->LayoutModule = ClassRegistry::init('Backend.LayoutModule');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->LayoutModule);

		parent::tearDown();
	}

}
