<?php
App::uses('BackendAppController','Backend.Controller');

class AclController extends BackendAppController {
	
	public $uses = array('Aro','Aco','Permission');
	
	public function admin_index($parent_id = 1) {
		
		$this->Aro->recursive = -1;
		$aros = $this->Aro->find('all',array(
			'conditions' => array('Aro.parent_id'=>'')		
		));
		
		$this->Aco->recursive = -1;
		
		$acos = $this->Aco->find('all',array(
				'conditions' => array('or' => array('Aco.parent_id' => $parent_id, 'Aco.id'=>array(1,$parent_id))),
				'order'=>'Aco.lft ASC')
		);
		
		$this->Permission->recursive = -1;
		$permissions = $this->Permission->find('all');
		
		$this->set(compact('aros','acos','permissions'));
	}
}