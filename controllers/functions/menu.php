<?php 

function get_menu()
{
	$menus = wp_get_nav_menu_items(3);
	$menuHtml = '';
	foreach ($menus as $key => $menu) {
		$menuHtml .= '<li class="nav-item">';
		$menuHtml .= '	<a class="nav-link" href="'.$menu->url.'">'.$menu->title.'</a>';
		$menuHtml .= '</li>';
	}
	return $menuHtml;
}