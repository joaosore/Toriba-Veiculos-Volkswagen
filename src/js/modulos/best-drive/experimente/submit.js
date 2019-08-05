import {replaceAll} from './../../library.js';


export function init_submit_formulario_best_drive()
{
	$(document).on('click', '.btn-escolher-data', function(e){
		e.preventDefault();
		$("#formulario-best-drive").submit();
	});
	$(document).on('click', '.btn-escolher-data, #formulario-best-drive > div.stap-dots > button:nth-child(2)', function(e){
		e.preventDefault();
		$("#formulario-best-drive").submit();
	});
	$(document).on('click', '#formulario-best-drive > div.stap-dots > button:nth-child(1)', function(e){
		e.preventDefault();
		eventos('prev');
	});
	$(document).on('click', '.btn-enviar-formulario-best-drive', function(e){
		e.preventDefault();
		getFormulario();
	});
	set_modelo();
	eventos();
}

export function eventos(ev = null)
{
	switch(ev)
	{
		case 'next':
			$('#formulario-best-drive .stap-1').addClass('hidden');
			$('#formulario-best-drive .stap-2').addClass('show');

			$('#formulario-best-drive > div.stap-dots > button:nth-child(2)').addClass('active');
			$('#formulario-best-drive > div.stap-dots > button:nth-child(1)').removeClass('active');
			break;
		case 'prev':
			$('#formulario-best-drive .stap-2').removeClass('show');
			$('#formulario-best-drive .stap-1').removeClass('hidden');

			$('#formulario-best-drive > div.stap-dots > button:nth-child(1)').addClass('active');
			$('#formulario-best-drive > div.stap-dots > button:nth-child(2)').removeClass('active');
			break;
		default:
			break
	}
}

function set_modelo()
{
	var modelo = getParameterByName('modelo');
	if(modelo.length > 0)
	{
		var opt = $("#modelo option");
		for (var i = opt.length - 1; i >= 0; i--) {
			var optText = $("#modelo option:eq("+i+")").text()
			if(optText == modelo)
			{
				 $("#modelo option:eq("+i+")").attr('selected', 'selected')
			}
		}	
	}
}

function bindToAjax() {
	$(document).bind('ajaxComplete', function(evt, jqXhr, opts) {

		// Create a fake a element for magically simple URL parsing
		var fullUrl = document.createElement('a');
		fullUrl.href = opts.url;

		// IE9+ strips the leading slash from a.pathname because who wants to get home on time Friday anyways
		var pathname = fullUrl.pathname[0] === '/' ? fullUrl.pathname : '/' + fullUrl.pathname;
		// Manually remove the leading question mark, if there is one
		var queryString = fullUrl.search[0] === '?' ? fullUrl.search.slice(1) : fullUrl.search;
		// Turn our params and headers into objects for easier reference
		var queryParameters = objMap(queryString, '&', '=', true);
		var headers = objMap(jqXhr.getAllResponseHeaders(), '\n', ':');

		// Blindly push to the dataLayer because this fires within GTM
		dataLayer.push({
		'event': 'ajaxComplete',
			'attributes': {
			// Return empty strings to prevent accidental inheritance of old data
			'type': opts.type || '',
			'url': fullUrl.href || '',
			'queryParameters': queryParameters,
			'pathname': pathname || '',
			'hostname': fullUrl.hostname || '',
			'protocol': fullUrl.protocol || '',
			'fragment': fullUrl.hash || '',
			'statusCode': jqXhr.status || '',
			'statusText': jqXhr.statusText || '',
			'headers': headers,
			'timestamp': evt.timeStamp || '',
			'contentType': opts.contentType || '',
			// Defer to jQuery's handling of the response
			'response': (jqXhr.responseJSON || jqXhr.responseXML || jqXhr.responseText || '')
			}
		});

	});
}

function objMap(data, delim, spl, decode) {
	var obj = {};
	// If one of our parameters is missing, return an empty object
	if (!data || !delim || !spl) {
		return {};
	}
	var arr = data.split(delim);
	var i;
	if (arr) {
		for (i = 0; i < arr.length; i++) {
			// If the decode flag is present, URL decode the set
			var item = decode ? decodeURIComponent(arr[i]) : arr[i];
			var pair = item.split(spl);

			var key = trim_(pair[0]);
			var value = trim_(pair[1]);

			if (key && value) {
				obj[key] = value;
			}
		}
	}
	return obj;
}

function trim_(str) {
	if (str) {
		return str.replace(/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g, '');
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

function alert(type)
{
	var mensagem = '';
	switch(type.status)
	{
		case 'Sucesso':
			mensagem += '<div class="alert alert-success" role="alert">';
			mensagem += type.mensagem;
			mensagem += '</div>';
		break;
		case 'Erro':
			mensagem += '<div class="alert alert-danger" role="alert">';
			mensagem += type.mensagem;
			mensagem += '</div>';
		break;
	}
	$('#formulario-best-drive').append(mensagem);
}

function btnEnviar(status)
{
	switch(status)
	{
		case 'ativo':
			setTimeout(function(){
				$('.btn-enviar-formulario-flutuante').fadeIn();
			},2250);
		break;
		case 'inativo':
			$('.btn-enviar-formulario-flutuante').hide();
		break;
	}
}

function resetForm()
{
	setTimeout(function(){
		$('input, select, textarea').removeClass('valid');
		$('#nome').val('');
		$('#email').val('');
		$('#telefone').val('');
		$('#loja').prop('selectedIndex',0);
		$('#mensagem').val('');
		$('.alert').remove();
	},2000);
}

function getFormulario()
{

	var idFormulario = $('#formulario-best-drive #id-formulario').val();
	var name = $('#formulario-best-drive #nome').val();
	var email = $('#formulario-best-drive #email').val();
	var telefone = $('#formulario-best-drive #telefone').val();
	var loja = $('#formulario-best-drive #loja').val();
	var modelo = $('#formulario-best-drive #modelo').val();
	var calendario = $('#formulario-best-drive #calendario').val();

	//UTM`s
	var utm_source = getParameterByName('utm_source');
	var utm_medium = getParameterByName('utm_medium');
	var utm_content = getParameterByName('utm_content');
	var utm_campaign = getParameterByName('utm_campaign');
	var utm_term = getParameterByName('utm_term');

	var assunto;
	if(window.location.pathname == "/")
	{
		assunto = 'Página Inicial';
	}
	else
		{	
		var res = replaceAll(window.location.pathname, '/', '');
		var res = replaceAll(res, '-', ' ');
		var res = replaceAll(res, '_', ' ');
		var res = res.toUpperCase();
		assunto = 'Página ' + res;
	}

	$.ajax({
		type: "POST",
		url: '/wp-admin/admin-ajax.php',
		data: {
			'action': 'post_contato_best_drive',
			'fitlers': {
				idFormulario: idFormulario,
				assunto: assunto,
				nome: name,
				email: email,
				telefone: telefone,
				loja: loja,
				modelo: modelo,
				data_agendada: calendario,
				url: window.location.hostname + window.location.pathname,
				token: $('#g-recaptcha-response-best-drive').val(),
				utm_source: utm_source,
				utm_medium: utm_medium,
				utm_content: utm_content,
				utm_campaign: utm_campaign,
				utm_term: utm_term
			}
		},
		dataType: "json",
		beforeSend: function()
		{
			$('.btn-enviar-formulario-best-drive').hide();
			$('#formulario-best-drive .loading').fadeIn();
		},
		complete: function(response)
		{
			$('#formulario-best-drive .stap-2').fadeOut();
			$('#formulario-best-drive .stap-dots').fadeOut();
			$('#formulario-best-drive .loading').hide();
			$('.box-voltar').fadeIn();
			bindToAjax();
		},
		success: function(response)
		{
			alert(response);
		},
		error: function()
		{

		}
	});
}