<?php 

function get_carousel_banners()
{
	global $wp_query;
	$post_id = $wp_query->post->ID;
	$banners = get_field("banners", $post_id);
	return $banners;
}

function get_carousel_universo()
{
	$carousel = array();
	$query = new WP_Query(array(
		'post_type' => 'zero_km',
		'post_status' => 'publish',
		'posts_per_page' => -1,
		'orderby' => 'title',
		'order'   => 'ASC',
	));
	while ($query->have_posts()) {
		$query->the_post();
		$post_id = get_the_ID();

		limite_caracter(get_field("descricao_do_carro", $post_id));

		$carousel[] = array(
			'title'  => get_the_title(),
			'thumbnail'  => get_field("miniatura", $post_id),
			'previa' => limite_caracter(get_field("descricao_do_carro", $post_id)),
			'url' => get_the_guid($post_id)
			
		);
	}
	return $carousel;
}

function limite_caracter($el)
{
	$res = '';
	if(!empty($el))
	{
		$res = strip_tags($el);
		$res = substr($res, 0, 150);
		$res .= '...';
	}
	return $res;
}