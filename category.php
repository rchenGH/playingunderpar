<?php
    get_header();

    /* Template Name: Category */

    $cat_id = get_query_var('cat');
    $the_category = get_category($cat_id);

    $currCat = get_category(get_query_var('cat'));
    $cat_name = $currCat->name;
    $the_cat = get_cat_ID($cat_name);
    $cat_desc = $the_category->description;

?>

    <main id="main">

        <div class="container-fluid search-container">
            <div class="row search-row">
                <div class="col-md-8">
                    <?php get_template_part('inc/components/search-bar'); ?>
                </div>

                <div class="col-md-4">
                    <?php get_template_part('inc/components/category-dropdown'); ?>
                </div>
            </div>
        </div>

        <div class="global-page-container blog-page-container">
            <div class="row title-row">
                <div class="col-12 title-column">
                    <h1 class="section-title large"><?php single_cat_title(); ?></h1>
                </div>
            </div>

            <div class='global-page-row row'>
                <div class="global-page-column col-12">

                    <div class="blog-container container-fluid">




                        <div id="datafetch-blog" class="row"></div>

                        <div class="row posts-onload">
                            <?php
                                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                                $temp = $wp_query;
                                $blog = null;
                                $blog = new WP_Query();
                                $blog->query('showposts=9&post_type=post&paged=' . $paged . '&cat=' . $the_cat);
                            ?>

                            <?php while ($blog->have_posts()) : $blog->the_post(); ?>

                            <div class="col-md-4 post-component-column">
                                <?php get_template_part('inc/components/post-item'); ?>
                            </div>

                            <?php endwhile; ?>
                        </div>

                        <div class="row pagination-row">
                            <?php echo paginate_links(); ?>
                        </div>

                    </div>
                    <!-- blog container -->
                </div>
                <!-- global page column -->
            </div>
            <!-- global page row -->

        </div>
        <!-- page container -->
    </main>
    <!-- /#main -->

<?php get_footer(); ?>