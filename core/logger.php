<?php

class LeadyIA_Logger {

    public static function log($title, $message) {

        $logs = get_option('leadyia_logs', []);
        $logs[] = [
            'date' => current_time('mysql'),
            'title' => $title,
            'message' => $message
        ];

        update_option('leadyia_logs', $logs);
    }
}
