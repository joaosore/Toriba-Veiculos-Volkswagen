<?php
/**
 * 
 * Template Name: Acessorios e Peças
 *
 * @package jd
 *
 */

get_header(); 

?>
<div class="barba-container" data-namespace="pagepecaseacessorios">
	<div id="body-class" <?php body_class(); ?>></div>
	<?php get_section('pecas-e-acessorios', 'inicial'); ?>
	<?php get_section('pecas-e-acessorios', 'cotacao'); ?>
</div>
<?php 

get_footer();