$(document).ready(function() {
	//Sortable
	//$('.sortable').sortable();

	//Forms
	$('fieldset.collapsable > legend').click(function(e) {
    	var fieldset = $(this).parent('fieldset');
		fieldset.toggleClass('collapsed');
    });

	$('form div.input').each(function() {
		$(this).addClass('control-group');
	});

	$('form div.input div.error-message').each(function() {
		$(this).addClass('help-block');
	});
	
	$('form button, form input[type="submit"]').each(function() {
		$(this).addClass('btn btn-primary');
	});
	
    //Action Buttons
    $('td.actions,div.actions').each(function() {
    	
    	$(this).children('ul').each(function() {
    		
    		// check for heading
        	var heading = $(this).prev('h3');
        	if (heading.length > 0) {
        		var h = heading.html();
        		heading.hide();
        	} else {
        		var h = "Actions";
        	}
        	
        	// create clone to work on
        	var clone = $(this).clone();
        	clone.addClass('dropdown-menu');
        	clone.css({'right': '0', 'left': 'auto'});
        	
        	// create twitter-bootstrap style button
        	var btn = $('<a>',{ 'class': 'btn btn-small dropdown-toggle', 'data-toggle': 'dropdown', 'href': '#'})
        		.append(h+"&nbsp;")
        		.append('<span class="caret"></span>');
        	
        	// create twitter-bootstrap style buttongroup
        	var out = $('<div>',{ 'class': 'btn-group'})
        		.append(btn)
        		.append(clone);
        	
        	$(this).after(out);
        	$(this).remove();	
    	});

    	$(this).children('a').each(function() {
    		
        	$(this).addClass('btn btn-mini');
        	
    	});
    });
    
    // Flash messages
    $('.message').each(function() {
    	$(this).addClass('alert');
    });
    
});