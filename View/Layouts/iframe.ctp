<?php echo $this->Html->docType('html5'); ?>
<html>
	<?php echo $this->Html->charset(); ?>
	<head>
		<title>Backend - <?php echo $title_for_layout; ?></title>
		
		<?php echo $this->element('Backend.head'); ?>
		<?php echo $this->Html->css('/backend/css/screen/iframe'); ?>
		
		<?php echo $this->fetch('meta'); ?>
		<?php echo $this->fetch('css'); ?>
		<?php echo $this->fetch('script'); ?>
	</head>
	<body>
		<header>
			<?php echo $this->fetch('header'); ?>
		</header>
		<div id="main">
			<div class="ym-wrapper">
				<?php echo $this->fetch('content'); ?>
			</div>
			<div class="ym-clearfix"></div>		
		</div>
		<footer>
			<a href="#" onclick="window.location.reload()">Reload frame</a>
		</footer>
	</body>
</html>