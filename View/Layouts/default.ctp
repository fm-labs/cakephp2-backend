<?php echo $this->Html->docType('html5'); ?>
<html>
	<?php echo $this->Html->charset(); ?>
	<head>
		<title>Backend</title>
		
		<?php echo $this->fetch('meta'); ?>
		<?php echo $this->fetch('css'); ?>
		<?php echo $this->fetch('script'); ?>
		
	</head>
	<body>
		<!-- HEADER -->
		<header>
			<div class="ym-wrapper">
				<h1>HELLO</h1>
			</div>
		</header>
		<!-- #HEADER -->
		
		<div id="main">
			<div class="ym-wrapper">
					<!-- MAIN -->
					<div id="content">
						<div class="ym-cbox">
							<?php echo $this->fetch('content'); ?>
						</div>
					</div>
					<!-- #MAIN -->
			</div>
		</div>
		
		<!-- FOOTER -->
		<footer>
			<div class="ym-wrapper">
				<?php echo $this->element('sql_dump');?>
			</div>
		</footer>
		<!-- #FOOTER -->
	</body>
</html>