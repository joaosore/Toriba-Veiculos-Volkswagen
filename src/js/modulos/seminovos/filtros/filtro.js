import jRange from 'jquery-range';
import {startMask} from './../../mask.js';
import {cards,pagination} from './cards.js';
import {init_animate_seminivos} from '../animation.js';

let MARCA_D = [];
let MARCA_T = [];

let MODELO_D = [];
let MODELO_T = [];

let ANO_D = [];
let ANO_T = [];

let PORTAS_D = [];

let KM_D = [];

let COR_D = [];
let COR_T = [];

let PRICE_D = [];

let OPCIONAIS_D = [];
let OPCIONAIS_C = [];
let OPCIONAIS_T = [];

let modelo = [];
let ano_inicial = [];




let BTN_KM = false;
let BTN_PRICE = false;


var UP_PORTA = true;
var DOWN_PORTA = true;


export function seminovos_init_filtro()
{
	toggle_portas();
	get_dados(get_filter_select());
	aplicar();
	chandeSelect();
	up_down_portas();
	limpar();
	//Mobile
	openFilterMobile();
}

function loading()
{
	var html = '<div class="loading-componets"><svg width="100px" height="100px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-rolling"><circle cx="50" cy="50" fill="none" ng-attr-stroke="{{config.color}}" ng-attr-stroke-width="{{config.width}}" ng-attr-r="{{config.radius}}" ng-attr-stroke-dasharray="{{config.dasharray}}" stroke="#0266b3" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138" transform="rotate(233.861 50 50)"><animateTransform attributeName="transform" type="rotate" calcMode="linear" values="0 50 50;360 50 50" keyTimes="0;1" dur="1s" begin="0s" repeatCount="indefinite"></animateTransform></circle></svg></div>'
	$('.load-cards').html(html);
}

function error(CARS)
{
	if(CARS.length == 0)
	{
		var html = '<h2>Nem um veiculo disponível.</h2>'
		$('.load-cards').html(html);
	}
}


function lista_filtro(cat, item)
{
	var html = '';
	switch(cat)
	{
		case 'ano':
			var item = item.split(',');
			html = '<span class="'+cat+'" data-cat="'+cat+'" data-value="'+item+'">'+item[0]+' até '+item[1]+'</span>';
		break;
		case 'price':
			var item = item.split(',');
			html = '<span class="'+cat+'" data-cat="'+cat+'" data-value="'+item+'">R$ <div class="money"> '+item[0]+'</div>,00 até R$ <div class="money"> '+item[1]+'</div>,00</span>';
		break;
		case 'km':
			var item = item.split(',');
			html = '<span class="'+cat+'" data-cat="'+cat+'" data-value="'+item+'"><div class="money">'+item[0]+'</div>&nbsp;KM até&nbsp;<div class="money">'+item[1]+'</div>&nbsp;KM</span>';
		break;
		default:
			html = '<span class="'+cat+'" data-cat="'+cat+'" data-value="'+item+'"">'+item+'</span>';
		break;
	}
	return html;
}

function get_filter_select()
{
	var dados = {};

	if(getParameterByName('ano').length > 0)
	{
		var ano = getParameterByName('ano').split(',');
		$('#ano_de').val(ano[0]);
		$('#ano_ate').val(ano[0]);
		dados.ano = getParameterByName('ano');
	}

	if(getParameterByName('marca').length > 0)
	{
		$('#marca').val(getParameterByName('marca'));
		dados.marca = getParameterByName('marca');
	}

	if(getParameterByName('modelo').length > 0)
	{
		$('#model').val(getParameterByName('modelo'));
		dados.modelo = getParameterByName('modelo');
	}
	
	if(getParameterByName('porta').length > 0)
	{
		$('#input-porta').val(getParameterByName('porta'));
		dados.porta = getParameterByName('porta');
	}

	if(getParameterByName('price').length > 0)
	{
		$('#km-range').val(getParameterByName('price'));
		dados.price = getParameterByName('price');
	}

	if(getParameterByName('km').length > 0)
	{
		$('#km-range').val(getParameterByName('km'));
		dados.km = getParameterByName('km');
	}

	if(getParameterByName('cor').length > 0)
	{
		dados.cor = getParameterByName('cor');
	};

	if(getParameterByName('opcionais').length > 0)
	{
		dados.opcionais = getParameterByName('opcionais');
	};

	if(getParameterByName('pagination').length > 0)
	{
		dados.pagination = getParameterByName('pagination');
	};

	return dados;
}

function set_filtros()
{
	var lista = '';
	if(getParameterByName('ano').length > 0)
	{
		lista += lista_filtro('ano', getParameterByName('ano'));
	}

	if(getParameterByName('marca').length > 0)
	{
		lista += lista_filtro('marca', getParameterByName('marca'));
	}

	if(getParameterByName('modelo').length > 0)
	{
		lista += lista_filtro('modelo', getParameterByName('modelo'));
	}
	
	if(getParameterByName('porta').length > 0)
	{
		lista += lista_filtro('porta', getParameterByName('porta'));
	}

	if(getParameterByName('km').length > 0)
	{
		lista += lista_filtro('km', getParameterByName('km'));
	}

	if(getParameterByName('price').length > 0)
	{
		lista += lista_filtro('price', getParameterByName('price'));
	}

	if(getParameterByName('cor').length > 0)
	{
		var cor = getParameterByName('cor').split(',');
		cor.forEach(function(currentValue){
			lista += lista_filtro('cor', currentValue);
		});
	};

	if(getParameterByName('opcionais').length > 0)
	{
		var opcionais = getParameterByName('opcionais').split(',');
		opcionais.forEach(function(currentValue){
			lista += lista_filtro('opcionais', currentValue);
		});
	};
	$('.box-lista').html(lista);
	startMask();
}

function update_selects()
{
	

	if(getParameterByName('marca').length > 0)
	{
		$('#marca option[value='+getParameterByName('marca')+']').attr('selected','selected');
	}
	
	if(getParameterByName('modelo').length > 0)
	{
		$('#modelo option[value='+getParameterByName('modelo')+']').attr('selected','selected');
	}
	
	if(getParameterByName('ano').length > 0)
	{
		var ano = getParameterByName('ano').split(',');
		$('#ano_de option[value='+ano[0]+']').attr('selected','selected');
		$('#ano_ate option[value='+ano[1]+']').attr('selected','selected');
	}
}

function toggle_portas()
{
	$('.btns-refine').clickOrTouch(function(){
		$(".box-option").not($(this).parent().find('.box-option')).removeClass('open');
		$(this).parent().find('.box-option').toggleClass('open', 'open');
	});
}

function number_cars(num)
{
	var text = '';
	if(num > 1)
	{
		text = 'Carros';
	}
	else
	{
		text = 'Carro';
	}
	$('.lista-filtros h2').text(num+' '+text);
}

export function get_dados(dados = {}, el)
{

	MARCA_D = [];
	MARCA_T = [];

	MODELO_D = []
	MODELO_T = []

	ANO_D = [];
	ANO_T = [];

	PORTAS_D = [];

	KM_D = [];

	COR_D = [];
	COR_T = [];

	PRICE_D = [];
	
	OPCIONAIS_D = [];
	OPCIONAIS_T = [];

	modelo = [];
	ano_inicial = [];

	var itens = [];

	var param = jQuery.param(dados);

	$.ajax({
		type: "GET",
		url: '/seminovos-api/',
		data: param,
		dataType: "json",
		beforeSend: function()
		{
			loading();
		},
		success: function(response)
		{

			if(param.length > 0)
			{
				history.pushState(null, null, '/seminovos/?'+param);
			}
			

			MARCA_D = response.D.marca;
			MARCA_T = response.T.marca;

			MODELO_D = response.D.modelo;
			MODELO_T = response.T.modelo;

			ANO_D = response.D.ano;
			ANO_T = response.T.ano;

			PORTAS_D = response.D.portas;

			KM_D = response.D.km;

			COR_D = response.D.cor;
			COR_T = response.T.cor;

			PRICE_D = response.D.preco;

			OPCIONAIS_D = response.D.opcionais;
			OPCIONAIS_C = response.D.opcionais_check;
			OPCIONAIS_T = response.T.opcionais;

			add_marca(MARCA_D, MARCA_T);
			add_modelo(MODELO_D, MODELO_T);
			add_ano_de(ANO_D, ANO_T);
			add_ano_ate(ANO_D, ANO_T);
			add_portas(PORTAS_D);
			add_km(KM_D);
			add_cor(COR_D, COR_T);
			add_preco(PRICE_D);
			add_opcionais(OPCIONAIS_D, OPCIONAIS_T, OPCIONAIS_C);

			
			cards(response.DISPLAY.CARS);
			pagination(response.DISPLAY.PAGINATION);
			number_cars(response.DISPLAY.TOTAL);

			error(response.DISPLAY.CARS);

			startMask();

			update_selects();
			set_filtros();
			init_animate_seminivos();
		},
		error: function()
		{

		}
	});
}

export function paramters(pagination = 1)
{

	var ano_de = '';
	var ano_ate = '';
	var porta = '';

	var cor = '';
	var opcionais = '';

	var dados = {};

	if($('#ano_de').val().length > 0)
	{
		ano_de = $("#ano_de").val();
		if($('#ano_ate').val().length <= 0)
		{
			ano_ate = ANO_D[ANO_D.length-1];
		}
		else
		{
			ano_ate = $('#ano_ate').val();
		}
	}

	if($('#marca').val().length > 0)
	{
		dados.marca = $('#marca').val();
	}

	if($('#modelo').val().length > 0)
	{
		dados.modelo = $('#modelo').val();
	}
	
	if(ano_de.length > 0)
	{
		dados.ano = ano_de + ',' + ano_ate;
	}

	if($('#input-porta').val().length > 0)
	{
		dados.porta = $('#input-porta').val();
	}

	if($('#km-range').val().length > 0 && BTN_KM == true)
	{
		dados.km = $('#km-range').val();
	}

	if($('#price-range').val().length > 0 && BTN_PRICE == true)
	{
		dados.price = $('#price-range').val();
	}

	$('input[name^="color"]:checked').each(function() {
		if(cor.length != 0)
		{
			cor += ',';
		}
		cor += $(this).val();
	});

	if(cor.length > 0)
	{
		dados.cor = cor;
	}

	$('input[name^="opcionais"]:checked').each(function() {
		if(opcionais.length != 0)
		{
			opcionais += ',';
		}
		opcionais += $(this).val();
	});

	if(opcionais.length > 0)
	{
		dados.opcionais = opcionais;
	}

	dados.pagination = pagination;

	return dados;
}

function chandeSelect()
{
	$('#marca, #modelo, #ano_de, #ano_ate').change(function() {
		get_dados(paramters(), $(this));
	});
}

function aplicar()
{
	$('.buttons .aplicar, .btn-buscar-mobile').clickOrTouch(function() {
		if($(this).attr('id') == 'aplicar-porta')
		{
			$('#input-porta').val($('.box-portas span.num').text());
			$('.box-portas span.num').attr('data-index', 0);
		}

		if($(this).attr('id') == 'aplicar-km')
		{
			BTN_KM = true;
			var valor = $('#km-range').val().split(',');
			if(valor[0] == valor[1])
			{
				add_km(KM_D);
			}
		}

		if($(this).attr('id') == 'aplicar-price')
		{
			BTN_PRICE = true;
			var valor = $('#price-range').val().split(',');
			if(valor[0] == valor[1])
			{
				add_km(KM_D);
			}
		}
		$(".box-option").removeClass('open');
		$('.filtros').removeClass('open');
		get_dados(paramters());
	});
}

function limpar()
{
	$(document).on('click', '.box-lista span', function(){
		switch($(this).data('cat'))
		{
			case 'marca':
				$('#marca').val('');
				break;
			case 'modelo':
				$('#modelo').val('');
				break;
			case 'ano':
				$('#ano_de').val('');
				$('#ano_ate').val('');
				break;
			case 'porta':
				$('#input-porta').val('');
				break;
			case 'km':
				$('#km-range').val('');
				$('#price-range').val('');
				$('input[name^="color"]').removeAttr('checked');
				break;
			case 'price':
				$('#price-range').val('');
				$('#km-range').val('');
				$('input[name^="color"]').removeAttr('checked');
				break;
			case 'cor':
			case 'opcionais':
				$('#price-range').val('');
				$('#km-range').val('');
				$('input[value="'+$(this).data('value')+'"]').removeAttr('checked');
				break;
		}
		get_dados(paramters());
	});

	$(document).on('click', '.link, .filter-clear', function(){
		$('#marca').val('');
		$('#modelo').val('');
		$('#ano_de').val('');
		$('#ano_ate').val('');
		$('#price-range').val('');
		$('#km-range').val('');
		$('#input-porta').val('');
		$('input').removeAttr('checked');
		$('.filtros').removeClass('open');
		get_dados(paramters());
	});

	$(document).on('click', '.limpar', function(){

		switch($(this).data('limpar'))
		{
			case 'limpar-porta':
				$('#input-porta').val('');
				break;
			case 'limpar-km':
				$('#km-range').val('');
				$('input[name^="color"]').removeAttr('checked');
				break;
			case 'limpar-cor':
				$('input[name^="color"]').removeAttr('checked');
				break;
			case 'limpar-opcionais':
				$('input[name^="opcionais"]').removeAttr('checked');
				break;
			case 'limpar-price':
				$('#price-range').val('');
				break;
		}
		$(".box-option").removeClass('open');
		get_dados(paramters());
	});
}

function add_marca(MARCA_D, MARCA_T)
{
	var html = '<option value="" selected>Marca</option>';
	MARCA_T.forEach(function(currentValue){
		if($.inArray(currentValue, MARCA_D) != -1)
		{
			if($('#marca').val() == currentValue)
			{
				html += '<option value="'+currentValue+'" selected>'+currentValue+'</option>';
			}
			else
			{
				html += '<option value="'+currentValue+'">'+currentValue+'</option>';
			}
		}
		else
		{
			html += '<option value="'+currentValue+'" disabled>'+currentValue+'</option>';
		}
	});
    $('#marca').html(html);
}

function add_modelo(MODELO_D, MODELO_T)
{
	var html = '<option value="" selected>Modelo</option>';
	MODELO_T.forEach(function(currentValue){
		if($.inArray(currentValue, MODELO_D) != -1)
		{
			if($('#modelo').val() == currentValue)
			{
				html += '<option value="'+currentValue+'" selected>'+currentValue+'</option>';
			}
			else
			{
				html += '<option value="'+currentValue+'">'+currentValue+'</option>';
			}
		}
		else
		{
			html += '<option value="'+currentValue+'" disabled>'+currentValue+'</option>';
		}
	});
    $('#modelo').html(html);
}

function add_ano_de(ANO_D, ANO_T)
{
	var html = '<option value="" selected>De</option>';
	ANO_T.forEach(function(currentValue){
		if($.inArray(currentValue, ANO_D) != -1)
		{
			if($('#ano_de').val() == currentValue)
			{
				html += '<option value="'+currentValue+'" selected>'+currentValue+'</option>';
			}
			else
			{
				html += '<option value="'+currentValue+'">'+currentValue+'</option>';
			}
		}
		else
		{
			html += '<option value="'+currentValue+'" disabled>'+currentValue+'</option>';
		}
	});
    $('#ano_de').html(html);

}

function add_ano_ate(ANO_D = null, ANO_T = null)
{
	var html = '<option value="" selected>Até</option>';
	ANO_T.forEach(function(currentValue){
		if($.inArray(currentValue, ANO_D) != -1)
		{
			if($('#ano_de').val() <= currentValue)
			{
				if($('#ano_ate').val() == currentValue)
				{
					html += '<option value="'+currentValue+'" selected>'+currentValue+'</option>';
				}
				else
				{
					html += '<option value="'+currentValue+'">'+currentValue+'</option>';
				}
			}
			else
			{
				html += '<option value="'+currentValue+'" disabled>'+currentValue+'</option>';
			}
		}
		else
		{
			html += '<option value="'+currentValue+'" disabled>'+currentValue+'</option>';
		}
	});
    $('#ano_ate').html(html);   
}

function add_portas(PORTAS_D)
{

	$('.box-portas .num').text(PORTAS_D[0]);

	if(PORTAS_D.length == 1)
	{
		UP_PORTA = false;
		DOWN_PORTA = false;
		$('.box-portas .up').addClass('disable');
		$('.box-portas .down').addClass('disable');
	}
	else
	{
		UP_PORTA = true;
		DOWN_PORTA = true;
		$('.box-portas .up').removeClass('disable');
	}
}

function up_down_portas()
{
	var index = '';

	$('.box-portas .up').clickOrTouch(function(){
		index = parseInt($('.box-portas span.num').attr('data-index'));
		console.log(UP_PORTA == true);
		console.log(PORTAS_D);
		console.log(index);

		if(UP_PORTA == true)
		{
			index = index + 1;
			if(index <= PORTAS_D.length - 1)
			{
				$('.box-portas .up').removeClass('disable');
				$('.box-portas .down').removeClass('disable');
				$('.box-portas span.num').attr('data-index', index);
				$('#input-porta').val(PORTAS_D[index]);
				$('.box-portas span.num').text(PORTAS_D[index]);
				DOWN_PORTA = true;
				if(index == PORTAS_D.length - 1)
				{
					$('.box-portas .up').addClass('disable');
					$('.box-portas span.num').text(PORTAS_D[index]);
					index = PORTAS_D.length - 1;
					UP_PORTA = false;
				}
			}
		}
	});

	$('.box-portas .down').clickOrTouch(function(){
		index = parseInt($('.box-portas span.num').attr('data-index'));
		console.log(DOWN_PORTA == true);
		if(DOWN_PORTA == true)
		{
			index = index - 1;
			if(index >= 0)
			{
				$('.box-portas .up').removeClass('disable');
				$('.box-portas .down').removeClass('disable');
				$('.box-portas span.num').attr('data-index', index);
				$('#input-porta').val(PORTAS_D[index]);
				$('.box-portas span.num').text(PORTAS_D[index]);
				UP_PORTA = true;
				if(index == 0)
				{
					$('.box-portas .down').addClass('disable');
					$('.box-portas span.num').text(PORTAS_D[index]);
					index = 0;
					DOWN_PORTA = false;
				}
			}
		}
	});
}

function add_km(KM_D)
{
	$('#km-range').val(KM_D[0]+','+KM_D[1]);
	enable_km();
}

function enable_km()
{
	$('#km-range').jRange({
	    from: KM_D[0],
	    to: KM_D[1],
	    step: 1000,
	    scale: [],
	    format: '',
	    width: 250,
	    showLabels: true,
	    isRange : true,
	    onstatechange: function(el) {
	    	var valor = el.split(',');
			set_KM(valor[0], valor[1]);
	    }
	});
	var valor = $('#km-range').val().split(',');
	set_KM(valor[0], valor[1]);
	if($('#km-range').val() == 'NaN,NaN' || $('#km-range').val() == 'false,false')
	{
		$('.btns-refine.btn-km').addClass('disable');
	}
	else
	{
		$('.btns-refine.btn-km').removeClass('disable');
	}
}

function set_KM(min, max)
{
	$('#km-range').parent().find('.min').text(min);
	$('#km-range').parent().find('.max').text(max);
}

function add_cor(COR_D, COR_T)
{
	var checkboxHtml = '';
	COR_T.forEach(function(currentValue){
		if($.inArray(currentValue.nome, COR_D) != -1)
		{
			if(COR_T.length == COR_D.length)
			{
				checkboxHtml += create_checkbox(currentValue.nome, currentValue.hexadecimal)
			}
			else
			{
				checkboxHtml += create_checkbox(currentValue.nome, currentValue.hexadecimal, 'checked')
			}
			
		}
		else
		{
			checkboxHtml += create_checkbox(currentValue.nome, currentValue.hexadecimal, 'disabled', 'disable-checkbox')
		}
	});
	$('.btns-checkbox').html(checkboxHtml);
}

function create_checkbox(nome, hexadecimal, disabled = null, css = null)
{
	var checkboxHtml  = '<div class="box-checkbox color '+css+'">';
		checkboxHtml += '<label class="container-input">';
		checkboxHtml += '<span>'+nome+'</span>';
		checkboxHtml += '<div class="color" style="background-color: '+hexadecimal+'"></div>';
		checkboxHtml += '<input type="checkbox" name="color[]" value="'+nome+'" '+disabled+'>';
		checkboxHtml += '<span class="checkmark"></span>';
		checkboxHtml += '</label>';
		checkboxHtml += '</div>';
	return checkboxHtml;
}

function add_preco(PRICE_D)
{	
	$('#price-range').val(PRICE_D[0]+','+PRICE_D[1]);
	enable_price();
}


function enable_price()
{
	$('#price-range').jRange({
	    from: PRICE_D[0],
	    to: PRICE_D[1],
	    step: 1000,
	    scale: [],
	    format: '',
	    width: 250,
	    showLabels: true,
	    isRange : true,
	    onstatechange: function(el) {
	    	var valor = el.split(',');
			set_price(valor[0], valor[1]);
			startMask();
	    }
	});
	var valor = $('#price-range').val().split(',');
	set_price(valor[0], valor[1]);
	if($('#price-range').val() == 'NaN,NaN')
	{
		$('.btns-refine.btn-price').addClass('disable');
	}
	else
	{
		$('.btns-refine.btn-price').removeClass('disable');
	}
}

function set_price(min, max)
{
	$('#price-range').parent().find('.min').text(min);
	$('#price-range').parent().find('.max').text(max);
}

function add_opcionais(OPCIONAIS_D, OPCIONAIS_T, OPCIONAIS_C)
{
	var opcionaisHtml = '';
	OPCIONAIS_T.forEach(function(currentValue){
		if($.inArray(currentValue, OPCIONAIS_D) != -1)
		{
			if($.inArray(currentValue, OPCIONAIS_C) != -1)
			{
				opcionaisHtml += create_opcionais(currentValue, 'checked');
			}
			else
			{
				opcionaisHtml += create_opcionais(currentValue);
			}
		}
		else
		{
			opcionaisHtml += create_opcionais(currentValue, 'disabled', 'disable-checkbox');
		}
	});
	$('.box-opcionais').html(opcionaisHtml);
}

function create_opcionais(nome, disabled = null, css = null)
{
	var opt = '<div class="item '+css+'">';
		opt += '<label class="container-input">';
		opt += '<input type="checkbox" name="opcionais[]" value="'+nome+'" '+disabled+'>';
		opt += '<span class="checkmark"></span>';
		opt += nome;
		opt += '</label>';
		opt += '</div>';
	return opt;
}


function openFilterMobile()
{
	$('.open-filter a').clickOrTouch(function(e){
		e.preventDefault();
		$('.filtros').addClass('open');
	});
	$('.btn-close').clickOrTouch(function(){
		$('.filtros').removeClass('open');
	});
	$('.mais-filtros').clickOrTouch(function(){
		$(this).fadeOut();
		$('.box-fintro-complexo').addClass('show');
	});
}


function arr_diff(a1, a2) {

    var a = [], diff = [];

    for (var i = 0; i < a1.length; i++) {
        a[a1[i]] = true;
    }

    for (var i = 0; i < a2.length; i++) {
        if (a[a2[i]]) {
            delete a[a2[i]];
        } else {
            a[a2[i]] = true;
        }
    }

    for (var k in a) {
        diff.push(k);
    }

    return diff;
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
