<?php get_header(); 
/* Template Name: Coach's Info */
?>

    <!-- CONTENT -->

    <main id="main">
        <div class="coachs-info-top-wrapper">
            <img class="top-image" src="<?php the_field('top_image') ?>" />
        </div>

        <div class="container-fluid coachs-info-container">
            <div class="row coachs-info-row">
                <div class="col-12">
                    <h1 class="section-title large"><?php the_field('title') ?></h1>
                </div>

                <?php while(have_rows('programs')) : the_row(); 
                    $subtitle = get_sub_field('subtitle');
                    $content = get_sub_field('content');
                    $button_name = get_sub_field('button_name');
                    $button_link = get_sub_field('button_link');
                    $subtext = get_sub_field('subtext');
                ?>
                    <div class="col-12 coachs-info-column">
                        <h2 class="section-title medium"><?php echo $subtitle ?></h2>
                        <div class="medium-large-body-text content-wrapper">
                            <?php echo $content ?>
                        </div>

                        <div class="button-wrapper">
                            <a href="<?php echo $button_link; ?>">
                                <button class="black-background white">
                                    <?php echo $button_name ?>
                                </button>
                            </a>

                            <p class="very-small-body-text subtext">
                                <?php echo $subtext ?>
                            </p>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </main>
    <!-- /#main -->
        

<?php get_footer(); ?>