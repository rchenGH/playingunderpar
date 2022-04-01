
<?php
    global $post;
    $categories = get_the_category($post->ID);
    $member_delay = intval(get_field('delay')); 
    $seconds_in_day = 86400;
    $seconds_in_total_delay = $member_delay * $seconds_in_day;
    $member_start_date_to_time = strtotime(do_shortcode('[pmpro_member field="membership_startdate"]'));
    $today_in_time = time();
    $start_time_with_delay = strtotime(do_shortcode('[pmpro_member field="membership_startdate"]') ) + $seconds_in_total_delay ;
?>

<!-- <p>delay in seconds: <?php  // echo $seconds_in_day * $member_delay ?></p>
<p>member to start date string: <?php  // echo do_shortcode('[pmpro_member field="membership_startdate"]') ?></p>
<p>member start date to time: <?php  // echo strtotime(do_shortcode('[pmpro_member field="membership_startdate"]')); ?></p>
<p>member start date to time with delay, <?php  // echo $member_delay; ?> day(s): <?php // echo strtotime(do_shortcode('[pmpro_member field="membership_startdate"]') ) + $seconds_in_total_delay ; ?></p>
<p>today: <?php  // echo time(); ?>
<p>string to date: <?php  // echo date('F j, Y',strtotime(do_shortcode('[pmpro_member field="membership_startdate"]'))); ?></p>
<p>When blog post is available: <?php  // echo date('F j, Y', strtotime(do_shortcode('[pmpro_member field="membership_startdate"]')) + $seconds_in_total_delay); ?></p> -->

<?php // if($today_in_time >= $start_time_with_delay) : ?>
    <div class="post-item post-button post-button-<?php echo $post->ID ?>">
        <?php if (has_post_thumbnail()) : ?>
                <div class="post-item-img"
                    style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>)"
                >
                </div>
        <?php endif; ?>

        <div class="post-item-body">
            <?php if(!is_tax()) : ?>
                <div class="category-wrapper">
                    <?php $categories = get_the_category($post->ID); ?>
                    <?php foreach($categories as $category) : ?>
                        <i class="normal-body-text category-text"><?php echo $category->name; ?></i>
                    <?php endforeach; ?>

                    
                </div>
            <?php endif; ?>

            <div class="post-title-wrapper">
                <p class="section-title small post-title"><?php the_title(); ?></p>
            </div>
        </div>
    </div>
<?php // else : ?>
    <!-- <div class="post-item not-available-yet">
        <p>Post not yet available until <?php // echo date('F j, Y', strtotime(do_shortcode('[pmpro_member field="membership_startdate"]')) + $seconds_in_total_delay); ?></p>
    </div> -->
<?php // endif; ?>

<div class="post-modal post-modal-<?php echo $post->ID ?>"></div>

<script type="text/javascript" >
    
    setTimeout(function() {
        $(document).ready(function () {

        <?php if($post->ID) : ?>

            $('.post-button-<?php echo $post->ID ?>').click(function() {

                $('.post-modal-<?php echo $post->ID ?>').css({"display": "block"})
                $('body').css({"overflow" : "hidden"})

                $('.post-modal-<?php echo $post->ID ?>').append(`
                    <div class="modal-content">
                        <div class="close-modal">&times;</div>
                        <?php if( is_home() ) :?>
                            <?php get_template_part('inc/components/single-blog-component'); ?>

                            
                        <?php else : ?>
                            <?php get_template_part('inc/components/single-drill-component'); ?>

                        <?php endif; ?>
                    </div>

                    <div class="modal-overlay"></div>
                `)

                const closeModal = () => {

                    $('body').css({"overflow" : "unset"})
                    $('.post-modal').empty();
                    $('.post-modal').css({"display": "none"});
                }

                $('.close-modal').click(function() {
                    closeModal();
                })

                $('.modal-overlay').click(function() {
                    closeModal();

                })

                $('.comment-submit').on('click', function(e) {
                    e.preventDefault()
                    var commentform=$('#commentform'); // find the comment form

                    commentform.find('#comment-status').remove()
                    commentform.prepend('<div id="comment-status" ></div>'); // add info panel before the form to provide feedback or errors
                    var statusdiv=$('#comment-status'); // define the infopanel

                        //serialize and store form data in a variable
                        var formdata=commentform.serialize();
                        //Add a status message
                        statusdiv.html('<p>Processing...</p>');
                        //Extract action URL from commentform
                        var formurl=commentform.attr('action');
                        //Post Form with data
                        $.ajax({
                            type: 'post',
                            url: formurl,
                            data: formdata,
                            error: function(XMLHttpRequest, textStatus, errorThrown){
                                    if(errorThrown === 'Conflict') {
                                        statusdiv.html(`<p class="ajax-error" >Duplicate post</p>`);
                                    }
                                },
                            success: function(data, textStatus){
                                if($('#comment').val() !== "") {

                                    var dt = new Date();
                                    const month = dt.toLocaleString('default', { month: 'long' });
                                    const time = dt.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true })

                                    var today = month + " " + dt.getDate() + ", " + dt.getFullYear() + " " + time.toLowerCase();
                                    

                                    if(data == "success" || textStatus == "success"){
                                        statusdiv.html('<p class="ajax-success" >Your comment has been inserted.</p>');
                                        $('.comment-list-initial').prepend(`
                                            <li class="comment byuser bypostauthor even thread-even depth-1">

                                                <div id="div-comment-116" class="comment-body">
                                                    <div class="comment-meta commentmetadata">
                                                        <a class="" href="">${today}</a>
                                                        <a class="comment-edit-link" href=${window.location.origin}/pup/wp-admin/edit-comments.php>(Edit)</a>
                                                    </div>
                                                    <p>${$('#comment').val()}</p>
                                                </div>
                                            </li>
                                        `)
                                        $('#comment').val(function() {
                                            $('#comment').val("")
                                        })



                                        

                                    }else{
                                        statusdiv.html('<p class="ajax-error" >Please wait a while before posting your next comment</p>');
                                        commentform.find('textarea[name=comment]').val('');
                                    }
                                } else {

                                    statusdiv.html('<p class="ajax-empty" >Please insert a comment.</p>');
                                }
                                }
                            });
                        return false;
                    
                        })

            });

        <?php endif; ?>


        })
    }, 500)


    
</script>
<!-- /.events-item -->

