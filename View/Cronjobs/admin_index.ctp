<?php $this->Html->addCrumb('Cronjobs',array('action'=>'index')); ?>
<?php $this->Helpers->load('Time'); ?>
<div class="index">
	<h2>Cronjobs</h2>
	
	<div class="actions">
		<?php echo $this->Html->link(__('Run all cronjobs'),array('action'=>'run_all')); ?>
	</div>
	<table>
		<tr>
			<th>Id</th>
			<th>Url</th>
			<th>Interval</th>
			<th>Last Run</th>
			<th>Offset</th>
			<th>Time Elapsed</th>
			<th>Last Response</th>
			<th>Last Message</th>
			<th class="actions">Actions</th>
		</tr>
		<?php foreach($cronjobs as $id => $cronjob): ?>
		<tr>
			<td><?php echo Inflector::humanize($id); ?></td>
			<td><?php echo $cronjob['url']; ?></td>
			<td><?php echo $cronjob['interval']; ?></td>
			<td><?php 
				if ($stats[$id]) {
					echo $this->Time->timeAgoInWords($stats[$id]['time']);
				} else {
					echo "Never";
				}
			?>&nbsp;</td>
			<td><?php 
				if ($stats[$id]) {
					$next = $stats[$id]['time'] + $cronjob['interval'];
					$nextOffset = $next - time();
					echo sprintf("%+d", $nextOffset);
				}
			?>&nbsp;</td>
			<td><?php 
				if ($stats[$id]) {
					echo $stats[$id]['time_elapsed'];
				}
			?>&nbsp;</td>
			<td><?php 
				if ($stats[$id]) {
					echo $stats[$id]['response'];
				}
			?>&nbsp;</td>
			<td><?php 
				if ($stats[$id]) {
					echo $stats[$id]['message'];
				}
			?>&nbsp;</td>
			<td class="actions">
				<?php echo $this->Html->link('View',array('action'=>'view',$id));?>
				<?php echo $this->Html->link('Run',array('action'=>'run',$id));?>
				<?php echo $this->Html->link('Force',array('action'=>'run',$id,'force'=>true));?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	
	<?php debug($cronjobs);?>
	<?php debug($stats); ?>
</div>