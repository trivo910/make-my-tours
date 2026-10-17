<!doctype html>
<html lang="en" data-theme="light">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $seoTitle ?? config('app.name') }} · {{ config('app.name') }}</title>
    <meta name="description" content="{{ $seoDescription ?? '' }}">
    @yield('seo')
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/components/header.css') }}"><link rel="stylesheet" href="{{ asset('css/components/footer.css') }}"><link rel="stylesheet" href="{{ asset('css/blog.css') }}">
    <script>(()=>{const s=localStorage.getItem('admin-theme');document.documentElement.dataset.theme=s||(matchMedia('(prefers-color-scheme: dark)').matches?'dark':'light')})();</script>
</head>
<body class="blog-body">
    <div class="blog-site-header">@include('components.header')<button class="blog-theme-toggle" type="button" data-blog-theme aria-label="Toggle color theme">◐</button></div>
    <main class="blog-main">@yield('content')</main>
    @include('components.footer')
    <script>document.querySelector('[data-blog-theme]').addEventListener('click',()=>{const t=document.documentElement.dataset.theme==='dark'?'light':'dark';document.documentElement.dataset.theme=t;localStorage.setItem('admin-theme',t)})</script>
</body>
</html>
