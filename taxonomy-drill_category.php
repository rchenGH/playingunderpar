<?php get_header(); 
/* Template Name: Drill Category Page */

global $post;

$taxonomy = 'drill_category';

$term = get_term_by( 'slug', get_query_var('term'), get_query_var('taxonomy') );
$category = get_query_var( 'term' );
?>

    <main id="main">
        <div class="container-fluid search-container">
            <?php 
                global $post;
                $drills = new WP_Query();
                $categories = get_categories(array( 'taxonomy' => 'drill_category' )); 
            ?>

            <div class="row search-row">
                <div class="col-md-8">

                    <?php get_template_part('inc/components/post-type-search-bar'); ?>
                    <!-- search header -->
                </div>

                <div class="col-md-4">
                
                    <div class="dropdown-box">
                        <div class="dropdown">
                            <button class="dropbtn bold-label-text">
                                <?php if($term_name) : ?>
                                    <?php echo $term_name ?><span class="triangle-wrapper"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/triangle-down.png" /></span>
                                <?php else : ?>
                                    Select Category<span class="triangle-wrapper"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/triangle-down.png" /></span>
                                <?php endif; ?>
                            </button>
                            <div id="myDropdown" class="dropdown-content bold-label-text">

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
                            </div>
                        </div>
                    </div>

                    <!-- dropdown -->

                </div>
            </div>
        </div>

        <?php
            $taxonomy = 'drill_category';
            $terms = get_terms($taxonomy, $args = array(
                'hide_empty' => false,
                'parent' => $term->term_id,
                'hide_empty' => 0,
            ));
            $currTerm = get_terms(get_query_var('cat'));
            $term_name = $currTerm->name;
        ?>

        <div class="<?php if($terms) : ?>archive-categories-container <?php else : ?>global-page-container <?php endif; ?>drills-category-container">

            <?php if(!($terms)) : ?>
                <div class="row title-row">
                    <div class="col-12 title-column">
                        <?php if(get_the_title()) : ?>
                            <h1 class="section-title large"><?php single_cat_title(); ?></h1>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>

            <div class='<?php if($terms) : ?>archive-categories-row<?php else : ?>global-page-row <?php endif; ?>'>
                <div class="<?php if($terms) : ?>archive-categories-column<?php else : ?>global-page-column <?php endif; ?>">
                    <div class="archive-categories-column container-fluid">
                        <div id="search">
                            <div class="search-body">
                                <div class="container-fluid">
                                    <div class="row results"></div>
                                </div>
                            </div>

                        </div>

                        <div class="row drills-category-row">

                            <?php if($terms) : ?>
                                <?php foreach( $terms as $term ) :
                                    $catIMG = get_field('drill_category_image', 'drill_category_' . $term->term_id);
                                ?>
                                    <div class="col-md-4 col-sm-6 post-component-column ">
                                        <div class="post-item">
                                            <a id="post-<?php the_ID(); ?>" href="<?php echo get_term_link($term->slug, $taxonomy); ?>">
                                                <div class="post-item-img">
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
                                <?php wp_reset_postdata(); ?>
                            <?php endif; ?>

                            


                            <?php if(!$terms) : ?>
                                <?php
                                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                                    $temp = $wp_query;
                                    $drills = null;
                                    $drills = new WP_Query();
                                    $drills->query('showposts=6&post_type=drills&term=' . $term->slug . '&taxonomy='. $term->taxonomy . '&paged=' . $paged . '&order=ASC' );
                                ?>


                                <?php if($drills) : ?>
                                    <?php while ($drills->have_posts()) : $drills->the_post(); ?>

                                        <div class="col-md-4 post-component-column drill-component">
                                            <?php get_template_part('inc/components/post-item'); ?>
                                        </div>

                                    <?php endwhile; ?>
                                    <?php wp_reset_postdata(); ?>
                                <?php endif; ?>

                            <?php endif; ?>


                        </div>

                        <div class="search-message no-content">
                            <h3 class="large-body-text">No Results Found</h3>
                        </div>

                        <?php if(!$terms) : ?>
                            <div class="row pagination-row">
                                <?php echo paginate_links( array(

                                    'prev_text' => '<span class="small-subtitle paginate paginate-prev"><img class="pagination-icon" src="' . get_template_directory_uri() . '/assets/images/pagination-prev-icon.png" />&nbsp;&nbsp; Prev</span>',
                                    'next_text' => '<span class="small-subtitle paginate paginate-next">Next &nbsp;&nbsp;<img class="pagination-icon" src="' . get_template_directory_uri() . '/assets/images/pagination-next-icon.png" /></span>'

                                )); ?>
                            </div>
                        <?php endif; ?>
                        

                    </div>
                </div>
            </div>
        </div>
        
    </main>
    <!-- /#main -->
        

<?php get_footer(); ?>