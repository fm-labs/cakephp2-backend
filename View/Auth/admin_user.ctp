<div class="view backend auth">
	<h2>Auth user</h2>
	<dl>
		<?php foreach($authUser as $key => $val): ?>
		<dt><?php echo h(Inflector::humanize($key)); ?>&nbsp;</dt>
		<dd><?php echo $val; ?>&nbsp;</dt>
		<?php endforeach;?>
	</dl>
<?php debug($authUser);?>
</div>