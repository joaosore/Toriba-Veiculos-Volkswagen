import {isMobile} from './../library.js';

export function init_btn_interesse_zero_km_interna()
{
	$('a.interesse').clickOrTouch(function(e){
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
		$('#interesse').val($(this).data('page') + ' - ' + $(this).data('carro'));
	});
}