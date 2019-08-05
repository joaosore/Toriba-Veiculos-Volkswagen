<section class="maps">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<h2><?php echo get_dados('maps_titulo', 107540); ?></h2>
				<form class="box-form" method="post">
					<input type="hidden" id="pin_voce" value="<?php echo get_dados('maps_voce_esta_aqui', 107540)['sizes']['pin_maps']; ?>">
					<div class="maps">
						<input class="" type="text" id="dirDst" value="" placeholder="Seu Local" />
					</div>
					<div class="maps select-maps">
						<select class="" id="dirSrc">
							<option value="">Escolha a unidade</option>
							<?php foreach (get_lojas() as $key => $value) { ?>
								<option value="<?php echo $value['endereco']['address'] ?>" data-img="<?php echo $value['icone_maps']['sizes']['pin_maps'] ?>"><?php echo $value['nome'] ?></option>
							<?php } ?>
						</select>
					</div>
                    <div class="btn-rota btns-a">
						<div class="button-1">
							<span><?php echo get_dados('botao_texto', 107540); ?></span>
						</div>
                    </div>
                    <div class="sair-mapa btns-a">
						<div class="button-1">
							<span>X</span>
						</div>
                    </div>
                </form>
			</div>
			<div class="col-sm-12 no-padding box-maps">
				<div id="map" style="width: 100%; height: 50vh"></div>
			</div>
		</div>
	</div>
</section>