<section class="conteudo">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 offset-sm-2 box-textos">
				<h2><?php echo get_zero_km_interna(get_the_ID())['title']; ?></h2>
				<?php echo get_zero_km_interna(get_the_ID())['descricao_do_carro']; ?>
				<h2><?php echo get_zero_km_interna(get_the_ID())['sub_titulo_da_pagina']; ?></h2>
			</div>
			<div class="col-sm-10 offset-sm-1">
				<div class="owl-carousel owl-theme owl-carousel-conteudo">
					<?php 
						foreach (get_zero_km_interna(get_the_ID())['caracteristica'] as $key => $value)
						{
					?>
						<div class="item">
							<div class="thumbnail-car">
								<div class="box-img">
									<picture>
										<img class="lazyload" src="" data-srcset="<?php echo wp_get_attachment_image_src($value['imagem']['id'], 'thumbnail_cars_zero_km_caracteristicas')[0] ?> 1x" alt="<?php echo $value['descricao']; ?>">
									</picture>
								</div>
								<div class="box-text">
									<h3><?php echo $value['titulo'] ?></h3>
									<p><?php echo $value['descricao'] ?></p>
								</div>
							</div>
						</div>
					<?php 
						}
					?>
				</div>
			</div>
		</div>
	</div>
</section>