<div class="container-fluid cta-container">
    <div class="cta-row row">
        <?php while(have_rows('cta_section', 'option')) : the_row(); 
            $image = get_sub_field('cta_image');
            $title = get_sub_field('cta_title');
            $button_link = get_sub_field('cta_button_link');
            $button_name = get_sub_field('cta_button_name');
        ?>
            <div class="cta-column col-12" style="background-image: url(<?php echo $image ?>)">
                <div class="cta-content-wrapper">
                    <h2 class="white section-title xlarge"><?php echo $title; ?></h2>

                    <a href="<?php echo $button_link ?>">
                        <button class="cta-button white-background black"><?php echo $button_name; ?></button>
                    </a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>