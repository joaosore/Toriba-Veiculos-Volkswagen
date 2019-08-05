<?php 

// Bloqueia o Titulo do Post
function block_post_title_recebedores( $pagehook ){
    global $post_type, $current_screen;
    if($post_type == 'recebedores')
    {
        wp_enqueue_script('block-title', '/wp-content/themes/' . get_template().'/admin/block_post_title.js', array('jquery'));
    }
}
add_action('admin_enqueue_scripts', 'block_post_title_recebedores');

//Subistitui o titulo de cada post pelo Tipo e Telefone inseridos
function recebedores_post_title_updater( $post_id ) {
    $my_post = array();
    $my_post['ID'] = $post_id;
    $data = get_field('email');
    if ( get_post_type() == 'recebedores' ) {
        $my_post['post_title'] = get_field('email');
    }
    wp_update_post( $my_post );
}
add_action('acf/save_post', 'recebedores_post_title_updater', 20);

//Cria o Post Formularios
function create_recebedores_post_types() {
    register_post_type( 'recebedores',
        array(
            'labels' => array(
                'name' => __( 'Recebedores' ),
                'singular_name' => __( 'Recebedores' )
            ),
            'public' => true,
            'hierarchical' => true,
            'show_ui' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'menu_icon' => 'dashicons-editor-table',
            'supports' => array( 'title'),
            'rewrite' => array( 'slug' => 'recebedores', 'with_front' => false ),
        )
    );
}
add_action( 'init', 'create_recebedores_post_types' );


function get_recebedores($idLoja, $idForm)
{
    $recebedores = false;
    $query = new WP_Query(array(
        'post_type' => 'recebedores',
        'post_status' => 'publish',
        'meta_query' => array(
            'relation' => 'AND',
            array( 
                'key' => 'loja', 
                'value' => $idLoja,
                'compare' => 'LIKE'
            ),
            array( 
                'key' => 'formularios', 
                'value' => $idForm,
                'compare' => 'LIKE'
            )
        )
    ));
    while ($query->have_posts()) {
        $query->the_post();
        $post_id = get_the_ID();
        $recebedores[] = get_field("email", $post_id);
    }
    return $recebedores;
}