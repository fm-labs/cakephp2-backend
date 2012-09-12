<?php echo $this->extend('Backend.Common/tabs'); ?><?php echo $this->assign('title',__d('backend','Settings')); ?><div class="settings index">
	<h2><?php echo __d('backend','Settings');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('namespace');?></th>
			<th><?php echo $this->Paginator->sort('path');?></th>
			<th><?php echo $this->Paginator->sort('type');?></th>
			<th><?php echo $this->Paginator->sort('value');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('published');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __d('backend','Actions');?></th>
	</tr>
	<?php
	foreach ($settings as $setting): ?>
	<tr>
		<td><?php echo h($setting['Setting']['id']); ?>&nbsp;</td>
		<td><?php echo h($setting['Setting']['namespace']); ?>&nbsp;</td>
		<td><?php echo h($setting['Setting']['path']); ?>&nbsp;</td>
		<td><?php echo h($setting['Setting']['type']); ?>&nbsp;</td>
		<td><?php echo h($setting['Setting']['value']); ?>&nbsp;</td>
		<td><?php echo h($setting['Setting']['description']); ?>&nbsp;</td>
		<td><?php echo h($setting['Setting']['published']); ?>&nbsp;</td>
		<td><?php echo h($setting['Setting']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__d('backend','View'), array('action' => 'view', $setting['Setting']['id'])); ?>
			<?php echo $this->Html->link(__d('backend','Edit'), array('action' => 'edit', $setting['Setting']['id'])); ?>
			<?php echo $this->Form->postLink(__d('backend','Delete'), array('action' => 'delete', $setting['Setting']['id']), null, __d('backend','Are you sure you want to delete # %s?', $setting['Setting']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	
	<?php echo $this->element('Backend.pagination/default'); ?>	
</div>
<div class="actions">
	<h3><?php echo __d('backend','Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__d('backend','New Setting'), array('action' => 'add')); ?></li>
	</ul>
</div>
