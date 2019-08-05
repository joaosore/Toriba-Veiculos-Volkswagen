<?php
/**
 * 
 * Template Name: PCD
 *
 * @package jd
 *
 */

get_header(); 

?>
<div class="barba-container" data-namespace="pagepcd">
	<div id="body-class" <?php body_class(); ?>></div>
	<?php get_section('venda-direta', 'inicial'); ?>
	<?php get_section('venda-direta', 'atendimento'); ?>
</div>
<?php 

get_footer();