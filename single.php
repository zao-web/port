<?php
/**
 * The template for displaying all single posts.
 *
 * @package port
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="featured-image">
				<?php 
				if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				  the_post_thumbnail( 'full' );
				} ?>

			</div><!-- .featured-image -->

			<?php get_template_part( 'content', 'single' ); ?>

			<?php port_post_nav(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>