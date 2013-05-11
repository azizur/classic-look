<?php
/**
 * The sidebar containing the main widget area.
 *
 * If no active widgets in sidebar, let's hide it completely.
 */
?>
<div id="sidebars">
    
    <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
    <div id="sidebar_1" class="sidebar widget-area" role="complementary">
        <ul class="sidebar_list">
            <?php dynamic_sidebar( 'sidebar-1' ); ?>
        </ul>
    </div><!-- #secondary -->
    <?php endif; ?>
    
</div>
