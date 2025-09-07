<?php

/**
 * The main template file
 * Modern WordPress theme for Auctocreation
 */

get_header();
?>

<main id="main-content">
    <?php if (is_front_page()): ?>

        <!-- Modern Funky Hero Banner -->
        <?php get_template_part('template-parts/banner-modern-funky'); ?>

        <!-- Modern About Section -->
        <section class="modern-section about-section-dark" id="about">
            <!-- Background Elements -->
            <div class="section-bg-dark"></div>
            <div class="floating-particles-about">
                <div class="particle-about particle-1"></div>
                <div class="particle-about particle-2"></div>
                <div class="particle-about particle-3"></div>
                <div class="particle-about particle-4"></div>
            </div>

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="modern-content">
                            <div class="section-badge mb-4">
                                <span class="badge-modern">
                                    <i class="fas fa-star me-2"></i>
                                    About Our Story
                                </span>
                            </div>

                            <h2 class="modern-section-title mb-4">
                                Crafting <span class="gradient-text">Extraordinary</span> Experiences
                            </h2>

                            <p class="modern-lead-text mb-4">
                                We believe that every event is a unique story waiting to be told. As the leading event management company in Northeast India, we specialize in turning visions into reality, creating moments that leave lasting impressions.
                            </p>

                            <div class="feature-list mb-4">
                                <div class="feature-item">
                                    <div class="feature-icon-modern">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                    <span>Professional Event Planning</span>
                                </div>
                                <div class="feature-item">
                                    <div class="feature-icon-modern">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                    <span>Creative Design Solutions</span>
                                </div>
                                <div class="feature-item">
                                    <div class="feature-icon-modern">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                    <span>Flawless Execution</span>
                                </div>
                            </div>

                            <div class="modern-actions">
                                <a href="#services" class="btn btn-modern-primary me-3">
                                    <span>Our Services</span>
                                    <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                                <a href="#contact" class="btn btn-modern-outline">
                                    <span>Get In Touch</span>
                                    <i class="fas fa-envelope ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="about-visual">
                            <!-- Modern Stats Cards -->
                            <div class="stats-grid-modern">
                                <div class="stat-card-modern stat-1">
                                    <div class="stat-icon-bg">
                                        <i class="fas fa-calendar-check"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="stat-number-modern" data-count="500">0</div>
                                        <div class="stat-label-modern">Events Organized</div>
                                    </div>
                                    <div class="stat-glow glow-cyan"></div>
                                </div>

                                <div class="stat-card-modern stat-2">
                                    <div class="stat-icon-bg">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="stat-number-modern" data-count="50">0</div>
                                        <div class="stat-label-modern">Happy Clients</div>
                                    </div>
                                    <div class="stat-glow glow-orange"></div>
                                </div>

                                <div class="stat-card-modern stat-3">
                                    <div class="stat-icon-bg">
                                        <i class="fas fa-award"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="stat-number-modern" data-count="10">0</div>
                                        <div class="stat-label-modern">Years Experience</div>
                                    </div>
                                    <div class="stat-glow glow-pink"></div>
                                </div>

                                <div class="stat-card-modern stat-4">
                                    <div class="stat-icon-bg">
                                        <i class="fas fa-trophy"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="stat-number-modern" data-count="25">0</div>
                                        <div class="stat-label-modern">Awards Won</div>
                                    </div>
                                    <div class="stat-glow glow-green"></div>
                                </div>
                            </div>

                            <!-- Central Vision Card -->
                            <div class="vision-card-modern">
                                <div class="vision-icon">
                                    <i class="fas fa-lightbulb"></i>
                                </div>
                                <h4>Our Vision</h4>
                                <p>Creating unforgettable experiences through innovation, creativity, and flawless execution.</p>
                                <div class="vision-glow"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modern Services Section -->
        <section class="modern-section services-section-dark" id="services">
            <!-- Background Elements -->
            <div class="section-bg-services"></div>
            <div class="floating-shapes-services">
                <div class="service-shape shape-1"></div>
                <div class="service-shape shape-2"></div>
                <div class="service-shape shape-3"></div>
            </div>

            <div class="container">
                <!-- Section Header -->
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center mb-5">
                        <div class="section-badge mb-4" data-aos="fade-down">
                            <span class="badge-modern">
                                <i class="fas fa-cogs me-2"></i>
                                Our Services
                            </span>
                        </div>
                        <h2 class="modern-section-title mb-4" data-aos="fade-up" data-aos-delay="100">
                            What We <span class="gradient-text">Offer</span>
                        </h2>
                        <p class="modern-subtitle" data-aos="fade-up" data-aos-delay="200">
                            From intimate gatherings to grand celebrations, we deliver exceptional event experiences tailored to your vision.
                        </p>
                    </div>
                </div>

                <!-- Services Grid -->
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-card-modern">
                            <div class="service-icon-modern">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div class="service-content">
                                <h4>Wedding Planning</h4>
                                <p>Creating magical wedding moments with personalized planning and flawless execution.</p>
                                <ul class="service-features">
                                    <li><i class="fas fa-check me-2"></i>Complete wedding coordination</li>
                                    <li><i class="fas fa-check me-2"></i>Vendor management</li>
                                    <li><i class="fas fa-check me-2"></i>Day-of coordination</li>
                                </ul>
                            </div>
                            <div class="service-glow glow-pink"></div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-card-modern">
                            <div class="service-icon-modern">
                                <i class="fas fa-building"></i>
                            </div>
                            <div class="service-content">
                                <h4>Corporate Events</h4>
                                <p>Professional corporate event management for conferences, seminars, and business gatherings.</p>
                                <ul class="service-features">
                                    <li><i class="fas fa-check me-2"></i>Conference management</li>
                                    <li><i class="fas fa-check me-2"></i>Team building events</li>
                                    <li><i class="fas fa-check me-2"></i>Product launches</li>
                                </ul>
                            </div>
                            <div class="service-glow glow-cyan"></div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-card-modern">
                            <div class="service-icon-modern">
                                <i class="fas fa-music"></i>
                            </div>
                            <div class="service-content">
                                <h4>Concerts & Festivals</h4>
                                <p>Large-scale entertainment events with professional stage management and production.</p>
                                <ul class="service-features">
                                    <li><i class="fas fa-check me-2"></i>Stage design & setup</li>
                                    <li><i class="fas fa-check me-2"></i>Sound & lighting</li>
                                    <li><i class="fas fa-check me-2"></i>Artist coordination</li>
                                </ul>
                            </div>
                            <div class="service-glow glow-orange"></div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-card-modern">
                            <div class="service-icon-modern">
                                <i class="fas fa-birthday-cake"></i>
                            </div>
                            <div class="service-content">
                                <h4>Private Celebrations</h4>
                                <p>Intimate celebrations and personal milestones with customized themes and experiences.</p>
                                <ul class="service-features">
                                    <li><i class="fas fa-check me-2"></i>Birthday parties</li>
                                    <li><i class="fas fa-check me-2"></i>Anniversary celebrations</li>
                                    <li><i class="fas fa-check me-2"></i>Family gatherings</li>
                                </ul>
                            </div>
                            <div class="service-glow glow-green"></div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="service-card-modern">
                            <div class="service-icon-modern">
                                <i class="fas fa-camera"></i>
                            </div>
                            <div class="service-content">
                                <h4>Photography & Videography</h4>
                                <p>Professional photography and videography services to capture your special moments.</p>
                                <ul class="service-features">
                                    <li><i class="fas fa-check me-2"></i>Event photography</li>
                                    <li><i class="fas fa-check me-2"></i>Video production</li>
                                    <li><i class="fas fa-check me-2"></i>Live streaming</li>
                                </ul>
                            </div>
                            <div class="service-glow glow-purple"></div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                        <div class="service-card-modern">
                            <div class="service-icon-modern">
                                <i class="fas fa-palette"></i>
                            </div>
                            <div class="service-content">
                                <h4>Event Design</h4>
                                <p>Creative event design and decoration services to bring your vision to life.</p>
                                <ul class="service-features">
                                    <li><i class="fas fa-check me-2"></i>Theme development</li>
                                    <li><i class="fas fa-check me-2"></i>Decor & styling</li>
                                    <li><i class="fas fa-check me-2"></i>Custom installations</li>
                                </ul>
                            </div>
                            <div class="service-glow glow-yellow"></div>
                        </div>
                    </div>
                </div>

                <!-- CTA Section -->
                <div class="row mt-5">
                    <div class="col-lg-8 mx-auto text-center">
                        <div class="service-cta-modern" data-aos="fade-up" data-aos-delay="700">
                            <h3 class="mb-4">Ready to Start Planning?</h3>
                            <p class="mb-4">Let's discuss your event requirements and create something extraordinary together.</p>
                            <a href="#contact" class="btn btn-modern-primary btn-lg">
                                <span>Get Started Today</span>
                                <i class="fas fa-rocket ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modern Contact Section -->
        <section class="modern-section contact-section-dark" id="contact">
            <!-- Background Elements -->
            <div class="contact-bg-modern"></div>
            <div class="floating-elements-contact">
                <div class="contact-particle particle-1"></div>
                <div class="contact-particle particle-2"></div>
                <div class="contact-particle particle-3"></div>
                <div class="contact-particle particle-4"></div>
                <div class="contact-particle particle-5"></div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mx-auto text-center mb-5">
                        <div class="section-badge mb-4">
                            <span class="badge-modern">
                                <i class="fas fa-envelope me-2"></i>
                                Get In Touch
                            </span>
                        </div>
                        <h2 class="modern-section-title mb-4">
                            Ready to Create Something <span class="gradient-text">Amazing?</span>
                        </h2>
                        <p class="modern-subtitle">
                            Let's turn your vision into reality. Contact us today to discuss your next event and discover how we can make it extraordinary.
                        </p>
                    </div>
                </div>

                <div class="row align-items-center">
                    <!-- Contact Cards -->
                    <div class="col-lg-6 mb-5">
                        <div class="contact-methods">

                            <!-- Email Card -->
                            <div class="contact-card-modern">
                                <div class="contact-icon-modern">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="contact-content">
                                    <h4>Email Us</h4>
                                    <p>Drop us a line and we'll get back to you within 24 hours</p>
                                    <a href="mailto:info@auctocreation.com" class="contact-link">
                                        info@auctocreation.com
                                        <i class="fas fa-arrow-right ms-2"></i>
                                    </a>
                                </div>
                                <div class="contact-glow glow-cyan"></div>
                            </div>

                            <!-- Phone Card -->
                            <div class="contact-card-modern">
                                <div class="contact-icon-modern">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="contact-content">
                                    <h4>Call Now</h4>
                                    <p>Speak directly with our event planning experts</p>
                                    <a href="tel:+91-361-3139121" class="contact-link">
                                        0361-3139121
                                        <i class="fas fa-arrow-right ms-2"></i>
                                    </a>
                                </div>
                                <div class="contact-glow glow-green"></div>
                            </div>

                            <!-- Address Card -->
                            <div class="contact-card-modern">
                                <div class="contact-icon-modern">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="contact-content">
                                    <h4>Visit Us</h4>
                                    <p>Come to our office for detailed event discussions</p>
                                    <div class="contact-link">
                                        Aucto Creation 11,<br>
                                        Janaki path<br>
                                        Ganeshguri Guwahati-781006
                                    </div>
                                </div>
                                <div class="contact-glow glow-orange"></div>
                            </div>

                            <!-- Social Media -->
                            <div class="social-contact-modern mt-4">
                                <h5 class="mb-3">Follow Us</h5>
                                <div class="social-links-modern">
                                    <a href="https://www.facebook.com/aucto.creation" target="_blank" class="social-link-modern facebook">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="#" target="_blank" class="social-link-modern instagram">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                    <a href="https://www.youtube.com/c/AuctoCreation" target="_blank" class="social-link-modern youtube">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                    <a href="#" target="_blank" class="social-link-modern linkedin">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Form -->
                    <div class="col-lg-6">
                        <div class="contact-form-modern">
                            <form class="modern-form" id="contactForm" method="post" action="">
                                <div class="form-group-modern">
                                    <input type="text" class="form-control-modern" id="name" name="name" placeholder="Your Name" required>
                                    <div class="form-underline"></div>
                                </div>

                                <div class="form-group-modern">
                                    <input type="email" class="form-control-modern" id="email" name="email" placeholder="Email Address" required>
                                    <div class="form-underline"></div>
                                </div>

                                <div class="form-group-modern">
                                    <input type="tel" class="form-control-modern" id="phone" name="phone" placeholder="Phone Number">
                                    <div class="form-underline"></div>
                                </div>

                                <div class="form-group-modern">
                                    <select class="form-control-modern" id="event_type" name="event_type" required>
                                        <option value="">Select Event Type</option>
                                        <option value="wedding">Wedding</option>
                                        <option value="corporate">Corporate Event</option>
                                        <option value="concert">Concert/Festival</option>
                                        <option value="private">Private Celebration</option>
                                        <option value="other">Other</option>
                                    </select>
                                    <div class="form-underline"></div>
                                </div>

                                <div class="form-group-modern">
                                    <textarea class="form-control-modern" id="comments" name="comments" rows="4" placeholder="Tell us about your event..." required></textarea>
                                    <div class="form-underline"></div>
                                </div>

                                <button type="submit" class="btn btn-modern-primary btn-lg w-100">
                                    <span>Send Message</span>
                                    <i class="fas fa-paper-plane ms-2"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php endif; ?>
</main>

<!-- Modern Floating Social Icons -->
<div class="floating-social d-none d-xl-block">
    <a href="https://www.facebook.com/aucto.creation" target="_blank" rel="noopener" class="social-icon facebook" title="Facebook">
        <i class="fab fa-facebook-f"></i>
    </a>
    <a href="https://www.youtube.com/c/AuctoCreation" target="_blank" rel="noopener" class="social-icon youtube" title="YouTube">
        <i class="fab fa-youtube"></i>
    </a>
    <a href="#" target="_blank" rel="noopener" class="social-icon instagram" title="Instagram">
        <i class="fab fa-instagram"></i>
    </a>
    <div class="social-line"></div>
</div>

<?php get_footer(); ?>