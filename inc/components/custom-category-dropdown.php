<?php 
    $customPostTaxonomies = get_object_taxonomies($post->post_name);
    $categories = get_terms( $customPostTaxonomies);
    $currCat = get_terms(get_query_var('cat'));
    $cat_name = $currCat->name;

?>
<div class="dropdown-box">

    <div class="dropdown">
        <button class="dropbtn bold-label-text">
            <?php if($cat_name) : ?>
                <?php echo $cat_name ?><span class="triangle-wrapper"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/triangle-down.png" /></span>
            <?php else : ?>
                Select Category<span class="triangle-wrapper"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/triangle-down.png" /></span>
            <?php endif; ?>
        </button>
        <div id="myDropdown" class="dropdown-content bold-label-text">
            <?php if($cat_name) : ?>
                <a class="dropdown-list-item" href="<?php echo get_site_url() ?>/">All</a>
                <?php foreach($categories as $category) : ?>

                    <?php echo '<a class="dropdown-list-item" href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>'; ?>
                <?php endforeach; ?>

            <?php else : ?>
                <?php foreach($categories as $category) : ?>
                    <?php if(pmpro_hasMembershipLevel(array("2")) )  : ?>
                        <?php if($category->parent === 19) : ?>
                            <?php echo '<a class="dropdown-list-item" href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>'; ?>
                        <?php endif; ?>
                    <?php elseif(pmpro_hasMembershipLevel(array("3"))) : ?>
                        <?php if($category->parent === 20) : ?>
                            <?php echo '<a class="dropdown-list-item" href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>'; ?>
                        <?php endif; ?>
                    <?php elseif(pmpro_hasMembershipLevel(array("4", "5", "6", "7", "8")) )  : ?>
                        <?php if($category->parent === 19 || $category->parent === 20) : ?>
                            <?php echo '<a class="dropdown-list-item" href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>'; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>