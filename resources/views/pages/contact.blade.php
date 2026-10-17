<!doctype html>
<html lang="en" data-theme="light">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Contact Make My Tours & Travels for help planning your next trip, tour, or group journey.">
    <title>Contact us · {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800&family=Heebo:wght@400;500;600;700;800&family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"><link rel="stylesheet" href="{{ asset('css/components/header.css') }}"><link rel="stylesheet" href="{{ asset('css/components/footer.css') }}"><link rel="stylesheet" href="{{ asset('css/contact.css') }}">
    <script>(()=>{const s=localStorage.getItem('admin-theme');document.documentElement.dataset.theme=s||(matchMedia('(prefers-color-scheme: dark)').matches?'dark':'light')})();</script>
</head>
<body class="contact-body">
    @include('components.header')
    <button class="contact-theme-toggle" type="button" data-contact-theme aria-label="Toggle color theme" title="Toggle theme">◐</button>
    <main class="contact-main">
        <section class="contact-hero"><span class="contact-kicker">LET’S PLAN SOMETHING GOOD</span><h1>We’re here for<br><span>your next journey.</span></h1><p>Tell us what you have in mind. Our Mumbai team will help you figure out the details.</p><span class="contact-hero-mark" aria-hidden="true">✦</span></section>
        @if(session('contact_success'))<div class="contact-success" role="status"><span>✓</span><div><strong>Message received</strong><p>{{ session('contact_success') === true ? 'Thanks for getting in touch. We will be in contact soon.' : session('contact_success') }}</p></div></div>@endif
        @if($errors->any())<div class="contact-error-summary" role="alert"><strong>A couple of details need your attention.</strong><span>Please check the fields marked below.</span></div>@endif
        <div class="contact-grid"><section class="contact-card contact-form-card"><div class="contact-card-heading"><div><span class="contact-kicker">SEND A NOTE</span><h2>How can we help?</h2><p>Share a few details and we’ll get back to you shortly.</p></div><span class="contact-icon contact-icon-purple">✉</span></div>
            <form action="{{ route('contact.store') }}" method="post" class="contact-form" data-contact-form>@csrf
                <div class="contact-fields two-fields"><div class="contact-field"><label for="contact-name">Your name <span>*</span></label><input id="contact-name" name="name" value="{{ old('name') }}" autocomplete="name" maxlength="100" placeholder="e.g. Aisha Patel" required aria-describedby="name-error">@error('name')<span class="contact-field-error" id="name-error">{{ $message }}</span>@enderror</div>
                <div class="contact-field"><label for="contact-email">Email address <span>*</span></label><input id="contact-email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" maxlength="255" placeholder="you@example.com" required aria-describedby="email-error">@error('email')<span class="contact-field-error" id="email-error">{{ $message }}</span>@enderror</div>
                <div class="contact-field"><label for="contact-phone">Phone number <span>*</span></label><input id="contact-phone" name="phone" type="tel" value="{{ old('phone') }}" autocomplete="tel" maxlength="32" placeholder="+91 98765 43210" required aria-describedby="phone-hint phone-error"><small class="contact-hint" id="phone-hint">Include country code for international numbers.</small>@error('phone')<span class="contact-field-error" id="phone-error">{{ $message }}</span>@enderror</div>
                <div class="contact-field"><label for="contact-address">City or address <span>*</span></label><input id="contact-address" name="address" value="{{ old('address') }}" autocomplete="street-address" maxlength="255" placeholder="Where are you based?" required aria-describedby="address-error">@error('address')<span class="contact-field-error" id="address-error">{{ $message }}</span>@enderror</div>
                <div class="contact-field full-field"><label for="contact-message">Your message <span>*</span></label><textarea id="contact-message" name="message" rows="5" minlength="10" maxlength="3000" placeholder="Tell us a little about the journey you’re planning…" required aria-describedby="message-error">{{ old('message') }}</textarea><div class="message-footer"><small class="contact-hint">At least 10 characters, please.</small><small data-message-count>0 / 3000</small></div>@error('message')<span class="contact-field-error" id="message-error">{{ $message }}</span>@enderror</div>
                <div class="contact-honeypot" aria-hidden="true"><label for="contact-website">Leave this field empty</label><input id="contact-website" name="website" type="text" tabindex="-1" autocomplete="off"></div>
                <button class="contact-submit" type="submit"><span>Send your message</span><span aria-hidden="true">↗</span></button>
            </form>
            <p class="contact-privacy"><span>▣</span> Your details are only used to respond to this enquiry.</p>
        </section>
        <aside class="contact-info-column" aria-label="Company contact information"><article class="contact-card contact-info-card address-card"><span class="contact-icon contact-icon-green">⌖</span><span class="contact-kicker">COME SAY HELLO</span><h2>Our office</h2><p>E-120, Puspanjali Bldg,<br>Seven Bunglow, Andheri West,<br>Mumbai, Maharashtra</p><a href="https://maps.google.com/?q=E-120+Puspanjali+Bldg+Seven+Bunglow+Andheri+West+Mumbai" target="_blank" rel="noopener">Get directions <span>↗</span></a><span class="info-decoration" aria-hidden="true">01</span></article>
            <article class="contact-card contact-info-card"><span class="contact-icon contact-icon-amber">☎</span><span class="contact-kicker">TALK IT THROUGH</span><h2>Give us a call</h2><p>We’re happy to help you find the right ride for your plans.</p><a class="contact-detail-link" href="tel:+917718036300">+91 77180 36300</a></article>
            <article class="contact-card contact-info-card"><span class="contact-icon contact-icon-purple">✉</span><span class="contact-kicker">DROP US A LINE</span><h2>Email our team</h2><p>Send us a note and we’ll get back to you.</p><a class="contact-detail-link" href="mailto:makemytoursplanner@gmail.com">makemytoursplanner@gmail.com</a></article>
            <article class="contact-response-note"><span>✦</span><p><strong>A real person, every time.</strong><br>Our local team usually replies within one business day.</p></article>
        </aside></div>
    </main>
    @include('components.footer')
    <script>
        const themeButton=document.querySelector('[data-contact-theme]');themeButton.addEventListener('click',()=>{const theme=document.documentElement.dataset.theme==='dark'?'light':'dark';document.documentElement.dataset.theme=theme;localStorage.setItem('admin-theme',theme)});
        const message=document.getElementById('contact-message'),counter=document.querySelector('[data-message-count]');const updateCount=()=>counter.textContent=`${message.value.length} / 3000`;message.addEventListener('input',updateCount);updateCount();
        document.querySelector('[data-contact-form]').addEventListener('submit',event=>{if(!event.currentTarget.reportValidity())return;const button=event.currentTarget.querySelector('button[type=submit]');button.disabled=true;button.querySelector('span').textContent='Sending…'});
    </script>
</body>
</html>
