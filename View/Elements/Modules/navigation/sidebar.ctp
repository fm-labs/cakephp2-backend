<style>
/**
 * http://webdesign.tutsplus.com/tutorials/site-elements/orman-clarks-vertical-navigation-menu-the-css3-version/
 */

.be-vmenu-wrapper {
    width: 100%;
    margin: 10px auto;
    font-size: 0.8125em;
}

ul.be-vmenu,
ul.be-vmenu ul {
	margin: 0;
	padding: 0;
	list-style: none;
}

.be-vmenu {
    width: auto;
    height: auto;
    -webkit-box-shadow: 0px 1px 3px 0px rgba(0,0,0,.73), 0px 0px 18px 0px rgba(0,0,0,.13);
    -moz-box-shadow: 0px 1px 3px 0px rgba(0,0,0,.73), 0px 0px 18px 0px rgba(0,0,0,.13);
    box-shadow: 0px 1px 3px 0px rgba(0,0,0,.73), 0px 0px 18px 0px rgba(0,0,0,.13);
}
.be-vmenu > li > a {
    background-color: #616975;
    background-image: -webkit-gradient(linear, left top, left bottom, from(rgb(114, 122, 134)),to(rgb(80, 88, 100)));
    background-image: -webkit-linear-gradient(top, rgb(114, 122, 134), rgb(80, 88, 100));
    background-image: -moz-linear-gradient(top, rgb(114, 122, 134), rgb(80, 88, 100));
    background-image: -o-linear-gradient(top, rgb(114, 122, 134), rgb(80, 88, 100));
    background-image: -ms-linear-gradient(top, rgb(114, 122, 134), rgb(80, 88, 100));
    background-image: linear-gradient(top, rgb(114, 122, 134), rgb(80, 88, 100));
    filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,StartColorStr='#727a86', EndColorStr='#505864');
    border-bottom: 1px solid #33373d;
    -webkit-box-shadow: inset 0px 1px 0px 0px #878e98;
    -moz-box-shadow: inset 0px 1px 0px 0px #878e98;
    box-shadow: inset 0px 1px 0px 0px #878e98;
    width: 100%;
    height: 2.75em;
    line-height: 2.75em;
    text-indent: 2.75em;
    display: block;
    position: relative;
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    font-weight: 600;
    color: #fff;
    text-shadow: 0px 1px 0px rgba(0,0,0,.5);
}

.be-vmenu ul li a {
    background: #fff;
    border-bottom: 1px solid #efeff0;
    width: 100%;
    height: 2.75em;
    line-height: 2.75em;
    text-indent: 2.75em;
    display: block;
    position: relative;
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    font-size: 0.923em;
    font-weight: 400;
    color: #878d95;
}
.be-vmenu ul li:last-child a {
    border-bottom: 1px solid #33373d;
}

.be-vmenu > li > a:hover,
.be-vmenu > li > a.active {
    background-color: #35afe3;
    background-image: -webkit-gradient(linear, left top, left bottom, from(rgb(69, 199, 235)),to(rgb(38, 152, 219)));
    background-image: -webkit-linear-gradient(top, rgb(69, 199, 235), rgb(38, 152, 219));
    background-image: -moz-linear-gradient(top, rgb(69, 199, 235), rgb(38, 152, 219));
    background-image: -o-linear-gradient(top, rgb(69, 199, 235), rgb(38, 152, 219));
    background-image: -ms-linear-gradient(top, rgb(69, 199, 235), rgb(38, 152, 219));
    background-image: linear-gradient(top, rgb(69, 199, 235), rgb(38, 152, 219));
    filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,StartColorStr='#45c7eb', EndColorStr='#2698db');
    border-bottom: 1px solid #103c56;
    -webkit-box-shadow: inset 0px 1px 0px 0px #6ad2ef;
    -moz-box-shadow: inset 0px 1px 0px 0px #6ad2ef;
    box-shadow: inset 0px 1px 0px 0px #6ad2ef;
}
.be-vmenu > li > a.active {
    border-bottom: 1px solid #1a638f;
}
.be-vmenu > li > a:before {
    content: '';
    /* background-image: url(../images/sprite.png); */
    background-repeat: no-repeat;
    font-size: 36px;
    height: 1em;
    width: 1em;
    position: absolute;
    left: 0;
    top: 50%;
    margin: -.5em 0 0 0;
}
.be-vmenu .item1 > a:before {
}

.be-vmenu > li > a span {
    font-size: 0.857em;
    display: inline-block;
    position: absolute;
    right: 1em;
    top: 50%;
    background: #48515c;
    line-height: 1em;
    height: 1em;
    padding: .4em .6em;
    margin: -.8em 0 0 0;
    color: #fff;
    text-indent: 0;
    text-align: center;
    -webkit-border-radius: .769em;
    -moz-border-radius: .769em;
    border-radius: .769em;
    -webkit-box-shadow: inset 0px 1px 3px 0px rgba(0, 0, 0, .26), 0px 1px 0px 0px rgba(255, 255, 255, .15);
    -moz-box-shadow: inset 0px 1px 3px 0px rgba(0, 0, 0, .26), 0px 1px 0px 0px rgba(255, 255, 255, .15);
    box-shadow: inset 0px 1px 3px 0px rgba(0, 0, 0, .26), 0px 1px 0px 0px rgba(255, 255, 255, .15);
    text-shadow: 0px 1px 0px rgba(0,0,0,.5);
    font-weight: 500;
}
.be-vmenu > li > a:hover span, 
.be-vmenu > li > a.active span {
    background: #2173a1;
}

.be-vmenu ul > li > a span {
    font-size: 0.857em;
    display: inline-block;
    position: absolute;
    right: 1em;
    top: 50%; /
    background: #fff;
    border: 1px solid #d0d0d3;
    line-height: 1em;
    height: 1em;
    padding: .4em .7em;
    margin: -.9em 0 0 0;
    color: #878d95;
    text-indent: 0;
    text-align: center;
    -webkit-border-radius: .769em;
    -moz-border-radius: 769em;
    border-radius: 769em;
    text-shadow: 0px 0px 0px rgba(255,255,255,.01));
}

.be-vmenu > li > ul li a.active {
	font-weight: bold;
	text-decoration: underline;
}

.be-vmenu > li > ul li a:before {
    content: '▶';
    font-size: 8px;
    color: #bcbcbf;
    position: absolute;
    width: 1em;
    height: 1em;
    top: 0;
    left: -2.7em;
}

.be-vmenu > li > ul li:hover a,
.be-vmenu > li > ul li:hover a span,
.be-vmenu > li > ul li:hover a:before {
    color: #32373D;
}

</style>

<div class="be-vmenu-wrapper">
<ul class="be-vmenu">
	<?php foreach((array) $nav as $n):?>
	<?php 
	$class = "";
	if (preg_match('@^'.Router::normalize($n['url']).'@', Router::normalize($this->request->url))) {
		$class = "active";
	}
	?>
	<li class="menu-item">
		<?php $title = (isset($n['counter'])) ? h($n['title']).sprintf('<span>%s</span>',$n['counter']) : h($n['title']); ?>
		<?php echo $this->Html->link($title,$n['url'],array('escape'=>false,'class'=>$class));?> 
		<ul class="menu-level-1">
			<?php foreach($n['actions'] as $nitem):?>
			<?php 
				@list($title,$url,$attr,$counter) = $nitem;
				$title = ($counter) ? $title.sprintf('<span>%s</span>',$counter) : $title;
				
				$attr = (is_array($attr)) ? $attr : array();
				$attr['escape'] = false; 
				
				if (preg_match('@^'.Router::normalize($url).'$@', Router::normalize($this->request->url))) {
					$attr['class'] = "active";
				}
			?>
			<li class="menu-subitem"><?php echo $this->Html->link($title,$url,$attr); ?></li>
			<?php endforeach; ?>
		</ul>
	</li>
	<?php endforeach; ?>
</ul>
</div>

<script type="text/javascript">
$(function() {
    var menu_ul = $('.be-vmenu > li > ul'),
        menu_a  = $('.be-vmenu > li > a');
    menu_ul.hide();
    menu_a.click(function(e) {
        //if ($(this).hasClass('direct'))
        //    return;
        
        e.preventDefault();
        if(!$(this).hasClass('active')) {
            menu_a.removeClass('active');
            menu_ul.filter(':visible').slideUp('normal');
            $(this).addClass('active').next().stop(true,true).slideDown('normal');
        } else {
            $(this).removeClass('active');
            $(this).next().stop(true,true).slideUp('normal');
        }
    });

    $('.be-vmenu > li > a.active').each(function() {
		$(this).next().stop(true,true).show();
    });

    $('.be-vmenu > li > ul li a.active').each(function() {
		$(this).parent().parent().parent().children('a').addClass('active');
		$(this).parent().parent().show();
    });
});
</script>
