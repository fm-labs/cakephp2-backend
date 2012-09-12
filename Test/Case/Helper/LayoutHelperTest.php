<?php
App::uses('View','View');
App::uses('LayoutHelper', 'Backend.View/Helper');

class LayoutHelperTest extends CakeTestCase {
	
	public function setUp() {
		parent::setUp();
	}
	
	public function tearDown() {
		parent::tearDown();
	}
	
	public function testConstructWithPassedModules() {
		
		$testModules = array(
			'test' => array(
				'mod_a',
				'PluginA.mod_b',		
			)	
		);
		$View = new View();
		$View->set('modules', $testModules);		
		$LayoutHelper = new LayoutHelper($View);
		
		$result = $LayoutHelper->modules('test');
		
		$this->assertEqual($result, $testModules['test']);
	}
	
}
?>