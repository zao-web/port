<?php 
/**
 *  Infinite next and previous post looping in WordPress
 */
?>
	

<div class="post_nav">
	<?php if( get_adjacent_post(false, '', true) ) : 

		$previous_post = get_previous_post(); ?>

		<div class="previous-img"><?php echo get_the_post_thumbnail( $previous_post->ID );?></div>
		<p class="previous-title"><?php previous_post_link('Previous Story<br> %link','%title');?></p>
	
	<?php else: 
	    $first = new WP_Query('posts_per_page=1&order=DESC'); $first->the_post(); 
	    	$first_id = get_the_ID(); ?>

	    	<div class="previous-img">
	    		<?php echo get_the_post_thumbnail( $first_id );?>
	    	</div>
	    	<?php echo '<p class="previous-title">Previous Story<br><a href="' . get_permalink() . '">' . get_the_title() . '</a></p>';
	  	
	  	wp_reset_query(); ?>
	<?php endif; ?>
	
	    
	<?php if( get_adjacent_post(false, '', false) ) : 

		$next_post = get_next_post(); ?>
		
		<div class="next-img"><?php echo get_the_post_thumbnail( $next_post->ID ); ?></div>
		<p class="next-title"><?php next_post_link('Next Story<br> %link','%title');?></p>

	<?php else: 
		$last = new WP_Query('posts_per_page=1&order=ASC'); $last->the_post();
			$last_id = get_the_ID(); ?>

			<div class="next-img">
				<?php echo get_the_post_thumbnail( $last_id ); ?>
			</div>
	    	<?php echo '<p class="next-title">Next Story<br><a href="' . get_permalink() . '">' . get_the_title() . '</a></p>';
	    wp_reset_query(); ?>
	<?php endif; ?>
</div>

