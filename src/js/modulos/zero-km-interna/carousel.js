import owlCarousel from 'owl.carousel';
import {isMobile} from './../library.js';

export function init_carousel_zero_km_interna()
{
	startCarouselConteudo();
	startCarouselInteresses();
	startCarouselVersoes();
}

function startCarouselConteudo()
{
	var owl = $('.owl-carousel-conteudo');
	owl.owlCarousel({
	    nav:true,
	    dots: true,
		loop:false,
		items:1,
		autoplay:false,
	});
}

function startCarouselInteresses()
{
	var owl = $('.owl-carousel-interesses');
	owl.owlCarousel({
	    nav:true,
	    dots: true,
		loop:false,
		autoplay:false,
		responsive:{
	        0:{
	            items:1
	        },
	        1000:{
	            items:setItem('.owl-carousel-interesses .item'),
	            stagePadding:setPadding('.owl-carousel-interesses .item'),
	        }
	    }
	});
}

function startCarouselVersoes()
{
	var owl = $('.owl-carousel-versoes');
	owl.owlCarousel({
	    nav:true,
	    dots: true,
		loop:false,
		autoplay:false,
		responsive:{
	        0:{
	            items:1
	        },
	        1000:{
	            items:setItem('.owl-carousel-versoes .item'),
	            stagePadding:setPadding('.owl-carousel-versoes .item'),
	        },
	        1200:{
	            items:setItem('.owl-carousel-versoes .item'),
	            stagePadding:setPadding('.owl-carousel-versoes .item'),
	        },
	        1400:{
	            items:setItem('.owl-carousel-versoes .item'),
	            stagePadding:setPadding('.owl-carousel-versoes .item'),
	        },
	        1600:{
	            items:setItem('.owl-carousel-versoes .item'),
	            stagePadding:setPadding('.owl-carousel-versoes .item'),
	        }
	    }
	});
}

function setItem(el)
{
	var data = 4;
	var lenght = $(el).length;
	if(lenght < 4)
	{
		data = lenght;
	}
	return data;
}

function setPadding(el)
{

	var carousel = $(el).parent().width();
	var box_car = 320;

	console.log(carousel);

	var data;
	switch(setItem(el))
	{
		case 1:
			data = ((carousel - box_car) / 2);
			break;
		case 2:
			data = ((carousel - (box_car*2)) / 2);
			break;
		case 3:
			data = ((carousel - (box_car*3)) / 2);
			break;
		default:
			data = 0;
			break;
	}
	return data;
}