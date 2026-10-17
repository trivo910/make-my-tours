<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>FAQs | Make My Tours & Travels</title>

    <meta name="description"
        content="Find answers to frequently asked questions about Tempo Traveller, Bus Hire, Urbania rental, bookings, airport transfers and outstation travel in Mumbai.">

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
        href="{{ asset('css/pages/faqs.css') }}">

    @vite('resources/js/app.js')

</head>

<body>

    @include('components.header')


    <main class="faq-page">


        {{-- =====================================================
             HERO
        ====================================================== --}}

        <section class="faq-hero">

            <div class="faq-hero-overlay"></div>

            <div class="faq-container faq-hero-content">

                <div class="faq-breadcrumb">

                    <a href="{{ url('/') }}">
                        Home
                    </a>

                    <span>›</span>

                    <span>
                        FAQ's
                    </span>

                </div>


                <h1>
                    FAQ<span>'s</span>
                </h1>

                <p>
                    Find answers to common questions about our
                    Tempo Traveller, Bus Hire, Urbania and other
                    travel services.
                </p>

            </div>

        </section>



        {{-- =====================================================
             FAQ MAIN
        ====================================================== --}}

        <section class="faq-main">

            <div class="faq-container faq-main-grid">


                {{-- LEFT SIDE --}}

                <div class="faq-content">

                    <span class="faq-label">
                        FREQUENTLY ASKED QUESTIONS
                    </span>

                    <h2>
                        We're Here
                        <span>to Help</span>
                    </h2>

                    <p class="faq-intro">
                        Find answers to common questions about our
                        vehicles, booking process, travel options,
                        rental services and group transportation.
                    </p>


                    <div class="faq-list">


                        {{-- FAQ 1 --}}

                        <details>

                            <summary>
                                What types of vehicles do you provide?
                                <span>+</span>
                            </summary>

                            <div class="faq-answer">

                                <p>
                                    We provide Tempo Traveller,
                                    AC Bus, Non-AC Bus and Urbania
                                    rental services for local,
                                    sightseeing, corporate, wedding
                                    and outstation travel.
                                </p>

                            </div>

                        </details>


                        {{-- FAQ 2 --}}

                        <details>

                            <summary>
                                Can I hire a Tempo Traveller in Mumbai?
                                <span>+</span>
                            </summary>

                            <div class="faq-answer">

                                <p>
                                    Yes. Tempo Traveller can be hired
                                    in Mumbai for family trips,
                                    group tours, sightseeing,
                                    corporate travel, weddings,
                                    airport transfers and outstation
                                    journeys.
                                </p>

                            </div>

                        </details>


                        {{-- FAQ 3 --}}

                        <details>

                            <summary>
                                What is the seating capacity of your Tempo Traveller?
                                <span>+</span>
                            </summary>

                            <div class="faq-answer">

                                <p>
                                    The available seating options may
                                    vary depending on the vehicle.
                                    Contact our team with your group
                                    size and travel requirement and we
                                    will suggest a suitable vehicle.
                                </p>

                            </div>

                        </details>


                        {{-- FAQ 4 --}}

                        <details>

                            <summary>
                                Do you provide Bus Hire for group travel?
                                <span>+</span>
                            </summary>

                            <div class="faq-answer">

                                <p>
                                    Yes. We provide bus rental options
                                    for group tours, school trips,
                                    corporate events, weddings,
                                    sightseeing and outstation travel.
                                </p>

                            </div>

                        </details>


                        {{-- FAQ 5 --}}

                        <details>

                            <summary>
                                Can I hire an Urbania with a driver?
                                <span>+</span>
                            </summary>

                            <div class="faq-answer">

                                <p>
                                    Yes. Our Urbania rental service is
                                    available with an experienced
                                    driver for local and outstation
                                    travel.
                                </p>

                            </div>

                        </details>


                        {{-- FAQ 6 --}}

                        <details>

                            <summary>
                                Do you provide vehicles for airport transfers?
                                <span>+</span>
                            </summary>

                            <div class="faq-answer">

                                <p>
                                    Yes. We provide vehicle rental for
                                    airport pickup and drop services
                                    for individuals, families and
                                    groups travelling to or from
                                    Mumbai airport.
                                </p>

                            </div>

                        </details>


                        {{-- FAQ 7 --}}

                        <details>

                            <summary>
                                Can I book a vehicle for outstation travel?
                                <span>+</span>
                            </summary>

                            <div class="faq-answer">

                                <p>
                                    Yes. Our vehicles can be booked
                                    for outstation journeys from
                                    Mumbai to destinations across
                                    Maharashtra and nearby locations.
                                </p>

                            </div>

                        </details>


                        {{-- FAQ 8 --}}

                        <details>

                            <summary>
                                How can I get a quotation?
                                <span>+</span>
                            </summary>

                            <div class="faq-answer">

                                <p>
                                    Contact us by phone or WhatsApp
                                    and share your travel date,
                                    pickup location, destination,
                                    number of passengers and vehicle
                                    requirement. Our team will provide
                                    the quotation based on your trip.
                                </p>

                            </div>

                        </details>


                        {{-- FAQ 9 --}}

                        <details>

                            <summary>
                                What payment methods do you accept?
                                <span>+</span>
                            </summary>

                            <div class="faq-answer">

                                <p>
                                    Payment and advance booking
                                    requirements depend on the
                                    vehicle and trip. Please contact
                                    our team for the applicable
                                    payment details for your booking.
                                </p>

                            </div>

                        </details>


                        {{-- FAQ 10 --}}

                        <details>

                            <summary>
                                Is the driver included in the rental?
                                <span>+</span>
                            </summary>

                            <div class="faq-answer">

                                <p>
                                    Driver availability depends on
                                    the selected rental service.
                                    For our group travel services,
                                    driver-assisted rental options
                                    are available. Please confirm
                                    while requesting your quotation.
                                </p>

                            </div>

                        </details>


                        {{-- FAQ 11 --}}

                        <details>

                            <summary>
                                Can I make changes to my booking?
                                <span>+</span>
                            </summary>

                            <div class="faq-answer">

                                <p>
                                    Booking changes may be possible
                                    depending on vehicle availability
                                    and how close the request is to
                                    the travel date. Contact our team
                                    as early as possible for changes.
                                </p>

                            </div>

                        </details>


                        {{-- FAQ 12 --}}

                        <details>

                            <summary>
                                Do you provide vehicles for corporate events and weddings?
                                <span>+</span>
                            </summary>

                            <div class="faq-answer">

                                <p>
                                    Yes. We provide group transportation
                                    for corporate events, weddings,
                                    functions, family gatherings and
                                    other special occasions.
                                </p>

                            </div>

                        </details>


                    </div>

                </div>



                {{-- RIGHT SIDE --}}

                <aside class="faq-sidebar">


                    {{-- CONTACT CARD --}}

                    <div class="faq-contact-card">

                        <span class="faq-label">
                            NEED MORE HELP?
                        </span>

                        <h3>
                            Talk to Our Team
                        </h3>

                        <p>
                            Still have questions? Our team is happy
                            to help you with your travel requirements.
                        </p>


                        <div class="faq-contact-item">

                            <div class="faq-contact-icon">
                                ☎
                            </div>

                            <div>

                                <strong>
                                    Call Us Now
                                </strong>

                                <a href="tel:+917718036300">
                                    +91 77180 36300
                                </a>

                            </div>

                        </div>


                        <div class="faq-contact-item">

                            <div class="faq-contact-icon faq-whatsapp">
                                ✓
                            </div>

                            <div>

                                <strong>
                                    WhatsApp Us
                                </strong>

                                <a href="https://wa.me/917718036300"
                                   target="_blank">

                                    +91 77180 36300

                                </a>

                            </div>

                        </div>


                        <div class="faq-contact-item">

                            <div class="faq-contact-icon">
                                ✉
                            </div>

                            <div>

                                <strong>
                                    Email Us
                                </strong>

                                <a href="mailto:makemytoursplanner@gmail.com">

                                    makemytoursplanner@gmail.com

                                </a>

                            </div>

                        </div>

                    </div>



                    {{-- SUPPORT IMAGE --}}

                    <div class="faq-support-image">

                        <img
                            src="{{ asset('images/Friendly Travel Support Team.png') }}"
                            alt="Make My Tours & Travels Customer Support">

                        <div class="faq-support-badge">
                            We're Happy<br>
                            <span>to Help You!</span>
                        </div>

                    </div>


                </aside>

            </div>

        </section>



        {{-- =====================================================
             QUICK INFORMATION
        ====================================================== --}}

        <section class="faq-information">

            <div class="faq-container">

                <div class="faq-section-heading">

                    <span class="faq-label">
                        QUICK INFORMATION
                    </span>

                    <h2>
                        Helpful Information
                        <span>for Your Trip</span>
                    </h2>

                    <p>
                        Here are some useful details to help you plan
                        your journey with Make My Tours & Travels.
                    </p>

                </div>


                <div class="faq-info-grid">


                    {{-- CARD 1 --}}

                    <div class="faq-info-card">

                        <div class="faq-info-icon">
                            📅
                        </div>

                        <h3>
                            Advance Booking
                        </h3>

                        <p>
                            We recommend booking in advance,
                            especially during weekends, holidays
                            and peak travel season.
                        </p>

                    </div>


                    {{-- CARD 2 --}}

                    <div class="faq-info-card">

                        <div class="faq-info-icon">
                            📄
                        </div>

                        <h3>
                            Custom Packages
                        </h3>

                        <p>
                            We provide flexible travel options based
                            on your travel date, destination and
                            group size.
                        </p>

                    </div>


                    {{-- CARD 3 --}}

                    <div class="faq-info-card">

                        <div class="faq-info-icon">
                            📍
                        </div>

                        <h3>
                            Local & Outstation
                        </h3>

                        <p>
                            Available for Mumbai local travel,
                            sightseeing as well as outstation trips
                            across Maharashtra.
                        </p>

                    </div>


                    {{-- CARD 4 --}}

                    <div class="faq-info-card">

                        <div class="faq-info-icon">
                            ☎
                        </div>

                        <h3>
                            Travel Support
                        </h3>

                        <p>
                            Our team is available to assist you with
                            bookings, changes and travel information.
                        </p>

                    </div>


                </div>

            </div>

        </section>



        {{-- =====================================================
             CTA
        ====================================================== --}}

        <section class="faq-cta">

            <div class="faq-cta-overlay"></div>

            <div class="faq-container faq-cta-inner">

                <div>

                    <span class="faq-cta-label">
                        STILL HAVE QUESTIONS?
                    </span>

                    <h2>
                        We're Just a
                        <span>Call or Message Away</span>
                    </h2>

                    <p>
                        Contact our team and we'll be happy to help
                        you with your travel plans.
                    </p>

                </div>


                <div class="faq-cta-buttons">

                    <a href="tel:+917718036300"
                       class="faq-btn faq-btn-orange">

                        <span>☎</span>

                        Call Us Now

                    </a>


                    <a href="https://wa.me/917718036300"
                       target="_blank"
                       class="faq-btn faq-btn-outline">

                        <span>✓</span>

                        WhatsApp Us

                    </a>

                </div>

            </div>

        </section>


    </main>


    @include('components.footer')


</body>

</html>