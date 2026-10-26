<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        Urbania Hire in Mumbai | Urbania Rental with Driver
    </title>

    <meta name="description"
        content="Hire a premium Urbania in Mumbai for family trips, corporate travel, weddings, airport transfers, Mumbai Darshan and outstation journeys. Comfortable AC Urbania with experienced driver.">

    @include('components.open-graph', [
        'socialTitle' => 'Urbania Hire in Mumbai | Urbania Rental with Driver',
        'socialDescription' => 'Hire a premium Urbania in Mumbai for family trips, corporate travel, weddings, airport transfers, Mumbai Darshan and outstation journeys.',
        'socialImage' => asset('images/mb-explorations-2.png'),
        'socialImageAlt' => 'Comfortable group travel with Make My Tours & Travels',
    ])

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet"
        href="{{ asset('css/app.css') }}">

    <link rel="stylesheet"
        href="{{ asset('css/components/header.css') }}">

    <link rel="stylesheet"
        href="{{ asset('css/components/footer.css') }}">

    <link rel="stylesheet"
        href="{{ asset('css/pages/urbania.css') }}">
    @include('components.tagmanager')
    @vite('resources/js/app.js')

</head>

<body>

    @include('components.header')


    <main class="urbania-page">


        {{-- =====================================================
             HERO
        ====================================================== --}}

        <section class="urbania-hero">

            <div class="urbania-hero-overlay"></div>

            <div class="urbania-container urbania-hero-content">

                <div class="urbania-eyebrow">
                    PREMIUM URBANIA HIRE IN MUMBAI
                </div>

                <h1>
                    Travel in Comfort
                    <span>with Urbania</span>
                </h1>

                <p>
                    Hire a premium Urbania in Mumbai for family trips,
                    corporate travel, weddings, airport transfers,
                    sightseeing and outstation journeys.
                </p>

                <div class="urbania-hero-buttons">

                    <a href="#urbania-enquiry"
                       class="urbania-btn urbania-btn-primary">
                        Get a Quote
                    </a>

                    <a href="tel:+917718036300"
                       class="urbania-btn urbania-btn-outline">
                        Call Us
                    </a>

                </div>

            </div>

        </section>



        {{-- =====================================================
             INTRO
        ====================================================== --}}

        <section class="urbania-intro urbania-section-space">

            <div class="urbania-container urbania-two-column">

                <div class="urbania-content">

                    <span class="urbania-section-label">
                        URBANIA RENTAL IN MUMBAI
                    </span>

                    <h2>
                        Premium Urbania
                        <span>for Comfortable Group Travel</span>
                    </h2>

                    <p>
                        Make My Tours & Travels offers Urbania rental
                        services in Mumbai for customers looking for
                        a more comfortable and premium group travel
                        experience.
                    </p>

                    <p>
                        Whether you are planning a family vacation,
                        corporate outing, wedding function, airport
                        transfer, Mumbai Darshan or an outstation trip,
                        an Urbania is an ideal option for travelling
                        together.
                    </p>

                    <p>
                        With comfortable interiors, air conditioning,
                        spacious seating and an experienced driver,
                        you can enjoy a smooth journey without the
                        hassle of driving yourself.
                    </p>


                    <div class="urbania-check-list">

                        <div>
                            <span>✓</span>
                            Premium & Comfortable Travel
                        </div>

                        <div>
                            <span>✓</span>
                            Air-Conditioned Vehicle
                        </div>

                        <div>
                            <span>✓</span>
                            Experienced Driver
                        </div>

                        <div>
                            <span>✓</span>
                            Local & Outstation Trips
                        </div>

                    </div>


                    <a href="#urbania-enquiry"
                       class="urbania-text-btn">

                        Book Urbania

                        <span>→</span>

                    </a>

                </div>


                <div class="urbania-image-box">

                    <img
                        src="{{ asset('images/mb-explorations-2.png') }}"
                        alt="Urbania Hire in Mumbai">

                    <div class="urbania-floating-card urbania-floating-top">

                        <div class="urbania-floating-icon">
                            ✓
                        </div>

                        <div>

                            <strong>
                                Premium Travel
                            </strong>

                            <span>
                                Comfortable Journey
                            </span>

                        </div>

                    </div>


                    <div class="urbania-floating-card urbania-floating-bottom">

                        <strong>
                            15+
                        </strong>

                        <span>
                            Years of Experience
                        </span>

                    </div>

                </div>

            </div>

        </section>



        {{-- =====================================================
             WHY URBANIA
        ====================================================== --}}

        <section class="urbania-benefits urbania-section-space">

            <div class="urbania-container">

                <div class="urbania-section-heading">

                    <span class="urbania-section-label">
                        WHY CHOOSE URBANIA
                    </span>

                    <h2>
                        A Better Way to
                        <span>Travel Together</span>
                    </h2>

                    <p>
                        Urbania combines the convenience of group
                        transportation with a more comfortable and
                        premium travel experience.
                    </p>

                </div>


                <div class="urbania-benefit-grid">


                    <div class="urbania-benefit-card">

                        <div class="urbania-benefit-number">
                            01
                        </div>

                        <h3>
                            Premium Comfort
                        </h3>

                        <p>
                            Enjoy a comfortable group journey with
                            spacious interiors and premium travel
                            experience.
                        </p>

                    </div>


                    <div class="urbania-benefit-card">

                        <div class="urbania-benefit-number">
                            02
                        </div>

                        <h3>
                            AC Travel
                        </h3>

                        <p>
                            Travel comfortably throughout your journey
                            with an air-conditioned Urbania.
                        </p>

                    </div>


                    <div class="urbania-benefit-card">

                        <div class="urbania-benefit-number">
                            03
                        </div>

                        <h3>
                            Travel Together
                        </h3>

                        <p>
                            Keep your family, friends or colleagues
                            together in one comfortable vehicle.
                        </p>

                    </div>


                    <div class="urbania-benefit-card">

                        <div class="urbania-benefit-number">
                            04
                        </div>

                        <h3>
                            Driver Included
                        </h3>

                        <p>
                            Our experienced driver takes care of the
                            journey while you enjoy your trip.
                        </p>

                    </div>


                </div>

            </div>

        </section>



        {{-- =====================================================
             EXPERIENCE SECTION
        ====================================================== --}}

        <section class="urbania-feature">

            <div class="urbania-container">

                <div class="urbania-feature-grid">


                    <div class="urbania-feature-image">

                        <img
                            src="{{ asset('images/public-transportation-coach-bus-passenger-e1656574186152.webp') }}"
                            alt="Urbania Premium Interior">

                    </div>


                    <div class="urbania-feature-content">

                        <span class="urbania-section-label">
                            PREMIUM GROUP TRAVEL
                        </span>

                        <h2>
                            More Comfort.
                            <span>More Convenience.</span>
                        </h2>

                        <p>
                            When travelling with family or a group,
                            comfort becomes an important part of the
                            journey. Urbania gives you the convenience
                            of travelling together while enjoying a
                            premium travel experience.
                        </p>

                        <p>
                            Instead of taking multiple cars, your group
                            can travel together in one vehicle with an
                            experienced driver.
                        </p>


                        <div class="urbania-feature-points">

                            <div>

                                <strong>01</strong>

                                <span>
                                    Comfortable Seating
                                </span>

                            </div>

                            <div>

                                <strong>02</strong>

                                <span>
                                    Air-Conditioned Travel
                                </span>

                            </div>

                            <div>

                                <strong>03</strong>

                                <span>
                                    Spacious Interior
                                </span>

                            </div>

                            <div>

                                <strong>04</strong>

                                <span>
                                    Professional Driver
                                </span>

                            </div>

                        </div>


                        <a href="#urbania-enquiry"
                           class="urbania-btn urbania-btn-primary">

                            Enquire Now

                        </a>

                    </div>

                </div>

            </div>

        </section>



        {{-- =====================================================
             SERVICES
        ====================================================== --}}

        <section class="urbania-services urbania-section-space">

            <div class="urbania-container">

                <div class="urbania-section-heading">

                    <span class="urbania-section-label">
                        OUR URBANIA SERVICES
                    </span>

                    <h2>
                        Urbania Hire for
                        <span>Every Occasion</span>
                    </h2>

                    <p>
                        Choose Urbania rental according to your travel
                        requirement, group size and destination.
                    </p>

                </div>


                <div class="urbania-service-grid">


                    <div class="urbania-service-card">

                        <div class="urbania-service-icon">
                            👨‍👩‍👧‍👦
                        </div>

                        <h3>
                            Family Trips
                        </h3>

                        <p>
                            Comfortable Urbania rental for family
                            vacations, holidays and group outings.
                        </p>

                        <a href="#urbania-enquiry">
                            Enquire Now →
                        </a>

                    </div>


                    <div class="urbania-service-card">

                        <div class="urbania-service-icon">
                            🏢
                        </div>

                        <h3>
                            Corporate Travel
                        </h3>

                        <p>
                            Premium transportation for corporate
                            meetings, events and team outings.
                        </p>

                        <a href="#urbania-enquiry">
                            Enquire Now →
                        </a>

                    </div>


                    <div class="urbania-service-card">

                        <div class="urbania-service-icon">
                            💍
                        </div>

                        <h3>
                            Wedding Travel
                        </h3>

                        <p>
                            Comfortable guest transportation for
                            weddings, functions and special events.
                        </p>

                        <a href="#urbania-enquiry">
                            Enquire Now →
                        </a>

                    </div>


                    <div class="urbania-service-card">

                        <div class="urbania-service-icon">
                            ✈️
                        </div>

                        <h3>
                            Airport Transfers
                        </h3>

                        <p>
                            Convenient group airport transfers to and
                            from Mumbai airport.
                        </p>

                        <a href="#urbania-enquiry">
                            Enquire Now →
                        </a>

                    </div>


                    <div class="urbania-service-card">

                        <div class="urbania-service-icon">
                            📍
                        </div>

                        <h3>
                            Mumbai Darshan
                        </h3>

                        <p>
                            Explore Mumbai attractions comfortably
                            with your family or travel group.
                        </p>

                        <a href="#urbania-enquiry">
                            Enquire Now →
                        </a>

                    </div>


                    <div class="urbania-service-card">

                        <div class="urbania-service-icon">
                            🛣️
                        </div>

                        <h3>
                            Outstation Travel
                        </h3>

                        <p>
                            Hire Urbania for comfortable journeys
                            from Mumbai to destinations across
                            Maharashtra and nearby areas.
                        </p>

                        <a href="#urbania-enquiry">
                            Enquire Now →
                        </a>

                    </div>


                </div>

            </div>

        </section>



        {{-- =====================================================
             DESTINATIONS
        ====================================================== --}}

        <section class="urbania-destinations">

            <div class="urbania-container">

                <div class="urbania-destination-grid">


                    <div class="urbania-destination-content">

                        <span class="urbania-section-label">
                            LOCAL & OUTSTATION
                        </span>

                        <h2>
                            Travel from Mumbai
                            <span>with Ease</span>
                        </h2>

                        <p>
                            Hire an Urbania for local Mumbai travel,
                            sightseeing or longer outstation journeys.
                            We help you plan comfortable group
                            transportation according to your itinerary.
                        </p>


                        <div class="urbania-destination-list">

                            <div>
                                <span>✓</span>
                                Mumbai Darshan
                            </div>

                            <div>
                                <span>✓</span>
                                Lonavala & Khandala
                            </div>

                            <div>
                                <span>✓</span>
                                Mahabaleshwar
                            </div>

                            <div>
                                <span>✓</span>
                                Alibaug
                            </div>

                            <div>
                                <span>✓</span>
                                Pune
                            </div>

                            <div>
                                <span>✓</span>
                                Nashik
                            </div>

                        </div>


                        <a href="#urbania-enquiry"
                           class="urbania-btn urbania-btn-primary">

                            Plan Your Trip

                        </a>

                    </div>


                    <div class="urbania-destination-image">

                        <img
                            src="{{ asset('images/young-couple-traveling-on-a-bus-e1656574261102.webp') }}"
                            alt="Urbania Outstation Travel from Mumbai">

                    </div>

                </div>

            </div>

        </section>



        {{-- =====================================================
             WHO IS IT FOR
        ====================================================== --}}

        <section class="urbania-use urbania-section-space">

            <div class="urbania-container">

                <div class="urbania-section-heading">

                    <span class="urbania-section-label">
                        IDEAL FOR
                    </span>

                    <h2>
                        Perfect for
                        <span>Group Travel</span>
                    </h2>

                </div>


                <div class="urbania-use-grid">


                    <div class="urbania-use-card">

                        <strong>
                            01
                        </strong>

                        <h3>
                            Families
                        </h3>

                        <p>
                            Comfortable travel for family holidays
                            and weekend getaways.
                        </p>

                    </div>


                    <div class="urbania-use-card">

                        <strong>
                            02
                        </strong>

                        <h3>
                            Friends
                        </h3>

                        <p>
                            Keep your group together while travelling
                            to your favourite destinations.
                        </p>

                    </div>


                    <div class="urbania-use-card">

                        <strong>
                            03
                        </strong>

                        <h3>
                            Corporates
                        </h3>

                        <p>
                            Convenient transportation for teams,
                            meetings and corporate events.
                        </p>

                    </div>


                    <div class="urbania-use-card">

                        <strong>
                            04
                        </strong>

                        <h3>
                            Wedding Groups
                        </h3>

                        <p>
                            Comfortable transportation for guests
                            and family members.
                        </p>

                    </div>


                </div>

            </div>

        </section>



        {{-- =====================================================
             WHY MAKE MY TOURS
        ====================================================== --}}

        <section class="urbania-why urbania-section-space">

            <div class="urbania-container">

                <div class="urbania-two-column urbania-why-grid">

                    <div class="urbania-why-image">

                        <img
                            src="{{ asset('images/make-my-why-choose-us.webp') }}"
                            alt="Urbania Rental Service Mumbai">

                    </div>


                    <div class="urbania-why-content">

                        <span class="urbania-section-label">
                            WHY MAKE MY TOURS & TRAVELS
                        </span>

                        <h2>
                            Your Trusted Partner
                            <span>for Group Travel</span>
                        </h2>

                        <p>
                            Since 2008, Make My Tours & Travels has
                            been providing travel and transportation
                            solutions for customers in Mumbai and
                            nearby areas.
                        </p>


                        <div class="urbania-why-list">

                            <div>

                                <span>01</span>

                                <div>

                                    <h3>
                                        15+ Years Experience
                                    </h3>

                                    <p>
                                        Extensive experience in
                                        travel and group transportation.
                                    </p>

                                </div>

                            </div>


                            <div>

                                <span>02</span>

                                <div>

                                    <h3>
                                        Reliable Service
                                    </h3>

                                    <p>
                                        Focused on dependable and
                                        comfortable travel.
                                    </p>

                                </div>

                            </div>


                            <div>

                                <span>03</span>

                                <div>

                                    <h3>
                                        Experienced Drivers
                                    </h3>

                                    <p>
                                        Drivers familiar with Mumbai
                                        and outstation routes.
                                    </p>

                                </div>

                            </div>


                            <div>

                                <span>04</span>

                                <div>

                                    <h3>
                                        Flexible Rental
                                    </h3>

                                    <p>
                                        Rental options based on your
                                        travel requirements.
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>



        {{-- =====================================================
             CTA
        ====================================================== --}}

        <section class="urbania-enquiry"
                 id="urbania-enquiry">

            <div class="urbania-container">

                <div class="urbania-enquiry-box">

                    <div class="urbania-enquiry-content">

                        <span class="urbania-section-label">
                            PLAN YOUR JOURNEY
                        </span>

                        <h2>
                            Ready to Travel
                            <span>in Comfort?</span>
                        </h2>

                        <p>
                            Tell us your travel date, pickup location,
                            destination and group size. We will help
                            you choose the right Urbania rental option.
                        </p>

                    </div>


                    <div class="urbania-enquiry-buttons">

                        <a href="tel:+917718036300"
                           class="urbania-btn urbania-btn-white">

                            Call Us Now

                        </a>

                        <a href="https://wa.me/917718036300"
                           target="_blank"
                           class="urbania-btn urbania-btn-outline-white">

                            WhatsApp Us

                        </a>

                    </div>

                </div>

            </div>

        </section>



        {{-- =====================================================
             FAQ
        ====================================================== --}}

        <section class="urbania-faq urbania-section-space">

            <div class="urbania-container urbania-faq-container">

                <div class="urbania-section-heading">

                    <span class="urbania-section-label">
                        FAQ'S
                    </span>

                    <h2>
                        Urbania Hire
                        <span>Frequently Asked Questions</span>
                    </h2>

                </div>


                <div class="urbania-faq-list">


                    <details>

                        <summary>
                            What is Urbania rental?
                            <span>+</span>
                        </summary>

                        <p>
                            Urbania rental is a premium group travel
                            option suitable for family trips, corporate
                            travel, weddings, sightseeing and outstation
                            journeys.
                        </p>

                    </details>


                    <details>

                        <summary>
                            Can I hire an Urbania with a driver?
                            <span>+</span>
                        </summary>

                        <p>
                            Yes. Our Urbania rental service is available
                            with an experienced driver so you can enjoy
                            your journey without worrying about driving.
                        </p>

                    </details>


                    <details>

                        <summary>
                            Can I hire Urbania for outstation travel?
                            <span>+</span>
                        </summary>

                        <p>
                            Yes. Urbania can be hired for outstation
                            journeys from Mumbai to destinations across
                            Maharashtra and nearby locations.
                        </p>

                    </details>


                    <details>

                        <summary>
                            Is Urbania suitable for family trips?
                            <span>+</span>
                        </summary>

                        <p>
                            Yes. Urbania is a suitable option for families
                            and groups who want to travel together in a
                            comfortable vehicle.
                        </p>

                    </details>


                    <details>

                        <summary>
                            How do I book an Urbania in Mumbai?
                            <span>+</span>
                        </summary>

                        <p>
                            Contact Make My Tours & Travels by phone or
                            WhatsApp with your travel date, pickup point,
                            destination and group size to request a quote.
                        </p>

                    </details>


                </div>

            </div>

        </section>


    </main>


    @include('components.footer')


</body>

</html>