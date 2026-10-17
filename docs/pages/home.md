# Home page

## Purpose

The homepage recreates the supplied Make My Tours & Travels reference, including its Mumbai-focused travel booking hero, service and fleet highlights, customer testimonials, blog teaser, and contact footer.

## Implementation

- Route: `/` in `routes/web.php`
- Blade view: `resources/views/pages/home.blade.php`
- Page stylesheet: `public/css/pages/home.css`
- Shared header: `resources/views/components/header.blade.php`
- Shared footer: `resources/views/components/footer.blade.php`
- Served directly from `public/css/pages/home.css`
- Images: local copies in `public/images/`

The stylesheet owns the homepage layout, colors, typography, image treatments, breakpoints, and reduced-motion behavior. The shared stylesheet remains a separate Vite entry.
The homepage navigation links to the dedicated [About page](./about.md).
The site-wide [header](../components/header.md) and [footer](../components/footer.md) are shared across every page.

## Sections

1. Header and hero with navigation, call-to-action, and video link
2. Route/date/seat search form
3. About Mumbai Explorations and years-of-experience badge
4. Why choose us feature with company statistics
5. Travel services cards
6. Booking journey banner
7. Bus and tempo fleet cards
8. Customer testimonials
9. Blog preview
10. Contact details, quick links, and newsletter form

## Responsive behavior

Desktop navigation changes to a disclosure menu on tablet and mobile widths. Booking fields, service cards, fleet vehicles, testimonials, and footer columns collapse into smaller grids as the viewport narrows. Links and booking calls-to-action scroll to their corresponding homepage sections.

## Notes

The booking and newsletter forms are presentation-only and submit back to `/`; no booking, payment, or mailing-list backend is configured. Fleet prices and website copy follow the provided reference. Update this document alongside any structural or interaction changes to the homepage.
