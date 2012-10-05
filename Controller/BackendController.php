<?php
App::uses('BackendAppController', 'Backend.Controller');
App::uses('CakeLayoutModules', 'CakeLayout.Lib');

class BackendController extends BackendAppController {

	public function admin_index() {
		
		$dashboard = array(
			'system' => array(
				'title' => __('System'),
				'url' => array('plugin'=>'backend','controller'=>'system', 'action' => 'index'),
				'actions' => array(
					array(__('Plugins'),array('plugin'=>'backend','controller'=>'system', 'action' => 'plugins'),null),
					array(__('Php Info'),array('plugin'=>'backend','controller'=>'system', 'action' => 'phpinfo'),null),
					array(__('Globals'),array('plugin'=>'backend','controller'=>'system', 'action' => 'globals'),null),
				)		
			),
			'logs' => array(
				'title' => __('Logs'),
				'url' => array('plugin'=>'backend','controller'=>'log_viewer', 'action' => 'index'),
				'actions' => array(
					array(__('Debug'),array('plugin'=>'backend','controller'=>'log_viewer', 'action' => 'view','debug'),null),
					array(__('Error'),array('plugin'=>'backend','controller'=>'log_viewer', 'action' => 'view','error'),null),
					array(__('Auth'),array('plugin'=>'backend','controller'=>'log_viewer', 'action' => 'view','auth'),null),
					array(__('Backend'),array('plugin'=>'backend','controller'=>'log_viewer', 'action' => 'view','backend'),null),
				)		
			),
			'appearance' => array(
				'title' => __('Appearance'),
				'url' => array('plugin'=>'backend','controller'=>'appearance', 'action' => 'index'),
				'actions' => array(
					array(__('Typo'),array('plugin'=>'backend','controller'=>'appearance', 'action' => 'typo'),null),
					array(__('Form'),array('plugin'=>'backend','controller'=>'appearance', 'action' => 'form'),null),
					array(__('Collapsable'),array('plugin'=>'backend','controller'=>'appearance', 'action' => 'collapsable'),null),
				)
			),
			'backend_users' => array(
				'title' => __('Backend Users'),
				'url' => array('plugin'=>'backend','controller'=>'backend_users', 'action' => 'index'),
				'actions' => array(
					array(__('Add'),array('plugin'=>'backend','controller'=>'backend_users', 'action' => 'add'),null),
				)
			),
			'curl' => array(
				'title' => __('Curl'),
				'url' => array('plugin'=>'backend','controller'=>'curl', 'action' => 'index'),
				'actions' => array(
					array(__('Test request'),array('plugin'=>'backend','controller'=>'curl', 'action' => 'request'),null),
				)
			),
			'auth' => array(
				'title' => __('Auth'),
				'url' => array('plugin'=>'backend','controller'=>'auth', 'action' => 'user'),
				'actions' => array(
					array(__('Current user'),array('plugin'=>'backend','controller'=>'auth', 'action' => 'user'),null),
					array(__('Logout'),array('plugin'=>'backend','controller'=>'auth', 'action' => 'logout'),null),
				)
			),
			'jquery' => array(
				'title' => __('Jquery'),
				'url' => array('plugin'=>'backend','controller'=>'jquery', 'action' => 'index'),
				'actions' => array(
					array(__('Syntax Highligher'),array('plugin'=>'backend','controller'=>'jquery', 'action' => 'syntaxhighlighter'),null),
					array(__('Jquery TinyMce Editor'),array('plugin'=>'backend','controller'=>'jquery', 'action' => 'tinymce'),null),
					array(__('Jquery Iphoneswitch'),array('plugin'=>'backend','controller'=>'jquery', 'action' => 'iphoneswitch'),null),
					array(__('Jquery Ui'),array('plugin'=>'backend','controller'=>'jquery', 'action' => 'ui'),null),
					array(__('Jquery Colorbox'),array('plugin'=>'backend','controller'=>'jquery', 'action' => 'colorbox'),null),
				)
			),
		);
		
		$this->set(compact('dashboard'));
		
	}
	
	public function admin_modules_available() {
		
		$modules = CakeLayoutModules::listAvailable();
		
		debug($modules);
		
		$this->render('admin_index');
	}
	
}
?>