<?php
/**
 * Post content.
 *
 * @package Gateway
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('gateway-post rte'); ?>>
  <header class="entry-header mb-lg">
    <div class="entry-meta text-sm mb-sm">
      <?php gateway_posted_on(); ?> <span aria-hidden="true">/</span> <?php gateway_post_categories(); ?>
    </div>
    <h1 class="entry-title font-heading text-heading-md"><?php the_title(); ?></h1>
    <?php if (! is_singular()) : ?>
      <div class="entry-summary text-xl mt-sm"><?php the_excerpt(); ?></div>
    <?php endif; ?>
    <?php if (has_post_thumbnail()) : ?>
      <a class="entry-featured-image block my-lg" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('gateway-card'); ?></a>
    <?php endif; ?>
  </header>
  <div class="entry-content">
    <?php if (is_singular()) : ?>
      <?php the_content(); ?>
      <?php wp_link_pages(); ?>
    <?php else : ?>
      <p><a class="underline" href="<?php the_permalink(); ?>"><?php esc_html_e('Read more', 'gateway'); ?></a></p>
    <?php endif; ?>
  </div>
</article>
