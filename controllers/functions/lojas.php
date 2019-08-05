<?php

// Bloqueia o Titulo do Post
function block_post_title_telefones_lojas( $pagehook ){
    global $post_type, $current_screen;
    if($post_type == 'telefones_lojas')
    {
        wp_enqueue_script('block-title', '/wp-content/themes/' . get_template().'/admin/block_post_title.js', array('jquery'));
    }
}
add_action('admin_enqueue_scripts', 'block_post_title_telefones_lojas');

//Cria o Post Telegones Lojas
function create_lojas_post_types() {
    register_post_type( 'lojas',
        array(
            'labels' => array(
                'name' => __( 'Lojas' ),
                'singular_name' => __( 'Lojas' )
            ),
            'public' => true,
            'show_ui' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => true,
            'menu_icon' => 'dashicons-store',
            'show_in_rest' => true,
            'rest_base' => 'lojas',
            'rest_controller_class' => 'WP_REST_Posts_Controller',
            'supports' => array( 'title'),
            'rewrite' => array( 'slug' => 'lojas', 'with_front' => false ),
        )
    );
}
add_action( 'init', 'create_lojas_post_types' ); 


// Coleta todos os telefones de Lojas.
function get_lojas($el = null) {
    $lojas = array();
    $query = new WP_Query(array(
        'post_type' => 'lojas',
        'post_status' => 'publish',
        'posts_per_page' => -1
    ));
    while ($query->have_posts()) {
        $query->the_post();
        $post_id = get_the_ID();
        $term_list = wp_get_post_terms($post_id, 'loja', array("fields" => "all"));
        switch ($el) {
            case 'nome':
                $lojas[] = array(
                    'id' => $post_id,
                    'nome' => get_the_title($post_id)
                );
                break;
            case 'telefones':
                $lojas[] = array(
                    'id' => $post_id,
                    'nome' => get_the_title($post_id),
                    'telefones'  => get_field("telefones", $post_id),
                    'whatsapp'  => get_field("whatsapp", $post_id)
                );
                break;
            default:
                $lojas[] = array(
                    'id' => $post_id,
                    'nome' => get_the_title($post_id),
                    'telefones'  => get_field("telefones", $post_id),
                    'whatsapp'  => get_field("whatsapp", $post_id),
                    'horarios_de_funcionamento'  => get_field("horarios_de_funcionamento", $post_id),
                    'pos_venda'  => get_field("pos_venda", $post_id),
                    'endereco'  => get_field("endereco-maps", $post_id),
                    'endereco_visivel' => get_field("endereco_visivel", $post_id),
                    'icone_maps' => get_field("icone_maps", $post_id),
                );
                break;
        }
    }
    return $lojas;
}


function get_loja($id) {
    $loja = false;
    $query = new WP_Query(array(
        'post_type' => 'lojas',
        'post_status' => 'publish',
        'p' => $id,
    ));

    while ($query->have_posts()) {
        $query->the_post();
        $post_id = get_the_ID();
        $loja = get_the_title();
    }
    return $loja;
}

function compare_semana($semana)
{
    $result = '';

    $segunda_a_sexta = array("segunda", "terca", "quarta", "quinta", "sexta");
    $segunda_a_sabado = array("segunda", "terca", "quarta", "quinta", "sexta", "sabado");
    $segunda_a_domingo = array("segunda", "terca", "quarta", "quinta", "sexta", "sabado", "domingo");
    $domingo_e_feriado = array("domingo", "feriados");

    $segunda_a_sexta_result = array_diff($segunda_a_sexta, $semana);

    if (count($segunda_a_sexta_result) == 0)
    {
        $result = 'Segunda a Sexta: ';
    }
    else if(count($segunda_a_sabado) == 0)
    {
        $result = 'Segunda a Sábado: ';
    }
    else if(count($segunda_a_domingo) == 0)
    {
        $result = 'Segunda a Domingo: ';
    }
    else if(count($domingo_e_feriado) == 0)
    {
        $result = 'Domingos e Feriados: ';
    }
    else
    {
        $final = count($semana) - 1;
        foreach ($semana as $key => $value) {
            if($key != 0 && $final != $key)
            {
                $result .= ', ';
            }
            if($final == $key && $key != 0)
            {
                $result .= ' e ';
            }
            $result .= ucfirst($value);
            if($final == $key)
            {
                $result .= ': ';
            }
        }
    }
    return $result;
}

function get_horaios($id)
{
    $horaios = array();
    $query = new WP_Query(array(
        'post_type' => 'lojas',
        'post_status' => 'publish',
        'p' => $id
    ));
    while ($query->have_posts()) {
        $query->the_post();
        $post_id = get_the_ID();
        $term_list = wp_get_post_terms($post_id, 'loja', array("fields" => "all"));
        $lojas[] = array(
            'id' => $post_id,
            'horarios_de_funcionamento'  => get_field("horarios_de_funcionamento", $post_id)
        );
    }

    foreach ($lojas as $key => $value) {
        foreach ($value['horarios_de_funcionamento'] as $key => $dias) {
            $dias_semana = array();
            foreach ($dias['dias'] as $key => $value) {
                $dias_semana[] = $value['value'];
            }
            $horaios[] = array(
                'dias' => compare_semana($dias_semana),
                'horaios' => $dias['horario_de_abertura'] . ' às ' . $dias['horario_de_fechamento']
            );
        }
    }
    return $horaios;
}

function get_horarios_pos_venda($id)
{
    $horaios = array();
    $query = new WP_Query(array(
        'post_type' => 'lojas',
        'post_status' => 'publish',
        'p' => $id
    ));
    while ($query->have_posts()) {
        $query->the_post();
        $post_id = get_the_ID();
        $term_list = wp_get_post_terms($post_id, 'loja', array("fields" => "all"));
        $lojas[] = array(
            'id' => $post_id,
            'horarios_de_funcionamento'  => get_field("horarios_de_funcionamento", $post_id),
            'pos_venda'  => get_field("pos_venda", $post_id),
        );
    }
    foreach ($lojas as $key => $value) {
        foreach ($value['pos_venda'] as $key => $dias) {
            $dias_semana = array();
            foreach ($dias['dias'] as $key => $value) {
                $dias_semana[] = $value['value'];
            }
            $horaios[] = array(
                'dias' => compare_semana($dias_semana),
                'horaios' => $dias['horario_de_abertura'] . ' às ' . $dias['horario_de_fechamento']
            );
        }
    }
    return $horaios;
}