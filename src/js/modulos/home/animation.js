import ScrollReveal from 'scrollreveal';

export function init_animate_home()
{
	// Carousel
	ScrollReveal().reveal('.inicial', { 
		opacity: 0,
		distance: '0px',
		easing: 'ease-in-out', 
		duration: 1000,
		delay: 50
	});


	// Universo
	ScrollReveal({ distance: '100px' });
	ScrollReveal().reveal('.universo h2', { 
		origin: 'left', 
		easing: 'ease-in-out', 
		duration: 1000,
		delay: 50
	});
	ScrollReveal().reveal('.universo .descricao', { 
		origin: 'left', 
		easing: 'ease-in-out', 
		duration: 1000,
		delay: 75
	});
	ScrollReveal().reveal('.universo .box-cabecalho .box-btn', { 
		origin: 'rigth', 
		easing: 'ease-in-out', 
		duration: 1000,
		delay: 100
	});

	ScrollReveal().reveal('.universo .owl-carousel-universo .owl-item', { 
		origin: 'bottom', 
		easing: 'ease-in-out', 
		duration: 500,
		delay: 50,
		interval: 150,
		beforeReveal: removeHiddenUniverso
	});

	var removeStyleUniverso = true;
	function removeHiddenUniverso(el)
	{
		if(removeStyleUniverso)
		{
			setTimeout(function(){
				$('.universo .owl-carousel-universo .owl-item').css('opacity', '1');
				$('.universo .owl-carousel-universo .owl-item').css('transform', 'matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1)');
			},2000);
			removeStyleUniverso = false;
		}
	}

	// Serviços

	ScrollReveal({ distance: '100px' });
	ScrollReveal().reveal('.card-custom', { 
		origin: 'bottom', 
		easing: 'ease-in-out', 
		duration: 1000,
		delay: 50,
		interval: 150
	});

	ScrollReveal({ distance: '0' });
	ScrollReveal().reveal('.card-custom .conteudo h2', { 
		opacity: 0,
		easing: 'ease-in-out', 
		duration: 1000,
		delay: 50,
		interval: 150
	});

	// Seminovos

	ScrollReveal({ distance: '100px' });
	ScrollReveal().reveal('.seminovos .owl-carousel-seminovos .owl-item', { 
		origin: 'bottom', 
		easing: 'ease-in-out', 
		duration: 1000,
		delay: 50,
		interval: 150,
		beforeReveal: removeHiddenSeminovos
	});

	var removeStyleSeminovos = true;
	function removeHiddenSeminovos(el)
	{
		if(removeStyleSeminovos)
		{
			setTimeout(function(){
				$('.seminovos .owl-carousel-seminovos .owl-item').css('opacity', '1');
				$('.seminovos .owl-carousel-seminovos .owl-item').css('transform', 'matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1)');
			},2000);
			removeStyleSeminovos = false;
		}
	}
}