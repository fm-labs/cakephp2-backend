<?php
App::uses('Layout', 'Backend.Model');

/**
 * Layout Test Case
 *
 */
class LayoutTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.backend.layout',
		'plugin.backend.module',
		'plugin.backend.layouts_module'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Layout = ClassRegistry::init('Backend.Layout');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Layout);

		parent::tearDown();
	}

}
