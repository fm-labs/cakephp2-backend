<div id="users_login" style="margin-top:100px">

	<div id="login_form">
		<?php echo $this->Form->create('BackendUser'); ?>
		<fieldset>
			<legend><?php echo __d('admin_panel',"Login");?></legend>
			<?php
			echo $this->Form->input('username');
			echo $this->Form->input('password');
			echo $this->Form->submit(__d('admin_panel',"Login"));
			?>
		</fieldset>
		<?php echo $this->Form->end(); ?>
		
		<div class="auth_info" style="font-size: 80%; color: #CCC; margin-top: 30px;">
			<?php echo date('d.M.Y H:i:s'); ?> |
			<?php echo $this->request->clientIp(); ?><br />
			<?php echo env('HTTP_USER_AGENT') ?> 
		</div>
	</div>

</div>