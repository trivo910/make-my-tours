<footer class="site-footer" id="contact">
    <div class="footer-main">
        <div class="footer-about">
            <a class="footer-brand" href="{{ url('/') }}"><img src="{{ asset('images/mmt-footer-logo.png') }}" alt="Make My Tours &amp; Travels"></a>
            <p>Make My Tours &amp; Travels offers reliable travel solutions with comfortable vehicles, affordable fares, and memorable journeys for every traveler.</p>
            <div class="social-links" aria-label="Social media">
                <a href="https://www.facebook.com/mumbaidarshanofficial/" aria-label="Facebook">f</a>
                <a href="https://www.linkedin.com/company/mumbai-darshan-bus" aria-label="LinkedIn">in</a>
                <a href="https://www.instagram.com/mumbaidarshanbusservices/" aria-label="Instagram">◎</a>
                <a href="https://www.youtube.com/@MumbaiDarshanTours" aria-label="YouTube">▶</a>
            </div>
        </div>
        <div class="footer-column">
            <h2>Quick Links</h2>
            <a href="{{ url('/about') }}">About Us</a>
            <a href="{{ route('blog.index') }}">Blog</a>
            <a href="{{ url('/#services') }}">Services</a>
            <a href="{{ url('/#fleet') }}">Projects</a>
            <a href="{{ url('/#fleet') }}">Pricing</a>
            <a href="{{ route('contact.create') }}">Contact</a>
        </div>
        <div class="footer-column contact-column">
            <h2>Contact Info</h2>
            <a href="https://maps.google.com/?q=E-120+Puspanjali+Bldg+Seven+Bunglow+Andheri+West+Mumbai">E-120, Puspanjali Bldg, Seven Bunglow, Andheri West, Mumbai</a>
            <a href="tel:+917718036300">+91 77180 36300</a>
            <a href="mailto:makemytoursplanner@gmail.com">makemytoursplanner@gmail.com</a>
        </div>
        <div class="footer-newsletter">
            <h2>Newsletter</h2>
            <p>Subscribe to receive the latest Mumbai tour updates, special offers, travel tips, and exclusive deals directly in your inbox.</p>
            <form action="{{ url('/') }}" method="get">
                <label class="visually-hidden" for="footer-newsletter-email">Your Email Address</label>
                <input id="footer-newsletter-email" type="email" name="email" placeholder="Your Email Address" required>
                <button type="submit" aria-label="Subscribe">➜</button>
            </form>
        </div>
    </div>
    <div class="footer-bottom">
        <p>Bus Service by Make My Tours &amp; Travels.</p>
        <p>© All Right Reserved 2026 · Designed &amp; Marketed By <a href="https://www.trivo.in/">Trivo</a></p>
    </div>
</footer>
