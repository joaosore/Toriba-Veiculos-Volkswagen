<?php 

// Bloqueia Criação e Edição
function block_post_new_edit_seminovos( $pagehook ){
    global $post_type, $current_screen;
    if($post_type == 'seminovos')
    {
        wp_enqueue_script('block-title', '/wp-content/themes/' . get_template().'/admin/disable_all_components.js', array('jquery'));
    }
}
// add_action('admin_enqueue_scripts', 'block_post_new_edit_seminovos');

//Cria o Post Seminovos
function create_seminovos_post_types() {
    register_post_type( 'seminovos',
        array(
            'labels' => array(
                'name' => __( 'Seminovos' ),
                'singular_name' => __( 'Seminovos' )
            ),
            'public' => true,
            'show_ui' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => true,
            'menu_icon' => 'dashicons-feedback',
            'show_in_rest' => true,
            'rest_base' => 'seminovos',
            'rest_controller_class' => 'WP_REST_Posts_Controller',
            'supports' => array( 'title'),
            'rewrite' => array('slug' => 'seminovos', 'with_front' => false),
        )
    );
}
add_action( 'init', 'create_seminovos_post_types' );

function insert_elementos_seminovos($arr, $xml) {

    $i = 1;
    foreach ($arr as $key => $value) {

        $opcionais_value = array();
        $acessorio_value = array();
        $foto_value = array();

        $modelo = $value->modelo;

        $titulo = $value->marca . ' - ' . $modelo . ' - ' . $value->versao;
        $some_post = array(
            'post_title' => $titulo,
            'post_type' => 'seminovos',
            'post_status' => 'publish'
        );
        $the_post_id = wp_insert_post($some_post);

        $preco = str_replace('R$ ', '', $value->preco);
        $preco = str_replace(',00', '', $preco);
        $preco = str_replace(',', '', $preco);
        $preco = str_replace('.', '', $preco);

        $modelo = str_replace(' ', '', $modelo);

        $observacao = '';
        if(!is_object($value->observacao))
        {
             $observacao = $value->observacao;
        }
    
        update_field('id', $value->id, $the_post_id);
        update_field('marca', $value->marca, $the_post_id);
        update_field('modelo_car', $modelo, $the_post_id);
        update_field('versao', $value->versao, $the_post_id);
        update_field('ano_fabricacao', $value->anofabricacao, $the_post_id);
        update_field('ano_modelo', $value->anomodelo, $the_post_id);
        update_field('cambio', $value->cambio, $the_post_id);
        update_field('km', $value->km, $the_post_id);
        update_field('portas', $value->portas, $the_post_id);
        update_field('cor', $value->cor, $the_post_id);
        update_field('combustivel', $value->combustivel, $the_post_id);
        update_field('preco', $preco, $the_post_id);
        update_field('cadastro', $value->cadastro, $the_post_id);
        update_field('alteracao', $value->alteracao, $the_post_id);
        update_field('observacoes', $observacao, $the_post_id);

        if(isset($value->opcionais->opcional))
        {
            if(is_array($value->opcionais->opcional))
            {
                foreach ($value->opcionais->opcional as $key => $opcional) {
                    $opcional = str_replace(' ', '', $opcional);
                    $opcionais_value[] = array(
                        "field_5bcf6a02fcd6f"   => $opcional
                    );
                }
            }
            else
            {
                $opcional = str_replace(' ', '', $value->opcionais->opcional);
                $opcionais_value[] = array(
                    "field_5bcf6a02fcd6f"   => $opcional
                );
            }
            $opcionais_key = "field_5bcf69f8fcd6e";
            update_field($opcionais_key, $opcionais_value, $the_post_id);
        }   
        if(isset($value->acessorios->acessorio))
        {
            if(is_array($value->acessorios->acessorio))
            {
                foreach ($value->acessorios->acessorio as $key => $acessorio) {
                    $acessorio_value[] = array(
                        "field_5bcf6a32fcd71"   => $acessorio
                    );
                }
            }
            else
            {
                $acessorio_value[] = array(
                    "field_5bcf6a32fcd71"   => $value->acessorios->acessorio
                );
            }
            $acessorio_key = "field_5bcf6a1dfcd70";
            update_field($acessorio_key, $acessorio_value, $the_post_id);
        }
        if(isset($value->fotos->foto))
        {
            if(is_array($value->fotos->foto))
            {
                foreach ($value->fotos->foto as $key => $foto) {
                    $foto_value[] = array(
                        "field_5bcf6a5bfcd73"   => $foto
                    );
                }
            }
            else
            {
                $foto_value[] = array(
                    "field_5bcf6a5bfcd73"   => $value->fotos->foto
                );
            }
            $foto_key = "field_5bcf6a49fcd72";
            update_field($foto_key, $foto_value, $the_post_id);
        }
        update_seminovos($xml, $i);
        $i = $i + 1;
    }
}

function get_seminovos_four_itens()
{
    $seminovos = array();
    $query = new WP_Query(array(
        'post_type' => 'seminovos',
        'post_status' => 'publish',
        'posts_per_page' => 4,
        'orderby'        => 'rand',
    ));
    while ($query->have_posts()) {
        $query->the_post();
        $post_id = get_the_ID();
        $seminovos[] = array(
            'id' => $post_id,
            'link'  => get_permalink($post_id),
            'modelo'  => get_field("modelo_car", $post_id),
            'versao'  => get_field("versao", $post_id),
            'banner'  => get_field("imagens", $post_id)[0]['imagem'],
            'preco' => get_field("preco", $post_id)
        );
    }
    return $seminovos;
}

function get_marcas()
{
    $seminovos = array();
    $query = new WP_Query(array(
        'post_type' => 'seminovos',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby'        => 'asc',
    ));
    while ($query->have_posts()) {
        $query->the_post();
        $post_id = get_the_ID();
        $marca[] = get_field("marca", $post_id);
    }
    $arr = array_unique($marca);
    asort($arr);
    return $arr;
}

function get_modelos()
{
    $seminovos = array();
    $query = new WP_Query(array(
        'post_type' => 'seminovos',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby'        => 'asc',
    ));
    while ($query->have_posts()) {
        $query->the_post();
        $post_id = get_the_ID();
        $modelo[] = get_field("modelo_car", $post_id);
    }
    $arr = array_unique($modelo);
    asort($arr);
    return $arr;
}

function get_filter($paramet)
{


    $args = array('relation' => 'AND');

    if(isset($paramet['cor']))
    {
        $cor = $paramet['cor'];
        if (!empty($cor)) {
            $cor = explode(',', $cor);
            sort($cor);
            $args[] = array(
                'key'     => 'cor',
                'value'   => $cor,
                'compare' => 'IN',
            );
        }
    }

    if(isset($paramet['preco']))
    {
        $preco = $paramet['preco'];
        if (!empty($preco)) {
            $preco = explode(',', $preco);
            sort($preco);
            $args[] = array(
                'key'     => 'preco',
                'value'   => array(intval($preco[0]), intval($preco[1])),
                'compare' => 'BETWEEN',
                'type'    => 'numeric'
            );
        }
    }

    if(isset($paramet['marca']))
    {
        $marca = $paramet['marca'];
        if (!empty($marca)) {
            $args[] = array(
                'key'     => 'marca',
                'value'   => $marca,
                'compare' => '=',
            );
        }
    }

    if(isset($paramet['porta']))
    {
        $portas = $paramet['porta'];
        if (!empty($portas)) {
            $args[] = array(
                'key'     => 'portas',
                'value'   => intval($portas),
                'compare' => '=',
                'type'    => 'numeric'
            );
        }
    }

    if(isset($paramet['modelo']))
    {
        $modelo = $paramet['modelo'];
        if (!empty($modelo)) {
            $args[] = array(
                'key'     => 'modelo_car',
                'value'   => $modelo,
                'compare' => '=',
            );
        }
    }

    if(isset($paramet['ano']))
    {
        $ano = $paramet['ano'];
        if (!empty($ano)) {
            $ano = explode(',', $ano);
            sort($ano);
            $args['meta_query'][] = array(
                'key'     => 'ano_fabricacao',
                'value'   => array(intval($ano[0]), intval($ano[1])),
                'compare' => 'BETWEEN',
                'type'    => 'numeric'
            );
        }
    }
    
    if(isset($paramet['km']))
    {
        $km = $paramet['km'];
        if (!empty($km)) {
            $km = explode(',', $km);
            sort($km);
            $args[] = array(
                'key'     => 'km',
                'value'   => array(intval($km[0]), intval($km[1])),
                'compare' => 'BETWEEN',
                'type'    => 'numeric'
            );
        }
    }

    if(isset($paramet['opcionais']))
    {
        $opcionais = $paramet['opcionais'];
        if (!empty($opcionais)) {
            $opcionais = explode(',', $opcionais);
            sort($opcionais);
            foreach ($opcionais as $key => $value) {
                $args[] = array(
                    'key'     => 'opcionais_%_item',
                    'value'   => $value,
                    'compare' => '=',
                );
            }
        }
    }

    $seminovos = array();

    $arr = array(
        'post_type' => 'seminovos',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'meta_query' => $args
    );

    $query = new WP_Query($arr);

    $marca_arr = [];
    $ano_arr = [];
    $preco_arr = [];
    $modelo_arr = [];
    $opcionais_arr = [];
    $portas_arr = [];
    $km_arr = [];
    $cor_arr = [];
    $cor_hexa_arr = [];

    while ($query->have_posts()) {
        $query->the_post();
        $post_id = get_the_ID();
        $marca_arr[] = get_field("marca", $post_id);
        $ano_arr[] = get_field("ano_fabricacao", $post_id);
        $preco_arr[] = get_field("preco", $post_id);
        $modelo_arr[] = get_field("modelo_car", $post_id);
        if(!empty(get_field("opcionais", $post_id)))
        {
            foreach (get_field("opcionais", $post_id) as $key => $value) {
                $opcionais_arr[] = $value['item'];
            }
        }
        $portas_arr[] = get_field("portas", $post_id);
        $km_arr[] = get_field("km", $post_id);
        if(!empty(get_field("cor", $post_id)))
        {
            $cor_arr[] = get_field("cor", $post_id);
        }
    }

    sort($ano_arr);
    sort($portas_arr);
    sort($preco_arr);
    sort($marca_arr);
    sort($modelo_arr);
    sort($km_arr);
    sort($cor_arr);

    $ano_arr = array_values(array_unique($ano_arr));

    foreach (array_unique($cor_arr) as $key => $value) {
        $cor_hexa_arr[] = get_color($value)['nome'];
    }

    $opcionais = [];
    if(isset($paramet['opcionais']))
    {
        $opcionais = $paramet['opcionais'];
        if (!empty($opcionais)) {
            $opcionais = explode(',', $opcionais);
            sort($opcionais);
        }
    }


    $dados['D'] = array(
        'marca' => array_values(array_unique($marca_arr)),
        'ano' => $ano_arr,
        'preco' => array_values(array(
            'min' => reset($preco_arr),
            'max' => end($preco_arr)
        )),
        'modelo' => array_values(array_unique($modelo_arr)),
        'opcionais' => array_values(array_unique($opcionais_arr)),
        'opcionais_check' => array_values(array_unique($opcionais)),
        'portas' => array_values(array_unique($portas_arr)),
        'km' => array_values(array(
            'min' => reset($km_arr),
            'max' => end($km_arr)
        )),
        'cor' => $cor_hexa_arr
    );

    $dados['T'] = get_itens_menu();
    $dados['DISPLAY'] = get_cars($paramet);

    return json_encode($dados);
}

function get_cars($paramet)
{
    $args = array('relation' => 'AND');

    if(isset($paramet['cor']))
    {
        $cor = $paramet['cor'];
        if (!empty($cor)) {
            $cor = explode(',', $cor);
            sort($cor);
            $args[] = array(
                'key'     => 'cor',
                'value'   => $cor,
                'compare' => 'IN',
            );
        }
    }

    if(isset($paramet['price']))
    {
        $preco = $paramet['price'];
        if (!empty($preco)) {
            $preco = explode(',', $preco);
            sort($preco);
            $args[] = array(
                'key'     => 'preco',
                'value'   => array(intval($preco[0]), intval($preco[1])),
                'compare' => 'BETWEEN',
                'type'    => 'numeric'
            );
        }
    }

    if(isset($paramet['marca']))
    {
        $marca = $paramet['marca'];
        if (!empty($marca)) {
            $args[] = array(
                'key'     => 'marca',
                'value'   => $marca,
                'compare' => '=',
            );
        }
    }

    if(isset($paramet['porta']))
    {
        $portas = $paramet['porta'];
        if (!empty($portas)) {
            $args[] = array(
                'key'     => 'portas',
                'value'   => intval($portas),
                'compare' => '=',
                'type'    => 'numeric'
            );
        }
    }

    if(isset($paramet['modelo']))
    {
        $modelo = $paramet['modelo'];
        if (!empty($modelo)) {
            $args[] = array(
                'key'     => 'modelo_car',
                'value'   => $modelo,
                'compare' => '=',
            );
        }
    }

    if(isset($paramet['ano']))
    {
        $ano = $paramet['ano'];
        if (!empty($ano)) {
            $ano = explode(',', $ano);
            sort($ano);
            $args['meta_query'][] = array(
                'key'     => 'ano_fabricacao',
                'value'   => array(intval($ano[0]), intval($ano[1])),
                'compare' => 'BETWEEN',
                'type'    => 'numeric'
            );
        }
    }
    
    if(isset($paramet['km']))
    {
        $km = $paramet['km'];
        if (!empty($km)) {
            $km = explode(',', $km);
            sort($km);
            $args[] = array(
                'key'     => 'km',
                'value'   => array(intval($km[0]), intval($km[1])),
                'compare' => 'BETWEEN',
                'type'    => 'numeric'
            );
        }
    }

    if(isset($paramet['opcionais']))
    {
        $opcionais = $paramet['opcionais'];
        if (!empty($opcionais)) {
            $opcionais = explode(',', $opcionais);
            sort($opcionais);
            foreach ($opcionais as $key => $value) {
                $args[] = array(
                    'key'     => 'opcionais_%_item',
                    'value'   => $value,
                    'compare' => '=',
                );
            }
        }
    }

    $paged = 1;
    if(isset($paramet['pagination']))
    {
        $paged = $paramet['pagination'];
    }

    $seminovos = array();

    $arr = array(
        'post_type' => 'seminovos',
        'post_status' => 'publish',
        'posts_per_page' => 6,
        'paged' => $paged,
        'meta_query' => $args
    );

    $query = new WP_Query($arr);

    $count = array(
        'post_type' => 'seminovos',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'meta_query' => $args
    );

    $query_count = new WP_Query($count);

    $dados['TOTAL'] = $query_count->found_posts;

    $pages = $dados['TOTAL'] / 6;

    $dados['PAGINATION'] = [];

    $j = 1;
    for ($i=1; $i <= ceil($pages); $i++) { 

        if($i == 1 || $i == ceil($pages))
        {
            $dados['PAGINATION'][] = $i;
        }
        else
        {
            if($paged <= 4)
            {
                if($paged != (ceil($pages) - 4))
                {
                     if($i > 1 && $j < 5)
                    {
                        $dados['PAGINATION'][] = $i;
                    }
                    else if($j == 5)
                    {
                        $dados['PAGINATION'][] = '...';
                    }
                }
                $j++;
            }
            if($paged > 4 && $paged < (ceil($pages) - 4))
            {
                if(($paged - 1) == $i) 
                {
                    $dados['PAGINATION'][] = '...';
                    $dados['PAGINATION'][] = $i;
                }
                else if($paged == $i)
                {
                    $dados['PAGINATION'][] = $i;
                }
                else if(($paged + 1) == $i)
                {
                    $dados['PAGINATION'][] = $i;
                }
                else if(($paged + 2) == $i)
                {
                    $dados['PAGINATION'][] = $i;
                    $dados['PAGINATION'][] = '...';
                }
            }
            if($paged >= (ceil($pages) - 4))
            {
                if($j == 1)
                {
                   $dados['PAGINATION'][] = '...';
                }
                else if($i >= (ceil($pages) - 4))
                {
                    $dados['PAGINATION'][] = $i;
                }
                $j++;
            }
        }
    }
    $dados['CARS'] = [];
    while ($query->have_posts()) {
        $query->the_post();
        $post_id = get_the_ID();
        $dados['CARS'][] = array(
            'imagem' => get_field("imagens", $post_id)[0]['imagem'],
            'ano_fabricacao' => get_field("ano_fabricacao", $post_id),
            'ano_modelo' => get_field("ano_modelo", $post_id),
            'marca' => get_field("marca", $post_id),
            'modelo_car' => get_field("modelo_car", $post_id),
            'versao' => get_field("versao", $post_id),
            'km' => get_field("km", $post_id),
            'cambio' => get_field("cambio", $post_id),
            'cor' => get_field("cor", $post_id),
            'preco' => get_field("preco", $post_id),
            'link' => get_permalink($post_id)
        );
    }

    return $dados;
}

function get_itens_menu()
{

    $seminovos = array();

    $arr = array(
        'post_type' => 'seminovos',
        'post_status' => 'publish',
        'posts_per_page' => -1,
    );

    $query = new WP_Query($arr);

    $marca_arr = [];
    $ano_arr = [];
    $preco_arr = [];
    $modelo_arr = [];
    $opcionais_arr = [];
    $portas_arr = [];
    $km_arr = [];
    $cor_arr = [];
    $cor_hexa_arr = [];

    while ($query->have_posts()) {
        $query->the_post();
        $post_id = get_the_ID();
        $marca_arr[] = get_field("marca", $post_id);
        $ano_arr[] = get_field("ano_fabricacao", $post_id);
        $preco_arr[] = get_field("preco", $post_id);
        $modelo_arr[] = get_field("modelo_car", $post_id);
        if(!empty(get_field("opcionais", $post_id)))
        {
            foreach (get_field("opcionais", $post_id) as $key => $value) {
                $opcionais_arr[] = $value['item'];
            }
        }
        $portas_arr[] = get_field("portas", $post_id);
        $km_arr[] = get_field("km", $post_id);
        if(!empty(get_field("cor", $post_id)))
        {
            $cor_arr[] = get_field("cor", $post_id);
        }
    }

    sort($ano_arr);
    sort($portas_arr);
    sort($preco_arr);
    sort($marca_arr);
    sort($modelo_arr);
    sort($km_arr);
    sort($cor_arr);

    $ano_arr = array_values(array_unique($ano_arr));

    foreach (array_unique($cor_arr) as $key => $value) {
        $cor_hexa_arr[] = get_color($value);
    }

    $dados = array(
        'marca' => array_values(array_unique($marca_arr)),
        'ano' => $ano_arr,
        'preco' => array_values(array(
            'min' => reset($preco_arr),
            'max' => end($preco_arr)
        )),
        'modelo' => array_values(array_unique($modelo_arr)),
        'opcionais' => array_values(array_unique($opcionais_arr)),
        'portas' => array_values(array_unique($portas_arr)),
        'km' => array_values(array(
            'min' => reset($km_arr),
            'max' => end($km_arr)
        )),
        'km_scale' => array_values(array_unique($km_arr)),
        'cor' => $cor_hexa_arr
    );

    return $dados;
}


add_filter('posts_where', 'jb_posts_where', 1);
function jb_posts_where( $where ) {
    $where = preg_replace('/meta_key = \'(\w*?)_\{.*?\}_/', "meta_key LIKE '$1_%_", $where);
    return $where;
}

function get_anos()
{
    $seminovos = array();
    $query = new WP_Query(array(
        'post_type' => 'seminovos',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby'        => 'asc',
    ));
    while ($query->have_posts()) {
        $query->the_post();
        $post_id = get_the_ID();
        $anos[] = get_field("ano_fabricacao", $post_id);
    }
    $arr = array_unique($anos);
    asort($arr);
    return $arr;
}

//Cria Post Trabalhe conosco
function create_cor_seminovos_post_types() {
    register_post_type( 'seminovos_cor',
        array(
            'labels' => array(
                'name' => __( 'Cor' ),
                'singular_name' => __( 'Cor' )
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
add_action( 'init', 'create_cor_seminovos_post_types' );

//Subistitui o titulo de cada post
function cor_seminovos_post_title_updater( $post_id ) {
    $my_post = array();
    $my_post['ID'] = $post_id;
    $data = get_field('titulo');
    if ( get_post_type() == 'seminovos_cor' ) {
        $my_post['post_title'] = get_field('titulo');
    }
    wp_update_post( $my_post );
}
add_action('acf/save_post', 'cor_seminovos_post_title_updater', 20);


// Bloqueia o Titulo do Post
function block_post_title_cor_seminovos( $pagehook ){
    global $post_type, $current_screen;
    if($post_type == 'seminovos_cor')
    {
        wp_enqueue_script('block-title', '/wp-content/themes/' . get_template().'/admin/block_post_title.js', array('jquery'));
    }
}
add_action('admin_enqueue_scripts', 'block_post_title_cor_seminovos');


function remove_menus_seminovos_cor() {
    remove_menu_page( 'edit.php?post_type=seminovos_cor' );
}
add_action( 'admin_menu', 'remove_menus_seminovos_cor' );

function get_color($cor)
{
    $seminovos_cor = array();
    $query = new WP_Query(array(
        'post_type' => 'seminovos_cor',
        'post_status' => 'publish',
        'posts_per_page' => 1,
        's' => $cor
    ));
    while ($query->have_posts()) {
        $query->the_post();
        $post_id = get_the_ID();
        $seminovos_cor = array(
            'nome' => get_field("titulo", $post_id),
            'hexadecimal' => get_field("hexadecimal", $post_id)
        );
    }
    if(empty($seminovos_cor))
    {
        $seminovos_cor = array(
            'nome' => $cor,
            'hexadecimal' => '#00000000'
        );
    }
    return $seminovos_cor;
}

function get_seminovo_interna($id)
{
    $post_id = $id;
    $dados = array(
        'title'  => get_the_title(),
        'marca'  => get_field("marca", $post_id),
        'modelo'  => get_field("modelo_car", $post_id),
        'versao'  => get_field("versao", $post_id),
        'ano_fabricacao'  => get_field("ano_fabricacao", $post_id),
        'ano_modelo'  => get_field("ano_modelo", $post_id),
        'cambio'  => get_field("cambio", $post_id),
        'km'  => get_field("km", $post_id),
        'portas'  => get_field("portas", $post_id),
        'cor'  => get_field("cor", $post_id),
        'combustivel'  => get_field("combustivel", $post_id),
        'preco'  => get_field("preco", $post_id),
        'opcionais'  => get_field("opcionais", $post_id),
        'acessorios'  => get_field("acessorios", $post_id),
        'imagens'  => get_field("imagens", $post_id),
        'observacoes' => get_field("observacoes", $post_id),
    );
    return $dados;
}
