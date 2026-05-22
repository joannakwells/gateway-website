<?php
/**
 * Search results template.
 *
 * @package Gateway
 */
get_header();
?>
<main id="primary" class="site-main gateway-content max-w-screen mx-auto px-lg my-xxl">
  <header class="search-header mb-lg">
    <h1 class="font-heading text-heading-md"><?php printf(esc_html__('Search results for: %s', 'gateway'), '<span>' . esc_html(get_search_query()) . '</span>'); ?></h1>
  </header>
  <?php if (have_posts()) : ?>
    <div class="gateway-post-list">
      <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('template-parts/content', get_post_type()); ?>
      <?php endwhile; ?>
    </div>
    <?php the_posts_pagination(); ?>
  <?php else : ?>
    <p><?php esc_html_e('No results found.', 'gateway'); ?></p>
  <?php endif; ?>
</main>
<?php get_footer(); ?>
