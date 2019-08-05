export function servico_init_card()
{
	hover();
}

function hover()
{
	$(".box-mold")
	.mouseenter(function() {
		$(this).find('.mask_hover').addClass('active');
	})
	.mouseleave(function() {
		$(this).find('.mask_hover').removeClass('active');
	});
}