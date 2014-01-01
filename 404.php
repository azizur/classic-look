<?php
/**
 * The template for displaying 404 pages (Not Found)
 */

get_header(); ?>
    <div id="content_area" class="full_width">
        <div class="page">
            <div id="content_box">
                <div id="content" class="hfeed">
                    <article class="post_box">

                    <header class="entry-header headline_area">
                        <h1 class="page-title"><?php _e( 'Page not found', 'twentythirteen' ); ?></h1>
                    </header>

                    <div class="entry-content format_text">
                        <h2><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'twentythirteen' ); ?></h2>
                        <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentythirteen' ); ?></p>

                        <?php get_search_form(); ?>
                    </div><!-- .page-content -->

                    </article>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
<?php
get_footer();