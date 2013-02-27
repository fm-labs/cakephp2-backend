<div class="sidebar">
	<?php
	$element = ($this->get('backend_sidebar_element')) ? $this->get('backend_sidebar_element') : 'Backend.Modules/navigation/sidebar';
	$nav = ($this->get('backend_sidebar_menu')) ? $this->get('backend_sidebar_menu') : array();
	
	if (!$nav && $this->params['plugin']) {
		$pluginElement = Inflector::camelize($this->params['plugin']).'.backend/sidebar';
		if (isset($this->params['plugin']) && $this->elementExists($pluginElement)) {
			$element = $pluginElement;
		}
		else {
			$nav = Configure::read('Backend.Navigation.'.$this->params['plugin']);
		}
	}
	if (!$nav) {
		$nav = Configure::read('Backend.Navigation.default');
	}
	echo $this->element($element,array('nav'=>$nav));
	
	/*
	if($this->fetch('sidebar')) {
		echo $this->fetch('sidebar'); 
	
	} else {
		$pluginElement = Inflector::camelize($this->params['plugin']).'.backend/sidebar';
		if (isset($this->params['plugin']) && $this->elementExists($pluginElement)) {
			echo $this->element($pluginElement);
		} 
		elseif (isset($this->params['plugin']) && Configure::read('Backend.Navigation.'.$this->params['plugin'])) {
			echo $this->element('Backend.Modules/navigation/sidebar', array('nav'=>Configure::read('Backend.Navigation.'.$this->params['plugin'])));
		}
		elseif (Configure::read('Backend.Navigation.default')) {
			echo $this->element('Backend.Modules/navigation/sidebar', array('nav'=>Configure::read('Backend.Navigation.default')));
		}
		elseif (Configure::read('debug')>0) {
			echo __("No sidebar available");
		}
	}
	*/
	?>
</div>