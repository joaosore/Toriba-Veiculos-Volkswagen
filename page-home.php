<?php
/**
 * 
 * Template Name: Home
 *
 * @package jd
 *
 */

get_header(); 

?>
<div class="barba-container" data-namespace="pagehome">
	<div id="body-class" <?php body_class(); ?>></div>
	<?php get_section('home', 'inicial'); ?>
	<?php get_section('home', 'universo'); ?>
	<?php get_section('home', 'servicos'); ?>
	<?php get_section('home', 'seminovos'); ?>
</div>
<?php 

get_footer();