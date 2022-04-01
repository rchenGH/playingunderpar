<?php get_header(); 
/* Template Name: Membership Levels Page */
?>

    <!-- CONTENT -->

    <main id="main">

        <?php echo do_shortcode('[pmpro_levels]'); ?>
        <div class="profile-button-wrapper">
            <a class="small-link" href="<?php echo get_site_url() ?>/my-account">Back to My Account →</a>
        </div>
    </main>
    <!-- /#main -->
        

<?php get_footer(); ?>