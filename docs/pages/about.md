# About page

## Purpose

Recreates the reference About page for Make My Tours & Travels, describing the company's Mumbai bus and tempo traveller rental service.

## Implementation

- Route: `/about` in `routes/web.php`
- Blade view: `resources/views/pages/about.blade.php`
- Page stylesheet: `public/css/pages/about.css`
- Shared header/footer: `resources/views/components/header.blade.php` and `resources/views/components/footer.blade.php`
- Served directly from `public/css/pages/about.css`
- Banner image: `public/images/public-transportation-coach-bus-passenger-e1656574186152.webp`
- Company image: `public/images/bd-explorations-1.png`
- Logos: `public/images/logo-black-scaled.png.png` and `public/images/mmt-footer-logo.png`

## Sections

1. Shared site navigation with an active About link and contact number
2. Dark passenger-coach banner with the About page title
3. Company introduction with AC bus, non-AC bus, and tempo traveller service details
4. Shared site footer with social links, contact details, and newsletter field

## Responsive behavior

The desktop two-column company story and shared full navigation change to a stacked story layout and collapsible navigation on narrow viewports. Shared footer columns reduce to two columns and then stack on small phones.

## Notes

Header links connect Home to `/` and About to `/about`; the service and contact navigation links lead to relevant homepage sections. The newsletter form is a visual placeholder and does not subscribe the visitor to a mailing list.
