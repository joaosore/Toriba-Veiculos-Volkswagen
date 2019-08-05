<?php

// //Cria o Post Destaques
// function create_carros_post_types() {
//     register_post_type( 'carros',
//         array(
//             'labels' => array(
//                 'name' => __( 'Carros' ),
//                 'singular_name' => __( 'Carros' )
//             ),
//             'public' => true,
//             'hierarchical' => true,
//             'show_ui' => true,
//             'publicly_queryable' => true,
//             'exclude_from_search' => false,
//             'menu_icon' => 'dashicons-clipboard',
//             'supports' => array( 'title'),
//             'rewrite' => array( 'slug' => 'atendimento_domingos', 'with_front' => false ),
//         )
//     );
// }
// add_action( 'init', 'create_carros_post_types' );

// // Coleta todos os Carros.
// function get_all_carros() {
//     $allCarros = array();
//     $query = new WP_Query(array(
//         'post_type' => 'carros',
//         'post_status' => 'publish',
//         'posts_per_page' => -1
//     ));
//     while ($query->have_posts()) {
//         $query->the_post();
//         $post_id = get_the_ID();

//         $allCarros[] = array(
//             'id' => $post_id,
//             'title'  => get_the_title(),
//             'modelo'  => get_field("modelo", $post_id),
//             'banner'  => get_field("banner", $post_id)
//         );
//     }
//     return $allCarros;
// }

// // Coleta um carro selecionado pelo ID.
// function get_carros($id) {
//     $carros = array();
//     $interese = array();

//     $query = new WP_Query(array(
//         'p'         => $id,
//         'post_type' => 'carros',
//         'post_status' => 'publish',
//         'posts_per_page' => -1
//     ));

//     while ($query->have_posts()) {
//         $query->the_post();
//         $post_id = get_the_ID();

//         foreach (get_field("interese", $post_id) as $key => $value) {
//             $interese[$key] = array(
//                 'titulo' => get_the_title($value),
//                 'imagem' => get_field("carro", $value),
//                 'modelo' => get_field("modelo", $value)
//             );
//         }

//         $carros[] = array(
//             'title'  => get_the_title(),
//             'modelo'  => get_field("modelo", $post_id),
//             'banner'  => get_field("banner", $post_id),
//             'carro'  => get_field("carro", $post_id),
//             'valor_a_partir'  => get_field("valor_a_partir", $post_id),
//             'descricao'  => get_field("descricao", $post_id),
//             'detalhes'  => get_field("detalhes", $post_id),
//             'versoes'  => get_field("versoes", $post_id),
//             'interese'  => $interese,
//         );
//     }
//     return $carros;
// }