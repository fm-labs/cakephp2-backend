<div class="breadcrumbs">
<?php echo __('Your are here');?>:
<?php 
	echo $this->Html->link(__('Dashboard'), 
		array('plugin'=>'backend','controller'=>'backend','action'=>'index')); ?>&raquo;<?php 
	echo $this->Html->getCrumbs(); 
?>
</div>