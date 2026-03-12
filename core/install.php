<?php

if (!defined('ABSPATH')) {
    exit;
}

function leadyia_auto_register() {

    $tenant = get_option('leadyia_tenant_id');

    if ($tenant) {
        return;
    }

    $email = get_option('admin_email');
    $name  = get_bloginfo('name');
    $site  = get_site_url();

    $response = wp_remote_post(
        "https://api.leadyia.com/api/auth/register",
        [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'body' => json_encode([
                "name" => $name,
                "email" => $email,
                "password" => wp_generate_password(),
                "companyName" => $name,
                "website" => $site
            ]),
            'timeout' => 20
        ]
    );

    if (is_wp_error($response)) {
        return;
    }

    $data = json_decode(
        wp_remote_retrieve_body($response),
        true
    );

    if (isset($data['tenant']['_id'])) {

        update_option(
            'leadyia_tenant_id',
            sanitize_text_field($data['tenant']['_id'])
        );

    }

    if (isset($data['apiKey'])) {

        update_option(
            'leadyia_api_key',
            sanitize_text_field($data['apiKey'])
        );

    }

}