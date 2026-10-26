<header class="site-header">
    <a class="brand" href="{{ url('/') }}" aria-label="Make My Tours and Travels home">
        <img src="{{ asset('images/Make My Tours & Travels Logo.webp') }}" alt="Make My Tours &amp; Travels">
    </a>
    <nav class="desktop-nav" aria-label="Main navigation">
        <a class="{{ request()->path() === '/' ? 'active' : '' }}" href="{{ url('/') }}" @if (request()->path() === '/') aria-current="page" @endif>Home</a>
        <a class="{{ request()->is('about') ? 'active' : '' }}" href="{{ url('/about') }}" @if (request()->is('about')) aria-current="page" @endif>About</a>
        <div class="nav-dropdown">
            <a class="nav-trigger" href="{{ url('/#services') }}" aria-haspopup="true">Our Standards <span aria-hidden="true">▾</span></a>
            <div class="sub-menu" aria-label="Our Standards menu">
                <a class="{{ request()->is('bus-hire') ? 'active' : '' }}" href="{{ url('/bus-hire') }}" @if (request()->is('bus-hire')) aria-current="page" @endif>Bus Hire</a>
                <a class="{{ request()->is('urbania') ? 'active' : '' }}" href="{{ url('/urbania') }}" @if (request()->is('urbania')) aria-current="page" @endif>Urbania</a>
            </div>
        </div>
        <a class="{{ request()->is('tempo-traveller-hire') ? 'active' : '' }}" href="{{ url('/tempo-traveller-hire') }}" @if (request()->is('tempo-traveller-hire')) aria-current="page" @endif>Tempo Traveller Hire</a>
        <a class="{{ request()->is('faqs') ? 'active' : '' }}" href="{{ url('/faqs') }}" @if (request()->is('faqs')) aria-current="page" @endif>FAQ’s</a>
        <a href="{{ route('contact.create') }}">Contact</a>
    </nav>
    <a class="header-call" href="tel:+917718036300">
        <span class="call-icon" aria-hidden="true">☎</span>
        <span><strong>Contact Us Now</strong><small>+91 77180 36300</small></span>
    </a>
    <details class="mobile-nav">
        <summary aria-label="Open navigation menu"><span></span><span></span><span></span></summary>
        <nav aria-label="Mobile navigation">
            <a href="{{ url('/') }}" @if (request()->path() === '/') aria-current="page" @endif>Home</a>
            <a href="{{ url('/about') }}" @if (request()->is('about')) aria-current="page" @endif>About</a>
            <div class="mobile-nav-dropdown">
                <a href="{{ url('/#services') }}">Our Standards</a>
                <div class="mobile-sub-menu">
                    <a class="{{ request()->is('bus-hire') ? 'active' : '' }}" href="{{ url('/bus-hire') }}" @if (request()->is('bus-hire')) aria-current="page" @endif>Bus Hire</a>
                    <a class="{{ request()->is('urbania') ? 'active' : '' }}" href="{{ url('/urbania') }}" @if (request()->is('urbania')) aria-current="page" @endif>Urbania</a>
                </div>
            </div>
            <a href="{{ url('/tempo-traveller-hire') }}" @if (request()->is('tempo-traveller-hire')) aria-current="page" @endif>Tempo Traveller Hire</a>
            <a class="{{ request()->is('faqs') ? 'active' : '' }}" href="{{ url('/faqs') }}" @if (request()->is('faqs')) aria-current="page" @endif>FAQ’s</a>
            <a href="{{ route('contact.create') }}">Contact</a>
            @if (request()->is('blog*'))
                <a class="blog-mobile-call" href="tel:+917718036300">Contact Us Now | +91 77180 36300</a>
            @endif
        </nav>
    </details>
</header>
