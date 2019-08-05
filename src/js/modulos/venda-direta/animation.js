import ScrollReveal from 'scrollreveal';

export function init_animate_venda_direta()
{
	// Carousel
	ScrollReveal().reveal('.inicial', { 
		opacity: 0,
		easing: 'ease-in-out', 
		duration: 1000,
		delay: 50
	});


	// Inicial
	ScrollReveal().reveal('.box-titulo h2', { 
		origin: 'left', 
		easing: 'ease-in-out', 
		distance: '100px',
		duration: 1000,
		delay: 50,
		interval: 150
	});
	ScrollReveal().reveal('.box-titulo p', { 
		origin: 'left', 
		easing: 'ease-in-out', 
		distance: '150px',
		duration: 1000,
		delay: 50,
		interval: 150
	});

	ScrollReveal().reveal('.dados .box-title', { 
		origin: 'left', 
		easing: 'ease-in-out', 
		distance: '100px',
		duration: 1000,
		delay: 50,
		interval: 150
	});
	ScrollReveal().reveal('.dados .box-descricao', { 
		origin: 'left', 
		easing: 'ease-in-out', 
		distance: '150px',
		duration: 1000,
		delay: 50,
		interval: 150
	});
	ScrollReveal().reveal('.dados .interese', { 
		origin: 'left', 
		easing: 'ease-in-out', 
		distance: '200px',
		duration: 1000,
		delay: 50,
		interval: 150
	});

	ScrollReveal().reveal('.img-item', { 
		origin: 'rigth', 
		easing: 'ease-in-out', 
		distance: '100px',
		duration: 1000,
		delay: 50,
		interval: 150
	});

	
	
}