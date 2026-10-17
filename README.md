# Make My Tours & Travels

Laravel recreation of the Make My Tours & Travels homepage. The home page uses its own Blade view and stylesheet; page-specific implementation notes are in [`docs/pages/home.md`](docs/pages/home.md).

## Requirements

- PHP 8.2+
- Composer
- Node.js and npm

## Run locally

```bash
composer install
npm install
php artisan serve
```

In a second terminal, build the frontend once or keep Vite running during development:

```bash
npm run build
# or
npm run dev
```

Open `http://127.0.0.1:8000`.

## Admin access (Module 0)

The admin panel is available at `/admin/login`. Before creating the first admin, set `ADMIN_NAME`, `ADMIN_EMAIL`, and a strong `ADMIN_PASSWORD` in `.env`. Then run:

```bash
php artisan migrate --force
php artisan db:seed --force
```

The seeder creates or updates the account matching `ADMIN_EMAIL`; it does not install a sample account or password. Clear `ADMIN_PASSWORD` from the deployment environment after seeding. Authenticated admin routes use session authentication and the `admin` role, and login attempts are limited to five per minute by IP and email. Production session cookies default to Secure; set `SESSION_SECURE_COOKIE=true` explicitly when HTTPS is enabled behind a proxy. Password recovery uses Laravel's configured mailer. Configure SMTP before using it; with the default `MAIL_MAILER=log`, the recovery page explains that delivery is not available.

The admin shell and login screens use the responsive Bento card layout. The dashboard includes live blog totals, email status, unread contacts, recent enquiries, and quick actions. Admin panel credentials and route behavior are documented in [AUTH](docs/AUTH.md), while layout rules are in [UI design](docs/UI_DESIGN.md).

## Blog management (Module 1)

Run the migrations, then create the public storage link so featured and editor images can be served:

```bash
php artisan migrate --force
php artisan storage:link
```

Blog image uploads accept JPEG, PNG, and WebP up to 5 MB and are resized to at most 1600×1200 WebP. Enable PHP GD with WebP support and Fileinfo on the host. Admin tools are at `/admin/blog`; public stories are at `/blog`. Posts are visible only after their status is `published` and their publish time has arrived. Category changes to a post slug keep the previous slug for a permanent redirect.

## Email configuration (Module 2)

After migrations, open **Admin → Email settings** to enter SMTP host, port, encryption, sender, and company notification details. Settings are stored in the database; the SMTP password is encrypted with `APP_KEY`, so back up that key and leave the password field empty when you do not need to change it. Use the test card to send a real test message and review the result and delivery log. Configure a valid SMTP server before expecting password reset emails or contact notifications to deliver.

### Shared hosting queues

The application can use `QUEUE_CONNECTION=database`; the jobs table migration is already included, so run `php artisan migrate --force`. On Hostinger, configure a cron job to run `cd /path/to/app && php artisan queue:work --stop-when-empty --max-time=50` every minute. Use `QUEUE_CONNECTION=sync` as a fallback when cron workers are unavailable; queued work then runs during the web request.

## Contact form and submissions (Module 3)

The public Bento contact form is at `/contact`; admin submissions, status filters, read/unread controls, CSV export, and resend are at `/admin/contacts`. Configure the company notification address under **Admin → Email settings**. Leads are stored before notification is attempted, so mail failures remain visible for retry. Visitor auto-replies are optional. See [Contact form](docs/CONTACT_FORM.md) and [Deployment](docs/DEPLOYMENT.md).

## Project documentation

Architecture, routes, database, authentication, blog SEO, email, contact, deployment, testing, UI design, and release notes are documented in the [`docs/`](docs/) directory.

## Page files

| Page | Route | Blade view | Stylesheet | Notes |
| --- | --- | --- | --- | --- |
| Home | `/` | `resources/views/pages/home.blade.php` | `public/css/pages/home.css` | [`docs/pages/home.md`](docs/pages/home.md) |
| About | `/about` | `resources/views/pages/about.blade.php` | `public/css/pages/about.css` | [`docs/pages/about.md`](docs/pages/about.md) |
| Tempo Traveller Hire | `/tempo-traveller-hire` | `resources/views/pages/tempo-traveller-hire.blade.php` | `public/css/pages/tempo-traveller-hire.css` | [`docs/pages/tempo-traveller-hire.md`](docs/pages/tempo-traveller-hire.md) |

The shared header and footer components live in `resources/views/components/header.blade.php` and `resources/views/components/footer.blade.php`, with stylesheets in `public/css/components/`. Include both components and link both component stylesheets from each page using Laravel's `asset()` helper. The header and footer also use the Barlow and Heebo web fonts. Shared CSS reset styles are in `public/css/app.css`; JavaScript remains in `resources/js/app.js`.

## Shared components

| Component | Blade view | Stylesheet | Notes |
| --- | --- | --- | --- |
| Header | `resources/views/components/header.blade.php` | `public/css/components/header.css` | [`docs/components/header.md`](docs/components/header.md) |
| Footer | `resources/views/components/footer.blade.php` | `public/css/components/footer.css` | [`docs/components/footer.md`](docs/components/footer.md) |

## Homepage assets

Homepage photos and logos are stored locally in `public/images/` so the page does not depend on hot-linked image URLs.
