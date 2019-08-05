import owlCarousel from 'owl.carousel';
import {isMobile, dots} from './../../library.js';


export function universo_init_carousel()
{
	startCarouselUniverso();
}

function startCarouselUniverso()
{
	var owl = $('.owl-carousel-universo');
	owl.owlCarousel({
	    nav:true,
	    dots: true,
	    margin: 15,
		loop:false,
		items:5,
		autoplay:false,
		animateOut: 'fadeOut',
		animateIn: 'fadeIn',
		responsive:{
	        0:{
	            items:1
	        },
	        767:{
	            items:2
	        },
	        1000:{
	            items:4
	        },
	        1366:{
	            items:5,
	            nav:true,
	            loop:false
	        }
	    }
	});
	hover();
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

function hover()
{
	$(".owl-carousel-universo .item")
	.mouseenter(function() {
		$(this).find('.box-text').fadeIn().css('display', 'flex');
	})
	.mouseleave(function() {
		$(this).find('.box-text').fadeOut();
	});
}

function accessible_Name(owl)
{
	$(owl).find('.owl-prev').attr('aria-label', 'Voltar');
	$(owl).find('.owl-next').attr('aria-label', 'Avançar');
	$(owl).find('.owl-dot').attr('aria-label', 'Itens visiveis');
}