<?php

global $prom_theme;

if ( ! isset( $content_width ) ) {
	$content_width = 640;
}

if ( ! is_a( $prom_theme, 'WP_Theme' ) ) {
	$prom_theme = wp_get_theme();
}

// add Productive Muslim Styles
function prom_styles() {
	global $prom_theme;

	$styles = array(
		array( 'css' => 'core.css' ),
		array( 'css' => 'layout.css' ),
		array( 'css' => 'ie.css', 'deps' => array( 'prom-safe' ), 'extra' => array( 'conditional', 'lte IE 7' ) ),
		array( 'css' => 'custom.css' ),
		array( 'css' => 'genericons.css' ),
		array( 'css' => 'safe.css', 'deps' => array( 'prom-genericons' ) ),
	);

	if ( is_single() ) {
		$styles[] = array( 'css' => 'comments.css' );
	}

	foreach( $styles as $style ) {
		$css = '';
		$deps = $extra = array();

		extract( $style, EXTR_OVERWRITE );

		$style_url = get_stylesheet_directory_uri() . '/css/' . $css;

		$handle = 'prom-' . str_replace( '.css', '', $css );
		$src = esc_url_raw( $style_url );
		$ver = $prom_theme->Version;
		$media = 'all';

		wp_enqueue_style( $handle, $src, $deps, $ver, $media );

		if ( count( $extra ) ) {
			global $wp_styles;
			list( $key, $value ) = $extra;
			$wp_styles->add_data( $handle, $key, $value );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'prom_styles' );


// add Productive Muslim scripts
function prom_scripts() {
    global $prom_theme;
    
    $scripts = array(
        array('core.js', array('jquery')),
        array('abalytics.js', array()),
        array('multivariate-tests.js', array()),
        array('crazyegg.js', array()),
    );
    
    foreach($scripts as $script) {
        
        list($js,$deps) = $script;
        
        $style_url = get_stylesheet_directory_uri() . '/js/' . $js;
        
        $handle = 'prom-' . str_replace('.js', '', $js);
        $src = esc_url_raw( $style_url );
        $ver = $prom_theme->Version;
        $in_footer = true;
        
        wp_enqueue_script($handle, $src, $deps, $ver, $in_footer);
    }
}
add_action( 'wp_enqueue_scripts', 'prom_scripts' );



// add Productive Muslim favicon
function prom_favicon() {
    echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_stylesheet_directory_uri().'/favicon.ico" />'. PHP_EOL;
}
add_action('wp_head', 'prom_favicon');

// a quick way to generate url for a given image in the theme's img directory
function get_image_uri($image) {
    return get_stylesheet_directory_uri().'/img/'. $image;
}

function render_prom_top_navigation_menu() {
    $config = array(
        'theme_location'  => 'top-menu',
        'menu'            => 'top-menu',
        'container'       => 'div',
        'container_class' => 'top-menu-container',
        'container_id'    => '',
        'menu_class'      => 'menu',
        'menu_id'         => 'header-top-menu',
        'echo'            => true,
        //'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'depth'           => 0,
        //'walker'          => ''
    );
    wp_nav_menu( $config );
}


function render_prom_primary_navigation_menu() {
    $config = array(
        'theme_location'  => 'primary-menu',
        'menu'            => 'primary-menu',
        'container'       => 'div',
        'container_class' => 'primary-menu-container',
        'container_id'    => '',
        'menu_class'      => 'menu',
        'menu_id'         => 'header-primary-menu',
        'echo'            => true,
        //'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'depth'           => 0,
        //'walker'          => ''
    );
    wp_nav_menu($config);
}


function render_prom_footer_copyright_navigation_menu() {
    $config = array(
        'theme_location'  => 'copyright-menu',
        'menu'            => 'copyright-menu',
        'container'       => 'nav',
        'container_class' => 'copyright-menu-container',
        'container_id'    => 'nav-copyright-menu',
        'menu_class'      => 'menu-inline',
        'menu_id'         => 'copyright-menu',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'depth'           => 0,
        //'walker'          => ''
    );
    wp_nav_menu( $config );
}

/**
 * Creates a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 */
function prom_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'productivemuslim' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'prom_wp_title', 10, 2 );


/**
 * Sets up theme defaults and registers the various WordPress features..
 *
 * @uses add_theme_support() To add support for automatic feed links, post
 * formats, and post thumbnails.
 * @uses register_nav_menu() To add support for a navigation menu.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @return void
 */
function prom_setup() {
    
    // Adds RSS feed links to <head> for posts and comments.
    add_theme_support( 'automatic-feed-links' );

    /*
     * This theme supports all available post formats.
     * See http://codex.wordpress.org/Post_Formats
     *
     * Structured post formats are formats where ProductiveMuslim theme handles the
     * output instead of the default core HTML output.
     */
//    add_theme_support( 'structured-post-formats', array(
//            'link', 'video'
//    ) );
    add_theme_support( 'post-formats', array(
            'aside', 'audio', 'chat', 'gallery', 'image', 'quote', 'status'
    ) );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menu( 'primary', 'Navigation Menu' );
    register_nav_menu( 'top-menu', 'Top Menu' );
    register_nav_menu( 'copyright-menu', 'Footer Menu' );

    /*
     * This theme uses a custom image size for featured images, displayed on
     * "standard" posts and pages.
     */
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 640, 270, true );

    // Register custom image size for image post formats.
    //add_image_size( 'prom-image-post', 724, 1288 );

    // This theme uses its own gallery styles.
    //add_filter( 'use_default_gallery_style', '__return_false' );
        
    // This theme uses html5 search form
//    if(has_filter('search_form_format')) {
//       add_filter( 'search_form_format', function() { return 'html5';} );
//    }
}
add_action( 'after_setup_theme', 'prom_setup' );

/**
 * Registers our main widget area and the front page widget areas.
 *
 */
function prom_widgets_init() {
        register_sidebar( array(
		'name' => __( 'Leaderboard Header', 'productivemuslim' ),
		'id' => 'leaderboard-header',
		'description' => __( 'Appears on posts and pages below the Main Navigation', 'productivemuslim' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'productivemuslim' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'productivemuslim' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'First Front Page Widget Area', 'productivemuslim' ),
		'id' => 'sidebar-2',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'productivemuslim' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Second Front Page Widget Area', 'productivemuslim' ),
		'id' => 'sidebar-3',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'productivemuslim' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'prom_widgets_init' );


/**
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 * @return void
 */
function prom_entry_meta() {
    
    
	if ( is_sticky() && is_home() && ! is_paged() )
		echo '<span class="featured-post">' . __( 'Sticky', 'productivemuslim' ) . '</span>';

	if ( ! has_post_format( 'aside' ) && ! has_post_format( 'link' ) && 'post' == get_post_type() )
		prom_entry_date();

	// Post author
	if ( 'post' == get_post_type() ) {
		printf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'productivemuslim' ), get_the_author() ) ),
			get_the_author()
		);
	}
        
        if ( comments_open() && ! is_single() ) {
            echo '<span class="comments-link">';
                comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'productivemuslim' ) . '</span>', __( 'One comment so far', 'productivemuslim' ), __( 'View all % comments', 'productivemuslim' ) );
            echo '</span>';
	} // comments_open()
        
}


/**
 * Prints HTML with date information for current post.
 * @return string
 */
function prom_entry_date( $echo = true ) {
	$format_prefix = ( has_post_format( 'chat' ) || has_post_format( 'status' ) ) ? _x( '%1$s on %2$s', '1: post format name. 2: date', 'productivemuslim' ): '%2$s';

	$date = sprintf( '<span class="date"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>',
		esc_url( get_permalink() ),
		esc_attr( sprintf( __( 'Permalink to %s', 'productivemuslim' ), the_title_attribute( 'echo=0' ) ) ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
	);

	if ( $echo )
		echo $date;

	return $date;
}


/**
 * Displays navigation to next/previous set of posts when applicable.
 * @return void
 */
function prom_paging_nav() {
	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
		return;
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'productivemuslim' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> <span class="meta-title">Older posts</span>', 'productivemuslim' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( '<span class="meta-title">Newer posts</span> <span class="meta-nav">&rarr;</span>', 'productivemuslim' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}


//function posts_link_attributes() {
//    return 'class="more-link"';
//}
//add_filter('next_posts_link_attributes', 'posts_link_attributes');
//add_filter('previous_posts_link_attributes', 'posts_link_attributes');

/**
 * Displays navigation to next/previous post when applicable.
 * @return void
 */
function prom_post_nav() {
    global $post;

    // Don't print empty markup if there's nowhere to navigate.
    $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
    $next = get_adjacent_post( false, '', false );

    if ( ! $next && ! $previous )
            return;
    ?>
    <nav class="navigation post-navigation" role="navigation">
            <h1 class="screen-reader-text"><?php _e( 'Post navigation', 'productivemuslim' ); ?></h1>
            <div class="nav-links">
                
                <?php if ( $previous ) : ?>
                <div class="nav-previous">
                    <?php previous_post_link( '%link', _x( '<span class="meta-nav">&larr;</span> <span class="meta-title">%title</span>', 'Previous post link', 'productivemuslim' ) ); ?>
                </div>
                <?php endif; ?>
                
                <?php if ( $next ) : ?>
                <div class="nav-next">
                    <?php next_post_link( '%link', _x( '<span class="meta-title">%title</span> <span class="meta-nav">&rarr;</span>', 'Next post link', 'productivemuslim' ) ); ?>
                </div>
                <?php endif; ?>

            </div><!-- .nav-links -->
    </nav><!-- .navigation -->
    <?php
}


add_filter( 'the_author', 'prom_guest_author_name' );
add_filter( 'get_the_author_display_name', 'prom_guest_author_name' );

function prom_guest_author_name( $name ) {
    global $post;

    $author = get_post_meta( $post->ID, 'guest-author', true );

    if ( $author ) {
        $name = $author;
    }

    return $name;
}

function prom_enqueue_comments_reply() {
    if( get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
    
add_action( 'comment_form_before', 'prom_enqueue_comments_reply' );


if(!method_exists('Walker_Comment', 'html5_comment')) {
    // hack until we upgrade to WordPress 3.6
    function prom_get_comment_text( $comment ) {
        return sprintf('<div class="comment-content">%s</div>', $comment);
    }
    add_filter('get_comment_text','prom_get_comment_text');
}

function prom_social_share() {
    return sharing_display();
}
add_shortcode('share-on-social-media', 'prom_social_share');

/**
 * Create an archive listing grouped by year, month and date.
 */
function prom_archives() {
    global $wpdb;
    
    $where = "WHERE post_type = 'post' AND post_status = 'publish'";
    $orderby = 'post_date DESC';
    $format = 'html';
    $before = '';
    $after = '';
    
    $arcgroups = array();
    
    $query = "SELECT YEAR(post_date) AS `year`, MONTH(post_date) AS `month`, MONTHNAME(post_date) AS `monthname`, DAYOFMONTH(post_date) AS `dayofmonth`, ID, post_author, post_date, post_date_gmt, post_title, post_status, post_name, post_type, post_mime_type, comment_count FROM $wpdb->posts $where GROUP BY post_title ORDER BY $orderby";
    
    $key = md5($query);
    $cache = wp_cache_get( 'prom_get_archives' , 'prom_archives');
    
    if ( !isset( $cache[ $key ] ) ) {
        $arcresults = $wpdb->get_results($query);
        
        if ( $arcresults ) {
            $date_format = get_option('date_format');

            foreach ( (array) $arcresults as $arcresult ) {

                if ( $arcresult->post_date != '0000-00-00 00:00:00' ) {

                    if ( $arcresult->post_title ) {
                        $text = strip_tags( apply_filters( 'the_title', $arcresult->post_title, $arcresult->ID ) );
                    } else {
                        $text = $arcresult->ID;
                    }

                    $url  = get_permalink( $arcresult );
                    $before = sprintf(
                        '<span title="%s">%s</span> / ',
                        date($date_format, strtotime($arcresult->post_date) ), $arcresult->dayofmonth
                    );

                    $comments_num = sprintf(
                        _nx( 'One Comment', '%1$s Comments', $arcresult->comment_count, 'comments title', 'twentythirteen' ),
                        number_format_i18n( $arcresult->comment_count )
                    );

                    $after = ($arcresult->comment_count>0)?' ('.$arcresult->comment_count.')':$after;
                    $after = ($arcresult->comment_count>0)?' ('.$comments_num.')':$after;


                    $arcgroups[$arcresult->year]['months'][$arcresult->month]['posts'][] = get_archives_link($url, $text, $format, $before, $after);

                    if(!isset($arcgroups[$arcresult->year]['url'])) {
                        $arcgroups[$arcresult->year]['url'] = get_year_link($arcresult->year);
                    }

                    if(!isset($arcgroups[$arcresult->year][$arcresult->month]['url'])) {
                        $arcgroups[$arcresult->year]['months'][$arcresult->month]['url'] = get_month_link( $arcresult->year, $arcresult->month );
                    }

                    if(!isset($arcgroups[$arcresult->year]['months'][$arcresult->month]['monthname'])) {
                        $arcgroups[$arcresult->year]['months'][$arcresult->month]['monthname'] = $arcresult->monthname;
                    }

                }
            }

            $output = '<ul id="prom-archives">';

            foreach(array_keys($arcgroups) as $year) {
                $output.= '<li>';

                $url = $arcgroups[$year]['url'];
                $text = $year;
                $format='';
                $before='<h2>';
                $after = '</h2>';

                $output.= get_archives_link($url, $text, $format, $before, $after);

                $output.= '<ul>';
                foreach(array_keys($arcgroups[$year]['months']) as $month) {
                    $output.= '<li>';
                    $url = $arcgroups[$year]['months'][$month]['url'];
                    $text = $arcgroups[$year]['months'][$month]['monthname'];
                    $format='';
                    $before='<h3>';
                    $after = ' ('.count($arcgroups[$year]['months'][$month]['posts']).')</h3>';

                    $output.= get_archives_link($url, $text, $format, $before, $after);

                    $output.= '<ul>';
                    $output.= implode('', $arcgroups[$year]['months'][$month]['posts']);
                    $output.= '</ul>';

                    // end of month
                    $output.= '</li>';
                }
                $output.= '</ul>';

                // end of year
                $output.= '</li>';
            }
            $output .= '</ul>';
        }
        
        $cache[ $key ] = $output;
        wp_cache_set( 'prom_get_archives', $cache, 'prom_archives' );
    } else {
        $output = $cache[ $key ];
    }
    return $output;
}
add_shortcode('promarchives', 'prom_archives');


/**
 * New visitor widget
 *
 * for content like these, it can be implemented with Text widget too,
 * try it from admin panel on widget dashboard page  
 */
class Productivemuslim_NewVisitorWidget extends WP_Widget {

	public function __construct() {
		parent::__construct(
	 		'Productivemuslim_NewVisitorWidget', // Base ID
			'New Visitor Widget', // Name
			array( 'description' => __( 'ProductiveMuslim New Visitor Widget', 'text_domain' ), )
		);	
	}

	public function widget( $args, $instance) {
		$content = '
		        <li class="widget widget_text" id="text-4">
                <h3>New Visitor?</h3>
                <div class="textwidget">
                    <div class="start-here-sidebar">
                        <a onclick="_gaq.push([\'_trackEvent\', \'StartHere-Banner-Sidebar\', \'Visited Start Here Page from Sidebar\', \'Widget-Sidebar-StartHere\', , false]);" href="/start-here/">
                            <img width="90" height="90" src="'.get_image_uri('start-here.png').'" alt="Start Here - Productive Muslim"> Visiting our site for the first time? Explore our A-Z guide to read, follow and watch.</a>
                    </div>
                </div>
                </li>		
		';
	    echo $content;
	}
 	public function form( $instance ) {
		// outputs the options form on admin
	}

	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
	}	
}
// register widget
add_action( 'widgets_init', function(){
     register_widget( 'Productivemuslim_NewVisitorWidget' );
});

/**
 * Free Ebook widget
 */
class Productivemuslim_FreeEbookWidget extends WP_Widget {

	public function __construct() {
		parent::__construct(
	 		'Productivemuslim_FreeEbookWidget', // Base ID
			'Free Ebook Widget', // Name
			array( 'description' => __( 'ProductiveMuslim Free eBook Widget', 'text_domain' ), )
		);	
	}

	public function widget( $args, $instance) {
		$content = '
            <li class="widget widget_text" id="text-9">
                <h3>FREE EBOOK!</h3>
                <div class="textwidget">
                    <p class="sidebar-skin-intro">Subscribe to our weekly newsletter and receive a <strong>free copy of our eBook</strong> "The Very Best of ProductiveMuslim"</p>
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
                            <input id="awf_field-44506975" type="text" name="name" class="inputemail" placeholder="Full Name" value="" required>
                            <input id="awf_field-44506976" type="email" name="email" class="inputemail" pattern="[^ @]*@[^ @]*" value="" placeholder="Your Email Address" required>
                        </p>
                        <p class="sidebar-skin-submit">
                            <button name="submit" type="submit" tabindex="502">DOWNLOAD Free eBook</button>
                        </p>
                    </form>
                </div>
            </li>	
		';
	    echo $content;
	}
 	public function form( $instance ) {
		// outputs the options form on admin
	}

	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
	}	
}
// register widget
add_action( 'widgets_init', function(){
     register_widget( 'Productivemuslim_FreeEbookWidget' );
});
