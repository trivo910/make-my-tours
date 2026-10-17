# Database

Laravel migrations define admin roles, blog posts/categories/tags/slug redirects, database queues, settings, email logs, and contact submissions. Run `php artisan migrate --force` after deployment. Seed initial blog categories, contact auto-reply defaults, and (when `ADMIN_EMAIL` and `ADMIN_PASSWORD` are set) the first admin using `php artisan db:seed --force`.

Back up the database and `APP_KEY` together. SMTP passwords in `settings.value` are Laravel-encrypted and cannot be recovered if the application key is lost. Contact messages include visitor-provided personal information; limit database access and backups accordingly.
