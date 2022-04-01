<?php get_header(); 
/* Template Name: Blog Page */
?>

    <main id="main">
        <?php // if(pmpro_hasMembershipLevel(array("2", "3", "4", "5", "6", "7", "8")) )  : ?>

        <?php  if(current_user_can('administrator')) : ?>

            <div class="container-fluid search-container">
                <div class="row search-row">
                    <div class="col-md-8">
                        <?php get_template_part('inc/components/search-bar'); ?>
                    </div>

                    <div class="col-md-4">
                        <?php get_template_part('inc/components/blog-category-dropdown'); ?>
                    </div>
                </div>
            </div>

            <div class="global-page-container blog-page-container">

                <div class="row title-row">
                    <div class="col-12 title-column">
                        <?php if(get_the_title()) : ?>
                            <h1 class="section-title large"><?php the_title(); ?></h1>
                        <?php endif; ?>
                    </div>
                </div>

                <div class='global-page-row row'>
                    <div class="global-page-column col-12">
                        <div class="blog-container container-fluid">
                            <div id="datafetch-blog" class="row"></div>

                            <div class="row posts-onload">
                                <?php

                                $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
                                if ( get_query_var('paged') ) { 
                                    $paged = get_query_var('paged'); 
                                } elseif ( get_query_var('page') ) { 
                                    $paged = get_query_var('page'); 
                                }
                                else { 
                                    $paged = 1; 
                                }

                                $blog = new WP_Query(array(
                                    'post_type' => 'post',
                                    'posts_per_page' => 6,
                                    'post__status' => 'published',
                                    'order' => 'DESC',
                                    'paged' => $paged,
                                ));

                                $wp_query = $blog;

                                ?>

                                <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

                                    <div class="col-md-4 col-sm-6 post-component-column">
                                        <?php get_template_part('inc/components/post-item'); ?>
                                        
                                    </div>

                                <?php endwhile; ?>
                            </div>


                            <!-- Put this where you want the paginate_links to appear -->


                            <div class="row pagination-row">
                                <?php echo paginate_links( 
                                        array(
                                            'prev_text' => '<span class="small-subtitle paginate paginate-prev"><img class="pagination-icon" src="' . get_template_directory_uri() . '/assets/images/pagination-prev-icon.png" />&nbsp;&nbsp; Prev</span>',
                                            'next_text' => '<span class="small-subtitle paginate paginate-next">Next &nbsp;&nbsp;<img class="pagination-icon" src="' . get_template_directory_uri() . '/assets/images/pagination-next-icon.png" /></span>'
                                        )
                                    ); 
                                ?>
                            </div>
                            <?php wp_reset_postdata(); ?>

                        </div>
                    </div>
                </div>
            </div>

        <?php else : ?>
            <?php get_template_part('inc/components/not-yet-available'); ?>

        <?php endif; ?>

    </main>
    <!-- /#main -->
        

<?php get_footer(); ?>