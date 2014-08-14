jQuery(document).ready(function() {
  jQuery('#an-custom-field-container .parameter-group:not(#parameter-group-feed) .parameter-group-content').hide();
  jQuery('#an-custom-field-container .parameter-group legend').each(function() {
  	jQuery(this).text(jQuery(this).text() + ' [+]');
  });
  jQuery('#an-custom-field-container .parameter-group legend').click(function() { 	
	  if(! jQuery('.parameter-group-content', jQuery(this).parent('.parameter-group')).is(':visible')) {
		  //Hide all
		  jQuery('#an-custom-field-container .parameter-group .parameter-group-content').slideUp();
		  //Show this
		  jQuery('.parameter-group-content', jQuery(this).parent('.parameter-group')).slideDown();		  
	  }
  });
	function an_show_theme_options(theme) {
		jQuery('#carousel_scroll-container').hide();
		jQuery('#carousel_width-container').hide();
		jQuery('#carousel_auto-container').hide();
		jQuery('#grid_width-container').hide();
		jQuery('#grid_cols-container').hide();
		switch(theme) {
			case 'carousel' : 
				jQuery('#carousel_scroll-container').show();
				jQuery('#carousel_width-container').show();
				jQuery('#carousel_auto-container').show();
				break;
			case 'grid' : 
				jQuery('#grid_width-container').show();
				jQuery('#grid_cols-container').show();
				break;
		}
	}
	an_show_theme_options(jQuery('#theme').val());
	jQuery('#theme').change(function() {
		an_show_theme_options(jQuery(this).val());
	});
	
	jQuery('ul#an-tab-links li a').on('click', function(e) {
		e.preventDefault();

		jQuery('ul#an-tab-links li a').removeClass('active');
		jQuery(this).addClass('active');
		
		var tab_show = jQuery(this).data('tab');
		
		//Hide all
		jQuery('.an-custom-field-tab').hide();		
		//Show this
		jQuery('.an-custom-field-tab#' + tab_show).show();
		
		return false;
	});
});