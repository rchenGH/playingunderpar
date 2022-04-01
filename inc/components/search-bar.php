<form method="get" class="searchform" id="searchform" action="<?php echo esc_url( home_url( '/')); ?>">
    <input type="text" class="field" name="s" id="searchInput" onkeyup="fetchResults()" placeholder="<?php esc_html_e('Search'); ?>">
    <?php if( 'any' != $post_type) { ?>
        <input type="hidden" class="search-bar" name="post_type" value="<?php echo get_the_title(); ?> <?php echo esc_attr($post_type); ?>">
    <?php } ?>
</form>