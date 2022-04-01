<?php

add_action('wp_ajax_search_ajax', 'search_ajax');
add_action('wp_ajax_nopriv_search_ajax', 'search_ajax');

function search_ajax() {
    $s = $_POST['s'];

    if(pmpro_hasMembershipLevel(array("2")) ) {
        $terms = 19;
    }

    if(pmpro_hasMembershipLevel(array("3")) ) {
        $terms = 20;
    } 

    if(pmpro_hasMembershipLevel(array("4", "5", "6", "7", "8")) ) {
        $terms = array(19, 20);
    } 

    $query_args = array(
        's' => $s,
        'posts_per_page'    => -1,
        'post_type'         => 'drills',
        'post_status'       => 'publish',
        'tax_query'         => array(
            'relation'      => 'AND',
            array(
                'taxonomy'  => 'drill_category',
                'field'    => 'tag_id',
                'terms'     =>  $terms
            )
        )
    );
    $query = new WP_Query($query_args);
    $posts = $query->posts;

    if(count($posts)) {
        include_component_post_list($posts);
    }

    wp_die();
}