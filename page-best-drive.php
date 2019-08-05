<?php
/**
 * 
 * Template Name: Best Drive
 *
 * @package jd
 *
 */

get_header(); 

?>
<div class="barba-container" data-namespace="pagebestdrive">
	<div id="body-class" <?php body_class(); ?>></div>
	<?php get_section('best-drive', 'inicial'); ?>
	<?php get_section('best-drive', 'experimente'); ?>
</div>
<?php 

get_footer();