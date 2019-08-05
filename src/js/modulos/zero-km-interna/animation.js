import ScrollReveal from 'scrollreveal';

export function init_animate_zero_km_interna()
{
	// Carousel
	ScrollReveal().reveal('.inicial', { 
		distance: '0px',
		opacity: 0,
		easing: 'ease-in-out', 
		duration: 1000,
		delay: 50
	});

	// Box BTNs
	ScrollReveal().reveal('.box-btn', { 
		distance: '100px',
		origin: 'rigth',
		opacity: 0,
		easing: 'ease-in-out', 
		duration: 1000,
		delay: 50,
		interval: 150
	});

	//Conteudo
	ScrollReveal().reveal('.conteudo h2', { 
		distance: '100px',
		origin: 'left',
		opacity: 0,
		easing: 'ease-in-out', 
		duration: 1000,
		delay: 50,
		interval: 150
	});

	ScrollReveal().reveal('.conteudo .box-textos p', { 
		distance: '100px',
		origin: 'rigth',
		opacity: 0,
		easing: 'ease-in-out', 
		duration: 1000,
		delay: 50,
		interval: 150,
	});

	ScrollReveal().reveal('.conteudo .owl-carousel-conteudo .owl-item .box-img', { 
		distance: '100px',
		origin: 'left',
		opacity: 0,
		easing: 'ease-in-out', 
		duration: 1000,
		delay: 50,
		interval: 150,
		beforeReveal: removeHiddenConteudoBoxImg
	});

	var removeStyleConteudoBoxImg = true;
	function removeHiddenConteudoBoxImg(el)
	{
		if(removeStyleConteudoBoxImg)
		{
			setTimeout(function(){
				$('.conteudo .owl-carousel-conteudo .owl-item .box-img').css('opacity', '1');
				$('.conteudo .owl-carousel-conteudo .owl-item .box-img').css('transform', 'matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1)');
			},2000);
			removeStyleConteudoBoxImg = false;
		}
	}

	ScrollReveal().reveal('.conteudo .owl-carousel-conteudo .owl-item .box-text h3', { 
		distance: '100px',
		origin: 'rigth',
		opacity: 0,
		easing: 'ease-in-out', 
		duration: 1000,
		delay: 50,
		interval: 150,
		beforeReveal: removeHiddenConteduoBoxTextH3
	});

	var removeStyleConteudoBoxTextH3 = true;
	function removeHiddenConteduoBoxTextH3(el)
	{
		if(removeStyleConteudoBoxTextH3)
		{
			setTimeout(function(){
				$('.conteudo .owl-carousel-conteudo .owl-item .box-text h3').css('opacity', '1');
				$('.conteudo .owl-carousel-conteudo .owl-item .box-text h3').css('transform', 'matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1)');
			},2000);
			removeStyleConteudoBoxTextH3 = false;
		}
	}

	ScrollReveal().reveal('.conteudo .owl-carousel-conteudo .owl-item .box-text p', { 
		distance: '100px',
		origin: 'rigth',
		opacity: 0,
		easing: 'ease-in-out', 
		duration: 1000,
		delay: 150,
		interval: 150,
		beforeReveal: removeHiddenConteduoBoxTextP
	});

	var removeStyleConteudoBoxTextP = true;
	function removeHiddenConteduoBoxTextP(el)
	{
		if(removeStyleConteudoBoxTextP)
		{
			setTimeout(function(){
				$('.conteudo .owl-carousel-conteudo .owl-item .box-text p').css('opacity', '1');
				$('.conteudo .owl-carousel-conteudo .owl-item .box-text p').css('transform', 'matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1)');
			},2000);
			removeStyleConteudoBoxTextP = false;
		}
	}

	// Versão

	ScrollReveal().reveal('.versoes h2', { 
		distance: '100px',
		origin: 'left',
		opacity: 0,
		easing: 'ease-in-out', 
		duration: 1000,
		delay: 50,
		interval: 150
	});

	ScrollReveal().reveal('.versoes .owl-carousel-versoes .owl-item .box-img', { 
		distance: '100px',
		origin: 'left',
		opacity: 0,
		easing: 'ease-in-out', 
		duration: 1000,
		delay: 50,
		interval: 150,
		beforeReveal: removeHiddenVersaoBoxImg
	});

	var removeStyleVersaoBoxImg = true;
	function removeHiddenVersaoBoxImg(el)
	{
		if(removeStyleVersaoBoxImg)
		{
			setTimeout(function(){
				$('.versoes .owl-carousel-versoes .owl-item .box-img').css('opacity', '1');
				$('.versoes .owl-carousel-versoes .owl-item .box-img').css('transform', 'matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1)');
			},2000);
			removeStyleVersaoBoxImg = false;
		}
	}

	ScrollReveal().reveal('.versoes .owl-carousel-versoes .owl-item .box-text p', { 
		distance: '0px',
		origin: 'rigth',
		opacity: 0,
		easing: 'ease-in-out', 
		duration: 1000,
		delay: 150,
		interval: 150,
		beforeReveal: removeHiddenVersaoBoxTextP
	});

	var removeStyleVersaoBoxTextP = true;
	function removeHiddenVersaoBoxTextP(el)
	{
		if(removeStyleVersaoBoxTextP)
		{
			setTimeout(function(){
				$('.versoes .owl-carousel-versoes .owl-item .box-text p').css('opacity', '1');
				$('.versoes .owl-carousel-versoes .owl-item .box-text p').css('transform', 'matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1)');
			},2000);
			removeStyleVersaoBoxTextP = false;
		}
	}

	// Interesse

	ScrollReveal().reveal('.interesses h2', { 
		distance: '100px',
		origin: 'left',
		opacity: 0,
		easing: 'ease-in-out', 
		duration: 1000,
		delay: 50,
		interval: 150
	});

	ScrollReveal().reveal('.interesses .owl-carousel-interesses .owl-item .box-img', { 
		distance: '100px',
		origin: 'left',
		opacity: 0,
		easing: 'ease-in-out', 
		duration: 1000,
		delay: 50,
		interval: 150,
		beforeReveal: removeHiddenInteressesBoxImg
	});

	var removeStyleInteressesBoxImg = true;
	function removeHiddenInteressesBoxImg(el)
	{
		if(removeStyleInteressesBoxImg)
		{
			setTimeout(function(){
				$('.interesses .owl-carousel-interesses .owl-item .box-img').css('opacity', '1');
				$('.interesses .owl-carousel-interesses .owl-item .box-img').css('transform', 'matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1)');
			},2000);
			removeStyleInteressesBoxImg = false;
		}
	}

	ScrollReveal().reveal('.interesses .owl-carousel-interesses .owl-item .box-text p', { 
		opacity: 0,
		easing: 'ease-in-out', 
		duration: 1000,
		delay: 150,
		interval: 150,
		beforeReveal: removeHiddenInteressesBoxTextP
	});

	var removeStyleInteressesBoxTextP = true;
	function removeHiddenInteressesBoxTextP(el)
	{
		if(removeStyleInteressesBoxTextP)
		{
			setTimeout(function(){
				$('.interesses .owl-carousel-interesses .owl-item .box-text p').css('opacity', '1');
				$('.interesses .owl-carousel-interesses .owl-item .box-text p').css('transform', 'matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1)');
			},2000);
			removeStyleInteressesBoxTextP = false;
		}
	}
	


}