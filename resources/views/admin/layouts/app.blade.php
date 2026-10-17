<!doctype html>
<html lang="en" data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') · {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <script>
        (() => { const saved = localStorage.getItem('admin-theme'); document.documentElement.dataset.theme = saved || (matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'); })();
    </script>
</head>
<body class="admin-body">
    <div class="admin-shell">
        <aside class="sidebar">
            <a class="brand" href="{{ route('admin.dashboard') }}"><span class="brand-mark">M</span><span>Make My Tours<small>CONTROL ROOM</small></span></a>
            <div class="nav-label">WORKSPACE</div>
            <nav class="side-nav" aria-label="Admin navigation">
                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}"><span>▦</span> Overview</a>
                <a class="nav-link {{ request()->routeIs('admin.blog*') || request()->routeIs('admin.blog-categories*') ? 'active' : '' }}" href="{{ route('admin.blog.index') }}"><span>✎</span> Blog</a>
                <a class="nav-link {{ request()->routeIs('admin.settings.email*') ? 'active' : '' }}" href="{{ route('admin.settings.email.edit') }}"><span>✉</span> Email settings</a>
                <a class="nav-link {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}" href="{{ route('admin.contacts.index') }}"><span>◉</span> Contacts @if($unreadContacts)<small class="nav-badge">{{ $unreadContacts > 99 ? '99+' : $unreadContacts }}</small>@endif</a>
            </nav>
            <div class="sidebar-bottom"><div class="security-note"><span class="status-dot"></span><div><strong>Admin access</strong><small>Protected session</small></div></div></div>
        </aside>
        <main class="admin-main">
            <header class="topbar"><div><span class="eyebrow">MAKE MY TOURS &amp; TRAVELS</span><span class="mobile-brand">Control room</span></div><div class="top-actions"><button class="icon-button" type="button" data-theme-toggle aria-label="Toggle color theme" title="Toggle theme">◐</button><a class="profile-chip" href="{{ route('admin.profile.edit') }}"><span class="avatar">{{ mb_substr(auth()->user()->name, 0, 1) }}</span><span class="profile-name">{{ auth()->user()->name }}</span><span aria-hidden="true">⌄</span></a><form action="{{ route('admin.logout') }}" method="post">@csrf<button class="logout-button" type="submit">Sign out</button></form></div></header>
            <div class="page-content">
                @if (session('status')) <div class="toast toast-success" role="status">{{ session('status') }}</div> @endif
                @yield('content')
            </div>
        </main>
    </div>
    <script src="{{ asset('js/admin.js') }}" defer></script>
</body>
</html>
