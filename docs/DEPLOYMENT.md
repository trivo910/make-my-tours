# Deployment (shared hosting)

Use PHP 8.2+, MySQL, Composer dependencies, and a production `.env` with `APP_ENV=production`, `APP_DEBUG=false`, HTTPS `APP_URL`, secure session cookies, database connection credentials, and a stable random `APP_KEY`. Keep `.env`, storage, and backups private. Run `composer install --no-dev --optimize-autoloader`, `php artisan migrate --force`, `php artisan db:seed --force`, `php artisan storage:link`, and `php artisan config:cache`; make `storage` and `bootstrap/cache` writable by the PHP account. Build frontend assets before upload with `npm ci && npm run build`.

For database queues, set `QUEUE_CONNECTION=database` and configure the hosting panel cron to run once per minute:

```sh
cd /home/ACCOUNT/path/to/app && php artisan queue:work --stop-when-empty --max-time=50
```

This exits after processing currently available jobs and needs no Supervisor or Redis. If cron workers are unavailable, set `QUEUE_CONNECTION=sync`; email delivery runs inline and can increase form response time. Ensure outbound SMTP is allowed by the host. After changing environment configuration, clear/rebuild config cache. Back up `APP_KEY` together with the database.
