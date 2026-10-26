<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tempo Traveller Hire – Make My Tours &amp; Travels</title>

    <meta name="description"
        content="Hire a Tempo Traveller in Mumbai for family trips, weddings, corporate travel, Mumbai Darshan, airport transfers and outstation journeys. Get a quote from Make My Tours & Travels.">

    @include('components.open-graph', [
        'socialTitle' => 'Tempo Traveller Hire in Mumbai | Make My Tours & Travels',
        'socialDescription' => 'Hire a Tempo Traveller in Mumbai for family trips, weddings, corporate travel, Mumbai Darshan, airport transfers and outstation journeys.',
        'socialImage' => asset('images/tempo1.webp'),
        'socialImageAlt' => 'Tempo Traveller available for hire in Mumbai',
    ])

    <meta name="keywords"
        content="Tempo Traveller Hire in Mumbai, Tempo Traveller on Rent in Mumbai, Tempo Traveller Rental Mumbai, 12 Seater Tempo Traveller Mumbai, Tempo Traveller for Outstation">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/tempo-traveller-hire.css') }}">
    @include('components.tagmanager')
    @vite('resources/js/app.js')
</head>

<body>

    @include('components.header')

    <main>
        <h1 class="visually-hidden">Tempo Traveller Hire – Make My Tours &amp; Travels</h1>

        {{-- HERO SECTION --}}
        <section class="tt-hero">

            <div class="tt-hero-overlay"></div>

            <div class="container tt-hero-container">

                <div class="tt-hero-content">

                    <span class="tt-eyebrow">
                        TEMPO TRAVELLER HIRE IN MUMBAI
                    </span>

                    <h1>
                        Comfortable Group Travel
                        <span>with Tempo Traveller</span>
                    </h1>

                    <p>
                        Hire a comfortable Tempo Traveller in Mumbai for family trips,
                        corporate travel, weddings, Mumbai Darshan, airport transfers
                        and outstation journeys.
                    </p>

                    <div class="tt-hero-buttons">

                        <a href="#tt-enquiry" class="btn-primary">
                            Get a Quote
                            <span>→</span>
                        </a>

                        <a href="tel:+917718036300" class="btn-outline">
                            <span>☎</span>
                            Call +91 77180 36300
                        </a>

                    </div>

                </div>

            </div>

        </section>


        {{-- ENQUIRY FORM --}}
        <section class="tt-enquiry-wrapper" id="tt-enquiry">

            <div class="container">

                <div class="tt-enquiry-box">

                    <div class="tt-enquiry-heading">

                        <span>PLAN YOUR TRIP</span>

                        <h2>
                            Plan Your <strong>Tempo Traveller</strong> Trip
                        </h2>

                    </div>

                    <form action="#" method="POST" class="tt-enquiry-form">

                        @csrf

                        <div class="tt-form-group">
                            <label>Pickup Location</label>

                            <input
                                type="text"
                                name="pickup"
                                placeholder="Enter Pickup Location">
                        </div>

                        <div class="tt-form-group">
                            <label>Destination</label>

                            <input
                                type="text"
                                name="destination"
                                placeholder="Enter Destination">
                        </div>

                        <div class="tt-form-group">
                            <label>Travel Date</label>

                            <input
                                type="date"
                                name="travel_date">
                        </div>

                        <div class="tt-form-group">
                            <label>Trip Type</label>

                            <select name="trip_type">
                                <option value="">Select Trip Type</option>
                                <option value="local">Local</option>
                                <option value="outstation">Outstation</option>
                            </select>
                        </div>

                        <div class="tt-form-group">
                            <label>Passengers</label>

                            <select name="passengers">
                                <option value="">Select Group Size</option>
                                <option value="1-6">1 - 6</option>
                                <option value="7-12">7 - 12</option>
                                <option value="13-17">13 - 17</option>
                                <option value="18-20">18 - 20</option>
                                <option value="20+">20+</option>
                            </select>
                        </div>

                        <div class="tt-form-group">
                            <label>Phone Number</label>

                            <input
                                type="tel"
                                name="phone"
                                placeholder="Enter Mobile Number">
                        </div>

                        <button type="submit" class="tt-submit-btn">
                            Get Best Quote
                            <span>→</span>
                        </button>

                    </form>

                </div>

            </div>

        </section>


        {{-- INTRO SECTION --}}
        <section class="tt-intro section-padding">

            <div class="container tt-two-column">

                <div class="tt-content">

                    <span class="section-label">
                        TEMPO TRAVELLER RENTAL IN MUMBAI
                    </span>

                    <h2>
                        Travel Together in Comfort with
                        <span>Make My Tours & Travels</span>
                    </h2>

                    <p>
                        Planning a family outing, corporate trip, wedding transportation
                        or an outstation journey from Mumbai? A Tempo Traveller is a
                        convenient option when you want your entire group to travel
                        together in one comfortable vehicle.
                    </p>

                    <p>
                        Make My Tours & Travels provides Tempo Traveller hire in Mumbai
                        for local and outstation travel. Our vehicles are suitable for
                        family holidays, sightseeing, airport transfers, corporate
                        travel, wedding functions, school and college outings, and
                        group tours.
                    </p>

                    <p>
                        With experienced drivers and comfortable seating, we help make
                        group travel easier from pickup to destination. Whether you need
                        a vehicle for a few hours, a full day or a longer outstation
                        trip, our team can help you choose a suitable option based on
                        your group size and travel plan.
                    </p>

                    <a href="#tt-enquiry" class="text-btn">
                        Enquire for Your Trip
                        <span>→</span>
                    </a>

                </div>

                <div class="tt-image-box">

                    <img
                        src="{{ asset('images/tempo1.webp') }}"
                        alt="Tempo Traveller hire in Mumbai">

                    <div class="tt-floating-card top-card">
                        <span class="icon">✓</span>

                        <div>
                            <strong>Comfortable Seating</strong>
                            <small>For Group Travel</small>
                        </div>
                    </div>

                    <div class="tt-floating-card bottom-card">
                        <span class="icon">✓</span>

                        <div>
                            <strong>Safe & Reliable</strong>
                            <small>Travel Experience</small>
                        </div>
                    </div>

                </div>

            </div>

        </section>


        {{-- FLEET SECTION --}}
        <section class="tt-fleet section-padding">

            <div class="container">

                <div class="section-heading">

                    <span class="section-label">
                        OUR TEMPO TRAVELLER
                    </span>

                    <h2>
                        Choose the Right Tempo Traveller
                        <span>for Your Group</span>
                    </h2>

                    <p>
                        Select a suitable vehicle based on your group size,
                        destination and travel requirements.
                    </p>

                </div>


                <div class="tt-fleet-grid">

                    {{-- CARD 1 --}}
                    <div class="tt-fleet-card">

                        <div class="fleet-image">

                            <img
                                src="{{ asset('images/tempo/12-seater-tempo.jpg') }}"
                                alt="12 Seater Tempo Traveller in Mumbai">

                        </div>

                        <div class="fleet-content">

                            <h3>12 Seater Tempo Traveller</h3>

                            <p>
                                A comfortable choice for families, friends and
                                small groups travelling around Mumbai or planning
                                an outstation trip.
                            </p>

                            <ul>
                                <li>Family Trips</li>
                                <li>Mumbai Darshan</li>
                                <li>Outstation Travel</li>
                            </ul>

                            <a href="#tt-enquiry" class="fleet-btn">
                                Enquire Now
                            </a>

                        </div>

                    </div>


                    {{-- CARD 2 --}}
                    <div class="tt-fleet-card">

                        <div class="fleet-image">

                            <img
                                src="{{ asset('images/tempo/17-seater-tempo.jpg') }}"
                                alt="17 Seater Tempo Traveller">

                        </div>

                        <div class="fleet-content">

                            <h3>17 Seater Tempo Traveller</h3>

                            <p>
                                Ideal for medium-sized groups, wedding guests,
                                corporate outings and family tours.
                            </p>

                            <ul>
                                <li>Corporate Trips</li>
                                <li>Weddings</li>
                                <li>Group Tours</li>
                            </ul>

                            <a href="#tt-enquiry" class="fleet-btn">
                                Enquire Now
                            </a>

                        </div>

                    </div>


                    {{-- CARD 3 --}}
                    <div class="tt-fleet-card">

                        <div class="fleet-image">

                            <img
                                src="{{ asset('images/tempo/20-seater-tempo.jpg') }}"
                                alt="20 Seater Tempo Traveller">

                        </div>

                        <div class="fleet-content">

                            <h3>20 Seater Tempo Traveller</h3>

                            <p>
                                A practical option for larger groups who want
                                to travel together with comfortable seating.
                            </p>

                            <ul>
                                <li>School Trips</li>
                                <li>Events</li>
                                <li>Large Families</li>
                            </ul>

                            <a href="#tt-enquiry" class="fleet-btn">
                                Enquire Now
                            </a>

                        </div>

                    </div>


                    {{-- CARD 4 --}}
                    <div class="tt-fleet-card">

                        <div class="fleet-image">

                            <img
                                src="{{ asset('images/tempo/luxury-tempo.jpg') }}"
                                alt="Luxury Tempo Traveller">

                        </div>

                        <div class="fleet-content">

                            <h3>Luxury Tempo Traveller</h3>

                            <p>
                                Looking for extra comfort for a long journey?
                                Ask about available premium Tempo Traveller options.
                            </p>

                            <ul>
                                <li>Premium Trips</li>
                                <li>Long Journeys</li>
                                <li>Special Occasions</li>
                            </ul>

                            <a href="#tt-enquiry" class="fleet-btn">
                                Get a Quote
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        {{-- WHY CHOOSE US --}}
        <section class="tt-why">

            <div class="container tt-why-wrapper">

                <div class="tt-why-content">

                    <span class="section-label">
                        WHY CHOOSE US
                    </span>

                    <h2>
                        Why Hire a Tempo Traveller from
                        Make My Tours & Travels?
                    </h2>

                    <div class="tt-benefits">

                        <div class="tt-benefit">
                            <div class="benefit-icon">✓</div>

                            <div>
                                <h3>Comfortable Seating</h3>
                                <p>
                                    Travel together without splitting your
                                    group between multiple vehicles.
                                </p>
                            </div>
                        </div>


                        <div class="tt-benefit">
                            <div class="benefit-icon">★</div>

                            <div>
                                <h3>Experienced Drivers</h3>
                                <p>
                                    Professional drivers familiar with Mumbai
                                    and popular routes.
                                </p>
                            </div>
                        </div>


                        <div class="tt-benefit">
                            <div class="benefit-icon">⚙</div>

                            <div>
                                <h3>Well-Maintained Vehicles</h3>
                                <p>
                                    Vehicles are maintained to provide a
                                    comfortable travel experience.
                                </p>
                            </div>
                        </div>


                        <div class="tt-benefit">
                            <div class="benefit-icon">◷</div>

                            <div>
                                <h3>Flexible Travel Options</h3>
                                <p>
                                    Suitable for local trips, full-day bookings
                                    and outstation journeys.
                                </p>
                            </div>
                        </div>


                        <div class="tt-benefit">
                            <div class="benefit-icon">♟</div>

                            <div>
                                <h3>Group-Friendly Travel</h3>
                                <p>
                                    Perfect for families, friends, corporate
                                    teams and events.
                                </p>
                            </div>
                        </div>


                        <div class="tt-benefit">
                            <div class="benefit-icon">✓</div>

                            <div>
                                <h3>Reliable Service</h3>
                                <p>
                                    We focus on punctual pickup and comfortable
                                    journeys.
                                </p>
                            </div>
                        </div>

                    </div>

                </div>


                <div class="tt-why-image">

                    <img
                        src="{{ asset('images/tempo/tempo-interior.jpg') }}"
                        alt="Comfortable Tempo Traveller interior">

                </div>

            </div>

        </section>


        {{-- USE CASES --}}
        <section class="tt-occasions section-padding">

            <div class="container">

                <div class="section-heading left-heading">

                    <span class="section-label">
                        GROUP TRAVEL
                    </span>

                    <h2>
                        Perfect for <span>Every Occasion</span>
                    </h2>

                </div>


                <div class="tt-occasion-grid">

                    <div class="tt-occasion-card">
                        <span>👨‍👩‍👧‍👦</span>
                        <h3>Family Trips</h3>
                        <p>
                            Enjoy your family vacation together without
                            worrying about multiple vehicles.
                        </p>
                    </div>


                    <div class="tt-occasion-card">
                        <span>💍</span>
                        <h3>Weddings</h3>
                        <p>
                            Comfortable transportation for wedding guests
                            between hotels and venues.
                        </p>
                    </div>


                    <div class="tt-occasion-card">
                        <span>💼</span>
                        <h3>Corporate Travel</h3>
                        <p>
                            Convenient group transportation for meetings,
                            conferences and team outings.
                        </p>
                    </div>


                    <div class="tt-occasion-card">
                        <span>✈</span>
                        <h3>Airport Transfers</h3>
                        <p>
                            Group pickup and drop services to and from
                            Mumbai airport.
                        </p>
                    </div>


                    <div class="tt-occasion-card">
                        <span>🏙</span>
                        <h3>Mumbai Darshan</h3>
                        <p>
                            Explore Mumbai's popular attractions comfortably
                            with your family or group.
                        </p>
                    </div>


                    <div class="tt-occasion-card">
                        <span>📍</span>
                        <h3>Outstation Trips</h3>
                        <p>
                            Plan comfortable road trips from Mumbai to
                            destinations across Maharashtra.
                        </p>
                    </div>

                </div>

            </div>

        </section>


        {{-- DESTINATIONS --}}
        <section class="tt-destinations section-padding">

            <div class="container">

                <div class="section-heading left-heading">

                    <span class="section-label">
                        POPULAR OUTSTATION TRIPS
                    </span>

                    <h2>
                        Explore Maharashtra with a
                        <span>Tempo Traveller</span>
                    </h2>

                    <p>
                        Planning a weekend getaway or family trip from Mumbai?
                        Travel together comfortably in a Tempo Traveller.
                    </p>

                </div>


                <div class="tt-destination-grid">

                    <div class="destination-card">
                        <img src="{{ asset('images/destinations/lonavala.jpg') }}" alt="Tempo Traveller for Lonavala">
                        <h3>Lonavala & Khandala</h3>
                        <p>Weekend getaway from Mumbai.</p>
                    </div>

                    <div class="destination-card">
                        <img src="{{ asset('images/destinations/mahabaleshwar.jpg') }}" alt="Tempo Traveller for Mahabaleshwar">
                        <h3>Mahabaleshwar</h3>
                        <p>Perfect for family holidays.</p>
                    </div>

                    <div class="destination-card">
                        <img src="{{ asset('images/destinations/shirdi.jpg') }}" alt="Tempo Traveller for Shirdi">
                        <h3>Shirdi</h3>
                        <p>Comfortable pilgrimage journeys.</p>
                    </div>

                    <div class="destination-card">
                        <img src="{{ asset('images/destinations/nashik.jpg') }}" alt="Tempo Traveller for Nashik">
                        <h3>Nashik</h3>
                        <p>Family and leisure trips.</p>
                    </div>

                    <div class="destination-card">
                        <img src="{{ asset('images/destinations/pune.jpg') }}" alt="Tempo Traveller for Pune">
                        <h3>Pune</h3>
                        <p>Convenient group transportation.</p>
                    </div>

                    <div class="destination-card">
                        <img src="{{ asset('images/destinations/alibaug.jpg') }}" alt="Tempo Traveller for Alibaug">
                        <h3>Alibaug</h3>
                        <p>Beach trips and weekend getaways.</p>
                    </div>

                    <div class="destination-card">
                        <img src="{{ asset('images/destinations/goa.jpg') }}" alt="Tempo Traveller for Goa">
                        <h3>Goa</h3>
                        <p>Long group road trips.</p>
                    </div>

                    <div class="destination-card">
                        <img src="{{ asset('images/destinations/konkan.jpg') }}" alt="Tempo Traveller for Konkan">
                        <h3>Konkan</h3>
                        <p>Explore beaches and scenic routes.</p>
                    </div>

                </div>

            </div>

        </section>


        {{-- SERVICE AREAS + PRICING --}}
        <!-- <section class="tt-service-price section-padding">

            <div class="container tt-service-grid">

                <div class="tt-service-content">

                    <span class="section-label">
                        TEMPO TRAVELLER HIRE ACROSS MUMBAI
                    </span>

                    <h2>
                        Tempo Traveller Rental
                        <span>Near You</span>
                    </h2>

                    <p>
                        Make My Tours & Travels provides Tempo Traveller rental
                        services across Mumbai and nearby areas. Share your pickup
                        location and travel plan with us.
                    </p>

                    <div class="location-pills">

                        <span>Andheri</span>
                        <span>Bandra</span>
                        <span>Borivali</span>
                        <span>Goregaon</span>
                        <span>Malad</span>
                        <span>Kandivali</span>
                        <span>Dadar</span>
                        <span>Kurla</span>
                        <span>Powai</span>
                        <span>Chembur</span>
                        <span>Ghatkopar</span>
                        <span>Thane</span>
                        <span>Navi Mumbai</span>

                    </div>

                </div>


                <div class="tt-price-box">

                    <div class="price-icon">
                        ₹
                    </div>

                    <div>

                        <span class="section-label">
                            TEMPO TRAVELLER PRICING
                        </span>

                        <h2>
                            How Much Does a Tempo Traveller
                            Cost in Mumbai?
                        </h2>

                        <p>
                            Rental charges depend on the number of passengers,
                            vehicle type, travel distance, trip duration,
                            pickup location and whether the journey is local
                            or outstation.
                        </p>

                        <a href="#tt-enquiry" class="btn-primary">
                            Get a Tempo Traveller Quote
                            <span>→</span>
                        </a>

                    </div>

                </div>

            </div>

        </section> -->


        {{-- BOOKING STEPS --}}
        <section class="tt-booking section-padding">

            <div class="container">

                <div class="section-heading">

                    <span class="section-label">
                        EASY BOOKING
                    </span>

                    <h2>
                        Book Your Tempo Traveller in
                        <span>3 Easy Steps</span>
                    </h2>

                </div>


                <div class="tt-steps">

                    <div class="tt-step">

                        <div class="step-number">01</div>

                        <div>
                            <h3>Share Your Trip Details</h3>

                            <p>
                                Tell us your pickup location, destination,
                                date and number of passengers.
                            </p>
                        </div>

                    </div>


                    <div class="step-arrow">→</div>


                    <div class="tt-step">

                        <div class="step-number">02</div>

                        <div>
                            <h3>Get Your Vehicle & Quote</h3>

                            <p>
                                Our team will recommend a suitable vehicle
                                and provide a quotation.
                            </p>
                        </div>

                    </div>


                    <div class="step-arrow">→</div>


                    <div class="tt-step">

                        <div class="step-number">03</div>

                        <div>
                            <h3>Confirm Your Booking</h3>

                            <p>
                                Confirm your vehicle and travel details
                                and get ready for your journey.
                            </p>
                        </div>

                    </div>

                </div>

            </div>

        </section>


        {{-- CTA BANNER --}}
        <section class="tt-cta">

            <div class="container tt-cta-content">

                <div>

                    <span class="section-label">
                        READY TO TRAVEL?
                    </span>

                    <h2>
                        Planning a Group Trip from Mumbai?
                    </h2>

                    <p>
                        Travel together. Travel comfortably.
                        Hire a Tempo Traveller from Make My Tours & Travels.
                    </p>

                </div>

                <div class="tt-cta-buttons">

                    <a href="#tt-enquiry" class="btn-primary">
                        Get a Quote
                        <span>→</span>
                    </a>

                    <a href="tel:+917718036300" class="btn-outline">
                        ☎ Call +91 77180 36300
                    </a>

                </div>

            </div>

        </section>


        {{-- FAQ --}}
        <section class="tt-faq section-padding">

            <div class="container">

                <div class="section-heading left-heading">

                    <span class="section-label">
                        FAQ
                    </span>

                    <h2>
                        Frequently Asked Questions About
                        <span>Tempo Traveller Hire</span>
                    </h2>

                </div>


                <div class="tt-faq-grid">

                    <details>
                        <summary>
                            What is a Tempo Traveller?
                            <span>+</span>
                        </summary>

                        <p>
                            A Tempo Traveller is a group passenger vehicle
                            designed for comfortable travel with family,
                            friends, corporate teams and other groups.
                        </p>
                    </details>


                    <details>
                        <summary>
                            Can I hire a Tempo Traveller for an outstation trip?
                            <span>+</span>
                        </summary>

                        <p>
                            Yes. Tempo Travellers can be hired for outstation
                            journeys from Mumbai, subject to vehicle availability
                            and your travel requirements.
                        </p>
                    </details>


                    <details>
                        <summary>
                            Can I hire a Tempo Traveller for Mumbai Darshan?
                            <span>+</span>
                        </summary>

                        <p>
                            Yes. A Tempo Traveller is a convenient option for
                            families and groups planning Mumbai sightseeing.
                        </p>
                    </details>


                    <details>
                        <summary>
                            Can I hire a Tempo Traveller for a wedding?
                            <span>+</span>
                        </summary>

                        <p>
                            Yes. Tempo Travellers are suitable for transporting
                            wedding guests between hotels, venues and other locations.
                        </p>
                    </details>


                    <details>
                        <summary>
                            Is a driver included with the Tempo Traveller?
                            <span>+</span>
                        </summary>

                        <p>
                            Tempo Traveller bookings can be provided with a
                            professional driver. Please confirm driver and
                            booking details while requesting your quotation.
                        </p>
                    </details>


                    <details>
                        <summary>
                            How many passengers can travel in a Tempo Traveller?
                            <span>+</span>
                        </summary>

                        <p>
                            Seating capacity depends on the vehicle available.
                            Contact our team with your group size and we will
                            suggest a suitable option.
                        </p>
                    </details>


                    <details>
                        <summary>
                            How is Tempo Traveller rental pricing calculated?
                            <span>+</span>
                        </summary>

                        <p>
                            Pricing depends on seating capacity, travel distance,
                            duration, route, local or outstation travel and vehicle type.
                        </p>
                    </details>


                    <details>
                        <summary>
                            Can I hire a Tempo Traveller for one day?
                            <span>+</span>
                        </summary>

                        <p>
                            One-day rental options may be available depending
                            on your route, schedule and vehicle availability.
                        </p>
                    </details>


                    <details>
                        <summary>
                            Do you provide airport pickup and drop?
                            <span>+</span>
                        </summary>

                        <p>
                            Group airport pickup and drop services can be arranged
                            based on vehicle availability and your requirements.
                        </p>
                    </details>


                    <details>
                        <summary>
                            How can I book a Tempo Traveller in Mumbai?
                            <span>+</span>
                        </summary>

                        <p>
                            Share your travel date, pickup location, destination
                            and number of passengers with our team. We will help
                            you select a suitable vehicle and provide a quotation.
                        </p>
                    </details>

                </div>

            </div>

        </section>


        {{-- FINAL CTA --}}
        <section class="tt-final-cta">

            <div class="container">

                <div>

                    <span>MAKE YOUR JOURNEY COMFORTABLE</span>

                    <h2>
                        Ready to Travel Together?
                    </h2>

                    <p>
                        Book a comfortable Tempo Traveller for your next journey
                        from Mumbai.
                    </p>

                </div>

                <div class="tt-final-buttons">

                    <a href="#tt-enquiry" class="white-btn">
                        Get Your Quote →
                    </a>

                    <a href="tel:+917718036300" class="dark-outline-btn">
                        ☎ Call Us
                    </a>

                </div>

            </div>

        </section>

    </main>


    @include('components.footer')

</body>

</html>