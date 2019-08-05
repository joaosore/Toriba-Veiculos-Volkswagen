<section class="contato">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-xl-3 offset-xl-1">
				<div class="box-cabecalho">
					<h2 class=""><?php echo get_dados('contato_titulo', 107540); ?></h2>
					<p class="descricao"><?php echo get_dados('contato_descricao', 107540); ?></p>
				</div>
				<div class="tipos-contaos">
					<?php foreach (get_dados('tipos', 107540) as $key => $value) { ?>
					<div class="tipo">
						<picture>
							<img class="lazyload" src="" data-srcset="<?php echo wp_get_attachment_image_src($value['imagem']['id'], 'contato_tipos_imagens')[0] ?> 1x" alt="<?php echo $value['titulo']; ?>">
						</picture>
						<p><?php echo $value['titulo']; ?></p>
						<h2></h2>
					</div>
					<?php } ?>
				</div>
			</div>

			<?php foreach (get_lojas() as $key => $value) { ?>
				<div class="col-lg-4 col-xl-3 <?php if($key == 0) { echo 'offset-xl-1'; } ?> box-contato-p">
					<div class="box-contato">
						<div class="box-1">
							<p class="unidade">Unidade</p>
							<h2><?php echo $value['nome']; ?></h2>
							<p class="endereco"><?php echo $value['endereco_visivel']; ?></p>
						</div>
						<div class="box-2">
							<div class="phones">
								<?php foreach ($value['telefones'] as $key => $tel) { ?>
									<a href="tel:<?php echo $tel['numero'] ?>" class="tel phonemask" target="_blank"><?php echo $tel['numero'] ?></a>
								<?php } ?>
								<?php foreach ($value['whatsapp'] as $key => $whats) { ?>
									<a href="https://api.whatsapp.com/send?phone=55<?php echo $whats['numero'] ?>" class="whats phonemask" target="_blank"><?php echo $whats['numero'] ?></a>
								<?php } ?>
								<div class="box-horaios">
									<?php foreach (get_horaios($value['id']) as $key => $horaios) { ?>
										<?php if($key == 0) { ?>
											<p><b class="pos_venda">Horarios da Loja:</b></p>
										<?php } ?>
										<p>
											<b class="dias"><?php echo $horaios['dias'] ?></b>
											<span class="horaios"><?php echo $horaios['horaios'] ?></span>
										</p>
									<?php } ?>
								</div>
								<div class="box-horaios">
									<?php foreach (get_horarios_pos_venda($value['id']) as $key => $pos_venda) { ?>
										<?php if($key == 0) { ?>
											<p><b class="pos_venda">Pós Venda:</b></p>
										<?php } ?>
										<p>
											<b class="dias"><?php echo $pos_venda['dias'] ?></b>
											<span class="horaios"><?php echo $pos_venda['horaios'] ?></span>
										</p>
									<?php } ?>
								</div>
							</div>
						</div>
						<div class="box-3">
							<a class="btns-a btns" href="#">
								<div class="button-1-inverse fale-com-um-consultor d-none d-lg-flex d-xl-flex">
									<span>Falar com um consultor online</span>
								</div>
							</a>
							<?php foreach ($value['whatsapp'] as $key => $whats) { ?>
								<a class="btns-a btns" href="https://api.whatsapp.com/send?phone=55<?php echo $whats['numero'] ?>" target="_blank">
									<div class="button-1">
										<span>Mensagem via Whatsapp</span>
									</div>
								</a>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>
