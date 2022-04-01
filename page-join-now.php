<?php get_header(); 
/* Template Name: Join Now Page */
?>

    <!-- CONTENT -->

    <main id="main">
        <div class="join-now-container container-fluid">
            <div class="join-now-row row">
                <div class="col-md-6 join-now-column left">
                    <div class="join-image-wrapper">
                        <img src="<?php the_field('join_image') ?>" />
                        <div class="title-wrapper">
                            <h1 class="section-title xlarge white"><?php the_field('join_title'); ?></h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 join-now-column right">

                    <div class="plan-title-wrapper">
                        <h3 class="pmpro_checkout-h3-name"><?php the_field('plan_title') ?></h3>
                        <i class="very-small-body-text dark-green"><?php the_field('membership_note') ?></i>
                    </div>
                    <div class="form-wrapper">


                        <div class="payment-plan-section">

                            <?php while(have_rows("monthly_membership_plan_select")) : the_row(); 
                                $id = get_sub_field('id');
                                $plan_name = get_sub_field('membership_plan_name');
                                $price = get_sub_field('price');
                                $frequency = get_sub_field('frequency');
                            ?>
                                <a class="pmpro_btn pmpro_btn-select" id="membership-plan-<?php echo $id ?>" href="<?php echo get_site_url(); ?>/join-now/?level=<?php echo $id ?>">
                                    <span class="plan-name"><?php echo $plan_name ?></span>
                                    <span class="price-frequency">
                                        <span class="price">
                                            <?php echo $price ?>
                                        </span>

                                    </span>
                                    <span class="frequency">
                                        <?php echo $frequency; ?>
                                    </span>
                                </a>

                            <?php endwhile; ?>
                        </div>

                        <div class="not-sure">
                            <p class="very-small-body-text">Not sure if an individual plan is right for you? <a href="<?php echo get_site_url(); ?>/contact/">Book a Free Consultation</a></p>
                        </div>

                        <div class="payment-plan-section">
                            <h2 class="section-title medium"><?php the_field('payment_plan_title') ?></h2>

                            <?php while(have_rows("yearly_membership_plan_select")) : the_row(); 
                                $id = get_sub_field('id');
                                $plan_name = get_sub_field('membership_plan_name');
                                $price = get_sub_field('price');
                                $frequency = get_sub_field('frequency');
                            ?>
                                <a class="pmpro_btn pmpro_btn-select" id="membership-plan-<?php echo $id ?>" href="<?php echo get_site_url(); ?>/join-now/?level=<?php echo $id ?>">
                                    <span class="plan-name"><?php echo $plan_name ?></span>
                                    <span class="price-frequency">
                                        <span class="price">
                                            <?php echo $price ?>
                                        </span>

                                    </span>
                                    <span class="frequency">
                                        <?php echo $frequency; ?>
                                    </span>
                                </a>

                            <?php endwhile; ?>
                        </div>


                        <?php echo do_shortcode('[pmpro_checkout]'); ?> 


                    </div>
                </div>

                
            </div>
        </div>

        <script>

            // plan highlight
            const splitURL = window.location.href.split('=');
            let membershipPlanID = splitURL[splitURL.length -1]
            let membershipPlanIDNum = parseInt(membershipPlanID);
            if(membershipPlanIDNum) {
                $(`#membership-plan-${membershipPlanIDNum}`).css({'border': '2px solid black'})
            }

            for (let i = 0; i <= 8; i++) {
                if(i !== membershipPlanIDNum ) {
                    $(`#membership-plan-${i}`).css({'background-color': 'white'});
                    $(`#membership-plan-${i} span`).css({'color': '#C4C4C4'});
                } 

                if(isNaN(membershipPlanIDNum)) {
                    $(`#membership-plan-${i}`).css({'background-color': 'white'});
                    $(`#membership-plan-${i} span`).css({'color': 'black'});
                } 
                
                if(i === membershipPlanIDNum) {
                    $(`#membership-plan-${i}`).css({'background-color': 'black'});
                    $(`#membership-plan-${i} span`).css({'color': 'white'});
                }

                
            }


        </script>
       
    </main>
    <!-- /#main -->
        

<?php get_footer(); ?>