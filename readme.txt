=== Auction Nudge - eBay on your own site ===
Contributors: morehawes
Tags: Auction Nudge, auctionnudge.com, eBay, plugin, widget, widgets, embed, sidebar, integrate, integration, listings, item, items, pagination, profile, feedback, free, products, ad, ads, adverts, banner, banners, shop, store, advertise, advertising, on your own site, automatic, automatically, update, category, keywords, seller, user, username, links, images, pictures, international, US, UK, Canada, Australia, Belgium, Germany, France, Spain, Austria, Italy, Netherlands, Ireland, Switzerland, ebay.com, ebay.co.uk, ebay.ca, ebay.com.au, ebay.be, ebay.de, ebay.fr, ebay.at, ebay.it, ebay.nl, ebay.ie, ebay.pl, ebay.es, ebay.ch
Requires at least: 2.8
Tested up to: 4.2
Stable tag: 4.1.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Embed your live eBay listings, profile and feedback information on your site in just a few clicks.

== Description ==

This plugin enables you to embed your live eBay information on your WordPress site using <a href="https://www.auctionnudge.com/">Auction Nudge</a>. Once installed, all tools will update automatically to display your most recent eBay information. The following tools are available to integrate eBay into your own website:

* **Your eBay Listings** - displays your active items, with lots of options and filters to choose from. Show up to 100 items per page, and navigate multiple pages
* **Your eBay Ads** - displays your current listings in an interactive banner ad, with different sizes and colours to choose from
* **Your eBay Profile** - displays your eBay profile information like feedback rating and date of registration as a badge
* **Your eBay Feedback** - displays your most recent feedback comments

This plugin allows you to add Auction Nudge within your posts and pages using shortcodes, as widgets or directly from within your theme.

**Most common issues are solved by reading the <a target="_blank" href="https://www.auctionnudge.com/help">Help</a> page. Bugs and errors can be reported <a target="_blank" href="https://www.auctionnudge.com/contact">here</a>. Please do this before leaving a poor review.**

Available for the following international eBay sites:

* eBay US
* eBay UK
* eBay Canada
* eBay Australia
* eBay Belgium
* eBay Germany
* eBay France
* eBay Spain
* eBay Austria
* eBay Italy
* eBay Netherlands
* eBay Ireland
* eBay Switzerland

The following options are available for the Your eBay Listings tool:

= Feed options =

* eBay username
* eBay user ID
* eBay site

= Display options =

* Customise your feed
* Theme
* Number of items to show
* Show multiple pages?
* Number of items to scroll
* Item width
* Auto scroll
* Grid columns
* Grid width
* Show eBay Logo?
* Open links in new tab?
* Image size

= Advanced options =

* Sort order
* Filter by keyword
* Filter by category ID

*Auction Nudge is not owned or operated by eBay Inc. eBay and the eBay logo are trademarks of eBay Inc. As a member of the eBay Partner Network we may receive anonymous referral commissions from eBay if a successful transaction occurs after clicking an Auction Nudge link to eBay, at no cost to the user.*

== Installation ==

**Most common issues are solved by reading the <a target="_blank" href="https://www.auctionnudge.com/help">Help</a> page. Bugs and errors can be reported <a target="_blank" href="https://www.auctionnudge.com/contact">here</a>. Please do this before leaving a poor review.**

[youtube https://www.youtube.com/watch?v=smamgdwCD74]

Once you have installed and activated the plugin you are able to add your eBay information in a number of ways:

= Within your pages/ posts =

1. On the edit page/post admin pages specify the desired options in the Auction Nudge box which appears 
2. You can then specify where the content is output using the Auction Nudge `[auction-nudge]` shortcode.
3. Update or publish the page and Auction Nudge will now display on your site!

Shortcodes (to be added to a page/post through the content editor) :

`<!-- To display Your eBay Listings -->
[auction-nudge tool="listings"]

<!-- To display Your eBay Ads -->
[auction-nudge tool="ads"]

<!-- To display Your eBay Profile -->
[auction-nudge tool="profile"]

<!-- To display Your eBay Feedback -->
[auction-nudge tool="feedback"]`

= As widgets =

Once the plugin is activated, Auction Nudge widgets for each tool will appear on the *Appearance > Widgets* page. Here you can create widgets with the full range of options and add them to widgetized areas specified in your theme.

= From within your theme =

As well as adding Auction Nudge content to your pages/posts using the `[auction-nudge]` shortcode you can also call the plugin directly from your theme files.

To use this feature, generate your code snippets from the <a target="_blank" href="https://www.auctionnudge.com">Auction Nudge website</a> and paste them in to the appropriate boxes in the <em>Settings &gt; Auction Nudge &gt; Within Your Theme</em> page. You can then use the following functions to add Auction Nudge within your theme files:

`/* To display Your eBay Listings */
<?php an_items(); ?>

/* To display Your eBay Profile */
<?php an_profile(); ?>

/* To display Your eBay Feedback */
<?php an_feedback(); ?>`

Multiple <a target="_blank" href="https://www.auctionnudge.com/your-ebay-ads">Your eBay Ads</a> code snippets can be generated on the Auction Nudge website and pasted directly into your theme files.

= Nothing displaying? =

A common reason for Auction Nudge not loading is the use of ad blocking browser plugins (like Adblock Plus). If you are using such a plugin, disable it, or add an exception to see if Auction Nudge loads without it.

== Frequently Asked Questions ==

**Most common issues are solved by reading the <a target="_blank" href="https://www.auctionnudge.com/help">Help</a> page. Bugs and errors can be reported <a target="_blank" href="https://www.auctionnudge.com/contact">here</a>. Please do this before leaving a poor review.**

You can also <a href="https://wordpress.org/plugins/auction-nudge/installation/">watch the plugin tutorial</a> to ensure you have the plugin set up correctly.

= Auction Nudge isn't loading, what's wrong? =

A common reason for Auction Nudge not loading is the use of ad blocking browser plugins (like Adblock Plus). If you are using such a plugin, disable it, or add an exception to see if Auction Nudge loads without it.

Another reason for Auction Nudge failing to load on your page is Javascript errors from other scripts. You can check for these in your browser's error console.

= How do I add Auction Nudge to my pages / posts? =

Once the plugin has been enabled, an Auction Nudge box will appear on your edit page/post admin pages underneath the content editor. This box enables you to specify the desired options for the Your eBay Listings, Your eBay Profile and Your eBay Feedback tools.

Once you have set the desired options, you can add the Auction Nudge `[auction-nudge]` shortcode to your page/post to specify where the content is displayed.

Each Auction Nudge tool has it's own shortcode format:

`<!-- To display Your eBay Listings -->
[auction-nudge tool="listings"]

<!-- To display Your eBay Ads -->
[auction-nudge tool="ads"]

<!-- To display Your eBay Profile -->
[auction-nudge tool="profile"]

<!-- To display Your eBay Feedback -->
[auction-nudge tool="feedback"]`

= How do I use the plugin from within theme files? =

As well as adding Auction Nudge content to your pages/posts using the `[auction-nudge]` shortcode you can also call the plugin directly from your theme files.

To use this feature, generate your code snippets from the <a target="_blank" href="https://www.auctionnudge.com">Auction Nudge website</a> and paste them in to the appropriate boxes in the <em>Settings &gt; Auction Nudge &gt; Within Your Theme</em> page. You can then use the following functions to add Auction Nudge within your theme files:

`/* To display Your eBay Listings */
<?php an_items(); ?>

/* To display Your eBay Profile */
<?php an_profile(); ?>

/* To display Your eBay Feedback */
<?php an_feedback(); ?>`


= How can I modify the appearance of Auction Nudge? =

As well as choosing from different themes when you generate your Auction Nudge code you can also change the appearance using simple CSS rules. Auction Nudge will automatically use the default CSS rules for your web page, for example the default font and link colours so it integrates nicely with your page.

You can change the CSS rules for Auction Nudge by adding them to the Auction Nudge CSS Rules section of the plugin options page. See the Auction Nudge <a href="https://www.auctionnudge.com/customize">Customize page</a> for more information and examples.

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

= How often does Auction Nudge update? =

To reduce server load, Auction Nudge does not update every time it is loaded on your site. The tools update as follows:

* Your eBay Listings – updates every 15 minutes
* Your eBay Ads – updates every 15 minutes
* Your eBay Profile – updates every 6 hours
* Your eBay Feedback – updates every 6 hours

= How is such an awesome tool free? =

Auction Nudge funds itself through referral commissions from eBay. As a member of the eBay Partner Network we may receive anonymous commissions from eBay if a successful transaction occurs after clicking an Auction Nudge link to eBay, at no cost to the user.

This means Auction Nudge is free to use and there are no 'pay to unlock' type restrictions and no signups - just obtain your code snippet and install it on your site!

= Where can I find more help? =

The following links should help with most questions and issues:
	
* Watch the <a href="https://wordpress.org/plugins/auction-nudge/installation/">plugin screencast tutorial</a>
* Read through the <a target="_blank" href="https://www.auctionnudge.com/help">Help/FAQ page</a>
* Read through the <a target="_blank" href="https://www.auctionnudge.com/customize">Customize page</a>

== Screenshots ==

1. Once installed on your site, Auction Nudge will display your active eBay information and will update automatically
2. Widgets available for all tools. The Your eBay Ads and Your eBay Profile tools are shown here
3. Show your recent eBay feedback, which automatically updates when you receive a new comment
4. Options for the Your eBay Listings tool
5. Options for the Your eBay Ads tool
6. Options for the Your eBay Profile tool
7. Options for the Your eBay Feedback tool
8. The General settings page, allowing you to set the default eBay user ID and add custom CSS rules
9. The Within Your Theme settings page, allowing you to use the plugin from within your theme

== Changelog ==

= 4.1.2 =

Minor text updates

= 4.1.1 =

Minor text updates

= 4.1 =

Added 'Responsive' theme to the Your eBay Listings tool

= 4.0.3 = 

Fixed minor WordPress admin JavaScript bug which was causing conflicts with some other plugins. Thanks to Tamara for bringing this to my attention.

= 4.0.2 = 

Minor plugin user interface improvements.

= 4.0.1 = 

Fixed bug with setting the eBay site. Thanks to legacy_dzynes for bringing this to my attention on the support forum.

= 4.0 =
* **Pagination** – there is no longer a limit to the total number of items Auction Nudge can display using the Your eBay Listings tool. Each page can show up to 100 items at once, if you have more listed "Previous" and "Next" buttons will allow users to navigate through multiple pages. Use the "Show multiple pages?" option to enable this feature
* **Larger images** – Your eBay Listings item image sizes can now be increased up to 500px x 500px using the "Image Size" option (the previous maximum was 140px x 140px)
* **Reduced cache time** – the Your eBay Listings and Your eBay Ads tools now automatically update 4 times more frequently. These tools now update every 15 minutes (was previously every 60 minutes)
* New 'Profile Table' theme added to the Your eBay Feedback tool

= 3.2 =
* Made wording on Settings page a little clearer
* Added 'Open links in new tab?' option to Your eBay Listings, Your eBay Profile and Your eBay Feedback tools

= 3.1 =
Fixed issue with older versions of PHP which do not suport anonymous functions. Thanks Jeff for pointing this out to me.

= 3.0 =
* Added <a href="https://www.auctionnudge.com/your-ebay-ads">Your eBay Ads</a> tool to plugin
* All tools now available as widgets
* Added eBay Switzerland support
* Small tweaks and bug fixes

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

== Upgrade Notice ==

= 4.0.1 = 

Fixed bug with setting the eBay site. This bug fix is recommended for all users

= 4.0 =
A major update with lots of new features: faster feed updates, multiple pages of items, larger item images and more