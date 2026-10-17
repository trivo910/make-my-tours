# Admin authentication

Use `/admin/login`. Admin routes require an authenticated user with `role=admin`; successful login regenerates the session and failures use a generic credential message. Login is throttled by IP and email. Admin credentials are provisioned through `ADMIN_NAME`, `ADMIN_EMAIL`, and `ADMIN_PASSWORD` in the deployment environment, then `php artisan db:seed --force`; remove the bootstrap password afterward. Password recovery requires working SMTP settings.

Use HTTPS in production, `APP_DEBUG=false`, a unique `APP_KEY`, and secure session cookies. Admins can update profile details at `/admin/profile`.
