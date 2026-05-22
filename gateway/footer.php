<?php
/**
 * Site footer.
 *
 * @package Gateway
 */
?>
<footer class="site-footer color-primary bg-background text-text bg-contrast" role="contentinfo">
  <div class="max-w-screen px-lg mx-auto flex desktop:py-[80px] tablet:flex-col">
    <div class="desktop:w-1/2 flex justify-center items-center desktop:border-border desktop:border-r tablet:py-[60px]">
      <div class="footer-branding max-w-[320px]">
        <?php gateway_custom_logo(); ?>
      </div>
    </div>
    <div class="desktop:pl-lg desktop:w-1/2">
      <div class="desktop:pr-[7vw] pb-[60px]">
        <div class="font-heading text-heading-md empty:hidden mb-xs"><?php esc_html_e('Stay in touch', 'gateway'); ?></div>
        <div class="rte text-xl"><p><?php echo esc_html(get_theme_mod('gateway_footer_tagline', __('A custom WordPress theme for Gateway Garden Center.', 'gateway'))); ?></p></div>
        <?php if (is_active_sidebar('footer-1')) : ?>
          <div class="gateway-footer-widgets my-lg"><?php dynamic_sidebar('footer-1'); ?></div>
        <?php endif; ?>
        <nav class="gateway-footer-nav" aria-label="<?php esc_attr_e('Footer Menu', 'gateway'); ?>">
          <?php
          wp_nav_menu([
              'theme_location' => 'footer',
              'container'      => false,
              'menu_class'     => 'text-sm pt-sm flex flex-col gap-xs tablet:gap-sm',
              'fallback_cb'    => false,
          ]);
          ?>
        </nav>
      </div>
    </div>
  </div>
  <div class="max-w-screen px-lg mx-auto flex flex-row tablet:flex-col justify-between pb-lg tablet:gap-[20px]">
    <p class="text-sm opacity-80">&copy; <?php echo esc_html(date('Y')); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('All rights reserved.', 'gateway'); ?></p>
    <p class="text-sm opacity-80"><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Back to home', 'gateway'); ?></a></p>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
