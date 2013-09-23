<?php $this->Html->addCrumb(__('Backend User Roles'),array('action'=>'index'),array()); ?>
<?php $this->Html->addCrumb(__('Edit %s',__('Backend User Role')),array('action'=>'edit',$this->Form->value('BackendUserRole.id')),array('class'=>'active')); ?>
<div class="backendUserRoles form">

	<h2><?php echo __('Backend User Role'); ?></h2>
	<div class="actions">
		<ul>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('BackendUserRole.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('BackendUserRole.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List %s',__('Backend User Roles')), array('action' => 'index')); ?></li>
		</ul>
	</div>
	<?php echo $this->Form->create('BackendUserRole'); ?>
	<fieldset>
		<legend><?php echo __('Edit %s', __('Backend User Role')); ?></legend>
		<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		?>
	</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
</div>