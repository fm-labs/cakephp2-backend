<style>
.dashboard-item {
	background-image: url(data:image/png;base64,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);
	background-repeat: no-repeat;
	background-position: top left;
	background-color: #F8F8F8;
	border: 1px solid #CCC;
	padding: 1em;
	margin: 0 0 1em 0;
	min-height: 150px;
}

.dashboard-item > a {
	margin: 0 0 0 60px;
	font-weight: bold;
	font-size: 140%;
}

.dashboard-item ul {
	list-style-type:square;
	margin: 1.3em 0 0 0.825em;
}
</style>
<div class="index backend">
	<h1>Backend</h1>

	<section class="ym-grid" style="margin-top: 1em;">
		<?php 
		//dashboard settings
		$cols = 4;
		
		$width = round(100 / $cols,2);
		?>
		<?php $i = 0;?>
		<?php foreach($dashboard as $item):?>
		<div class="ym-g<?php echo $width; ?> ym-gl">
			<div class="ym-gbox">
			<div class="dashboard-item <?php echo Inflector::slug($item['title']); ?>">
				<?php echo $this->Html->link($item['title'],$item['url'],@$item['attr']);?>
				<?php if ($item['actions']):?>
				<ul>
				<?php foreach($item['actions'] as $action): ?>
					<?php list($title, $url, $attr) = $action; ?>
					<li><?php echo $this->Html->link($title,$url,$attr); ?></li>
				<?php endforeach; ?>
				</ul>
			<?php endif; ?>
			</div>
			</div>
		</div>
		
		<?php if ((++$i % $cols) == 0):?><div class="ym-clearfix"></div><?php endif; ?>
		
		<?php endforeach; ?>
	</section>	

	
</div>