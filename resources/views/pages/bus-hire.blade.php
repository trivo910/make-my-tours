<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        Bus Hire in Mumbai | AC & Non-AC Bus Rental | Make My Tours & Travels
    </title>

    <meta name="description"
        content="Hire AC and Non-AC buses in Mumbai for Mumbai Darshan, corporate events, weddings, school trips, group tours and outstation travel with Make My Tours & Travels.">

    @include('components.open-graph', [
        'socialTitle' => 'Bus Hire in Mumbai | AC & Non-AC Bus Rental | Make My Tours & Travels',
        'socialDescription' => 'Hire AC and Non-AC buses in Mumbai for Mumbai Darshan, corporate events, weddings, school trips, group tours and outstation travel.',
        'socialImage' => asset('images/luxury-ac-coach.webp'),
        'socialImageAlt' => 'Luxury air-conditioned coach available for hire in Mumbai',
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
        href="{{ asset('css/pages/bus-hire.css') }}">
    @include('components.tagmanager')
    @vite('resources/js/app.js')

</head>

<body>

    @include('components.header')


    <main class="bus-hire-page">


        {{-- =========================================================
            HERO
        ========================================================== --}}

        <section class="bus-hero">

            <div class="bus-hero-overlay"></div>

            <div class="bus-container bus-hero-content">

                <div class="bus-eyebrow">
                    BUS HIRE IN MUMBAI
                </div>

                <h1>
                    Comfortable Bus Hire
                    <span>for Every Journey</span>
                </h1>

                <p>
                    Hire reliable AC and Non-AC buses in Mumbai for
                    sightseeing, corporate events, weddings, school trips,
                    group tours and outstation travel.
                </p>

                <div class="bus-hero-buttons">

                    <a href="#bus-enquiry"
                        class="bus-btn bus-btn-primary">
                        Get a Quote
                    </a>

                    <a href="tel:+917718036300"
                        class="bus-btn bus-btn-outline">
                        Call Us
                    </a>

                </div>

            </div>

        </section>



        {{-- =========================================================
            INTRO
        ========================================================== --}}

        <section class="bus-intro bus-section-space">

            <div class="bus-container bus-two-column">


                <div class="bus-content">

                    <span class="bus-section-label">
                        ABOUT OUR BUS HIRE SERVICE
                    </span>

                    <h2>
                        Reliable Bus Rental
                        <span>in Mumbai</span>
                    </h2>

                    <p>
                        Make My Tours & Travels provides comfortable,
                        reliable and affordable bus rental services in
                        Mumbai for groups of all sizes.
                    </p>

                    <p>
                        Whether you are planning Mumbai Darshan, a family
                        outing, corporate event, wedding function, school
                        trip or an outstation journey, we offer suitable
                        AC and Non-AC buses to make group travel simple
                        and convenient.
                    </p>

                    <p>
                        Our experienced drivers are familiar with Mumbai
                        and major outstation routes. We focus on clean
                        vehicles, comfortable journeys and dependable
                        service from pickup to destination.
                    </p>


                    <div class="bus-check-list">

                        <div>
                            <span>✓</span>
                            Well-maintained buses
                        </div>

                        <div>
                            <span>✓</span>
                            Experienced drivers
                        </div>

                        <div>
                            <span>✓</span>
                            Flexible rental options
                        </div>

                        <div>
                            <span>✓</span>
                            Local & outstation travel
                        </div>

                    </div>


                    <a href="#bus-enquiry"
                        class="bus-text-btn">
                        Book Your Bus
                        <span>→</span>
                    </a>

                </div>


                <div class="bus-image-box">

                    <img
                        src="{{ asset('images/tempo1.webp') }}"
                        alt="Bus Hire Service in Mumbai">

                    <div class="bus-floating-card bus-floating-top">

                        <div class="bus-floating-icon">
                            ✓
                        </div>

                        <div>
                            <strong>Safe & Reliable</strong>
                            <span>Travel Experience</span>
                        </div>

                    </div>


                    <div class="bus-floating-card bus-floating-bottom">

                        <strong>15+</strong>

                        <span>
                            Years of Experience
                        </span>

                    </div>

                </div>

            </div>

        </section>



        {{-- =========================================================
            BUS RENTAL SERVICES
        ========================================================== --}}

        <section class="bus-services bus-section-space">

            <div class="bus-container">

                <div class="bus-section-heading">

                    <span class="bus-section-label">
                        OUR SERVICES
                    </span>

                    <h2>
                        Bus Rental for
                        <span>Every Travel Need</span>
                    </h2>

                    <p>
                        From local sightseeing to long-distance journeys,
                        choose a bus rental option according to your group
                        size and travel requirements.
                    </p>

                </div>


                <div class="bus-service-grid">


                    <div class="bus-service-card">

                        <div class="bus-service-icon">
                            🚌
                        </div>

                        <h3>
                            AC Bus Hire
                        </h3>

                        <p>
                            Comfortable air-conditioned buses for family
                            trips, sightseeing, corporate travel and
                            outstation journeys.
                        </p>

                        <a href="#bus-enquiry">
                            Enquire Now →
                        </a>

                    </div>


                    <div class="bus-service-card">

                        <div class="bus-service-icon">
                            🚍
                        </div>

                        <h3>
                            Non-AC Bus Hire
                        </h3>

                        <p>
                            Affordable Non-AC buses for group travel,
                            school trips, events and local transportation.
                        </p>

                        <a href="#bus-enquiry">
                            Enquire Now →
                        </a>

                    </div>


                    <div class="bus-service-card">

                        <div class="bus-service-icon">
                            🏢
                        </div>

                        <h3>
                            Corporate Bus Rental
                        </h3>

                        <p>
                            Reliable transportation for corporate events,
                            employee travel, meetings and business functions.
                        </p>

                        <a href="#bus-enquiry">
                            Enquire Now →
                        </a>

                    </div>


                    <div class="bus-service-card">

                        <div class="bus-service-icon">
                            💍
                        </div>

                        <h3>
                            Wedding Bus Hire
                        </h3>

                        <p>
                            Convenient group transportation for weddings,
                            family functions and special occasions.
                        </p>

                        <a href="#bus-enquiry">
                            Enquire Now →
                        </a>

                    </div>


                    <div class="bus-service-card">

                        <div class="bus-service-icon">
                            🎒
                        </div>

                        <h3>
                            School & College Trips
                        </h3>

                        <p>
                            Comfortable group transportation for school
                            picnics, educational tours and college trips.
                        </p>

                        <a href="#bus-enquiry">
                            Enquire Now →
                        </a>

                    </div>


                    <div class="bus-service-card">

                        <div class="bus-service-icon">
                            📍
                        </div>

                        <h3>
                            Outstation Bus Rental
                        </h3>

                        <p>
                            Hire buses for comfortable outstation journeys
                            from Mumbai to destinations across Maharashtra.
                        </p>

                        <a href="#bus-enquiry">
                            Enquire Now →
                        </a>

                    </div>


                </div>

            </div>

        </section>



        {{-- =========================================================
            BLACK FEATURE SECTION
        ========================================================== --}}

        <section class="bus-feature">

            <div class="bus-container">

                <div class="bus-feature-grid">


                    <div class="bus-feature-image">

                        <img
                            src="{{ asset('images/make-my-why-choose-us.webp') }}"
                            alt="Group Bus Travel in Mumbai">

                    </div>


                    <div class="bus-feature-content">

                        <span class="bus-section-label">
                            GROUP TRAVEL MADE EASY
                        </span>

                        <h2>
                            Travel Together,
                            <span>Travel Comfortably</span>
                        </h2>

                        <p>
                            Travelling with a large group can be difficult
                            when everyone uses separate vehicles. With our
                            bus rental service, your entire group can travel
                            together in comfort.
                        </p>

                        <p>
                            From Mumbai sightseeing and family outings to
                            corporate events, weddings and outstation tours,
                            we provide practical transportation solutions
                            according to your requirements.
                        </p>


                        <div class="bus-feature-points">

                            <div>
                                <strong>01</strong>
                                <span>Comfortable Group Travel</span>
                            </div>

                            <div>
                                <strong>02</strong>
                                <span>Professional Drivers</span>
                            </div>

                            <div>
                                <strong>03</strong>
                                <span>Flexible Rental Options</span>
                            </div>

                            <div>
                                <strong>04</strong>
                                <span>Local & Outstation Trips</span>
                            </div>

                        </div>


                        <a href="#bus-enquiry"
                            class="bus-btn bus-btn-primary">
                            Plan Your Trip
                        </a>

                    </div>

                </div>

            </div>

        </section>



        {{-- =========================================================
            FLEET
        ========================================================== --}}

        <section class="bus-fleet bus-section-space">

            <div class="bus-container">

                <div class="bus-section-heading">

                    <span class="bus-section-label">
                        OUR BUS COLLECTION
                    </span>

                    <h2>
                        Choose the Right Bus
                        <span>for Your Group</span>
                    </h2>

                    <p>
                        Select a suitable bus according to your group size,
                        destination, trip duration and comfort requirements.
                    </p>

                </div>


                <div class="bus-fleet-grid">


                    {{-- AC BUS --}}

                    <div class="bus-fleet-card">

                        <div class="bus-fleet-image">

                            <img
                                src="{{ asset('images/luxury-ac-coach.webp') }}"
                                alt="AC Bus Hire in Mumbai">

                        </div>


                        <div class="bus-fleet-content">

                            <span class="bus-fleet-tag">
                                POPULAR
                            </span>

                            <h3>
                                AC Bus
                            </h3>

                            <p>
                                A comfortable option for family tours,
                                corporate travel, sightseeing and
                                outstation journeys.
                            </p>

                            <ul>

                                <li>
                                    ✓ Comfortable AC seating
                                </li>

                                <li>
                                    ✓ Experienced driver
                                </li>

                                <li>
                                    ✓ Clean & maintained
                                </li>

                                <li>
                                    ✓ Local & outstation travel
                                </li>

                            </ul>

                            <a href="#bus-enquiry"
                                class="bus-fleet-btn">
                                Book Now
                            </a>

                        </div>

                    </div>



                    {{-- NON AC BUS --}}

                    <div class="bus-fleet-card">

                        <div class="bus-fleet-image">

                            <img
                                src="{{ asset('images/luxury-ac-coach.webp') }}"
                                alt="Non AC Bus Hire in Mumbai">

                        </div>


                        <div class="bus-fleet-content">

                            <span class="bus-fleet-tag">
                                BUDGET FRIENDLY
                            </span>

                            <h3>
                                Non-AC Bus
                            </h3>

                            <p>
                                A practical and economical option for
                                large groups, local trips and events.
                            </p>

                            <ul>

                                <li>
                                    ✓ Spacious seating
                                </li>

                                <li>
                                    ✓ Experienced driver
                                </li>

                                <li>
                                    ✓ Well-maintained vehicle
                                </li>

                                <li>
                                    ✓ Affordable rental
                                </li>

                            </ul>

                            <a href="#bus-enquiry"
                                class="bus-fleet-btn">
                                Book Now
                            </a>

                        </div>

                    </div>



                    {{-- LARGE BUS --}}

                    <div class="bus-fleet-card">

                        <div class="bus-fleet-image">

                            <img
                                src="{{ asset('images/luxury-ac-coach.webp') }}"
                                alt="Large Group Bus Rental in Mumbai">

                        </div>


                        <div class="bus-fleet-content">

                            <span class="bus-fleet-tag">
                                GROUP TRAVEL
                            </span>

                            <h3>
                                Large Group Bus
                            </h3>

                            <p>
                                Suitable for large groups, events,
                                school trips, corporate outings and tours.
                            </p>

                            <ul>

                                <li>
                                    ✓ Large seating capacity
                                </li>

                                <li>
                                    ✓ Comfortable journey
                                </li>

                                <li>
                                    ✓ Professional driver
                                </li>

                                <li>
                                    ✓ Event transportation
                                </li>

                            </ul>

                            <a href="#bus-enquiry"
                                class="bus-fleet-btn">
                                Book Now
                            </a>

                        </div>

                    </div>


                </div>

            </div>

        </section>



        {{-- =========================================================
            TRAVEL REQUIREMENTS
        ========================================================== --}}

        <section class="bus-use-section">

            <div class="bus-container">

                <div class="bus-use-header">

                    <span class="bus-section-label">
                        IDEAL FOR GROUP TRAVEL
                    </span>

                    <h2>
                        One Bus,
                        <span>Multiple Travel Needs</span>
                    </h2>

                    <p>
                        Whether you are travelling with family, colleagues,
                        students or friends, our bus hire service helps
                        make group transportation easier.
                    </p>

                </div>


                <div class="bus-use-grid">


                    <div class="bus-use-card">

                        <strong>
                            01
                        </strong>

                        <h3>
                            Mumbai Darshan
                        </h3>

                        <p>
                            Explore Mumbai's popular attractions comfortably
                            with your family or group.
                        </p>

                    </div>


                    <div class="bus-use-card">

                        <strong>
                            02
                        </strong>

                        <h3>
                            Corporate Events
                        </h3>

                        <p>
                            Organized transportation for employees,
                            meetings, events and corporate outings.
                        </p>

                    </div>


                    <div class="bus-use-card">

                        <strong>
                            03
                        </strong>

                        <h3>
                            Weddings
                        </h3>

                        <p>
                            Comfortable transportation for wedding guests,
                            families and special functions.
                        </p>

                    </div>


                    <div class="bus-use-card">

                        <strong>
                            04
                        </strong>

                        <h3>
                            Outstation Trips
                        </h3>

                        <p>
                            Travel comfortably with your group to destinations
                            across Maharashtra and nearby areas.
                        </p>

                    </div>


                </div>

            </div>

        </section>



        {{-- =========================================================
            WHY CHOOSE US
        ========================================================== --}}

        <section class="bus-why bus-section-space">

            <div class="bus-container">

                <div class="bus-section-heading">

                    <span class="bus-section-label">
                        WHY CHOOSE US
                    </span>

                    <h2>
                        A Trusted Choice for
                        <span>Group Transportation</span>
                    </h2>

                    <p>
                        We focus on comfortable vehicles, reliable service
                        and practical travel solutions for every group.
                    </p>

                </div>


                <div class="bus-why-grid">


                    <div class="bus-why-card">

                        <div class="bus-why-number">
                            01
                        </div>

                        <h3>
                            15+ Years Experience
                        </h3>

                        <p>
                            Serving customers with travel and transportation
                            solutions since 2008.
                        </p>

                    </div>


                    <div class="bus-why-card">

                        <div class="bus-why-number">
                            02
                        </div>

                        <h3>
                            Experienced Drivers
                        </h3>

                        <p>
                            Drivers familiar with Mumbai and major
                            outstation routes.
                        </p>

                    </div>


                    <div class="bus-why-card">

                        <div class="bus-why-number">
                            03
                        </div>

                        <h3>
                            Clean & Maintained
                        </h3>

                        <p>
                            Vehicles are maintained to provide a
                            comfortable travel experience.
                        </p>

                    </div>


                    <div class="bus-why-card">

                        <div class="bus-why-number">
                            04
                        </div>

                        <h3>
                            Flexible Packages
                        </h3>

                        <p>
                            Rental options can be planned according
                            to your trip requirements.
                        </p>

                    </div>


                </div>

            </div>

        </section>



        {{-- =========================================================
            ENQUIRY CTA
        ========================================================== --}}

        <section class="bus-enquiry"
            id="bus-enquiry">

            <div class="bus-container">

                <div class="bus-enquiry-box">


                    <div class="bus-enquiry-content">

                        <span class="bus-section-label">
                            PLAN YOUR JOURNEY
                        </span>

                        <h2>
                            Need a Bus for Your
                            <span>Next Trip?</span>
                        </h2>

                        <p>
                            Tell us your travel date, pickup location,
                            destination and group size. Our team will help
                            you choose the right bus.
                        </p>

                    </div>


                    <div class="bus-enquiry-buttons">

                        <a href="tel:+917718036300"
                            class="bus-btn bus-btn-white">
                            Call Us Now
                        </a>

                        <a href="https://wa.me/917718036300"
                            target="_blank"
                            class="bus-btn bus-btn-outline-white">
                            WhatsApp Us
                        </a>

                    </div>


                </div>

            </div>

        </section>



        {{-- =========================================================
            FAQ
        ========================================================== --}}

        <section class="bus-faq bus-section-space">

            <div class="bus-container bus-faq-container">

                <div class="bus-section-heading">

                    <span class="bus-section-label">
                        FAQ'S
                    </span>

                    <h2>
                        Bus Hire
                        <span>Frequently Asked Questions</span>
                    </h2>

                </div>


                <div class="bus-faq-list">


                    <details>

                        <summary>
                            What types of buses can I hire in Mumbai?
                            <span>+</span>
                        </summary>

                        <p>
                            We provide AC and Non-AC buses for local travel,
                            sightseeing, corporate events, weddings, school
                            trips, group tours and outstation journeys.
                        </p>

                    </details>


                    <details>

                        <summary>
                            Can I hire a bus for Mumbai Darshan?
                            <span>+</span>
                        </summary>

                        <p>
                            Yes. Our buses are suitable for Mumbai Darshan
                            and group sightseeing tours.
                        </p>

                    </details>


                    <details>

                        <summary>
                            Do you provide buses for outstation travel?
                            <span>+</span>
                        </summary>

                        <p>
                            Yes. You can hire our buses for outstation
                            journeys from Mumbai to destinations across
                            Maharashtra and nearby locations.
                        </p>

                    </details>


                    <details>

                        <summary>
                            Is a driver included with the bus rental?
                            <span>+</span>
                        </summary>

                        <p>
                            Yes. Our bus rental service includes an
                            experienced driver familiar with local and
                            outstation routes.
                        </p>

                    </details>


                    <details>

                        <summary>
                            How can I get a quotation?
                            <span>+</span>
                        </summary>

                        <p>
                            Call us or contact us on WhatsApp with your
                            travel date, pickup location, destination and
                            approximate group size.
                        </p>

                    </details>


                </div>

            </div>

        </section>


    </main>


    @include('components.footer')


</body>

</html>