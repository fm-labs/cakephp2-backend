<?php 
$this->extend('Backend.Common/tabs');
$this->assign('title', 'PHP Info');
?>

<div class="system phpinfo">
	<?php echo $phpinfo; ?>
</div>
