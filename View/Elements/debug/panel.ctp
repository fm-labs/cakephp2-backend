<?php if (Configure::read('debug') < 1) return false; ?>
<style>
	.debug-panel-container {
		position: fixed;
		bottom: 0;
		left: 0;
		width: 100%;
		opacity: 0.1;
	}
	
	.debug-panel-container:HOVER {
		opacity: 1;
	}

	.debug-panel {
		background-color: #FFF;
		padding: 5px;
	}
	
	.debug-panel-window {
		background-color: #FFF;
		padding: 1em;
		display: none;
	}
</style>
<?php $debugId = uniqid('debug'); ?>
<div id="<?php echo $debugId; ?>" class="debug-panel-container">
	<div class="debug-panel">
		<button class="debug-panel-sqldump">Sql Dump</button>
	</div>
	
	<div class="debug-panel-window debug-panel-sqldump">
	<?php echo $this->element('sql_dump'); ?>
	</div>
</div>
<script>
$(document).ready(function(){
	var container = $('#<?php echo $debugId?>');
	//sql dump
	container.find('button.debug-panel-sqldump').click(function(e) {
		e.preventDefault();
		container.find('div.debug-panel-sqldump').toggle();
		return false;
	});
	
});
</script>
<?php unset($debugId); ?>