<?php 

function get_servicos()
{
	global $wp_query;
	$post_id = $wp_query->post->ID;
	$servicos = get_field("lista_de_servicos", $post_id);
	return $servicos;
}

function count_servicos()
{
	$total = count(get_servicos());
	return $total;
}