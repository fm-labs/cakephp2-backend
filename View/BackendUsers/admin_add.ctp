<?php $this->Html->addCrumb(__('Backend'), array('controller'=>'backend', 'action'=>'index')); ?>
<?php $this->Html->addCrumb(__('Backend Users'), array('action'=>'index')); ?>
<div class="backendUsers form">
<h2><?php echo __d('backend','Backend User'); ?></h2>

<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__d('backend','List %s', __d('backend','Backend Users')), array('action' => 'index'));?></li>
	</ul>
</div>
<?php echo $this->Form->create('BackendUser',array('novalidate'=>true));?>
	<fieldset>
		<legend><?php echo __d('backend','Add', __d('backend','Backend User')); ?></legend>
<?php
	echo $this->Form->input('username',array('class'=>'input-block-level'));
	echo $this->Form->input('mail',array('class'=>'input-block-level'));
	echo $this->Form->input('first_name',array('class'=>'input-block-level'));
	echo $this->Form->input('last_name',array('class'=>'input-block-level'));
	
	echo $this->Form->input('pass',array('type'=>'password','default'=>'','class'=>'input-block-level'));
	echo $this->Form->input('pass2',array('type'=>'password','default'=>'','class'=>'input-block-level'));

	//echo $this->Form->input('published');
	
	echo $this->Form->input('BackendUserRole',array('class'=>'input-block-level'));
?>
<?php echo $this->Form->submit(__d('backend','Submit'));?>
	</fieldset>
<?php echo $this->Form->end();?>
</div>