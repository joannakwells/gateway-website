<?php
/**
 * Page template.
 *
 * @package Gateway
 */
get_header();
?>
<main id="primary" class="site-main gateway-content max-w-screen mx-auto px-lg my-xxl">
  <?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('template-parts/content', 'page'); ?>
  <?php endwhile; ?>
</main>
<?php get_footer(); ?>
