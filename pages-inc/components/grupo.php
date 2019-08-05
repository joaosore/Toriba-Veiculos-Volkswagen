<section class="grupo">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<p>Grupo Toriba</p>
			</div>
			<?php foreach (get_dados('grupo_toriba', 107540) as $key => $value) { ?>
				<div class="col d-flex justify-content-center mb-15 mt-15 grupo-animate">
					<a href="<?php echo verify_link($value); ?>" target="_blank">
						<picture>
							<source media="(min-width: 0px)" data-srcset="<?php echo wp_get_attachment_image_src($value['imagem']['id'], 'grupo_toriba')[0] ?>">
							<img class="lazyload" src="" alt="<?php echo $value['alt']; ?>">
						</picture>
					</a>
				</div>
			<?php } ?>
		</div>
	</div>
</section>