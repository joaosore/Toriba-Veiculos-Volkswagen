<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package jd
 */

get_header(); ?>
<div class="barba-container" data-namespace="pageseminovosinterna">
	<?php
	while ( have_posts() ) : the_post();
		if(get_the_ID() != NULL)
		{
			get_section('seminovos-interna', 'carro');
		}
	endwhile;
	?>
</div>

<?php
get_footer();