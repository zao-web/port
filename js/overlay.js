/**
 * overlay.js
 *
 * Handles toggling the whole screen overlay when nav button is clicked.
 */

jQuery( document ).ready( function( $ ) {
	$("#slider-btn").toggle(function() {
		$('#page-overlay').css('display','block');
		$('.menu-main-menu-container').css('display','block');
		$('#logo').html( portOverlayVars.logo_url );
		$('#slider-btn').html( portOverlayVars.slider_url );
	}, function(){
		$('#page-overlay').css('display','none');
		$('.menu-main-menu-container').css('display','none');
	});

	$( '.imagecol' ).hover(
		function() { $( this ).addClass( 'hover' ); },
		function() { $( this ).removeClass( 'hover' ); }
	);
});