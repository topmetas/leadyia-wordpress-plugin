<?php

if(!class_exists('WooCommerce')) return;

add_action(

'woocommerce_checkout_update_user_meta',

function($user_id){

$user = get_user_by('id',$user_id);

$api = new LeadyIA_API_Client();

$api->request(

'/leads',

'POST',

[
'email'=>$user->user_email,
'name'=>$user->display_name
]

);

}

);