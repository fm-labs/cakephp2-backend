<?php
App::uses('AppHelper','View/Helper');

class DataFilterHelper extends AppHelper {
	
	public $helpers = array('Html','Form');
	
	public function create($model = null) {
		return $this->Form->create($model);
	}
	
	public function end() {
		return $this->Form->end();
	}
	
	public function filter($field, $options = array()) {
		$options = am(array(
			'required' => false	,
			'div' => false,
			'label' => false,
			'placeholder' => $field,
			'type' => 'text',
			'class' => 'input-medium data-filter-input'
		),$options);
		return $this->Form->input($field, $options);
	}
}