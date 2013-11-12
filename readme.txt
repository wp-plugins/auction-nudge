=== Auction Nudge ===
Contributors: morehawes
Tags: Auction Nudge, eBay, widget, integration, listings, items, profile, feedback
Requires at least: 2.7
Tested up to: 3.7.1
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin enables you to embed your live eBay information on your WordPress site using Auction Nudge.

== Description ==

This plugin enables you to embed your live eBay information on your WordPress site using <a href="http://www.auctionnudge.com/">Auction Nudge</a>. Auction Nudge is a set of free widgets to integrate eBay into your own website. If you sell on eBay you can include Your eBay Listings, Your eBay Profile and Your eBay Feedback on your site by installing one line of code.

== Installation ==

Quick instructions:

1. Once the plugin is installed, paste your Auction Nudge code snippet obtained from http://www.auctionnudge.com into the Auction Nudge settings tab in the admin area.
2. Add the required tag as shown below into the post or page content.
3. Update or publish the page and Auction Nudge will now display on your site!

Tags (to be added to a page/post through the editor) :

`/* To display Your eBay Listings */
[an_items]

/* To display Your eBay Profile */
[an_profile]

/* To display Your eBay Feedback */
[an_feedback]`

Detailed instructions:

1. To start, generate your Auction Nudge code snippet through the Auction Nudge website. For example to display your Your eBay Listings, you would go to the tool page (http://www.auctionnudge.com/your-ebay-items) and enter your settings (i.e. your eBay username and eBay site).
2. Copy the code snippet, displayed under "Copy the code snippet onto your site".
3. Go to the Auction Nudge settings tab in the WordPress admin area.
4. Paste in the code snippet into the appropriate box. For example under Your eBay Listings where it states 'Insert code snippet'.
5. Click 'Save Settings' at the bottom of the page.
6. Go to edit a page or post and using the editor insert the appropriate tag (`[an_items]`, `[an_profile]`, `[an_feedback]`) where you would like Auction Nudge to appear.
7. Update or publish the page and Auction Nudge will now display on your site!

== Frequently Asked Questions ==

= How do I use the plugin from within theme files? =

As well as placing the plugin tags within the page or post content you can also call the plugin directly from your theme files using the following functions:

`/* To display Your eBay Listings */
<?php an_items(); ?>

/* To display Your eBay Profile */
<?php an_profile(); ?>

/* To display Your eBay Feedback */
<?php an_feedback(); ?>`


= How Can I Modify The Appearance Of Auction Nudge? =

As well as choosing from different themes when you generate your Auction Nudge code you can also change the appearance using simple CSS rules. Auction Nudge will automatically use the default CSS rules for your web page, for example the default font and link colours so it integrates nicely with your page.

You can change the CSS rules for Auction Nudge by adding them to the Auction Nudge CSS Rules section of the plugin options page. See the Auction Nudge <a href="http://www.auctionnudge.com/help">Help page</a> for more information and examples.

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
2. Inserting Auction Nudge on your page is as simple as including a tag on your page e.g. `[an_items]`
3. To get up and running visit the <a href="http://www.auctionnudge.com">Auction Nudge</a> site to obtain your code snippet and paste it in to the plugin options page.


== Changelog ==

= 1.0 =
* Minor updates
* Plugin hosted on WordPress Plugin Directory

= 0.2 =
Added the ability to specify custom CSS rules within the plugin to modify the appearance of Auction Nudge.

= 0.1 =
WordPress plugin released.