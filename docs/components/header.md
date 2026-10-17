# Shared header

The site-wide header is defined in `resources/views/components/header.blade.php` and styled in `public/css/components/header.css`.

Include it in a page with `@include('components.header')` and link its stylesheet with Laravel's `asset()` helper. It provides responsive navigation and a phone link shared across the site. Load the Barlow and Heebo web fonts used by the component in every page's document head. The current page receives its active navigation state from the request path. The FAQ’s menu item links to the dedicated `/faqs` page.
