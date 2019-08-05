<section class="agende">
	<div class="container">
		<div class="row">
			<div class="col-md-6 d-flex justify-content-center flex-column">
				<h2><?php echo get_dados('agende_titulo'); ?></h2>
				<p><?php echo get_dados('agende_descricao'); ?></p>
				<div class="box-numeros">
					<?php foreach (get_dados('telefones') as $key => $value) { ?>
						<a href="<?php if($value['tipo'] == 'telefone') { echo "tel:".$value['numero']; } else { echo "https://api.whatsapp.com/send?phone=55".$value['numero']; } ?>" class="phonemask <?php echo $value['tipo'] ?>" target="_blank">
							<?php echo $value['numero'] ?>
						</a>
					<?php } ?>
				</div>
			</div>
			<div class="col-md-6">
				<form id="formulario-agende" class="form-style-1">

					<div class="stap-1">
						<input type="hidden" name="id-formulario" id="id-formulario" value="<?php echo get_formulatio('Formulário Agende seu serviço'); ?>" aria-label="id formulario">
						<input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response-agende" aria-label="g-recaptcha-response-agende">
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
						<div class="form-group">
							<input type="text" class="form-control inputs-1" id="marca_modelo" name="marca_modelo" placeholder="Marca e Modelo" aria-label="Marca e Modelo">
						</div>

						<div class="form-group">
							<input type="text" class="form-control inputs-1 placa" id="placa" name="placa" placeholder="Placa" aria-label="Placa">
						</div>

						<div class="form-group">
							<textarea class="form-control" rows="6" id="mensagem" name="mensagem" placeholder="Mensagem" aria-label="Mensagem"></textarea>
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
							<a class="btns-a btn-enviar-formulario-agende" href="">
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
						<a class="btns-a" href="/agende-seu-servico/">
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