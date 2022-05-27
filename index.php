<?php

/*
Autor: Caio César Atenas Gomes
version: 0.0.1

*/

if (! function_exists('add_action')){
    echo "mensagem";
    exit;
}
function dl_ativacao_plugin(){
    if(version_compare(get_bloginfo('version'), '4.8', '<')){
        wp_die("mensagem2");
    }
}

register_activation_hook (__FILE__, 'dl__ativacao_plugin');

function carregar_js_css(){
    wp_enquaue_style('css', plugins_url('/style.css',__FILE__));
    wp_enquaue_script('js', plugins_url('/script.js',__FILE__, arrey('jquery'), '1.0', true));

    wp_localize_script('js', 'login_obj', arrey('ajax_url' => admin_url("admin-ajax.php")))

}

add_action('wp_enqueue_scripts', 'carregar_js_css');

function dl_auth_form_shortcode(){
    $formHTL = file_get_contents(plugins_url('login/templetelogin.php'));

    echo $formHTL;
}

add_shortcode('login_auth_form', 'dl_auth_form_shortcode');