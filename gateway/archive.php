<?php
/**
 * Archive template.
 *
 * @package Gateway
 */
get_header();
?>
<main id="primary" class="site-main gateway-content max-w-screen mx-auto px-lg my-xxl">
  <header class="archive-header mb-lg">
    <?php the_archive_title('<h1 class="font-heading text-heading-md">', '</h1>'); ?>
    <?php the_archive_description('<div class="archive-description rte">', '</div>'); ?>
  </header>
  <?php if (have_posts()) : ?>
    <div class="gateway-post-grid">
      <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('template-parts/content', 'post'); ?>
      <?php endwhile; ?>
    </div>
    <?php the_posts_pagination(); ?>
  <?php else : ?>
    <p><?php esc_html_e('No posts found.', 'gateway'); ?></p>
  <?php endif; ?>
</main>
<?php get_footer(); ?>
