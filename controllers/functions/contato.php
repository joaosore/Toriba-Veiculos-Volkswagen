<?php 

// Bloqueia Criação e Edição
function block_post_new_edit_contatos( $pagehook ){
    global $post_type, $current_screen;
    if($post_type == 'contatos')
    {
        wp_enqueue_script('block-title', '/wp-content/themes/' . get_template().'/admin/disable_all_components.js', array('jquery'));
    }
}
add_action('admin_enqueue_scripts', 'block_post_new_edit_contatos');

//Cria o Post Contatos
function create_contatos_post_types() {
    register_post_type( 'contatos',
        array(
            'labels' => array(
                'name' => __( 'Contatos' ),
                'singular_name' => __( 'Contatos' )
            ),
            'public' => true,
            'hierarchical' => true,
            'show_ui' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'menu_icon' => 'dashicons-email-alt',
            'supports' => array( 'title'),
            'rewrite' => array( 'slug' => 'instaladores', 'with_front' => false ),
            'capabilities' => array(
                'create_posts' => false, // false < WP 4.5, credit @Ewout
            ),
            'map_meta_cap' => true,
        )
    );
}
add_action( 'init', 'create_contatos_post_types' );

function add_contato($form)
{
	$some_post = array(
	    'post_title' => $form['nome'] . ' - ' . $form['assunto'],
	    'post_type' => 'contatos',
	    'post_status' => 'publish'
	);
	$the_post_id = wp_insert_post($some_post);

    update_field('formulario', get_formulatio_name($form['idFormulario']), $the_post_id);
    update_field('interesse', $form['interesse'], $the_post_id);


	update_field('nome', $form['nome'], $the_post_id);
	update_field('telefone', $form['telefone'], $the_post_id);
	update_field('email', $form['email'], $the_post_id);
	update_field('assunto', $form['assunto'], $the_post_id);
	update_field('mensagem', $form['mensagem'], $the_post_id);
	update_field('utm_source', $form['utm_source'], $the_post_id);
	update_field('utm_medium', $form['utm_medium'], $the_post_id);
	update_field('utm_content', $form['utm_content'], $the_post_id);
	update_field('utm_campaign', $form['utm_campaign'], $the_post_id);
	update_field('utm_term', $form['utm_term'], $the_post_id);
}

//Cria Post Best Drive
function create_contatos_best_drive_post_types() {
    register_post_type( 'contatos_best_drive',
        array(
            'labels' => array(
                'name' => __( 'Best Drive' ),
                'singular_name' => __( 'Best Drive' )
            ),
            'public' => false,
            'hierarchical' => false,
            'show_ui' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'menu_icon' => 'dashicons-email-alt',
            'supports' => array( 'title'),
            'rewrite' => array( 'slug' => 'instaladores', 'with_front' => true )
        )
    );
}
add_action( 'init', 'create_contatos_best_drive_post_types' );

function my_admin_menu_contatos_best_drive() { 
    add_submenu_page('edit.php?post_type=contatos', 'Best Drive', 'Best Drive', 'manage_options', 'edit.php?post_type=contatos_best_drive'); 
}  
add_action('admin_menu', 'my_admin_menu_contatos_best_drive'); 

function remove_menus() {
    remove_menu_page( 'edit.php?post_type=contatos_best_drive' );
}
add_action( 'admin_menu', 'remove_menus' );


function add_contato_best_drive($form)
{
    $some_post = array(
        'post_title' => $form['nome'] . ' - ' . get_modelo($form['modelo']) . ' - ' . $form['data_agendada'],
        'post_type' => 'contatos_best_drive',
        'post_status' => 'publish'
    );
    $the_post_id = wp_insert_post($some_post);

    update_field('nome', $form['nome'], $the_post_id);
    update_field('email', $form['email'], $the_post_id);
    update_field('telefone', $form['telefone'], $the_post_id);
    update_field('loja', get_loja($form['loja']), $the_post_id);
    update_field('modelo_escolhido', get_modelo($form['modelo']), $the_post_id);
    update_field('data_agendada', $form['data_agendada'], $the_post_id);

    update_field('utm_source', $form['utm_source'], $the_post_id);
    update_field('utm_medium', $form['utm_medium'], $the_post_id);
    update_field('utm_content', $form['utm_content'], $the_post_id);
    update_field('utm_campaign', $form['utm_campaign'], $the_post_id);
    update_field('utm_term', $form['utm_term'], $the_post_id);
}

//Cria Post Consorcio
function create_contato_consorcio_post_types() {
    register_post_type( 'contatos_consorcio',
        array(
            'labels' => array(
                'name' => __( 'Consórcio' ),
                'singular_name' => __( 'Consórcio' )
            ),
            'public' => false,
            'hierarchical' => false,
            'show_ui' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'menu_icon' => 'dashicons-email-alt',
            'supports' => array( 'title'),
            'rewrite' => array( 'slug' => 'instaladores', 'with_front' => true )
        )
    );
}
add_action( 'init', 'create_contato_consorcio_post_types' );

function my_admin_menu_contatos_consorcio() { 
    add_submenu_page('edit.php?post_type=contatos', 'Consórcio', 'Consórcio', 'manage_options', 'edit.php?post_type=contatos_consorcio'); 
}
add_action('admin_menu', 'my_admin_menu_contatos_consorcio'); 

function remove_menus_contatos_consorcio() {
    remove_menu_page( 'edit.php?post_type=contatos_consorcio' );
}
add_action( 'admin_menu', 'remove_menus_contatos_consorcio' );


function add_contato_consorcio($form)
{
    $some_post = array(
        'post_title' => $form['nome'],
        'post_type' => 'contatos_consorcio',
        'post_status' => 'publish'
    );
    $the_post_id = wp_insert_post($some_post);

    update_field('nome', $form['nome'], $the_post_id);
    update_field('email', $form['email'], $the_post_id);
    update_field('telefone', $form['telefone'], $the_post_id);
    update_field('loja', get_loja($form['loja']), $the_post_id);
    update_field('valor_parcelas', $form['parcelas'], $the_post_id);
    update_field('mensagem', $form['mensagem'], $the_post_id);

    update_field('utm_source', $form['utm_source'], $the_post_id);
    update_field('utm_medium', $form['utm_medium'], $the_post_id);
    update_field('utm_content', $form['utm_content'], $the_post_id);
    update_field('utm_campaign', $form['utm_campaign'], $the_post_id);
    update_field('utm_term', $form['utm_term'], $the_post_id);
}


//Cria Post Venda seu carro
function create_contato_venda_seu_carro_post_types() {
    register_post_type( 'contatos_venda_carro',
        array(
            'labels' => array(
                'name' => __( 'Venda seu carro' ),
                'singular_name' => __( 'Venda seu carro' )
            ),
            'public' => false,
            'hierarchical' => false,
            'show_ui' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'menu_icon' => 'dashicons-email-alt',
            'supports' => array( 'title'),
            'rewrite' => array( 'slug' => 'instaladores', 'with_front' => true )
        )
    );
}
add_action( 'init', 'create_contato_venda_seu_carro_post_types' );

function my_admin_menu_contatos_venda_seu_carro() { 
    add_submenu_page('edit.php?post_type=contatos', 'Venda seu carro', 'Venda seu carro', 'manage_options', 'edit.php?post_type=contatos_venda_carro'); 
}
add_action('admin_menu', 'my_admin_menu_contatos_venda_seu_carro'); 

function remove_menus_contatos_venda_seu_carro() {
    remove_menu_page( 'edit.php?post_type=contatos_venda_carro' );
}
add_action( 'admin_menu', 'remove_menus_contatos_venda_seu_carro' );


function add_contato_venda_seu_carro($form)
{
    $some_post = array(
        'post_title' => $form['nome'],
        'post_type' => 'contatos_venda_carro',
        'post_status' => 'publish'
    );
    $the_post_id = wp_insert_post($some_post);

    update_field('nome', $form['nome'], $the_post_id);
    update_field('email', $form['email'], $the_post_id);
    update_field('telefone', $form['telefone'], $the_post_id);
    update_field('loja', get_loja($form['loja']), $the_post_id);
    update_field('marca_modelo', $form['marca_modelo'], $the_post_id);
    update_field('quilometragem', $form['quilometragem'], $the_post_id);
    update_field('ano', $form['ano'], $the_post_id);
    update_field('portas', $form['portas'], $the_post_id);
    update_field('cambio', $form['cambio'], $the_post_id);

    update_field('utm_source', $form['utm_source'], $the_post_id);
    update_field('utm_medium', $form['utm_medium'], $the_post_id);
    update_field('utm_content', $form['utm_content'], $the_post_id);
    update_field('utm_campaign', $form['utm_campaign'], $the_post_id);
    update_field('utm_term', $form['utm_term'], $the_post_id);
}


//Cria Post Agende seu serviço
function create_contatos_agende_post_types() {
    register_post_type( 'contatos_servicos',
        array(
            'labels' => array(
                'name' => __( 'Agende seu Serviço' ),
                'singular_name' => __( 'Agende seu Serviço' )
            ),
            'public' => false,
            'hierarchical' => false,
            'show_ui' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'menu_icon' => 'dashicons-email-alt',
            'supports' => array( 'title'),
            'rewrite' => array( 'slug' => 'instaladores', 'with_front' => true )
        )
    );
}
add_action( 'init', 'create_contatos_agende_post_types' );

function my_admin_menu_contato_agende_seu_servico() { 
    add_submenu_page('edit.php?post_type=contatos', 'Agende seu serviço', 'Agende seu serviço', 'manage_options', 'edit.php?post_type=contatos_servicos'); 
}
add_action('admin_menu', 'my_admin_menu_contato_agende_seu_servico'); 

function remove_menus_contato_agende_seu_servico() {
    remove_menu_page( 'edit.php?post_type=contatos_servicos' );
}
add_action( 'admin_menu', 'remove_menus_contato_agende_seu_servico' );


function add_contato_agende_seu_servico($form)
{
    $some_post = array(
        'post_title' => $form['nome'],
        'post_type' => 'contatos_servicos',
        'post_status' => 'publish'
    );
    $the_post_id = wp_insert_post($some_post);

    update_field('nome', $form['nome'], $the_post_id);
    update_field('email', $form['email'], $the_post_id);
    update_field('telefone', $form['telefone'], $the_post_id);
    update_field('loja', get_loja($form['loja']), $the_post_id);
    update_field('marca_modelo', $form['marca_modelo'], $the_post_id);
    update_field('placa', $form['placa'], $the_post_id);
    update_field('mensagem', $form['mensagem'], $the_post_id);
    update_field('data_agendada', $form['data_agendada'], $the_post_id);

    update_field('utm_source', $form['utm_source'], $the_post_id);
    update_field('utm_medium', $form['utm_medium'], $the_post_id);
    update_field('utm_content', $form['utm_content'], $the_post_id);
    update_field('utm_campaign', $form['utm_campaign'], $the_post_id);
    update_field('utm_term', $form['utm_term'], $the_post_id);
}

//Cria Post Acessorios e Peças
function create_contatos_acessorios_e_pecas_post_types() {
    register_post_type( 'contatos_acessorios',
        array(
            'labels' => array(
                'name' => __( 'Acessorios e Peças' ),
                'singular_name' => __( 'Acessorios e Peças' )
            ),
            'public' => false,
            'hierarchical' => false,
            'show_ui' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'menu_icon' => 'dashicons-email-alt',
            'supports' => array( 'title'),
            'rewrite' => array( 'slug' => 'instaladores', 'with_front' => true )
        )
    );
}
add_action( 'init', 'create_contatos_acessorios_e_pecas_post_types' );

function my_admin_menu_contato_acessorios_e_pecas() { 
    add_submenu_page('edit.php?post_type=contatos', 'Acessorios e Peças', 'Acessorios e Peças', 'manage_options', 'edit.php?post_type=contatos_acessorios'); 
}
add_action('admin_menu', 'my_admin_menu_contato_acessorios_e_pecas'); 

function remove_menus_contato_acessorios_e_pecas() {
    remove_menu_page( 'edit.php?post_type=contatos_acessorios' );
}
add_action( 'admin_menu', 'remove_menus_contato_acessorios_e_pecas' );


function add_contato_acessorios_e_pecas($form)
{
    $some_post = array(
        'post_title' => $form['nome'],
        'post_type' => 'contatos_acessorios',
        'post_status' => 'publish'
    );
    $the_post_id = wp_insert_post($some_post);

    update_field('nome', $form['nome'], $the_post_id);
    update_field('email', $form['email'], $the_post_id);
    update_field('telefone', $form['telefone'], $the_post_id);
    update_field('loja', get_loja($form['loja']), $the_post_id);
    update_field('mensagem', $form['mensagem'], $the_post_id);

    update_field('utm_source', $form['utm_source'], $the_post_id);
    update_field('utm_medium', $form['utm_medium'], $the_post_id);
    update_field('utm_content', $form['utm_content'], $the_post_id);
    update_field('utm_campaign', $form['utm_campaign'], $the_post_id);
    update_field('utm_term', $form['utm_term'], $the_post_id);
}

//Cria Post Trabalhe conosco
function create_contatos_trabalhe_conosco_post_types() {
    register_post_type( 'contatos_trabalhe',
        array(
            'labels' => array(
                'name' => __( 'Trabalhe conosco' ),
                'singular_name' => __( 'Trabalhe conosco' )
            ),
            'public' => false,
            'hierarchical' => false,
            'show_ui' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'menu_icon' => 'dashicons-email-alt',
            'supports' => array( 'title'),
            'rewrite' => array( 'slug' => 'instaladores', 'with_front' => true )
        )
    );
}
add_action( 'init', 'create_contatos_trabalhe_conosco_post_types' );


function my_admin_menu_contatos_trabalhe_conosco() { 
    add_submenu_page('edit.php?post_type=contatos', 'Trabalhe conosco', 'Trabalhe conosco', 'manage_options', 'edit.php?post_type=contatos_trabalhe'); 
}
add_action('admin_menu', 'my_admin_menu_contatos_trabalhe_conosco'); 

function remove_menus_contatos_trabalhe_conosco() {
    remove_menu_page( 'edit.php?post_type=contatos_trabalhe' );
}
add_action( 'admin_menu', 'remove_menus_contatos_trabalhe_conosco' );


function add_contatos_trabalhe_conosco($form)
{
    $some_post = array(
        'post_title' => $form['nome'],
        'post_type' => 'contatos_trabalhe',
        'post_status' => 'publish'
    );
    $the_post_id = wp_insert_post($some_post);

    update_field('nome', $form['nome'], $the_post_id);
    update_field('email', $form['email'], $the_post_id);
    update_field('telefone', $form['telefone'], $the_post_id);
    update_field('loja', get_loja($form['loja']), $the_post_id);
    update_field('mensagem', $form['mensagem'], $the_post_id);
    $curriculo = array(
        'url' => $form['curriculo'],
        'title' => 'Curriculo',
        'target' => ''
    );
    update_field('curriculo', $curriculo, $the_post_id);
    
    update_field('utm_source', $form['utm_source'], $the_post_id);
    update_field('utm_medium', $form['utm_medium'], $the_post_id);
    update_field('utm_content', $form['utm_content'], $the_post_id);
    update_field('utm_campaign', $form['utm_campaign'], $the_post_id);
    update_field('utm_term', $form['utm_term'], $the_post_id);
}

