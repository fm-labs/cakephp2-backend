<?php
//do not wrap in tabs on ajax request
if ($this->request->is('ajax') && !isset($useTabsOnAjaxRequest)):
	echo $this->fetch('content'); 
	return true;
endif; 
?>

<?php #$this->Helpers->load('JqueryUi.JqueryUi');?>
<?php $divId = uniqid('tabs-'); ?>

<div class="tabs">
	<!-- 
	<h2><?php echo $this->fetch('title');?></h2>
	-->
	<div id="<?php echo $divId; ?>">
		<ul>
			<li><?php 
			echo $this->Html->link($this->fetch('title'),sprintf('#%s-1',$divId));?></li>
			<?php 
			if (isset($this->viewVars['tabs'])):
				$i = 1; 
				foreach($this->viewVars['tabs'] as $tab):
					$i++;
					if ($tab['type'] == 'ajax') {
						$tabLink = $this->Html->link($tab['title'], $tab['content']); 
					} else {
						$tabLink = $this->Html->link($tab['title'], sprintf('#%s-%s',$divId,$i)); 
					}
					echo $this->Html->tag('li',$tabLink);
				endforeach;
			endif; 
			?>
		</ul>
		
		<div id="<?php echo sprintf('%s-1',$divId); ?>" class="tabs_content">
			<div>
			<?php echo $this->fetch('content');?>
			<div class="ym-clearfix clearfix"></div>
			</div>
		</div>
		<?php 
		if (isset($this->viewVars['tabs'])):
			$i = 1; 
			foreach($this->viewVars['tabs'] as $tab):
				$i++;
				if ($tab['type'] == 'ajax') 
					continue;
				elseif($tab['type'] == 'block')
					$tab['content'] = $this->fetch($tab['content']);
				
					$_content = $tab['content'] . $this->Html->div('ym-clearfix clearfix','');
					echo $this->Html->tag('div',$_content,
						array('id'=>sprintf('%s-%s',$divId,$i)));
			endforeach;
		endif; 
		?>
		<div class="ym-clearfix clearfix"></div>
	</div>
	
	
	
	<?php
	#$this->Js->get('#'.$divId);
	#$script = $this->JqueryUi->tabs();
	#echo $this->Html->scriptBlock($script);
	?>
	
</div>
<div class="ym-clearfix clearfix"></div>