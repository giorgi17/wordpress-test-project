jQuery( document ).ready( function() {
	
	jQuery( document ).on( 'click', '.my-dismiss-notice .notice-dismiss', function() {
		var data = {
				action: 'enigma_dismiss_notice',
		};
		
		jQuery.post( notice_params.ajax_url, data, function() {
		});
	})
});