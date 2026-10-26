# Database

Laravel migrations define admin roles, blog posts/categories/tags/slug redirects, database queues, settings, email logs, contact submissions, and booking enquiries. Run `php artisan migrate --force` after deployment. Seed initial blog categories, contact auto-reply defaults, and (when `ADMIN_EMAIL` and `ADMIN_PASSWORD` are set) the first admin using `php artisan db:seed --force`.

`booking_enquiries` stores the traveller name and phone, optional email, origin/destination, travel date and time slot, requested seats and optional vehicle, status (`new`, `contacted`, `confirmed`, `cancelled`), email delivery status/error, IP address, user agent, and timestamps. Contact messages and booking enquiries include visitor-provided personal information; limit database access and backups accordingly. The booking locations are configured in `config/booking.php`.

Back up the database and `APP_KEY` together. SMTP passwords in `settings.value` are Laravel-encrypted and cannot be recovered if the application key is lost.
