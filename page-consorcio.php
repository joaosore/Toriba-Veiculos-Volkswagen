<?php
/**
 * 
 * Template Name: Consorcio
 *
 * @package jd
 *
 */

get_header(); 

?>
<div class="barba-container" data-namespace="pageconsorcio">
	<div id="body-class" <?php body_class(); ?>></div>
	<?php get_section('consorcio', 'cotacao'); ?>
</div>
<?php 

get_footer();