<section class="compra">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 d-flex flex-column">
				<h2><?php echo get_dados('venda_seu_carro_titulo'); ?></h2>
				<p><?php echo get_dados('venda_seu_carro_detalhes'); ?></p>
			</div>
			<div class="col-sm-6">
				<form id="formulario-venda-seu-carro" class="form-style-1">

					<div class="stap-1">
						<input type="hidden" name="id-formulario" id="id-formulario" value="<?php echo get_formulatio('Formulário Venda seu carro'); ?>" aria-label="id formulario">
						<input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response-compra-seu-carro" aria-label="g-recaptcha-response-compra-seu-carro">
						
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
							<input type="text" class="form-control inputs-1" id="marca_modelo" name="marca_modelo" placeholder="Marca e Modelo" aria-label="Marca e Modelo">
						</div>
						<div class="form-group">
							<input type="text" class="form-control inputs-1 numero" id="quilometragem" name="quilometragem" placeholder="Quilometragem" aria-label="Quilometragem">
						</div>

						<div class="form-group select">
							<select class="form-control" id="ano" name="ano" aria-label="Ano">
								<option value="" selected>Ano</option>
								<?php 
									for ($i=date("Y"); $i >= 1950; $i--) { 
										echo '<option value="'.$i.'">'.$i.'</option>'; 
									}
								?>
							</select>
						</div>

						<div class="form-group select">
							<select class="form-control" id="portas" name="portas" aria-label="Portas">
								<option value="" selected>Portas</option>
								<?php 
									for ($i=2; $i <= 4; $i++) { 
										echo '<option value="'.$i.' Portas">'.$i.' Portas</option>'; 
									}
								?>
							</select>
						</div>

						<div class="form-group select">
							<select class="form-control" id="cambio" name="cambio" aria-label="cambio">
								<option value="" selected>Câmbio</option>
								<option value="Automático">Automático</option>
								<option value="Manual">Manual</option>
							</select>
						</div>

						<div class="box-button">
							<a class="btns-a btn-enviar-formulario-venda-seu-carro" href="">
								<div class="button-1-inverse">
									<span>Enviar</span>
								</div>
							</a>
						</div>
						<?php 
							include __DIR__ . '/../components/loading.php';
						?>
					</div>
					<div class="alert">
						
					</div>
				</form>
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