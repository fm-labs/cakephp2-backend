<?php 
/**
 * TwitterBootstrap compatible flash messages
 */
?>
<div class="alert alert-block <?php echo "alert-".$type;?>">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<?php if ($title != 'Default'):?>
	<h4><?php echo $title; ?></h4>
	<?php endif;?>
	<?php echo $message; ?>
</div>