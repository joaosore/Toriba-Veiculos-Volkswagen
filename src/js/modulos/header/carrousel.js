import owlCarousel from 'owl.carousel';

function start_carousel()
{
	$('.bar-phones-carroussel').owlCarousel({
	    nav:false,
	    dots: false,
	    autoplayTimeout:7500,
	    responsive:{
	        0:{
	        	loop:true,
	            items:1,
	            autoplay:true,
				
				autoplayHoverPause:true
	        },
	        991:{
	        	loop:true,
	            items:2,
				autoplay:true,
				autoplayHoverPause:true
	        },
	        1500:{
	        	loop:false,
	        	items:4,
	        	autoplay:false
	        }
	    }
	})
}
start_carousel();