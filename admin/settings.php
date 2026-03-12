<?php

if (!defined('ABSPATH')) {
    exit;
}

add_action('admin_menu', function () {

    add_menu_page(
        'LeadyIA Supreme',
        'LeadyIA',
        'manage_options',
        'leadyia-settings',
        'leadyia_settings_page',
        LEADYIA_URL . 'assets/logo.svg',
        25
    );

    add_submenu_page(
        'leadyia-settings',
        'Analytics',
        'Analytics',
        'manage_options',
        'leadyia-analytics',
        'leadyia_analytics_page'
        'leadyia-bots',
        'leadyia_bots_page'
    );

});

add_action('admin_init', function () {

    register_setting(
        'leadyia_group',
        'leadyia_tenant_id',
        'sanitize_text_field'
    );

    register_setting(
        'leadyia_group',
        'leadyia_api_key',
        'sanitize_text_field'
    );

    add_settings_section(
        'leadyia_main',
        'Configuração da Plataforma',
        null,
        'leadyia-settings'
    );

    add_settings_field(
        'tenant_id',
        'Tenant ID',
        'leadyia_field_tenant',
        'leadyia-settings',
        'leadyia_main'
    );

    add_settings_field(
        'api_key',
        'API Key',
        'leadyia_field_api',
        'leadyia-settings',
        'leadyia_main'
    );

});

function leadyia_field_tenant() {

    $value = get_option('leadyia_tenant_id');

    ?>

    <input type="text"
           name="leadyia_tenant_id"
           value="<?php echo esc_attr($value); ?>"
           style="width:400px;">

    <?php
}

function leadyia_field_api() {

    $value = get_option('leadyia_api_key');

    ?>

    <input type="password"
           name="leadyia_api_key"
           value="<?php echo esc_attr($value); ?>"
           style="width:400px;">

    <?php
}

function leadyia_settings_page() {
?>

<div class="wrap">

<h1>LeadyIA Enterprise Supreme</h1>

<form method="post" action="options.php">

<?php

settings_fields('leadyia_group');

do_settings_sections('leadyia-settings');

submit_button('Salvar Configurações');

?>

</form>

<hr>

<h2>Status da API</h2>

<div id="leadyia-status">

Clique para testar conexão.

</div>

<button class="button button-primary" id="leadyia-test">

Testar Conexão

</button>

</div>

<?php

}