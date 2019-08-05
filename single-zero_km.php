<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package jd
 */

get_header(); ?>
<div class="barba-container" data-namespace="pagezerokminterna">
	<?php
	while ( have_posts() ) : the_post();
		if(get_the_ID() != NULL)
		{
			get_section('zero-km-interna', 'inicial');
			get_section('zero-km-interna', 'btns_top');
			get_section('zero-km-interna', 'conteudo');
			get_section('zero-km-interna', 'btns_bottom');
			get_section('zero-km-interna', 'versoes');
			get_section('zero-km-interna', 'interesses');
		}
	endwhile;
	?>
</div>

<?php
get_footer();