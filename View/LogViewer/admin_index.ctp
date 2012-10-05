<?php $this->Html->addCrumb(__('LogViewer'),array('action'=>'index')); ?>
<div class="index">
	<h1><?php echo __('LogViewer'); ?></h1>
	
	<table>
		<tr>
			<th><?php echo __('Logfile');?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
	<?php foreach($logFiles as $logFile):?>
		<?php $id = basename($logFile,'.log'); ?>
		<tr>
			<td><?php echo $this->Html->link($logDir.$logFile,array('action'=>'view',$id)); ?></td>
			<td class="actions">
				<ul class="actions">
					<li><?php echo $this->Html->link(__('View'),array('action'=>'view',$id)); ?></li>
					<li><?php echo $this->Html->link(__('Backup & Clear'),array('action'=>'backup',$id)); ?></li>
					<li><?php echo $this->Html->link(__('Clear'),array('action'=>'clear',$id)); ?></li>
					<li><?php echo $this->Html->link(__('Delete'),array('action'=>'delete',$id)); ?></li>
				</ul>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
</div>