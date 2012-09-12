<div class="pagination">
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __d('admin_panel','Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __d('admin_panel','previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__d('admin_panel','next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>