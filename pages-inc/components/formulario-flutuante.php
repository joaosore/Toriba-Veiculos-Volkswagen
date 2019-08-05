<div id="box-form">
	<div class="box-btns d-flex d-none-sm">

		<div class="btn-mensagem">
			<span>Mensagem</span>
		</div>

		<div class="btn-close">
			<object type="image/svg+xml" data="<?php echo get_template_directory_uri(); ?>/dist/assets/close.svg" alt="Fechar Formulário"></object>
		</div>

	</div>
	<div class="form-scroll">
		<form id="formulario-flutuante">
			<input type="hidden" name="id-formulario" id="id-formulario" value="<?php echo get_formulatio('Formulário Flutuante'); ?>" aria-label="id formulario">
			<input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response" aria-label="g recaptcha response">
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
				<textarea class="form-control" rows="6" id="mensagem" name="mensagem" placeholder="Mensagem" aria-label="Mensagem"></textarea>
			</div>
			<div class="button-2-inverse btn-enviar-formulario-flutuante form-flutuante">
				<span>Enviar</span>
			</div>
			<?php 
				include __DIR__ . '/loading.php';
			?>
		</form>
	</div>
</div>	