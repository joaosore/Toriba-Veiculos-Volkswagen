<?php
/**
 * 
 * Template Name: Seminovos
 *
 * @package jd
 *
 */

get_header(); 

?>
<div class="barba-container" data-namespace="pageseminovos">
	<div id="body-class" <?php body_class(); ?>></div>
	<?php get_section('seminovos', 'inicial'); ?>
	<?php get_section('seminovos', 'filtro'); ?>
	<?php get_section('seminovos', 'carros'); ?>
</div>
<?php 

get_footer();