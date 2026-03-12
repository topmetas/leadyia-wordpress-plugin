<?php

if (!defined('ABSPATH')) {
    exit;
}

function leadyia_admin_scripts($hook){

    if(strpos($hook, 'leadyia') === false){
        return;
    }

    wp_enqueue_script(
        'leadyia-dashboard',
        LEADYIA_URL . 'dashboard/dist/assets/index.js',
        [],
        LEADYIA_VERSION,
        true
    );

    wp_enqueue_style(
        'leadyia-dashboard-style',
        LEADYIA_URL . 'dashboard/dist/assets/index.css',
        [],
        LEADYIA_VERSION
    );

    wp_localize_script(
        'leadyia-dashboard',
        'LeadyIA',
        [
            'ajax' => admin_url('admin-ajax.php'),
            'tenant' => get_option('leadyia_tenant_id')
        ]
    );
}

add_action('admin_enqueue_scripts', 'leadyia_admin_scripts');