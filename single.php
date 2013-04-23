<?php
/**
 * The Template for displaying all single posts.
 */
get_header();
?>
<div class="full_width">
    <div class="page">
        <div id="primary" class="content-area">
            <div id="content" class="site-content" role="main">

                <?php /* The loop */ ?>
                <?php while (have_posts()) : the_post(); ?>

                    <?php get_template_part('content', get_post_format()); ?>
                    <?php prom_post_nav(); ?>
                    <br class="clearfix">
                    <?php comments_template(); ?>

                <?php endwhile; ?>

            </div><!-- #content -->
        </div><!-- #primary -->
        <?php get_sidebar(); ?>
    </div>
</div>
<?php
get_footer();