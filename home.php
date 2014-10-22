<?php
/*
 *
 * Description: This page displays the featured blog post and the previous and next blog posts.
 *
 * @package port
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

		<div class="blog-post">
			<div class="featured-image">
				<?php 
				if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
				  the_post_thumbnail( 'full' );
				} ?>

			</div><!-- .featured-image -->

			<?php
				get_template_part( 'content' );
			?>
		</div>

		<?php endwhile; ?>

			<?php get_template_part( 'content', 'postnav' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
