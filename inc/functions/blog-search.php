<?php

// ajax function
add_action('wp_ajax_data_fetch', 'blog_data_fetch');
add_action('wp_ajax_nopriv_data_fetch', 'blog_data_fetch');

function blog_data_fetch() {
    $currCat = get_category(get_query_var('cat'));
    $cat_name = $currCat->name;

    $the_query = new WP_Query( 
        array( 
            'posts_per_page' => -1,
            's' => esc_attr( $_POST['keyword']),
            'post_type' => 'post',
            'category_name'    => $cat_name,
        )
    );

    if( $the_query->have_posts() ) :
        while($the_query->have_posts() ) : $the_query->the_post(); ?>
            <div class="col-md-4 col-sm-6 post-component-column">
                <?php get_template_part('inc/components/post-item'); ?>
            </div>
        <?php endwhile;
    wp_reset_postdata();

    else: 
        echo '<div class="container-fluid no-results-container">    
                <div class="row no-results-row">
                    <div class="col-12 no-results-column">
                        <h3 class="large-body-text">No Results Found</h3>
                    </div>
                </div>
            </div>';
    endif;

    die();
}
?>

<?php
    // add the ajax fetch js
    add_action('wp_footer', 'ajax_blog_fetch');
    function ajax_blog_fetch() {
?>

    <script type="text/javascript">
        function fetchResults() {
            let keyword = $('#searchInput').val();
            if(keyword.length == 0) {
                $('#datafetch-blog').html('');
                $('.posts-onload').show()
                $('.pagination-row').show();
            } else {
                $('.posts-onload').hide()
                $('.pagination-row').hide();

                $.ajax({
                    url: '<?php echo admin_url('admin-ajax.php'); ?>',
                    type: 'post',
                    data: {
                        action: 'data_fetch', 
                        keyword: keyword 
                    },
                    success: function(data) {
                        $('#datafetch-blog').html(data);
                    }
                });
            }
        }
    </script>

<?php } ?>
