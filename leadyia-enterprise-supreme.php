<?php
/**
 * Plugin Name: LeadyIA Enterprise Supreme
 * Description: Plataforma Enterprise completa integrada à API LeadyIA.
 * Version: 2.0.0
 * Author: LeadyIA
 */

if (!defined('ABSPATH')) {
    exit;
}

define('LEADYIA_VERSION', '2.0.0');
define('LEADYIA_PATH', plugin_dir_path(__FILE__));
define('LEADYIA_URL', plugin_dir_url(__FILE__));

/*
|--------------------------------------------------------------------------
| CORE
|--------------------------------------------------------------------------
*/

require_once LEADYIA_PATH . 'core/api-client.php';
require_once LEADYIA_PATH . 'core/auth.php';
require_once LEADYIA_PATH . 'core/service/api.php';
require_once LEADYIA_PATH . 'core/updater.php';

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

require_once LEADYIA_PATH . 'admin/settings.php';
require_once LEADYIA_PATH . 'admin/dashboard.php';
require_once LEADYIA_PATH . 'admin/analytics.php';
require_once LEADYIA_PATH . 'admin/ajax.php';
require_once LEADYIA_PATH . 'admin/enqueue.php';

/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/

require_once LEADYIA_PATH . 'public/loader.php';