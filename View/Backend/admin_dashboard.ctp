<?php $this->Html->addCrumb(__('Backend'), array('controller'=>'backend', 'action'=>'index')); ?>

<div class="index backend">
	<h1>Backend</h1>

	<?php echo $this->Html->link(__('Backend Index'),array('action'=>'dashboard')); ?><br />
	
	<section class="ym-grid" style="margin-top: 1em;">
		<?php echo $this->element('Backend.dashboard',compact('dashboard')); ?>
	</section>	

	
</div>