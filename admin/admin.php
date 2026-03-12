add_action(
'admin_enqueue_scripts',
function(){

wp_enqueue_script(

'leadyia-admin',

plugin_dir_url(__FILE__).'../admin-ui-dist/assets/index.js',

['wp-element'],

'1.0',

true

);

wp_enqueue_style(

'leadyia-admin',

plugin_dir_url(__FILE__).'../admin-ui-dist/assets/index.css'

);

}
);