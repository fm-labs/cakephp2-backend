<?php echo $this->extend('Backend.Common/tabs'); ?><?php echo $this->assign('title',__d('backend','Setting')); ?><div class="settings form">
<?php echo $this->Form->create('Setting');?>
	<fieldset>
		<legend><?php echo __d('backend','Admin Edit Setting'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('namespace');
		echo $this->Form->input('path');
		echo $this->Form->input('type');
		echo $this->Form->input('value');
		echo $this->Form->input('description');
		echo $this->Form->input('published');
	?>
	</fieldset>
<?php echo $this->Form->end(__d('backend','Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __d('backend','Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__d('backend','Delete'), array('action' => 'delete', $this->Form->value('Setting.id')), null, __d('backend','Are you sure you want to delete # %s?', $this->Form->value('Setting.id'))); ?></li>
		<li><?php echo $this->Html->link(__d('backend','List Settings'), array('action' => 'index'));?></li>
	</ul>
</div>
