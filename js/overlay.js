/**
 * overlay.js
 *
 * Handles toggling the whole screen overlay when nav button is clicked.
 */

jQuery( document ).ready( function( $ ) {
	var original_logo = $('#logo').attr('src');
	var original_slider = $('#slider-btn').attr('src');

	$('#slider-btn').toggle(function() {
		$('#page-overlay').css('display','block');
		$('.menu-main-menu-container').css('display','block');
		$('#logo').html( portOverlayVars.logo_url );
		$('#slider-btn').attr( 'src', portOverlayVars.slider_url );
	}, function(){
		$('#page-overlay').css('display','none');
		$('.menu-main-menu-container').css('display','none');
		$('#logo').children().attr('src' original_logo );
		$('#slider-btn').attr( 'src', original_slider );
	});

	$( '.imagecol' ).hover(
		function() { $( this ).addClass( 'hover' ); },
		function() { $( this ).removeClass( 'hover' ); }
	);
});