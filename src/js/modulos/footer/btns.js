import {isMobile} from './../library.js';

export function init_btn_cotacao_seguro()
{
	$(document).on('click', 'a[href="#cotacao-seguro"]', function(){
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
		$('#interesse').val('Cotação de Seguro');
	});
}