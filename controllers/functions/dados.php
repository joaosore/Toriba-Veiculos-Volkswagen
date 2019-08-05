<?php 

function get_dados($field, $id = null)
{
	global $wp_query;
	if(empty($id))
	{
		$id = $wp_query->post->ID;
	}
	return get_field($field, $id);
}

function verify_link($value)
{
	$data = '';

	if(isset($value['link']['url']))
	{
		$data = $value['link']['url'];
	}
	else if(isset($value['url']))
	{
		$data = $value['url'];
	}

	return $data;
}