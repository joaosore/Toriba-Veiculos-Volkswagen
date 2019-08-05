import {startMask} from './../../mask.js';
import {get_dados,paramters} from './filtro.js';


export function seminovos_init_cards()
{
	click_page();
}

export function cards(cards)
{
	var card = '';

	cards.forEach(function(currentValue){
		card += create_html_cards(currentValue.imagem, currentValue.marca, currentValue.modelo_car, currentValue.versao, currentValue.ano_fabricacao, currentValue.ano_modelo, currentValue.km, currentValue.cor, currentValue.cambio, currentValue.preco, currentValue.link);
	});
	$('.load-cards').html(card);
	startMask();
}


function create_html_cards(img, marca, modelo, versao, ano_fabricacao, ano_modelo, km, cor, cambio, valor, link)
{
	var html = '<div class="box-car">';
	html += '<div class="ano_marca_modelo d-lg-none d-xl-none d-block">';
	html += '<h3>'+ano_fabricacao+' '+marca+' '+modelo+'</h3> ';
	html += '</div>';
	html += '<div class="versao d-md-block d-lg-none d-xl-none d-block">';
	html += '<span>'+versao+'</span>';
	html += '</div>';
	html += '<div class="img">';
	html += '<picture>';
	html += '<img class="lazyload img-fluid" src="" data-srcset="'+img+' 1x" alt="'+marca+' '+modelo+' '+versao+'">';
	html += '</picture>';
	html += '</div>';
	html += '<div class="box-dados">';
	html += '<div class="ano_marca_modelo d-lg-block d-xl-block d-none">';
	html += '<h3>'+ano_fabricacao+' '+marca+' '+modelo+'</h3> ';
	html += '</div>';
	html += '<div class="versao d-lg-block d-xl-block d-none">';
	html += '<span>'+versao+'</span>';
	html += '</div>';
	html += '<div class="dados">';
	html += '<div class="ano">';
	html += '<span>Ano: <b>'+ano_fabricacao+'/'+ano_modelo+'</b></span>';
	html += '</div>';
	html += '<div class="km">';
	html += '<span>KM: <b class="money">'+km+'</b></span>';
	html += '</div>';
	html += '<div class="cor">';
	html += '<span>Cor: <b>'+cor+'</b></span>';
	html += '</div>';
	html += '<div class="cambio">';
	html += '<span>Câmbio: <b>'+cambio+'</b></span>';
	html += '</div>';
	html += '</div>';
	html += '</div>';
	html += '<div class="box-btns-valor">';
	html += '<div class="valor">';
	html += '<span>R$ </span><span class="preco money">'+valor+'</span><span>,00</span>';
	html += '</div>';
	html += '<div class="btns">';
	html += '<a class="btns-a btns" href="'+link+'">';
	html += '<div class="button-1">';
	html += '<span>Ver detalhes</span>';
	html += '</div>';
	html += '</a>';
	html += '<a class="btns-a btns btn-catacao" data-dados="'+ano_fabricacao+'/'+ano_modelo+' | '+marca+' | '+modelo+' | '+versao+'" href="" target="_blank">';
	html += '<div class="button-1">';
	html += '<span>Solicite Cotação</span>';
	html += '</div>';
	html += '</a>';
	html += '</div>';
	html += '</div>';
	html += '</div>';
	return html;
}

export function pagination(pagination)
{
	var paginate = '';
	pagination.forEach(function(currentValue){
		paginate += create_html_pagination(currentValue);
	});
	$('.pagination .itens').html(paginate);
	pagination_active();
}

function create_html_pagination(currentValue)
{
	var html = '';
	switch(currentValue)
	{
		case '...':
			html = '<span>...</span>';
		break;
		default:
			html = '<a data-page="'+currentValue+'">'+currentValue+'</a>';
		break;
	}
	return html;
}

function pagination_active()
{

	var pagination = '';
	if(getParameterByName('pagination').length == 0)
	{
		pagination = 1;
	}
	else
	{
		pagination = getParameterByName('pagination');
	}
	$('.pagination .itens').find("[data-page='"+pagination+"']").addClass('active'); 

	if(pagination == 1)
	{
		$('.seta.right').addClass('disable');
		$('.seta.left').removeClass('disable');
	}

	var endPage = parseInt($('.pagination .itens a').last().text());
	if(pagination == endPage)
	{
		$('.seta.right').removeClass('disable');
		$('.seta.left').addClass('disable');
	}


}

function getParameterByName(name) {
	var query = window.location.search.toString();
	name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
	var regexS = "[\\?&]" + name + "=([^&#]*)";
	var regex = new RegExp(regexS);
	var results = regex.exec(query);
	if (results == null) return "";
	else return decodeURIComponent(results[1].replace(/\+/g, " "));
}

function click_page()
{
	var $doc = $('html, body');

	$(document).on('click', '.pagination .itens a', function(e){
		e.preventDefault();
		$doc.animate({
		    scrollTop: $('body').offset().top
		}, 500);
		get_dados(paramters($(this).attr('data-page')));
	});

	$(document).on('click', '.pagination .seta.left', function(e){
		e.preventDefault();
		get_dados(paramters((parseInt(getParameterByName('pagination')) + 1)));
	});

	$(document).on('click', '.pagination .seta.rigth', function(e){
		e.preventDefault();
		get_dados(paramters((parseInt(getParameterByName('pagination')) - 1)));
	});	
}