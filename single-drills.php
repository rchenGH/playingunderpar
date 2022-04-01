<?php
get_header();
?>
    <main id="main">

        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post() ?>
                <?php get_template_part('inc/components/single-drill-component'); ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </main>

<?php get_footer(); ?>