<?php
App::uses('BackendAppController','Backend.Controller');

class AppearanceController extends BackendAppController {

	public $uses = array();
	
	public function admin_index() {
		$this->redirect('typo');
	}
	
	public function admin_typo() {}
	
	public function admin_form() {}
	
	public function admin_collapsable() {}
	
}
?>