<section class="btns">
	<div class="container">
		<div class="row">
			<div class="d-none d-sm-flex col-sm-8 offset-sm-2 btns-item">
				<div class="box-btn">
					<a class="btns-a interesse" href="" data-carro="<?php echo get_zero_km_interna(get_the_ID())['title']; ?>" data-page="Zero KM">
						<div class="button-1">
							<span><?php echo get_dados('cotacao', 107636); ?></span>
						</div>
					</a>
				</div>
				<div class="box-btn">
					<a class="btns-a" href="/best-drive/?modelo=<?php echo get_zero_km_interna(get_the_ID())['title']; ?>">
						<div class="button-1">
							<span><?php echo get_dados('teste_drivre', 107636); ?></span>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>