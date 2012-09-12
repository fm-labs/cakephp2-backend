<?php
App::uses('LayoutView', 'Backend.Model');

/**
 * LayoutView Test Case
 *
 */
class LayoutViewTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.backend.layout_view',
		'plugin.backend.module',
		'plugin.backend.layout_views_module'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->LayoutView = ClassRegistry::init('Backend.LayoutView');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->LayoutView);

		parent::tearDown();
	}

}
