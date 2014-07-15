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

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'port' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			
		<?php if( is_front_page() || is_page( 'news' )) : ?>
			<a id="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_stylesheet_directory_uri() . '/img/logo-white.png'; ?>" alt="Port LBC Logo" /></a>
		<?php else: ?>
			<a id="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_stylesheet_directory_uri() . '/img/logo-black.png'; ?>" alt="Port LBC Logo" /></a>
		<?php endif; ?>

		</div>

		<?php if( is_page( 'home' )) : ?>

			<div class="home-hero">
				<img src="<?php the_field( 'hero_image_1' ); ?>" />
			</div><!-- .home-image -->

			<div class="social-media">
				<a href="https://www.facebook.com/portlbc"><div class="dashicons dashicons-facebook-alt"></div></a>
				<a href="http://instagram.com/portlbc"><img src="<?php echo get_stylesheet_directory_uri() . '/img/instagram.png'; ?>" alt="Instagram Icon" /></a>
			</div><!-- .social-media -->

		<?php endif; ?>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle"><?php _e( 'Primary Menu', 'port' ); ?><img src="<?php echo get_stylesheet_directory_uri() . '/img/menu-white.png'; ?>" /></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
