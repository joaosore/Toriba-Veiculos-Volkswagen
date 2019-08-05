<section class="curriculo">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 d-flex justify-content-center flex-column">
				<h2><?php echo get_dados('trabalhe_conosco_titulo'); ?></h2>
			</div>
			<div class="col-sm-6">
				<div class="form-style-1">
					<form id="formulario-trabalhe-conosco" enctype="multipart/form-data">

						<div class="stap-1">
							<input type="hidden" name="id-formulario" id="id-formulario" value="<?php echo get_formulatio('Formulário Trabalhe conosco'); ?>" aria-label="id formulario">
							<input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response-trabalhe-conosco" aria-label="g-recaptcha-response-trabalhe-conosco">
							<input type="hidden" name="curriculo" id="curriculo">

							<div class="form-group">
								<input type="text" class="form-control inputs-1" id="nome" name="nome" placeholder="Nome" aria-label="Nome">
							</div>
							<div class="form-group">
								<input type="email" class="form-control inputs-1" id="email" name="email" placeholder="Email" aria-label="E-mail">
							</div>
							<div class="form-group">
								<input type="text" class="form-control inputs-1 phonemask" id="telefone" name="telefone" placeholder="Telefone" aria-label="Telefone">
							</div>

							<div class="form-group select">
								<select class="form-control" id="loja" name="loja" aria-label="Lojas">
									<option value="" selected>Escolha a loja</option>
									<?php 
										$lojas = get_lojas('nome');
										foreach ($lojas as $key => $value) {
											echo '<option value="'.$value['id'].'">'.$value['nome'].'</option>'; 
										}
									?>
								</select>
							</div>
							
							<div class="form-group">
								<textarea class="form-control" rows="6" id="mensagem" name="mensagem" placeholder="Mensagem" aria-label="Mensagem"></textarea>
							</div>

							<?php 
								include __DIR__ . '/../components/loading.php';
							?>
						</div>
					</form>

					<div class="alert-upload">
						
					</div>

					<form class="update" method="post" enctype="multipart/form-data">
						<div class="form-group d-flex box-buttons-cunston">
							<label class="btn-upload pr-15">
								<div class="btns-a">
									<div class="button-1-inverse">
										<div class="btn-click">Currículo</div>
										<input type="file" class="form-control inputs-1" id="file" name="file" placeholder="Anexar curriculo" aria-label="Anexar curriculo" style="visibility:hidden;" accept="image/*,.pdf">
									</div>
								</div>
							</label>
							<a class="btns-a btn-enviar-formulario-trabalhe-conosco" href="">
								<div class="button-1-inverse">
									<span>Enviar</span>
								</div>
							</a>
						</div>
					</form>
		
					<div class="box-button">
						
					</div>

					<div class="alert">
							
					</div>

				</div>
				<div class="box-voltar">
					<div class="box-button voltar">
						<a class="btns-a" href="/venda-seu-carro/">
							<div class="button-1-inverse">
								<span>Voltar</span>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>