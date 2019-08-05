
export function menu_active()
{
	$('.nav-item a').removeClass('active');
	if($('#body-class').hasClass('page-template-page-zero-km'))
	{
		$('.nav-item:eq(1) a').addClass('active');
	}
	else if($('#body-class').hasClass('page-template-page-seminovos'))
	{
		$('.nav-item:eq(2) a').addClass('active');
	}
	else if($('#body-class').hasClass('page-template-page-venda-direta'))
	{
		$('.nav-item:eq(3) a').addClass('active');
	}
	else if($('#body-class').hasClass('page-template-page-pcd'))
	{
		$('.nav-item:eq(4) a').addClass('active');
	}
	else if($('#body-class').hasClass('page-template-page-consorcio'))
	{
		$('.nav-item:eq(5) a').addClass('active');
	}
	else if($('#body-class').hasClass('page-template-page-venda-seu-carro'))
	{
		$('.nav-item:eq(6) a').addClass('active');
	}
	else if($('#body-class').hasClass('page-template-page-acessorios-e-pecas'))
	{
		$('.nav-item:eq(7) a').addClass('active');
	}
}