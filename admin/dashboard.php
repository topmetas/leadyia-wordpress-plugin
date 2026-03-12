<?php

if (!defined('ABSPATH')) {
    exit;
}

/*
|--------------------------------------------------------------------------
| VERIFICAR SE PLUGIN ESTÁ CONECTADO
|--------------------------------------------------------------------------
*/

if(!leadyia_is_connected()){

    require LEADYIA_PATH . 'admin/register-page.php';
    return;

}

?>

<div class="wrap">
    <h1>LeadyIA Dashboard</h1>

    <!-- React Dashboard -->
    <div id="leadyia-admin-root"></div>
</div>