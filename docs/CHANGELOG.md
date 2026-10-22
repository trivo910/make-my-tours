# Changelog

## 2026-10-22 — Blog tablet and mobile responsiveness

- Added a compact, blog-scoped navigation layout with a phone action available from the phone menu.
- Made blog banners, cards, article content, images, code, tables, pagination, and footer controls adapt to tablet and phone widths with readable text and larger tap targets.
- Kept desktop blog styles and non-blog pages outside the responsive overrides.

## 2026-10-22 — Public blog header and hero alignment

- Aligned public blog pages with the shared site header/footer, Heebo and Barlow typography, and the inner-page image banner pattern.
- Added Home > Blog and article breadcrumbs, responsive space for the overlaid header, and the Make My Tours & Travels title suffix; removed the blog-only theme toggle and decorative hero art.
- Kept listing, category, tag, and article content styling within the existing blog stylesheet.

## 2026-10-21 — Blog publishing and display fixes

- Made blog image uploads work without GD/WebP support by storing validated images in their original format when conversion is unavailable.
- Restored public featured-image delivery by creating the missing `public/storage` link to `storage/app/public`; run `php artisan storage:link` after deployment when the link is absent.
- Set the default application timezone to `Asia/Kolkata` (overridable with `APP_TIMEZONE`) so local admin publication times are evaluated correctly; scheduled posts remain hidden until due.
- Fixed the public blog post Blade parse error by preparing BlogPosting structured data in the controller before JSON rendering.
- Added feature coverage for image storage fallback, blog visibility, scheduled posts, and public post structured data.
- Updated the blog SEO operations documentation with the timezone and optional image-conversion requirements.
- Documented deployment checks for preserving static site images, diagnosing public asset URL failures, and identifying legacy WordPress upload paths.

## 2026-10-17 — Public contact page theme alignment

- Rebuilt the public contact page around the website header/footer, image title banner, breadcrumb, and public color and typography styles.
- Replaced the previous Bento presentation with a responsive enquiry form and company details/map layout; kept submission behavior unchanged.
- Added a frontend-styled submit loading state and updated the UI design/contact documentation.

## 2026-10-17 — Module 3

- Added the public contact form with validation, sanitization, honeypot, and request throttling.
- Added persistent admin submissions, filters, read state, CSV export, resend, and notification status/error tracking.
- Added company email notification and optional visitor auto-reply, with database queue and sync compatibility.
- Added automated contact feature coverage and shared-hosting operational documentation.
