<?php

class LeadyIA_Bots {

    private $api;

    public function __construct(){
        $this->api = new LeadyIA_API_Client();
    }

    public function get_bots(){

        return $this->api->request('/bots');

    }

}