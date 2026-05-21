# David Austin Roses Public Site Clone

This folder now prioritizes an exact public clone of the live homepage at `https://www.davidaustinroses.com`, with the captured HTML split into editable source partials.

## Files

- `index.html` - generated rendered HTML for the homepage.
- `src/` - editable source partials split by layout, header, homepage sections, footer, overlays and settings.
- `tools/build-site.mjs` - rebuilds `index.html` from `src/`.
- `tools/extract-editable-site.mjs` - re-splits the current `index.html` into editable `src/` files.
- `rebuild-draft/` - the editable static rebuild created before the request changed to an exact clone.

## Important Recovery Notes

The public website can expose rendered HTML, CSS, JavaScript references and CDN image assets. It cannot expose the private Shopify theme source, Liquid templates, admin settings, checkout code, app secrets, customer/order data, or unpublished theme assets.

To fully recover the original codebase, export the live Shopify theme from Shopify Admin if you still have store access:

1. Go to **Online Store > Themes**.
2. Open the actions menu for the live theme.
3. Choose **Download theme file**.
4. Save the zip in this project folder.

## Run Locally

```sh
python3 -m http.server 4173
```

Then open `http://localhost:4173`.

## Edit The Site

Edit the files inside `src/`, then rebuild:

```sh
node tools/build-site.mjs
```

Most homepage content is in `src/sections/home/`. For example, the first hero is `src/sections/home/01-hero.html`, and the product carousel area is `src/sections/home/06-featured-products.html`.

## Clone Blog Pages

The homepage links to local blog routes under `blogs/`. To refresh the cloned blog pages from the live site:

```sh
node tools/clone-blog-pages.mjs
```

Each cloned route is saved as an `index.html` file in the matching folder, for example `blogs/rose-care/how-to-water-a-rose/index.html`.
