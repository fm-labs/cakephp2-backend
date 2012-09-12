<div class="module be-module">
	<div class="be-user-auth">
		<?php if ($this->Session->check('Auth.User')):?>
			<?php echo __('Logged in as %s',$this->Session->read('Auth.User.mail'));?> |
			<?php echo $this->Html->link(__('Logout'),array('plugin'=>'backend','controller'=>'auth','action'=>'logout','admin'=>true)); ?>
		<?php else: ?>
			<?php echo __('Not logged in'); ?> |
			<?php echo $this->Html->link(__('Login'),array('plugin'=>'backend','controller'=>'auth','action'=>'login','admin'=>true)); ?>
			<?php echo $this->Html->link(__('Logout'),array('plugin'=>'backend','controller'=>'auth','action'=>'logout','admin'=>true)); ?>
		<?php endif; ?>
	</div>
</div>