<?php 

function get_interesses($id)
{
	$dados = '';
	$dados = array(
		'title' => get_the_title($id),
		'thumbnail' => get_field('miniatura', $id),
		'url' => get_permalink($id)
	);
	return $dados;
}

?>