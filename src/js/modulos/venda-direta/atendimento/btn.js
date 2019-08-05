export function init_btn_venda_direta()
{
	btn();
}

function btn()
{
	$('.interese').clickOrTouch(function(e){
		e.preventDefault();
		$('#box-form .btn-mensagem').click();
		$('#interesse').val($(this).data('atendimento') + ' - ' + $(this).data('page'));
	});
}