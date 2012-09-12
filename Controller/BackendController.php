<?php
App::uses('BackendAppController', 'Backend.Controller');
App::uses('CakeLayoutModules', 'CakeLayout.Lib');

class BackendController extends BackendAppController {

	public function admin_index() {
		
	}
	
	public function admin_modules_available() {
		
		$modules = CakeLayoutModules::listAvailable();
		
		debug($modules);
		
		$this->render('admin_index');
	}
	
}
?>