<?php if (Configure::read('debug') < 1) return false; ?>
<div class="be-debug" style="background-color: #CCC; margin-top: 1em;">
	<!-- SQL DUMP -->
	<div class="be-debug-sql">
		<h5>SQL Dump</h5>
		<?php echo $this->element('sql_dump');?>
	</div>
</div>