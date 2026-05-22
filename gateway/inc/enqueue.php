<?php
/**
 * Asset loading.
 *
 * @package Gateway
 */

if (! defined('ABSPATH')) {
    exit;
}

function gateway_enqueue_assets() {
    $version = wp_get_theme()->get('Version');

    wp_enqueue_style(
        'gateway-typekit',
        'https://use.typekit.net/wsw8tfa.css',
        [],
        null
    );

    wp_enqueue_style(
        'gateway-main',
        get_template_directory_uri() . '/assets/css/main.css',
        ['gateway-typekit'],
        $version
    );

    wp_enqueue_script(
        'gateway-main',
        get_template_directory_uri() . '/assets/js/main.js',
        [],
        $version,
        true
    );
}
add_action('wp_enqueue_scripts', 'gateway_enqueue_assets');
