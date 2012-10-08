<?php 
/**
 * Usage:
 * 
 * This elements takes following variables:
 * 
 * - 'paginationCounter' Array with options for PaginatorHelper::counter()
 * - 'paginationNumbers' Array with options for PaginatorHelper::numbers()
 * 
 */
//TODO move css to css file
//TODO use CSS3 gradients instead of background-images
?>
<style>
div.pagination {
    margin: 10px 0 0;
    overflow: hidden;
    padding: 0;
}
div.pagination .pagination-counter {
    float: left;
    margin: 0;
    text-align: left;
    background: repeat-x scroll 0 0 #EBEBEB;
	background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAAYCAMAAAAMEmfoAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAACdQTFRF6+vr8fHx9fX17+/v8/Pz9PT08vLy7Ozs7u7u7e3t8PDw+fn59/f3qAGAjAAAACdJREFUeNocwQkSABAMBMElIQf/f68p3Tq6mlx0bg62jMli8HsCDAAMxwB8y67ZSgAAAABJRU5ErkJggg==);
    border-color: #DEDEDE #C4C4C4 #C4C4C4 #CFCFCF;
    border-style: solid;
    border-width: 1px;
    color: #4A4A4A;
    display: block;
    float: left;
    font-weight: bold;
    padding: 6px 8px;
}
div.pagination ul.pagination-pages {
    float: right;
    margin: 0;
    padding: 0;
    text-align: right;
}
div.pagination ul.pagination-pages li {
    background: repeat-x scroll 0 0 #EBEBEB;
	background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAAYCAMAAAAMEmfoAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAACdQTFRF6+vr8fHx9fX17+/v8/Pz9PT08vLy7Ozs7u7u7e3t8PDw+fn59/f3qAGAjAAAACdJREFUeNocwQkSABAMBMElIQf/f68p3Tq6mlx0bg62jMli8HsCDAAMxwB8y67ZSgAAAABJRU5ErkJggg==);
	border-color: #DEDEDE #C4C4C4 #C4C4C4 #CFCFCF;
    border-style: solid;
    border-width: 1px;
    color: #4A4A4A;
    float: left;
    font-weight: bold;
    list-style: none outside none;
    margin: 0 0 0 4px;
    padding: 0;
}
div.pagination ul.pagination-pages li.separator {
    padding: 6px;
}
div.pagination ul.pagination-pages li.current {
    background: repeat-x scroll 0 0 #B4B4B4;
    background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAAYCAMAAAAMEmfoAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAEhQTFRFtbW10NDQuLi409PTv7+/0tLSysrKwcHBzs7O5eXltLS0yMjI2NjY3t7etra2ubm5w8PDzMzMvb291dXV19fXxsbGu7u7xcXFmE0m2AAAAC9JREFUeNoEwYUBgCAAALBZGIABIv9/6maXJa9qshhsHkHUdLfVrPhcRieOX4ABABqAARUG5jC3AAAAAElFTkSuQmCC);
	border-color: #CCCCCC #B1B1B1 #AFAFAF #BEBEBE;
    border-style: solid;
    border-width: 1px;
    color: #515151;
    padding: 6px;
}
div.pagination ul.pagination-pages li span.disabled {
    color: #B4B4B4;
    display: inline-block;
    padding: 6px;
}
div.pagination ul.pagination-pages li a {
    color: #515151;
    display: block;
    float: left;
    margin: 0;
    padding: 6px;
    text-decoration: none;
}
div.pagination ul.pagination-pages li a:hover, 
div.pagination ul.pagination-pages li a:active {
    background: repeat-x scroll 0 0 #B4B4B4;
    background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAAYCAMAAAAMEmfoAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAEhQTFRFtbW10NDQuLi409PTv7+/0tLSysrKwcHBzs7O5eXltLS0yMjI2NjY3t7etra2ubm5w8PDzMzMvb291dXV19fXxsbGu7u7xcXFmE0m2AAAAC9JREFUeNoEwYUBgCAAALBZGIABIv9/6maXJa9qshhsHkHUdLfVrPhcRieOX4ABABqAARUG5jC3AAAAAElFTkSuQmCC);
    border-color: #CCCCCC #B1B1B1 #AFAFAF #BEBEBE;
    border-style: solid;
    border-width: 1px;
    margin: -1px;
}
</style>
<?php
	//counter
	if (!isset($paginationCounter)) $paginationCounter = array();
	$paginationCounter = am(array(
		//'format' => __d('admin_panel','Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
		'format' => __d('backend','Page {:page} of {:pages}, showing {:current} records out of {:count} total')
	),$paginationCounter);
	//numbers
	if (!isset($paginationNumbers)) $paginationNumbers = array();
	$paginationNumbers = am(array(
		'separator' => '',
		'tag' => 'li',
		'first' => 'first',
		'last' => 'last',
		'modulus' => 8,
		'ellipsis' => '...'
	),$paginationNumbers);
?>
<div class="pagination">
	<p class="pagination-counter"><?php
	echo $this->Paginator->counter($paginationCounter);
	?></p>
	
	<ul class="pagination-pages">
		<li><?php echo $this->Paginator->prev('< ' . __d('backend','previous'), array(), null, array('class' => 'prev disabled')); ?></li>
		<?php echo $this->Paginator->numbers($paginationNumbers); ?>
		<li><?php echo $this->Paginator->next(__d('backend','next') . ' >', array(), null, array('class' => 'next disabled')); ?></li>
	</ul>
</div>