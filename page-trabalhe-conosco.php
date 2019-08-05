<?php
/**
 * 
 * Template Name: Trabalhe conosco
 *
 * @package jd
 *
 */

get_header(); 

?>
<div class="barba-container" data-namespace="pagetrabalheconosco">
	<div id="body-class" <?php body_class(); ?>></div>
	<?php get_section('trabalhe-conosco', 'inicial'); ?>
	<?php get_section('trabalhe-conosco', 'curriculo'); ?>
</div>
<?php 

get_footer();