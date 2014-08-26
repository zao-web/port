<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package port
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php 
	global $post;

	$category = array (
		'theme_location' 	=> 'category',
		'menu' 				=> 'Categories Menu',
		'container'			=> 'div',
		'container_class'	=> 'category-nav',
		'items_wrap'      	=> '<ul id="%1$s" class="%2$s">%3$s</ul>'
	);
?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'port' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			
			<?php if( is_front_page() || is_home() || is_single() ) : ?>
				<a id="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_stylesheet_directory_uri() . '/img/logo-white.png'; ?>" alt="Port LBC Logo" /></a>
			<?php else: ?>
				<a id="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_stylesheet_directory_uri() . '/img/logo-black.png'; ?>" alt="Port LBC Logo" /></a>
			<?php endif; ?>

		</div><!--.site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">

		<?php if( is_front_page() || is_home() || is_single() ) : ?>
			<img id="slider-btn" src="<?php echo get_stylesheet_directory_uri() . '/img/menu-white.png'; ?>" />
		<?php elseif( is_products_page() || is_tax( 'wpsc_product_category' ) || is_singular( 'wpsc-product' ) ) : ?>	
			<img id="slider-btn" src="<?php echo get_stylesheet_directory_uri() . '/img/menu-black.png'; ?>" />
		<?php else: ?>	
			<img id="slider-btn" src="<?php echo get_stylesheet_directory_uri() . '/img/menu-black.png'; ?>" />
		<?php endif; ?>	
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>

		<?php if( is_page( 'home' ) ) :
			port_carousel(); ?>

			<div class="social-media">
				<a href="https://www.facebook.com/portlbc"><div class="dashicons dashicons-facebook-alt"></div></a>
				<a href="http://instagram.com/portlbc"><img src="<?php echo get_stylesheet_directory_uri() . '/img/instagram.png'; ?>" alt="Instagram Icon" /></a>
			</div><!-- .social-media -->
		<?php endif; ?>
		</nav><!-- #site-navigation -->
		
		<nav id="secondary-navigation">
			<?php if ( is_products_page() || is_tax( 'wpsc_product_category' ) || is_singular( 'wpsc-product' ) ) {
				wp_nav_menu( $category );
			} ?>
		</nav><!-- #secondary-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
