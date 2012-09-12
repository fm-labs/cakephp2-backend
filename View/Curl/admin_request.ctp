<?php $this->Html->css("/backend/css/curl",null,array('inline'=>false));?>
<div class="curl_request index">

	<?php echo $this->Html->tag('h1',__d('curl',"Curl Request"));?>
	<?php echo $this->Form->create('CurlRequest',
		array('url'=>array('controller'=>'curl', 'action'=>'request'),'id'=>'curl_request')); 
	?>
	<?php echo $this->Form->submit(__d('curl',"Submit"));?>

		<fieldset id="curl_opt_url">
			<legend><?php echo __d('curl',"Curl Url Parameters")?></legend>
		<?php
		echo $this->Form->input('url',array('type'=>'textarea', 'default'=>Router::url(array('action'=>'response'),true)));
		echo $this->Form->input('method',array(
			'options'=>array('GET'=>'GET','POST'=>'POST'),
			'class'=>'curl_method'
		));
		?>
		</fieldset>

		<fieldset id="curl_opt_proxy">
			<legend><?php echo __d('curl',"Curl Proxy Settings")?></legend>
		<?php
		echo $this->Form->input('proxy_enabled',array('type'=>'checkbox'));
		echo $this->Form->input('proxy',array('default'=>'localhost'));
		echo $this->Form->input('proxyport',array('default'=>'9999'));
		echo $this->Form->input('proxyuserpwd',array('default'=>'user:pass'));
		echo $this->Form->input('proxytype',array('options'=>array(
			CURLPROXY_HTTP => "HTTP",
			CURLPROXY_SOCKS5 => "SOCKS5",
		)));
		?>
		</fieldset>

		<fieldset id="curl_opt_settings">
			<legend><?php echo __d('curl',"Curl Request Settings")?></legend>
		<?php

		echo $this->Form->input('ssl_verifypeer',array('type'=>'checkbox','default'=>false));
		echo $this->Form->input('ssl_verifyhost',array('type'=>'checkbox','default'=>false));
		echo $this->Form->input('fresh_connect',array('type'=>'checkbox','default'=>true));
		echo $this->Form->input('returntransfer',array('type'=>'checkbox','default'=>true));
		echo $this->Form->input('followlocation',array('type'=>'checkbox','default'=>true));
		echo $this->Form->input('header',array('type'=>'checkbox','default'=>true));
		echo $this->Form->input('verbose',array('type'=>'checkbox','default'=>false));
		echo $this->Form->input('referer',array('default'=>false));
		echo $this->Form->input('useragent',array('default'=>$_SERVER['HTTP_USER_AGENT']));
	?>
		</fieldset>

		<fieldset id="curl_opt_cookies">
			<legend><?php echo __d('curl',"Curl Options")?></legend>
		<?php
		echo $this->Form->input('cookiefile',array('default'=>TMP.'curl_cookie.txt'));
		echo $this->Form->input('cookiejar',array('default'=>TMP.'curl_cookie.txt'));
		?>
		</fieldset>

		<?php if (isset($enableCurlOptions)):?>
		<fieldset id="curl_opt">
			<legend><?php echo __d('curl',"Curl Options")?></legend>
		<?php
		//curl options
		echo '<div class="curl_opt">';
		$fieldCount = (isset($this->request->data['CurlOption'])) ? count($this->request->data['CurlOption'])+1 : 1;
		for($i=0;$i<=$fieldCount;$i++):
			echo $this->Form->input('CurlOption.'.$i.'.name',array(
				'type'=>'select',
				'options'=>$curl_options,
				'class' => "curl_opt",
				'after' => $this->Form->input('CurlOption.'.$i.'.value',array(
					'class' => "curl_optval",
					'label'=>false,
					'div'=>false,
				))
			));
		endfor;

		echo '</div>';
		echo $this->Html->link(__d('curl', 'Add Curloption'),'#cmd-addopt',array(
			'id'=>"curl_request_addcurlopt",
		));
		echo "<br />";
		echo "<br />";
		?>
		</fieldset>
		<?php endif; ?>

		<?php if (isset($enablePostVars)):?>
		<fieldset id="curl_postvars">
			<legend><?php echo __d('curl',"Curl Post Vars")?></legend>
		<?php
		//curl postvars
		echo '<div class="curl_postvar">';

		$fieldCount = (isset($this->request->data['CurlVar'])) ? count($this->request->data['CurlVar'])+1 : 1;
		for($i=0;$i<=$fieldCount;$i++):
			echo $this->Form->input('CurlVar.'.$i.'.name',array(
				'class' => "curl_optval",
				'after' => $this->Form->input('CurlVar.'.$i.'.value',array(
					'class' => "curl_optval",
					'label'=>false,
					'div'=>false,
				))
			));
		endfor;

		echo '</div>';
		echo $this->Html->link(__d('curl', 'Add post variable'),'#cmd-addpostvar',array(
			'id'=>"curl_request_addpostvar",
		));

		echo "<br />";
		echo "<br />";
		?>
		</fieldset>
		<?php endif;?>
	<?php
		echo $this->Form->submit(__d('curl',"Submit"));

		echo $this->Form->end();

	?>

	<?php if(isset($response)):?>
	<div id="response">

		<ul>
			<li><?php echo $this->Html->link(__d('backend',"Parsed"),'#response-1')?></li>
			<li><?php echo $this->Html->link(__d('backend',"Body"),'#response-2')?></li>
			<li><?php echo $this->Html->link(__d('backend',"Raw"),'#response-3')?></li>
			<li><?php echo $this->Html->link(__d('backend',"HeaderRaw"),'#response-4')?></li>
			<li><?php echo $this->Html->link(__d('backend',"HeaderParsed"),'#response-5')?></li>
			<li><?php echo $this->Html->link(__d('backend',"Info"),'#response-6')?></li>
			<li><?php echo $this->Html->link(__d('backend',"Error"),'#response-7')?></li>
			<li><?php echo $this->Html->link(__d('backend',"CurlResponse"),'#response-8')?></li>
		</ul>


		<div id="response-1">
			<h3><?php echo __d('backend',"Response");?></h3>
			<textarea style="width: 100%; height: 300px;"><?php echo $response; ?></textarea>
		</div>
		<div id="response-2">
			<h3><?php echo __d('backend',"Raw Response");?></h3>
			<textarea style="width: 100%; height: 300px;"><?php echo $Curl->rawResponse(); ?></textarea>
		</div>
		<div id="response-3">
			<h3><?php echo __d('backend',"Info");?></h3>
			<dl>
				<?php foreach($Curl->info() as $key => $val):?>
					<dt><?php echo h($key);?>&nbsp;</dt>
					<dd><?php echo h($val); ?>&nbsp;</dd>
				<?php endforeach;?>
			</dl>
		</div>
		<div id="response-4">
			<h3><?php echo __d('backend',"Headers");?></h3>
			<dl>
				<?php foreach($Curl->header() as $key => $val):?>
					<dt><?php echo h($key);?>&nbsp;</dt>
					<dd><?php echo h($val); ?>&nbsp;</dd>
				<?php endforeach;?>
			</dl>
		</div>
		<div id="response-5">
			<h3><?php echo __d('backend',"Error");?></h3>
			<dl>
				<dt><?php echo __d('backend',"Error");?></dt>
				<dd><?php echo h($Curl->error()); ?>&nbsp;</dd>
				<dt><?php echo __d('backend',"ErrNo");?></dt>
				<dd><?php echo h($Curl->errno()); ?>&nbsp;</dd>
			</dl>
		</div>
	</div>
	<script>
	$(function() {
		$( "#response" ).tabs();
	});
	</script>


	<?php endif;?>
</div>
<div class="actions">&nbsp;</div>

<script type="text/javascript">
$(function() {
	$("#curl_request_addpostvar").bind('click',function() {
		var clone = $(this).prev();
		clone.clone().insertAfter(clone);
		return false;
	});
	$("#curl_request_addcurlopt").bind('click',function() {
		var clone = $(this).prev();
		clone.clone().insertAfter(clone);
		return false;
	});
});
</script>
