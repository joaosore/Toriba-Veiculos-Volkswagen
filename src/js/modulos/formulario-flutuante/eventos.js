export function init_eventos_formulario_flutuante()
{
	$('#box-form .btn-close').clickOrTouch(function(){
		$('#box-form').removeClass('open');
		$('.box-btns').removeClass('open-close');
		$('#interesse').val('');
	});

	$('#box-form .btn-mensagem').clickOrTouch(function(){
		$('#box-form').addClass('open');
		$('.box-btns').addClass('open-close');
	});
}