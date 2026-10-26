<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Learn about Make My Tours &amp; Travels, Mumbai's trusted AC bus, non-AC bus, and tempo traveller rental service since 2008.">
    <title>About – Make My Tours &amp; Travels</title>
    @include('components.open-graph', [
        'socialTitle' => 'About Make My Tours & Travels – Trusted Travel in Mumbai Since 2008',
        'socialDescription' => "Learn about Make My Tours & Travels, Mumbai's trusted AC bus, non-AC bus, and tempo traveller rental service since 2008.",
        'socialImage' => asset('images/bd-explorations-1.webp'),
        'socialImageAlt' => 'Passengers boarding a Make My Tours bus beside the Gateway of India in Mumbai',
    ])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800&family=Heebo:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/about.css') }}">
    @include('components.tagmanager')
    @vite('resources/js/app.js')
</head>
<body>
    @include('components.header')

    <main>
        <section class="about-banner" aria-labelledby="about-page-title">
            <div class="about-banner-inner">
                <h1 id="about-page-title">About</h1>
            </div>
        </section>

        <section class="about-story" aria-labelledby="about-story-title">
            <div class="about-story-inner">
                <div class="about-story-copy">
                    <h2 id="about-story-title">Make My Tours &amp; Travels – Trusted AC Bus, Non-AC Bus &amp; Tempo Traveller Rental in Mumbai</h2>
                    <p>Since 2008, Make My Tours &amp; Travels has been a trusted name in Mumbai for comfortable, reliable, and affordable travel services. Whether you’re planning a family outing, corporate event, school trip, wedding function, pilgrimage, sightseeing tour, or an outstation journey, we provide well-maintained AC Buses, Non-AC Buses, and Tempo Travellers to make every trip safe, convenient, and enjoyable.</p>
                    <p>Based in Mumbai, we proudly serve customers across Mumbai, Thane, and nearby areas with a fleet of clean, regularly maintained vehicles that are inspected before every trip. Passenger comfort, vehicle cleanliness, and on-time service are our top priorities, ensuring you enjoy a smooth and worry-free travel experience every time.</p>
                    <p>Our experienced and courteous drivers are familiar with local and outstation routes, helping every journey remain safe and stress-free. Whether you need a spacious AC Bus for large groups, a comfortable Non-AC Bus for budget-friendly travel, or a Tempo Traveller for family and small group trips, Make My Tours &amp; Travels offers flexible rental options at competitive prices to suit every travel requirement.</p>
                </div>
                <img class="about-story-image" src="{{ asset('images/bd-explorations-1.webp') }}" alt="Passengers boarding a Make My Tours bus beside the Gateway of India in Mumbai">
            </div>
        </section>
    </main>

    @include('components.footer')
</body>
</html>
