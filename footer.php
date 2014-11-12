<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package port
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<img id="footer-logo" src="<?php echo get_stylesheet_directory_uri() . '/img/logo2-black.png'; ?>" alt="Port LBC Logo" />
			<a href="mailto:info@portlbc.com"><p class="italics">info@portlbc.com</p></a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	<div id="page-overlay">
		<div class="dashicons dashicons-search"></div>
		<form class="search" id="js-search">
			<input type="text" id="js-search-text">
			<p>Type to begin searching.</p>	
		</form>
	</div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
