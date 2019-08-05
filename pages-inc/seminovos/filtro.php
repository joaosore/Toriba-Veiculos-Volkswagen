<section class="filtros">
	<div class="header-menu d-md-none d-flex">
		<div class="filter-close">
			<div class="btn-close">
				<object type="image/svg+xml" data="<?php echo get_template_directory_uri(); ?>/dist/assets/close.svg" alt="Fechar Filtro"></object>
			</div>
		</div>
		<div class="filter-clear">
			<span>Limpar Filtros</span>
		</div>
	</div>
	<div class="box-fintro-simples">
		<div class="container">
			<div class="row form-style-1 rm-m-widht">
				<div class="offset-md-1 col-md-2">
					<div class="form-group">
						<div class="nome-campo d-flex d-md-none">
							<span>Marca</span>
							<div class="line"></div>
						</div>
						<div class="select">
							<select class="form-control" id="marca" name="marca" aria-label="Marcas">
								
							</select>
						</div>
					</div>
				</div>
				<div class="col-md-2">
					<div class="nome-campo d-flex d-md-none">
						<span>Modelo</span>
						<div class="line"></div>
					</div>
					<div class="form-group select">
						<select class="form-control" id="modelo" name="loja" aria-label="Modelos">
							
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="nome-campo d-flex d-md-none">
						<span>Ano</span>
						<div class="line"></div>
					</div>
					<div class="box-ano">
						<span class="d-none d-md-block">Ano:</span>
						<div class="form-group select segunda-cor">
							<select class="form-control" id="ano_de" name="ano_de" aria-label="Ano de">
							</select>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="box-ano">
						<span>-</span>
						<div class="form-group select segunda-cor">
							<select class="form-control" id="ano_ate" name="ano_ate" aria-label="Ano até">
								<option value="" selected>Até</option>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="box-fintro-complexo">
		<div class="container">
			<div class="row">
				<div class="col-md-2 d-none d-md-flex justify-content-center align-items-center">
					<span>Refine sua busca:</span>
				</div>
				<div class="col-md-2 box-portas">
					<div class="btns-refine nome-campo portas">
						<span>PORTAS</span>
						<div class="line"></div>
						<input type="hidden" name="porta" id="input-porta">
					</div>
					<div class="option">
						<div class="box-option">
							<div class="componet">
								<picture>
									<img class="lazyload" src="" data-srcset="<?php echo get_template_directory_uri(); ?>/dist/assets/car.svg 1x" alt="Numero de Portas">
								</picture>
								<div class="btns-up-down">
									<div class="down disable"></div>

									<span class="num" data-index="0"></span>
									<span class="text">portas</span>

									<div class="up"></div>
								</div>
							</div>
							<div class="buttons">
								<span class="limpar" data-limpar="limpar-porta">Limpar</span>
								<span class="aplicar" id="aplicar-porta">Aplicar</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-2">
					<div class="btns-refine nome-campo btn-km">
						<span>KM</span>
						<div class="line"></div>
					</div>
					<div class="option">
						<div class="box-option">
							<div class="componet">
								<picture>
									<img class="lazyload" src="" data-srcset="<?php echo get_template_directory_uri(); ?>/dist/assets/velocimentro.svg 1x" alt="Total de KMs Rodados">
								</picture>
								<div class="btns-range">
									<div class="box-dados">
										<span class="min numero"></span><span> KM</span>
										<span class="separacao"> - </span>
										<span class="max numero"></span><span> KM</span>
									</div>
									<input id="km-range" type="hidden" class="range-slider" value="25,75" />
								</div>
							</div>
							<div class="buttons">
								<span class="limpar" data-limpar="limpar-km">Limpar</span>
								<span class="aplicar" id="aplicar-km" >Aplicar</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-2">
					<div class="btns-refine nome-campo">
						<span>COR</span>
						<div class="line"></div>
					</div>
					<div class="option">
						<div class="box-option">
							<div class="componet">
								<picture>
									<img class="lazyload" src="" data-srcset="<?php echo get_template_directory_uri(); ?>/dist/assets/balde_cor.svg 1x" alt="Numero de Portas">
								</picture>
								<div class="btns-checkbox scroll">

								</div>
							</div>
							<div class="buttons">
								<span class="limpar" data-limpar="limpar-cor">Limpar</span>
								<span class="aplicar" id="aplicar-cor">Aplicar</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-2">
					<div class="btns-refine nome-campo btn-price">
						<span>PREÇO</span>
						<div class="line"></div>
					</div>
					<div class="option">
						<div class="box-option">
							<div class="componet">
								<picture>
									<img class="lazyload" src="" data-srcset="<?php echo get_template_directory_uri(); ?>/dist/assets/price-tag.svg 1x" alt="Total de KMs Rodados">
								</picture>
								<div class="btns-range">
									<div class="box-dados">
										<span>R$ </span><span class="min money"></span>
										<span class="separacao"> - </span>
										<span>R$ </span><span class="max money"></span>
									</div>
									<input id="price-range" type="hidden" class="range-slider" value="25,75" />
								</div>
							</div>
							<div class="buttons">
								<span class="limpar" data-limpar="limpar-price">Limpar</span>
								<span class="aplicar" id="aplicar-price">Aplicar</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-2">
					<div class="btns-refine nome-campo">
						<span>OPCIONAIS</span>
						<div class="line"></div>
					</div>
					<div class="option">
						<div class="box-option">
							<div class="componet">
								<picture>
									<img class="lazyload" src="" data-srcset="<?php echo get_template_directory_uri(); ?>/dist/assets/star.svg 1x" alt="Total de KMs Rodados">
								</picture>
								<div class="btns-range scroll">
									<div class="box-itens box-opcionais">
									</div>
								</div>
							</div>
							<div class="buttons">
								<span class="limpar" data-limpar="limpar-opcionais">Limpar</span>
								<span class="aplicar" id="aplicar-opcionais">Aplicar</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="btns-mobile d-md-none d-flex">
		<div class="box-button">
			<a class="btns-a btns d-md-none d-flex" href="#">
				<div class="button-2 btn-buscar-mobile">
					<span>Buscar</span>
				</div>
			</a>
		</div>
		<div class="col-md-2">
			<div class="mais-filtros">
				<span>Mais Filtos</span>
				<div class="seta"></div>
			</div>
		</div>
	</div>
</section>