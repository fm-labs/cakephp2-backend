<?php echo $this->extend('Backend.Common/tabs'); ?>
<?php echo $this->assign('title',__d('backend','Backend User')); ?>

<div class="ym-grid linearize-level-1">
	<div class="backendUsers form ym-g75 ym-gr">
	<div class="ym-gbox-right">
	<?php echo $this->Form->create('BackendUser');?>
		<fieldset>
			<legend><?php echo __d('backend','Admin Add', __d('backend','Backend User')); ?></legend>
	<?php
		echo $this->Form->input('root');
		echo $this->Form->input('username');
		echo $this->Form->input('mail');
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		
		echo $this->Form->input('password',array('type'=>'password','default'=>''));
		echo $this->Form->input('password2',array('type'=>'password','default'=>''));
		
		echo $this->Form->input('published');
	?>
	<?php echo $this->Form->submit(__d('backend','Submit'));?>
		</fieldset>
	<?php echo $this->Form->end();?>
	</div>
	</div>
	
	<div class="actions ym-g25 ym-gl">
		<div class="ym-gbox-left">
		<h3><?php echo __d('backend','Actions'); ?></h3>
		<ul>
	
				<li><?php echo $this->Html->link(__d('backend','List %s', __d('backend','Backend Users')), array('action' => 'index'));?></li>
			</ul>
		</div>
	</div>
</div>