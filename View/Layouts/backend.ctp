<?php echo $this->Html->docType('html5'); ?>
<html>
	<?php echo $this->Html->charset(); ?>
	<head>
		<title><?php echo $title_for_layout; ?></title>
		
		<?php echo $this->fetch('meta'); ?>
		
		<?php echo $this->Html->css('/backend/css/bootstrap/css/bootstrap'); ?>
		<?php echo $this->Html->css('/backend/css/bootstrap/css/bootstrap-responsive'); ?>
		<?php echo $this->Html->css('/backend/css/chosen/chosen'); ?>
		<?php echo $this->Html->css('/backend/css/style'); ?>
		<?php echo $this->Html->css('/backend/css/forms'); ?>
		<?php echo $this->fetch('css'); ?>
		
		<?php echo $this->Html->script('/backend/js/jquery-1.8.0.min.js'); ?>
		<?php echo $this->fetch('script-head'); ?>
	</head>
	<body style="padding: 45px 0 40px 0;">
		<!-- HEADER -->
		<header>
			<?php echo $this->element('Backend.layout/backend/header'); ?>
			<?php echo $this->fetch('header'); ?>
		</header>
		<!-- #HEADER -->
		
					
		<div class="container-fluid">
			<?php echo $this->element('Backend.layout/backend/breadcrumbs'); ?>
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->Session->flash('auth'); ?>
			<div class="row-fluid">
				<div class="span10">
					<?php echo $this->element('Backend.layout/backend/content_before'); ?>
					<?php echo $this->fetch('content'); ?>
					<?php echo $this->element('Backend.layout/backend/content_after'); ?>
				</div>
				<aside class="span2">
					<?php echo $this->element('Backend.layout/backend/sidebar'); ?>
				</aside>
			</div>
		</div>
		
		<!-- FOOTER -->
		<footer>
			<div class="container-fluid">
			</div>
		</footer>
		<!-- #FOOTER -->
		
		<?php echo $this->element('Backend.debug/panel'); ?>
		
		<!-- MISC -->
		<div id="spinner"></div>
		<!-- #MISC -->
		<?php echo $this->Html->script('/backend/js/bootstrap/bootstrap'); ?>
		<?php echo $this->Html->script('/backend/js/chosen/chosen.jquery.js'); ?>
		<?php echo $this->Html->script('/backend/js/backend'); ?>
		<?php echo $this->fetch('script'); ?>
		<?php echo $this->Js->writeBuffer(); ?>
	</body>
</html>