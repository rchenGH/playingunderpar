<?php

    if(is_object($posts)) {
        $postList = array($posts);
    }

?>

<?php foreach($posts as $post) : ?>

    <div class="col-md-4 post-component-column">
        <a href="<?php echo $post->guid ?>">
            <div class="post-item post-button post-button-<?php echo $post->ID ?>">

                <div class="post-item-img"
                    style="background-image: url(<?php echo get_the_post_thumbnail_url($post->ID); ?>)"
                >
                </div>

                <div class="post-item-body">
                    <div class="post-title-wrapper">
                        <p class="section-title small post-title"><?php echo $post->post_title; ?></p>
                    </div>
                </div>
            </div>
        </a>
    </div>

<?php endforeach ; ?>