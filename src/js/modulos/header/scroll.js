var lastScrollTop = 0;
setTimeout(function(){
	$('.bar-phones').addClass('scroll');
},150);
$(document).scroll(function(){
	var st = $(this).scrollTop();
	if (st > lastScrollTop){
		// downscroll code
		$('.bar-phones').addClass('hide');
	} else {
		// upscroll code
		$('.bar-phones').removeClass('hide');
	}
	lastScrollTop = st;
});