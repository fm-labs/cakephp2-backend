<div class="breadcrumbs">
<?php echo __('Your are here');?>:
<?php 
	echo $this->Html->link(__('Dashboard'), 
		array('plugin'=>'backend','controller'=>'backend','action'=>'dashboard')); ?>&raquo;<?php 
	echo $this->Html->getCrumbs(); 
?>
</div>