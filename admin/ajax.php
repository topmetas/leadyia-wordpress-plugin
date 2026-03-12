<?php

if (!defined('ABSPATH')) {
    exit;
}

/*
|--------------------------------------------------------------------------
| TESTAR CONEXÃO COM API
|--------------------------------------------------------------------------
*/

add_action('wp_ajax_leadyia_test_connection', 'leadyia_test_connection');

function leadyia_test_connection() {

    if (!current_user_can('manage_options')) {
        wp_send_json_error('Permissão negada');
    }

    $api = new LeadyIA_API_Client();

    // usa rota real do backend
    $response = $api->get('/bots');

    if (!$response) {
        wp_send_json_error('Falha ao conectar com a API');
    }

    wp_send_json_success([
        'message' => 'Conectado com sucesso',
        'bots' => $response
    ]);
}

/*
|--------------------------------------------------------------------------
| REGISTRAR NOVA CONTA (AUTH REGISTER)
|--------------------------------------------------------------------------
*/

add_action('wp_ajax_leadyia_register', 'leadyia_register');

function leadyia_register() {

    if (!current_user_can('manage_options')) {
        wp_send_json_error('Permissão negada');
    }

    $name = sanitize_text_field($_POST['name'] ?? '');
    $email = sanitize_email($_POST['email'] ?? '');
    $password = sanitize_text_field($_POST['password'] ?? '');

    $site = get_site_url();

    $url = "https://api.leadyia.com/api/auth/register";

    $body = [
        "name" => $name,
        "email" => $email,
        "password" => $password,
        "companyName" => get_bloginfo('name'),
        "website" => $site
    ];

    $response = wp_remote_post($url, [
        'headers' => [
            'Content-Type' => 'application/json'
        ],
        'body' => json_encode($body),
        'timeout' => 20
    ]);

    if (is_wp_error($response)) {
        wp_send_json_error('Erro ao conectar com API');
    }

    $data = json_decode(wp_remote_retrieve_body($response), true);

    if (!$data) {
        wp_send_json_error('Resposta inválida da API');
    }

    /*
    |--------------------------------------------------------------------------
    | SALVAR CREDENCIAIS NO WORDPRESS
    |--------------------------------------------------------------------------
    */

    if (isset($data['tenant']['_id'])) {
        update_option('leadyia_tenant_id', $data['tenant']['_id']);
    }

    if (isset($data['apiKey'])) {
        update_option('leadyia_api_key', $data['apiKey']);
    }

    wp_send_json_success([
        "message" => "Conta criada com sucesso",
        "data" => $data
    ]);
}