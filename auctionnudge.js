function setup_parameter_groups() {
  jQuery('.an-parameter-group:not(.an-parameter-group-feed) .an-parameter-group-content').hide();
  jQuery('.an-parameter-group legend').each(function() {
  	var legend_text = jQuery(this).text();
		if(legend_text.indexOf('[+]') == -1) {
	  	jQuery(this).text(legend_text + ' [+]');			
		}
  });
  jQuery('.an-parameter-group legend').click(function() { 	
	  if(! jQuery('.an-parameter-group-content', jQuery(this).parent('.an-parameter-group')).is(':visible')) {
		  //Hide all
		  jQuery('.an-parameter-group-content', jQuery(this).parents('.an-custom-field-tab')).slideUp();
		  jQuery('.an-parameter-group-content', jQuery(this).parents('.an-widget-container')).slideUp();
		  //Show this
		  jQuery('.an-parameter-group-content', jQuery(this).parent('.an-parameter-group')).slideDown();		  
	  }
  });
}

function an_show_theme_options(theme, context) {
	jQuery('#carousel_scroll-container', context).hide();
	jQuery('#carousel_width-container', context).hide();
	jQuery('#carousel_auto-container', context).hide();
	jQuery('#grid_width-container', context).hide();
	jQuery('#grid_cols-container', context).hide();
	switch(theme) {
		case 'carousel' : 
			jQuery('#carousel_scroll-container', context).show();
			jQuery('#carousel_width-container', context).show();
			jQuery('#carousel_auto-container', context).show();
			break;
		case 'grid' : 
			jQuery('#grid_width-container', context).show();
			jQuery('#grid_cols-container', context).show();
			break;
	}
}

function setup_widget_theme_dropdown() {
	jQuery('.an-widget-container select').each(function() {
		if(jQuery(this).attr('id') == 'theme') {
			var widget_parent = jQuery(this).parents('.widget');
			an_show_theme_options(jQuery(this).val(), widget_parent);
			jQuery(this).change(function() {
				an_show_theme_options(jQuery(this).val(), widget_parent);							
			});
		}
	});
}

jQuery(document).ready(function() {
	setup_parameter_groups();
	setup_widget_theme_dropdown();
	
	var custom_field_parent = jQuery('#listings-tab');
	an_show_theme_options(jQuery('#theme').val(), custom_field_parent);
	jQuery('#theme').change(function() {
		an_show_theme_options(jQuery(this).val(), custom_field_parent);
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

jQuery(document).ajaxSuccess(function(e, xhr, settings) {
	var widget_ids = ['an_listings_widget', 'an_ads_widget'];
	for(i in widget_ids) {
		if(settings.data.search('action=save-widget') != -1 && settings.data.search('id_base=' + widget_ids[i]) != -1) {
			setup_parameter_groups();
			setup_widget_theme_dropdown();	
		}		
	}
});