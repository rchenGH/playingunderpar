<?php get_header(); 
/* Template Name: Update Payment Page */
?>

    <!-- CONTENT -->

    <main id="main">

        <div class="global-page-container update-payment-page-container">

            <div class="row title-row">
                <div class="col-12 title-column">
                    <?php if(get_the_title()) : ?>
                        <h1 class="section-title large"><?php the_title(); ?></h1>
                    <?php endif; ?>
                </div>
            </div>

            <div class='global-page-row row'>
                <div class="global-page-column col-12">
                    <div class="update-payment-container container-fluid">
                        <?php echo do_shortcode('[pmpro_billing]') ?>
                    </div>
                
                </div>
            </div>
        </div>
        
    </main>
    <!-- /#main -->
        

<?php get_footer(); ?>