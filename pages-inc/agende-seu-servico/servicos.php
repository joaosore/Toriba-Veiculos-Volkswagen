<section class="servicos">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="box-cabecalho">
					<h2><?php echo get_dados('nossos_servicos'); ?></h2>
				</div>
			</div>
			<?php foreach (get_dados('itens') as $key => $value) { ?>
				<div class="col-md-6 col-lg-3 box-itens">
					<div class="item">
						<picture class="picture-img">
							<img class="lazyload" src="" data-srcset="<?php echo wp_get_attachment_image_src($value['imagem']['id'], 'img_card_servicos')[0] ?> 1x" alt="<?php echo $value['titulo']; ?>">
						</picture>
						<div class="box-dados">
							<p><b><?php echo $value['titulo']; ?></b></p>
							<p><?php echo $value['descricao'] ?></p>
						</div>
					</div>
				</div>
			<?php } ?> 
		</div>
	</div>
</section>
