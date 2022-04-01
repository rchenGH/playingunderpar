<?php
get_header();

?>
    <main id="main">

        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post() ?>
                <div class="container-fluid single-container">
                    <div class="row single-row">
                        <div class="col-12 featured-wrapper">
                            <?php if ( get_the_post_thumbnail_url(get_the_ID(), 'thumb') ) : ?>
                                <?php the_post_thumbnail('thumb', ['class' => 'blog-img']); ?>
                            <?php endif ; ?>
                        </div>
                    </div>

                    <div class="title-row row">
                        <div class="title-wrapper col-12">
                            <?php $categories = get_the_category($post->ID); ?>
                            <?php if($categories) : ?>
                                <div class="categories-wrapper">
                                    <?php foreach($categories as $category) : ?>
                                        <i class="normal-body-text blog-post-text"><?php echo $category->name; ?>&nbsp;</i>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                            <h1 class="section-title medium"><?php the_title(); ?></h1>
                        </div>
                    </div>

                    <div class="content-row row">
                        <div class="col-12 content-column">
                            <p class="author">Author: <?php the_author() ?></p>
                            <p class="date">Date: <?php the_date() ?></p>

                            <div class="content">
                                <?php the_content(); ?>

                                
                            </div>
                        </div>
                    </div>

                    <div class="related-posts-row row">
                        <?php

                        $related = get_posts( array( 
                            'category__in' => wp_get_post_categories($post->ID), 
                            'numberposts' => 2, 
                            'post__not_in' => array($post->ID) 
                        ) );

                        ?>

                        <?php if( $related ) : ?>
                            <div class="container-fluid related-posts-inner-container">
                                <div class="row related-posts-inner-row">
                                    <?php foreach( $related as $post ) : ?>
                                        <?php setup_postdata($post); ?>
                                        <div class="col-md-6 related-posts-column">
                                            <?php get_template_part('inc/components/blog-item'); ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php wp_reset_postdata(); ?>
                    </div>

                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </main>

<?php get_footer(); ?>