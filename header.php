<!DOCTYPE html>
<html>

<head>
<?php $host = $_SERVER['HTTP_HOST']; 
if($host == "www.DOMAINNAME.com" or $host == "DOMAINNAME.com") { ?>
<!-- Google tag (gtag.js) -->
<?php } ?>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo get_bloginfo( 'name' );?></title>
    <meta name="description" content="<?php echo get_bloginfo( 'description' ); ?>">
    
    <?php wp_head(); ?>
</head>
<?php if( is_front_page() OR is_home() ) {
    echo '<!-- HOME -->'; } else {
    echo '<!-- ' . basename( get_page_template() ) . ' -->';
} ?>
<body class="<?php if( is_front_page() OR is_home() ) {
    echo 'home '; } else {
    echo basename( get_page_template() );
} ?>">
    
    <header class="">
        
        <nav class="navbar navbar-expand-lg">
          <div class="container">
              
            <?php if ( function_exists( 'the_custom_logo' ) ) {
                the_custom_logo();
            } ?>
              
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bs-example-navbar-collapse-1"
              aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
              <span class="icon-bar top-bar"></span>
              <span class="icon-bar middle-bar"></span>
              <span class="icon-bar bottom-bar"></span>
            </button>
              
<!--        dynamic menu-->
            <?php 
                wp_nav_menu( array(
                    'theme_location'  => 'primary',
                    'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
                    'container'       => 'div',
                    'container_class' => 'collapse navbar-collapse',
                    'container_id'    => 'bs-example-navbar-collapse-1',
                    'menu_class'      => 'navbar-nav mr-auto',
                    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'          => new WP_Bootstrap_Navwalker(),
                ) ); 
            ?>
          </div>
        </nav>

    </header>
