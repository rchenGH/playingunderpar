<?php

require_once get_template_directory() . '/inc/functions/post-type-theme-search-ajax.php';

$printedPostIds = array();
function addPrintedPost($post) {
    global $printedPostIds;

    $postId = 0;

    if(is_null($post)) {
        $postId = get_the_ID();
    } else if (is_object($post)) {
        $postId = $post->ID;
    } else {
        $postId = $post;
    }

    if(!in_array($postId, $printedPostIds)) {
        $printedPostIds[] = $postId;
    }
}

function include_component_post_list($posts) {

    if(is_object($posts)) {
        $postList = array($posts);
    }

    include(get_template_directory() . '/inc/components/search-list.php');
}