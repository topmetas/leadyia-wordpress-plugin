<?php

function leadyia_get_bootstrap_cached($tenant) {

    $cache = get_transient('leadyia_bootstrap_' . $tenant);

    if ($cache) {
        return $cache;
    }

    $api = new LeadyIA_API();
    $data = $api->request('/widget/bootstrap', 'POST', [
        'tenantId' => $tenant
    ]);

    set_transient('leadyia_bootstrap_' . $tenant, $data, 300);

    return $data;
}
