import ScrollReveal from 'scrollreveal';

export function init_animate_seminivos()
{
	// Cars
	ScrollReveal().reveal('.box-car', { 
		origin: 'rigth', 
		easing: 'ease-in-out', 
		distance: '100px',
		duration: 1000,
		delay: 50,
		interval: 150
	});
	
}