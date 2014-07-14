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
			<a href="mailto:info@portlbc.com"><p class="email">info@portlbc.com</p></a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
