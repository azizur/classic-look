<?php

// add Productive Muslim Styles
function prom_styles() {
    $styles = array(
        'core.css',
        'layout.css',
        //'ie.css',
        'custom.css',
        'safe.css'
    );
    
    if(is_single()) {
        $styles[] = 'comments.css';
    }
    
    foreach($styles as $style) {
        $style_url = get_stylesheet_directory_uri() . '/css/' . $style;
        
        $handle = 'prom-' . str_replace('.css', '', $style);
        $src = esc_url_raw( $style_url );
        $deps = array();
        $ver = '0.0.1';
        $media = 'all';
        
        wp_enqueue_style($handle, $src, $deps, $ver, $media );
    }
}
add_action( 'wp_enqueue_scripts', 'prom_styles' );


// add Productive Muslim scripts
function prom_scripts() {
    $scripts = array(
        'q2w3-fixed-widget.js',
    );
    
    foreach($scripts as $script) {
        $style_url = get_stylesheet_directory_uri() . '/js/' . $script;
        
        $handle = 'prom-' . str_replace('.js', '', $script);
        $src = esc_url_raw( $style_url );
        $deps = array('jquery');
        $ver = '0.0.1';
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

function render_top_navigation_menu() {
    $config = array(
        'theme_location'  => 'top-menu',
        'menu'            => 'top-menu',
        'container'       => 'div',
        'container_class' => 'menu-top-menu-container',
        'container_id'    => '',
        'menu_class'      => 'menu',
        'menu_id'         => 'menu-top-menu',
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


function render_primary_navigation_menu() {
    $config = array(
        'theme_location'  => 'primary-menu',
        'menu'            => 'primary-menu',
        'container'       => 'div',
        'container_class' => 'menu-primary-menu-container',
        'container_id'    => '',
        'menu_class'      => 'menu',
        'menu_id'         => 'menu-primary-menu',
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
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentythirteen' ), max( $paged, $page ) );

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
	 * Structured post formats are formats where Twenty Thirteen handles the
	 * output instead of the default core HTML output.
	 */
	add_theme_support( 'structured-post-formats', array(
		'link', 'video'
	) );
	add_theme_support( 'post-formats', array(
		'aside', 'audio', 'chat', 'gallery', 'image', 'quote', 'status'
	) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', 'Navigation Menu' );
	register_nav_menu( 'top-menu', 'Top Menu' );

	/*
	 * This theme uses a custom image size for featured images, displayed on
	 * "standard" posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 604, 270, true );

	// Register custom image size for image post formats.
	add_image_size( 'prom-image-post', 724, 1288 );

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}
add_action( 'after_setup_theme', 'prom_setup' );


/**
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own twentythirteen_entry_meta() to override in a child theme.
 *
 * @return void
 */
function prom_entry_meta() {
	if ( is_sticky() && is_home() && ! is_paged() )
		echo '<span class="featured-post">' . __( 'Sticky', 'twentythirteen' ) . '</span>';

	if ( ! has_post_format( 'aside' ) && ! has_post_format( 'link' ) && 'post' == get_post_type() )
		prom_entry_date();

	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'twentythirteen' ) );
	if ( $categories_list ) {
		echo '<span class="categories-links">' . $categories_list . '</span>';
	}

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'twentythirteen' ) );
	if ( $tag_list ) {
		echo '<span class="tags-links">' . $tag_list . '</span>';
	}

	// Post author
	if ( 'post' == get_post_type() ) {
		printf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'twentythirteen' ), get_the_author() ) ),
			get_the_author()
		);
	}
}


/**
 * Prints HTML with date information for current post.
 *
 * Create your own twentythirteen_entry_date() to override in a child theme.
 *
 * @since Twenty Thirteen 1.0
 *
 * @param boolean $echo Whether to echo the date. Default true.
 * @return string
 */
function prom_entry_date( $echo = true ) {
	$format_prefix = ( has_post_format( 'chat' ) || has_post_format( 'status' ) ) ? _x( '%1$s on %2$s', '1: post format name. 2: date', 'twentythirteen' ): '%2$s';

	$date = sprintf( '<span class="date"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>',
		esc_url( get_permalink() ),
		esc_attr( sprintf( __( 'Permalink to %s', 'twentythirteen' ), the_title_attribute( 'echo=0' ) ) ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
	);

	if ( $echo )
		echo $date;

	return $date;
}


/**
 * Displays navigation to next/previous set of posts when applicable.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function prom_paging_nav() {
	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
		return;
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'twentythirteen' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> <span class="meta-title">Older posts</span>', 'twentythirteen' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( '<span class="meta-title">Newer posts</span> <span class="meta-nav">&rarr;</span>', 'twentythirteen' ) ); ?></div>
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
 *
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
            <h1 class="screen-reader-text"><?php _e( 'Post navigation', 'twentythirteen' ); ?></h1>
            <div class="nav-links">
                
                <?php if ( $previous ) : ?>
                <div class="nav-previous">
                    <?php previous_post_link( '%link', _x( '<span class="meta-nav">&larr;</span> <span class="meta-title">%title</span>', 'Previous post link', 'twentythirteen' ) ); ?>
                </div>
                <?php endif; ?>
                
                <?php if ( $next ) : ?>
                <div class="nav-next">
                    <?php next_post_link( '%link', _x( '<span class="meta-title">%title</span> <span class="meta-nav">&rarr;</span>', 'Next post link', 'twentythirteen' ) ); ?>
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
