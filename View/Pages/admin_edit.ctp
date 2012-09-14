<?php echo $this->extend('Backend.Common/admin_form'); ?>
<?php echo $this->assign('title',__('Page')); ?>

	<div class="pages form">
	<?php echo $this->Form->create('Page',array());?>
		<fieldset>
			<legend><?php echo __('Admin Edit %s', __('Page')); ?></legend>
		<?php
		echo $this->Form->input('id');
		echo $this->Form->input('parent_id',array('options'=>$parentPages,'empty'=>'- Root -'));
		echo $this->Form->input('title');
		echo $this->Form->input('url');
		echo $this->Form->input('alias');
		echo $this->Form->input('target');
		echo $this->Form->input('layout_view_id',array('empty'=>'-- Inherit --'));
		echo $this->Form->input('meta_title');
		echo $this->Form->input('meta_language');
		echo $this->Form->input('meta_robots_tag');
		echo $this->Form->input('meta_description');
		echo $this->Form->input('css_class');
		echo $this->Form->input('hide_from_nav');
		echo $this->Form->input('hide_from_sitemap');
		echo $this->Form->input('published');
		echo $this->Form->input('publish_start');
		echo $this->Form->input('publish_end');
	?>
	<?php echo $this->Form->submit(__('Submit'));?>
		</fieldset>
	<?php echo $this->Form->end();?>
	</div>
	
	<?php $this->start('actions');?>
	<div class="actions dd-actions">
		<ul>
		<li><button class="ym-button ym-actions"><?php echo __('Actions'); ?></button>
			<ul>
	
				<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Page.id')), null , __('Are you sure you want to delete # %s?', $this->Form->value('Page.id'))); ?></li>
				<li><?php echo $this->Html->link(__('List %s', __('Pages')), array('action' => 'index'));?></li>
			<li><?php echo $this->Html->link(__('New %s', __('Page')), array('action' => 'add'));?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Pages')), array('controller' => 'pages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New %s', __('Parent Page')), array('controller' => 'pages', 'action' => 'add')); ?> </li>
			</ul>
		</li>
		</ul>
	</div>
	<?php $this->end(); ?>
