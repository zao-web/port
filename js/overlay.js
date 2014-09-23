/**
 * overlay.js
 *
 * Handles toggling the whole screen overlay when nav button is clicked.
 */

jQuery( document ).ready( function( $ ) {
	var original_logo = $('#logo img').attr('src');
	var original_slider = $('#slider-btn').attr('src');

	$('#slider-btn').toggle(function() {
		$('#page-overlay').fadeIn("slow");
		$('.menu-main-menu-container').slideDown(800);
		$('.dashicons-search').fadeIn("slow");
		$('#logo').html( portOverlayVars.logo_url );
		$('#slider-btn').attr( 'src', portOverlayVars.slider_url );
	}, function(){
		$('#page-overlay').fadeOut("slow");
		$('.menu-main-menu-container').slideUp(300);
		$('.dashicons-search').fadeOut("slow");
		$('#logo img').attr('src', original_logo );
		$('#slider-btn').attr( 'src', original_slider );
	});

	$('.dashicons-search').toggle(function() {
		$('.menu-main-menu-container').fadeOut(600);
	}, function(){
		$('.menu-main-menu-container').fadeIn(600);
	})

	$( '.imagecol' ).hover(
		function() { $( this ).addClass( 'hover' ); },
		function() { $( this ).removeClass( 'hover' ); }
	);
});