<?php
/**
 * Front page template.
 *
 * @package Gateway
 */
get_header();
?>
<main id="primary" class="site-main">
  <?php get_template_part('template-parts/hero'); ?>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php if (trim(get_the_content())) : ?>
      <section class="gateway-page-intro max-w-screen mx-auto px-lg my-xl rte">
        <h1 class="font-heading text-heading-md"><?php the_title(); ?></h1>
        <?php the_content(); ?>
      </section>
    <?php endif; ?>
  <?php endwhile; endif; ?>
  <?php get_template_part('template-parts/section', 'cards'); ?>
  <?php get_template_part('template-parts/section', 'featured'); ?>
  <?php get_template_part('template-parts/section', 'cta'); ?>
</main>
<?php get_footer(); ?>
