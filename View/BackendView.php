<?php
class BackendView extends View {
	
	public function __construct($controller = null) {
		parent::__construct($controller);
	}
	
	public function render($view = null, $layout = null) {
		return parent::render($view,$layout);
	}
} 
?>