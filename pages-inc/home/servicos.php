<section class="servicos">
	<div class="container-fluid box-max-width">
		<div class="row">
			<?php
				foreach (get_servicos() as $key => $value) { 
			?>
				<div class="col-lg-4 <?php if ($key == 0 && count_servicos() == 2){ echo 'offset-lg-2'; } else if ($key == 0 && count_servicos() == 1){ echo 'offset-lg-4'; }  ?>">
					<div class="card-custom">
						<div class="box-intern">
							<div class="box-mold">
								<picture>
									<source media="(min-width: 0px)" data-srcset="<?php echo wp_get_attachment_image_src($value['imagem_de_fundo']['id'], 'cards_servicos')[0] ?>">
									<img class="lazyload" src="" alt="<?php echo $value['servico']; ?>">
								</picture>
								<div class="mask"></div>
								<div class="mask_hover"></div>
								<div class="conteudo">
									<h2><?php echo $value['servico']; ?></h2>
									<p><?php echo $value['descricao']; ?></p>
									<div class="box-btn">
										<a class="btns-a" href="<?php echo $value['servicos_link_botao']['url']; ?>">
											<div class="button-2">
												<span><?php echo $value['servicos_titulo_botao']; ?></span>
											</div>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php 
				} 
			?>
		</div>
	</div>
</section>