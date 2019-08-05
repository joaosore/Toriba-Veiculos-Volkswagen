function BtnMenuHeader()
{
	$('.box-btn-menu').clickOrTouch(function(){
		$('#navbarNav').toggleClass('open', 'open');
		$('.grecaptcha-badge').removeClass('ativo');
	});
}
BtnMenuHeader();

export function RemoveMenu()
{
	$('#navbarNav').removeClass('open');
}

function BtnBalao()
{
	$('.box-btn-balao').clickOrTouch(function(){
		$('#box-form').toggleClass('open', 'open');
		$('.grecaptcha-badge').toggleClass('ativo', 'ativo');
	});
}
BtnBalao();