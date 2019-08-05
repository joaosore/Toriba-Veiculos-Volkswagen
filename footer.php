<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package jd
 */

?>			
	</div>
	<?php get_component('contato'); ?>
	<?php get_component('maps'); ?>
	<?php get_component('grupo'); ?>

	<footer>
		<div class="container pb-65">
			<div class="row">
				<?php 
					$arr = count(wp_get_nav_menu_items('Footer'));
					$arr = $arr - 1;
				?>
				<?php foreach (wp_get_nav_menu_items('Footer') as $key => $value) { ?>
					<?php if($key % 4 == 0 && $key != 0) { ?>
						</div>
					<?php } ?>
					<?php if($key % 4 == 0) { ?>
						<div class="col-sm-3 menu">
					<?php } ?>
						<div class="menu-animate">
							<a href="<?php echo $value->url ?>"><?php echo $value->title ?></a>
						</div>
					<?php if($arr == $key) { ?>
						</div>
					<?php } ?>
				<?php } ?>
				<div class="col-sm-3 menu box-redes">
					<p><?php echo get_dados('titulo_redes_sociais', 107540); ?></p>
					<div class="redes">			
						<?php foreach (get_dados('redes', 107540) as $key => $value) { ?>
							<a href="<?php echo $value['link']['url']; ?>" target="_blank">
								<picture>
									<source media="(min-width: 0px)" data-srcset="<?php echo wp_get_attachment_image_src($value['imagem']['id'], 'redes_sociais')[0] ?>">
									<img class="lazyload" src="" alt="<?php echo $value['alt']; ?>">
								</picture>
							</a>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<div class="box-agencia">
			<span>Designed by:</span>
			<a href="https://www.criah.com.br/">
				<picture>
					<source media="(min-width: 0px)" data-srcset="<?php echo get_template_directory_uri() . '/dist/assets/logo-criah.svg'; ?>">
					<img class="lazyload" src="" alt="Criah">
				</picture>
			</a>
		</div>
	</footer>
		
	<?php wp_footer(); ?>

	<!-- BEGIN JIVOSITE CODE {literal} -->
		<script type='text/javascript'>
		(function(){ var widget_id = 'Yrw47pX5tr';var d=document;var w=window;function l(){
		var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true;
		s.src = '//code.jivosite.com/script/widget/'+widget_id
		; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}
		if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}
		else{w.addEventListener('load',l,false);}}})();
		</script>
	<!-- {/literal} END JIVOSITE CODE -->

</body>
</html>