<?php 

//Cria o Post Destaques
function create_zero_km_post_types() {
    register_post_type( 'zero_km',
        array(
            'labels' => array(
                'name' => __( '0 KM' ),
                'singular_name' => __( '0 KM' )
            ),
            'public' => true,
            'hierarchical' => true,
            'show_ui' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'menu_icon' => 'dashicons-clipboard',
            'supports' => array( 'title'),
            'rewrite' => array( 'slug' => 'zero_km', 'with_front' => false ),
        )
    );
}
add_action( 'init', 'create_zero_km_post_types' );

function get_zero_km()
{
    $dados = [];
    $query = new WP_Query(array(
        'post_type' => 'zero_km',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order'   => 'ASC',
    ));
    while ($query->have_posts()) {
        $query->the_post();
        $post_id = get_the_ID();
        $dados[] = array(
            'id' => $post_id,
            'title'  => get_the_title(),
            'thumbnail'  => get_field("miniatura", $post_id),
            'valor' => get_field("valor", $post_id),
            'url' => get_permalink($post_id)
        );
    }
    return $dados;
}


function get_zero_km_interna($id)
{
    $post_id = $id;
    $dados = array(
        'title'  => get_the_title(),
        'banners'  => get_field("banners", $post_id),
        'titulo_da_pagina' => get_field("titulo_da_pagina", $post_id),
        'descricao_do_carro' => get_field("descricao_do_carro", $post_id),
        'sub_titulo_da_pagina' => get_field("sub_titulo_da_pagina", $post_id),
        'caracteristica' => get_field("caracteristica", $post_id),
        'versoes' => get_field("versoes", $post_id),
        'interesses' => get_field("carro", $post_id)
    );
    return $dados;
}

function get_modelo($id) {
    $modelo = false;
    $query = new WP_Query(array(
        'post_type' => 'zero_km',
        'post_status' => 'publish',
        'p' => $id,
    ));
    while ($query->have_posts()) {
        $query->the_post();
        $modelo = get_the_title();
    }
    return $modelo;
}

