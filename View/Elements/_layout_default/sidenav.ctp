<?php echo $this->Html->css('/backend/css/yaml/navigation/vlist');?>
<?php 

/**
 * Layout 'Default' - Side navigation
 * 
 * Requests 'admin-side-navigation' and renders with 'ym-vlist' pages-template
 */
$pages = $this->requestAction(array('controller'=>'pages','action'=>'request_pages_by_alias','admin-side-navigation'));
?>
<nav class="ym-vlist">
	<h6 class="ym-vtitle"><?php echo __('Navigation'); ?></h6>
	<?php echo $this->Page->templatedList($pages,'default'); ?>
</nav>