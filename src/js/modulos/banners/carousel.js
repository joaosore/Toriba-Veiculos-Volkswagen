import owlCarousel from 'owl.carousel';
import {isMobile} from './../library.js';

export function inicial_init_banners()
{
	startCarouselBanners();
}

function startCarouselBanners()
{
	var owl = $('.owl-carousel-banners');
	owl.owlCarousel({
	    nav:true,
	    dots: true,
		loop:true,
		items:1,
		autoplay:true,
		autoplayTimeout:5000,
	});
	owl.on('changed.owl.carousel', function(event) {
		setTimeout(function(){
			setColorSeta();
		}, 150);
	});
	setColorSeta(owl);
	accessible_Name(owl);
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
	return $('.owl-carousel-banners .owl-item.active').find('.item').data(data);
}

function setColorSeta(el)
{
	$('.owl-carousel-banners .owl-nav button').css('background-color', getColorSeta());
	$('.owl-carousel-banners .owl-dots button').css('background-color', getColorSeta());
}

function accessible_Name(owl)
{
	$(owl).find('.owl-prev').attr('aria-label', 'Voltar');
	$(owl).find('.owl-next').attr('aria-label', 'Avançar');
	$(owl).find('.owl-dot').attr('aria-label', 'Itens visiveis');
}
