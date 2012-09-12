<?php
App::uses('CakeLayoutModules', 'CakeLayout.Lib');

class CakeLayoutModulesTest extends CakeTestCase {
	
	public function setUp() {
		parent::setUp();
		
		defined('TEST_APP_ROOT') 
			or define('TEST_APP_ROOT', App::pluginPath('CakeLayout').DS.'Test'.DS.'test_app'.DS);
	}
	
	public function tearDown() {
		parent::tearDown();
	}
	
	public function testTestSetup() {
		$this->assertTrue(is_dir(TEST_APP_ROOT));
	}
	
	public function testFindInPath() {
		
		$testPaths = array(
			0 => TEST_APP_ROOT.'View',	
		);
		
		$result = CakeLayoutModules::findInPath($testPaths, null);
		
		$expected = array(
			0 => 'test'.DS.'mod_a',
			1 => 'test'.DS.'mod_b',	
		);
		
		$this->assertEqual($result, $expected);
	}
	
	public function testFindInPathOfPlugin() {
	
		$testPaths = array(
				0 => TEST_APP_ROOT.'Plugin'.DS.'PluginA'.DS.'View',
		);
	
		$result = CakeLayoutModules::findInPath($testPaths, 'PluginA');
	
		$expected = array(
				0 => 'PluginA.plugintest'.DS.'mod_a',
				1 => 'PluginA.plugintest'.DS.'mod_b',
		);
	
		$this->assertEqual($result, $expected);
	}
	
	public function testAppModules() {
		//TODO testAppModules()
	}
	
	public function testPluginModules() {
		App::build(array('Plugin'=>array(TEST_APP_ROOT.'Plugin'.DS)));
		CakePlugin::load('PluginA');
		
		$result = CakeLayoutModules::pluginModules('PluginA');
		
		$expected = array(
				0 => 'PluginA.plugintest'.DS.'mod_a',
				1 => 'PluginA.plugintest'.DS.'mod_b',
		);
	
		$this->assertEqual($result, $expected);
	}
	
}
?>