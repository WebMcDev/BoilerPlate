<?php

require_once get_template_directory() . '/inc/php/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/inc/php/required-plugins.php';

function my_scripts() {
	// Bootstrap
    wp_enqueue_style('bootstrap5', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css');
    wp_enqueue_script( 'boot5-js','https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js','','',true );
	
	//Slick Slider
	wp_enqueue_style( 'slick-css',  get_stylesheet_directory_uri() . '/inc/slick/slick.css', array());
	wp_enqueue_style( 'slick-theme-css',  get_stylesheet_directory_uri() . '/inc/slick/slick-theme.css' );
	wp_enqueue_script( 'slick-js',  get_stylesheet_directory_uri() . '/inc/slick/slick.js', array( 'jquery' ), '1.8.4', TRUE );
	wp_enqueue_script( 'slick-init',   get_stylesheet_directory_uri() . '/inc/js/slick-init.js', array( 'slick-js' ), '1.0.0',  TRUE );
	
	//FontAwesome
	wp_enqueue_script( 'FontAwesome','https://kit.fontawesome.com/7baefe520e.js','','', FALSE );
	
	//Theme JS
	wp_enqueue_script( 'boilerplate-js',  get_stylesheet_directory_uri() . '/inc/js/boilerplate.js', array('jquery'), '1.0.0', TRUE );
	
    wp_enqueue_style( 'dashicons' );
	
	//Ajax Loads file
	wp_enqueue_script('ajax-trigger', get_template_directory_uri() . '/inc/js/ajax-trigger.js', array('jquery'), NULL, true);
    
    wp_localize_script( 'ajax-trigger', 'wp_ajax',
        array(
            'ajax_url' => admin_url('admin-ajax.php'), // WordPress AJAX
            'posts' => json_encode( $loop->query_vars ), // everything about your loop is here
            'current_page' => $loop->query_vars['paged'] ? $loop->query_vars['paged'] : 1,
            'max_page' => $loop->max_num_pages
        )
    );
}
add_action( 'wp_enqueue_scripts', 'my_scripts' );

add_action( 'wp_ajax_nopriv_filter', 'filter_ajax' );
add_action( 'wp_ajax_filter', 'filter_ajax' );

require_once get_template_directory() . '/inc/php/ajax-load.php';


function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' )
     )
   );
 }
 add_action( 'init', 'register_my_menus' );

function register_navwalker(){
	require_once get_template_directory() . '/inc/wp-bootstrap-navwalker-master/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

add_theme_support( 'custom-logo' );
add_theme_support( 'post-thumbnails' );

// REMOVE COMMENTS
add_action('admin_init', function () {
    // Redirect any user trying to access comments page
    global $pagenow;
    
    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url());
        exit;
    }

    // Remove comments metabox from dashboard
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

    // Disable support for comments and trackbacks in post types
    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
});

// Close comments on the front-end
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);



// Remove items in menu
function remove_menus() {
//	remove_menu_page( 'index.php' );                  //Dashboard
//	remove_menu_page( 'jetpack' );                    //Jetpack* 
//	remove_menu_page( 'edit.php' );                   //Posts
//	remove_menu_page( 'upload.php' );                 //Media
//	remove_menu_page( 'edit.php?post_type=page' );    //Pages
	remove_menu_page( 'edit-comments.php' );          //Comments
//	remove_menu_page( 'themes.php' );                 //Appearance
//	remove_menu_page( 'plugins.php' );                //Plugins
//	remove_menu_page( 'users.php' );                  //Users
//	remove_menu_page( 'tools.php' );                  //Tools
//	remove_menu_page( 'options-general.php' );        //Settings
}
add_action( 'admin_menu', 'remove_menus' );

// Create Global 'Options' page for ACF -- 
// read more here: 
// https://www.advancedcustomfields.com/resources/acf_add_options_page/
//add_action('acf/init', 'my_acf_op_init');
//function my_acf_op_init() {
//
//    // Check function exists.
//    if( function_exists('acf_add_options_page') ) {
//		  // Basic Page
//        acf_add_options_page();
//
//        // Register options page with custom settings
//        $option_page = acf_add_options_page(array(
//            'page_title'      => __('Theme General Settings'),
//            'menu_title'      => __('Theme Settings'),
//            'menu_slug'       => 'theme-general-settings',
//            'capability'      => 'edit_posts',
//            'redirect'        => false,
//            'autoload'        => true,
//			  'position'        => '',
//			  'icon_url'        => '',
//			  'post_id'         => 'options',
//			  'update_button'   => __('Update', 'acf'),
//			  'updated_message' => __("Options Updated", 'acf')
//        ));
//    }
//}


// Turn on Google Maps in ACF
//function my_acf_init() {
//    acf_update_setting('google_api_key', 'Google API Key');
//}
//add_action('acf/init', 'my_acf_init');
