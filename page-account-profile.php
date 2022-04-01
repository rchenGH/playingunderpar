<?php get_header(); 
/* Template Name: Account Profile */
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
                                    <a class="link-title profile-title section-title large active">Player Profile</a>
                                </div>
                                <div class="link-wrapper membership">
                                    <a href="<?php echo get_site_url(); ?>/account-membership/" class="link-title membership-title section-title large">Membership</a>
                                </div>
                            </div>

                            <div class="col-12 form-wrapper">
                                <div class="profile-content">
                                    <?php echo do_shortcode('[pmpro_member_profile_edit]'); ?>
                                </div>

                            </div>
                            <script type="text/javascript">

                                $('.pmpro_member_profile_edit-fields').append('<a href="<?php echo get_site_url() ?>/my-account/?view=change-password">Click here to change password</a>')
                                $('.pmpro_change_password_wrap').parent().prepend('<a href="<?php echo get_site_url() ?>/my-account/">Back to Profile</a>')


                                let membershipName = ('<?php echo do_shortcode('[pmpro_member field="membership_name"]') ?>').toLowerCase()

                                if(membershipName === "monthly complete membership") {
                                    $('#golf-facility-access_div').css('display', 'block');
                                    $('#fitness-access_div').css('display', 'block');
                                }

                                if(membershipName === "monthly golf membership") {
                                    $('#golf-facility-access_div').css('display', 'block');
                                    $('#fitness-access_div').css('display', 'none');
                                    console.log('golf member')
                                }

                                if(membershipName === "monthly fitness program") {
                                    $('#golf-facility-access_div').css('display', 'none');
                                    $('#fitness-access_div').css('display', 'block');
                                    console.log('fitness member')
                                }
                            </script>
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