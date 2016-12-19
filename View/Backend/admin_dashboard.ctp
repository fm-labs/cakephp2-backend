<div class="index">
	<h2>Default Admin Dashboard</h2>
	
	<div class="actions">
		<?php echo $this->Html->link(__('Backend Dashboard'),
				array('action' => 'index'),
				array('class' => 'btn btn-primary')
		); ?>
	</div>

	<table>
		<?php foreach($this->get('controllers') as $controller):?>
		<tr>
			<td><?php echo $controller; ?></td>
			<td class="actions">
				<?php echo $this->Html->link('Index', 
						array('plugin' => null, 'controller'=>Inflector::underscore($controller),'action' => 'index')
				); ?>
				<?php echo $this->Html->link('Add', 
						array('plugin' => null, 'controller'=>Inflector::underscore($controller),'action' => 'add')
				); ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	
	<div class="alert alert-block alert-info" style="margin-top: 1em;">
	<p>
		You can modify this page by editing:<br />
		APP/View/Plugin/Backend/Backend/admin_dashboard.ctp
	</p>
	</div>
</div>