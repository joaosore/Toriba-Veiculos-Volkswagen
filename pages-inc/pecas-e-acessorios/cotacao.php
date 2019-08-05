<section class="cotacao-page">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 d-flex justify-content-center flex-column">
				<h2><?php echo get_dados('acessorios_e_pecas_titulo'); ?></h2>
				<p><?php echo get_dados('acessorios_e_pecas_descricao'); ?></p>
				<div class="box-servicos">
					<?php foreach (get_dados('servicos') as $key => $value) { ?>
						<p>- <?php echo $value['nome'] ?></p>
					<?php } ?>
				</div>
			</div>
			<div class="col-sm-6">
				<form id="formulario-acessorios-e-pecas" class="form-style-1">

					<div class="stap-1">
						<input type="hidden" name="id-formulario" id="id-formulario" value="<?php echo get_formulatio('Formulário Acessórios e Peças'); ?>" aria-label="id formulario">
						<input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response-acessorios-e-pecas" aria-label="g-recaptcha-response-acessorios-e-pecas">
						
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

						<div class="box-button">
							<a class="btns-a btn-enviar-formulario-acessorios-e-pecas" href="">
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
			</div>
		</div>
	</div>
</section>