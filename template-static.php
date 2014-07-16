<?php
/**
 * Template Name: Static Info Page
 *
 * 
 *
 * @package port
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="static-featured-image">
				<?php 
				if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				  the_post_thumbnail( 'full' );
				} ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'static', 'custom' ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- .featured-image -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
