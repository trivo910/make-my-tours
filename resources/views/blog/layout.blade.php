<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $seoTitle ?? 'Travel stories' }} | Make My Tours &amp; Travels</title>
    <meta name="description" content="{{ $seoDescription ?? '' }}">
    @yield('seo')
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800&family=Heebo:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"><link rel="stylesheet" href="{{ asset('css/components/header.css') }}"><link rel="stylesheet" href="{{ asset('css/components/footer.css') }}"><link rel="stylesheet" href="{{ asset('css/blog.css') }}">
</head>
<body class="blog-body">
    @include('components.header')
    <main class="blog-main @yield('main-class')">@yield('content')</main>
    @include('components.footer')
</body>
</html>
