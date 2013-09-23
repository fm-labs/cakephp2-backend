<?php $this->Html->addCrumb(__('Backend'), array('controller'=>'backend', 'action'=>'index')); ?>
<?php $this->Html->addCrumb(__('Backend Users'), array('action'=>'index')); ?>
<div class="backendUsers form">
<h2><?php echo __d('backend','Backend User'); ?></h2>
<div class="actions">
	<ul>
		<li><?php echo $this->Form->postLink(__d('backend','Delete'), array('action' => 'delete', $this->Form->value('BackendUser.id')), null , __d('backend','Are you sure you want to delete # %s?', $this->Form->value('BackendUser.id'))); ?></li>
		<li><?php echo $this->Html->link(__d('backend','List %s', __d('backend','Backend Users')), array('action' => 'index'));?></li>
	</ul>
</div>

<?php echo $this->Form->create('BackendUser');?>
	<fieldset>
		<legend><?php echo __d('backend','Edit', __d('backend','Backend User')); ?></legend>
<?php
	echo $this->Form->input('id'); 
	echo $this->Form->input('username');
	echo $this->Form->input('mail');
	echo $this->Form->input('first_name');
	echo $this->Form->input('last_name');
	
	echo $this->Form->input('pass',array('type'=>'password','default'=>'','required'=>false));
	echo $this->Form->input('pass2',array('type'=>'password','default'=>'','required'=>false));
	
	echo $this->Form->input('published');
	echo $this->Form->input('BackendUserRole');
?>
	<div class="form-actions">
	<?php echo $this->Form->button(__d('backend','Submit'));?>
	</div>
	
	</fieldset>
<?php echo $this->Form->end();?>
</div>
