import { mkdir, readFile, rm, writeFile } from "node:fs/promises";
import { dirname, join } from "node:path";
import { fileURLToPath } from "node:url";

const root = fileURLToPath(new URL("..", import.meta.url));
const html = await readFile(join(root, "index.html"), "utf8");

const boundaries = [
  ["src/layout/document-start.html", "<!-- BEGIN sections: header-group -->"],
  ["src/sections/header-group.html", "<!-- END sections: header-group -->"],
  ["src/layout/main-start.html", '<div id="shopify-section-template--18133014151247__hero_FgpfE8" class="shopify-section">'],
  ["src/sections/home/01-hero.html", '<div id="shopify-section-template--18133014151247__collection_grid_i7rwxH" class="shopify-section">'],
  ["src/sections/home/02-collection-grid.html", '<div id="shopify-section-template--18133014151247__spacer_QGNhHC" class="shopify-section">'],
  ["src/sections/home/03-spacer-top.html", '<div id="shopify-section-template--18133014151247__text_side_by_side_cwndtp" class="shopify-section">'],
  ["src/sections/home/04-text-side-by-side.html", '<div id="shopify-section-template--18133014151247__spotlight_KLVXBQ" class="shopify-section">'],
  ["src/sections/home/05-spotlight.html", '<div id="shopify-section-template--18133014151247__featured_products_qgfBEG" class="shopify-section">'],
  ["src/sections/home/06-featured-products.html", '<div id="shopify-section-template--18133014151247__colour_zwXU8C" class="shopify-section">'],
  ["src/sections/home/07-colour-shop-scene.html", '<div id="shopify-section-template--18133014151247__location_qr8X89" class="shopify-section">'],
  ["src/sections/home/08-location.html", '<div id="shopify-section-template--18133014151247__featured_articles_large_FEccBx" class="shopify-section">'],
  ["src/sections/home/09-featured-articles-large.html", '<div id="shopify-section-template--18133014151247__hero_7Lcd4N" class="shopify-section">'],
  ["src/sections/home/10-secondary-hero.html", '<div id="shopify-section-template--18133014151247__illustration_Ra6t8J" class="shopify-section">'],
  ["src/sections/home/11-newsletter-illustration.html", '<div id="shopify-section-template--18133014151247__featured_slider_N6nWdj" class="shopify-section">'],
  ["src/sections/home/12-featured-slider.html", '<div id="shopify-section-template--18133014151247__message_bar_Mg8tRJ" class="shopify-section">'],
  ["src/sections/home/13-message-bar.html", '<div id="shopify-section-template--18133014151247__featured_articles_mG4DUb" class="shopify-section">'],
  ["src/sections/home/14-featured-articles.html", '<div id="shopify-section-template--18133014151247__spacer_NVUbJh" class="shopify-section">'],
  ["src/sections/home/15-spacer-bottom.html", '<div id="shopify-section-template--18133014151247__hero_kmdNQn" class="shopify-section">'],
  ["src/sections/home/16-final-hero.html", '<div id="shopify-section-template--18133014151247__spacer_R87L66" class="shopify-section">'],
  ["src/sections/home/17-final-spacer.html", "<!-- BEGIN sections: footer-group -->"],
  ["src/layout/main-end.html", '<footer id="shopify-section-sections--18133008646223__footer" class="shopify-section shopify-section-group-footer-group relative z-20">'],
  ["src/sections/footer-group.html", "<!-- END sections: footer-group -->"],
  ["src/sections/overlay-group.html", "<!-- END sections: overlay-group -->"],
  ["src/sections/settings-group.html", "<!-- END sections: settings-group -->"],
  ["src/layout/document-end.html", null]
];

let cursor = 0;
const pieces = [];

for (const [file, marker] of boundaries) {
  if (marker === null) {
    pieces.push([file, html.slice(cursor)]);
    break;
  }

  const index = html.indexOf(marker, cursor);
  if (index === -1) {
    throw new Error(`Could not find marker for ${file}: ${marker}`);
  }

  pieces.push([file, html.slice(cursor, index)]);
  cursor = index;
}

await rm(join(root, "src"), { recursive: true, force: true });

for (const [file, content] of pieces) {
  const absolutePath = join(root, file);
  await mkdir(dirname(absolutePath), { recursive: true });
  await writeFile(absolutePath, content, "utf8");
}

console.log(`Extracted ${pieces.length} editable files into src/.`);
