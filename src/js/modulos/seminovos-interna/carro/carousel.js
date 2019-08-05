import owlCarousel from 'owl.carousel';
import {isMobile} from './../../library.js';

export function inicial_init_carousel_car()
{
	startCarouselCar();
}

function startCarouselCar()
{
	var owl = $('.owl-carousel-car');
	var dots = $('.owl-dots-carousel-car');

	owl.owlCarousel({
		center: true,
	    nav:true,
	    dots: false,
		loop: false,
		items:1,
		lazyLoad: true
	});
	owl.on('changed.owl.carousel', function(event) {
		var index = event.item.index;
		dots.trigger('to.owl.carousel', index);
		setTimeout(function(){
			setColorSeta();
		}, 150);
	});
	dots.owlCarousel({
		center: true,
	    nav: true,
	    dots: false,
		loop: false,
		items:4,
		lazyLoad: true
	});
	dots.on('changed.owl.carousel', function(event) {
		var index = event.item.index;
		owl.trigger('to.owl.carousel', index);
		setTimeout(function(){
			setColorSeta();
		}, 150);
	});
	setColorSeta(owl);
	accessible_Name(owl);
	uni_thumbnail_carouse(owl);
}

function getColorSeta()
{
	var data = '';
	if(isMobile())
	{
		data = 'seta-mobile';
	}
	else
	{
		data = 'seta-desktop';
	}
	return $('.owl-carousel-car .owl-item.active').find('.item').data(data);
}

function setColorSeta(el)
{
	$('.owl-carousel-car .owl-nav button').css('background-color', getColorSeta());
	$('.owl-carousel-car .owl-dots button').css('background-color', getColorSeta());
}

function accessible_Name(owl)
{
	$(owl).find('.owl-prev').attr('aria-label', 'Voltar');
	$(owl).find('.owl-next').attr('aria-label', 'Avançar');
	$(owl).find('.owl-dot').attr('aria-label', 'Itens visiveis');
}


function uni_thumbnail_carouse(owl)
{
	$('.owl-dots-carousel-car .owl-item').click(function(){
		owl.trigger('to.owl.carousel', $(this).index());
	});
}
