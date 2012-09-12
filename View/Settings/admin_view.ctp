<?php echo $this->extend('Backend.Common/tabs'); ?>
<?php echo $this->assign('title',__d('backend','Setting')); ?>
<div class="settings view">
<h2><?php  echo __d('backend','Setting');?></h2>
	<dl>
		<dt><?php echo __d('backend','Id'); ?></dt>
		<dd>
			<?php echo h($setting['Setting']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('backend','Namespace'); ?></dt>
		<dd>
			<?php echo h($setting['Setting']['namespace']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('backend','Path'); ?></dt>
		<dd>
			<?php echo h($setting['Setting']['path']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('backend','Type'); ?></dt>
		<dd>
			<?php echo h($setting['Setting']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('backend','Value'); ?></dt>
		<dd>
			<?php echo h($setting['Setting']['value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('backend','Description'); ?></dt>
		<dd>
			<?php echo h($setting['Setting']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('backend','Published'); ?></dt>
		<dd>
			<?php echo h($setting['Setting']['published']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('backend','Modified'); ?></dt>
		<dd>
			<?php echo h($setting['Setting']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __d('backend','Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__d('backend','Edit Setting'), array('action' => 'edit', $setting['Setting']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__d('backend','Delete Setting'), array('action' => 'delete', $setting['Setting']['id']), null, __d('backend','Are you sure you want to delete # %s?', $setting['Setting']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('backend','List Settings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('backend','New Setting'), array('action' => 'add')); ?> </li>
	</ul>
</div>
