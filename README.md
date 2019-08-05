Iniciando o Projeto

	npm install
	npm run watch

Compilando para produtoção

	npm run prod

Estruturas de Pasta

JS

	Thema/src/js/modulos/PASTA_DO_MODULO/MODULOS.js

	Criado o Modulo incluir no index.js

	import "./modulos/PASTA_DO_MODULO/MODULOS.js";

SCSS

	Thema/src/scss/stylesheets/templates/pages/PASTA_DA_PAGINA/PASTA_DAS_SECÇÕES/_LG.scss, _MD.scss, _SM.scss, _XL.scss, _XS.scss.
	Copiar os arquivos em Thema/src/scss/model.

	Copiado os arquivos incluir no Thema/src/scss/stylesheets/templates/_page.scss.

	//PASTA_DA_PAGINA
	@import "pages/PASTA_DA_PAGINA/PASTA_DAS_SECÇÕES/XL";
	@import "pages/PASTA_DA_PAGINA/PASTA_DAS_SECÇÕES/LG";
	@import "pages/PASTA_DA_PAGINA/PASTA_DAS_SECÇÕES/MD";
	@import "pages/PASTA_DA_PAGINA/PASTA_DAS_SECÇÕES/SM";
	@import "pages/PASTA_DA_PAGINA/PASTA_DAS_SECÇÕES/XS";

Paginas Views

	Criando uma Pagina em Thema/NOME_DA_PAGINA.php

	<?php
	/**
	 * 
	 * Template Name: Home
	 *
	 * @package jd
	 *
	 */

	get_header(); 


	get_footer();

Paginas Include

	Criando uma Pagina em Thema/pages-inc/PASTA_DA_PAGINA/SECÇÕES.php

	Criando a função da pagina em Thema/pages-inc/include.php

	function get_section_NOME_DA_SECÇÃO()
	{
		include_once get_template_directory() . '/pages-inc/PASTA_DA_PAGINA/SECÇÕES.php';
	}

Controllers

	Criando um Pagina de Funções em Thema/controllers/functions/NOME_DA_FUNÇÃO.php

	Adicionando a função no Escopo do Projeto Thema/controllers/include.php

	include "functions/NOME_DA_FUNÇÃOv.php"; 