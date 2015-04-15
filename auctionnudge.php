<?php
/*
Plugin Name: Auction Nudge
Plugin URI: https://www.auctionnudge.com/wordpress-plugin
Description: This plugin enables you to embed your live eBay information on your WordPress site using Auction Nudge. <strong>An options box will be added to the edit page/post screen below the content editor</strong>. If you like the plugin, please show your appreciation by <a target="_blank" href="https://wordpress.org/support/view/plugin-reviews/auction-nudge?rate=5#postform">leaving a rating</a>. Go to the <a href="options-general.php?page=an_options_page">Settings page</a>.
Version: 4.1.1
Author: Joseph Hawes
Author URI: http://www.josephhawes.co.uk/
License: GPL2
*/

/*  
Copyright 2014 Joseph Hawes (email: joe@josephhawes.co.uk)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

//Settings
$an_plugin_settings = array(
	'plugin_name' => 'Auction Nudge',
	'plugin_version' => '4.1.1',
	'custom_field_prefix' => 'an',
	'shortcode' => 'auction-nudge',
	'request_item_endpoint' => '//www.auctionnudge.com/item_build/js/',
	'request_profile_endpoint' => '//www.auctionnudge.com/profile_build/js/',
	'request_feedback_endpoint' => '//www.auctionnudge.com/feedback_build/js/',
	'request_ad_endpoint' => '//www.auctionnudge.com/ad_build/iframe/',
	'username_bad' => array('.', "\$", '!'),
	'username_good' => array('__dot__', '__dollar__', '__bang__'),				
	'item_parameter_groups' => array(
		'feed'  => array(
			'name' => 'Feed options',
			'description' => 'Enter your eBay username'
		),
		'display'  => array(
			'name' => 'Display options',
			'description' => 'Customise your feed'
		),
		'advanced'  => array(
			'name' => 'Advanced options',
			'description' => ''
		)				
	),
	//Item tool parameters
	'item_parameters' => array(
		//Step one
		'item_SellerID'  => array(
			'name' => 'item_SellerID',
			'id' => 'item_SellerID',
			'tip' => 'This is your eBay ID (username) that is associated to your eBay account. This is the username you are known by on eBay and appears on your listings.',
			'group' => 'feed',
			'title' => 'eBay user ID'
		),
		'item_siteid'  => array(
			'name' => 'item_siteid',
			'id' => 'item_siteid',
			'tip' => 'This is usually where your items are listed. Which site you choose will determine which site you link to and what currency is displayed.',
			'type' => 'select',
			'options' => array(
				'0' => 'eBay US',
				'3' => 'eBay UK',
				'2' => 'eBay Canada',
				'15' => 'eBay Australia',
				'23' => 'eBay Belgium',
				'77' => 'eBay Germany',
				'71' => 'eBay France',
				'186' => 'eBay Spain',
				'16' => 'eBay Austria',
				'101' => 'eBay Italy',
				'146' => 'eBay Netherlands',
				'205' => 'eBay Ireland',
				'193' => 'eBay Switzerland'				
			),
			'default' => '3',
			'group' => 'feed',
			'title' => 'eBay site'
		),
		//Step two
		'item_theme'  => array(
			'name' => 'item_theme',
			'id' => 'item_theme',
			'tip' => 'Your items will display differently on your site depending on which theme you choose. You can also control how your listings appear using custom CSS rules, go to the \'Help / FAQ\' page for more details.',
			'type' => 'select',
			'options' => array(
				'responsive' => 'Responsive',
				'columns' => 'Column View',
				'carousel' => 'Carousel',
				'simple_list' => 'Simple List',
				'details' => 'Image and Details',
				'images_only' => 'Images Only',
				'grid' => 'Grid View',
				'unstyled' => 'Unstyled (advanced)'
			),
			'default' => 'columns',
			'group' => 'display',
			'title' => 'Theme'
		),
		'item_MaxEntries'  => array(
			'name' => 'item_MaxEntries',
			'id' => 'item_MaxEntries',
			'tip' => 'This is the number of items you want display per page, the maximum value is 100. You can display multiple pages of items using the \'Show multiple pages?\' option below.',
			'group' => 'display',
			'title' => 'Number of items to show',
			'default' => '6'
		),
		'item_page'  => array(
			'name' => 'item_page',
			'id' => 'item_page',
			'tip' => 'If you enable this option and have more items listed than the value for the \'Number of items to show\' option above then users can paginate between multiple pages of items.',
			'type' => 'radio',
			'group' => 'display',
			'title' => 'Show multiple pages?',
			'default' => 'init',
			'options' => array(
				'init' => 'Yes',
				'' => 'No'
			)
		),		
		'item_carousel_scroll'  => array(
			'name' => 'item_carousel_scroll',
			'id' => 'item_carousel_scroll',
			'tip' => 'This option specifies how may items will be visible in the carousel at one time. Use in conjunction with \'Item width\' to set the overall carousel width, i.e. 140px * 4 = 560px.',
			'group' => 'display',
			'title' => 'Number of items to scroll',
			'default' => '4'
		),					
		'item_carousel_width'  => array(
			'name' => 'item_carousel_width',
			'id' => 'item_carousel_width',
			'tip' => 'This options specifies how wide each item in the carousel will be. Use in conjunction with \'Number of items to scroll\' to set the overall carousel width, i.e. 140px * 4 = 560px.',
			'group' => 'display',
			'title' => 'Item width',
			'default' => '140px'
		),
		'item_carousel_auto'  => array(
			'name' => 'item_carousel_auto',
			'id' => 'item_carousel_auto',
			'tip' => 'This option specifies how often, in seconds the carousel should auto scroll. If set to 0 auto scroll is disabled.',
			'group' => 'display',
			'title' => 'Auto scroll',
			'default' => '0'
		),
		'item_grid_cols'  => array(
			'name' => 'item_grid_cols',
			'id' => 'item_grid_cols',
			'tip' => 'Use this option to specify how many columns to display in grid view.',
			'group' => 'display',
			'title' => 'Grid columns',
			'default' => '2'
		),				
		'item_grid_width'  => array(
			'name' => 'item_grid_width',
			'id' => 'item_grid_width',
			'tip' => 'Use this option to specify how wide the grid should be. This can be specified in either pixels (px) or as a percentage (%)',
			'group' => 'display',
			'title' => 'Grid width',
			'default' => '100%'
		),
		'item_show_logo'  => array(
			'name' => 'item_show_logo',
			'id' => 'item_show_logo',
			'tip' => 'This option specifies if you want to display the eBay logo with your listings.',
			'type' => 'radio',
			'group' => 'display',
			'title' => 'Show eBay Logo?',
			'default' => '1',
			'options' => array(
				'1' => 'Yes',
				'0' => 'No'
			)
		),
		'item_blank'  => array(
			'name' => 'item_blank',
			'id' => 'item_blank',
			'tip' => 'Enabling this option will open item links in a new browser tab.',
			'type' => 'radio',
			'group' => 'display',
			'title' => 'Open links in new tab?',
			'default' => '0',
			'options' => array(
				'1' => 'Yes',
				'0' => 'No'
			)
		),
		'item_img_size'  => array(
			'name' => 'item_img_size',
			'id' => 'item_img_size',
			'tip' => 'Specify in pixels the maximum image size. Depending on the image ratio, the image width or height will not exceed this size. This value should be numeric only, \'px\' not needed (if blank defaults to 64)',
			'group' => 'display',
			'title' => 'Image Size',
			'default' => '80'
		),		
		//Advanced
		'item_sortOrder'  => array(
			'name' => 'item_sortOrder',
			'id' => 'item_sortOrder',
			'tip' => 'This option adjusts the order of the items shown.',
			'type' => 'select',
			'options' => array(
				'' => 'Items Ending First',
				'StartTimeNewest' => 'Newly-Listed First',
				'PricePlusShippingLowest' => 'Price + Shipping: Lowest First',
				'PricePlusShippingHighest' => 'Price + Shipping: Highest First',
				'BestMatch' => 'Best Match'
			),
			'group' => 'advanced',
			'title' => 'Sort order'
		),
		'item_keyword'  => array(
			'name' => 'item_keyword',
			'id' => 'item_keyword',
			'tip' => 'By specifying a keyword, only items which contain that keyword in their title will be displayed. Keywords can contain multiple words and up to 5 keywords may be specified. Keywords are separated with a colon (:) and this acts as an OR operator. For example the keywords &ldquo;red:dark blue:black&rdquo; will display all items with either &ldquo;red&rdquo; or &ldquo;dark blue&rdquo; or &ldquo;black&rdquo; in their title.',
			'group' => 'advanced',
			'title' => 'Filter by keyword'
		),		
		'item_categoryId'  => array(
			'name' => 'item_categoryId',
			'id' => 'item_categoryId',
			'tip' => 'By specifying an eBay category ID only items which are listed in this category will be displayed. You can specify up to 3 different category IDs by separating with a colon (:) for example 123:456:789 See the Help/FAQ page for help on obtaining category IDs.',
			'group' => 'advanced',
			'title' => 'Filter by category ID'
		)
	),
	//Ad tool parameters
	'ad_parameters' => array(
		//Step one
		'ad_SellerID'  => array(
			'name' => 'ad_SellerID',
			'id' => 'ad_SellerID',
			'tip' => 'This is your eBay ID (username) that is associated to your eBay account. This is the username you are known by on eBay and appears on your listings.',
			'group' => 'feed',
			'title' => 'eBay user ID'
		),
		'ad_siteid'  => array(
			'name' => 'ad_siteid',
			'id' => 'ad_siteid',
			'tip' => 'This is usually where your items are listed. Which site you choose will determine which site you link to and what currency is displayed.',
			'type' => 'select',
			'options' => array(
				'0' => 'eBay US',
				'3' => 'eBay UK',
				'2' => 'eBay Canada',
				'15' => 'eBay Australia',
				'23' => 'eBay Belgium',
				'77' => 'eBay Germany',
				'71' => 'eBay France',
				'186' => 'eBay Spain',
				'16' => 'eBay Austria',
				'101' => 'eBay Italy',
				'146' => 'eBay Netherlands',
				'205' => 'eBay Ireland',
				'193' => 'eBay Switzerland'
			),
			'default' => '3',
			'group' => 'feed',
			'title' => 'eBay site'
		),
		//Step two
		'ad_format'  => array(
			'name' => 'ad_format',
			'id' => 'ad_format',
			'tip' => 'Choose from the following list of standard ad sizes.',
			'type' => 'select',
			'options' => array(
				'300x250' => 'Medium rectangle (300px x 250px)',
				'336x280' => 'Large rectangle (336px x 280px)',
				'250x250' => 'Square (250px x 250px)',
				'120x600' => 'Skyscraper (120px x 600px)',
				'728x90' => 'Leaderboard (728px x 90px)',
				'160x600' => 'Wide skyscraper (160px x 600px)'
			),
			'default' => '300x250',
			'group' => 'display',
			'title' => 'Ad size'
		),
		'ad_theme'  => array(
			'name' => 'ad_theme',
			'id' => 'ad_theme',
			'tip' => 'Specifying a colour will change how the ad appears in order to better integrate with your site.',
			'type' => 'select',
			'options' => array(
				'green'  => 'Green',
				'red'  => 'Red',
				'blue'  => 'Blue',
				'orange'  => 'Orange',
				'grey' => 'Grey',
				'pink' => 'Pink'
			),
			'default' => 'green',
			'group' => 'display',
			'title' => 'Ad colour'		
		),
		'ad_carousel_auto'  => array(
			'name' => 'ad_carousel_auto',
			'id' => 'ad_carousel_auto',
			'tip' => 'This option specifies how often, in seconds the ad should auto scroll. If set to 0 auto scroll is disabled.',
			'group' => 'display',
			'title' => 'Auto scroll?',
			'default' => '5'
		),
		'ad_blank_noitems'  => array(
			'name' => 'ad_blank_noitems',
			'id' => 'ad_blank_noitems',
			'tip' => 'This option enables you to show nothing in the ad space if you do not have any active listings.',
			'type' => 'radio',
			'group' => 'display',
			'title' => 'Blank ad if no listings?',
			'default' => '0',
			'options' => array(
				'1' => 'Yes',
				'0' => 'No'
			)				
		),
		'ad_hide_username'  => array(
			'name' => 'ad_hide_username',
			'id' => 'ad_hide_username',
			'tip' => 'This option hides your eBay username and instead displays \'Our items on eBay\' next to your feedback score.',
			'type' => 'radio',
			'group' => 'display',
			'title' => 'Hide eBay User ID?',
			'default' => '0',
			'options' => array(
				'1' => 'Yes',
				'0' => 'No'
			)			
		),				
		//Advanced
		'ad_sortOrder'  => array(
			'name' => 'ad_sortOrder',
			'id' => 'ad_sortOrder',
			'tip' => 'This option adjusts the order of the items shown.',
			'type' => 'select',
			'options' => array(
				'' => 'Items Ending First',
				'StartTimeNewest' => 'Newly-Listed First',
				'PricePlusShippingLowest' => 'Price + Shipping: Lowest First',
				'PricePlusShippingHighest' => 'Price + Shipping: Highest First',
				'BestMatch' => 'Best Match'
			),
			'group' => 'advanced',
			'title' => 'Sort order'
		),
		'ad_keyword'  => array(
			'name' => 'ad_keyword',
			'id' => 'ad_keyword',
			'tip' => 'By specifying a keyword, only items which contain that keyword in their title will be displayed. Keywords can contain multiple words and up to 5 keywords may be specified. Keywords are separated with a colon (:) and this acts as an OR operator. For example the keywords &ldquo;red:dark blue:black&rdquo; will display all items with either &ldquo;red&rdquo; or &ldquo;dark blue&rdquo; or &ldquo;black&rdquo; in their title.',
			'group' => 'advanced',
			'title' => 'Filter by keyword'
		),		
		'ad_categoryId'  => array(
			'name' => 'ad_categoryId',
			'id' => 'ad_categoryId',
			'tip' => 'By specifying an eBay category ID only items which are listed in this category will be displayed. You can specify up to 3 different category IDs by separating with a colon (:) for example 123:456:789 See the Help/FAQ page for help on obtaining category IDs.',
			'group' => 'advanced',
			'title' => 'Filter by category ID'
		)
	),	
	//Profile tool parameters	
	'profile_parameters' => array(
		'profile_UserID'  => array(
			'name' => 'profile_UserID',
			'id' => 'profile_UserID',
			'tip' => 'This is your eBay ID (username) that is associated to your eBay account. This is the username you are known by on eBay and appears on your listings.',
			'title' => 'eBay user ID'
		),
		'profile_siteid'  => array(
			'name' => 'profile_siteid',
			'id' => 'profile_siteid',
			'tip' => 'This is the site where your eBay account is registered. Although selecting any site will link your badge to your feedback profile, selecting your \'home\' site will ensure your current items are also displayed.',
			'type' => 'select',
			'options' => array(
				'0' => 'eBay US',
				'3' => 'eBay UK',
				'2' => 'eBay Canada',
				'15' => 'eBay Australia',
				'23' => 'eBay Belgium',
				'77' => 'eBay Germany',
				'71' => 'eBay France',
				'186' => 'eBay Spain',
				'16' => 'eBay Austria',
				'101' => 'eBay Italy',
				'146' => 'eBay Netherlands',
				'205' => 'eBay Ireland',
				'193' => 'eBay Switzerland'
			),
			'default' => '3',
			'title' => 'eBay site'
		),
		'profile_theme'  => array(
			'name' => 'profile_theme',
			'id' => 'profile_theme',
			'tip' => 'Your profile information will display differently on your site depending on which theme you choose.',
			'type' => 'select',
			'options' => array(
				'star_grey' => 'Grey Star',
				'badge' => 'Rectangular Badge',
				'simple_details' => 'Simple Details'
			),
			'default' => 'star_grey',
			'title' => 'Theme'
		),
		'profile_blank'  => array(
			'name' => 'profile_blank',
			'id' => 'profile_blank',
			'tip' => 'Enabling this option will open the link to your profile in a new browser tab.',
			'type' => 'radio',
			'group' => 'display',
			'title' => 'Open links in new tab?',
			'default' => '0',
			'options' => array(
				'1' => 'Yes',
				'0' => 'No'
			)
		)		
	),
	//Feedback tool parameters	
	'feedback_parameters' => array(
		'feedback_UserID'  => array(
			'name' => 'feedback_UserID',
			'id' => 'feedback_UserID',
			'tip' => 'This is your eBay ID (username) that is associated to your eBay account. This is the username you are known by on eBay and appears on your listings.',
			'title' => 'eBay user ID'
		),
		'feedback_siteid'  => array(
			'name' => 'feedback_siteid',
			'id' => 'feedback_siteid',
			'tip' => 'This is the site where your eBay account is registered. Although selecting any site will link your badge to your feedback profile, selecting your \'home\' site will ensure your current items are also displayed.',
			'type' => 'select',
			'options' => array(
				'0' => 'eBay US',
				'3' => 'eBay UK',
				'2' => 'eBay Canada',
				'15' => 'eBay Australia',
				'23' => 'eBay Belgium',
				'77' => 'eBay Germany',
				'71' => 'eBay France',
				'186' => 'eBay Spain',
				'16' => 'eBay Austria',
				'101' => 'eBay Italy',
				'146' => 'eBay Netherlands',
				'205' => 'eBay Ireland',
				'193' => 'eBay Switzerland'
			),
			'default' => '3',
			'title' => 'eBay site'
		),
		'feedback_theme'  => array(
			'name' => 'feedback_theme',
			'id' => 'feedback_theme',
			'tip' => 'Your feedback will display differently on your site depending on which theme you choose.',
			'type' => 'select',
			'options' => array(
				'profile_table' => 'Profile table',
				'table' => 'Basic table'
			),
			'default' => 'profile_table',
			'title' => 'Theme'
		),		
		'feedback_limit'  => array(
			'name' => 'feedback_limit',
			'id' => 'feedback_limit',
			'tip' => 'This number determines how many feedback entries will be displayed.',
			'title' => 'Entries to show (1-25)',
			'default' => '5'			
		),		
		'feedback_type'  => array(
			'name' => 'feedback_type',
			'id' => 'feedback_type',
			'tip' => 'Determines the type of feedback entries displayed.',
			'type' => 'select',
			'options' => array(
				'FeedbackReceived' => 'All feedback received',
				'FeedbackLeft' => 'All feedback left for others',
				'FeedbackReceivedAsBuyer' => 'Feedback received as a buyer',
				'FeedbackReceivedAsSeller' => 'Feedback received as a seller'
			),
			'default' => 'FeedbackReceived',
			'title' => 'Feedback type'
		),
		'feedback_blank'  => array(
			'name' => 'feedback_blank',
			'id' => 'feedback_blank',
			'tip' => 'Enabling this option will open item links in a new browser tab.',
			'type' => 'radio',
			'group' => 'display',
			'title' => 'Open links in new tab?',
			'default' => '0',
			'options' => array(
				'1' => 'Yes',
				'0' => 'No'
			)
		)
	)	
);

/**
 * ======================================================== 
 * ==================== UTILITY ===========================
 * ========================================================
 */
function unprefix($key) {
	$search = array('item_', 'ad_', 'profile_', 'feedback_');
	$replace = array('', '', '', '');
	return str_replace($search, $replace, $key);	
}

function an_build_snippet($tool = 'LISTINGS', $parameters){
	global $an_plugin_settings;

	//Build URL data
	$url_data = '';
	foreach($parameters as $p_key => $p_value) {
		//If we have a value
		if($p_value !== '') {
			//Un prefix keys
			$p_key = unprefix($p_key);

			//Process certain parameters
			switch($p_key) {
				case 'UserID':
				case 'SellerID':
					$p_value = str_replace($an_plugin_settings['username_bad'], $an_plugin_settings['username_good'], $p_value);
					break;
			}
			
			//Add data
			$url_data .= $p_key . '/' . $p_value . '/';			
		}
	}	

	//Sort out some naughty characters
	$search = array('%');
	$replace = array('%25');
	$src = str_replace($search, $replace, $url_data);
	
	//Build snippet
	switch($tool) {
		case 'PROFILE' :
			$out = '<script type="text/javascript" src="';
			$out .= $an_plugin_settings['request_profile_endpoint'];
			$out .= $src;
			$out .= '"></script>';
			$out .= '<div id="auction-nudge-profile" class="auction-nudge">&nbsp;</div>';
			
			break;
		case 'FEEDBACK' :
			$out = '<script type="text/javascript" src="';
			$out .= $an_plugin_settings['request_feedback_endpoint'];
			$out .= $src;
			$out .= '"></script>';
			$out .= '<div id="auction-nudge-feedback" class="auction-nudge">&nbsp;</div>';
		
			break;
		case 'ADS' :
			$format_dimensions = explode('x', $parameters['ad_format']);
			$out = '<iframe width="' . $format_dimensions[0] . '" height="' . $format_dimensions[1] . '" style="border:none" frameborder="0" src="';
			$out .= $an_plugin_settings['request_ad_endpoint'];
			$out .= $src;
			$out .= '"></iframe>';
		
			break;
		case 'LISTINGS' :
		default :
			$out = '<script type="text/javascript" src="';
			$out .= $an_plugin_settings['request_item_endpoint'];
			$out .= $src;
			$out .= '"></script>';
			$out .= '<div id="auction-nudge-items" class="auction-nudge">&nbsp;</div>';
					
			break;
	}
	
	return $out;
}

function an_custom_fields_set() {
	global $post;
	
	$post_meta = get_post_meta($post->ID);
	
	return sizeof($post_meta) > 0;
}

/**
 * ======================================================== 
 * =================== FRONT END ==========================
 * ========================================================
 */

/**
 * Shortcode
 */
function an_shortcode($shortcode_attrs){
	global $post, $an_plugin_settings;
	
	//Default tool
	$tool = 'LISTINGS';
	
	if(is_array($shortcode_attrs)) {
		$tool = $shortcode_attrs['tool'];
		$tool = strtoupper($tool);
	}
	
	$request_parameters = array();
	switch($tool) {
		case 'PROFILE' :
			//Get custom values
			foreach($an_plugin_settings['profile_parameters'] as $field) {
				$request_parameters[$field['name']] = get_post_meta($post->ID, $field['name'], true);
			}
			
			//Get snippet
			$out = an_build_snippet('PROFILE', $request_parameters);
			
			break;
		case 'FEEDBACK' :
			//Get custom values
			foreach($an_plugin_settings['feedback_parameters'] as $field) {
				$request_parameters[$field['name']] = get_post_meta($post->ID, $field['name'], true);
			}
			
			//Theme
			if(! array_key_exists('feedback_theme', $request_parameters) || ! $request_parameters['feedback_theme']) {
				$request_parameters['feedback_theme'] = 'table';				
			}
			
			//Get snippet
			$out = an_build_snippet('FEEDBACK', $request_parameters);
			
			break;
		case 'ADS' :
			//Get custom values
			foreach($an_plugin_settings['ad_parameters'] as $field) {
				$request_parameters[$field['name']] = get_post_meta($post->ID, $field['name'], true);
			}
			
			//Get snippet
			$out = an_build_snippet('ADS', $request_parameters);
			
			break;					
		case 'LISTINGS' :
		default:
			//Get custom values
			foreach($an_plugin_settings['item_parameters'] as $field) {
				$request_parameters[$field['name']] = get_post_meta($post->ID, $field['name'], true);
			}
			
			//Get snippet
			$out = an_build_snippet('LISTINGS', $request_parameters);
			
			break;							
	}
	
	return $out;
}
add_shortcode($an_plugin_settings['shortcode'], 'an_shortcode');

/**
 * Replace markers
 */
function an_the_content($content) {
	$options = get_option('an_options');

	$old = array(
		'[an_items]',
		'[an_profile]',
		'[an_feedback]'
	);
	$new = array(
		$options['an_items_code'],
		$options['an_profile_code'],
		$options['an_feedback_code']
	);	
	return str_replace($old, $new, $content);
}
add_filter('the_content', 'an_the_content');

/**
 * Output version #
 */
function an_output_version() {
	global $an_plugin_settings;
	echo '<!-- AN v' . $an_plugin_settings['plugin_version'] . ' -->' . "\n";	
}
add_action('wp_head','an_output_version');

/**
 * Output items
 */
function an_items() {
	echo an_get_option('an_items_code');
}

/**
 * Output profile
 */
function an_profile() {
	echo an_get_option('an_profile_code');
}

/**
 * Output feedback
 */
function an_feedback() {
	echo an_get_option('an_feedback_code');
}

/**
 * ======================================================== 
 * ================== ADMIN ONLY ==========================
 * ========================================================
 */

function an_admin_init() {
	//Permissions
	if(current_user_can('manage_options')) {
		//Add custom fields
		add_action( 'admin_head-post.php', 'an_create_custom_fields_box' );
		add_action( 'admin_head-post-new.php', 'an_create_custom_fields_box' );

		//Save custom fields
		add_action('save_post', 'an_save_custom_fields', 10, 2);

		//Add CSS
		wp_register_style('an_css', plugins_url('auctionnudge.css', __FILE__));
		wp_enqueue_style('an_css');	

		//Add JS
		wp_register_script('an_js', plugins_url('auctionnudge.js', __FILE__), array('jquery'));
		wp_enqueue_script('an_js');
		
		//Thickbox
		add_thickbox();		
	}
}
add_action('admin_init', 'an_admin_init');

/**
 * ======================================================== 
 * ================= CUSTOM FIELDS ========================
 * ========================================================
 */
 
/**
 * Create the custom fields box
 */
function an_create_custom_fields_box() {
	global $an_plugin_settings;
	
	foreach(array('post', 'page') as $post_type) {
		add_meta_box('an-custom-fields', $an_plugin_settings['plugin_name'], 'an_create_custom_field_form', $post_type, 'normal', 'high');
	}
}

/**
 * Create the custom field form
 */
function an_create_custom_field_form() {
	global $post, $an_plugin_settings;
	
	echo '<div id="an-custom-field-container">' . "\n";
	echo '<ul id="an-tab-links">' . "\n";
	echo '	<li><a class="an-tab-link active" data-tab="listings-tab" href="#">Your eBay Listings</a></li>' . "\n";
	echo '	<li><a class="an-tab-link" data-tab="ads-tab" href="#">Your eBay Ads</a></li>' . "\n";
	echo '	<li><a class="an-tab-link" data-tab="profile-tab" href="#">Your eBay Profile</a></li>' . "\n";
	echo '	<li><a class="an-tab-link" data-tab="feedback-tab" href="#">Your eBay Feedback</a></li>' . "\n";	
	echo '</ul>' . "\n";
	//Item tool
	echo '<div id="listings-tab" class="an-custom-field-tab">' . "\n";			
	echo '	<div class="an-custom-field-help">' . "\n";
	echo '		<p>Use these options to specify which of your eBay items to display within your page/post.</p><p>Add the following shortcode within your content editor to specify where the items will appear:</p><p>[' . $an_plugin_settings['shortcode'] . ' tool="listings"]</p><p><small><b>Note:</b> Only one set of eBay listings can be loaded per page.</small></p>' . "\n";
	echo '		<a class="button thickbox" href="#TB_inline?width=600&height=550&inlineId=an-help-popup">Quick Help</a> <a class="button" target="_blank" href="https://www.youtube.com/watch?v=smamgdwCD74">Video Tutorial</a>' . "\n";
	echo '	</div>' . "\n";
	echo '	<h2>Your eBay Listings</h2>' . "\n";						
	$current_group = false;
	$count = 0;	
	foreach($an_plugin_settings['item_parameters'] as $field) {
		
		//Maintain old defaults
		//If custom fields have already been saved, then modify some defaults.
		//This is used when new paramters have been added, but we don't want
		//to add them to old feeds by default
		if(an_custom_fields_set()) {
			switch($field['name']) {
				case 'item_img_size' :
				case 'item_page' :
					$field['default'] = '';					
					break;
			}
		}
		
		$group = $an_plugin_settings['item_parameter_groups'][$field['group']];
		//Output group?
		if($current_group != $group) {
			//Close previous fieldset?
			if($current_group !== false) {			
				echo '	</div>' . "\n";
				echo '</fieldset>' . "\n";					
			}
			echo '	<fieldset class="an-parameter-group an-parameter-group-' . $field['group'] . '">' . "\n";					
			echo '		<legend title="Click to expand">' . $group['name'] . '</legend>' . "\n";
			echo '		<div class="an-parameter-group-content">' . "\n";
			echo '			<p>' . $group['description'] . '</p>' . "\n";
			$current_group = $group;
		}
		$set_value = get_post_meta($post->ID, $field['name'], true);
		an_create_custom_field_input($field, $count, $set_value);
		$count++;
	}
	echo '		</div>' . "\n";
	echo '	</fieldset>' . "\n";
	echo '</div>' . "\n";			

	//Ad tool
	echo '<div id="ads-tab" class="an-custom-field-tab" style="display:none">' . "\n";			
	echo '	<div class="an-custom-field-help">' . "\n";
	echo '		<p>Use these options to specify the type of ad to display within your page/post.</p><p>Add the following shortcode within your content editor to specify where the ad will appear:</p><p>[' . $an_plugin_settings['shortcode'] . ' tool="ads"]</p><p><small><b>Note:</b> Only one type of eBay ad can be loaded within each content area.</small></p>' . "\n";
	echo '		<a class="button thickbox" href="#TB_inline?width=600&height=550&inlineId=an-help-popup">Quick Help</a> <a class="button" target="_blank" href="https://www.youtube.com/watch?v=smamgdwCD74">Video Tutorial</a>' . "\n";
	echo '	</div>' . "\n";
	echo '	<h2>Your eBay Ads</h2>' . "\n";						
	$current_group = false;
	$count = 0;	
	foreach($an_plugin_settings['ad_parameters'] as $field) {
		$group = $an_plugin_settings['item_parameter_groups'][$field['group']];
		//Output group?
		if($current_group != $group) {
			//Close previous fieldset?
			if($current_group !== false) {			
				echo '	</div>' . "\n";
				echo '</fieldset>' . "\n";					
			}
			echo '	<fieldset class="an-parameter-group an-parameter-group-' . $field['group'] . '">' . "\n";					
			echo '		<legend title="Click to expand">' . $group['name'] . '</legend>' . "\n";
			echo '		<div class="an-parameter-group-content">' . "\n";
			echo '			<p>' . $group['description'] . '</p>' . "\n";
			$current_group = $group;
		}
		$set_value = get_post_meta($post->ID, $field['name'], true);
		an_create_custom_field_input($field, $count, $set_value);
		$count++;
	}
	echo '		</div>' . "\n";
	echo '	</fieldset>' . "\n";
	echo '</div>' . "\n";		
		
	//Profile tool
	echo '<div id="profile-tab" class="an-custom-field-tab" style="display:none">' . "\n";				
	echo '	<div class="an-custom-field-help">' . "\n";
	echo '		<p>Use these options to specify how your eBay profile will appear within your page/post.</p><p>Add the following shortcode within your content editor to specify where the items will appear:</p><p>[' . $an_plugin_settings['shortcode'] . ' tool="profile"]</p><p><small><b>Note:</b> Only one profile can be loaded per page.</small></p>' . "\n";
	echo '		<a class="button thickbox" href="#TB_inline?width=600&height=550&inlineId=an-help-popup">Quick Help</a> <a class="button" target="_blank" href="https://www.youtube.com/watch?v=smamgdwCD74">Video Tutorial</a>' . "\n";
	echo '	</div>' . "\n";
	echo '	<h2>Your eBay Profile</h2>' . "\n";						
	$count = 0;
	foreach($an_plugin_settings['profile_parameters'] as $field) {
		$set_value = get_post_meta($post->ID, $field['name'], true);
		an_create_custom_field_input($field, $count, $set_value);
		$count++;
	}
	echo '</div>' . "\n";			

	//Feedback tool
	echo '<div id="feedback-tab" class="an-custom-field-tab" style="display:none">' . "\n";			
	echo '	<div class="an-custom-field-help">' . "\n";
	echo '		<p>Use these options to specify how your eBay feedback will appear within your page/post.</p><p>Add the following shortcode within your content editor to specify where the items will appear:</p><p>[' . $an_plugin_settings['shortcode'] . ' tool="feedback"]</p><p><small><b>Note:</b> Only one set of feedback can be loaded per page.</small></p>' . "\n";
	echo '		<a class="button thickbox" href="#TB_inline?width=600&height=550&inlineId=an-help-popup">Quick Help</a> <a class="button" target="_blank" href="https://www.youtube.com/watch?v=smamgdwCD74">Video Tutorial</a>' . "\n";
	echo '	</div>' . "\n";
	echo '	<h2>Your eBay Feedback</h2>' . "\n";						
	$count = 0;
	foreach($an_plugin_settings['feedback_parameters'] as $field) {

		//Maintain old defaults
		if(an_custom_fields_set()) {
			switch($field['name']) {
				case 'feedback_theme' :
					$field['default'] = 'table';
					break;				
			}
		}
		
		$set_value = get_post_meta($post->ID, $field['name'], true);
		an_create_custom_field_input($field, $count, $set_value);
		$count++;
	}
	echo '</div>' . "\n";			
						
	echo '	<div id="an-help-popup" style="display:none;">'. "\n";
	ob_start();
	require 'auctionnudge.help.php';
	ob_end_flush();	
 	echo '	</div>'	. "\n";
	echo '</div> <!-- END #an-custom-field-container -->' . "\n";
}

/**
 * Create the custom fields inputs
 */
function an_create_custom_field_input($field, $count = false, $set_value = false) {
	global $an_plugin_settings;
	
	//Get options
	$options = get_option('an_options');
	
	//Do we have a default?
	if(! array_key_exists('default', $field)) {
		$field['default'] = false;
	}
	
	$field['id'] = unprefix($field['id']);

	//Container
	$alt = ($count !== false && $count % 2) ? ' alt' : '';
	$out .= '<div class="control-group' . $alt . '" id="' . $field['id'] . '-container">' . "\n";
	//Required
	$required = '';
	if($param['parameter_required']) {
		$required = ' <span class="required">*</span>';
	}
	//Tip
	$tip = '';
	if($field['tip']) {
		$tip = ' <a class="tip" title="' . $field['tip'] . '" href="#" onclick="return false;">?</a>';
	}
	//Label
	$out .= '	<label class="control-label" for="' . $field['name'] . '">' . $field['title'] . $required . $tip .  '</label>' . "\n";
	$out .= '	<div class="controls">' . "\n";				
	
	switch($field['type']) {
		case 'select' :
			$out .= '		<select name="' . $field['name'] . '" id="' . $field['id'] . '">' . "\n";
			foreach($field['options'] as $value => $description) {

				$out .= '			<option value="' . $value . '"';
				//Has this value already been set
				if($set_value == $value) {
					$out .= ' selected="selected"';
				//Do we have a default?
				}	elseif($set_value === false && ($field['default'] && $field['default'] == $value)) {
					$out .= ' selected="selected"';				
				}		
				$out .= '>' . $description . '</option>' . "\n";
			}
			$out .= '		</select>' . "\n";
			break;
		case 'checkbox' :
			//Value submitted?
			$checked = false;

			if($set_value && ($set_value == 'true' || $set_value == $field['value'])) {
				$checked = true;
			} elseif($field['default'] == 'true') {
				$checked = true;								
			}
			$value = ($field['value']) ? $field['value'] : 'true';
			$out .= '		<input type="checkbox" name="' . $field['name'] . '" value="' . $value . '" id="' . $field['id'] . '"';
			if($checked) {
				$out .= ' checked="checked"';			
			}
			$out .= ' />' . "\n";			
			break;
		case 'radio' :
			foreach($field['options'] as $value => $description) {
				$checked = false;
				
				//If we have a stored value
				if($set_value !== '' && $set_value == $value) {
					$checked = true;
				//Otherwise is this the default value?
				} elseif($set_value == '' && $value == $field['default']) {
					$checked = true;
				}
				$out .= '<div class="radio">' . "\n";
				$out .= '	<input type="radio" name="' . $field['name'] . '" value="' . $value . '"';
				if($checked) {
					$out .= ' checked="checked"';			
				}				
				$out .= ' />' . "\n";						
				$out .= $description . '<br />' . "\n";						
				$out .= '</div>' . "\n";
			}
			break;						
		case 'text' :
		default :
			$out .= '		<input type="text" name="' . $field['name'] . '" id="' . $field['id'] . '"';
			//Do we have a value for this post?
			if($value = htmlspecialchars($set_value)) {
				$out .= ' value="' . $value . '"';
			//Setting?
			} elseif(strpos($field['name'], 'SellerID') && $options['an_ebay_user']) {
				$out .= ' value="' . $options['an_ebay_user'] . '"';				
			} elseif(strpos($field['name'], 'UserID') && $options['an_ebay_user']) {
				$out .= ' value="' . $options['an_ebay_user'] . '"';				
			//Do we have a default?
			}	elseif($value = $field['default']) {
				$out .= ' value="' . $value . '"';			
			}
			$out .= ' />' . "\n";
			break;
	}
	$out .= '	</div>' . "\n";								
	$out .= '</div>' . "\n";
	
	echo $out;
}

/**
 * Save the custom field data
 */
function an_save_custom_fields($post_id, $post) {
	global $an_plugin_settings;
	
	$plugin_parameters = array_merge(
		$an_plugin_settings['item_parameters'],
		$an_plugin_settings['ad_parameters'],
		$an_plugin_settings['profile_parameters'],
		$an_plugin_settings['feedback_parameters']
	);
	
	foreach($plugin_parameters as $field) {
		if(isset($_POST[$field['name']]) && trim($_POST[$field['name']]) !== '') {
			$value = $_POST[$field['name']];
			update_post_meta($post_id, $field['name'], $value);
		} else {
			delete_post_meta($post_id, $field['name']);
		}
	}
}

/**
 * ======================================================== 
 * ================== OPTIONS PAGE ========================
 * ========================================================
 */

/**
 * Create options page
 */
function an_admin_page() {
	//Permissions
	if(current_user_can('manage_options')) {
		global $an_plugin_settings;
		add_options_page($an_plugin_settings['plugin_name'] . ' Options', $an_plugin_settings['plugin_name'], 'manage_options', 'an_options_page', 'an_options_page');
	}
}
add_action('admin_menu', 'an_admin_page');

/**
 * Display the admin options page
 */
function an_options_page() {
	global $an_plugin_settings;

	echo '<div id="an-options-container">' . "\n";

	echo '	<a class="button right thickbox" href="#TB_inline?width=600&height=550&inlineId=an-help-popup">Quick Help</a>' . "\n";

	echo '	<div id="an-about">' . "\n";	
	echo '		<img width="60" height="60" src="http://www.josephhawes.co.uk/assets/images/Joe1BW.jpg" />' . "\n";		
	echo '		<p><b>Hi, I\'m Joe and I created this plugin.</b></p>' . "\n";		
	echo '		<p>Most common issues are solved by reading the <a target="_blank" href="https://www.auctionnudge.com/help">Help</a> page. Bugs and errors can be reported <a target="_blank" href="https://www.auctionnudge.com/contact">here</a>. Please do this before leaving a poor review.</p>' . "\n";	
	echo '		<p>If you like the plugin, please show your appreciation by <a target="_blank" href="https://wordpress.org/support/view/plugin-reviews/auction-nudge?rate=5#postform">leaving a rating</a>. It really does help.</p>' . "\n";		
	echo '		<p><b>Thanks!</b></p>' . "\n";		
	echo '		<a class="button" target="_blank" href="https://www.youtube.com/watch?v=smamgdwCD74">Watch the tutorial</a>' . "\n";
	echo '		<a class="button" target="_blank" href="https://www.auctionnudge.com/help">Read the Help page</a>' . "\n";
	echo '		<a class="button button-primary" target="_blank" href="https://wordpress.org/support/view/plugin-reviews/auction-nudge?rate=5#postform">Rate the plugin :)</a>' . "\n";
	echo '	</div>' . "\n";

	echo '	<h2>' . $an_plugin_settings['plugin_name'] . '</h2>' . "\n";
	
	echo '<p>To add Auction Nudge to your pages or posts use the Auction Nudge box on the edit page. You can also add Auction Nudge to your theme as <a href="' . admin_url('widgets.php') . '">Widgets</a>. The Settings below can be used to specify some defaults and style rules, but are not required.</p>' . "\n";
	
	echo '<p>For more details on how to use the plugin, you can watch the <a target="_blank" href="https://www.youtube.com/watch?v=smamgdwCD74">Video Tutorial</a>.</p>' . "\n";
	
	//Tabs
	$active_tab = ($_GET['tab']) ? $_GET['tab'] : 'general';
	an_admin_tabs($active_tab);
	
	//Open form
	echo '	<form action="options.php" method="post">' . "\n";
	settings_fields('an_options');
	
	//Which group of options are we showing?
	switch($_GET['tab']) {
		case 'theme' :
			echo '<div style="display:none">';
			do_settings_sections('an_general');
			echo '</div>';
			echo '<p><strong>To add Auction Nudge to your pages / posts use the Auction Nudge box on the edit page. The following options allow you to specify code snippets you wish to use from within your theme.</strong></p>' . "\n";
			do_settings_sections('an_theme');
			break;
		case 'general' :
		default :
			do_settings_sections('an_general');
			echo '<div style="display:none">';
			do_settings_sections('an_theme');
			echo '</div>';
			break;
	}
	
	//Submit
	echo '		<input class="button button-primary" name="Submit" type="submit" value="Save Settings" />' . "\n";
	echo '	</form>' . "\n";
	
	//Help
	echo '	<div id="an-help-popup" style="display:none;">'. "\n";
	ob_start();
	require 'auctionnudge.help.php';
	ob_end_flush();	
 	echo '	</div>'	. "\n";
	echo '</div>' . "\n";
}

function an_admin_tabs($current = 'general') {
  $tabs = array(
  	'general' => 'General',
  	'theme' => 'Within Your Theme'
  );
  $links = array();
  foreach($tabs as $slug => $name) {
		if($slug == $current) {
			$links[] = '<a class="nav-tab nav-tab-active" href="?page=an_options_page&tab=' . $slug . '">' . $name . '</a>';
		} else {
			$links[] = '<a class="nav-tab" href="?page=an_options_page&tab=' . $slug . '">' . $name . '</a>';
		}
  }
  echo '<h2 class="nav-tab-wrapper">';
  foreach($links as $link) {
		echo $link; 
  }      
  echo '</h2>';
}

/**
 * Define settings
 */
function an_admin_settings(){
	//Permissions
	if(current_user_can('manage_options')) {
		register_setting('an_options', 'an_options', 'an_options_validate');

		//Items
		add_settings_section('an_items', 'Your eBay Listings', 'an_items_text', 'an_theme');
		add_settings_field('an_items_code_snippet', 'Insert code snippet', 'an_items_setting', 'an_theme', 'an_items');

		//Profile
		add_settings_section('an_profile', 'Your eBay Profile', 'an_profile_text', 'an_theme');
		add_settings_field('an_profile_code_snippet', 'Insert code snippet', 'an_profile_setting', 'an_theme', 'an_profile');

		//Feedback
		add_settings_section('an_feedback', 'Your eBay Feedback', 'an_feedback_text', 'an_theme');
		add_settings_field('an_feedback_code_snippet', 'Insert code snippet', 'an_feedback_setting', 'an_theme', 'an_feedback');
		
		//eBay ID
		add_settings_section('an_ebay_user', 'Your eBay User ID', 'an_ebay_user_text', 'an_general');
		add_settings_field('an_ebay_user', 'Your eBay User ID', 'an_ebay_user_setting', 'an_general', 'an_ebay_user');

		//CSS
		add_settings_section('an_css', 'Auction Nudge CSS Rules', 'an_css_text', 'an_general');
		add_settings_field('an_css_rules', 'Insert CSS Rules', 'an_css_setting', 'an_general', 'an_css');
	}
}
add_action('admin_init', 'an_admin_settings');

/**
 * Items text
 */
function an_items_text() {
	echo '<p>To begin <strong>you must obtain your code snippet from the Auction Nudge website</strong> <a target="_blank" href="https://www.auctionnudge.com/your-ebay-items">here</a> (shown as "Copy the code snippet onto your site") and paste it into the box below.</p>' . "\n";
	echo '<p>You can then call <code>&lt;?php an_items(); ?&gt;</code> from within your theme files to embed Your eBay Listings where desired.</p>' . "\n";
}

/**
 * Output items option
 */
function an_items_setting() {
	$options = get_option('an_options');
	echo '<textarea id="an_items_code_snippet" name="an_options[an_items_code]" rows="6" columns="30" style="font-family:courier;width:400px">' . $options['an_items_code'] . '</textarea>' . "\n";
}

/**
 * Profile text
 */
function an_profile_text() {
	echo '<p>To begin <strong>you must obtain your code snippet from the Auction Nudge website</strong> <a target="_blank" href="https://www.auctionnudge.com/your-ebay-profile">here</a> (shown as "Copy the code snippet onto your site") and paste it into the box below.</p>' . "\n";
	echo '<p>You can then call <code>&lt;?php an_profile(); ?&gt;</code> from within your theme files to embed Your eBay Profile where desired.</p>' . "\n";
}

/**
 * Output profile option
 */
function an_profile_setting() {
	$options = get_option('an_options');
	echo '<textarea id="an_profile_code_snippet" name="an_options[an_profile_code]" rows="6" columns="30" style="font-family:courier;width:400px">' . $options['an_profile_code'] . '</textarea>' . "\n";
}

/**
 * Feedback text
 */
function an_feedback_text() {
	echo '<p>To begin <strong>you must obtain your code snippet from the Auction Nudge website</strong> <a target="_blank" href="https://www.auctionnudge.com/your-ebay-feedback">here</a> (shown as "Copy the code snippet onto your site") and paste it into the box below.</p>' . "\n";
	echo '<p>You can then call <code>&lt;?php an_feedback(); ?&gt;</code> from within your theme files to embed Your eBay Feedback where desired.</p>' . "\n";
}

/**
 * Output feedback option
 */
function an_feedback_setting() {
	$options = get_option('an_options');
	echo '<textarea id="an_feedback_code_snippet" name="an_options[an_feedback_code]" rows="6" columns="30" style="font-family:courier;width:400px">' . $options['an_feedback_code'] . '</textarea>' . "\n";
}

/**
 * eBay ID
 */
function an_ebay_user_text() {
	echo '<p>Entering a default eBay user ID here will save you from re-entering it on each page, post or widget where you want to use Auction Nudge.</p>' . "\n";
	echo '<p>Changing this setting won\'t update each instance of Auction Nudge though, so if you change usernames at a later date you will need to update each page, post or widget individually.</p>';
	echo '<p>Your eBay ID is the username that is associated to your eBay account and appears on your listings.</p>' . "\n";
}

/**
 * Output eBay ID option
 */
function an_ebay_user_setting() {
	$options = get_option('an_options');
	echo '<input type="text" id="an_ebay_user" class="regular-text" name="an_options[an_ebay_user]" value="' . $options['an_ebay_user'] . '" />' . "\n";
}

/**
 * CSS text
 */
function an_css_text() {
	echo '<p>You can modify the appearance of Auction Nudge by pasting CSS rules into this box.</p>' . "\n";
	echo '<p>Ensure you target Auction Nudge content by starting your rules with <strong>div.auction-nudge</strong>. For example <code>div.auction-nudge a { color: red }</code> to make all Auction Nudge links red. You can find more information and demos on modifying the appearance of Auction Nudge <a target="_blank" href="https://www.auctionnudge.com/help#faq-css">here</a>.</p>' . "\n";
}

/**
 * Output CSS option
 */
function an_css_setting() {
	$options = get_option('an_options');
	echo '<textarea id="an_css_rules" name="an_options[an_css_rules]" rows="6" columns="30" style="font-family:courier;width:400px">' . $options['an_css_rules'] . '</textarea>' . "\n";
}

/**
 * Validate our options
 */
function an_options_validate($input) {
	$output = array();
	foreach($input as $o_key => $o_value) {
		$output[$o_key] = trim($o_value);
	}
	return $output;
}

/**
 * Load custom CSS
 */
function an_load_css() {
	$options = get_option('an_options');
	if($options['an_css_rules']) {
		echo '<style type="text/css">' . "\n";
		echo $options['an_css_rules'] . "\n";
		echo '</style>' . "\n";		
	}
}
add_action('wp_head', 'an_load_css');

/**
 * Get plugin options
 */
function an_get_option($option_key) {
	$options = get_option('an_options');
	
	if(is_array($options) && array_key_exists($option_key, $options)) {
		return $options[$option_key];		
	} else {
		return false;		
	}
}

/**
 * ======================================================== 
 * ==================== WIDGETS ===========================
 * ========================================================
 */

function an_display_widget_title($instance) {
	if(array_key_exists('an_widget_title', $instance) && $instance['an_widget_title']) {
		return '<h1 class="widget-title">' . $instance['an_widget_title'] . '</h1>' . "\n";
	}	else {
		return '';
	}
}

function an_get_widget_title($instance) {
	return (! empty($instance['an_widget_title'])) ? strip_tags($instance['an_widget_title']) : false;
}

function an_build_widget_title_input($instance, $count, $widget_field_name) {
	$field = array(
		'name' => 'an_widget_title',
		'id' => 'an_widget_title',
		'tip' => 'A title to appear above the widget (optional)',
		'title' => 'Widget Title'
	);
	$set_value = (isset($instance[$field['name']])) ? $instance[$field['name']] : '';
	$field['name'] = $widget_field_name;
	an_create_custom_field_input($field, $count, $set_value);
}

class Auction_Nudge_Listings_Widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'an_listings_widget',
			'Your eBay Listings',
			array(
				'description' => 'Use this widget to add your active eBay listings to your site, the feed will update itself automatically (note: only one set of eBay listings can be loaded per page)'
			)
		);		
	}

	public function widget($args, $instance) {
		echo '<aside class="widget an-listings-widget">' . "\n";
		echo an_display_widget_title($instance);
		unset($instance['an_widget_title']);
		
		echo an_build_snippet('LISTINGS', $instance);
		
		echo '</aside>' . "\n";
	}

	public function form($instance) {
		global $an_plugin_settings;
		
		$count = 0;		

		echo '<div class="an-widget-container">' . "\n";	
		an_build_widget_title_input($instance, $count, $this->get_field_name('an_widget_title'));
		$count++;

		$current_group = false;
		foreach($an_plugin_settings['item_parameters'] as $field) {

			//Maintain old defaults
			if(sizeof($instance) > 0) {
				switch($field['name']) {
					case 'item_img_size' :
					case 'item_page' :
						$field['default'] = '';					
						break;
				}
			}
			
			$group = $an_plugin_settings['item_parameter_groups'][$field['group']];
			//Output group?
			if($current_group != $group) {
				//Close previous fieldset?
				if($current_group !== false) {			
					echo '	</div>' . "\n";
					echo '</fieldset>' . "\n";					
				}
				echo '	<fieldset class="an-parameter-group an-parameter-group-' . $field['group'] . '">' . "\n";					
				echo '		<legend title="Click to expand">' . $group['name'] . '</legend>' . "\n";
				echo '		<div class="an-parameter-group-content">' . "\n";
				echo '			<p>' . $group['description'] . '</p>' . "\n";
				$current_group = $group;
			}
			$set_value = (isset($instance[$field['name']])) ? $instance[$field['name']] : '';
			$field['name'] = $this->get_field_name($field['name']);
			an_create_custom_field_input($field, $count, $set_value);
			$count++;
		}
		echo '		</div>' . "\n";
		echo '	</fieldset>' . "\n";
		echo '</div>' . "\n";
	}

	public function update($new_instance, $old_instance) {
		global $an_plugin_settings;
		
		$instance = array();

		$instance['an_widget_title'] = an_get_widget_title($new_instance);

		foreach($an_plugin_settings['item_parameters'] as $field) {
			$instance[$field['name']] = (trim($new_instance[$field['name']]) !== '') ? strip_tags($new_instance[$field['name']]) : '';
		}
		
		return $instance;
	}
}

class Auction_Nudge_Ads_Widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'an_ads_widget',
			'Your eBay Ads',
			array(
				'description' => 'Use this widget to create interactive banner ads containing your active eBay items. A selection of the common ad sizes are available which will automatically update themselves.'
			)
		);		
	}

	public function widget($args, $instance) {
		echo '<aside class="widget an-ads-widget">' . "\n";
		echo an_display_widget_title($instance);
		unset($instance['an_widget_title']);
		
		echo an_build_snippet('ADS', $instance);
		
		echo '</aside>' . "\n";
	}

	public function form($instance) {
		global $an_plugin_settings;

		$count = 0;		

		echo '<div class="an-widget-container">' . "\n";	
		an_build_widget_title_input($instance, $count, $this->get_field_name('an_widget_title'));
		$count++;

		$current_group = false;
		foreach($an_plugin_settings['ad_parameters'] as $field) {
			$group = $an_plugin_settings['item_parameter_groups'][$field['group']];
			//Output group?
			if($current_group != $group) {
				//Close previous fieldset?
				if($current_group !== false) {			
					echo '	</div>' . "\n";
					echo '</fieldset>' . "\n";					
				}
				echo '	<fieldset class="an-parameter-group an-parameter-group-' . $field['group'] . '">' . "\n";					
				echo '		<legend title="Click to expand">' . $group['name'] . '</legend>' . "\n";
				echo '		<div class="an-parameter-group-content">' . "\n";
				echo '			<p>' . $group['description'] . '</p>' . "\n";
				$current_group = $group;
			}
			$set_value = (isset($instance[$field['name']])) ? $instance[$field['name']] : '';
			$field['name'] = $this->get_field_name($field['name']);
			an_create_custom_field_input($field, $count, $set_value);
			$count++;
		}
		echo '		</div>' . "\n";
		echo '	</fieldset>' . "\n";
		echo '</div>' . "\n";
	}

	public function update($new_instance, $old_instance) {
		global $an_plugin_settings;
		
		$instance = array();

		$instance['an_widget_title'] = an_get_widget_title($new_instance);

		foreach($an_plugin_settings['ad_parameters'] as $field) {
			$instance[$field['name']] = (trim($new_instance[$field['name']]) !== '') ? strip_tags($new_instance[$field['name']]) : '';
		}
		
		return $instance;
	}
}

class Auction_Nudge_Profile_Widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'an_profile_widget',
			'Your eBay Profile',
			array(
				'description' => 'Use this widget to display information about your eBay profile such as feedback score and date of registration. Different themes / badges are available.'
			)
		);		
	}

	public function widget($args, $instance) {
		echo '<aside class="widget an-profile-widget">' . "\n";
		echo an_display_widget_title($instance);
		unset($instance['an_widget_title']);
		
		echo an_build_snippet('PROFILE', $instance);
		
		echo '</aside>' . "\n";
	}

	public function form($instance) {
		global $an_plugin_settings;

		$count = 0;		

		echo '<div class="an-widget-container">' . "\n";	
		an_build_widget_title_input($instance, $count, $this->get_field_name('an_widget_title'));
		$count++;

		foreach($an_plugin_settings['profile_parameters'] as $field) {
			$set_value = (isset($instance[$field['name']])) ? $instance[$field['name']] : '';
			$field['name'] = $this->get_field_name($field['name']);
			an_create_custom_field_input($field, $count, $set_value);
			$count++;
		}
		echo '</div>' . "\n";		
	}

	public function update($new_instance, $old_instance) {
		global $an_plugin_settings;
		
		$instance = array();

		$instance['an_widget_title'] = an_get_widget_title($new_instance);

		foreach($an_plugin_settings['profile_parameters'] as $field) {
			$instance[$field['name']] = (trim($new_instance[$field['name']]) !== '') ? strip_tags($new_instance[$field['name']]) : '';
		}
		
		return $instance;
	}
}

class Auction_Nudge_Feedback_Widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'an_feedback_widget',
			'Your eBay Feedback',
			array(
				'description' => 'Use this widget to display up to 25 of your most recent eBay feedback comments. The feedback shown is live and will update once more feedback is received.'
			)
		);		
	}

	public function widget($args, $instance) {
		echo '<aside class="widget an-feedback-widget">' . "\n";
		echo an_display_widget_title($instance);
		unset($instance['an_widget_title']);

		if(! array_key_exists('feedback_theme', $instance) || ! $instance['feedback_theme']) {
			$instance['feedback_theme'] = 'table';	
		}
		
		echo an_build_snippet('FEEDBACK', $instance);

		echo '</aside>' . "\n";		
	}

	public function form($instance) {
		global $an_plugin_settings;

		$count = 0;		

		echo '<div class="an-widget-container">' . "\n";	
		
		an_build_widget_title_input($instance, $count, $this->get_field_name('an_widget_title'));
		$count++;
		
		foreach($an_plugin_settings['feedback_parameters'] as $field) {

			//Maintain old defaults
			if(sizeof($instance) > 0) {
				switch($field['name']) {
					case 'feedback_theme' :
						$field['default'] = 'table';
						break;				
				}
			}

			$set_value = (isset($instance[$field['name']])) ? $instance[$field['name']] : '';
			$field['name'] = $this->get_field_name($field['name']);
			an_create_custom_field_input($field, $count, $set_value);
			$count++;
		}
		echo '</div>' . "\n";
	}

	public function update($new_instance, $old_instance) {
		global $an_plugin_settings;
		
		$instance = array();

		$instance['an_widget_title'] = an_get_widget_title($new_instance);
		
		foreach($an_plugin_settings['feedback_parameters'] as $field) {
			$instance[$field['name']] = (trim($new_instance[$field['name']]) !== '') ? strip_tags($new_instance[$field['name']]) : '';
		}
		
		return $instance;
	}
}

function an_widgets_init() {
	register_widget('Auction_Nudge_Listings_Widget');
	register_widget('Auction_Nudge_Ads_Widget');	
	register_widget('Auction_Nudge_Profile_Widget');
	register_widget('Auction_Nudge_Feedback_Widget');	
}
add_action('widgets_init', 'an_widgets_init');