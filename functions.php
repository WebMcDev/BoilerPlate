<?php 
/**
* Enqueue scripts and styles
*/
function your_theme_enqueue_scripts() {
    //slick slider
    wp_enqueue_script( 'slick-js', '//cdn.jsdelivr.net/jquery.slick/1.4.1/slick.min.js', 'jquery', '1.4.1' );
    wp_enqueue_script( 'init-js', get_stylesheet_directory_uri() . '/assets/js/main.js', 'jquery', 1.0 );
    wp_enqueue_style( 'slick-css', '//cdn.jsdelivr.net/jquery.slick/1.4.1/slick.css', '', '1.4.1' );
    
    // boostrap
    wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css', array(), 1 );
    wp_enqueue_script( 'bootstrap-script', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js', array('jquery'), '', true );
//    wp_enqueue_script( 'popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js', array('jquery'), '', true );
    
    wp_enqueue_style( 'main', get_stylesheet_directory_uri() . '/assets/style/compiled-css/main.css', array(), '2.0' );
    wp_enqueue_style( 'themeColors', get_stylesheet_directory_uri() . '/assets/style/compiled-css/theme-colors.css', array(), '1.0' );
}
add_action( 'wp_enqueue_scripts', 'your_theme_enqueue_scripts' );

add_theme_support( 'post-thumbnails' );
add_theme_support( 'custom-logo' );

register_nav_menus(
    array(
        'primary' => esc_html__( 'Primary menu', 'chcboilerplate' ),
    )
);

function mytheme_setup_theme_supported_features() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name'  => esc_attr__( 'Navy', 'producer' ),
            'slug'  => 'cigna-navy',
            'color' => '#110081',
        ),
        array(
            'name'  => esc_attr__( 'Action Blue', 'producer' ),
            'slug'  => 'action-blue',
            'color' => '#0033FF',
        ),
        array(
            'name'  => esc_attr__( 'Hypermint', 'producer' ),
            'slug'  => 'hypermint',
            'color' => '#3EFFC0',
        ),
        array(
            'name'  => esc_attr__( 'Mediumint', 'producer' ),
            'slug'  => 'mediumint',
            'color' => '#008F83',
        ),
        array(
            'name'  => esc_attr__( 'Tempermint', 'producer' ),
            'slug'  => 'tempermint',
            'color' => '#035C67',
        ),
        array(
            'name'  => esc_attr__( 'Dark Mint', 'producer' ),
            'slug'  => 'dark-mint',
            'color' => '#002F32',
        ),
        array(
            'name'  => esc_attr__( 'Light Leaf Green', 'producer' ),
            'slug'  => 'light-green',
            'color' => '#E6FAEE',
        ),
        array(
            'name'  => esc_attr__( 'Leaf Green', 'producer' ),
            'slug'  => 'leaf-green',
            'color' => '#03cc54',
        ),
        array(
            'name'  => esc_attr__( 'Dark Leaf Green', 'producer' ),
            'slug'  => 'dark-green',
            'color' => '#00874D',
        ),
        array(
            'name'  => esc_attr__( 'Light Orange', 'producer' ),
            'slug'  => 'light-orange',
            'color' => '#FACFBD',
        ),
        array(
            'name'  => esc_attr__( 'Orange', 'producer' ),
            'slug'  => 'chc-orange',
            'color' => '#faa163',
        ),
        array(
            'name'  => esc_attr__( 'Dark Orange', 'producer' ),
            'slug'  => 'dark-orange',
            'color' => '#ff4d00',
        ),
        array(
            'name'  => esc_attr__( 'Black', 'producer' ),
            'slug'  => 'black',
            'color' => '#000000',
        ),
        array(
            'name'  => esc_attr__( 'Digital Gray', 'producer' ),
            'slug'  => 'digital-gray',
            'color' => '#333333',
        ),
        array(
            'name'  => esc_attr__( 'Cool Gray', 'producer' ),
            'slug'  => 'cool-gray',
            'color' => '#f4f4f4',
        ),
        array(
            'name'  => esc_attr__( 'Champagne', 'producer' ),
            'slug'  => 'champagne',
            'color' => '#EDEBE7',
        ),
        array(
            'name'  => esc_attr__( 'White', 'producer' ),
            'slug'  => 'white',
            'color' => '#ffffff',
        ),
    ) );
}
add_action( 'after_setup_theme', 'mytheme_setup_theme_supported_features' );

function register_navwalker(){
	require_once get_template_directory() . '/assets/php/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

function my_gettext_hook_function( $translated_text, $text, $domain ) {
    if ('ws-form-user' === $domain) {
        switch ( $text ) {
            case 'Incorrect password.':
                $translated_text = 'The email address or password entered is incorrect. Please try again.';
                break;
            case 'Invalid email address.':
                $translated_text = 'The email address or password entered is incorrect. Please try again.';
                break;
        }
    }
    return $translated_text;
}
add_filter( 'gettext', 'my_gettext_hook_function', 20, 3 );

function theme_register_acf_blocks() {
    /**
     * We register our block's with WordPress's handy
     * register_block_type();
     *
     * @link https://developer.wordpress.org/reference/functions/register_block_type/
     */
    register_block_type( __DIR__ . '/blocks/hero' );
}
// Here we call our theme_register_acf_block() function on init.
add_action( 'init', 'theme_register_acf_blocks' );

add_action( 'template_redirect', 'redirect_404_to_homepage' );
    function redirect_404_to_homepage() {
        if ( is_404() ) {
            wp_safe_redirect( home_url( '/' ) );
            exit();
        }
    }