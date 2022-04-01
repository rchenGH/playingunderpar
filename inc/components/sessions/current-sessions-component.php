<?php $sessions = get_field('sessions'); 

$seconds_in_day = 86400;
$seconds_in_week = 86400 * 7;
$member_start_date_to_time = strtotime(do_shortcode('[pmpro_member field="membership_startdate"]'));
// $member_start_date_to_time = strtotime(do_shortcode('[pmpro_member field="user_registered"]'));
$today_in_time = time();
$difference = floor(($today_in_time - $member_start_date_to_time) / $seconds_in_week) + 1;
?>

<?php $i = 0; ?>
<!-- prevents for each error -->
<?php if (is_array($sessions) || is_object($sessions)) : ?>

    <!-- session offset for current week -->
    <?php if($difference < 1) : ?>
        <?php $difference = 1 ?>
    <?php endif; ?>

    <?php foreach(array_slice($sessions, -1 * 3 * $difference) as $session) : ?>

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