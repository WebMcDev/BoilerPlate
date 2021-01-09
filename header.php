<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<nav class="navbar navbar-expand-lg fixed-top">
		<div class="container-fluid">
			<a class="navbar-brand" href="/">
				<?php 
                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                        if ( has_custom_logo() ) {
                            echo '<img src="' . esc_url( $logo ) . '" alt="' . get_bloginfo( 'name' ) . '">';
                        } else {
                            echo get_bloginfo( 'name' );
                        } ?>
			</a>
			<button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="icon-bar top-bar"></span>
				<span class="icon-bar middle-bar"></span>
				<span class="icon-bar bottom-bar"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<?php wp_nav_menu( array(
					'theme_location'  => 'header-menu',
					'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
					'container'       => false,
					'menu_class'      => 'navbar-nav me-auto mb-2 mb-lg-0',
					'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
					'walker'          => new WP_Bootstrap_Navwalker(),
				) ); ?>
				<div class="float-end">
					<?php echo get_search_form(); ?>
				</div>
				
			</div>
		</div>
	</nav>
	<div class="page-container">
