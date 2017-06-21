// Make the jQuery '$' operator usable in Wordpress
var $ = jQuery;

$(document).ready(function() {
	// Add Bootstrap responsive classes to post thumbnails
	$('img').addClass('img-responsive');

	// Dont display 'Wordpress Admin Bar' if site is displayed in a frame
	if (self!=top || parent!=top) {
		$('#wpadminbar').css('display','none');
	}

	// Change english prefixes to German
	$('.meta-prep-author').text('Von');
	$('.meta-prep-entry-date').text('Veröffentlicht am');

	// Remove hrefs from category links
	$('.cat_hl a').removeAttr('href');
});