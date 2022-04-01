<?php
get_header();
global $post;

?>
    <main id="main">
        <!-- sessions archive page -->
        <div class="single-session-container container-fluid global-page-container">

            <div class="row title-row">
                <div class="col-12 title-column">
                    <?php if(get_the_title()) : ?>
                        <h1 class="section-title large"><?php the_title(); ?></h1>
                    <?php endif; ?>
                </div>
            </div>

            <?php while(have_rows('drills_row')) : the_row(); 
                $coach_notes = get_sub_field('coach_notes');
                $drills_title = get_sub_field('drills_title');
                $posts = get_sub_field('drills');
            ?>
                <div class="row global-page-row single-session-row ">

                    <div class="global-page-column col-12 single-session-title-column">
                        <h2><?php echo $drills_title ?></h2>
                    </div>

                    <div class="col-md-6 coach-column">
                        <div class="title-wrapper">
                            <h3 class="small-subtitle white m-0">Coach's Notes</h3>
                        </div>
                        <div class="coach-notes">
                            <?php echo $coach_notes;?>
                        </div>
                    </div>

                    <div class="col-md-6 drills-column">
                        <?php if( $posts ): ?>
                            <ul class="drills-list">
                            <?php foreach( $posts as $post ):  ?>

                                <?php setup_postdata($post); ?>
                                    <?php get_template_part('inc/components/post-item'); ?>
                                <div class="post-modal post-modal-<?php echo $post->ID ?>"></div>

                            <?php endforeach; ?>
                            </ul>
                            <?php wp_reset_postdata(); ?>
                        <?php endif; ?>

                    </div>
                </div>
            <?php endwhile; ?>

        </div>
    </main>

<?php get_footer(); ?>