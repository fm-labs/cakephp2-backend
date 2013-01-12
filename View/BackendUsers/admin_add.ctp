<?php $this->Html->addCrumb(__('Backend'), array('controller'=>'backend', 'action'=>'index')); ?>
<?php $this->Html->addCrumb(__('Backend User'), array('action'=>'index')); ?>
<div class="backendUsers form">
<h2><?php echo __d('backend','Backend User'); ?></h2>

<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__d('backend','List %s', __d('backend','Backend Users')), array('action' => 'index'));?></li>
	</ul>
</div>
<?php echo $this->Form->create('BackendUser');?>
	<fieldset>
		<legend><?php echo __d('backend','Admin Add', __d('backend','Backend User')); ?></legend>
<?php
	echo $this->Form->input('username');
?>
<?php echo $this->Form->submit(__d('backend','Submit'));?>
	</fieldset>
<?php echo $this->Form->end();?>
</div>