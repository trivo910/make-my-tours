<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Discover Mumbai and travel in comfort with Make My Tours & Travels. Book buses, tempo travellers and tailored city tours.">
    <title>Make My Tours &amp; Travels | Your Trusted Travel Partner Since 2008</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800&family=Heebo:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/home.css') }}">
    @vite('resources/js/app.js')
</head>
<body>
    <main>
        <section class="hero" id="home">
            @include('components.header')
            <div class="hero-inner container">
                <div class="hero-copy">
                    <!-- <p class="eyebrow">Travel better. Go further.</p> -->
                    <h1>Make My Tours &amp; Travels<br>Your Trusted Travel Partner Since 2008</h1>
                    <p class="hero-description">Welcome to Mumbai Explorations, where we strive to provide our guests with a richer, more nuanced understanding of the vibrant city of Mumbai through our thoughtfully curated day tours.</p>
                    <div class="hero-actions">
                        <a class="button button-orange" href="#booking">Get Started</a>
                        <a class="play-link" href="#journey"><span class="play-icon" aria-hidden="true">▶</span> Play Video</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="booking-section" id="booking" aria-label="Plan your journey">
            <form class="booking-card" action="{{ url('/') }}" method="get">
                <label>
                    <span>From</span>
                    <select name="from" aria-label="Departure destination">
                        <option value="">Select Destination</option>
                        <option>Mumbai</option>
                        <option>Pune</option>
                        <option>Nashik</option>
                    </select>
                </label>
                <label>
                    <span>To</span>
                    <select name="to" aria-label="Arrival destination">
                        <option value="">Select Destination</option>
                        <option>Mumbai</option>
                        <option>Pune</option>
                        <option>Nashik</option>
                    </select>
                </label>
                <label>
                    <span>When</span>
                    <input type="date" name="date" aria-label="Travel date">
                </label>
                <label>
                    <span>Time</span>
                    <select name="time" aria-label="Departure time">
                        <option value="">Select Time</option>
                        <option>Morning</option>
                        <option>Afternoon</option>
                        <option>Evening</option>
                    </select>
                </label>
                <label>
                    <span>Seat</span>
                    <input type="number" min="1" max="50" name="seats" placeholder="Select Seat" aria-label="Number of seats">
                </label>
                <button class="button button-orange booking-submit" type="submit">Submit Button</button>
            </form>
        </section>

        <section class="about-section section-space container" id="about">
            <div class="about-copy">
                <p class="section-kicker">About Company</p>
                <h2>Welcome to <span>Mumbai</span><br>Explorations</h2>
                <p>We strive to provide our guests with a richer, more nuanced understanding of the vibrant city of Mumbai through our thoughtfully curated day tours. Our unique offerings blend the well-known landmarks with off-the-beaten-path treasures that even lifelong Mumbaikars may not have discovered. With experiences like our engaging Bicycle Tour, participants traverse iconic sights such as the Gateway of India and CST Station while also uncovering hidden gems like Sassoon Dock and the Bombay Panjrapole cow sanctuary. Each tour is meticulously designed to help you connect deeply with Mumbai’s culture and history.</p>
                <p>At Mumbai Explorations, we believe in making a positive impact on the local community. That’s why we reinvest 80% of our profits—approximately 30% of our total revenue—back into initiatives that support sustainable development within the neighborhoods we explore. By choosing us, you’re not just discovering Mumbai; you’re also contributing to its growth and enriching lives in the very communities you visit. Join us for an unforgettable journey through this dynamic city!</p>
                <a class="button button-orange button-small" href="#why-us">More About Us</a>
            </div>
            <div class="about-gallery">
                <img class="about-main-image" src="{{ asset('images/bd-explorations-1.png') }}" alt="A tour bus visiting the Gateway of India">
                <img class="about-inset-image" src="{{ asset('images/mb-explorations-2.png') }}" alt="A traveller enjoying a Mumbai bus tour">
                <div class="experience-badge">
                    <span class="badge-icon" aria-hidden="true">◎</span>
                    <span><strong>15<sup>+</sup></strong><small>Years Experience</small></span>
                </div>
            </div>
        </section>

        <section class="why-section" id="why-us">
            <div class="why-photo" role="img" aria-label="A family ready to travel with Make My Tours"></div>
            <div class="why-panel">
                <div class="why-content">
                    <p class="section-kicker">Why Choose Us</p>
                    <h2>Make My Tours &amp; Travels –<br>Trusted Since 2008</h2>
                    <p>Make My Tours &amp; Travels offers comfortable journeys with well-maintained vehicles, experienced drivers, and carefully planned tours, ensuring every trip is safe, convenient, and memorable.</p>
                    <div class="stats-grid">
                        <div class="stat"><span aria-hidden="true">♧</span><strong>15<sup>+</sup></strong><small>Years of Experience</small></div>
                        <div class="stat"><span aria-hidden="true">▣</span><strong>5000<sup>+</sup></strong><small>Happy Travelers</small></div>
                        <div class="stat"><span aria-hidden="true">♙</span><strong>1000<sup>+</sup></strong><small>Successful Tours</small></div>
                        <div class="stat"><span aria-hidden="true">♧</span><strong>8000<sup>+</sup></strong><small>Customer Satisfaction</small></div>
                    </div>
                </div>
            </div>
            <aside class="photo-callout">
                <h3>Travel with Make My Tours &amp; Travels</h3>
                <p>Experience comfortable, reliable, and affordable tours with our dedicated team, ensuring every journey is smooth, enjoyable, and memorable from start to finish.</p>
                <a href="#booking">Book Your Tour <span aria-hidden="true">→</span></a>
            </aside>
        </section>

        <section class="services-section section-space container" id="services">
            <div class="section-heading centered">
                <p class="section-kicker">Our Services</p>
                <h2>Explore Our <span>Travel</span> Services</h2>
                <p>Make My Tours &amp; Travels offers reliable and comfortable travel solutions for families, tourists, corporate groups, and special occasions with professional service and affordable pricing.</p>
            </div>
            <div class="services-grid">
                <article class="service-card">
                    <span class="service-icon" aria-hidden="true">♧</span>
                    <h3>Wedding Guests</h3>
                    <p>Comfortable transportation for wedding guests with punctual service and spacious vehicles for every celebration.</p>
                    <a href="#booking">Learn More <span aria-hidden="true">→</span></a>
                </article>
                <article class="service-card featured">
                    <span class="service-icon" aria-hidden="true">▱</span>
                    <h3>Corporate Travelers</h3>
                    <p>Professional transport solutions for business meetings, corporate events, conferences, and employee travel.</p>
                    <a href="#booking">Learn More <span aria-hidden="true">→</span></a>
                </article>
                <article class="service-card">
                    <span class="service-icon" aria-hidden="true">♧</span>
                    <h3>Private Travelers</h3>
                    <p>Flexible travel options for families, friends, and individuals seeking safe and comfortable journeys.</p>
                    <a href="#booking">Learn More <span aria-hidden="true">→</span></a>
                </article>
                <article class="service-card">
                    <span class="service-icon" aria-hidden="true">✈</span>
                    <h3>Airport Shuttles</h3>
                    <p>Reliable airport pickup and drop services with timely arrivals and comfortable travel experiences.</p>
                    <a href="#booking">Learn More <span aria-hidden="true">→</span></a>
                </article>
                <article class="service-card">
                    <span class="service-icon" aria-hidden="true">▤</span>
                    <h3>Tours &amp; Excursions</h3>
                    <p>Explore Mumbai’s highlights and hidden gems with knowledgeable guides and convenient travel assistance.</p>
                    <a href="#booking">Learn More <span aria-hidden="true">→</span></a>
                </article>
                <article class="service-card">
                    <span class="service-icon" aria-hidden="true">♧</span>
                    <h3>Budget Car Rental</h3>
                    <p>Affordable car rental options for local travel, business trips, and family outings across Mumbai.</p>
                    <a href="#booking">Learn More <span aria-hidden="true">→</span></a>
                </article>
            </div>
        </section>

        <section class="journey-banner" id="journey">
            <div class="journey-inner container">
                <div class="journey-art">
                    <img src="{{ asset('images/Book-Your-Journey-Today.png') }}" alt="Make My Tours mobile booking screens">
                </div>
                <div class="journey-copy">
                    <p class="section-kicker">Book Your Journey Today</p>
                    <h2>Travel Comfortably with<br>Make My Tours &amp; Travels</h2>
                    <p>Whether you're planning a family trip, corporate travel, or exploring Mumbai, we make it easy to book a ride. Choose from our wide range of vehicles and enjoy a safe, reliable, and comfortable journey. With well-maintained vehicles and experienced drivers, we make every trip memorable.</p>
                    <a class="button button-orange button-small" href="#booking">Book Now</a>
                </div>
            </div>
        </section>

        <section class="fleet-section section-space container" id="fleet">
            <div class="fleet-heading">
                <div class="section-heading">
                    <p class="section-kicker">Our Bus</p>
                    <h2>Our <span>Bus</span> Collection</h2>
                </div>
                <p>Choose from our well-maintained fleet of comfortable buses, designed to meet the travel needs of families, corporate groups, schools, tourists, and special occasions across Mumbai and beyond.</p>
                <a class="button button-orange button-small" href="#fleet">All Vehicle</a>
            </div>
            <div class="fleet-grid">
                <article class="vehicle-card">
                    <img src="{{ asset('images/luxury-ac-coach.png') }}" alt="Luxury air-conditioned coach">
                    <div class="vehicle-details">
                        <h3>AC Bus</h3><p class="vehicle-price">₹00<small>/day</small></p>
                        <ul><li>50 Seat</li><li>2 Driver Staff</li><li>Manual</li><li>Fully Insured</li></ul>
                        <div class="vehicle-actions"><a class="button button-orange button-small" href="#booking">Book Now</a><a href="#booking">View Details <span aria-hidden="true">➜</span></a></div>
                    </div>
                </article>
                <article class="vehicle-card">
                    <img src="{{ asset('images/non-ac-bus.png') }}" alt="Non-air-conditioned passenger bus">
                    <div class="vehicle-details">
                        <h3>Non-AC Bus</h3><p class="vehicle-price">₹00<small>/day</small></p>
                        <ul><li>42 Seat</li><li>2 Driver Staff</li><li>Manual</li><li>Fully Insured</li></ul>
                        <div class="vehicle-actions"><a class="button button-orange button-small" href="#booking">Book Now</a><a href="#booking">View Details <span aria-hidden="true">➜</span></a></div>
                    </div>
                </article>
                <article class="vehicle-card">
                    <img src="{{ asset('images/mini-but.png') }}" alt="Tempo traveller minibus">
                    <div class="vehicle-details">
                        <h3>Tempo</h3><p class="vehicle-price">₹00<small>/day</small></p>
                        <ul><li>12 Seat</li><li>1 Driver Staff</li><li>Manual</li><li>Fully Insured</li></ul>
                        <div class="vehicle-actions"><a class="button button-orange button-small" href="#booking">Book Now</a><a href="#booking">View Details <span aria-hidden="true">➜</span></a></div>
                    </div>
                </article>
            </div>
        </section>

        <section class="testimonials-section" id="testimonials">
            <div class="testimonial-heading">
                <p class="section-kicker">Our Testimonial</p>
                <h2>What Our <span>Travelers</span> Say</h2>
                <p>We’re proud to provide comfortable, reliable, and memorable travel experiences across Mumbai. Here’s what happy customers have to say about their journey with Make My Tours &amp; Travels.</p>
            </div>
            <div class="testimonial-grid container">
                <article class="testimonial-card">
                    <div class="stars" aria-label="5 out of 5 stars">★★★★★</div>
                    <p>Great experience with Make My Tours &amp; Travels. Everything was well organized, affordable, and completed on time.</p>
                    <div class="reviewer"><img src="{{ asset('images/image-UDE7RNW-150x150-1.jpg') }}" alt=""><strong>Purnima Thakur</strong></div>
                </article>
                <article class="testimonial-card">
                    <div class="stars" aria-label="5 out of 5 stars">★★★★★</div>
                    <p>Very well-managed trip with Make My Tours. The bus was comfortable, the driver was professional, and the journey was smooth.</p>
                    <div class="reviewer"><img src="{{ asset('images/image-BYJDCJU-150x150-1.jpg') }}" alt=""><strong>Dhanesh Panchal</strong></div>
                </article>
                <article class="testimonial-card">
                    <div class="stars" aria-label="5 out of 5 stars">★★★★★</div>
                    <p>Professional service, clean buses, and a great overall trip. Make My Tours &amp; Travels made our family trip enjoyable.</p>
                    <div class="reviewer"><img src="{{ asset('images/image-4SYRQ95-150x150-1.jpg') }}" alt=""><strong>Priya Mehta</strong></div>
                </article>
            </div>
        </section>

        <section class="blog-section section-space container" id="blog">
            <div class="blog-heading">
                <div class="section-heading">
                    <p class="section-kicker">Our Bus</p>
                    <h2>Latest <span>Articles</span> &amp; Blog</h2>
                </div>
                <a class="button button-orange button-small" href="#blog">Show All Blog</a>
            </div>
            <article class="blog-card">
                <a class="blog-image" href="#blog" aria-label="Read Hello world"></a>
                <span class="blog-tag">Uncategorized</span>
                <h3>Hello world!</h3>
                <p>Welcome to WordPress. This is your first post. Edit or delete it, then start writing!</p>
                <a class="text-link" href="#blog">Read More <span aria-hidden="true">→</span></a>
            </article>
        </section>
    </main>

    @include('components.footer')
</body>
</html>
