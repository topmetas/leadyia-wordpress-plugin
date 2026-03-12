<?php

add_action('rest_api_init', function () {

register_rest_route('leadyia/v1', '/lead', [

'methods' => 'POST',

'callback' => 'leadyia_receive_lead'

]);

});

function leadyia_receive_lead($request){

global $wpdb;

$data = $request->get_json_params();

$wpdb->insert(

$wpdb->prefix.'leadyia_leads',

[
'name'=>$data['name'],
'email'=>$data['email'],
'phone'=>$data['phone'],
'source'=>'chat',
'created_at'=>current_time('mysql')
]

);

return ['success'=>true];

}