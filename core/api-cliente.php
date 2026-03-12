<?php

if (!defined('ABSPATH')) {
    exit;
}

class LeadyIA_API_Client {

    private $base;

    public function __construct() {

        $this->base = "https://api.leadyia.com/api";

    }

    private function headers(){

        $apiKey = get_option('leadyia_api_key');
        $tenant = get_option('leadyia_tenant_id');

        return [

            'Content-Type' => 'application/json',
            'Accept' => 'application/json',

            'Authorization' => 'Bearer ' . sanitize_text_field($apiKey),

            'x-tenant-id' => sanitize_text_field($tenant)

        ];

    }

    public function request($endpoint, $method = 'GET', $data = []) {

        $url = rtrim($this->base, '/') . '/' . ltrim($endpoint, '/');

        $args = [

            'method' => strtoupper($method),

            'headers' => $this->headers(),

            'timeout' => 20,

            'data_format' => 'body'

        ];

        if(!empty($data)){

            $args['body'] = json_encode($data);

        }

        $response = wp_remote_request($url, $args);

        if (is_wp_error($response)) {

            error_log('LeadyIA API Error: ' . $response->get_error_message());

            return null;

        }

        $status = wp_remote_retrieve_response_code($response);

        if ($status >= 400) {

            error_log('LeadyIA API HTTP Error: ' . $status);

            return null;

        }

        $body = wp_remote_retrieve_body($response);

        return json_decode($body, true);

    }

    public function get($endpoint){

        return $this->request($endpoint, 'GET');

    }

    public function post($endpoint, $data = []){

        return $this->request($endpoint, 'POST', $data);

    }

    public function put($endpoint, $data = []){

        return $this->request($endpoint, 'PUT', $data);

    }

    public function delete($endpoint){

        return $this->request($endpoint, 'DELETE');

    }

}