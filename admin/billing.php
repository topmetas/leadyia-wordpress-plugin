<?php

function leadyia_billing_page() {

    $api = new LeadyIA_API();
    $billing = $api->request('/enterprise/billing');

    ?>
    <div class="wrap">
        <h1>Plano Atual</h1>

        <p><strong>Plano:</strong> <?php echo esc_html($billing['plan']); ?></p>
        <p><strong>Status:</strong> <?php echo esc_html($billing['status']); ?></p>
        <p><strong>Limite de Leads:</strong> <?php echo esc_html($billing['limit']); ?></p>

        <a href="<?php echo esc_url($billing['upgrade_url']); ?>"
           class="button button-primary"
           target="_blank">
           Fazer Upgrade
        </a>
    </div>
    <?php
}
