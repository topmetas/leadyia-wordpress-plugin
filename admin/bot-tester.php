<?php

function leadyia_bot_tester_page() {
    ?>
    <div class="wrap">
        <h1>Testar Bot</h1>

        <textarea id="leadyia-message" style="width:100%; height:100px;"></textarea>
        <br><br>
        <button class="button button-primary" onclick="leadyiaSend()">Enviar</button>

        <div id="leadyia-response" style="margin-top:20px;"></div>
    </div>
    <?php
}
