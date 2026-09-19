# HUGHES — Hughes SF WordPress Theme

A single-page luxury website for **Hughes SF** (Hughes & Co. Construction), a high-end
residential construction and custom home builder based in San Francisco. The front page
presents the company as a premium general contractor whose craft extends from the
architectural build to the maintenance of the finished home — via a deliberate, prominent
link to **Insight Home Maintenance** (insighthm.com), the firm's maintenance arm.

> ⚠️ This theme is the visual property of Hughes & Co. Construction / Hughes SF and is
> published for client delivery. The copy, photography and brand belong to the client;
> the code is licensed under MIT (see below).

## Preview

Wireframes-style renders of the built page ship in this repo:

- `preview-desktop-top.png`
- `preview-desktop-full.png`
- `preview-mobile-top.png`

## What's inside

```
wp-content/themes/hughes-sf/
├── style.css            Theme header + required metadata
├── functions.php        Theme setup, enqueues, contact data, Customizer, nav
├── header.php           Site header (sticky nav, mobile menu)
├── footer.php           Footer (contact, Insight HM, legal)
├── front-page.php       The complete single-page site (13 sections)
├── index.php            Fallback template (required by WordPress)
├── README.md            Theme-specific install/usage docs
└── assets/
    ├── css/hughes-sf.css   Design system, responsive, reduced-motion
    ├── js/hughes-sf.js     Nav, reveals, capability preview, timeline, parallax
    └── img/                Real project photography (optimized)
```

## Features

- Single-page front-end with 13 sections: hero, intro, capabilities, selected work,
  craftsmanship, build approach timeline, materials, San Francisco, Insight HM,
  about/founder, pull quote, final CTA + contact footer.
- Warm ivory / stone / charcoal editorial design — Cormorant Garamond display serif,
  Inter body. Fully responsive (desktop → mobile) with a reduced-motion mode.
- Scroll reveals with clip-panel mask reveals, capability hover previews, sticky nav,
  mobile menu, lazy-loaded imagery, and an IntersectionObserver-driven reveal system
  (robust to fast scrolling).
- All company contact details live in one place and are editable from the WordPress
  Customizer without touching code.

## Install

1. Copy `wp-content/themes/hughes-sf/` into your WordPress `wp-content/themes/`.
2. In **Appearance → Themes**, activate **Hughes SF**.
3. In **Appearance → Customize → Hughes SF — Contact & Links**, verify company details.
4. (Optional) Assign a menu to the *Primary Navigation* location; a sensible anchor-nav
   fallback is built in.

The full single-page site renders automatically from `front-page.php`; no block-editor
setup or content entry required.

## License

Distributed under the MIT License — see [LICENSE](LICENSE).

The photographs in `assets/img/` and the brand/company content are the property of
Hughes & Co. Construction / Hughes SF and are **not** covered by the MIT license.