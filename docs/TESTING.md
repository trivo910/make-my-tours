# Testing and manual review

Run feature and unit coverage with `php artisan test`. Tests use in-memory SQLite, array mail, and synchronous queues.

Manual contact review: open `/contact`; submit invalid and valid values; confirm success/error feedback; verify the valid lead appears at `/admin/contacts`; inspect its visitor details and email delivery status; exercise read/unread, filtering, CSV export, resend, and deletion. In Email settings save valid SMTP, send a test, then verify the log. With an intentionally invalid endpoint, confirm an error is shown and the contact remains saved as failed; restore valid settings before production use.
