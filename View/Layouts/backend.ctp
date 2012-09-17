<?php echo $this->Html->docType('html5'); ?>
<html>
	<?php echo $this->Html->charset(); ?>
	<head>
		<title>Backend - <?php echo $title_for_layout; ?></title>
		
		<?php echo $this->element('Backend.head'); ?>
		<?php echo $this->Html->css('/backend/css/screen/backend'); ?>
		
		<?php echo $this->fetch('meta'); ?>
		<?php echo $this->fetch('css'); ?>
		<?php echo $this->fetch('script'); ?>
	</head>
	<body>
		<!-- HEADER -->
		<header>
			<div class="ym-wrapper">
				<?php echo $this->Layout->fetch('header'); ?>
			</div>
		</header>
		<!-- #HEADER -->
		
		<!-- TOPNAV -->
		<div id="top">
			<div class="ym-wrapper">
				<?php echo $this->Layout->fetch('top'); ?>
			</div>
		</div>
		<div class="ym-clearfix"></div>
		<!-- #TOPNAV -->
		
		<div id="main">
			<div class="ym-wrapper">
				<div class="ym-column">
					<!-- SIDENAV -->
					<aside class="ym-col3" id="aside-left">
						<div class="ym-cbox">
							<?php echo $this->Layout->fetch('left')?>
						</div>
					</aside>
					<!-- #SIDENAV -->
					
					<!-- MAIN -->
					<div class="ym-col1" id="content">
						<div class="ym-cbox">
							<?php echo $this->Session->flash(); ?>
							<?php echo $this->Session->flash('auth'); ?>
							<?php echo $this->Layout->fetch('@content@'); ?>
						</div>
					</div>
					<!-- #MAIN -->
					
				</div>
			</div>
		</div>
		<div class="ym-clearfix"></div>
		
		<!-- FOOTER -->
		<footer>
			<div class="ym-wrapper">
				<?php echo $this->element('sql_dump');?>
			</div>
		</footer>
		<div class="ym-clearfix"></div>
		<!-- #FOOTER -->
		
		<!-- MISC -->
		<div id="be-user-login" style="position: absolute;right:0; top:0;margin:10px 10px 0 0;color:#FFF">
		<?php echo $this->Layout->module('Backend.user/login'); ?>
		</div>
		<div id="spinner"></div>
		<!-- #MISC -->
<?php $this->Js->render(); ?>
	</body>
</html>