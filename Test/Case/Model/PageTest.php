<?php
App::uses('Page', 'Backend.Model');

/**
 * Page Test Case
 *
 */
class PageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.backend.page'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Page = ClassRegistry::init('Backend.Page');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Page);

		parent::tearDown();
	}

}
