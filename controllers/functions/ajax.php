<?php
add_action( 'wp_ajax_file_upload', 'file_upload_callback' );
add_action( 'wp_ajax_nopriv_file_upload', 'file_upload_callback' );
function file_upload_callback() {

	$SIZE = 5242880; // 5 MB
	$response = array();
	if($_FILES["file"]["size"] <= $SIZE)
	{
		$upload = wp_upload_bits($_FILES["file"]["name"], null, file_get_contents($_FILES["file"]["tmp_name"]));
		$response['status'] = 'Success';
		$response['class'] = 'valid';
		$response['mensagem'] = $_FILES["file"]["name"];
		$response['upload'] = $upload;
		$response['file'] = $_FILES;
	}
	else
	{
		$response['status'] = 'Erro';
		$response['calss'] = 'error';
		$response['mensagem'] = 'Arquivo muito grande Tamanho maximo 5 MB';
	}
	exit( json_encode( $response ) );
}



add_action( 'wp_ajax_post_contato', 'filter_post_contato' );
add_action( 'wp_ajax_nopriv_post_contato', 'filter_post_contato' );
function filter_post_contato() {

	$response = array();
	if ($_POST)
	{
		$form = $_POST;
		if(checkReCaptcha($form))
		{
			add_contato($form['fitlers']);
			$response = send_mail_wp($form['fitlers']);
		}
		else
		{
			$response['status'] = 'Erro';
			$response['mensagem'] = 'Algo deu errado. Atualize a página e tente novamente.';
		}	
	}
    exit( json_encode( $response ) );
}


add_action( 'wp_ajax_post_contato_best_drive', 'filter_post_contato_best_drive' );
add_action( 'wp_ajax_nopriv_post_contato_best_drive', 'filter_post_contato_best_drive' );
function filter_post_contato_best_drive() {

	$response = array();
	if ($_POST)
	{
		$form = $_POST;
		if(checkReCaptcha($form))
		{
			add_contato_best_drive($form['fitlers']);
			$response = send_mail_wp($form['fitlers']);
		}
		else
		{
			$response['status'] = 'Erro';
			$response['mensagem'] = 'Algo deu errado. Atualize a página e tente novamente.';
		}	
	}
    exit( json_encode( $response ) );
}

add_action( 'wp_ajax_post_contato_consorcio', 'filter_post_contato_consorcio' );
add_action( 'wp_ajax_nopriv_post_contato_consorcio', 'filter_post_contato_consorcio' );
function filter_post_contato_consorcio() {

	$response = array();
	if ($_POST)
	{
		$form = $_POST;
		if(checkReCaptcha($form))
		{
			add_contato_consorcio($form['fitlers']);
			$response = send_mail_wp($form['fitlers']);
		}
		else
		{
			$response['status'] = 'Erro';
			$response['mensagem'] = 'Algo deu errado. Atualize a página e tente novamente.';
		}	
	}
    exit( json_encode( $response ) );
}

add_action( 'wp_ajax_post_contatos_venda_seu_carro', 'filter_post_contatos_venda_seu_carro' );
add_action( 'wp_ajax_nopriv_post_contatos_venda_seu_carro', 'filter_post_contatos_venda_seu_carro' );
function filter_post_contatos_venda_seu_carro() {

	$response = array();
	if ($_POST)
	{
		$form = $_POST;
		if(checkReCaptcha($form))
		{
			add_contato_venda_seu_carro($form['fitlers']);
			$response = send_mail_wp($form['fitlers']);
		}
		else
		{
			$response['status'] = 'Erro';
			$response['mensagem'] = 'Algo deu errado. Atualize a página e tente novamente.';
		}	
	}
    exit( json_encode( $response ) );
}

add_action( 'wp_ajax_post_contatos_agende_seu_servico', 'filter_post_contatos_agende_seu_servico' );
add_action( 'wp_ajax_nopriv_post_contatos_agende_seu_servico', 'filter_post_contatos_agende_seu_servico' );
function filter_post_contatos_agende_seu_servico() {

	$response = array();
	if ($_POST)
	{
		$form = $_POST;
		if(checkReCaptcha($form))
		{
			add_contato_agende_seu_servico($form['fitlers']);
			$response = send_mail_wp($form['fitlers']);
		}
		else
		{
			$response['status'] = 'Erro';
			$response['mensagem'] = 'Algo deu errado. Atualize a página e tente novamente.';
		}	
	}
    exit( json_encode( $response ) );
}

add_action( 'wp_ajax_post_contatos_acessorios_e_pecas', 'filter_post_contatos_acessorios_e_pecas' );
add_action( 'wp_ajax_nopriv_post_contatos_acessorios_e_pecas', 'filter_post_contatos_acessorios_e_pecas' );
function filter_post_contatos_acessorios_e_pecas() {

	$response = array();
	if ($_POST)
	{
		$form = $_POST;
		if(checkReCaptcha($form))
		{
			add_contato_acessorios_e_pecas($form['fitlers']);
			$response = send_mail_wp($form['fitlers']);
		}
		else
		{
			$response['status'] = 'Erro';
			$response['mensagem'] = 'Algo deu errado. Atualize a página e tente novamente.';
		}	
	}
    exit( json_encode( $response ) );
}


add_action( 'wp_ajax_post_contatos_trabalhe_conosco', 'filter_post_contatos_trabalhe_conosco' );
add_action( 'wp_ajax_nopriv_post_contatos_trabalhe_conosco', 'filter_post_contatos_trabalhe_conosco' );
function filter_post_contatos_trabalhe_conosco() {

	$response = array();
	if ($_POST)
	{
		$form = $_POST;
		if(checkReCaptcha($form))
		{
			add_contatos_trabalhe_conosco($form['fitlers']);
			$response = send_mail_wp($form['fitlers']);
		}
		else
		{
			$response['status'] = 'Erro';
			$response['mensagem'] = 'Algo deu errado. Atualize a página e tente novamente.';
		}	
	}
    exit( json_encode( $response ) );
}
