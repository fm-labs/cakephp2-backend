<?php echo $this->extend('Backend.Common/admin_view'); ?>
<?php echo $this->assign('title',__('Page')); ?>
	<div class="pages view">
			<h2><?php  echo __('Page');?></h2>
				<dl>
					<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($page['Page']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Page'); ?></dt>
		<dd>
			<?php echo $this->Html->link($page['ParentPage']['title'], array('controller' => 'pages', 'action' => 'view', $page['ParentPage']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lft'); ?></dt>
		<dd>
			<?php echo h($page['Page']['lft']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rght'); ?></dt>
		<dd>
			<?php echo h($page['Page']['rght']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($page['Page']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url'); ?></dt>
		<dd>
			<?php echo h($page['Page']['url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alias'); ?></dt>
		<dd>
			<?php echo h($page['Page']['alias']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Target'); ?></dt>
		<dd>
			<?php echo h($page['Page']['target']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Layout View'); ?></dt>
		<dd>
			<?php echo $this->Html->link($page['LayoutView']['title'], array('controller' => 'layout_views', 'action' => 'view', $page['LayoutView']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meta Title'); ?></dt>
		<dd>
			<?php echo h($page['Page']['meta_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meta Language'); ?></dt>
		<dd>
			<?php echo h($page['Page']['meta_language']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meta Robots Tag'); ?></dt>
		<dd>
			<?php echo h($page['Page']['meta_robots_tag']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meta Description'); ?></dt>
		<dd>
			<?php echo h($page['Page']['meta_description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Css Class'); ?></dt>
		<dd>
			<?php echo h($page['Page']['css_class']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hide From Nav'); ?></dt>
		<dd>
			<?php echo h($page['Page']['hide_from_nav']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hide From Sitemap'); ?></dt>
		<dd>
			<?php echo h($page['Page']['hide_from_sitemap']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Published'); ?></dt>
		<dd>
			<?php echo h($page['Page']['published']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Publish Start'); ?></dt>
		<dd>
			<?php echo h($page['Page']['publish_start']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Publish End'); ?></dt>
		<dd>
			<?php echo h($page['Page']['publish_end']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($page['Page']['modified']); ?>
			&nbsp;
		</dd>
				</dl>
		</div>
	
	
	<?php $this->start('actions');?>
	<div class="actions dd-actions">
		<ul>
		<li><button class="ym-button ym-actions"><?php echo __('Actions'); ?></button>
		<ul>
			<li><?php echo $this->Html->link(__('Edit %s',__('Page')), array('action' => 'edit', $page['Page']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete %s',__('Page')), array('action' => 'delete', $page['Page']['id']), null, __('Are you sure you want to delete # %s?', $page['Page']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List %s',__('Pages')), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New %s',__('Page')), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List %s',__('Layout Views')), array('controller' => 'layout_views', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New %s',__('Layout View')), array('controller' => 'layout_views', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List %s',__('Pages')), array('controller' => 'pages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New %s',__('Parent Page')), array('controller' => 'pages', 'action' => 'add')); ?> </li>
		</ul>
		</li>
		</ul>
	</div>
	<?php $this->end(); ?>

	<?php
	$blockId = uniqid();
	$this->start($blockId);
	?>
<div class="related">
	<h3><?php echo __('Related %s',__('Pages'));?></h3>
	<?php if (!empty($page['ChildPage'])):?>
	<div class="index">
		<table cellpadding = "0" cellspacing = "0">
		<tr>
			<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Lft'); ?></th>
		<th><?php echo __('Rght'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Url'); ?></th>
		<th><?php echo __('Alias'); ?></th>
		<th><?php echo __('Target'); ?></th>
		<th><?php echo __('Layout View Id'); ?></th>
		<th><?php echo __('Meta Title'); ?></th>
		<th><?php echo __('Meta Language'); ?></th>
		<th><?php echo __('Meta Robots Tag'); ?></th>
		<th><?php echo __('Meta Description'); ?></th>
		<th><?php echo __('Css Class'); ?></th>
		<th><?php echo __('Hide From Nav'); ?></th>
		<th><?php echo __('Hide From Sitemap'); ?></th>
		<th><?php echo __('Published'); ?></th>
		<th><?php echo __('Publish Start'); ?></th>
		<th><?php echo __('Publish End'); ?></th>
		<th><?php echo __('Modified'); ?></th>
			<th class="actions"><?php echo __('Actions');?></th>
		</tr>
		<?php
			$i = 0;
			foreach ($page['ChildPage'] as $childPage): ?>
		<tr>
			<td><?php echo $childPage['id'];?></td>
			<td><?php echo $childPage['parent_id'];?></td>
			<td><?php echo $childPage['lft'];?></td>
			<td><?php echo $childPage['rght'];?></td>
			<td><?php echo $childPage['title'];?></td>
			<td><?php echo $childPage['url'];?></td>
			<td><?php echo $childPage['alias'];?></td>
			<td><?php echo $childPage['target'];?></td>
			<td><?php echo $childPage['layout_view_id'];?></td>
			<td><?php echo $childPage['meta_title'];?></td>
			<td><?php echo $childPage['meta_language'];?></td>
			<td><?php echo $childPage['meta_robots_tag'];?></td>
			<td><?php echo $childPage['meta_description'];?></td>
			<td><?php echo $childPage['css_class'];?></td>
			<td><?php echo $childPage['hide_from_nav'];?></td>
			<td><?php echo $childPage['hide_from_sitemap'];?></td>
			<td><?php echo $childPage['published'];?></td>
			<td><?php echo $childPage['publish_start'];?></td>
			<td><?php echo $childPage['publish_end'];?></td>
			<td><?php echo $childPage['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'pages', 'action' => 'view', $childPage['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'pages', 'action' => 'edit', $childPage['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'pages', 'action' => 'delete', $childPage['id']), null, __('Are you sure you want to delete # %s?', $childPage['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
		</table>
	</div>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New %s',__('Child Page')), array('controller' => 'pages', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="clearfix"></div>
<?php

	$this->end();

	$this->viewVars['tabs'][] = array(
		'title' => __('Related %s',__('Pages')),
		'content' => $blockId,
		'type' => 'block'
	);
	?>
