<?php
App::uses('CmsPage', 'Backend.Model');

/**
 * CmsPage Test Case
 *
 */
class CmsPageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.backend.cms_page'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CmsPage = ClassRegistry::init('Backend.CmsPage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CmsPage);

		parent::tearDown();
	}

}
