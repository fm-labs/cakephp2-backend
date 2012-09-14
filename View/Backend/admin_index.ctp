<div class="index backend">
	<h1>Backend</h1>
	

	<section class="ym-grid">
		<?php 
		//dashboard settings
		$cols = 4;
		
		$width = round(100 / $cols,2);
		?>
		<?php $i = 0;?>
		<?php foreach($dashboard as $item):?>
		<div class="ym-g<?php echo $width; ?> ym-gl"><div class="ym-gbox">
			<h3><?php echo $this->Html->link($item['title'],$item['url'],@$item['attr']);?></h3>
			<?php if ($item['actions']):?>
			<ul>
			<?php foreach($item['actions'] as $action): ?>
				<?php list($title, $url, $attr) = $action; ?>
				<li><?php echo $this->Html->link($title,$url,$attr); ?></li>
			<?php endforeach; ?>
			</ul>
			<?php endif; ?>
		</div></div>
		
		<?php if ((++$i % $cols) == 0):?><div class="ym-clearfix"></div><?php endif; ?>
		
		<?php endforeach; ?>
	</section>	

	
</div>