<?php 
$this->extend('Backend.Common/tabs');
$this->assign('title', 'Loaded CakePHP Plugins');
?>

<div>
	<h1><?php echo __d('backend',"Loaded CakePHP Plugins");?></h1>
	
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