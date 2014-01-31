<?php $this->Html->addCrumb(__('Aros'),array('action' => 'index'),array()); ?>
<?php $this->Html->addCrumb(__('Add %s',__('Aro')),array('action' => 'add'),array('class' => 'active')); ?>
<div class="aros form">

	<h2><?php echo __('Aro'); ?></h2>
	<div class="actions">
		<ul>
	
				<li><?php echo $this->Html->link(__('List %s',__('Aros')), array('action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('List %s',__('Acos')), array('controller' => 'acos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New %s',__('Aco')), array('controller' => 'acos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
<?php echo $this->Form->create('Aro'); ?>
	<fieldset>
		<legend><?php echo __('Add %s', __('Aro')); ?></legend>
	<?php
		echo $this->Form->input('parent_id');
		echo $this->Form->input('model');
		echo $this->Form->input('foreign_key');
		echo $this->Form->input('alias');
		echo $this->Form->input('lft');
		echo $this->Form->input('rght');
		//echo $this->Form->input('Aco');
	?>
	</fieldset>
<div class="form-actions"><?php echo $this->Form->button(__('Submit')); ?>
</div><?php echo $this->Form->end(); ?>
</div>