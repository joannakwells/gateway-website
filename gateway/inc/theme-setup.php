<?php
/**
 * Theme setup.
 *
 * @package Gateway
 */

if (! defined('ABSPATH')) {
    exit;
}

function gateway_theme_setup() {
    load_theme_textdomain('gateway', get_template_directory() . '/languages');

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ]);
    add_theme_support('custom-logo', [
        'height'      => 120,
        'width'       => 553,
        'flex-height' => true,
        'flex-width'  => true,
    ]);
    add_theme_support('align-wide');
    add_theme_support('responsive-embeds');

    add_image_size('gateway-hero', 2000, 700, true);
    add_image_size('gateway-hero-mobile', 3043, 5464, true);
    add_image_size('gateway-card', 800, 600, true);

    register_nav_menus([
        'primary' => __('Primary Menu', 'gateway'),
        'footer'  => __('Footer Menu', 'gateway'),
    ]);
}
add_action('after_setup_theme', 'gateway_theme_setup');

function gateway_widgets_init() {
    register_sidebar([
        'name'          => __('Footer Widget Area', 'gateway'),
        'id'            => 'footer-1',
        'description'   => __('Optional footer content for the Gateway theme.', 'gateway'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ]);
}
add_action('widgets_init', 'gateway_widgets_init');

function gateway_customize_register($wp_customize) {
    $wp_customize->add_section('gateway_theme_options', [
        'title'    => __('Gateway Theme Options', 'gateway'),
        'priority' => 30,
    ]);

    $wp_customize->add_setting('gateway_announcement_text', [
        'default'           => __('Native plants, seasonal color, and expert garden advice.', 'gateway'),
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('gateway_announcement_text', [
        'label'   => __('Announcement Text', 'gateway'),
        'section' => 'gateway_theme_options',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('gateway_footer_tagline', [
        'default'           => __('A custom WordPress theme for Gateway Garden Center.', 'gateway'),
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('gateway_footer_tagline', [
        'label'   => __('Footer Tagline', 'gateway'),
        'section' => 'gateway_theme_options',
        'type'    => 'text',
    ]);
}
add_action('customize_register', 'gateway_customize_register');
