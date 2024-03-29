<?php $this->Html->addCrumb(__('Acos'),array('action' => 'index'),array()); ?>
<?php $this->Html->addCrumb(__('View %s','#'.$this->request->params['pass'][0]),array('action' => 'view',$this->request->params['pass'][0]),array('class' => 'active')); ?>
<div class="acos view">
<h2><?php  echo __('Aco'); ?></h2>

<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Edit %s',__('Aco')), array('action' => 'edit', $aco['Aco']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete %s',__('Aco')), array('action' => 'delete', $aco['Aco']['id']), null, __('Are you sure you want to delete # %s?', $aco['Aco']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List %s',__('Acos')), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New %s',__('Aco')), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List %s',__('Aros')), 
					array('controller' => 'aros', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New %s',__('Aro')), 
					array('controller' => 'aros', 'action' => 'add')); ?> </li>
	</ul>
</div>

	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($aco['Aco']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Id'); ?></dt>
		<dd>
			<?php echo h($aco['Aco']['parent_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Model'); ?></dt>
		<dd>
			<?php echo h($aco['Aco']['model']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Foreign Key'); ?></dt>
		<dd>
			<?php echo h($aco['Aco']['foreign_key']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alias'); ?></dt>
		<dd>
			<?php echo h($aco['Aco']['alias']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lft'); ?></dt>
		<dd>
			<?php echo h($aco['Aco']['lft']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rght'); ?></dt>
		<dd>
			<?php echo h($aco['Aco']['rght']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

<div class="related">
	<h3><?php echo __('Related %s',__('Aros')); ?></h3>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New %s',__('Aro')), 
				array('controller' => 'aros', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	<table cellpadding = "0" cellspacing = "0">
	<?php if (!empty($aco['Aro'])): ?>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Model'); ?></th>
		<th><?php echo __('Foreign Key'); ?></th>
		<th><?php echo __('Alias'); ?></th>
		<th><?php echo __('Lft'); ?></th>
		<th><?php echo __('Rght'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($aco['Aro'] as $aro): ?>
		<tr>
			<td><?php echo $aro['id']; ?></td>
			<td><?php echo $aro['parent_id']; ?></td>
			<td><?php echo $aro['model']; ?></td>
			<td><?php echo $aro['foreign_key']; ?></td>
			<td><?php echo $aro['alias']; ?></td>
			<td><?php echo $aro['lft']; ?></td>
			<td><?php echo $aro['rght']; ?></td>
			<td class="actions">
			<ul class="actions">
				<li><?php echo $this->Html->link(__('View'), 
				array('controller' => 'aros', 'action' => 'view', $aro['id'])); ?></li>
				<li><?php echo $this->Html->link(__('Edit'), 
				array('controller' => 'aros', 'action' => 'edit', $aro['id'])); ?></li>
				<li><?php echo $this->Form->postLink(__('Delete'), 
				array('controller' => 'aros', 'action' => 'delete', $aro['id']), null, __('Are you sure you want to delete # %s?', $aro['id'])); ?></li>
			</ul>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
