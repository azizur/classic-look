<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
    <head profile="http://gmpg.org/xfn/11">
        <meta charset="<?php bloginfo('charset'); ?>" />
        <title><?php wp_title(' - ', true, 'right'); ?></title>
        <meta name="description" content="A website dedicated to Islam &#038; Productivity. Our vision is to revive Productivity in our Ummah through lessons extracted from the Quran, Seerah, history of the Islamic Civilization, and in collating tips and tools to equip you with a productive lifestyle!" />
        <meta name="keywords" content="Productive Muslim, ProductiveMuslim, Islam, Productivity, Productive Lifestyle" />
        <!--[if lte IE 8]><link rel="stylesheet" href="ie.css" type="text/css" media="screen, projection" /><![endif]-->
        <link rel="alternate" type="application/rss+xml" title="Productive Muslim RSS Feed" href="http://feeds.feedburner.com/ProductiveMuslim" />
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <?php wp_head(); ?>
    </head>
    <body class="custom">
        <div id="header_area" class="full_width">
            <div class="page">
                <?php render_prom_top_navigation_menu(); ?>

                <form method="get" class="search_form_image_button" action="<?php bloginfo('url'); ?>">
                    <p><input class="text_input" type="text" name="s" id="s" placeholder="Search site" /></p>
                </form>

                <div class="header-container">
                    <div class="header-container-left">
                        <div class="header-container-left-logo">
                            <a href="<?php bloginfo('url'); ?>">
                                <img src="<?php echo get_image_uri('prom-logo.png'); ?>" alt="<?php bloginfo('name'); ?>" />
                            </a>
                        </div>
                        <!-- header-container-left-logo -->
                        <div class="header-container-left-slogan">
                            <a href="<?php bloginfo('url'); ?>">
                                <img src="<?php echo get_image_uri('towards-a-productive-ummah.png'); ?>" alt="<?php bloginfo('description'); ?>" />
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
                                                            <? render_prom_primary_navigation_menu(); ?>
                                                        </div>
                                                        </div>
                                                        </div>