# Contact form and submissions

Public form: `GET /contact`, `POST /contact`. It collects name, email, phone, address and message, validates all values server-side, strips markup/control characters and includes a honeypot plus per-IP throttling. Submissions are persisted before notification dispatch. A delivery error does not discard the lead; it is shown in admin with a failed status and can be retried.

Admins can review/filter submissions at `/admin/contacts`, mark records read/unread, export matching rows as CSV, resend notification, and delete one or many submissions. Opening a record marks it read. Email status and any transport error are saved with the record. Optional visitor confirmation is controlled by the **Contact auto-reply** switch under Email settings.

For `QUEUE_CONNECTION=database`, schedule a cron entry to execute `php artisan queue:work --stop-when-empty --max-time=50` every minute from the Laravel application directory. Use `QUEUE_CONNECTION=sync` when a cron worker is unavailable; delivery then occurs during the form request. See [Deployment](DEPLOYMENT.md).
