<?php

if (!defined('ABSPATH')) {
    exit;
}

function leadyia_register_account($name, $email, $password, $site) {

    $url = "https://api.leadyia.com/api/auth/register";

    $body = [
        "name" => sanitize_text_field($name),
        "email" => sanitize_email($email),
        "password" => sanitize_text_field($password),
        "companyName" => sanitize_text_field(get_bloginfo('name')),
        "website" => esc_url($site)
    ];

    $response = wp_remote_post($url, [
        'headers' => [
            'Content-Type' => 'application/json'
        ],
        'body' => json_encode($body),
        'timeout' => 20
    ]);

    if (is_wp_error($response)) {
        return false;
    }

    $data = json_decode(wp_remote_retrieve_body($response), true);

    if (!$data) {
        return false;
    }

    if (isset($data['tenant']['_id'])) {

        update_option('leadyia_tenant_id', $data['tenant']['_id']);
    }

    if (isset($data['apiKey'])) {

        update_option('leadyia_api_key', $data['apiKey']);
    }

    return $data;
}