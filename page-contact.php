<?php get_header(); 
/* Template Name: Contact Page */
?>
    <main id="main">

        <div class="global-page-container contact-page-container">

            <div class="row title-row">
                <div class="col-12 title-column">
                    <?php if(get_the_title()) : ?>
                        <h1 class="section-title large"><?php the_title(); ?></h1>
                    <?php endif; ?>
                </div>
            </div>

            <div class='row global-page-row'>
                <div class="col-12 global-page-column">
                    <?php echo do_shortcode('[contact-form-7 id="105" title="Contact Page Form"]'); ?>
                </div>
            </div>
        </div>
        
    </main>
    <!-- /#main -->
        

<?php get_footer(); ?>