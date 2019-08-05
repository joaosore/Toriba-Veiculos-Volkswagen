import ScrollReveal from 'scrollreveal';

export function init_animate_zero_km()
{
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
		delay: 200
	});
	ScrollReveal().reveal('.universo .box-car picture', {  
		origin: 'left', 
		opacity: 0,
		easing: 'ease-in-out', 
		duration: 1000,
		delay: 50,
		interval: 150
	});
	ScrollReveal().reveal('.universo .box-car .title', {  
		origin: 'right', 
		opacity: 0,
		easing: 'ease-in-out', 
		duration: 1000,
		delay: 50,
		interval: 150
	});
	ScrollReveal().reveal('.universo .box-car .valor', {  
		origin: 'left', 
		opacity: 0,
		easing: 'ease-in-out', 
		duration: 1000,
		delay: 50,
		interval: 150
	});
	ScrollReveal().reveal('.universo .box-car .box-btn', {  
		opacity: 0,
		easing: 'ease-in-out', 
		duration: 1000,
		delay: 50,
		interval: 150
	});
}