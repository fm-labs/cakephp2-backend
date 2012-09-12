<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo __d('backend',"Login"); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->fetch('script');
		echo $this->fetch('css');
		
	?>
</head>
<body>
	<div id="container">
		
		<div id="content">
			<div id="flash">
				<?php echo $this->Session->flash(); ?>
				<?php echo $this->Session->flash('auth'); ?>
			</div>
			<?php echo $this->Layout->fetch('top'); ?>
			<div class="ym-clearfix clearfix"></div>
			<?php echo $this->Layout->fetch('@content'); ?>
			<div class="ym-clearfix clearfix"></div>
		</div>
		<div class="ym-clearfix clearfix"></div>
	</div>

<?php if (isset($this->Js)) echo $this->Js->writeBuffer(); ?>
</body>
</html>