<?php

define('THEME_WEB_ROOT', get_template_directory_uri());
define('THEME_DOCUMENT_ROOT', get_template_directory());

define('STYLE_WEB_ROOT', get_stylesheet_directory_uri());
define('STYLE_DOCUMENT_ROOT', get_stylesheet_directory());

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

add_theme_support('post-thumbnails');

function my_init()
{
    add_theme_support('post-thumbnails');

    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_deregister_script('jquery-migrate');

        wp_register_script('jquery', get_template_directory_uri() . '/assets/vendor/jquery.min.js', false, '3.4.1', true);
        wp_register_script('jquery-migrate', get_template_directory_uri() . '/assets/vendor/jquery-migrate.min.js', false, '3.1.0', true);
        wp_register_script('modernizr', get_template_directory_uri() . '/assets/vendor/modernizr.js', false, '3.6.0');

        wp_register_script('main-js', get_template_directory_uri() . '/assets/scripts/frontend.min.js', false, '1.0.0', true);

        wp_register_style('main-css', get_template_directory_uri() . '/assets/css/frontend.min.css');

        wp_enqueue_style('material-icons', 'https://fonts.googleapis.com/icon?family=Material+Icons', false);

        wp_enqueue_script('jquery');
        wp_enqueue_script('jquery-migrate');
        wp_enqueue_script('main-js');
        wp_enqueue_script('modernizr');
        wp_enqueue_style('main-css');
    }
}

function add_custom_js_file_to_admin( $hook ) {
    wp_enqueue_script ( 'profile', get_template_directory_uri() . '/assets/vendor/profile.js' );
  }
  add_action('admin_enqueue_scripts', 'add_custom_js_file_to_admin');

function register_my_menu()
{
    register_nav_menu('logged-out-menu', __('Logged Out Menu'));
    register_nav_menu('logged-in-menu', __('Logged In Menu'));
    register_nav_menu('account-menu', __('Account Menu'));
    register_nav_menu('logged-in-submenu', __('Logged In Submenu'));
    register_nav_menu('logged-out-submenu', __('Logged Out Submenu'));

    register_nav_menu('logged-out-footer-menu', __('Logged Out Footer Menu'));
    
    register_nav_menu('logged-in-footer-menu-mobile', __('Logged In Footer Menu - Mobile'));
    register_nav_menu('logged-in-footer-menu-desktop', __('Logged In Footer Menu - Desktop'));
}

add_action('wp_enqueue_scripts', 'my_init');
add_action('init', 'register_my_menu');


require_once 'inc/functions/blog-search.php';
require_once 'inc/functions/account-fields.php';
require_once 'inc/functions/post-type-search.php';

//reserved words: ‘thumb’, ‘thumbnail’, ‘medium’, ‘large’, ‘post-thumbnail’
set_post_thumbnail_size(600, 400, true);
//add_image_size('main-headline', 640, 350, true);

// remove junk from head
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);


@ini_set( 'upload_max_size' , '128M' );
@ini_set( 'post_max_size', '128M');
@ini_set( 'max_execution_time', '300' );

if (function_exists('acf_add_options_page')) {
    acf_add_options_page();

    acf_add_options_sub_page('Header', array(
        'page_title' => 'Header',
        'menu_title' => 'Header',
        'capability' => 'edit_posts',
        'parent_slug' => 'theme-options',
        'position' => 'false',
        'icon_url' => 'false',
    ));

    acf_add_options_sub_page('CTA', array(
        'page_title' => 'CTA',
        'menu_title' => 'CTA',
        'capability' => 'edit_posts',
        'parent_slug' => 'theme-options',
        'position' => 'false',
        'icon_url' => 'false',
    ));

    acf_add_options_sub_page('Premium Members Only', array(
        'page_title' => 'Premium Members Only',
        'menu_title' => 'Premium Members Only',
        'capability' => 'edit_posts',
        'parent_slug' => 'theme-options',
        'position' => 'false',
        'icon_url' => 'false',
    ));

    acf_add_options_sub_page('Not Yet Available', array(
        'page_title' => 'Not Yet Available',
        'menu_title' => 'Not Yet Available',
        'capability' => 'edit_posts',
        'parent_slug' => 'theme-options',
        'position' => 'false',
        'icon_url' => 'false',
    ));

    acf_add_options_sub_page('Logged Out Footer', array(
        'page_title' => 'Logged Out Footer',
        'menu_title' => 'Logged Out Footer',
        'capability' => 'edit_posts',
        'parent_slug' => 'theme-options',
        'position' => 'false',
        'icon_url' => 'false',
    ));
}

$customPostTaxonomies = get_object_taxonomies('drill');

if(count($customPostTaxonomies) > 0)
{
     foreach($customPostTaxonomies as $tax)
     {
         $args = array(
              'orderby' => 'name',
              'show_count' => 0,
              'pad_counts' => 0,
              'hierarchical' => 1,
              'taxonomy' => $tax,
              'title_li' => ''
            );

         wp_list_categories( $args );
     }
}



function enable_comments_custom_post_type() {
    add_post_type_support( 'drills', 'comments' );
}
add_action( 'init', 'enable_comments_custom_post_type', 11 );add_post_type_support( 'single-drills', 'comments' );

// change date format for comments
add_filter( 'get_comment_date', 'wpsites_change_comment_date_format' );	
function wpsites_change_comment_date_format( $d ) {
    $d = date("F j, Y");	
    return $d;
}

function admin_default_page() {
    return get_site_url();
}
  
add_filter('login_redirect', 'admin_default_page');
add_filter('logout_redirect', 'admin_default_page');


//function to modify default WordPress query
function wpb_custom_query( $query ) {
 
// Make sure we only modify the main query on the homepage  
    if( $query->is_main_query() && ! is_admin() && $query->is_home() ) {
    
        // Set parameters to modify the query
        $query->set( 'orderby', 'date' );
        $query->set( 'order', 'DESC' );
        $query->set( 'suppress_filters', 'true' );
    }
}
    
// Hook our custom query function to the pre_get_posts 
add_action( 'pre_get_posts', 'wpb_custom_query' );


add_filter( 'template_include', function( $template ) 
{
    // your custom post types
    $my_types = array( 'mf_session', 'im_session', 'mg_indoor_session', 'mg_wo_bunker_session', 'mg_w_bunker_session', 'mf_gym_workout', 'mf_home_workout', 'mf_mobility_core', 'mc_session' );
    $post_type = get_post_type();

    if ( ! in_array( $post_type, $my_types ) )
        return $template;

    return get_stylesheet_directory() . '/single-session.php'; 
});

add_action( 'wp_print_scripts', 'pp_deregister_javascript', 99 );

function pp_deregister_javascript() {
	if(!is_admin())
	{
		 wp_dequeue_script('wp-color-picker');
		 wp_deregister_script( 'jquery-ui-datepicker' );
		 wp_deregister_script( 'wp-color-picker-js-extra' );
		 wp_deregister_script( 'wp-color-picker' );

	}
}

function get_address() {
    $protocol = $_SERVER['HTTPS'] == 'on' ? 'https' : 'http';
    return $protocol.'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
}