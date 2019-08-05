<section class="inicial carosel">
	<div class="container-fluid">
		<div class="row">
			<div class="col no-padding">
				<div class="owl-carousel owl-theme owl-carousel-banners">
					<?php 
						foreach (get_carousel_banners() as $key => $value) {
						?>
							<div class="item" data-seta-desktop="<?php echo $value['tipo_de_seta_desktop']; ?>" data-seta-mobile="<?php echo $value['tipo_de_seta_mobile']; ?>">
								<?php 
									if(!empty($value['link']))
									{
									?>
										<a href="<?php echo $value['link']; ?>">
									<?php 
									}
								?>
								<picture>
									<source media="(max-width: 767px)" data-srcset="<?php echo wp_get_attachment_image_src($value['imagem_mobile']['id'], 'banners_mobile')[0] ?>">
									<source media="(min-width: 768px)" data-srcset="<?php echo wp_get_attachment_image_src($value['imagem_desktop']['id'], 'banners_desktop')[0] ?>">
									<img class="lazyload" src="" alt="<?php echo $value['descricao_da_imagem']; ?>">
								</picture>
								<?php 
									if(!empty($value['link']))
									{
									?>
										</a>
									<?php 
									}
								?>
							</div>
						<?php 
						}
					?>
				</div>
			</div>
		</div>
	</div>
</section>