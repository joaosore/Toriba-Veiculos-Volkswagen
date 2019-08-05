<section class="universo-home">
	<div class="container">
		<div class="row">
			<div class="offset-md-1 col-md-6 col-lg-4 box-cabecalho text-center text-md-left text-lg-left text-xl-left">
				<h2 class=""><?php echo get_dados('universo_titulo'); ?></h2>
				<p class="descricao"><?php echo get_dados('universo_descricao'); ?></p>
			</div>
			<div class="col-md-5 col-lg-7 d-none d-lg-flex d-xl-flex box-cabecalho">
				<div class="box-btn">
					<a class="btns-a" href="<?php echo get_dados('universo_btn_link')['url']; ?>">
						<div class="button-1">
							<span><?php echo get_dados('universo_btn_title'); ?></span>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="owl-carousel owl-theme owl-carousel-universo">
					<?php 
						foreach (get_carousel_universo() as $key => $value)
						{
					?>
						<a href="<?php echo $value['url']; ?>">
							<div class="item">
								<div class="thumbnail-car">
									<div class="box-img">
										<picture>
											<img class="lazyload" src="" data-srcset="<?php echo wp_get_attachment_image_src($value['thumbnail']['id'], 'thumbnail_cars_zero_km')[0] ?> 1x" alt="<?php echo $value['title']; ?>">
										</picture>
									</div>
									<div class="box-text">
										<div class="bg"></div>
										<p><?php echo $value['previa']; ?></p>
									</div>
								</div>
								<h3><?php echo $value['title']; ?></h3>
							</div>
						</a>
					<?php 
						}
					?>
				</div>
			</div>
			<div class="col-12 box-cabecalho d-flex d-lg-none d-xl-none align-items-center justify-content-center">
				<div class="box-btn">
					<a class="btns-a" href="<?php echo get_dados('universo_btn_link')['url']; ?>">
						<div class="button-1">
							<span><?php echo get_dados('universo_btn_title'); ?></span>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>