<?php 
function send_mail_wp($form)
{

	$recebedores = get_recebedores($form['loja'], $form['idFormulario']);

	$to = $recebedores;
	$subject = 'Contato Site - '. $form['assunto'] .' - ('. $form['nome'] .')';

	$headers = array(
		'Content-Type: text/html; charset=UTF-8'
	);

	# Topo
	$body = '<!DOCTYPE html><html><head></head><body style="background-color: #ebebeb;">';

		$body .= '<table width="730" cellspacing="0" cellpadding="0" height="50"></table>';
		$body .= '<table width="730" cellspacing="0" cellpadding="0" align="center" style="background-color: #fff;">';
			$body .= '<tr>';
				$body .= '<td width="50"></td>';
				$body .= '<td>';

					$body .= '<table width="630" cellspacing="0" cellpadding="0" align="center" style="font-family: Verdana, Arial, sans-serif; background-color: #fff;">';
						$body .= '<tr height="30"></tr>';
						$body .= '<tr>';
							$body .= '<td width="45"></td>';
							$body .= '<td width="640">';
								$logo_principal = get_field('header_logo', 'options');
								$body .= '<img src="' . $logo_principal['url'] . '" width="200" >';
							$body .= '</td>';
							$body .= '<td width="45"></td>';
						$body .= '</tr>';
						$body .= '<tr height="30"></tr>';
					$body .= '</table>';

					$body .= '<table width="630" cellspacing="0" cellpadding="0" align="center" style="font-family: Verdana, Arial, sans-serif; background-color: #fff;">';
						$body .= '<tr><td colspan="2" align="center"><h3>Contato via site</h3></td></tr>';
						if (isset($form['nome'])) {
							if ($form['nome'] != '') {
								$body .= '<tr><td style="padding-right:4px; width:24%;"><b>Nome:</b> </td><td>'. $form['nome'] .'</td></tr>';
							}
						}
						if (isset($form['telefone'])) {
							if ($form['telefone'] != '') {
								$body .= '<tr><td style="padding-right:4px; width:24%;"><b>Telefone:</b> </td><td>'. $form['telefone'] .'</td></tr>';
							}
						}
						if (isset($form['loja'])) {
							if ($form['loja'] != '') {
								$body .= '<tr><td style="padding-right:4px; width:24%;"><b>Loja:</b> </td><td>'. get_loja($form['loja']) .'</td></tr>';
							}
						}
						if (isset($form['modelo'])) {
							if($form['modelo'] != '')
							{
								$body .= '<tr><td style="padding-right:4px; width:24%;"><b>Modelo:</b> </td><td>'. get_modelo($form['modelo']) .'</td></tr>';
							}
						}
						if (isset($form['email'])) {
							if ($form['email'] != '') {
								$body .= '<tr><td style="padding-right:4px; width:24%;"><b>E-mail:</b> </td><td>'. $form['email'] .'</td></tr>';
							}
						}
						if (isset($form['assunto'])) {
							if ($form['assunto'] != '') {
								$body .= '<tr><td style="padding-right:4px; width:24%;"><b>Assunto:</b> </td><td>'. $form['assunto'] .'</td></tr>';
							}
						}
						if (isset($form['interesse'])) {
							if($form['interesse'] != '')
							{
								$body .= '<tr><td style="padding-right:4px; width:24%;"><b>Interesse:</b> </td><td>'. $form['interesse'] .'</td></tr>';
							}
						}

						if (isset($form['mensagem'])) {
							if($form['mensagem'] != '')
							{
								$body .= '<tr><td style="padding-right:4px; width:24%;"><b>Menssage:</b> </td><td>'. $form['mensagem'] .'</td></tr>';
							}
						}


						if (isset($form['marca_modelo'])) {
							if($form['marca_modelo'] != '')
							{
								$body .= '<tr><td colspan="2" align="center">-----------------------------------------------------------------------</td></tr>';
								$body .= '<tr><td style="padding-right:4px; width:24%;"><b>Marca e Modelo:</b> </td><td>'. $form['marca_modelo'] .'</td></tr>';
							}
						}
						if (isset($form['quilometragem'])) {
							if($form['quilometragem'] != '')
							{
								$body .= '<tr><td style="padding-right:4px; width:24%;"><b>Quilometragem:</b> </td><td>'. $form['quilometragem'] .'</td></tr>';
							}
						}
						if (isset($form['ano'])) {
							if($form['ano'] != '')
							{
								$body .= '<tr><td style="padding-right:4px; width:24%;"><b>Ano:</b> </td><td>'. $form['ano'] .'</td></tr>';
							}
						}
						if (isset($form['portas'])) {
							if($form['portas'] != '')
							{
								$body .= '<tr><td style="padding-right:4px; width:24%;"><b>Portas:</b> </td><td>'. $form['portas'] .'</td></tr>';
							}
						}
						if (isset($form['cambio'])) {
							if($form['cambio'] != '')
							{
								$body .= '<tr><td style="padding-right:4px; width:24%;"><b>Cambio:</b> </td><td>'. $form['cambio'] .'</td></tr>';
							}
						}
						if (isset($form['placa'])) {
							if($form['placa'] != '')
							{
								$body .= '<tr><td style="padding-right:4px; width:24%;"><b>Placa:</b> </td><td>'. $form['placa'] .'</td></tr>';
							}
						}
						if (isset($form['curriculo'])) {
							if($form['curriculo'] != '')
							{
								$body .= '<tr><td style="padding-right:4px; width:24%;"><b>Curriculo:</b> </td><td><a href="'. $form['curriculo'] .'" target="_blank">Link</a></td></tr>';
							}
						}

						

						if ($form['url'] != '') {
	                    	$body .= '<tr><td colspan="2" align="center">-----------------------------------------------------------------------</td></tr>';
	                    	$body .= '<tr><td style="padding-right:4px; width:24%;"><b>Origem da Conversão:</b> </td><td><a href="https://'. $form['url'] .'">https://'. $form['url'] .'</a></td></tr>';
	                    }
	                    if ($form['utm_source'] != '') {
	                        $body .= '<tr><td style="padding-right:4px; width:24%;"><b>UTM Source:</b> </td><td>'. $form['utm_source'] .'</td></tr>';
	                    }
	                    if ($form['utm_medium'] != '') {
	                        $body .= '<tr><td style="padding-right:4px; width:24%;"><b>UTM Medium:</b> </td><td>'. $form['utm_medium'] .'</td></tr>';
	                    }
	                    if ($form['utm_content'] != '') {
	                        $body .= '<tr><td style="padding-right:4px; width:24%;"><b>UTM Content:</b> </td><td>'. $form['utm_content'] .'</td></tr>';
	                    }
	                    if ($form['utm_campaign'] != '') {
	                        $body .= '<tr><td style="padding-right:4px; width:24%;"><b>UTM Campaign:</b> </td><td>'. $form['utm_campaign'] .'</td></tr>';
	                    }
	                    if ($form['utm_term'] != '') {
	                        $body .= '<tr><td style="padding-right:4px; width:24%;"><b>UTM Term:</b> </td><td>'. $form['utm_term'] .'</td></tr>';
	                    }

					$body .= '</table>';

					# Rodapé
					$body .= '<table width="630" cellspacing="0" cellpadding="0" align="center" style="font-family: Verdana, Arial, sans-serif; background-color: #fff;">';
						$body .= '<tr height="30"></tr>';
						$body .= '<tr>';
							$body .= '<td width="45"></td>';
							$body .= '<td width="640">';
								$body .= '<small><b style="color: #000;">Mensagem de e-mail confidencial.</b></small><br>';
							$body .= '</td>';
							$body .= '<td width="45"></td>';
						$body .= '</tr>';
						$body .= '<tr height="30"></tr>';
					$body .= '</table>';

				$body .= '</td>';
				$body .= '<td width="50"></td>';
			$body .= '</tr>';
		$body .= '</table>';
		$body .= '<table width="730" cellspacing="0" cellpadding="0" height="50"></table>';

	$body .= '</body></html>';

	if(wp_mail( $to, $subject, $body, $headers, null ))
	{
		$response['status'] = 'Sucesso';
		$response['mensagem'] = 'Mensagem enviada com sucesso.';
	}
	else 
	{
		$response['status'] = 'Erro';
		$response['mensagem'] = 'Erro interno, tente novamente mais tarde.';
	}
	return $response;
}