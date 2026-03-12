<?php

if (!defined('ABSPATH')) {
    exit;
}

class LeadyIA_Tenant_Installer {

    private $api;

    public function __construct() {
        $this->api = new LeadyIA_API_Client();
    }

    public function install($email,$password){

        $response = $this->api->request(
            '/auth/register',
            'POST',
            [
                'email'=>$email,
                'password'=>$password,
                'site'=>get_site_url()
            ]
        );

        if(isset($response['tenant_id'])){

            update_option('leadyia_tenant_id',$response['tenant_id']);
            update_option('leadyia_api_key',$response['api_key']);

            return $response;
        }

        return false;
    }

}