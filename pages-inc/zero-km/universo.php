<section class="universo">
	<div class="container">
		<div class="row">
			<div class="offset-md-1 col-md-6 col-lg-4 box-cabecalho">
				<h2 class=""><?php echo get_dados('universo_titulo'); ?></h2>
				<p class="descricao"><?php echo get_dados('universo_descricao'); ?></p>
			</div>
		</div>
		<div class="row">
			<?php foreach (get_zero_km() as $key => $value) { ?>
				<div class="col-md-4 col-lg-3 box-car">
					<picture>
						<img class="lazyload" src="" data-srcset="<?php echo wp_get_attachment_image_src($value['thumbnail']['id'], 'thumbnail_cars_zero_km')[0] ?> 1x" alt="<?php echo $value['title']; ?>">
					</picture>
					<p class="title"><?php echo $value['title']; ?></p>
					<p class="valor">
						<?php if(!empty($value['valor'])) { ?>
							<span>A partir de R$ </span>
							<span class="valor money2"><?php echo $value['valor']; ?>00</span>
						<?php } ?>
					</p>
					<div class="box-btn">
						<a class="btns-a" href="<?php echo verify_link($value); ?>">
							<div class="button-1">
								<span><?php echo get_dados('botao_carros'); ?></span>
							</div>
						</a>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>