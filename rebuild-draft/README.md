# David Austin Roses Website Rebuild

This is a clean static rebuild of the public-facing David Austin Roses homepage experience.

## What is included

- `index.html` - page structure and content sections
- `styles.css` - responsive visual system and layout
- `app.js` - product data, filters, cart counter and newsletter demo behavior

The page uses public image assets from `www.davidaustinroses.com` so it can be rebuilt quickly without a local asset archive.

## Run locally

Open `index.html` in a browser, or serve the folder with any static server:

```sh
python3 -m http.server 4173
```

Then visit `http://localhost:4173`.

## Suggested next recovery steps

1. Rebuild product and collection pages from Shopify data exports or the Storefront API.
2. Download critical image assets into `assets/` so the site does not depend on remote URLs.
3. Add ecommerce integration: Shopify Buy Button, Storefront API, Hydrogen, or the original Shopify theme setup.
4. Put this folder under Git and push it to GitHub immediately.
