# Changelog

## 2026-10-21 — Blog publishing and display fixes

- Made blog image uploads work without GD/WebP support by storing validated images in their original format when conversion is unavailable.
- Set the default application timezone to `Asia/Kolkata` (overridable with `APP_TIMEZONE`) so local admin publication times are evaluated correctly; scheduled posts remain hidden until due.
- Fixed the public blog post Blade parse error by preparing BlogPosting structured data in the controller before JSON rendering.
- Added feature coverage for image storage fallback, blog visibility, scheduled posts, and public post structured data.
- Updated the blog SEO operations documentation with the timezone and optional image-conversion requirements.

## 2026-10-17 — Public contact page theme alignment

- Rebuilt the public contact page around the website header/footer, image title banner, breadcrumb, and public color and typography styles.
- Replaced the previous Bento presentation with a responsive enquiry form and company details/map layout; kept submission behavior unchanged.
- Added a frontend-styled submit loading state and updated the UI design/contact documentation.

## 2026-10-17 — Module 3

- Added the public contact form with validation, sanitization, honeypot, and request throttling.
- Added persistent admin submissions, filters, read state, CSV export, resend, and notification status/error tracking.
- Added company email notification and optional visitor auto-reply, with database queue and sync compatibility.
- Added automated contact feature coverage and shared-hosting operational documentation.
