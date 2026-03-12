<?php

if (!defined('ABSPATH')) {
    exit;
}

add_action('wp_footer', 'leadyia_widget_loader');

function leadyia_widget_loader() {

    if (is_admin()) {
        return;
    }

    $tenant = get_option('leadyia_tenant_id');

    if (!$tenant) {
        return;
    }

    $tenant = esc_attr($tenant);

?>

<script
src="https://widget.leadyia.com/v1/widget.js"
data-tenant="<?php echo $tenant; ?>"
data-theme="dark">
</script>

<?php

}