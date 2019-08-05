<?php 

//Cria o Post Destaques
function create_destaques_post_types() {
    register_post_type( 'destaques',
        array(
            'labels' => array(
                'name' => __( 'Destaques' ),
                'singular_name' => __( 'Destaques' )
            ),
            'public' => true,
            'hierarchical' => true,
            'show_ui' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'menu_icon' => 'dashicons-star-filled',
            'supports' => array( 'title'),
            'rewrite' => array( 'slug' => 'atendimento_domingos', 'with_front' => false ),
        )
    );
}
add_action( 'init', 'create_destaques_post_types' );

// Coleta todos os Destaques.
function get_destaques() {
	$destaques = array();
	$query = new WP_Query(array(
		'post_type' => 'destaques',
		'post_status' => 'publish',
		'posts_per_page' => -1
	));
	while ($query->have_posts()) {
		$query->the_post();
		$post_id = get_the_ID();

		$destaques[] = array(
			'title'  => get_the_title(),
			'link'  => get_field("link", $post_id),
			'imagem-d'  => get_field("imagens_desktop", $post_id),
			'imagem-m'  => get_field("image_mobile", $post_id),
		);
	}
	return $destaques;
}