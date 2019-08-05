<?php 
	if(!empty(get_zero_km_interna(get_the_ID())['versoes'])) 
	{
?>
	<section class="versoes">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-10 offset-sm-1">
					<h2 class="text-center"><?php echo get_dados('titulo_versoes', get_the_ID()); ?></h2>
					<div class="owl-carousel owl-theme owl-carousel-versoes">
						<?php 
							foreach (get_zero_km_interna(get_the_ID())['versoes'] as $key => $value)
							{
						?>
								<div class="item">
									<div class="thumbnail-car">
										<div class="box-img">
											<picture>
												<img class="lazyload" src="" data-srcset="<?php echo wp_get_attachment_image_src($value['imagem']['ID'], 'thumbnail_cars_zero_km_caracteristicas')[0] ?> 1x" alt="<?php echo $value['versao'] ?>">
											</picture>
										</div>
										<div class="box-text">
											<p><?php echo $value['versao'] ?></p>
											<span>A partir de R$ </span><span class="valor money2"><?php echo $value['valor'] ?>00</span>
										</div>
									</div>
									<div class="box-btn">
										<a class="btns-a interesse" data-page="Zero KM - <?php echo get_the_title(get_the_ID()); ?>" data-carro="<?php echo $value['versao'] ?>" href="">
											<div class="button-1">
												<span>Solicite cotação</span>
											</div>
										</a>
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
<?php 
	}
?>