<?php
App::uses('AppController', 'Controller');

class BackendAppController extends AppController {
	
	public $helpers = array('Html','Session');
	
	public $components = array('Session', 'Auth', 'Backend.Backend');
	
}
?>