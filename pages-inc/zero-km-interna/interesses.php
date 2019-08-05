<?php 
	if(!empty(get_zero_km_interna(get_the_ID())['interesses'])) 
	{
?>
	<section class="interesses">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-10 offset-sm-1">
					<h2 class="text-center"><?php echo get_dados('titulo_interesses', get_the_ID()); ?></h2>
					<div class="owl-carousel owl-theme owl-carousel-interesses">
						<?php 
							foreach (get_zero_km_interna(get_the_ID())['interesses'] as $key => $value)
							{
						?>
								<div class="item">
									<a href="<?php echo get_interesses($value->ID)['url'] ?>">
										<div class="thumbnail-car">
											<div class="box-img">
												<picture>
													<img class="lazyload" src="" data-srcset="<?php echo wp_get_attachment_image_src(get_interesses($value->ID)['thumbnail']['ID'], 'thumbnail_cars_zero_km_caracteristicas')[0] ?> 1x" alt="<?php echo get_interesses($value->ID)['title'] ?>">
												</picture>
											</div>
											<div class="box-text">
												<p><?php echo get_interesses($value->ID)['title'] ?></p>
											</div>
										</div>
									</a>
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