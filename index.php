<?php get_header(); ?>
<div id="content_area" class="full_width">
    <div class="page">
        <div id="content_box">
            <div id="content" class="hfeed">

                <?php if (have_posts()) : ?>

                    <?php /* The loop */ ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part('content', get_post_format()); ?>
                    <?php endwhile; ?>

                    <?php prom_paging_nav(); ?>

                <?php else : ?>
                    <?php get_template_part('content', 'none'); ?>
                <?php endif; ?>

            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php
get_footer();