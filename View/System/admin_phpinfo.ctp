<?php $this->Html->addCrumb(__d('backend','System'),array('action'=>'index')); ?>
<?php $this->Html->addCrumb(__d('backend','PHP Info'),array('action'=>'phpinfo')); ?>

<div class="system phpinfo">
	<?php echo $phpinfo; ?>
</div>
