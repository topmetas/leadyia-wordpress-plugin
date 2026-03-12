<?php

function leadyia_add_capabilities() {
    $role = get_role('editor');
    if ($role) {
        $role->add_cap('leadyia_view');
    }
}

register_activation_hook(__FILE__, 'leadyia_add_capabilities');
