<?php

if (!defined('ABSPATH')) {
    exit;
}

function leadyia_register_page() {

?>

<div class="wrap">

<h1>Criar conta LeadyIA</h1>

<table class="form-table">

<tr>
<th>Nome</th>
<td><input id="leadyia-name" type="text" style="width:300px"></td>
</tr>

<tr>
<th>Email</th>
<td><input id="leadyia-email" type="email" style="width:300px"></td>
</tr>

<tr>
<th>Senha</th>
<td><input id="leadyia-password" type="password" style="width:300px"></td>
</tr>

</table>

<button class="button button-primary" id="leadyia-register-btn">
Criar Conta
</button>

<div id="leadyia-result"></div>

</div>

<?php
}