<?php $this->Html->addCrumb(__('Backend User Roles'),array('action'=>'index'),array()); ?>
<?php $this->Html->addCrumb(__('Add %s',__('Backend User Role')),array('action'=>'add'),array('class'=>'active')); ?>
<div class="backendUserRoles form">

	<h2><?php echo __('Backend User Role'); ?></h2>
	<div class="actions">
		<ul>
		<li><?php echo $this->Html->link(__('List %s',__('Backend User Roles')), array('action' => 'index')); ?></li>
		</ul>
	</div>
	<?php echo $this->Form->create('BackendUserRole'); ?>
	<fieldset>
		<legend><?php echo __('Add %s', __('Backend User Role')); ?></legend>
		<?php
		echo $this->Form->input('name');
		?>
	</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
</div>