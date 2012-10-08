<div class="module be-module">
	<div class="be-user-auth">
		<?php if (AuthComponent::user()):?>
			<?php echo __d('backend','Logged in as %s',
					$this->Html->link(AuthComponent::user('mail'),
							array('plugin'=>'backend','controller'=>'auth','action'=>'user','admin'=>true))
			);?> |
			<?php echo $this->Html->link(__d('backend','Logout'),
					array('plugin'=>'backend','controller'=>'auth','action'=>'logout','admin'=>true)
			); ?>
		<?php else: ?>
			<?php echo __d('backend','Not logged in'); ?> |
			<?php echo $this->Html->link(__d('backend','Login'),
					array('plugin'=>'backend','controller'=>'auth','action'=>'login','admin'=>true)
			); ?>
		<?php endif; ?>
	</div>
</div>