<?php

if (!defined('ABSPATH')) {
    exit;
}

function leadyia_leads_page() {

    $api = new LeadyIA_API_Client();

    $leads = $api->get('/leads');

?>

<div class="wrap">

<h1>Leads capturados</h1>

<table class="widefat striped">

<thead>
<tr>
<th>Nome</th>
<th>Email</th>
<th>Telefone</th>
<th>Data</th>
</tr>
</thead>

<tbody>

<?php if($leads): ?>

<?php foreach($leads as $lead): ?>

<tr>

<td><?php echo esc_html($lead['name'] ?? ''); ?></td>
<td><?php echo esc_html($lead['email'] ?? ''); ?></td>
<td><?php echo esc_html($lead['phone'] ?? ''); ?></td>
<td><?php echo esc_html($lead['createdAt'] ?? ''); ?></td>

</tr>

<?php endforeach; ?>

<?php endif; ?>

</tbody>

</table>

</div>

<?php

}