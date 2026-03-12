<?php

/**
 * =====================================================
 * LeadyIA API Service
 * =====================================================
 * Centraliza o acesso ao cliente da API do SaaS
 * Usado por todo o plugin WordPress
 */

if (!defined('ABSPATH')) {
    exit;
}

class LeadyIA_API_Service {

    /**
     * Instância singleton
     */
    private static $instance = null;

    /**
     * Cliente da API
     */
    private $client;

    /**
     * Construtor privado (singleton)
     */
    private function __construct() {

        // carregar cliente API
        if(!class_exists('LeadyIA_API_Client')){

            require_once plugin_dir_path(__FILE__) . '../api-client.php';

        }

        $this->client = new LeadyIA_API_Client();

    }

    /**
     * Retorna instância única
     */
    public static function instance(){

        if(self::$instance === null){

            self::$instance = new self();

        }

        return self::$instance;

    }

    /**
     * Retorna cliente da API
     */
    public function getClient(){

        return $this->client;

    }

    /**
     * Wrapper GET
     */
    public function get($endpoint){

        return $this->client->get($endpoint);

    }

    /**
     * Wrapper POST
     */
    public function post($endpoint, $data = []){

        return $this->client->post($endpoint, $data);

    }

    /**
     * Wrapper PUT
     */
    public function put($endpoint, $data = []){

        return $this->client->put($endpoint, $data);

    }

    /**
     * Wrapper DELETE
     */
    public function delete($endpoint){

        return $this->client->delete($endpoint);

    }

}