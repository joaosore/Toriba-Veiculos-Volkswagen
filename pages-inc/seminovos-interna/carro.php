<section class="carro">
	<div class="container">
		<div class="row">
			<div class="col-lg-11 offset-lg-1">
				<h2><?php echo get_seminovo_interna(get_the_ID())['title']; ?></h2>
			</div>
		</div>
		<div class="row flex-column-reverse lg-flex-column">
			<div class="col-xl-3 offset-xl-1 box-dados-flex">
				<div class="valor">
					<span>R$ </span><span class="money"><?php echo get_seminovo_interna(get_the_ID())['preco']; ?></span><span>,00</span>
				</div>
				<div class="btn-cotacao">
					<a class="btns-a btns btn-catacao" data-dados="<?php echo get_seminovo_interna(get_the_ID())['ano_fabricacao']; ?>/<?php echo get_seminovo_interna(get_the_ID())['ano_modelo']; ?> | <?php echo get_seminovo_interna(get_the_ID())['marca']; ?> | <?php echo get_seminovo_interna(get_the_ID())['modelo']; ?> | <?php echo get_seminovo_interna(get_the_ID())['versao']; ?>" href="#">
						<div class="button-1-inverse fale-com-um-consultor">
							<span>Solicite cotação</span>
						</div>
					</a>
				</div>
				<div class="box-dados">
					<div class="dados">
						<div class="ano">
							<span>Ano: <b>2017/2018</b></span>
						</div>
						<div class="cor">
							<span>Cor: <b>Vermelho</b></span>
						</div>
						<div class="km">
							<span>KM: <b>94,200</b></span>
						</div>
						<div class="cambio">
							<span>Câmbio: <b>Manual</b></span>
						</div>
					</div>

					<?php if(!empty(get_seminovo_interna(get_the_ID())['observacoes'])) { ?>
						<div class="mais-info">
							<p><b>+ Informações</b></p>
							<span><?php echo get_seminovo_interna(get_the_ID())['observacoes']; ?></span>
						</div>
					<?php } ?>
					
					<?php if(isset(get_seminovo_interna(get_the_ID())['opcionais'])) { ?>
						<div class="mais-info">
							<p><b>Opcionais</b></p>
							<div class="box-opcionais-label">
								<?php 
									$len = (count(get_seminovo_interna(get_the_ID())['opcionais']) - 1);
								?>
								<?php foreach (get_seminovo_interna(get_the_ID())['opcionais'] as $key => $value) { ?>
									<span><?php echo $value['item']; ?><?php if($key != $len) { ?>, <?php } ?></span>
								<?php } ?>
							</div>
						</div>
					<?php } ?>

					
				</div>
			</div>
			<div class="col-10 offset-1 col-xl-6 offset-xl-1 box-carousel">
				
				<div class="owl-carousel owl-theme owl-carousel-car">
					<?php foreach (get_seminovo_interna(get_the_ID())['imagens'] as $key => $value) { ?>
					<div class="item">
						<picture>
							<img class="lazyload" src="" data-srcset="<?php echo $value['imagem']; ?> 1x" alt="">
						</picture>
					</div>
					<?php } ?>
				</div>
				<div class="dots-carousel-car d-none d-xl-flex">
					<div class="owl-carousel owl-theme owl-dots-carousel-car">
						<?php foreach (get_seminovo_interna(get_the_ID())['imagens'] as $key => $value) { ?>
						<div class="item">
							<picture>
								<img class="lazyload" src="" data-srcset="<?php echo $value['imagem']; ?> 1x" alt="">
							</picture>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>