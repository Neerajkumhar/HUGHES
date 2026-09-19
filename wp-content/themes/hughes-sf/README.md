# Hughes SF — WordPress Theme

A single-page luxury website for **Hughes SF** (Hughes & Co. Construction), a high-end
residential construction and custom home builder based in San Francisco. The front page
presents the company as a premium general contractor whose craft extends from the
architectural build to the maintenance of the finished home — by way of a deliberate,
prominent link to **Insight Home Maintenance** (insighthm.com), the firm's maintenance
arm.

The design uses a warm ivory/stone/charcoal palette, Cormorant Garamond display serif with
Inter body text, real project photography, clip-path image reveals, a capability list with
hover image previews, a horizontal build timeline, and a light-on-dark Insight/CTA section.

## Installation

1. Copy `wp-content/themes/hughes-sf/` into your WordPress install's
   `wp-content/themes/` directory.
2. In **Appearance → Themes**, activate **Hughes SF**.
3. (Optional) In **Appearance → Customize → Hughes SF — Contact & Links**, verify or
   override the company contact details and links. Sensible defaults are already baked in.
4. (Optional) Create a menu in **Appearance → Menus** and assign it to the
   *Primary Navigation* location. If no menu is assigned, the header falls back to
   built-in anchor links pointing at the on-page sections.
5. (Optional) Set a static front page in **Settings → Reading** for best results.
   Not required — `front-page.php` renders the full landing page regardless — but
   recommended so the single-page site is explicitly the front page.

The landing page lives entirely in `front-page.php`; the theme works as a classic
(templates-based) theme, so no block editor setup is needed.

## Contact & link defaults (verified)

Verified from hughessf.com (Hughes & Co. Construction, via Squarespace) and insighthm.com.
Overridable in the Customizer without touching code.

| Field | Default |
|---|---|
| Email | david@hughessf.com |
| Phone | 415-463-5069 |
| Office | 180 Harbor Drive, Suite 202, Sausalito, CA 94965 |
| Insight HM | https://insighthm.com · david@insighthm.com · 415-559-2967 |

## Structure

```
wp-content/themes/hughes-sf/
├── style.css            Theme header + required metadata
├── functions.php        Theme setup, enqueues, contact data, Customizer, nav
├── header.php           Site header (sticky nav, mobile menu)
├── footer.php           Footer (contact, Insight HM, legal)
├── front-page.php       The complete single-page site (13 sections)
├── index.php            Fallback template (required by WordPress)
├── assets/
│   ├── css/hughes-sf.css   Design system, responsive, reduced-motion
│   ├── js/hughes-sf.js     Nav, reveals, capability preview, timeline, parallax
│   └── img/               Real project photography (optimized)
```

## Front-page sections

`hero` · `intro` · `capabilities` · `work` · `craft` · `process` · `materials` ·
`sf` · `insight` · `about` · `voice` · `contact`

## Verified against the live site before build

- Company facts, projects, phone/email/address and the founder quote were taken from the
  existing hughessf.com presence and cross-checked with insighthm.com.
- All project photography is real imagery from the firm's project galleries
  (Washington St 3867 · Belgrave · Atherton · Chroma SF · San Francisco portfolio).
- No testimonials are fabricated: the single pull-quote is a verified David Hughes quote.

## Local smoke-test environment (used during development)

- `docker run` WordPress 6 + PHP 8.2 (Apache) + MariaDB, theme activated via WP-CLI:
  - App: http://localhost:8080
  - Admin: http://localhost:8080/wp-admin (admin / admin — throwaway local credentials)
- Verified with headless Chrome: zero JS errors, all 13 sections render, every image
  loads, capability hover previews work, sticky nav + mobile menu work, no horizontal
  overflow at 1440px or 390px, all scroll reveals trigger, and lazy loading is applied
  to all non-hero images.