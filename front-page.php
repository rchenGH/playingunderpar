<?php get_header(); ?>

    <!-- CONTENT -->

    <main id="main">
        <div class="container-fluid hero-container">

            <div class="row hero-row">
                <?php while(have_rows('hero_section')) : the_row(); 
                    $hero_video_link = get_sub_field('hero_video_link');
                    $hero_image = get_sub_field('hero_image');
                    $hero_title = get_sub_field('hero_title');
                    $hero_subtitle = get_sub_field('hero_subtitle');

                    $membership_button_text = get_sub_field('membership_button_text');
                    $program_button_text = get_sub_field('program_button_text');
                    $membership_button_link = get_sub_field('membership_button_link');
                    $program_button_link = get_sub_field('program_button_link');
                ?>
                    <div class="col-12 hero" <?php if(!$hero_video_link) : ?>style="background-image: url(<?php echo $hero_image ?>)"<?php endif; ?>>
                        <?php if($hero_video_link) : ?>
                            <video class="hero-video" muted loop autoloop autoplay >
                                <source src="<?php echo $hero_video_link ?>" type="video/mp4">                                
                            </video>

                        <?php endif; ?>

                        <div class="hero-content-wrapper">
                            <h1 class="hero-title white"><?php echo $hero_title; ?></h1>
                            <h2 class="small-subtitle white"><?php echo $hero_subtitle; ?></h2>
                            <a href="<?php echo $membership_button_link ?>">
                                <button class="transparent-background white"><?php echo $membership_button_text ?></button>
                            </a>
                            <a href="<?php echo $program_button_link ?>">
                                <button class="white-background black"><?php echo $program_button_text ?></button>
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>

        <div class="container-fluid home-membership-container brand-grey">
            <div class="row home-membership-row">
                <div class="col-12 home-membership-column">
                    <?php while(have_rows('home_membership_section')) : the_row(); 
                        $section_image = get_sub_field('section_image');
                        $section_title = get_sub_field('section_title');
                        $section_description = get_sub_field('section_description');

                        $membership_button_text = get_sub_field('membership_button_text');
                        $program_button_text = get_sub_field('program_button_text');
                        $membership_button_link = get_sub_field('membership_button_link');
                        $program_button_link = get_sub_field('program_button_link');
                    ?>
                        <img class="membership-section-image" src="<?php echo $section_image ?>" />
                        <h2 class="section-title large"><?php echo $section_title ?></h2>
                        <div class="section-description"><?php echo $section_description ?></div>

                        <div class="button-wrapper row">
                            <div class="col-md-6 col-12 button-column">
                                <a href="<?php echo $membership_button_link ?>">
                                    <button class="transparent-background black membership-button"><?php echo $membership_button_text ?></button>
                                </a>
                            </div>
                            <div class="col-md-6 col-12 button-column">
                                <a href="<?php echo $program_button_link ?>">
                                    <button class="black-background white program-button"><?php echo $program_button_text ?></button>
                                </a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>

            <?php while(have_rows('monthly_membership_section')) : the_row(); 
                $title = get_sub_field('title');
                $description = get_sub_field('description');
                $button_link = get_sub_field('button_link');
                $button_name = get_sub_field('button_name');
                $image = get_sub_field('image');
                $conect_name = get_sub_field('connect_name');
                $connect_link = get_sub_field('connect_link')
            ?>
                <div class="row monthly-membership-row">
                    <div class="col-md-6">
                        <h2 class="section-title medium-large"><?php echo $title ?></h2>
                        <div class="monthly-membership-description-wrapper small-body-text">
                            <?php echo $description; ?>
                        </div>
                        <?php if($button_name) : ?>
                            <div class="button-wrapper">
                                <a href="<?php echo $button_link; ?>">
                                    <button class="black-background white"><?php echo $button_name; ?></button>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6 image-column">
                        <img src="<?php echo $image; ?>" />
                    </div>
                </div>
            <?php endwhile; ?>

            <?php while(have_rows('individual_program_section')) : the_row();
                $title = get_sub_field('title');
                $description = get_sub_field('description');
                $button_link = get_sub_field('button_link');
                $button_name = get_sub_field('button_name');
                $connect_with_us_name = get_sub_field('connect_with_us_name');
                $connect_with_us_link = get_sub_field('connect_with_us_link')
            ?>
                <div class="row individual-programs-row">
                    
                    <div class="col-md-6 individual-program-images">
                        <div class="container-fluid">
                            <div class="row">
                                <?php while(have_rows('images')) : the_row(); 
                                    $image = get_sub_field('image');
                                ?>
                                    <span class="image-wrapper"><img src="<?php echo $image['url'] ?>" /></span>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 individual-programs-column">
                        
                        <h2 class="section-title medium-large"><?php echo $title ?></h2>
                        <div class="monthly-membership-description-wrapper small-body-text">
                            <?php echo $description; ?>
                        </div>
                        <?php if($button_name) : ?>
                            <div class="button-wrapper">
                                <a href="<?php echo $button_link; ?>">
                                    <button class="black-background white"><?php echo $button_name; ?></button>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <?php if($connect_with_us_name) : ?>
                            <div class="connect-button-wrapper">
                                <p class="small-body-text mb-0">Not sure if an individual program is right for you?</p>
                                <a class="small-body-text" id='connect-link' href="<?php echo $connect_with_us_link ?>"><?php echo $connect_with_us_name ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>

            <?php while(have_rows('instructor_link_section')) : the_row() ; 
                $subtitle = get_sub_field('subtitle');
                $button_link = get_sub_field('button_link');
                $button_name = get_sub_field('button_name');
            ?>
                <div class="instructor-button-wrapper container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="section-title medium-small"><?php echo $subtitle ?></h3>
                            <a href="<?php echo $button_link ?>">
                                <button class="black-background white">
                                    <?php echo $button_name; ?>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <?php get_template_part("inc/components/testimonials"); ?>
        <?php get_template_part('inc/components/faq'); ?>
        <?php get_template_part('inc/components/cta'); ?>

    </main>
    <!-- /#main -->
        

<?php get_footer(); ?>