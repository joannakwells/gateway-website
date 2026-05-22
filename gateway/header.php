<?php
/**
 * Site header.
 *
 * @package Gateway
 */
?><!doctype html>
<html <?php language_attributes(); ?> class="no-js template-index">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <meta name="theme-color" content="#4D6947">
  <?php wp_head(); ?>
</head>
<body <?php body_class('min-h-screen font-body text-base leading-none color-primary bg-background text-text'); ?>>
<?php
if (function_exists('wp_body_open')) {
    wp_body_open();
}
?>
<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'gateway'); ?></a>
<header class="site-header sticky top-0 z-30 color-primary bg-background text-text" role="banner">
  <div class="gateway-announcement color-green bg-background text-text py-xxs min-h-lg tablet:min-h-xl relative z-20">
    <div class="max-w-screen mx-auto px-lg flex items-center justify-between mobile:justify-center">
      <div class="relative text-sm"><?php echo esc_html(get_theme_mod('gateway_announcement_text', __('Native plants, seasonal color, and expert garden advice.', 'gateway'))); ?></div>
      <div class="relative text-sm mobile:hidden"><?php esc_html_e('Call us or visit the garden center for seasonal availability.', 'gateway'); ?></div>
    </div>
  </div>
  <div class="min-h-header relative z-10 color-primary bg-background text-text">
    <div class="max-w-screen mx-auto px-lg flex items-center gap-gutter gateway-header-inner">
      <div class="flex-1 flex items-center justify-start gap-gutter">
        <button class="gateway-menu-toggle hidden tablet:flex" type="button" aria-expanded="false" aria-controls="gateway-primary-menu">
          <span class="screen-reader-text"><?php esc_html_e('Menu', 'gateway'); ?></span>
          <span aria-hidden="true"></span><span aria-hidden="true"></span><span aria-hidden="true"></span>
        </button>
        <form action="<?php echo esc_url(home_url('/')); ?>" method="get" role="search" class="gateway-search relative flex items-center gap-gutter group w-full max-w-[334px] bg-contrast rounded-sm overflow-hidden py-[8px] px-sm text-sm tablet:hidden">
          <label class="screen-reader-text" for="gateway-search-field"><?php esc_html_e('Search our website', 'gateway'); ?></label>
          <input id="gateway-search-field" name="s" type="search" placeholder="<?php esc_attr_e('Search our website', 'gateway'); ?>" value="<?php echo esc_attr(get_search_query()); ?>" class="appearance-none outline-none transition-colors bg-transparent text-base min-h-[45px] placeholder:text-current tablet:text-[16px] peer w-full bg-contrast -my-xs py-xs outline-none min-w-0">
          <button type="submit" class="text-links bg-contrast flex-shrink-0"><?php esc_html_e('Search', 'gateway'); ?></button>
        </form>
      </div>
      <div class="gateway-logo flex items-center justify-center">
        <?php gateway_custom_logo(); ?>
      </div>
      <nav class="gateway-primary-nav flex-1 flex items-center justify-end" aria-label="<?php esc_attr_e('Primary Menu', 'gateway'); ?>">
        <?php
        wp_nav_menu([
            'theme_location' => 'primary',
            'container'      => false,
            'menu_id'        => 'gateway-primary-menu',
            'menu_class'     => 'gateway-menu flex items-center justify-end gap-sm h-full',
            'fallback_cb'    => 'gateway_primary_menu_fallback',
        ]);
        ?>
      </nav>
    </div>
  </div>
</header>
