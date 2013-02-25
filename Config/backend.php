<?php
/**
 * Default Backend config
 */
$config = array(
	'Backend' => array(
		'Dashboard' => array(
			'title' => 'Dashboard',
			'url' => array('plugin'=>'backend','controller'=>'backend','action'=>'dashboard'),
			'plugins' => array('Backend')		
		)		
	)	
);
?>