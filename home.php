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
				/* Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'content', get_post_format() );
			?>
		</div>

		<?php endwhile; ?>

			<?php 
			/**
			 *  Infinite next and previous post looping in WordPress
			 */
				if( get_adjacent_post(false, '', true) ) : ?> 
					<p class="previous"><?php previous_post_link('Previous Story<br> %link','%title');?></p>
				<?php else: 
				    $first = new WP_Query('posts_per_page=1&order=DESC'); $first->the_post();
				    	echo '<p class="previous"><a href="' . get_permalink() . '">Previous Story<br>' . the_title() . '</a></p>';
				  	wp_reset_query();
				endif; 
				    
				if( get_adjacent_post(false, '', false) ) : ?>
					<p class="next"><?php next_post_link('Next Story<br> %link','%title');?></p>
				<?php else: 
					$last = new WP_Query('posts_per_page=1&order=ASC'); $last->the_post();
				    	echo '<p class="next"><a href="' . get_permalink() . '">Next Story<br>' . the_title() . '</a></p>';
				    wp_reset_query();
				endif; ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
