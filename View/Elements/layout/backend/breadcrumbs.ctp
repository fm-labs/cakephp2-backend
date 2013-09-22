<div class="breadcrumbs">
<?php echo __('Your are here');?>:
<?php
	$text = (Configure::read('Backend.Dashboard.title')) 
		? Configure::read('Backend.Dashboard.title') 
		: __('Dashboard');
	
	$url = (Configure::read('Backend.Dashboard.url')) 
		? Configure::read('Backend.Dashboard.url') 
		: array('plugin'=>'backend','controller'=>'backend','action'=>'dashboard');
	
	echo $this->Html->getCrumbs('&raquo;', compact('text','url'));
?>
</div>