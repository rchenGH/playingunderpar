<?php get_header(); 
/* Template Name: Membership Confirmation Page */
?>

    <!-- CONTENT -->

    <main id="main">
        
        <?php echo do_shortcode('[pmpro_confirmation]'); ?>
        <div class="profile-button-wrapper">
            <a class="small-link" href="<?php echo get_site_url() ?>/my-account">Complete Your Profile →</a>
        </div>
    </main>
    <!-- /#main -->
        

<?php get_footer(); ?>