<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package port
 */
?>

<article class="static" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="static-entry-header">
		<?php the_title( '<h1 class="blogs-entry-title">', '</h1>' ); ?>
	</header><!-- .blogs-entry-header -->

	<div class="static-entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'port' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .blogs-entry-content -->

</article><!-- #post-## -->
