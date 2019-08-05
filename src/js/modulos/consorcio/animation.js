import ScrollReveal from 'scrollreveal';

export function init_animate_consorcio()
{
	//Conteudo
	ScrollReveal().reveal('.cotacao h2', { 
		distance: '100px',
		origin: 'left',
		opacity: 0,
		easing: 'ease-in-out', 
		duration: 1000,
		delay: 50,
		interval: 150
	});

	ScrollReveal().reveal('.cotacao .box-textos p', { 
		distance: '100px',
		origin: 'rigth',
		opacity: 0,
		easing: 'ease-in-out', 
		duration: 1000,
		delay: 50,
		interval: 150,
	});

	ScrollReveal().reveal('.cotacao .form-group', { 
		distance: '100px',
		origin: 'rigth',
		opacity: 0,
		easing: 'ease-in-out', 
		duration: 1000,
		delay: 50,
		interval: 150,
	});

	ScrollReveal().reveal('.cotacao .box-button', { 
		distance: '100px',
		origin: 'bottom',
		opacity: 0,
		easing: 'ease-in-out', 
		duration: 1000,
		delay: 50,
		interval: 150,
		beforeReveal: removeHiddenConteudoBoxImg
	});

	function removeHiddenConteudoBoxImg(el)
	{
		var classEl = el.className;
		$('.'+classEl).css('opacity', '1');
		$('.'+classEl).css('transform', 'matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1)');
	}

}