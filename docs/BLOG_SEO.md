# Blog and SEO

Manage posts and categories at `/admin/blog` and `/admin/blog-categories`. Public listing, category, tag, post and sitemap routes expose only published content whose `published_at` is due. Slug history supports permanent redirects. Post metadata and structured data are rendered by the public blog views. Blog media is stored on the public disk; after deployment run `php artisan storage:link` and ensure the host has GD/WebP and Fileinfo support.
