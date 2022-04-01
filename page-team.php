<?php get_header(); 
/* Template Name: Team Page */
?>

    <!-- CONTENT -->

    <main id="main">

        <div class="global-page-container team-page-container">

            <div class="row title-row">
                <div class="col-12 title-column">
                    <?php if(get_the_title()) : ?>
                        <h1 class="section-title large"><?php the_title(); ?></h1>
                    <?php endif; ?>
                </div>
            </div>

            <div class='global-page-row row'>
                <div class="global-page-column col-12">
                    <div class="team-container container-fluid">
                        <?php if(get_field('team_members')) : ?>
                            <?php while(have_rows('team_members')) : the_row(); 
                                $job_title = get_sub_field('job_title');
                                $image = get_sub_field('team_member_image');
                                $name = get_sub_field('team_member_name');
                                $description = get_sub_field('team_member_description');
                                $email = get_sub_field('team_member_email');
                                $instagram_name = get_sub_field('team_member_instagram_name');
                                $instagram_link = get_sub_field('team_member_instagram_link');
                                $phone = get_sub_field('team_member_phone');
                            ?>
                                <div class="row team-member-row">
                                    <div class="col-md-6 image-wrapper">
                                        <img class="team-member-image" src="<?php echo $image ?>" />
                                    </div>
                                    <div class="col-md-6 team-member-description-wrapper">
                                        <h2 class="team-member-name section-title medium"><?php echo $name ?></h2>
                                        <h3 class="medium-large-body-text team-member-job">
                                            <?php echo $job_title; ?>
                                        </h3>
                                        <div class="normal-body-text team-member-description">
                                            <?php echo $description ?>
                                        </div>
                                        <?php if($email) : ?>
                                            <p>
                                                <span class="icon-wrapper"><img class="team-member-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/email-icon.png" /></span>&nbsp;
                                                <a class="normal-body-text team-member-link" href="mailto: <?php echo $email; ?>"><?php echo $email ?></a>
                                            </p>
                                        <?php endif; ?>
                                        <?php if($instagram_name) : ?>
                                            <p>
                                                <span class="icon-wrapper"><img class="team-member-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram-icon-black.png" /></span>&nbsp;
                                                <a class="normal-body-text team-member-link" href="<?php echo $instagram_link ?>"><?php echo $instagram_name ?></a>
                                            </p>
                                        <?php endif; ?>
                                        <?php if($phone) : ?>
                                            <p>
                                                <span class="icon-wrapper">
                                                    <img class="team-member-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/phone-icon.png" />
                                                </span>&nbsp;

                                                <?php if(wp_is_mobile()) : ?>
                                                    <a class="normal-body-text team-member-link" href="tel:1-<?php echo $phone ?>">
                                                        <?php echo $phone ?>
                                                    </a>
                                                <?php else : ?>
                                                    <span class="normal-body-text" href="tel:1-<?php echo $phone ?>">
                                                        <?php echo $phone ?>
                                                </span>
                                                <?php endif; ?>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                
                </div>
            </div>
        </div>
        
    </main>
    <!-- /#main -->
        

<?php get_footer(); ?>