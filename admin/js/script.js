var CustomSpinner = '<span id="CUSPIN" style="visibility: visible; margin: 0px 0px 0px 10px; background-size: 100% auto; float: none; width: 16px; height: 16px; vertical-align: middle;" class="spinner"></span>';
jQuery(document).ready(function(){
	jQuery('a.deleteRecord').click(function(){
		var ID = jQuery(this).attr('data-id');
		var AJAX_action = 'Contact_FormISISMSHISTORYDELETE';
		jQuery(this).parent().append(CustomSpinner);
		jQuery.ajax({
		  url: ajaxurl,
		  method: "GET",
		  data: {action : AJAX_action,deleteID : ID }
		}).done(function( msg ) {
		  if(msg == 1){
			jQuery('tr#'+ID).css('background','#FABEBE');
			jQuery('tr#'+ID).fadeOut('slow',function(){
				jQuery(this).remove();
			});
		  } 
		});		
		
	});
	
	jQuery('#emptyHistory').click(function(){
		var confirm_user = confirm(DELETEPOPTXT);
		if(confirm_user == true){
			var AJAX_action = 'Contact_FormISISMSHISTORYEMPTY';
			jQuery(this).attr('disabled',true);
			jQuery(this).append(CustomSpinner);
			jQuery.ajax({
				url: ajaxurl,
				method: "GET",
				data: {action : AJAX_action}
			}).done(function( msg ) {
				location.href=location.href;
			});	
		}
	})
});