import { readFile, writeFile } from "node:fs/promises";
import { join } from "node:path";
import { fileURLToPath } from "node:url";

const root = fileURLToPath(new URL("..", import.meta.url));

const files = [
  "src/layout/document-start.html",
  "src/sections/header-group.html",
  "src/layout/main-start.html",
  "src/sections/home/01-hero.html",
  "src/sections/home/02-collection-grid.html",
  "src/sections/home/03-spacer-top.html",
  "src/sections/home/04-text-side-by-side.html",
  "src/sections/home/05-spotlight.html",
  "src/sections/home/06-featured-products.html",
  "src/sections/home/07-colour-shop-scene.html",
  "src/sections/home/08-location.html",
  "src/sections/home/09-featured-articles-large.html",
  "src/sections/home/10-secondary-hero.html",
  "src/sections/home/11-newsletter-illustration.html",
  "src/sections/home/12-featured-slider.html",
  "src/sections/home/13-message-bar.html",
  "src/sections/home/14-featured-articles.html",
  "src/sections/home/15-spacer-bottom.html",
  "src/sections/home/16-final-hero.html",
  "src/sections/home/17-final-spacer.html",
  "src/layout/main-end.html",
  "src/sections/footer-group.html",
  "src/sections/overlay-group.html",
  "src/sections/settings-group.html",
  "src/layout/document-end.html"
];

const html = (
  await Promise.all(files.map((file) => readFile(join(root, file), "utf8")))
).join("");

await writeFile(join(root, "index.html"), html, "utf8");
console.log(`Built index.html from ${files.length} source files.`);
