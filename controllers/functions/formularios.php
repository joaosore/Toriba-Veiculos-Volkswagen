<?php 

//Cria o Post Formularios
function create_formularios_post_types() {
    register_post_type( 'formularios',
        array(
            'labels' => array(
                'name' => __( 'Formulários' ),
                'singular_name' => __( 'Formulários' )
            ),
            'public' => true,
            'hierarchical' => true,
            'show_ui' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'menu_icon' => 'dashicons-editor-table',
            'supports' => array( 'title'),
            'rewrite' => array( 'slug' => 'formularios', 'with_front' => false ),
        )
    );
}
add_action( 'init', 'create_formularios_post_types' );

function get_formulatio($nameForm)
{
    $dados = false;
    $query = new WP_Query(array(
        'post_type' => 'formularios',
        'post_status' => 'publish',
        's' => $nameForm
    ));
    while ($query->have_posts()) {
        $query->the_post();
        $dados = get_the_ID();
    }
    return $dados;
}

function get_formulatio_name($id)
{
    $dados = false;
    $query = new WP_Query(array(
        'post_type' => 'formularios',
        'post_status' => 'publish',
        'p' => $id
    ));
    while ($query->have_posts()) {
        $query->the_post();
        $dados = get_the_title();
    }
    return $dados;
}