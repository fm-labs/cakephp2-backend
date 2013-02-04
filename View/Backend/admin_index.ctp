<?php $this->Html->addCrumb(__('Backend'), array('controller'=>'backend', 'action'=>'index')); ?>

<style>
.dashboard-item {
	border-top: 1px solid #CCC;
	margin: 0 0 1em 0;
	min-height: 150px;
	padding: 0 1em;
}

.dashboard-item:HOVER {
	border-top: 1px solid #000;
	background-color: #f8f8f8;	
}

.dashboard-item > a {
}

.dashboard-item > ul {
}
</style>
<div class="index backend">
	<h2>Backend Dashboard</h2>
	
	<div class="actions">
		<?php echo $this->Html->link(__('Goto My Dashboard'),array('action'=>'dashboard')); ?><br />
	</div>
	
	<?php echo $this->Dashboard->itemFromArray(array(
		'title' => __d('backend','System'),
		'url' => array('plugin'=>'backend','controller'=>'system', 'action' => 'index'),
		'actions' => array(
			array(__d('backend','Plugins'),array('plugin'=>'backend','controller'=>'system', 'action' => 'plugins'),null),
			array(__d('backend','Php Info'),array('plugin'=>'backend','controller'=>'system', 'action' => 'phpinfo'),null),
			array(__d('backend','Date & Time Info'),array('plugin'=>'backend','controller'=>'system', 'action' => 'datetime'),null),
			array(__d('backend','Globals'),array('plugin'=>'backend','controller'=>'system', 'action' => 'globals'),null),
			array(__d('backend','Session'),array('plugin'=>'backend','controller'=>'system', 'action' => 'session'),null),
			array(__d('backend','Config'),array('plugin'=>'backend','controller'=>'system', 'action' => 'config'),null),
			array(__d('backend','Manifest'),array('plugin'=>'backend','controller'=>'manifest', 'action' => 'index'),null),
		)		
	)); ?>
	
	<?php echo $this->Dashboard->itemFromArray(array(
		'title' => __d('backend','Logs'),
		'url' => array('plugin'=>'backend','controller'=>'log_viewer', 'action' => 'index'),
		'actions' => array(
			array(__d('backend','Debug'),array('plugin'=>'backend','controller'=>'log_viewer', 'action' => 'view','debug'),null),
			array(__d('backend','Error'),array('plugin'=>'backend','controller'=>'log_viewer', 'action' => 'view','error'),null),
			array(__d('backend','Auth'),array('plugin'=>'backend','controller'=>'log_viewer', 'action' => 'view','auth'),null),
			array(__d('backend','Backend'),array('plugin'=>'backend','controller'=>'log_viewer', 'action' => 'view','backend'),null),
		)		
	));?>
	<?php echo $this->Dashboard->itemFromArray(array(
		'title' => __d('backend','Cronjobs'),
		'url' => array('plugin'=>'backend','controller'=>'cronjobs', 'action' => 'index'),
		'actions' => array(
		)
	)); ?>
	
	<?php echo $this->Dashboard->itemFromArray(array(
		'title' => __d('backend','Access Control'),
		'url' => array('plugin'=>'backend','controller'=>'backend_users', 'action' => 'index'),
		'actions' => array(
			array(__d('backend','Backend Users'),array('plugin'=>'backend','controller'=>'backend_users', 'action' => 'index'),null),
			array(__d('backend','Backend User Groups'),array('plugin'=>'backend','controller'=>'backend_user_groups', 'action' => 'index'),null),
			array(__d('backend','Acos'),array('plugin'=>'backend','controller'=>'acos', 'action' => 'index'),null),
			array(__d('backend','Aros'),array('plugin'=>'backend','controller'=>'aros', 'action' => 'index'),null),
			array(__d('backend','ArosAcos'),array('plugin'=>'backend','controller'=>'aros_acos', 'action' => 'index'),null),
			array(__d('backend','Acl'),array('plugin'=>'backend','controller'=>'acl', 'action' => 'index'),null),
		)
	)); ?>
	<?php echo $this->Dashboard->itemFromArray(array(
		'title' => __d('backend','Testing'),
		'url' => array('plugin'=>'backend','controller'=>'unit_tests', 'action' => 'index'),
		'actions' => array(
			array(__d('backend','Unit Tests'),array('plugin'=>'backend','controller'=>'unit_tests', 'action' => 'index'),null),
		)
	)); ?>
	<?php echo $this->Dashboard->itemFromArray(array(
		'title' => __d('backend','Appearance'),
		'url' => array('plugin'=>'backend','controller'=>'appearance', 'action' => 'index'),
		'actions' => array(
			array(__d('backend','Typo'),array('plugin'=>'backend','controller'=>'appearance', 'action' => 'typo'),null),
			array(__d('backend','Form'),array('plugin'=>'backend','controller'=>'appearance', 'action' => 'form'),null),
			array(__d('backend','Flash'),array('plugin'=>'backend','controller'=>'appearance', 'action' => 'flash'),null),
			array(__d('backend','Collapsable'),array('plugin'=>'backend','controller'=>'appearance', 'action' => 'collapsable'),null),
		)
	)); ?>
	
	<?php echo $this->Dashboard->itemFromArray(array(
		'title' => __d('backend','Jquery'),
		'url' => array('plugin'=>'backend','controller'=>'jquery', 'action' => 'index'),
		'actions' => array(
			array(__d('backend','Syntax Highligher'),array('plugin'=>'backend','controller'=>'jquery', 'action' => 'syntaxhighlighter'),null),
			array(__d('backend','Jquery TinyMce Editor'),array('plugin'=>'backend','controller'=>'jquery', 'action' => 'tinymce'),null),
			array(__d('backend','Jquery Iphoneswitch'),array('plugin'=>'backend','controller'=>'jquery', 'action' => 'iphoneswitch'),null),
			array(__d('backend','Jquery Ui'),array('plugin'=>'backend','controller'=>'jquery', 'action' => 'ui'),null),
			array(__d('backend','Jquery Colorbox'),array('plugin'=>'backend','controller'=>'jquery', 'action' => 'colorbox'),null),
		)
	)); ?>
	
</div>