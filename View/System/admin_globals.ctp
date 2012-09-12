<div>
	<h1><?php echo __d('backend',"CAKEPHP Globals");?></h1>
	
	<dl>
		<?php foreach($globals as $global):?>
			<dt><?php echo $global; ?>&nbsp;</dt>
			<dd><?php echo constant($global);?>&nbsp;</dd>
		<?php endforeach;?>
	</dl>
</div>