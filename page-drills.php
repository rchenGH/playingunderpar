<?php get_header(); 
/* Template Name: Drills Page */

global $post;
?>

    <main id="main">

    <?php // if(pmpro_hasMembershipLevel(array("2", "3", "4", "5", "6", "7", "8")) )  : ?>

        <div class="container-fluid search-container">
        
            <div class="row search-row">
                <div class="col-md-8">

                    <?php get_template_part('inc/components/post-type-search-bar'); ?>

                </div>

                <div class="col-md-4">
                    <?php get_template_part('inc/components/custom-category-dropdown'); ?>
                </div>
            </div>
        </div>


        <div class="archive-categories-container drills-page-container">

            <div class='archive-categories-row row'>
                <div class="archive-categories-column">
                    <div class="drills-container container-fluid">
                        <div id="search">
                            <div class="search-body">
                                <div class="container-fluid">
                                    <div class="row results"></div>
                                </div>
                            </div>

                        </div>

                        <div class="drills-row row drills-category-row">

                            <?php

                                get_template_part('inc/components/membership-level-filter');

                                $taxonomy = 'drill_category';
                                $terms = get_terms($taxonomy, $args = array(
                                    'hide_empty' => false,
                                    'parent' => 0,
                                    'term_taxonomy_id' => $terms
                                ));
                            ?>
                            <?php foreach( $terms as $term ) :
                                $catIMG = get_field('drill_category_image', 'drill_category_' . $term->term_id);
                            ?>
                                <div class="col-md-6 col-sm-6 post-component-column parent">
                                    <div class="post-item">
                                        <a id="post-<?php the_ID(); ?>" href="<?php echo get_term_link($term->slug, $taxonomy); ?>">
                                            <div class="post-cat-img">
                                                <?php echo wp_get_attachment_image($catIMG, 'large'); ?>
                                            </div>
                                        </a>

                                        <a href="<?php echo get_term_link($term->slug, $taxonomy); ?>">
                                            <div class="post-item-body">
                                                <div class="post-title-wrapper">
                                                    <p class="section-title small post-title"><?php echo $term->name; ?></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                            <?php endforeach;?>
                        </div>

                        <div class="search-message no-content">
                            <h3 class="large-body-text">No Results Found</h3>
                        </div>


                        <!-- drills -->
                    </div>
                </div>
            </div>
        </div>

    <?php //else : ?>
        <?php // get_template_part('inc/components/premium-members-only'); ?>
    <?php //endif; ?>

    </main>
    <!-- /#main -->
        

<?php get_footer(); ?>