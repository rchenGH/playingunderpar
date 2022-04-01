<?php get_header(); 
/* Template Name: Sign-In Page */
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

?>

    <!-- CONTENT -->

    <main id="main">

        <div class="container-fluid sign-in-container">
            <div class="row sign-in-row">
                
                <?php if(strpos($url,'action=reset_pass') !== false) : ?>
                    <div class="col-12 password-title-wrapper">
                        <h1 class="section-title large text-center">Forgot Your Password?</h1>
                    </div>
                <?php else : ?>
                    <?php if(!is_user_logged_in()) : ?>
                        <div class="col-12 login-title-wrapper">
                            <h1 class="section-title large text-center">Login</h1>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

                <div class="col-12 sign-in-column">
                    <?php echo do_shortcode('[pmpro_login show_menu="true" show_logout_link="true"]'); ?>
                </div>
            </div>
            <?php if(!is_user_logged_in()) : ?>
                <?php if(strpos($url,'action=reset_pass') !== false) : ?>
                    <div class="row ignore-row">
                        <div class="col-12 ignore-column">
                            <p class="normal-body-text">If you did not request a password reset, you can safely ignore this email. Only a person with access to your email can reset your account password.</p>
                        </div>
                    </div>

                <?php endif; ?>

                <div class="row not-member-row">
                    <div class="col-12">
                        <h2>Not a Member?</h2>
                        <p class="bold-label-text">
                            <a class="sign-up-link" href="<?php echo get_site_url() ?>/join-now/">Sign Up Now</a>
                        </p>
                    </div>
                </div>

                <?php if(strpos($url,'action=reset_pass') === false) : ?>
                    <div class="row consult-row">
                        <div class="col-12 consult-column">
                            <p class="normal-body-text consult-content">Consult your physician before beginning any exercise program.</p>
                        </div>
                    </div>
                <?php endif; ?>

            <?php endif; ?>
        </div>
    </main>
    <!-- /#main -->
        

<?php get_footer(); ?>