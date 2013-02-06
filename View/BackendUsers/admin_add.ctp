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
	echo $this->Form->input('backend_user_group_id');
	echo $this->Form->input('username');
	echo $this->Form->input('mail');
	echo $this->Form->input('first_name');
	echo $this->Form->input('last_name');
	
	echo $this->Form->input('password',array('type'=>'password','default'=>''));
	echo $this->Form->input('password2',array('type'=>'password','default'=>''));
	
	echo $this->Form->input('published');
?>
<?php echo $this->Form->submit(__d('backend','Submit'));?>
	</fieldset>
<?php echo $this->Form->end();?>
</div>