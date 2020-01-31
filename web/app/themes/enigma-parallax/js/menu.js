jQuery(document).ready(function() {
	
	
	jQuery('li.dropdown').find('.fa-angle-down').each(function(){
		jQuery(this).on('click', function(){
			if( jQuery(window).width() < 767) {
				jQuery(this).parent().next().slideToggle();
			}
			return false;
		});
	});
	});

//sidemenu
( function( jQuery ) {
jQuery( document ).ready(function() {			
		jQuery('li.has-sub').find('.fa-angle-down').each(function(){
		jQuery(this).on('click', function(){			
			event.preventDefault()
			jQuery(this).parent().next().slideToggle();			
			//return false;
		
		});
	});

	jQuery('#cssmenu>ul>li.has-sub>a').append('<span class="holder"></span>');
});
} )( jQuery );