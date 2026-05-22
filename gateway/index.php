<?php
/**
 * Fallback template.
 *
 * @package Gateway
 */
get_header();
?>
<main id="primary" class="site-main gateway-content max-w-screen mx-auto px-lg my-xxl">
  <?php if (have_posts()) : ?>
    <div class="gateway-post-list">
      <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('template-parts/content', get_post_type()); ?>
      <?php endwhile; ?>
    </div>
    <?php the_posts_pagination(); ?>
  <?php else : ?>
    <p><?php esc_html_e('No content found.', 'gateway'); ?></p>
  <?php endif; ?>
</main>
<?php get_footer(); ?>
