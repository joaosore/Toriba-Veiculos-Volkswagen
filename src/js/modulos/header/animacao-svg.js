// import SVGMorpheus from '../svg-morpheus.js';
// import SVGMorpheus from 'svg-morpheus';

var MENU;
var MENU_CLICK = true;
var BALAO;
var BALAO_CLICK = true;
	
function Menu()
{
	// MENU = new SVGMorpheus('#menu-svg', {duration: 500, easing: 'expo-in-out', rotation: 'random'});
	// MENU.to('menu', null, null);

	$(document).on('click', '.box-btn-menu', function(){
		if(MENU_CLICK)
		{
			$('.box-btn-menu object').attr('data', get_template_directory_uri+'/dist/assets/close-menu.svg');
			if($('#box-form').hasClass('open'))
			{
				$('#box-form').removeClass('open');
				CloseBalao();
			}
			// MENU.to('close', null, null);
			MENU_CLICK = false;
		}
		else
		{
			CloseMenu();
		}
	});
}
Menu();

export function CloseMenu()
{
	// MENU.to('menu', null, null);
	$('.box-btn-menu object').attr('data', get_template_directory_uri+'/dist/assets/menu-open-close.svg');
	MENU_CLICK = true;
}

function Balao()
{
	// BALAO = new SVGMorpheus('#balao-svg', {duration: 500, easing: 'expo-in-out', rotation: 'random'});
	// BALAO.to('balao', null, null);

	$(document).on('click', '.box-btn-balao', function(){
		if(BALAO_CLICK)
		{
			$('.box-btn-balao object').attr('data', get_template_directory_uri+'/dist/assets/close-menu.svg');
			if($('#navbarNav').hasClass('open'))
			{
				$('#navbarNav').removeClass('open');
				CloseMenu();
			}
			// BALAO.to('close', null, null);
			BALAO_CLICK = false;
		}
		else
		{
			CloseBalao();
		}
	});
}
Balao();

function CloseBalao()
{
	// BALAO.to('balao', null, null);
	$('.box-btn-balao object').attr('data', get_template_directory_uri+'/dist/assets/menu-balao-close.svg');
	BALAO_CLICK = true;
}