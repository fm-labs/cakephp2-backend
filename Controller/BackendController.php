<?php
App::uses('BackendAppController', 'Backend.Controller');

class BackendController extends BackendAppController {

	public function index() {
		$this->redirect(array('admin'=>true,'action'=>'index'));
	}
	
	public function admin_dashboard() {
		
	}
	
		
	public function admin_index() {
		$dashboard = array(
			'system' => array(
				'title' => __d('backend','System'),
				'url' => array('plugin'=>'backend','controller'=>'system', 'action' => 'index'),
				'actions' => array(
					array(__d('backend','Plugins'),array('plugin'=>'backend','controller'=>'system', 'action' => 'plugins'),null),
					array(__d('backend','Php Info'),array('plugin'=>'backend','controller'=>'system', 'action' => 'phpinfo'),null),
					array(__d('backend','Date & Time Info'),array('plugin'=>'backend','controller'=>'system', 'action' => 'datetime'),null),
					array(__d('backend','Globals'),array('plugin'=>'backend','controller'=>'system', 'action' => 'globals'),null),
					array(__d('backend','Session'),array('plugin'=>'backend','controller'=>'system', 'action' => 'session'),null),
					array(__d('backend','Config'),array('plugin'=>'backend','controller'=>'system', 'action' => 'config'),null),
				)		
			),
			'logs' => array(
				'title' => __d('backend','Logs'),
				'url' => array('plugin'=>'backend','controller'=>'log_viewer', 'action' => 'index'),
				'actions' => array(
					array(__d('backend','Debug'),array('plugin'=>'backend','controller'=>'log_viewer', 'action' => 'view','debug'),null),
					array(__d('backend','Error'),array('plugin'=>'backend','controller'=>'log_viewer', 'action' => 'view','error'),null),
					array(__d('backend','Auth'),array('plugin'=>'backend','controller'=>'log_viewer', 'action' => 'view','auth'),null),
					array(__d('backend','Backend'),array('plugin'=>'backend','controller'=>'log_viewer', 'action' => 'view','backend'),null),
				)		
			),
			'unit_tests' => array(
				'title' => __d('backend','Unit Tests'),
				'url' => array('plugin'=>'backend','controller'=>'unit_tests', 'action' => 'index'),
				'actions' => array(
					array(__d('backend','Unit Tests'),array('plugin'=>'backend','controller'=>'unit_tests', 'action' => 'index'),null),
				)
			),
			'appearance' => array(
				'title' => __d('backend','Appearance'),
				'url' => array('plugin'=>'backend','controller'=>'appearance', 'action' => 'index'),
				'actions' => array(
					array(__d('backend','Typo'),array('plugin'=>'backend','controller'=>'appearance', 'action' => 'typo'),null),
					array(__d('backend','Form'),array('plugin'=>'backend','controller'=>'appearance', 'action' => 'form'),null),
					array(__d('backend','Flash'),array('plugin'=>'backend','controller'=>'appearance', 'action' => 'flash'),null),
					array(__d('backend','Collapsable'),array('plugin'=>'backend','controller'=>'appearance', 'action' => 'collapsable'),null),
				)
			),
			'backend_users' => array(
				'title' => __d('backend','Backend Users'),
				'url' => array('plugin'=>'backend','controller'=>'backend_users', 'action' => 'index'),
				'actions' => array(
					array(__d('backend','Add'),array('plugin'=>'backend','controller'=>'backend_users', 'action' => 'add'),null),
				)
			),
			'curl' => array(
				'title' => __d('backend','Curl'),
				'url' => array('plugin'=>'backend','controller'=>'curl', 'action' => 'index'),
				'actions' => array(
					array(__d('backend','Test request'),array('plugin'=>'backend','controller'=>'curl', 'action' => 'request'),null),
				)
			),
			'auth' => array(
				'title' => __d('backend','Auth'),
				'url' => array('plugin'=>'backend','controller'=>'auth', 'action' => 'user'),
				'actions' => array(
					array(__d('backend','Current user'),array('plugin'=>'backend','controller'=>'auth', 'action' => 'user'),null),
					array(__d('backend','Logout'),array('plugin'=>'backend','controller'=>'auth', 'action' => 'logout'),null),
				)
			),
			'jquery' => array(
				'title' => __d('backend','Jquery'),
				'url' => array('plugin'=>'backend','controller'=>'jquery', 'action' => 'index'),
				'actions' => array(
					array(__d('backend','Syntax Highligher'),array('plugin'=>'backend','controller'=>'jquery', 'action' => 'syntaxhighlighter'),null),
					array(__d('backend','Jquery TinyMce Editor'),array('plugin'=>'backend','controller'=>'jquery', 'action' => 'tinymce'),null),
					array(__d('backend','Jquery Iphoneswitch'),array('plugin'=>'backend','controller'=>'jquery', 'action' => 'iphoneswitch'),null),
					array(__d('backend','Jquery Ui'),array('plugin'=>'backend','controller'=>'jquery', 'action' => 'ui'),null),
					array(__d('backend','Jquery Colorbox'),array('plugin'=>'backend','controller'=>'jquery', 'action' => 'colorbox'),null),
				)
			),
		);
		
		$this->set(compact('dashboard'));
		
	}
	
}
?>