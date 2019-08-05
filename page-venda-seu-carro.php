<?php
/**
 * 
 * Template Name: Venda seu carro
 *
 * @package jd
 *
 */

get_header(); 

?>
<div class="barba-container" data-namespace="pagevendaseucarro">
	<div id="body-class" <?php body_class(); ?>></div>
	<?php get_section('venda-seu-carro', 'inicial'); ?>
	<?php get_section('venda-seu-carro', 'compra'); ?>
</div>
<?php 

get_footer();