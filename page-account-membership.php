<?php get_header(); 
/* Template Name: Account Membership */
?>

    <!-- CONTENT -->

    <main id="main">

        <div class="global-page-container account-page-container">

            <div class="row title-row">
                <div class="col-12 title-column">
                    <?php if(get_the_title()) : ?>
                        <h1 class="section-title large"><?php the_title(); ?></h1>
                    <?php endif; ?>
                </div>
            </div>

            <div class='global-page-row row'>
                <div class="global-page-column col-12">

                    <div class="account-container container-fluid">
                        <div class="account-row row">

                            <div class="col-12 link-wrappers">
                                <div class="link-wrapper profile">
                                    <a href="<?php echo get_site_url(); ?>/account-profile/" class="link-title profile-title section-title large">Player Profile</a>
                                </div>
                                <div class="link-wrapper membership">
                                    <a class="link-title membership-title section-title large active">Membership</a>
                                </div>
                            </div>

                            <div class="col-12 form-wrapper">

                                <div class="membership-content">
                                    <div class="account-membership-container container-fluid">
                                        <?php echo do_shortcode('[pmpro_account sections="membership"]') ?>
                                        <div class="row account-membership-button-row">
                                            <?php if(!pmpro_hasMembershipLevel(array("2"))) : ?>
                                                <div class="col-md-6 col-12 account-membership-button-column">
                                                    <a class="account-membership-button-link" href="<?php echo get_site_url() ?>/join-now/?level=2">
                                                        <div class="account-membership-button" id="account-membership-button-2">
                                                            Switch to Monthly Golf Membership ($19.99)
                                                        </div>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                            <?php if(!pmpro_hasMembershipLevel(array("3"))) : ?>
                                                <div class="col-md-6 col-12 account-membership-button-column">
                                                    <a class="account-membership-button-link" href="<?php echo get_site_url() ?>/join-now/?level=3">
                                                        <div class="account-membership-button" id="account-membership-button-3">
                                                            Switch to Monthly Fitness Membership ($19.99)
                                                        </div>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                            <?php if(!pmpro_hasMembershipLevel(array("4"))) : ?>
                                                <div class="col-md-6 col-12 account-membership-button-column">
                                                    <a class="account-membership-button-link" href="<?php echo get_site_url() ?>/join-now/?level=4">
                                                        <div class="account-membership-button" id="account-membership-button-4">
                                                            Join Monthly Complete Program ($29.99 USD)
                                                        </div>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php echo do_shortcode('[pmpro_billing]'); ?>

                                    <?php echo do_shortcode('[pmpro_account sections="invoices"]') ?>
                                </div>
                            </div>
                            
                        </div>
                        <!-- account row -->
                    </div>
                    <!-- account container -->

                </div>
            </div>

        </div>


    </main>
    <!-- /#main -->
        

<?php get_footer(); ?>