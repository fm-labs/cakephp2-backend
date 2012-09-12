<?php 
$this->extend('Backend.Common/tabs');
$this->assign('title',__d('backend',"System Information"));
?>

<div>
	<h1><?php echo __d('backend',"System "); ?></h1>


	<dl>
		<dt><?php echo __d('backend',"PHP Version")?></dt>
		<dd><?php echo phpversion();?></dd>
	
		<dt><?php echo __d('backend',"Cake Version");?></dt>
		<dd><?php echo Configure::version();?></dd>
		
		<dt><?php echo __d('backend',"Magic quotes");?></dt>
		<dd><?php echo (get_magic_quotes_gpc()) ? __('Enabled') : __('Disabled') ;?></dd>
		
		<dt><?php echo __d('backend',"User Agent");?></dt>
		<dd><?php echo env('HTTP_USER_AGENT') ;?></dd>
		
		<dt><?php echo __d('backend',"Client IP");?></dt>
		<dd><?php echo $this->request->clientIp();?></dd>
	
	</dl>


</div>