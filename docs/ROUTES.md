# Routes

| Method | Path | Purpose | Access |
| --- | --- | --- | --- |
| GET | `/contact` | Public contact form | Public |
| POST | `/contact` | Validate, store and notify | Public, throttled |
| GET | `/blog` and `/blog/{slug}` | Public blog listing/detail | Public |
| GET | `/blog/category/{slug}`, `/blog/tag/{slug}` | Blog taxonomy | Public |
| GET | `/sitemap.xml` | Sitemap | Public |
| GET/POST | `/admin/login` | Admin sign in | Guest |
| GET/POST | `/admin/forgot-password` | Password recovery request | Guest |
| GET/POST | `/admin/settings/email` | SMTP settings and test | Admin |
| GET | `/admin/contacts` | Submissions list and filters | Admin |
| GET | `/admin/contacts/export` | Filtered CSV export | Admin |
| GET | `/admin/contacts/{submission}` | Submission detail | Admin |

The full current route names and methods are available with `php artisan route:list`.
