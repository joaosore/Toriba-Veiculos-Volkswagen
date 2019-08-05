$(window).resize(function() {
	calc_header();
});

$(document).ready(function() {
   calc_header();
});

$(window).on('load', function() {
    
});

function calc_header()
{
	var height = $('header').height();
	$('.inicial').css('padding-top', height+'px');
}