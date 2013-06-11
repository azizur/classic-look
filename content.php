<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post_box'); ?>>
	<header class="entry-header headline_area">
		<?php if ( is_single() ) : ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php else : ?>
		<h1 class="entry-title">
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentythirteen' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h1>
		<?php endif; // is_single() ?>

		<div class="entry-meta">
			<?php prom_entry_meta(); ?>
			<?php edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary format_text">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content format_text">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentythirteen' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
            
            <?php
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
            ?>
		
		<?php if ( is_single() && get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
			<?php get_template_part( 'author-bio' ); ?>
		<?php endif; ?>
	</footer><!-- .entry-meta -->
</article><!-- #post -->