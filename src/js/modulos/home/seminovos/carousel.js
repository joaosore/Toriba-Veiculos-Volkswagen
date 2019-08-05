import owlCarousel from 'owl.carousel';
import {isMobile, dots} from './../../library.js';


export function seminovos_init_carousel()
{
	startCarouselSeminovos();
}

function startCarouselSeminovos()
{
	var owl = $('.owl-carousel-seminovos');
	owl.owlCarousel({
	    nav:false,
	    dots: false,
	    margin: 15,
		loop:false,
		items:4,
		autoplay:false,
		animateOut: 'fadeOut',
		animateIn: 'fadeIn',
		responsive:{
	        0:{
	            items:1,
	            nav: true,
				dots: true,
	        },
	        767:{
	            items:2,
	            nav: true,
				dots: true,
	        },
	        1000:{
	            items:4
	        }
	    }
	});
	accessible_Name(owl);
	if(isMobile())
	{
		owl.on('changed.owl.carousel', function(event) {
		setTimeout(function(){
				dots(event.item, owl);
			}, 150);
		});
		dots('init', owl);
	}
}

function accessible_Name(owl)
{
	$(owl).find('.owl-prev').attr('aria-label', 'Voltar');
	$(owl).find('.owl-next').attr('aria-label', 'Avançar');
	$(owl).find('.owl-dot').attr('aria-label', 'Itens visiveis');
}