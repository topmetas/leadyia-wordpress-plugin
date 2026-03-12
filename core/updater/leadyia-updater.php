<?php

class LeadyIA_Updater {

private $version = '1.0.0';

private $update_url = 'https://plugin.leadyia.com/update.json';

public function __construct(){

add_filter(

'pre_set_site_transient_update_plugins',

[$this,'check_update']

);

}

public function check_update($transient){

$response = wp_remote_get($this->update_url);

if(is_wp_error($response)) return $transient;

$data = json_decode(

wp_remote_retrieve_body($response)

);

if(version_compare($this->version,$data->version,'<')){

$plugin = new stdClass();

$plugin->slug = 'leadyia-chat';

$plugin->new_version = $data->version;

$plugin->package = $data->download_url;

$transient->response['leadyia-chat/leadyia-chat.php']=$plugin;

}

return $transient;

}

}