<?php echo $this->Html->docType('html5'); ?>
<html>
	<?php echo $this->Html->charset(); ?>
	<head>
		<title>Backend</title>
		
		 <!-- mobile viewport optimisation -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- stylesheets -->
		<?php echo $this->Html->css('/backend/css/yaml/core/base'); ?>
		<?php echo $this->Html->css('/backend/css/yaml/forms/gray-theme'); ?>
		<?php echo $this->Html->css('/backend/css/screen_backend/screen'); ?>
		<?php echo $this->Html->css('/backend/css/screen_backend/typography'); ?>
		
		<!--[if lte IE 7]>
		<?php echo $this->Html->css('/backend/css/yaml/core/iehacks.min'); ?>
		<![endif]-->
		
		<?php echo $this->Html->css('/backend/css/inav/inav'); ?>
		<?php #echo $this->Html->css('/backend/css/css_tree/tree'); ?>
		
		<?php echo $this->Html->css('/backend/css/cake'); ?>
		<?php echo $this->Html->css('/backend/css/style'); ?>
		<?php echo $this->Html->css('/backend/css/forms'); ?>
		<?php echo $this->Html->css('/backend/css/module'); ?>
		<!--[if gte IE 9]>
		  <style type="text/css">
		    .gradient {
		       filter: none;
		    }
		  </style>
		<![endif]-->
		<?php echo $this->Html->script('/backend/js/jquery-1.7.2.min'); ?>
		<?php echo $this->Html->script('/backend/js/jquery.sortable.min'); ?>
		
		<?php echo $this->fetch('meta'); ?>
		<?php echo $this->fetch('css'); ?>
		<?php echo $this->fetch('script'); ?>
		<script>
			$(document).ready(function() {
				//Sortable
		    	//$('.sortable').sortable();

		    	//Forms
		    	$('fieldset.collapsable > legend').click(function(e) {
			    	var fieldset = $(this).parent('fieldset');
					fieldset.toggleClass('collapsed');
			    });
			});
		</script>
	</head>
	<body>
		<!-- HEADER -->
		<header>
			<div class="ym-wrapper">
				<h1>SITENAME</h1>
				<?php echo $this->Layout->fetch('user'); ?>
			</div>
		</header>
		<!-- #HEADER -->
		
		<!-- TOPNAV -->
		<nav id="topnav">
			<div class="ym-wrapper">
				<?php echo $this->Layout->fetch('nav'); ?>
			</div>
		</nav>
		<div class="ym-clearfix"></div>
		<!-- #TOPNAV -->
		
		<div id="main">
			<div class="ym-wrapper">
				<div class="ym-column">
					<!-- SIDENAV -->
					<aside class="ym-col1" id="aside">
						<div class="ym-box">
							<?php echo $this->Layout->fetch('aside')?>
						</div>
						<div class="ym-clearfix"></div>
					</aside>
					<!-- #SIDENAV -->
					
					<!-- MAIN -->
					<div class="ym-col3" id="content">
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
		
		<!-- FOOTER -->
		<footer>
			<div class="ym-wrapper">
				<?php echo $this->element('sql_dump');?>
			</div>
		</footer>
		<!-- #FOOTER -->
		
		<!-- MISC -->
		<div id="spinner" class="spinner"><?php echo $this->Html->image('/backend/img/icons/spinner/pacman.gif'); ?></div>
		<!-- #MISC -->
<?php $this->Js->render(); ?>
	</body>
</html>