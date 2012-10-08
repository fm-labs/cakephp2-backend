<?php $this->Html->addCrumb(__d('backend','LogViewer'),array('action'=>'index')); ?>
<div class="index">
	<h1><?php echo __d('backend','LogViewer'); ?></h1>
	
	<table>
		<tr>
			<th><?php echo __d('backend','Logfile');?></th>
			<th class="actions"><?php echo __d('backend','Actions'); ?></th>
		</tr>
	<?php foreach($logFiles as $logFile):?>
		<?php $id = basename($logFile,'.log'); ?>
		<tr>
			<td><?php echo $this->Html->link($logDir.$logFile,array('action'=>'view',$id)); ?></td>
			<td class="actions">
				<ul class="actions">
					<li><?php echo $this->Html->link(__d('backend','View'),array('action'=>'view',$id)); ?></li>
					<li><?php echo $this->Html->link(__d('backend','Backup & Clear'),array('action'=>'backup',$id)); ?></li>
					<li><?php echo $this->Html->link(__d('backend','Clear'),array('action'=>'clear',$id)); ?></li>
					<li><?php echo $this->Html->link(__d('backend','Delete'),array('action'=>'delete',$id)); ?></li>
				</ul>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
</div>