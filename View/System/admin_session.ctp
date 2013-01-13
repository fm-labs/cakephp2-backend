<?php echo $this->Html->addCrumb(__('Systeminfo'),array('action'=>'index')); ?>
<div class="view">
	<h2>Sessioninformation</h2>
	
	<?php echo $this->BackendHtml->printNestedList($session); ?>
</div>