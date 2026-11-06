# Alif Visa website (Next.js, headless WordPress)

Public website redesigned to match the Alif Visa letterhead: white paper,
deep ink, one emerald accent, hairline rules and the paper-plane flight path.

WordPress stays the back end. Posts are read from the WordPress REST API;
accounts, the guided apply form, WooCommerce orders and Stripe payments keep
running on WordPress and are proxied through this app (see next.config.mjs).

## Run

    cp .env.example .env.local   # set WP_API_URL and WP_SITE_URL
    npm install
    npm run dev                  # http://localhost:3000
    npm run build && npm start   # production

Without WP_API_URL the site uses data/posts.snapshot.json, so every template
can be reviewed offline. `npm run export` writes a static copy to out/.

## Structure

- app/          routes: home, /countries, /visa, /visa/search, /services,
                /blog, /[slug] (WordPress posts at their existing URLs),
                /about, /contact, /track-application, /faq, /apply
- components/   header, footer, search card, shared UI
- data/         destinations, visa routes, services, FAQs, site details
- lib/wp.ts     WordPress REST client with snapshot fallback
- app/globals.css  the design system (tokens at the top)
