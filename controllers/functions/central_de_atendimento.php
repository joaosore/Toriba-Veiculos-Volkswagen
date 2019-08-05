<?php 

// Bloqueia o Titulo do Post
function block_post_title_central_atendimento( $pagehook ){
    global $post_type, $current_screen;
    if($post_type == 'central_atendimento')
    {
        wp_enqueue_script('block-title', '/wp-content/themes/' . get_template().'/admin/block_post_title.js', array('jquery'));
    }
}
add_action('admin_enqueue_scripts', 'block_post_title_central_atendimento');

//Subistitui o titulo de cada post pelo Tipo e Telefone inseridos
function central_atendimento_post_title_updater( $post_id ) {
    $my_post = array();
    $my_post['ID'] = $post_id;
    if ( get_post_type() == 'central_atendimento' ) {
        $my_post['post_title'] = get_field('tipo') . ' - ' . get_field('telefone');
    }
    wp_update_post( $my_post );
}
add_action('acf/save_post', 'central_atendimento_post_title_updater', 20);

//Cria o Post Central de Atendimento
function create_central_atendimento_post_types() {
    register_post_type( 'central_atendimento',
        array(
            'labels' => array(
                'name' => __( 'Central de Antendimento' ),
                'singular_name' => __( 'Central de Antendimento' )
            ),
            'public' => true,
            'show_ui' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'menu_icon' => 'dashicons-phone',
            'supports' => array( 'title'),
            'rewrite' => array( 'slug' => 'central_atendimento', 'with_front' => false ),
        )
    );
}
add_action( 'init', 'create_central_atendimento_post_types' );

// Coleta todos os Telefones da Central de Atendimento.
function get_central_de_atendimento() {
	$central_atendimento = array();
	$query = new WP_Query(array(
		'post_type' => 'central_atendimento',
		'post_status' => 'publish',
		'posts_per_page' => -1
	));

	while ($query->have_posts()) {
		$query->the_post();
		$post_id = get_the_ID();
		$central_atendimento[] = array(
			'tipo' => get_field("tipo", $post_id),
			'telefone' => get_field( "telefone", $post_id)
		);
	}
	return $central_atendimento;
}