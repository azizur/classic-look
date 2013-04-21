<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<head profile="http://gmpg.org/xfn/11">
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php wp_title( ' - ', true, 'right' ); ?></title>
    <meta name="description" content="A website dedicated to Islam &#038; Productivity. Our vision is to revive Productivity in our Ummah through lessons extracted from the Quran, Seerah, history of the Islamic Civilization, and in collating tips and tools to equip you with a productive lifestyle!" />
    <meta name="keywords" content="Productive Muslim, ProductiveMuslim, Islam, Productivity, Productive Lifestyle" />
    <!--[if lte IE 8]><link rel="stylesheet" href="ie.css" type="text/css" media="screen, projection" /><![endif]-->
    <link rel="alternate" type="application/rss+xml" title="Productive Muslim RSS Feed" href="http://feeds.feedburner.com/ProductiveMuslim" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php wp_head(); ?>
</head>
<body class="custom">
<div id="header_area" class="full_width">
<div class="page">
    <?php render_top_navigation_menu(); ?>
    
    <form method="get" class="search_form_image_button" action="<?php bloginfo( 'url' ); ?>">
        <p><input class="text_input" type="text" name="s" id="s" placeholder="Search site" /></p>
    </form>

<div class="header-container">
    <div class="header-container-left">
        <div class="header-container-left-logo">
            <a href="<?php bloginfo( 'url' ); ?>">
                <img src="<?php echo get_image_uri('prom-logo.png'); ?>" alt="<?php bloginfo( 'name' ); ?>" />
            </a>
        </div>
        <!-- header-container-left-logo -->
        <div class="header-container-left-slogan">
            <a href="<?php bloginfo( 'url' ); ?>">
                <img src="<?php echo get_image_uri('towards-a-productive-ummah.png'); ?>" alt="<?php bloginfo( 'description' ); ?>" />
            </a>
        </div>
        <!-- header-container-left-slogan -->
    </div><!-- header-container-left -->
    <div class="header-container-right">

    <!-- OptinSkin -->
    <div class="ois_wrapper " data="1"data-popup-scroll="100px"style="" id="ois_1" rel="homepage">
        <div class="topnewsletter-container">
        <div class="topnewsletter-container-left">
            <div class="topnewsletter-container-left-title">
                Subscribe to Productivity Tips
            </div><!-- topnewsletter-container-left-title -->
            <div class="topnewsletter-container-left-form">
                <form method="post" action="http://www.aweber.com/scripts/addlead.pl" id="ois_1_form">
                    <input type="hidden" name="meta_web_form_id" value="702775531" />
                    <input type="hidden" name="meta_split_id" value="" />
                    <input type="hidden" name="listname" value="prom-newsletter" />
                    <input type="hidden" name="redirect" value="http://www.productivemuslim.com/check-your-email/" id="redirect_2c8f76f1d260dce1049db2afd89ecdbb" />
                    <input type="hidden" name="meta_redirect_onlist" value="http://www.productivemuslim.com/thanks-for-signing-up-for-email-updates/" />
                    <input type="hidden" name="meta_adtracking" value="Header" />
                    <input type="hidden" name="meta_message" value="1001" />
                    <input type="hidden" name="meta_required" value="email" />
                    <input type="hidden" name="meta_required" value="name" />
                    <input type="hidden" name="meta_tooltip" value="" />
                    Subscribe to our newsletter to receive productivity tips
                    <br />
                    <div class="topnewsletter-container-left-form-input">
                        <input type="text" name="name" class="inputemail" placeholder="Full Name" value="">
                        <input type="text" name="email" class="inputemail"  placeholder="Email Address" value="">
                        <br/>
                        <button name="submit"  type="submit">Get Productivity Tips</button>
                    </div><!-- topnewsletter-container-left-form-input -->
                </form>
            </div><!-- topnewsletter-container-left-form -->
        </div><!-- topnewsletter-container-left -->
        <div class="topnewsletter-container-right">
            <img align="right" src="<?php echo get_image_uri('join-us-now.png'); ?>" />
        </div><!-- topnewsletter-container-right -->
    </div><!-- topnewsletter-container -->
    </div>
    <!-- End OptinSkin -->
    </div><!-- header-container-right -->
</div><!-- header-container -->

<div id="header">
    <? render_primary_navigation_menu(); ?>
</div>
</div>
</div>
<div id="content_area" class="full_width">
<div class="page">
	<div id="content_box">
		<div id="content" class="hfeed">
                    
                    <?php if ( have_posts() ) : ?>

                        <?php /* The loop */ ?>
                        <?php while ( have_posts() ) : the_post(); ?>
                                <?php get_template_part( 'content', get_post_format() ); ?>
                        <?php endwhile; ?>

                        <?php prom_paging_nav(); ?>

                    <?php else : ?>
                            <?php get_template_part( 'content', 'none' ); ?>
                    <?php endif; ?>
                    
                </div>

		<div id="sidebars">
			<div id="sidebar_1" class="sidebar">
				<ul class="sidebar_list">
                                    <li class="widget widget_text" id="text-4"><h3>New Visitor?</h3>			<div class="textwidget"><div class="start-here-sidebar">
    <a onclick="_gaq.push(['_trackEvent','StartHere-Banner-Sidebar','Visited Start Here Page from Sidebar','Widget-Sidebar-StartHere',,false]);" href="http://www.productivemuslim.com/start-here/">
        <img width="90" height="90" src="<?php echo get_image_uri('start-here.png'); ?>" alt="Start Here | Productive Muslim"> Visiting our site for the first time? Explore our A-Z guide to read, follow and watch.</a>
</div></div>
		</li>
                                    <li class="widget widget_text" id="text-9"><h3>FREE EBOOK!</h3>			<div class="textwidget"><p class="sidebar-skin-intro">Subscribe to our weekly newsletter and receive a <strong>free copy of our eBook</strong> "The Very Best of ProductiveMuslim"</p>
<form method="post" class="af-form-wrapper" action="http://www.aweber.com/scripts/addlead.pl" id="ois_10_form">
<input type="hidden" name="meta_web_form_id" value="1329104675" />
<input type="hidden" name="meta_split_id" value="" />
<input type="hidden" name="listname" value="prom-newsletter" />
<input type="hidden" name="redirect" value="http://www.productivemuslim.com/check-your-email/" id="redirect_9fa3445f6660575bc1f60b50a42a83f0" />
<input type="hidden" name="meta_redirect_onlist" value="http://www.productivemuslim.com/thanks-for-signing-up-for-email-updates/" />
<input type="hidden" name="meta_adtracking" value="Widget-Sidebar" />
<input type="hidden" name="meta_message" value="1001" />
<input type="hidden" name="meta_required" value="email" />
<input type="hidden" name="meta_tooltip" value="" />
<p>
<input id="awf_field-44506975" type="text" name="name" class="inputemail" placeholder="Full Name" value="">
<input id="awf_field-44506976" type="email" name="email" class="inputemail" pattern="[^ @]*@[^ @]*" value="" placeholder="Your Email Address">
</p>
<p class="sidebar-skin-submit">
<button name="submit" type="submit" tabindex="502">DOWNLOAD Free eBook</button>
</p>
</form>
</div></div>
		</li>				</ul>
			</div>
		</div>
	</div>
</div>
</div>
<div id="footer_area" class="full_width">
<div class="page">
<div id="prefootx">
    <div class="preFootn-container">
	<div class="preFootn-title-container">
	    <h3 class="preFootn-title">About us</h3>
	    <h3 class="preFootn-title">Resources</h3>
	    <h3 class="preFootn-title">Other projects</h3>
	    <h3 class="preFootn-title" id="fourth">Newsletter</h3>
	</div>
	<div class="preFootn" id="first">
	    <div class="textpreFootn">
		ProductiveMuslim.com is a brand that inspires young Muslims to become Productive through Islam and applying the latest productivity techniques.
		<br /><br />
		Join us, Discuss with us, and share with us your thoughts, let us all work together towards a Productive Ummah!
	    </div>
	</div><!-- #first .preFootn-area -->
	<div class="preFootn" id="second">
	    <ul>
		<li><a target="_top" href="/the-daily-taskinator/">Daily Taskinator</a>: Your one-sheet hack to getting tasks done.</li>
		<li><a target="_top" href="/the-weekly-taskinator">Weekly Taskinator</a>: Know your projects each day of the week. </li>
		<li><a target="_top" href="/the-productivemuslim-habitator">ProductiveMuslim Habitator</a>: Build good habits or destroy them with our habitator.</li>
		<li><a target="_top" href="/category/resources/wallpapers">ProductiveMuslim Wallpaper</a>: Inspire yourself with our wallpaper design.</li>
	    </ul>
	</div><!-- #second .preFootn-area -->
	<div class="preFootn" id="third">
	    <ul>
		<li><a target="_top" href="http://www.productiveramadan.com/">Productive Ramadan</a></li>
		<li><a target="_top" href="http://www.1000gooddeeds.com/">1000 Good Deeds</a></li>
	    </ul>
	</div><!-- #third .preFootn-area -->
	<div class="preFootn" id="fourth">
	    <!-- OptinSkin -->
	<div class="ois_wrapper " data="4"data-popup-scroll="100px"style="" id="ois_4" rel="homepage"><div class="footerwidget">
<form action="http://www.aweber.com/scripts/addlead.pl" method="post" id="ois_1_form">

<input type="hidden" name="meta_web_form_id" value="1295039521" />
<input type="hidden" name="meta_split_id" value="" />
<input type="hidden" name="listname" value="prom-newsletter" />
<input type="hidden" name="redirect" value="http://www.productivemuslim.com/check-your-email/" id="redirect_761be8407ff3d734133d6afa8840bf7e" />
<input type="hidden" name="meta_redirect_onlist" value="http://www.productivemuslim.com/thanks-for-signing-up-for-email-updates/" />
<input type="hidden" name="meta_adtracking" value="Footer" />
<input type="hidden" name="meta_message" value="1001" />
<input type="hidden" name="meta_required" value="name" />
<input type="hidden" name="meta_required" value="email" />
<input type="hidden" name="meta_tooltip" value="" />

	Subscribe to our e-PRO newsletter for exclusive productivity content:
	<br /><br />
	<div align="center">
        <input type="text" name="name" class="inputemail" placeholder="Full Name" value=""><br />
	<input id="awf_field-36046023" type="text" name="email" value="" class="inputemail" placeholder="Email Address"  />
	<br />
	<button name="submit" type="submit">JOIN NOW</button>
        <br /><br />
	<img src="http://forms.aweber.com/form/ci/?tc=ffffff&bg=c66617&d=TMyszByMbD6C6qZGpk4%2BzKycHMzsLKw%3D" alt="Subscriber Counter" />
	</div>
</form>
</div></div>
		<!-- End OptinSkin -->

</div><!-- #fourth .preFootn-area -->
    </div><!-- #preFootn-container -->
    <div id="footerEndn">
        <div id="footerEndSocial">
	    <a target="_top" href="https://plus.google.com/116458704759826710405/posts" onClick="_gaq.push(['_trackEvent','G+Button-Footer','Visited G+ Page from Footer','Widget-Footer-StayInTouch',,false]);"><img alt="ProductiveMuslim Google Plus" src="<?php echo get_image_uri('googleplus.png'); ?>"></a>
	    <a target="_top" href="http://www.facebook.com/ProductiveMuslim" onClick="_gaq.push(['_trackEvent','FaceBook-Button-Footer','Visited Facebook Page from Footer','Widget-Footer-StayInTouch',,false]);"><img alt="ProductiveMuslim Facebook" src="<?php echo get_image_uri('facebook.png'); ?>"></a>
	    <a target="_top" href="http://twitter.com/AbuProductive" onClick="_gaq.push(['_trackEvent','Twitter-Button-Footer','Visited Twitter Page from Footer','Widget-Footer-StayInTouch',,false]);"><img alt="ProductiveMuslim Twitter" src="<?php echo get_image_uri('twitter.png'); ?>"></a>
	    <a target="_top" href="http://www.youtube.com/ProductiveMuslim" onClick="_gaq.push(['_trackEvent','YouTube-Button-Footer','Visited YouTube Page from Footer','Widget-Footer-StayInTouch',,false]);"><img alt="ProductiveMuslim Youtube" src="<?php echo get_image_uri('youtube.png'); ?>"></a>
	    <a target="_top" href="http://feeds.feedburner.com/ProductiveMuslim" onClick="_gaq.push(['_trackEvent','RSSfeed-Button-Footer','Visited RSS Feed Page from Footer','Widget-Footer-StayInTouch',,false]);"><img alt="ProductiveMuslim RSS" src="<?php echo get_image_uri('rss.png'); ?>"></a>
	</div>
	<div id="footerEndCopyright">
	    <a href="/about/">About</a> | <a href="/site-map/">Site Map</a> | <a href="/privacy-policy/">Privacy Policy</a> |  <a href="/terms-of-service/">Terms of Service</a> |  <a href="/refund-policy/">Refund Policy</a> | <a href="/contact-us">Contact</a> | &copy; 2008-2013 ProductiveMuslim.com
	</div>
    </div><!-- #footerEnd -->
</div><!-- #prefooterx -->

</div>
</div>
<!--[if lte IE 8]>
<div id="ie_clear"></div>
<![endif]-->

<?php wp_footer(); ?>
<script type="text/javascript">
jQuery(document).ready(
    function(){
        var q2w3_sidebar_options = { "sidebar" : "q2w3_default", "margin_top" : 10, "margin_bottom" : 0, "widgets" : ['text-9'] };
        setInterval(function () { q2w3_sidebar(q2w3_sidebar_options); }, 1000);
    }
);
</script>
</body>
</html>