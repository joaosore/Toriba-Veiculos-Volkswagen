<section class="atendimento">
	<div class="container">
		<div class="row">
			<div class="col-sm-5 offset-sm-1 box-titulo">
				<h2><?php echo get_dados('titulo_venda_direta'); ?></h2>
				<p><?php echo get_dados('descricao_venda_direta'); ?></p>
			</div>
		</div>
		<?php foreach (get_dados('atendimento_venda_direta') as $key => $value) { ?>
			<div class="row <?php if($key % 2 == 0) {} else { echo 'flex-sm-row-reverse'; } ?>">
				<?php if($key % 2 == 0) { ?>
					
				<?php } else { ?>
					<div class="col-sm-1 mb-75"></div>
				<?php } ?>

				<div class="col-sm-4 <?php if($key % 2 == 0) { echo 'offset-sm-1'; } else {} ?> dados mb-15">
					<div class="box-title">
						<picture>
							<img class="lazyload" src="" data-srcset="<?php echo wp_get_attachment_image_src($value['icone']['id'], 'img_icon_venda_direta')[0] ?> 1x" alt="<?php echo $value['descricao'] ?>">
						</picture>
						<h2><?php echo $value['titulo']; ?></h2>
					</div>
					<div class="box-descricao">
						<p><?php echo $value['descricao']; ?></p>
					</div>
					<a class="btns-a btns interese" href="" data-atendimento="<?php echo $value['titulo']; ?>" data-page="Venda Direta">
						<div class="button-1">
							<span><?php echo $value['botao']; ?></span>
						</div>
					</a>
				</div>
				<div class="col-sm-6 mb-75">
					<picture>
						<img class="lazyload img-fluid img-item" src="" data-srcset="<?php echo wp_get_attachment_image_src($value['imagem']['id'], 'img_atendimento_venda_direta')[0] ?> 1x" alt="<?php echo $value['descricao'] ?>">
					</picture>
				</div>
			</div>
		<?php } ?>
	</div>
</section>