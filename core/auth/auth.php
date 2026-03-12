<?php

if (!defined('ABSPATH')) {
    exit;
}

function leadyia_is_connected() {

    $tenant = get_option('leadyia_tenant_id');
    $apiKey = get_option('leadyia_api_key');

    if(!$tenant || !$apiKey){
        return false;
    }

    $api = new LeadyIA_API_Client();

    $response = $api->get('/auth/me');

    if(!$response){
        return false;
    }

    return true;
}