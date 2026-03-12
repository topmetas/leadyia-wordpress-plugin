<?php

function leadyia_analytics_page() {

    $api = new LeadyIA_API();
    $metrics = $api->request('/enterprise/metrics');

?>
<div class="wrap">
    <h1>Analytics LeadyIA</h1>

    <div class="leadyia-grid">

        <div class="card">
            <h2>Conversas</h2>
            <p><?php echo esc_html($metrics['conversations'] ?? 0); ?></p>
        </div>

        <div class="card">
            <h2>Leads</h2>
            <p><?php echo esc_html($metrics['leads'] ?? 0); ?></p>
        </div>

        <div class="card">
            <h2>Conversão</h2>
            <p><?php echo esc_html($metrics['conversion_rate'] ?? 0); ?>%</p>
        </div>

    </div>
</div>
<?php
}
