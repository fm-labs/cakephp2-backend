
<?php $this->Html->addCrumb(__('Backend User Roles'),array('action'=>'index'),array('class'=>'active')); ?>
<div class="backendUserRoles index">
	<h2><?php echo __('Backend User Roles'); ?></h2>
	

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New %s',__('Backend User Role')), array('action' => 'add')); ?></li>
			</ul>
	</div>
	
	<table>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($backendUserRoles as $backendUserRole): ?>
	<tr>
		<td><?php echo h($backendUserRole['BackendUserRole']['id']); ?>&nbsp;</td>
		<td><?php echo h($backendUserRole['BackendUserRole']['name']); ?>&nbsp;</td>
		<td class="actions">
		<ul class="actions">
			<li><?php echo $this->Html->link(__('View'), array('action' => 'view', $backendUserRole['BackendUserRole']['id'])); ?></li>
			<li><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $backendUserRole['BackendUserRole']['id'])); ?></li>
			<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $backendUserRole['BackendUserRole']['id']), null, __('Are you sure you want to delete # %s?', $backendUserRole['BackendUserRole']['id'])); ?></li>
		</ul>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<?php echo $this->element('Backend.pagination/default'); ?>		
</div>
