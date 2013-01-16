<?php $this->Helpers->load('Time','Number'); ?>
<?php $this->Html->addCrumb(__d('backend','LogViewer'),array('action'=>'index')); ?>
<div class="index">
	<h2><?php echo __d('backend','LogViewer'); ?></h2>
	
	<div class="hero-unit" style="padding:20px;">
		<h3>Configured LogRotation</h3>
		
		<?php 
		$logRotations = Configure::read('Backend.LogRotation'); 
		if (!$logRotations):
		?>
		<p>No LogRotations configured<br />
		Create APP/Config/backend.php<br /><br />
		Insert following to the config file:
		</p>
		<pre>
		$config = array(
			'Backend' => array(
				'LogRotation' => array(
					'config' => 'default',
					'file' => 'cron.log', // Log file name or full path to file
					'keep' => 3, // Number of old logs to keep
					'schedule' => 'daily', // daily, weekly, monthly
					'compress' => false, // Compress
					'compress_delay' => false, // Compress on next cycle
					'rotate_empty' => false, // Rotate even if log file is empty
					'email_to' => null, // Email log before deleting. Value must be compatible to CakeEmail::to()
				)
			)
		)
		</pre>
		<?php else: ?>
			<?php foreach ($logRotations as $alias => $lr):?>
			<strong><?php echo basename($lr['file']); ?></strong> | <?php echo $lr['schedule']?> | Keep <?php echo $lr['keep']; ?>
			<?php echo $this->Html->link('Force',array('action'=>'rotate',$alias,'force'=>true))?>
			<br />
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
	
	<table>
		<tr>
			<th><?php echo __d('backend','Logfile');?></th>
			<th><?php echo __d('backend','Filesize');?></th>
			<th><?php echo __d('backend','Last modified');?></th>
			<th><?php echo __d('backend','Last access');?></th>
			<th class="actions"><?php echo __d('backend','Actions'); ?></th>
		</tr>
	<?php foreach($files as $file):?>
		<?php $id = basename($file['name'],'.log'); ?>
		<tr>
			<td><?php echo $this->Html->link($file['dir'].$file['name'],array('action'=>'view',$id)); ?></td>
			<td><?php echo $this->Number->toReadableSize($file['size']); ?></td>
			<td><?php echo $this->Time->niceShort($file['last_modified']); ?></td>
			<td><?php echo $this->Time->niceShort($file['last_access']); ?></td>
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