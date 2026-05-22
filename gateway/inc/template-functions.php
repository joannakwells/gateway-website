<?php
/**
 * Template helper functions.
 *
 * @package Gateway
 */

if (! defined('ABSPATH')) {
    exit;
}

function gateway_asset_url($path) {
    return get_template_directory_uri() . '/assets/' . ltrim($path, '/');
}

function gateway_asset_path($path) {
    return get_template_directory() . '/assets/' . ltrim($path, '/');
}

function gateway_posted_on() {
    printf(
        '<time datetime="%1$s">%2$s</time>',
        esc_attr(get_the_date(DATE_W3C)),
        esc_html(get_the_date())
    );
}

function gateway_post_categories() {
    $categories = get_the_category_list(esc_html__(', ', 'gateway'));
    if ($categories) {
        echo '<span class="post-categories">' . wp_kses_post($categories) . '</span>';
    }
}

function gateway_custom_logo() {
    if (has_custom_logo()) {
        the_custom_logo();
        return;
    }
    printf(
        '<a class="site-branding__name" href="%1$s" rel="home">%2$s</a>',
        esc_url(home_url('/')),
        esc_html(get_bloginfo('name'))
    );
}

function gateway_primary_menu_fallback() {
    echo '<ul id="gateway-primary-menu" class="gateway-menu flex items-center justify-end gap-sm h-full">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">' . esc_html__('Home', 'gateway') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/about/')) . '">' . esc_html__('About', 'gateway') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/blog/')) . '">' . esc_html__('Blog', 'gateway') . '</a></li>';
    echo '</ul>';
}
