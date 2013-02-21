<?php 
echo $this->element('Backend.Modules/navigation/sidebar',array(
		'nav'=>$this->get('backend_sidebar_menu')
));
?>