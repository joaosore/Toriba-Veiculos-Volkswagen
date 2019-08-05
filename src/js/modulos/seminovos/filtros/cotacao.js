import {isMobile} from './../../library.js';

export function init_btn_interesse_cotacao()
{
	$(document).on('click', '.carros a.btn-catacao', function(e){
		e.preventDefault();
		if(isMobile())
		{
			$('.box-btn-balao').click();
			$('#box-form').toggleClass('open', 'open');
			$('.grecaptcha-badge').toggleClass('ativo', 'ativo');
		}
		else
		{
			$('#box-form .btn-mensagem').click();
		}
		$('#interesse').val('Seminovos' + ' - ' + $(this).data('dados'));
	});
}