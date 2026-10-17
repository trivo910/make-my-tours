<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Contact Make My Tours &amp; Travels for help planning your next trip, tour, or group journey.">
    <title>Contact | Make My Tours &amp; Travels</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800&family=Heebo:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
    @vite('resources/js/app.js')
</head>
<body class="contact-page">
    @include('components.header')

    <main>
        <section class="contact-banner" aria-labelledby="contact-page-title">
            <div class="contact-banner-inner">
                <nav class="contact-breadcrumb" aria-label="Breadcrumb">
                    <a href="{{ url('/') }}">Home</a>
                    <span aria-hidden="true">&#8250;</span>
                    <span aria-current="page">Contact</span>
                </nav>
                <h1 id="contact-page-title">Contact Us</h1>
                <p>We are here to help plan your next journey.</p>
            </div>
        </section>

        <section class="contact-content" aria-labelledby="contact-heading">
            <div class="contact-container">
                <header class="contact-intro">
                    <span class="contact-section-label">MAKE YOUR NEXT TRIP SIMPLE</span>
                    <h2 id="contact-heading">Talk to our travel team</h2>
                    <p>Tell us where you would like to go and what you need. Our Mumbai team will get back to you shortly.</p>
                </header>

                @if (session('contact_success'))
                    <div class="contact-alert contact-alert-success" role="status" tabindex="-1">
                        <span class="contact-alert-icon" aria-hidden="true">&#10003;</span>
                        <div>
                            <strong>Message received</strong>
                            <p>{{ session('contact_success') === true ? 'Thanks for getting in touch. We will be in contact soon.' : session('contact_success') }}</p>
                        </div>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="contact-alert contact-alert-error" role="alert" tabindex="-1">
                        <strong>Please check the highlighted fields.</strong>
                        <p>Some of the details need your attention before we can send your message.</p>
                    </div>
                @endif

                <div class="contact-layout">
                    <section class="contact-form-panel" aria-labelledby="contact-form-title">
                        <div class="contact-panel-heading">
                            <span class="contact-section-label">SEND AN ENQUIRY</span>
                            <h3 id="contact-form-title">How can we help?</h3>
                            <p>All fields are required so we can respond to your request.</p>
                        </div>

                        <form action="{{ route('contact.store') }}" method="post" class="contact-form" data-contact-form>
                            @csrf
                            <div class="contact-form-grid">
                                <div class="contact-field">
                                    <label for="contact-name">Your name <span aria-hidden="true">*</span></label>
                                    <input id="contact-name" name="name" type="text" value="{{ old('name') }}" autocomplete="name" maxlength="100" placeholder="e.g. Aisha Patel" required @error('name') aria-invalid="true" aria-describedby="contact-name-error" @enderror>
                                    @error('name')<span class="contact-field-error" id="contact-name-error">{{ $message }}</span>@enderror
                                </div>

                                <div class="contact-field">
                                    <label for="contact-email">Email address <span aria-hidden="true">*</span></label>
                                    <input id="contact-email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" maxlength="255" placeholder="you@example.com" required @error('email') aria-invalid="true" aria-describedby="contact-email-error" @enderror>
                                    @error('email')<span class="contact-field-error" id="contact-email-error">{{ $message }}</span>@enderror
                                </div>

                                <div class="contact-field">
                                    <label for="contact-phone">Phone number <span aria-hidden="true">*</span></label>
                                    <input id="contact-phone" name="phone" type="tel" value="{{ old('phone') }}" autocomplete="tel" maxlength="32" placeholder="+91 98765 43210" required @error('phone') aria-invalid="true" aria-describedby="contact-phone-hint contact-phone-error" @enderror>
                                    <small class="contact-field-hint" id="contact-phone-hint">Include your country code for international numbers.</small>
                                    @error('phone')<span class="contact-field-error" id="contact-phone-error">{{ $message }}</span>@enderror
                                </div>

                                <div class="contact-field">
                                    <label for="contact-address">City or address <span aria-hidden="true">*</span></label>
                                    <input id="contact-address" name="address" type="text" value="{{ old('address') }}" autocomplete="street-address" maxlength="255" placeholder="Where are you based?" required @error('address') aria-invalid="true" aria-describedby="contact-address-error" @enderror>
                                    @error('address')<span class="contact-field-error" id="contact-address-error">{{ $message }}</span>@enderror
                                </div>

                                <div class="contact-field contact-field-wide">
                                    <label for="contact-message">Your message <span aria-hidden="true">*</span></label>
                                    <textarea id="contact-message" name="message" rows="5" minlength="10" maxlength="3000" placeholder="Tell us a little about the journey you are planning..." required @error('message') aria-invalid="true" aria-describedby="contact-message-hint contact-message-error" @enderror>{{ old('message') }}</textarea>
                                    <small class="contact-field-hint" id="contact-message-hint">Please include at least 10 characters.</small>
                                    @error('message')<span class="contact-field-error" id="contact-message-error">{{ $message }}</span>@enderror
                                </div>

                                <div class="contact-honeypot" aria-hidden="true">
                                    <label for="contact-website">Leave this field empty</label>
                                    <input id="contact-website" name="website" type="text" tabindex="-1" autocomplete="off">
                                </div>

                                <div class="contact-field-wide">
                                    <button class="contact-submit" type="submit" data-contact-submit>
                                        <span data-submit-label>Send your message</span>
                                        <span class="contact-submit-loading" data-submit-loading hidden><span class="contact-spinner" aria-hidden="true"></span>Sending...</span>
                                        <span class="contact-submit-arrow" aria-hidden="true">&#8594;</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <p class="contact-privacy">Your details will only be used to respond to this enquiry.</p>
                    </section>

                    <aside class="contact-details" aria-label="Company contact details">
                        <div class="contact-details-heading">
                            <span class="contact-section-label">VISIT OR REACH US</span>
                            <h3>We are easy to reach</h3>
                        </div>

                        <div class="contact-detail-item">
                            <span class="contact-detail-icon" aria-hidden="true">&#9906;</span>
                            <div><h4>Our office</h4><address>E-120, Puspanjali Bldg,<br>Seven Bunglow, Andheri West,<br>Mumbai, Maharashtra</address></div>
                        </div>
                        <div class="contact-detail-item">
                            <span class="contact-detail-icon" aria-hidden="true">&#9742;</span>
                            <div><h4>Call our team</h4><a href="tel:+917718036300">+91 77180 36300</a></div>
                        </div>
                        <div class="contact-detail-item">
                            <span class="contact-detail-icon" aria-hidden="true">&#9993;</span>
                            <div><h4>Email us</h4><a href="mailto:makemytoursplanner@gmail.com">makemytoursplanner@gmail.com</a></div>
                        </div>

                        <a class="contact-map-link" href="https://maps.google.com/?q=E-120+Puspanjali+Bldg+Seven+Bunglow+Andheri+West+Mumbai" target="_blank" rel="noopener noreferrer">Get directions <span aria-hidden="true">&#8599;</span></a>
                        <div class="contact-map-frame">
                            <iframe title="Map showing the Make My Tours and Travels office in Andheri West, Mumbai" src="https://maps.google.com/maps?q=E-120%2C%20Puspanjali%20Bldg%2C%20Seven%20Bunglow%2C%20Andheri%20West%2C%20Mumbai&t=&z=14&ie=UTF8&iwloc=&output=embed" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <p class="contact-response-note">Our local team usually replies within one business day.</p>
                    </aside>
                </div>
            </div>
        </section>
    </main>

    @include('components.footer')
</body>
</html>
