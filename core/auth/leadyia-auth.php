<?php

if (!defined('ABSPATH')) {
    exit;
}

class LeadyIA_Auth {

    private $api;

    public function __construct() {
        $this->api = new LeadyIA_API_Client();
    }

    public function login($email, $password) {

        $response = $this->api->request(
            '/auth/login',
            'POST',
            [
                'email' => sanitize_email($email),
                'password' => sanitize_text_field($password),
                'site' => get_site_url()
            ]
        );

        if(isset($response['api_key'])){

            update_option('leadyia_api_key', $response['api_key']);
            update_option('leadyia_tenant_id', $response['tenant_id']);

            return true;
        }

        return false;
    }

}