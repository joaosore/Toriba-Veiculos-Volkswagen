<?php
/**
 * 
 * Template Name: Agende seu serviço
 *
 * @package jd
 *
 */

get_header(); 

?>
<div class="barba-container" data-namespace="pageagendeseuservico">
	<div id="body-class" <?php body_class(); ?>></div>
	<?php get_section('agende-seu-servico', 'inicial'); ?>
	<?php get_section('agende-seu-servico', 'servicos'); ?>
	<?php get_section('agende-seu-servico', 'agende'); ?>
</div>
<?php 

get_footer();
