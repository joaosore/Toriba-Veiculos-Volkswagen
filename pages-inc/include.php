<?php 

function get_section($page, $name)
{
	include_once get_template_directory() . '/pages-inc/'.$page.'/'.$name.'.php';
}

function get_component($name)
{
	include_once get_template_directory() . '/pages-inc/components/'.$name.'.php';
}