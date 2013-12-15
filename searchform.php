<form role="search" method="get" class="searchform"
      action="<?php echo esc_url(home_url('/')); ?>">
    <label>
        <span class="screen-reader-text">
            <?php echo _x('Search for:', 'label', 'default'); ?>
        </span>
        <input name="s" type="search"
               placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder'); ?>"
               value="<?php echo get_search_query(); ?>"
               title="<?php echo _x('Search for:', 'label', 'default'); ?>" />
    </label>
    <input type="submit" class="searchsubmit"
           value="<?php echo esc_attr_x('Search', 'submit button');?>" />
</form>