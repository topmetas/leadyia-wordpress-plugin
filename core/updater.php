<?php

if (!defined('ABSPATH')) {
    exit;
}

class LeadyIA_Updater {

    private $repo = "https://api.github.com/repos/leadyia/leadyia-wordpress-plugin/releases/latest";

    public function __construct() {

        add_filter(
            'pre_set_site_transient_update_plugins',
            [$this,'check_update']
        );

    }

    public function check_update($transient) {

        if (empty($transient->checked)) {
            return $transient;
        }

        $response = wp_remote_get($this->repo, [
            'headers' => [
                'Accept' => 'application/vnd.github+json'
            ]
        ]);

        if (is_wp_error($response)) {
            return $transient;
        }

        $data = json_decode(
            wp_remote_retrieve_body($response)
        );

        if (!$data || empty($data->tag_name)) {
            return $transient;
        }

        $plugin = plugin_basename(
            LEADYIA_PATH . 'leadyia-enterprise-supreme.php'
        );

        if (version_compare(LEADYIA_VERSION, $data->tag_name, '<')) {

            $transient->response[$plugin] = (object)[
                'slug' => 'leadyia-enterprise',
                'new_version' => $data->tag_name,
                'package' => $data->zipball_url,
                'url' => $data->html_url
            ];

        }

        return $transient;
    }

}

new LeadyIA_Updater();