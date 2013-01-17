<?php 
/**
 * TwitterBootstrap compatible flash messages
 */
?>
<div class="alert alert-block <?php echo "alert-".h($type);?>">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<?php if ($title != 'Default'):?>
	<h4><?php echo h($title); ?></h4>
	<?php endif;?>
	<?php echo h($message); ?>
</div>