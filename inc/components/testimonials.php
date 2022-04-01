
<div class="container-fluid testimonial-title-container">
    <div class="row testimonial-title-row">
        <div class="col-12">
            <h2 class="section-title medium-large">Testimonials</h2>
        </div>
    </div>
</div>

<div class="container-fluid testimonial-section-container">
     
    <?php while(have_rows('testimonials')) : the_row(); 
        $excerpt = get_sub_field('testimonial_excerpt'); 
        $name = get_sub_field('testimonial_name');
        $subtitle = get_sub_field('testimonial_subtitle');
    ?>
        <div class="testimonial-section-row row">

            <div class="testimonial-section-column col-12">
                <img class="quote-icon" src="<?php the_field('quote_icon') ?>" />
                <h3 class="section-title medium-small"><?php echo $name ?></h3>
                <i class="small-body-text"><?php echo $subtitle ?></i>
                <div class="excerpt-wrapper small-body-text">
                    <?php echo $excerpt; ?>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>