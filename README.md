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
