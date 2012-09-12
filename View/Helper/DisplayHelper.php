<?php
App::uses('AppHelper','View/Helper');

/**
 * Display Helper
 * 
 * Helper class that holds some useful function to output data
 * 
 * @author Flow
 * @property HtmlHelper $Html
 * @property JqueryCollapsableHelper $JqueryCollapsable
 */
class DisplayHelper extends AppHelper {

	public $helpers = array('Html','Jquery.JqueryCollapsable');
	
	public function __construct(&$View, $settings = array())  {
		parent::__construct($View, $settings);
		
		$this->Html->loadConfig('CakeLayout.display_tags');
	}

/**
 * Icon for boolean variable
 * 
 * @param boolean $boolVar Boolean value
 * @param mixed $params CSS class prefix string or array with html attributes
 */	
	public function iconBool($boolVar, $params = array()) {
		
		if (!is_array($params))
			$params = array('class' => $params);
		
		$params = array_merge(array(
			'class' => 'icon-bool-'
		),$params);
		
		$params['class'] .= ($boolVar == true) ? '1' : '0';
		return $this->icon($params);
	}

/**
 * Generate Icon for given $params
 * 
 * @param mixed $params Accepts string and array. A string param is used as image-source-path or icon params depending on $type
 * @param string $type Type can be 'image' or 'icon'(default)
 */	
	public function icon($params,$type = 'icon') {
		
		//determin type
		if (is_array($params) && isset($params['type'])) {
			$type = $params['type'];
			unset($params['type']);
		}
		
		//handly icon as Html::image()
		if ($type == 'image') {
			if (is_array($params) && isset($params['src'])) {
				$src = $params['src'];
				unset($params['src']);
			} else {
				$src = $params;
				$params = array();
			}
			return $this->Html->image($src,$params);
		}
		
		//handle as css icon
		if (!is_array($params)) {
			$params = array('class' => 'icon ' . $params);
		}
		
		return $this->Html->useTag('icon',$params);
	}
	
	
	public function collapsableNestedList($data, $params = array()) {
		return $this->JqueryCollapsable->collapsableNestedList($data, $params);
	}
	
	public function actions($actions) {
		
	}
}
?>
