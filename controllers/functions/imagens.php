<?php 

add_image_size( 'lugares_mobile', 87.5, 87.5, true );
add_image_size( 'lugares_desktop', 640, 549, true );
add_image_size( 'banners_home', 1920, 520, true );
add_image_size( 'banners_mobile', 414, 678, true );
add_image_size( 'thumbnail_cars_zero_km', 286, 108, false );
add_image_size( 'banners_mobile_zero_km', 414, 9999, false );
add_image_size( 'cards_servicos', 482, 385, true );
add_image_size( 'contato_tipos_imagens', 56, 56, false );
add_image_size( 'pin_maps', 123, 100, false );
add_image_size( 'grupo_toriba', 125, 50, true);
add_image_size( 'redes_sociais', 36, 36, true);
add_image_size( 'thumbnail_cars_zero_km_caracteristicas', 316, 213, false);
add_image_size( 'img_card_servicos', 65, 65, true);
add_image_size( 'img_icon_venda_direta', 36, 40, false);
add_image_size( 'img_atendimento_venda_direta', 792, 489, true);


function get_imagens_size($field, $size)
{
	$attachment_id = get_field($field);
	$image = wp_get_attachment_image_src( $attachment_id, $size );
	return $image[0];
}