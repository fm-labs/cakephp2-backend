<?php 
$this->extend('Backend.Common/tabs');
$this->assign('title', 'System');
?>
<div>
	<dl>
		<?php foreach($plugins as $plugin):?>
			<dt><?php echo $this->Html->link(Inflector::humanize($plugin),array(
				'plugin'=>Inflector::underscore($plugin),
				'controller'=>Inflector::underscore($plugin),
				'action' => 'index' 
			)); ?>&nbsp;</dt>
			<dd><?php echo CakePlugin::path($plugin);?>&nbsp;</dd>
		<?php endforeach;?>
	</dl>
</div>