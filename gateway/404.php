<?php
/**
 * 404 template.
 *
 * @package Gateway
 */
get_header();
?>
<main id="primary" class="site-main gateway-content max-w-screen mx-auto px-lg my-xxl text-center">
  <h1 class="font-heading text-heading-md"><?php esc_html_e('Page not found', 'gateway'); ?></h1>
  <div class="rte text-xl"><p><?php esc_html_e('The page you are looking for may have moved or is no longer available.', 'gateway'); ?></p></div>
  <p><a class="button-primary inline-flex items-center justify-center py-sm px-lg rounded-sm" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Return home', 'gateway'); ?></a></p>
</main>
<?php get_footer(); ?>
