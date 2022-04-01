    <div id="footer" class="<?php if(is_user_logged_in()) : ?> logged-in-footer <?php endif; ?>">

        <div class="container-fluid footer-container">
            <div class="row footer-row">
                <div class="col-md-4 footer-menu-wrapper">
                    <?php if(!is_user_logged_in()) : ?>



                        <?php 
                            $footerLoggedOutMenuParam = array(
                                'theme_location' => 'logged-out-footer-menu',
                                'menu_class' => 'footer-menu', 
                            );
                        ?>
                        <?php wp_nav_menu($footerLoggedOutMenuParam); ?>
                    <?php else : ?>
                        <?php 
                            $footerLoggedInMenuDesktopParam = array(
                                'theme_location' => 'logged-in-footer-menu-desktop',
                                'menu_class' => 'footer-menu desktop', 
                            );

                            $footerLoggedInMenuMobileParam = array(
                                'theme_location' => 'logged-in-footer-menu-mobile',
                                'menu_class' => 'footer-menu mobile', 
                            );
                        ?>

                        <style>
                            .footer-item-home {
                                background-image: url(<?php the_field('footer_icon_home', 'option') ?>);
                            }

                            .footer-item-drills {
                                background-image: url(<?php the_field('footer_icon_drills', 'option') ?>);
                            }

                            .footer-item-statistics {
                                background-image: url(<?php the_field('footer_icon_statistics', 'option') ?>);
                            }

                            .footer-item-account {
                                background-image: url(<?php the_field('footer_icon_accounts', 'option') ?>);
                            }
                        </style>

                        <?php wp_nav_menu($footerLoggedInMenuDesktopParam); ?>

                        <?php wp_nav_menu($footerLoggedInMenuMobileParam); ?>
                    <?php endif; ?>
                </div>
                <div class="col-md-4 footer-logo-wrapper">
                    <a href="<?php echo get_site_url(); ?>/"><img class="footer-logo" src="<?php the_field('footer_logo', 'option') ?>" /></a>

                    <div class="copyright-wrapper white">
                        <?php the_field('footer_copyright', 'option') ?>
                    </div>
                </div>
                <div class="col-md-4 footer-social-media-wrapper">
                    <?php while(have_rows('footer_social_media', 'option')) : the_row(); 
                        $icon = get_sub_field('icon');
                        $link = get_sub_field('link');
                    ?>
                        <a href="<?php echo $link ?>">
                            <img class="instagram-icon" src="<?php echo $icon ?>" />
                        </a>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>

    </div>
    <!-- /#footer -->

    <?php wp_footer(); ?>
    
    </body>
</html>