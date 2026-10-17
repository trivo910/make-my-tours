# Shared footer

The site-wide footer is defined in `resources/views/components/footer.blade.php` and styled in `public/css/components/footer.css`.

Include it in a page with `@include('components.footer')` and link its stylesheet with Laravel's `asset()` helper. It provides shared company details, navigation, contact information, social links, and a placeholder newsletter form. Footer links return to their relevant homepage sections when selected from another page.
