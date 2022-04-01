
<div class="container-fluid faq-container">

    <div class="row faq-title-row">
        <div class="col-12 faq-title-column">
            <h2 class="section-title medium-large">FAQ</h2>
        </div>
    </div>

    <!-- -1 represents unlimited posts -->
    <?php
        $faq = new WP_Query(array(
            'post_type' => 'faq',
            'posts_per_page' => -1,
            'post__status' => 'published',
            'order' => 'DESC'
        ));

        $wp_query = $faq;

    ?>

    <?php while($wp_query->have_posts()) : $wp_query->the_post(); ?>
        <div class="row faq-row">
            <div class="col-12 faq-column">
                <div aria-expanded="false" data-toggle="collapse" data-target="#faq-<?php echo $wp_query->current_post +1; ?>" class="question" id="question-<?php echo $wp_query->current_post +1; ?>">
                    <h3 class="section-title small">
                        <?php the_title(); ?><div class="dropdown-arrow"></div>
                    </h3>
                </div>

                <div id="faq-<?php echo $wp_query->current_post +1; ?>" class="collapse content-wrapper">
                    <div class="normal-body-text"><?php the_content(); ?></div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
    
</div>