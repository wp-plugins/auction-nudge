=== Auction Nudge ===
Contributors: morehawes
Tags: Auction Nudge, eBay, widget, embed, integration, listings, items, profile, feedback, free
Requires at least: 2.7
Tested up to: 3.8.1
Stable tag: 2.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin enables you to embed your live eBay information on your WordPress site using Auction Nudge.

== Description ==

This plugin enables you to embed your live eBay information on your WordPress site using <a href="http://www.auctionnudge.com/">Auction Nudge</a>. Auction Nudge is a set of free widgets to integrate eBay into your own website. If you sell on eBay you can include Your eBay Listings, Your eBay Profile and Your eBay Feedback on your site by installing one line of code.

Installation instructions:

1. Once the plugin is installed, specify the desired options in the Auction Nudge box which appears on edit page/post admin pages.
2. You can then specify where the content is output using the Auction Nudge `[auction-nudge]` shortcode.
3. Update or publish the page and Auction Nudge will now display on your site!

Shortcodes (to be added to a page/post through the content editor) :

`<!-- To display Your eBay Listings -->
[auction-nudge tool="listings"]

<!-- To display Your eBay Profile -->
[auction-nudge tool="profile"]

<!-- To display Your eBay Feedback -->
[auction-nudge tool="feedback"]`

The following options are available for the Your eBay Listings tool:

= Feed options =

* Enter your eBay username
* eBay user ID
* eBay site

= Display options =

* Customise your feed
* Theme
* Number of items to show
* Number of items to scroll
* Item width
* Auto scroll
* Grid columns
* Grid width
* Show eBay Logo?

= Advanced options =

* Sort order
* Filter by keyword
* Filter by category ID

== Installation ==

1. Once the plugin is installed, specify the desired options in the Auction Nudge box which appears on edit page/post admin pages.
2. You can then specify where the content is output using the Auction Nudge `[auction-nudge]` shortcode.
3. Update or publish the page and Auction Nudge will now display on your site!

Shortcodes (to be added to a page/post through the content editor) :

`<!-- To display Your eBay Listings -->
[auction-nudge tool="listings"]

<!-- To display Your eBay Profile -->
[auction-nudge tool="profile"]

<!-- To display Your eBay Feedback -->
[auction-nudge tool="feedback"]`

As well as adding Auction Nudge content to your pages/posts using the `[auction-nudge]` shortcode you can also call the plugin directly from your theme files.

To use this feature, generate your code snippets from the <a target="_blank" href="http://www.auctionnudge.com">Auction Nudge website</a> and paste them in to the appropriate boxes in the <em>Settings &gt; Auction Nudge &gt; Within Your Theme</em> page. You can then use the following functions to add Auction Nudge within your theme files:

`/* To display Your eBay Listings */
<?php an_items(); ?>

/* To display Your eBay Profile */
<?php an_profile(); ?>

/* To display Your eBay Feedback */
<?php an_feedback(); ?>`

== Frequently Asked Questions ==

Refer to the full Auction Nudge <a target="_blank" href="http://www.auctionnudge.com/help">help/FAQ page</a> for much more help.

= How do I add Auction Nudge to my pages / posts? =

Once the plugin has been enabled, an Auction Nudge box will appear on your edit page/post admin pages underneath the content editor. This box enables you to specify the desired options for the Your eBay Listings, Your eBay Profile and Your eBay Feedback tools.

Once you have set the desired options, you can add the Auction Nudge `[auction-nudge]` shortcode to your page/post to specify where the content is displayed.

Each Auction Nudge tool has it's own shortcode format:

`<!-- To display Your eBay Listings -->
[auction-nudge tool="listings"]

<!-- To display Your eBay Profile -->
[auction-nudge tool="profile"]

<!-- To display Your eBay Feedback -->
[auction-nudge tool="feedback"]`

= How do I use the plugin from within theme files? =

As well as adding Auction Nudge content to your pages/posts using the `[auction-nudge]` shortcode you can also call the plugin directly from your theme files.

To use this feature, generate your code snippets from the <a target="_blank" href="http://www.auctionnudge.com">Auction Nudge website</a> and paste them in to the appropriate boxes in the <em>Settings &gt; Auction Nudge &gt; Within Your Theme</em> page. You can then use the following functions to add Auction Nudge within your theme files:

`/* To display Your eBay Listings */
<?php an_items(); ?>

/* To display Your eBay Profile */
<?php an_profile(); ?>

/* To display Your eBay Feedback */
<?php an_feedback(); ?>`


= How Can I Modify The Appearance Of Auction Nudge? =

As well as choosing from different themes when you generate your Auction Nudge code you can also change the appearance using simple CSS rules. Auction Nudge will automatically use the default CSS rules for your web page, for example the default font and link colours so it integrates nicely with your page.

You can change the CSS rules for Auction Nudge by adding them to the Auction Nudge CSS Rules section of the plugin options page. See the Auction Nudge <a href="http://www.auctionnudge.com/help#faq-css">Help page</a> for more information and examples.

As a quick example, to make all of the product titles bold you would add this rule to your style sheet :

`div#auction-nudge-items td.title {
  font-weight: bold;
}`

To change the alternating background colours when displaying rows of items you would add this rule to your style sheet :

`div#auction-nudge-items table.columns tr {
  background-color: red;  /* Change to desired colour */
}
div#auction-nudge-items table.columns tr.alt {
  background-color: blue;  /* Change to desired colour */
}`

All themes can be adjusted in this way.

= Where can I find more help? =

Lots more help can be found at the Auction Nudge <a href="http://www.auctionnudge.com/help">Help page</a>.


== Screenshots ==

1. Once installed on your site, Auction Nudge will display your active eBay information and will update automatically.
2. Options for the Your eBay Listings tool
3. Options for the Your eBay Profile tool
4. Options for the Your eBay Feedback tool
5. The General settings page
6. The Within Your Theme settings page

== Changelog ==

= 2.1 =
Fixed bug with special characters in seller IDs. Thanks Jon-Paul for pointing this out to me.

= 2.0 =
* Plugin completely rewritten
* Your eBay Listing, Your eBay Profile and Your eBay Feedback tools can now be added through the page/post edit page
* Allows for feeds to be created on a page-by-page basis, useful if you require multiple item feeds

= 1.0 =
* Minor updates
* Plugin hosted on WordPress Plugin Directory

= 0.2 =
Added the ability to specify custom CSS rules within the plugin to modify the appearance of Auction Nudge.

= 0.1 =
WordPress plugin released.