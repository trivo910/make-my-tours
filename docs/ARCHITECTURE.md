# Architecture

Laravel 11 serves the public Blade pages and the `/admin` panel. Admin routes use Laravel session authentication plus the `admin` middleware; blog content, email settings and contact submissions use Eloquent models and database migrations. SMTP configuration is read from the `settings` table by `EmailConfiguration`, applied to Laravel's mail configuration at runtime, and its password is encrypted with `APP_KEY`.

Contact POSTs validate and normalize input, save the submission first, then dispatch `SendContactEmails`. The job sends the company notification and optionally an auto-reply. `QUEUE_CONNECTION=database` is suitable for shared hosting with a cron worker; `sync` runs delivery in the request. Delivery outcomes are stored on the submission.

See [Routes](ROUTES.md), [Database](DATABASE.md), [Email setup](EMAIL_SETUP.md), and [Contact form](CONTACT_FORM.md).
