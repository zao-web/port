<?php
/**
 * port functions and definitions
 *
 * @package port
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'port_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function port_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on port, use a find and replace
	 * to change 'port' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'port', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'port' ),
		'category' => __( 'Category Menu', 'port' )
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'port_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // port_setup
add_action( 'after_setup_theme', 'port_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function port_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'port' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'port_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function port_scripts() {
	wp_enqueue_style( 'port-style', get_stylesheet_uri() );

	wp_enqueue_style( 'port-carousel-style', get_template_directory_uri()  . '/css/bootstrap-partial.css' );

	wp_enqueue_script( 'port-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'port-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'port-overlay', get_template_directory_uri() . '/js/overlay.js', array( 'jquery'), '', true );

	$img_fragment = '<img src="%s" alt="%s" />';

	wp_localize_script( 'port-overlay', 'portOverlayVars', array(
	    'logo_url'   => sprintf( $img_fragment, get_stylesheet_directory_uri() . '/img/logo-white.png', 'Port LBC Logo' ),
	    'slider_url' => get_stylesheet_directory_uri() . '/img/menu-white.png'
	) );
	
	wp_enqueue_script( 'port-carousel', 'http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.0/js/bootstrap.js' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_register_style( 'roboto-font', 'http://fonts.googleapis.com/css?family=Roboto');
    
    wp_enqueue_style( 'roboto-font' );

    wp_enqueue_style( 'dashicons' );
}
add_action( 'wp_enqueue_scripts', 'port_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Pulls in images, tagline, and links from front-page ACF
 */
function port_module( $number ) { ?>

	<div class="module" id="img-<?php echo absint( $number ); ?>">
		 
		<?php $image = get_field( 'image_' . $number ); ?>

		<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

		<?php
 
			$link = get_field( 'image_' . $number . '_link' );
			$tag = get_field( 'image_' . $number . '_tagline');
			
			if ( ! empty( $link ) &&  ! empty( $tag ) ) { ?>

			<a class="overlay" href="<?php echo esc_url( $link ); ?>">
				<?php 
					echo '<p class="tagline">' . esc_html( $tag ) . '</p>';
					echo '<p class="cta italics">Shop Now</p>';
				?>
			</a>
		
		<?php } ?>
		
	</div>
	<?php
}

/**
 * Home Slider Carousel, code courtesy of Roland Warmerdam http://codepen.io/Rowno/pen/Afykb
 */
function port_carousel() { ?>
	<?php 
		$image1 = get_field( 'hero_image_1' );
		$image2 = get_field( 'hero_image_2' ); 
		$image3 = get_field( 'hero_image_3' );  
	?>
	
	<div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
		<ul class="carousel-indicators">
			<li data-target="#carousel" data-slide-to="0" class="active"></li>
		    <li data-target="#carousel" data-slide-to="1"></li>
		    <li data-target="#carousel" data-slide-to="2"></li>
		</ul>
		<!-- Carousel items -->
  		<div class="carousel-inner">
	  		<?php if ( get_post_meta(get_the_ID(), 'hero_image_1', true)) : ?>
			    <div class="active item"><img src="<?php echo $image1['url']; ?>" alt="<?php echo $image1['alt']; ?>" /></div>
			<?php endif; ?>

			<?php if ( get_post_meta(get_the_ID(), 'hero_image_2', true)) : ?>
			    <div class="item"><img src="<?php echo $image2['url']; ?>" alt="<?php echo $image2['alt']; ?>" /></div>
			<?php endif; ?>
			    
			<?php if ( get_post_meta(get_the_ID(), 'hero_image_2', true)) : ?>
			    <div class="item"><img src="<?php echo $image3['url']; ?>" alt="<?php echo $image3['alt']; ?>" /></div>
			<?php endif; ?>
  		</div>
	</div>
	<?php 
}

add_filter( 'wp_nav_menu_objects', 'port_add_category_menu_item', 10, 2 );

function port_add_category_menu_item( $menu_items, $args ) {

	if ( 'category' !== $args->theme_location ) {
		return $menu_items;
	}

	if ( ! is_singular( 'wpsc-product' ) ) {
		return $menu_items;
	}

	$current_link = get_permalink();

	foreach ( $menu_items as $key => $menu_item ) {
		if ( false !== strpos( $current_link, $menu_item->url ) ) {
			$menu_items[ $key ]->classes[] = 'current-category-item';
		}
	}

	return $menu_items;
}

/**
* Hide/Remove Decimal Point on Product Price by http://www.agusmu.com
**/
	add_filter( 'wpsc_toggle_display_currency_code', 'amu_hide_decimal_point' );
	function amu_hide_decimal_point( $args ) {
		$args['display_decimal_point'] = false;
		return $args;
	}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
