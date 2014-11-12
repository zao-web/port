/**
 * select.js
 *
 * Handles changing the select options into radio buttons
 */

jQuery( document ).ready( function( $ ) {
	  	$('option[value*="-- Please Select --"').remove();

	 	$('.wpsc_select_variation').each(function (selectIndex, selectElement) {

	    var select = $(selectElement);
	    var container = $("<div class='radioSelectContainer' />");
	    select.parent().append(container);
	    container.append(select);

	    select.find('option').each(function (optionIndex, optionElement) {
	      var radioGroup = select.attr('id') + "Group";
	      var getValue = select.html();
	      var value = select.val(getValue);
	      
	      var label = $("<label />");
	      container.append(label);
	      

	      $("<input type='radio' name='" + radioGroup + "' />")
	          .attr("value", value)
	          .appendTo(label);

	      $("<span>" + $(this).val() + "</span>").appendTo(label);
	    });
	});
});