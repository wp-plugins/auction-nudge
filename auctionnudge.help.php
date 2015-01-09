<div id="an-help-popup">
	<h1>Auction Nudge Help</h1>

	<p><a target="_blank" href="https://www.youtube.com/watch?v=smamgdwCD74">Watch the plugin tutorial</a> or refer to the full Auction Nudge <a target="_blank" href="https://www.auctionnudge.com/help">help/FAQ page</a> for much more help.</p>

	<h2>How do I add Auction Nudge to my pages / posts?</h2>
	
	<p>Once the plugin has been enabled, an Auction Nudge box will appear on your edit page/post admin pages underneath the content editor. This box enables you to specify the desired options for the Your eBay Listings, Your eBay Profile and Your eBay Feedback tools.</p>

	<p>Once you have set the desired options, you can add the Auction Nudge <code>[auction-nudge]</code> shortcode to your page/post to specify where the content is displayed.</p>
	
	<p>Each Auction Nudge tool has it's own shortcode format:</p>

<pre>
&lt;!-- To display Your eBay Listings --&gt;
[auction-nudge tool="listings"]

&lt;!-- To display Your eBay Ads --&gt;
[auction-nudge tool="ads"]

&lt;!-- To display Your eBay Profile --&gt;
[auction-nudge tool="profile"]

&lt;!-- To display Your eBay Feedback --&gt;
[auction-nudge tool="feedback"]
</pre>

	<h2>How do I use the plugin from within theme files?</h2>
		
	<p>As well as adding Auction Nudge content to your pages/posts using the <code>[auction-nudge]</code> shortcode you can also call the plugin directly from your theme files.</p>
	
	<p>To use this feature, generate your code snippets from the <a target="_blank" href="https://www.auctionnudge.com">Auction Nudge website</a> and paste them in to the appropriate boxes in the <em>Settings &gt; Auction Nudge &gt; Within Your Theme</em> page. You can then use the following functions to add Auction Nudge within your theme files:</p>
		
<pre>
/* To display Your eBay Listings */
&lt;?php an_items(); ?&gt;

/* To display Your eBay Profile */
&lt;?php an_profile(); ?&gt;

/* To display Your eBay Feedback */
&lt;?php an_feedback(); ?&gt;
</pre>		
		
	<h2>How Can I Modify The Appearance Of Auction Nudge?</h2>
		
	<p>As well as choosing from different themes when you generate your Auction Nudge code you can also change the appearance using simple CSS rules. Auction Nudge will automatically use the default CSS rules for your web page, for example the default font and link colours so it integrates nicely with your page.</p>
	
	<p>You can change the CSS rules for Auction Nudge by adding them to the Auction Nudge CSS Rules section of the plugin options page. See the Auction Nudge <a href="https://www.auctionnudge.com/help#faq-css">Help page</a> for more information and examples.</p>
	
	<p>As a quick example, to make all of the product titles bold you would add this rule to your style sheet:</p>
		
<pre>
div#auction-nudge-items td.title {
  font-weight: bold;
}
</pre>
		
	<p>To change the alternating background colours when displaying rows of items you would add this rule to your style sheet:</p>
		
<pre>
div#auction-nudge-items table.columns tr {
  background-color: red;  /* Change to desired colour */
}
div#auction-nudge-items table.columns tr.alt {
  background-color: blue;  /* Change to desired colour */
}
</pre>
		
	<p>All themes can be adjusted in this way.</p>

	<h2>How Often Does Auction Nudge Update?</h2>

	<p>To reduce server load, Auction Nudge does not update every time it is loaded on your site. The tools update as follows:</p>
	
	<ul>
    <li><b>Your eBay Listings</b> &ndash; updates every 15 minutes</li>
    <li><b>Your eBay Ads</b> &ndash; updates every 15 minutes</li>
    <li><b>Your eBay Profile</b> &ndash; updates every 6 hours</li>
    <li><b>Your eBay Feedback</b> &ndash; updates every 6 hours</li>
	</ul>
	
	<h2>Need More Help?</h2>
	
	<p>The following links should help with most questions and issues:</p>
	
	<ul>
		<li>Watch the <a target="_blank" href="https://www.youtube.com/watch?v=smamgdwCD74">plugin screencast tutorial</a></li>
		<li>Read through the <a target="_blank" href="https://www.auctionnudge.com/help">Help/FAQ page</a></li>
		<li>Read through the <a target="_blank" href="https://www.auctionnudge.com/customize">Customize page</a></li>	
	</ul>
	
	<p>If you still require assistance, please feel free to <a target="_blank" href="https://www.auctionnudge.com/contact">get in touch</a>. Be sure to include a link to your site where you have the plugin installed so I can investigate further.</p>
</div>	