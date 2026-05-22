<?php
/**
 * Page content.
 *
 * @package Gateway
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('gateway-page rte'); ?>>
  <header class="entry-header mb-lg">
    <h1 class="entry-title font-heading text-heading-md"><?php the_title(); ?></h1>
    <?php if (has_post_thumbnail()) : ?>
      <div class="entry-featured-image my-lg"><?php the_post_thumbnail('gateway-hero'); ?></div>
    <?php endif; ?>
  </header>
  <div class="entry-content">
    <?php the_content(); ?>
    <?php wp_link_pages(); ?>
  </div>
</article>
