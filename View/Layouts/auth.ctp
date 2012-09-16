<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo __d('backend',"Login"); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('/backend/css/typography');
		echo $this->Html->css('/backend/css/style');
		echo $this->Html->css('/backend/css/forms');
		echo $this->Html->css('/backend/css/screen/auth');

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
			<div class="ym-clearfix clearfix"></div>
			<?php echo $this->fetch('content'); ?>
			<div class="ym-clearfix clearfix"></div>
		</div>
		<div class="ym-clearfix clearfix"></div>
	</div>

<?php if (isset($this->Js)) echo $this->Js->writeBuffer(); ?>
</body>
</html>