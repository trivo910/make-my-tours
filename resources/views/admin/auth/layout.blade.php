<!doctype html>
<html lang="en" data-theme="light">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin access') · {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <script>(()=>{const s=localStorage.getItem('admin-theme');document.documentElement.dataset.theme=s||(matchMedia('(prefers-color-scheme: dark)').matches?'dark':'light')})();</script>
</head>
<body class="auth-body">
    <button class="auth-theme icon-button" type="button" data-theme-toggle aria-label="Toggle color theme">◐</button>
    <main class="auth-grid">
        <section class="auth-card auth-form-card">@yield('content')</section>
        <aside class="auth-card auth-brand-card"><a class="brand brand-light" href="{{ url('/') }}"><span class="brand-mark">M</span><span>Make My Tours<small>CONTROL ROOM</small></span></a><div class="brand-message"><span class="eyebrow">YOUR BUSINESS, AT A GLANCE</span><h2>Make every visit<br>count.</h2><p>A quiet space to publish useful travel guides, keep enquiries moving, and grow your search presence.</p></div><div class="brand-feature"><span class="feature-icon">✦</span><div><strong>Built for discoverability</strong><small>One home for the tools behind your next great journey.</small></div></div><div class="brand-footer">MAKE MY TOURS &amp; TRAVELS <span>·</span> MUMBAI, INDIA</div><span class="decor decor-one"></span><span class="decor decor-two"></span></aside>
    </main>
    <script src="{{ asset('js/admin.js') }}" defer></script>
</body>
</html>
