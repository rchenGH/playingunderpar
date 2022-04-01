<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Playing Under Par - <?php the_title(); ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header id="header">
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="<?php echo get_site_url() ?>/">
            <img class="nav-logo" src="<?php the_field('nav_logo_white', 'option') ?>" />
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <div>
                <div class="hamburger-line line-1"></div>
                <div class="hamburger-line line-2"></div>
                <div class="hamburger-line line-3"></div>
            </div>
        </button>

        <div class="collapse navbar-collapse nav-menu" id="navbarNav">
            <?php 
                $accountMenuParam = array(
                    'theme_location' => 'account-menu',
                    'menu_class' => 'header-menu account-menu', 
                );
            ?>
            <?php if(!is_user_logged_in()) : ?>
                <?php 
                    $loggedOutMenuParam = array(
                        'theme_location' => 'logged-out-menu',
                        'menu_class' => 'header-menu', 
                    );
                ?>

                <?php wp_nav_menu($loggedOutMenuParam); ?>

            <?php else : ?>
                <?php
                    
                    $loggedInMenuParam = array(
                        'theme_location' => 'logged-in-menu',
                        'menu_class' => 'header-menu', 
                    );
                ?>

                <?php wp_nav_menu($loggedInMenuParam); ?>

                <?php 
                    $loggedInSubmenuParam = array(
                        'theme_location' => 'logged-in-submenu',
                        'menu_class' => 'header-submenu'
                    );
                ?>

                <div class="account-icon-wrapper <?php if(is_front_page()) : ?>white <?php else : ?>black <?php endif; ?>">
                    <div>
                        <?php if(is_front_page()) : ?>
                            <img src="<?php the_field('nav_account_icon_white', 'option') ?>" />
                        <?php else : ?>
                            <img src="<?php the_field('nav_account_icon_black', 'option') ?>" />
                        <?php endif; ?>
                    </div>

                    <div class="submenu">
                        <?php wp_nav_menu($loggedInSubmenuParam); ?>
                        <li class="menu-item"><a href="<?php echo wp_logout_url() ?>">Sign Out</a></li>
                    </div>
                </div>

            <?php endif; ?>
        </div>
    </nav>


</header>