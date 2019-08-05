<section class="experimente">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 d-flex justify-content-center flex-column">
				<h2>Experimente a sensação de dirigir um Volks.</h2>
				<p>Agende um test drive através do formulário. É rápido e fácil.</p>
			</div>
			<div class="col-sm-6">
				<form id="formulario-best-drive" class="form-style-1">

					<div class="stap-1">
						<input type="hidden" name="id-formulario" id="id-formulario" value="<?php echo get_formulatio('Formulário Best Drive'); ?>" aria-label="id formulario">
						<input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response-best-drive" aria-label="g-recaptcha-response-best-drive">
						<input type="hidden" name="interesse" id="interesse">
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
						<div class="form-group select">
							<select class="form-control" id="modelo" name="modelo" aria-label="Modelo">
								<option value="" selected>Modelo de interesse</option>
								<?php 
									$lojas = get_zero_km();
									foreach ($lojas as $key => $value) {
										echo '<option value="'.$value['id'].'">'.$value['title'].'</option>'; 
									}
								?>
							</select>
						</div>

						<div class="box-button">
							<a class="btns-a btn-escolher-data" href="">
								<div class="button-1-inverse">
									<span>ESCOLHER DATA</span>
								</div>
							</a>
						</div>
					</div>
					
					<div class="stap-2">

						<div class="form-group">
							<input type="text" class="form-control inputs-1 calendario-input" id="calendario" name="calendario" aria-label="Calendario">
						</div>

						<div class="box-button">
							<a class="btns-a btn-enviar-formulario-best-drive" href="">
								<div class="button-1-inverse">
									<span>Enviar</span>
								</div>
							</a>
						</div>
						<div class="">
							
						</div>
						<?php 
							include __DIR__ . '/../components/loading.php';
						?>
					</div>
					<div class="stap-dots">
						<button class="active"></button>
						<button></button>
					</div>
				</form>
				<div class="box-voltar">
					<div class="box-button voltar">
						<a class="btns-a" href="/best-drive/">
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