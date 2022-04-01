<?php acf_form_head(); ?>

<?php get_header(); 
/* Template Name: Member Session Page */

    global $post;
    global $current_user; wp_get_current_user();
    $seconds_in_day = 86400;
    $seconds_in_week = 86400 * 7;
    $member_start_date_to_time = strtotime(do_shortcode('[pmpro_member field="membership_startdate"]'));
    // $member_start_date_to_time = strtotime(do_shortcode('[pmpro_member field="user_registered"]'));
    $today_in_time = time();
    $difference = floor(($today_in_time - $member_start_date_to_time) / $seconds_in_week);


    
    if(pmpro_hasMembershipLevel(array("2")) ) {
        $program_title = "Monthly Golf Program";
    }

    if(pmpro_hasMembershipLevel(array("3")) ) {
        $program_title = "Monthly Fitness Program";
    }

    if(pmpro_hasMembershipLevel(array("4")) ) {
        $program_title = "Monthly Complete Program";
    }


    // monthly fitness
    if(pmpro_hasMembershipLevel(array("3")) ) {
        $post_type = 'monthly_member';

        if(get_user_meta($current_user->ID)['fitness-access'][0] === 'gym-workouts'){
            $id = 619;
            $program_subtitle = "Fitness Facility Access: Gym Workouts with Equipment";
        }

        if(get_user_meta($current_user->ID)['fitness-access'][0] === 'home-workouts'){
            $id = 621;
            $program_subtitle = "Fitness Facility Access: HomeWorkouts with Equipment";
        }

        if(get_user_meta($current_user->ID)['fitness-access'][0] === 'mobility-core'){
            $id = 625;
            $program_subtitle = "Fitness Facility Access: Mobility & Core";
        }
    }

    if(pmpro_hasMembershipLevel(array("2")) ) {
        $post_type = 'monthly_member';

        if(get_user_meta($current_user->ID)['golf-facility-access'][0] === 'indoor'){
            $id = 595;
            $program_subtitle = "Golf Facility Access: Indoor";
        }

        if(get_user_meta($current_user->ID)['golf-facility-access'][0] === 'outdoor-with-bunker'){
            $id = 598;
            $program_subtitle = "Golf Facility Access: Outdoor with Bunker";
        }

        if(get_user_meta($current_user->ID)['golf-facility-access'][0] === 'outdoor-without-bunker'){
            $id = 599;
            $program_subtitle = "Golf Facility Access: Outdoor without Bunker";
        }
    }



    if(pmpro_hasMembershipLevel(array("5", "6", "7", "8")) ) {
        $post_type = "individual_member";
        $program_title = "Individual Member";
    } 
?>

<?php if(pmpro_hasMembershipLevel(array("4")) ) : ?>
    <?php if(get_address() === get_site_url() . "/member-session/") : ?>
        <?php 
            $url = get_site_url( null, '/member-session/?program=golf', 'https' );
            wp_safe_redirect( $url );
            exit;
        ?>
    <?php endif; ?>

    <?php if(get_address() === get_site_url() . "/member-session/?program=golf" ) : ?>

        <?php
            $post_type = 'monthly_member';

            if(get_user_meta($current_user->ID)['golf-facility-access'][0] === 'indoor'){
                $id = 595;
                $program_subtitle = "Golf Facility Access: Indoor";
            }

            if(get_user_meta($current_user->ID)['golf-facility-access'][0] === 'outdoor-with-bunker'){
                $id = 598;
                $program_subtitle = "Golf Facility Access: Outdoor with Bunker";
            }

            if(get_user_meta($current_user->ID)['golf-facility-access'][0] === 'outdoor-without-bunker'){
                $id = 599;
                $program_subtitle = "Golf Facility Access: Outdoor without Bunker";
            }
        ?>
    <?php endif; ?>

    <?php if(get_address() === get_site_url() . "/member-session/?program=fitness" ) : ?>
        <?php
            $post_type = 'monthly_member';

            if(get_user_meta($current_user->ID)['fitness-access'][0] === 'gym-workouts'){
                $id = 619;
                $program_subtitle = "Fitness Facility Access: Gym Workouts with Equipment";
            }

            if(get_user_meta($current_user->ID)['fitness-access'][0] === 'home-workouts'){
                $id = 621;
                $program_subtitle = "Fitness Facility Access: HomeWorkouts with Equipment";
            }

            if(get_user_meta($current_user->ID)['fitness-access'][0] === 'mobility-core'){
                $id = 625;
                $program_subtitle = "Fitness Facility Access: Mobility & Core";
            }
        ?>
    <?php endif; ?>
<?php endif; ?>


    <main id="main">
        <div class="container-fluid sessions-container">
            <div class="row sessions-row">
                <div class='col-md-4 sessions-column left'>
                    <div class="column-wrapper top-left">
                        <img class="top-left-image" src="<?php the_field('top_left_image') ?>" />
                        <div class="top-right-image-wrapper">
                            <img class="top-right-image" src="<?php the_field('top_right_image'); ?>" />
                            <div class="overlay"></div>
                            <div class="title-wrapper">
                                <h2 class="medium-large-body-text white"><?php echo $program_title; ?></h2>
                                <h3 class="section-title medium-large white"><?php echo $program_subtitle; ?></h3>
                            </div>
                        </div>

                        <div class="completion-wrapper">
                            <h2 class="completion-title">PUP</h2>
                            
                            <div class="name-completion">
                                <h3 class="section-title medium name"><?php echo $current_user->first_name ?> <?php echo $current_user->last_name ?></h3>

                                <p class="normal-body-text sessions-completed">Sessions Completed 
                                    <span class="section-title medium-large completed-number">

                                        <?php 


                                        if(pmpro_hasMembershipLevel(array("2", "3", "4")) ) {
                                            $member_current = new WP_Query(array(
                                                'post_type' => $post_type,
                                                'post__status' => 'published',
                                                'order' => 'DESC',
                                                'post__in' => array($id),
                                                'posts_per_page' => '3',
                                            ));
                                        }

                                        if(pmpro_hasMembershipLevel(array("5", "6", "7", "8")) ) {
                                            $member_current = new WP_Query(array(
                                                'post_type' => $post_type,
                                                'post__status' => 'published',
                                                'order' => 'DESC',
                                                'posts_per_page' => '-1',
                                            ));
                                        }

                                            $member_current_query = $member_current;
                                        ?>

                                        <?php if( pmpro_hasMembershipLevel(array("2", "3", "4")) ) : ?>
                                            <?php while($member_current_query->have_posts()) : $member_current_query->the_post(); ?>
                                                <?php 
                                                    $sessions = get_field( 'sessions' );
                                                    if (is_array($sessions) || is_object($sessions)) {
                                                        $total = count( $sessions );
                                                    }

                                                ?>
                                            <?php endwhile; ?>
                                        <?php endif; ?>

                                        <?php if(pmpro_hasMembershipLevel(array("5", "6", "7", "8")) ) : ?>
                                            <?php if($current_user->ID === $member['ID']) : ?>

                                                <?php while($member_current_query->have_posts()) : $member_current_query->the_post(); ?>
                                                    <?php $member = get_field('user_id') ?>

                                                        <?php $sessions = get_field( 'sessions' ); ?>
                                                        <?php if (is_array($sessions) || is_object($sessions)) : ?>
                                                            <?php $total = count( $sessions ); ?>
                                                        <?php endif; ?>

                                                <?php endwhile; ?>
                                            <?php endif; ?>

                                        <?php endif; ?>

                                        <?php if( pmpro_hasMembershipLevel(array("2", "3", "4")) ) : ?>
                                            <?php if($total <= 3) : ?>
                                                0
                                            <?php else : ?>

                                                <?php
                                                    $total_with_offset = $total + 1;
                                                    $max_limit = ($total_with_offset - 4) / 3;

                                                    if($difference >= $max_limit) {
                                                        $difference = $max_limit;
                                                    }

                                                    $sessions_completed = $difference * 3;
                                                    
                                                    if($difference <= 0) {
                                                        $sessions_completed = 0;
                                                    }
                                                ?>
                                        
                                                <?php if($sessions_completed > $total): ?>
                                                    <?php echo $total - 3 ?>
                                                <?php else: ?>
                                                    <?php echo $sessions_completed; ?>
                                                <?php endif; ?>

                                            <?php endif; ?>
                                        <?php endif; ?>

                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="column-wrapper bottom-left">
                    </div>
                </div>

                <div class='col-md-8 sessions-column right'>

                    <div class="column-wrapper top-right">
                      
                        <?php if ( is_user_logged_in() ) : ?>
                            <h1 class="sessions-title section-title large"><?php echo 'Welcome ' . $current_user->display_name ?></h1>
                        <?php else : ?>
                            <?php wp_loginout(); ?>
                        <?php endif; ?>
                    </div>

                    <?php if( pmpro_hasMembershipLevel(array("4")) ) : ?>
                        <div class="column-wrapper middle-right">
                            <a href="<?php echo get_site_url() ?>/member-session?program=golf">
                                <div class="session-plan-button golf <?php if(get_address() === get_site_url() . "/member-session/?program=golf" ) : ?>active<?php endif; ?>">
                                    Golf
                                </div>
                            </a>
                            <a href="<?php echo get_site_url() ?>/member-session?program=fitness">
                                <div class="session-plan-button fitness <?php if(get_address() === get_site_url() . "/member-session/?program=fitness" ) : ?>active<?php endif; ?>">
                                    Fitness
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>

                    <div class="columm-wrapper bottom-right">
                        <div class="current-week-container container-fluid">
                            <div class="row current-week-title-row">
                                <div class="col-12 current-week-title-wrapper">
                                    <h2 class="section-title medium">This Week</h2>
                                </div>
                            </div>

                            <?php if( pmpro_hasMembershipLevel(array("2", "3", "4"))) : ?>

                                <?php while($member_current_query->have_posts()) : $member_current_query->the_post(); ?>
                                    <?php get_template_part('inc/components/sessions/current-sessions-component'); ?>

                                <?php endwhile; ?>

                            <?php endif; ?>

                            <?php if(pmpro_hasMembershipLevel(array("5", "6", "7", "8")) ) : ?>

                                    <?php while($member_current_query->have_posts()) : $member_current_query->the_post(); ?>
                                        <?php $member = get_field('user_id') ?>
                                        <?php $sessions = get_field('sessions'); ?>
                                        <?php if($current_user->ID === $member['ID']) : ?>

                                            
                                            <?php foreach($sessions as $session) : ?>

                                                <div class="row session-post-row">

                                                    <div class="col-12">
                                                    <p>
                                                        <p class="medium-large-body-text section-sub-title"><?php echo $session['lesson_name']; ?></p>
                                                        <div class="session-post-wrapper">
                                                            <span class="checkbox-wrapper">
                                                                <img src="<?php echo get_template_directory_uri() ?>/assets/images/checkmark.png" />
                                                            </span>

                                                            <?php if($session['session']->post_type) : ?>
                                                                <a class="section-title medium session-post-link" href="<?php echo get_site_url(); ?>/<?php echo $session['session']->post_type ?>/<?php echo $session['session']->post_name?>">
                                                                    <?php echo $session['session']->post_title ?>
                                                                </a>
                                                            <?php else : ?>
                                                                <a class="section-title medium session-post-link" href="<?php echo get_site_url(); ?>/<?php echo $session['session']->post_name?>">
                                                                    <?php echo $session['session']->post_title ?>
                                                                </a>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php if (++$i == 3) break; ?>
                                            <?php endforeach; ?>


                                        <?php endif; ?>
                                    <?php endwhile; ?>
                                
                            <?php endif; ?>

                        </div>

                        <!-- previous week -->

                        <div class="past-session-container container-fluid">


                            <?php 
                                if(pmpro_hasMembershipLevel(array("2", "3", "4")) ) {
                                    $member_past = new WP_Query(array(
                                        'post_type' => $post_type,
                                        'post__status' => 'published',
                                        'order' => 'DESC',
                                        'post__in' => array($id),
                                    ));

                                    $member_past_query = $member_past;
                                }

                                if(pmpro_hasMembershipLevel(array("5", "6", "7", "8")) ) {
                                    $member_past = new WP_Query(array(
                                        'post_type' => $post_type,
                                        'post__status' => 'published',
                                        'order' => 'DESC',
                                    ));

                                    $member_past_query = $member_past;
                                }

                            ?>

                            <!-- monthly -->
                            <?php if(pmpro_hasMembershipLevel(array("2")) || pmpro_hasMembershipLevel(array("3")) || pmpro_hasMembershipLevel(array("4"))) : ?>
                                
                                <?php  while($member_past_query->have_posts() ) : $member_past_query->the_post(); ?>

                                    <?php 

                                        if( get_query_var('paged') ) { 
                                            $page = get_query_var( 'paged' ); 
                                        }

                                        // Variables
                                        $row = 0;
                                    
                                        $sessions = get_field( 'sessions' );
                                        
                                        if (is_array($sessions) || is_object($sessions)) {
                                            $total = count( $sessions );
                                        }
                                        
                                        if($total >= 3) {
                                            $sessions_per_page  = 3; 

                                            $total_with_offset = $total + 1;
                                            $max_limit = ($total_with_offset - 4) / 3;

                                            if($difference >= $max_limit) {
                                                $difference = $max_limit;
                                            }

                                            $sessions_completed = $difference * 3;
                                            
                                            if($difference <= 0) {
                                                $sessions_completed = 0;
                                            }


                                            // $pages = ceil( $total / $sessions_per_page ) - 1;
                                            $pages = $sessions_completed / 3;
                                        }

                                        if($total < 3) {
                                            $sessions_per_page  = $total;
                                        }

                                        $total_with_offset = $total + 1;

                                        if($difference <= 0) {
                                            $pages = 1;
                                        }

                                        $max_limit = ($total_with_offset - 4) / 3;

                                        if($difference >= $max_limit) {
                                            $difference = $max_limit;
                                        }

                                        $sessions_offset = $total_with_offset - (($difference - 1) * 3);

                                        // $min = ( ( $page * $sessions_per_page ) - $sessions_per_page ) + 4; // original
                                                                                                
                                        $min = ( ( $page * $sessions_per_page ) - $sessions_per_page ) + $sessions_offset - 3;


                                        if($min <= 4) {
                                            $min = 4;
                                        }

                                        $max = ( $min + $sessions_per_page ) - 1;

                                    ?>

                                        <?php $rows_array = array(); ?>

                                        <?php if($difference > 0 ) : ?>
                                            <div class="row past-session-title-row">
                                                <div class="col-12 past-session-title-wrapper">
                                                    <h2 class="section-title medium">Past Sessions</h2>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                    
                                    <?php while(have_rows('sessions') ) : the_row(); 
                                        $lesson_name = get_sub_field('lesson_name');
                                        $session = get_sub_field('session');

                                        $row++;
                                        // Ignore this session if $row is lower than $min
                                        if($row < $min) { continue; }

                                        // Stop loop completely if $row is higher than $max
                                        if($row > $max) { break; } 
                                    ?>                                             
                                        <div class="row session-post-row">
                                            <div class="col-12">

                                                <p class="medium-large-body-text section-sub-title"><?php echo $lesson_name; ?></p>
                                                <div class="session-post-wrapper">
                                                    <span class="checkbox-wrapper">
                                                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/checkmark.png" />
                                                    </span>
                                                    <?php if($session->post_type) : ?>
                                                        <a class="section-title medium session-post-link" href="<?php echo get_site_url(); ?>/<?php echo $session->post_type ?>/<?php echo $session->post_name?>/">
                                                            <?php echo $session->post_title ?>
                                                        </a>
                                                    <?php else : ?>
                                                        <a class="section-title medium session-post-link" href="<?php echo get_site_url(); ?>/<?php echo $session->post_name?>/">
                                                            <?php echo $session->post_title ?>
                                                        </a>
                                                    <?php endif; ?>

                                                </div>
                                            </div>
                                        </div>

                                    <?php endwhile; ?>
                                    <!-- sessions -->

                                <?php endwhile; ?>
                                <!-- past query -->

                                <div class="pagination-wrapper">
                                    <?php
                                            // Pagination
                                            echo paginate_links( array(

                                            // 'base' => get_permalink() . 'page/%#%' . '/', 
                                            'format' => '?paged=%#%',
                                            'current' => $page,
                                            'show_all'           => true,
                                            'end_size'           => false,
                                            'mid_size'           => false,
                                            'prev_next'          => true,
                                            'total' => $pages,
                                            'prev_text'    => __('<span class="small-subtitle paginate paginate-prev black"><img class="pagination-icon" src="' . get_template_directory_uri() . '/assets/images/pagination-prev-icon.png" />&nbsp;&nbsp; Prev</span>'),
                                            'next_text'    => __('<span class="small-subtitle paginate paginate-next black">Next &nbsp;&nbsp;<img class="pagination-icon" src="' . get_template_directory_uri() . '/assets/images/pagination-next-icon.png" /></span>'),
                                            ) );
                                        ?>
                                </div>
                                    
                            <?php endif; ?>

                            <!-- individual -->
                            <?php if(pmpro_hasMembershipLevel(array("5", "6", "7", "8")) ) : ?>

                                <div class="row past-session-title-row">
                                    <div class="col-12 past-session-title-wrapper">
                                        <h2 class="section-title medium">Past Sessions</h2>
                                    </div>
                                </div>

                                <?php while($member_past_query->have_posts()) : $member_past_query->the_post(); ?>

                                    <?php $member = get_field('user_id') ?>

                                    <?php if($current_user->ID === $member['ID']) : ?>
                                        <?php 

                                            if( get_query_var('paged') ) { 
                                                $page = get_query_var( 'paged' ); 
                                            }

                                            // Variables
                                            $row                = 0;
                                            $sessions_per_page  = 3; // How many images to display on each page
                                            $sessions           = get_field( 'sessions' );

                                            if (is_array($sessions) || is_object($sessions)) {
                                                $total              = count( $sessions );
                                            }

                                            $pages              = ceil( $total / $sessions_per_page ) - 1;
                                            $min                = ( ( $page * $sessions_per_page ) - $sessions_per_page ) + 4;
                                            $max                = ( $min + $sessions_per_page ) - 1;
                                            ?>

                                         

                                            <?php while(have_rows('sessions')) : the_row(); 
                                                $lesson_name = get_sub_field('lesson_name');
                                                $session = get_sub_field('session');

                                                $row++;
                                                // Ignore this session if $row is lower than $min
                                                if($row < $min) { continue; }

                                                // Stop loop completely if $row is higher than $max
                                                if($row > $max) { break; } 
                                            ?>                                             
                                            <div class="row session-post-row">
                                                <div class="col-12">
                                                    <p class="medium-large-body-text section-sub-title"><?php echo $lesson_name; ?></p>
                                                    <div class="session-post-wrapper">
                                                        <span class="checkbox-wrapper">
                                                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/checkmark.png" />
                                                        </span>
                                                        <?php if($session->post_type) : ?>
                                                            <a class="section-title medium session-post-link" href="<?php echo get_site_url(); ?>/<?php echo $session->post_type ?>/<?php echo $session->post_name?>/">
                                                                <?php echo $session->post_title ?>
                                                            </a>
                                                        <?php else : ?>
                                                            <a class="section-title medium session-post-link" href="<?php echo get_site_url(); ?>/<?php echo $session->post_name?>/">
                                                                <?php echo $session->post_title ?>
                                                            </a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php endwhile; ?>

                                    <?php endif; ?>
                                <?php endwhile; ?>
                                <div class="pagination-wrapper">
                                    <?php
                                        // Pagination
                                        $pages              = ceil( $total / $sessions_per_page ) - 1;

                                        if( get_query_var('paged') ) { 
                                            $page = get_query_var( 'paged' ); 
                                        }
                                        echo paginate_links( array(

                                        'format' => '?paged=%#%',
                                        'current' => $page,
                                        'show_all'           => true,
                                        'end_size'           => false,
                                        'mid_size'           => false,
                                        'prev_next'          => true,
                                        'total' => $pages,
                                        'prev_text'    => __('<span class="small-subtitle paginate paginate-prev black"><img class="pagination-icon" src="' . get_template_directory_uri() . '/assets/images/pagination-prev-icon.png" />&nbsp;&nbsp; Prev</span>'),
                                        'next_text'    => __('<span class="small-subtitle paginate paginate-next black">Next &nbsp;&nbsp;<img class="pagination-icon" src="' . get_template_directory_uri() . '/assets/images/pagination-next-icon.png" /></span>'),
                                        ) );
                                    ?>
                                </div>
                            <?php endif; ?>
                            <?php wp_reset_postdata(); ?>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <!-- /#main -->


<?php get_footer(); ?>