<div class="sidebar">
	<?php 
	if($this->fetch('sidebar')) {
		echo $this->fetch('sidebar'); 
	} else {
		$pluginElement = Inflector::camelize($this->request->params['plugin']).'.backend/sidebar';
		if (isset($this->request->params['plugin']) && $this->elementExists($pluginElement)) {
			echo $this->element($pluginElement);
		} else {
			echo $this->element('Backend.Modules/navigation/sidebar', array('nav'=>Configure::read('Backend.Navigation')));
		}
	}?>
</div>