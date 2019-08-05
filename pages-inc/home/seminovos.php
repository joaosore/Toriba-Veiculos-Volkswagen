<section class="seminovos">
	<div class="container">
		<div class="row">
			<div class="offset-md-1 col-md-11 box-cabecalho">
				<h2 class=""><?php echo get_dados('seminovos_titulo'); ?></h2>
				<p class="descricao"><?php echo get_dados('seminovos_descricao'); ?></p>
			</div>
		</div>
	</div>
	<div class="container-fluid pt-50 pb-50">
		<div class="row">
			<div class="col">
				<div class="owl-carousel owl-theme owl-carousel-seminovos box-max-width">
					<?php foreach (get_seminovos_four_itens() as $key => $value) { ?>
						<div class="item">
							<div class="box-card">
								<div class="thumbnail-car">
									<div class="box-img">
										<picture>
											<img class="lazyload" src="" data-srcset="<?php echo $value['banner'] ?> 1x" alt="<?php echo $value['modelo'] ?> <?php echo $value['versao'] ?>">
										</picture>
									</div>
									<div class="box-text">
										<div class="bg"></div>
										<div class="box-btn">
											<a class="btns-a" href="<?php echo $value['link'] ?>">
												<div class="button-2">
													<span><?php echo get_dados('seminovos_botao_detalhes'); ?></span>
												</div>
											</a>
										</div>
									</div>
								</div>
								<div class="descricao">
									<h4 class="modelo"><?php echo $value['modelo'] ?> <?php echo $value['versao'] ?></h4>
									<h4 class="valor">
										<span>R$ </span><span class="money"><?php echo $value['preco'] ?></span><span>,00</span>
									</h4>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>