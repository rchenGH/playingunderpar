<?php 
    global $post;
?>

<div class="container-fluid single-container">
    <div class="row single-row">
        <div class="col-12 featured-wrapper">
            <?php if(get_field('video')) : ?>
                <div class="embed-container">
                <?php
                    // Load value.
                    $iframe = get_field('video');

                    // Use preg_match to find iframe src.
                    preg_match('/src="(.+?)"/', $iframe, $matches);
                    $src = $matches[1];

                    // Add extra parameters to src and replcae HTML.
                    $params = array(
                        'controls'  => 1,
                        'hd'        => 1,
                        'autohide'  => 1
                    );
                    $new_src = add_query_arg($params, $src);
                    $iframe = str_replace($src, $new_src, $iframe);

                    // Add extra attributes to iframe HTML.
                    $attributes = 'frameborder="0"';
                    $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

                    // Display customized HTML.
                    echo $iframe;
                    ?>
                </div>

                <?php if(get_field('password')) : ?>
                    <p>Password: <?php the_field('password'); ?></p>

                <?php endif; ?>
            <?php elseif ( get_the_post_thumbnail_url(get_the_ID(), 'thumb') ) : ?>
                <?php the_post_thumbnail('thumb', ['class' => 'blog-img']); ?>
            <?php endif ; ?>
        </div>
    </div>

    <div class="title-row-white row">
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

            <div class="content">
                <?php the_content(); ?>
            </div>
        </div>
        
        <div class="comment-column col-12">
            <ul>
                <?php 
                    $current_user = wp_get_current_user();
                ?>

                <div id="respond" class="comment-respond">
                    <h3 id="reply-title" class="comment-reply-title">Track Your Progress</h3>
                    <form action="<?php echo get_site_url() ?>/wp-comments-post.php" method="post" id="commentform" class="comment-form">
                        <p class="logged-in-as">
                            <a href="<?php echo get_site_url() ?>/my-account/" aria-label="Logged in as raymond. Edit your profile.">Logged in as <?php echo $current_user->user_login ?></a>. <a href="<?php echo wp_logout_url() ?>">Log out?</a></p>
                            <p class="comment-form-comment">
                                <label for="comment">Comment</label> 
                                <textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" required="required"></textarea>
                            </p>
                            
                            <p class="form-submit">
                                <input name="submit" type="submit" id="submit" class="submit comment-submit" value="Save"> <input type="hidden" name="comment_post_ID" value="<?php echo $post->ID ?>" id="comment_post_ID">
                                <input type="hidden" name="comment_parent" id="comment_parent" value="0">
                            </p>
                        <input type="hidden" id="_wp_unfiltered_html_comment_disabled" name="_wp_unfiltered_html_comment" value="1edf5a6950">
                    </form>
                </div>

                <ul class="comment-list-initial">
                <?php
                    global $post;
                    $user_id = get_current_user_id();
                    $user_specific_comments = get_comments(
                        array(
                            'user_id' => $user_id,
                            'post_id' => $post->ID
                        )
                    );
                    wp_list_comments(
                        array(
                            'per_page' => -1,
                        ),
                        $user_specific_comments
                    );
                    wp_reset_postdata();
                ?>
                </ul>         


            </ul>
        </div>

    </div>

    


</div>