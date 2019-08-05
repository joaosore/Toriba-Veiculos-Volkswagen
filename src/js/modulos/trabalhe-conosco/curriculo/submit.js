import {replaceAll} from './../../library.js';


export function init_submit_formulario_trabalhe_conosco()
{
	$(document).on('click', '.btn-enviar-formulario-trabalhe-conosco', function(e){
		e.preventDefault();
		$("#formulario-trabalhe-conosco").submit();
	});
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
	$('.form-style-1 .alert').append(mensagem);
}

export function getFormulario()
{

	var idFormulario = $('#formulario-trabalhe-conosco #id-formulario').val();
	var name = $('#formulario-trabalhe-conosco #nome').val();
	var email = $('#formulario-trabalhe-conosco #email').val();
	var telefone = $('#formulario-trabalhe-conosco #telefone').val();
	var loja = $('#formulario-trabalhe-conosco #loja').val();
	var mensagem = $('#formulario-trabalhe-conosco #mensagem').val();
	var curriculo = $('#formulario-trabalhe-conosco #curriculo').val();

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
			'action': 'post_contatos_trabalhe_conosco',
			'fitlers': {
				idFormulario: idFormulario,
				assunto: assunto,
				nome: name,
				email: email,
				telefone: telefone,
				loja: loja,
				mensagem: mensagem,
				curriculo: curriculo,
				url: window.location.hostname + window.location.pathname,
				token: $('#g-recaptcha-response-trabalhe-conosco').val(),
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
			$('.btn-enviar-formulario-trabalhe-conosco').hide();
			$('#formulario-trabalhe-conosco .loading').fadeIn();
		},
		complete: function(response)
		{
			$('#formulario-trabalhe-conosco .stap-1').fadeOut();
			$('.update').fadeOut();
			$('.alert-upload').fadeOut();
			$('#formulario-trabalhe-conosco .loading').hide();
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

jQuery(function($) {
    $('body').on('change', '#file', function() {
        var file_data = $(this).prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('action', 'file_upload');

        jQuery.ajax({
            url: '/wp-admin/admin-ajax.php',
            type: 'POST',
            contentType: false,
            processData: false,
            data: form_data,
            success: function (response) {
            	var obj = JSON.parse(response);
            	console.log(obj);
            	$('.alert-upload').html('<p class="alert-curriculo">'+obj.mensagem+'</p>');
            	$('.alert-upload').addClass(obj.class);
            	if(obj.status == 'Success')
            	{
            		$('#curriculo').val(obj.upload.url);
            	}
            }
        });
    });
});