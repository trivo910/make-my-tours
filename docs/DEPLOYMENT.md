# Deployment (shared hosting)

Use PHP 8.2+, MySQL, Composer dependencies, and a production `.env` with `APP_ENV=production`, `APP_DEBUG=false`, HTTPS `APP_URL` set to the public site origin, secure session cookies, database connection credentials, and a stable random `APP_KEY`. Keep `.env`, storage, and backups private. Configure the web server document root to the Laravel `public/` directory. Upload the complete `public/images/`, `public/css/`, `public/js/`, and `public/build/` directories from the same release as the application; these contain the site's static images and stylesheets. Do not replace `public/images/` with the `public/storage` link: that link is only for user-uploaded files and should point to `storage/app/public/`. Run `composer install --no-dev --optimize-autoloader`, `php artisan migrate --force`, `php artisan db:seed --force`, `php artisan storage:link`, and `php artisan config:cache`; make `storage` and `bootstrap/cache` writable by the PHP account. Build frontend assets before upload with `npm ci && npm run build`.

After deployment, check a known image directly at `https://YOUR_DOMAIN/images/mt-banner-image-scaled.png` and confirm it returns HTTP 200 with an image content type. If the site is installed under a URL subdirectory instead of the domain root, verify that generated asset URLs include that prefix; some page styles use root-relative `/images/...` paths and require the site to be served from the domain root. A failed image request should be diagnosed using its exact URL and HTTP status before changing storage links or deleting/replacing public files.

This Laravel release uses `/images/...` for bundled site artwork; `/wp-content/uploads/...` is a legacy WordPress path and is not provided by this application. Update any stale page/content references to the current `/images/...` files or restore the original WordPress uploads from backup. Also verify that every image referenced by a page exists in the uploaded release: files inside `public/images/` are independent of the `public/storage` link used for blog uploads.

For database queues, set `QUEUE_CONNECTION=database` and configure the hosting panel cron to run once per minute:

```sh
cd /home/ACCOUNT/path/to/app && php artisan queue:work --stop-when-empty --max-time=50
```

This exits after processing currently available jobs and needs no Supervisor or Redis. If cron workers are unavailable, set `QUEUE_CONNECTION=sync`; email delivery runs inline and can increase form response time. Ensure outbound SMTP is allowed by the host. After changing environment configuration, clear/rebuild config cache. Back up `APP_KEY` together with the database.
