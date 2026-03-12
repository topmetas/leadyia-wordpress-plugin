<?php

if (!defined('ABSPATH')) {
    exit;
}

function leadyia_bots_page() {

    if (!current_user_can('manage_options')) {
        return;
    }

    $api = new LeadyIA_API_Client();

    $response = $api->get('/bots');

    $bots = $response['data'] ?? [];

    if (isset($_POST['leadyia_bot_id'])) {

        update_option(
            'leadyia_bot_id',
            sanitize_text_field($_POST['leadyia_bot_id'])
        );

        echo '<div class="updated"><p>Bot salvo com sucesso.</p></div>';
    }

    $selected_bot = get_option('leadyia_bot_id');

?>

<div class="wrap">

<h1>LeadyIA Bots</h1>

<p>Selecione qual bot será usado no widget.</p>

<form method="post">

<table class="widefat striped">

<thead>
<tr>
<th>Selecionar</th>
<th>Nome</th>
<th>ID</th>
</tr>
</thead>

<tbody>

<?php if (!empty($bots)) : ?>

<?php foreach ($bots as $bot) : ?>

<tr>

<td>

<input
type="radio"
name="leadyia_bot_id"
value="<?php echo esc_attr($bot['id']); ?>"
<?php checked($selected_bot, $bot['id']); ?>
>

</td>

<td>

<?php echo esc_html($bot['name'] ?? 'Bot'); ?>

</td>

<td>

<?php echo esc_html($bot['id']); ?>

</td>

</tr>

<?php endforeach; ?>

<?php else : ?>

<tr>
<td colspan="3">Nenhum bot encontrado.</td>
</tr>

<?php endif; ?>

</tbody>

</table>

<br>

<?php submit_button('Salvar Bot'); ?>

</form>

</div>

<?php

}