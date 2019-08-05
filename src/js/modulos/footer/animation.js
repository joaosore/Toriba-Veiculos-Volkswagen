import ScrollReveal from 'scrollreveal';

export function init_animate_footer()
{
	// Contato
	ScrollReveal().reveal('.contato .box-cabecalho h2', { 
		origin: 'left', 
		easing: 'ease-in-out', 
		duration: 1000,
		delay: 50,
		distance: '100px'
	});
	ScrollReveal().reveal('.contato .box-cabecalho p', { 
		origin: 'left', 
		easing: 'ease-in-out', 
		duration: 1000,
		delay: 50,
		distance: '100px'
	});
	ScrollReveal().reveal('.contato .tipos-contaos .tipo', { 
		origin: 'left', 
		easing: 'ease-in-out', 
		duration: 1000,
		delay: 50,
		interval: 150,
		distance: '100px'
	});
	ScrollReveal().reveal('.contato .box-contato-p', { 
		opacity: 0,
		easing: 'ease-in-out', 
		duration: 1000,
		delay: 50,
		interval: 150,
		distance: '0'
	});
	ScrollReveal().reveal('.contato .box-contato-p', { 
		opacity: 0,
		easing: 'ease-in-out', 
		duration: 1000,
		delay: 50,
		interval: 150,
		distance: '0'
	});

	// // Maps
	// ScrollReveal().reveal('.maps h2', { 
	// 	origin: 'left', 
	// 	opacity: 0,
	// 	easing: 'ease-in-out', 
	// 	duration: 1000,
	// 	delay: 50,
	// 	interval: 150,
	// 	distance: '100px'
	// });
	// ScrollReveal().reveal('.maps .maps', { 
	// 	opacity: 0,
	// 	easing: 'ease-in-out', 
	// 	duration: 1000,
	// 	delay: 50,
	// 	interval: 150,
	// 	distance: '100px'
	// });
	// ScrollReveal().reveal('.maps .btn-rota', { 
	// 	origin: 'rigth', 
	// 	opacity: 0,
	// 	easing: 'ease-in-out', 
	// 	duration: 1000,
	// 	delay: 50,
	// 	interval: 150,
	// 	distance: '100px'
	// });
	// ScrollReveal().reveal('.maps .box-maps', { 
	// 	opacity: 0,
	// 	easing: 'ease-in-out', 
	// 	duration: 1000,
	// 	delay: 50,
	// 	distance: '0'
	// });

	// Grupo
	ScrollReveal().reveal('.grupo p', { 
		origin: 'left', 
		opacity: 0,
		easing: 'ease-in-out', 
		duration: 1000,
		delay: 50,
		interval: 150,
		distance: '100px'
	});

	ScrollReveal().reveal('.grupo .grupo-animate', { 
		opacity: 0,
		easing: 'ease-in-out', 
		duration: 1000,
		delay: 50,
		interval: 150,
		distance: '100px'
	});

	//Footer
	ScrollReveal().reveal('footer .menu p', {  
		origin: 'left', 
		opacity: 0,
		easing: 'ease-in-out', 
		duration: 1000,
		delay: 50,
		interval: 150,
		distance: '100px'
	});
	ScrollReveal().reveal('footer .menu .menu-animate', {  
		origin: 'bottom', 
		opacity: 0,
		easing: 'ease-in-out', 
		duration: 1000,
		delay: 50,
		interval: 150,
		distance: '100px'
	});
}
