<?php $this->Html->addCrumb(__('Backend User Roles'),array('action'=>'index'),array()); ?>
<?php $this->Html->addCrumb(__('View %s','#'.$this->request->params['pass'][0]),array('action'=>'view',$this->request->params['pass'][0]),array('class'=>'active')); ?>
<div class="backendUserRoles view">
<h2><?php  echo __('Backend User Role'); ?></h2>

<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Edit %s',__('Backend User Role')), array('action' => 'edit', $backendUserRole['BackendUserRole']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete %s',__('Backend User Role')), array('action' => 'delete', $backendUserRole['BackendUserRole']['id']), null, __('Are you sure you want to delete # %s?', $backendUserRole['BackendUserRole']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List %s',__('Backend User Roles')), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New %s',__('Backend User Role')), array('action' => 'add')); ?> </li>
	</ul>
</div>

	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($backendUserRole['BackendUserRole']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($backendUserRole['BackendUserRole']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

