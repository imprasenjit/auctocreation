    <!-- Modern Footer -->
    <footer class="modern-footer">
        <div class="footer-bg-modern">
            <div class="footer-particles">
                <div class="footer-particle particle-1"></div>
                <div class="footer-particle particle-2"></div>
                <div class="footer-particle particle-3"></div>
                <div class="footer-particle particle-4"></div>
                <div class="footer-particle particle-5"></div>
                <div class="footer-particle particle-6"></div>
            </div>
        </div>

        <div class="container">
            <!-- Footer Content -->
            <div class="row py-5 footer-content-modern">
                <!-- Company Info -->
                <div class="col-lg-4 mb-4">
                    <div class="footer-brand-modern mb-4">
                        <?php
                        $custom_logo_id = get_theme_mod('custom_logo');
                        if ($custom_logo_id) {
                            $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                            echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '" class="footer-logo-modern mb-3">';
                        } else {
                            echo '<div class="modern-logo-footer">';
                            echo '<span class="logo-text-footer gradient-text-footer">' . get_bloginfo('name') . '</span>';
                            echo '<span class="logo-dot-footer"></span>';
                            echo '</div>';
                        }
                        ?>
                        <p class="footer-tagline"><?php bloginfo('description'); ?></p>
                    </div>

                    <p class="footer-description">Leading event management company creating extraordinary experiences with cutting-edge technology and creative excellence.</p>

                    <!-- Modern Social Links -->
                    <div class="social-links-footer">
                        <a href="https://www.facebook.com/aucto.creation" target="_blank" rel="noopener" class="social-link-footer facebook" title="Facebook">
                            <div class="social-icon-bg">
                                <i class="fab fa-facebook-f"></i>
                            </div>
                            <span class="social-label">Facebook</span>
                        </a>
                        <a href="https://www.youtube.com/c/AuctoCreation" target="_blank" rel="noopener" class="social-link-footer youtube" title="YouTube">
                            <div class="social-icon-bg">
                                <i class="fab fa-youtube"></i>
                            </div>
                            <span class="social-label">YouTube</span>
                        </a>
                        <a href="#" target="_blank" rel="noopener" class="social-link-footer instagram" title="Instagram">
                            <div class="social-icon-bg">
                                <i class="fab fa-instagram"></i>
                            </div>
                            <span class="social-label">Instagram</span>
                        </a>
                        <a href="#" target="_blank" rel="noopener" class="social-link-footer linkedin" title="LinkedIn">
                            <div class="social-icon-bg">
                                <i class="fab fa-linkedin-in"></i>
                            </div>
                            <span class="social-label">LinkedIn</span>
                        </a>
                    </div>
                </div>

                <!-- Navigation Links -->
                <div class="col-lg-2 col-md-6 mb-4">
                    <div class="footer-section-modern">
                        <h5 class="footer-title-modern">
                            <span class="title-icon"><i class="fas fa-link"></i></span>
                            Quick Links
                        </h5>
                        <ul class="footer-nav-modern">
                            <li><a href="#home" class="footer-nav-link">Home</a></li>
                            <li><a href="#about" class="footer-nav-link">About</a></li>
                            <li><a href="#services" class="footer-nav-link">Services</a></li>
                            <li><a href="#portfolio" class="footer-nav-link">Portfolio</a></li>
                            <li><a href="#blog" class="footer-nav-link">Blog</a></li>
                            <li><a href="#contact" class="footer-nav-link">Contact</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Services -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="footer-section-modern">
                        <h5 class="footer-title-modern">
                            <span class="title-icon"><i class="fas fa-cog"></i></span>
                            Our Services
                        </h5>
                        <ul class="footer-services-modern">
                            <li>
                                <div class="service-item-footer">
                                    <i class="fas fa-heart service-icon-small"></i>
                                    <a href="#" class="footer-service-link">Wedding Planning</a>
                                </div>
                            </li>
                            <li>
                                <div class="service-item-footer">
                                    <i class="fas fa-building service-icon-small"></i>
                                    <a href="#" class="footer-service-link">Corporate Events</a>
                                </div>
                            </li>
                            <li>
                                <div class="service-item-footer">
                                    <i class="fas fa-music service-icon-small"></i>
                                    <a href="#" class="footer-service-link">Concerts & Shows</a>
                                </div>
                            </li>
                            <li>
                                <div class="service-item-footer">
                                    <i class="fas fa-calendar-alt service-icon-small"></i>
                                    <a href="#" class="footer-service-link">Festival Management</a>
                                </div>
                            </li>
                            <li>
                                <div class="service-item-footer">
                                    <i class="fas fa-glass-cheers service-icon-small"></i>
                                    <a href="#" class="footer-service-link">Private Celebrations</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="col-lg-3 mb-4">
                    <div class="footer-section-modern">
                        <h5 class="footer-title-modern">
                            <span class="title-icon"><i class="fas fa-map-marker-alt"></i></span>
                            Get In Touch
                        </h5>
                        <div class="contact-info-modern">
                            <div class="contact-item-modern">
                                <div class="contact-icon-modern">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="contact-details">
                                    <span class="contact-label">Location</span>
                                    <p class="contact-text">Guwahati, Assam<br>Northeast India</p>
                                </div>
                            </div>

                            <div class="contact-item-modern">
                                <div class="contact-icon-modern">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="contact-details">
                                    <span class="contact-label">Call Us</span>
                                    <a href="tel:+91-xxx-xxx-xxxx" class="contact-link-modern">+91 XXX XXX XXXX</a>
                                </div>
                            </div>

                            <div class="contact-item-modern">
                                <div class="contact-icon-modern">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="contact-details">
                                    <span class="contact-label">Email</span>
                                    <a href="mailto:info@auctocreation.com" class="contact-link-modern">info@auctocreation.com</a>
                                </div>
                            </div>

                            <!-- Newsletter Signup -->
                            <div class="newsletter-signup-modern">
                                <h6 class="newsletter-title">Stay Updated</h6>
                                <form class="newsletter-form">
                                    <div class="input-group-modern">
                                        <input type="email" class="form-control-newsletter" placeholder="Your email address" required>
                                        <button type="submit" class="btn-newsletter">
                                            <i class="fas fa-paper-plane"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom-modern">
                <div class="footer-bottom-line"></div>
                <div class="row align-items-center py-4">
                    <div class="col-md-6">
                        <div class="copyright-modern">
                            <span class="copyright-icon">
                                <i class="fas fa-copyright"></i>
                            </span>
                            <p class="copyright-text">
                                <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <div class="footer-credits">
                            <span class="credits-text">Crafted with</span>
                            <span class="heart-icon">
                                <i class="fas fa-heart"></i>
                            </span>
                            <span class="credits-text">by</span>
                            <a href="https://netrotechnologies.com" target="_blank" rel="noopener" class="credits-link">Netrotechnologies</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button class="back-to-top-btn" id="backToTop" title="Back to Top">
        <i class="fas fa-chevron-up"></i>
    </button>

    <!-- WhatsApp Float Button -->
    <div class="whatsapp-float">
        <a href="https://wa.me/91XXXXXXXXXX" target="_blank" rel="noopener" class="whatsapp-btn" title="Contact us on WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>

    <?php wp_footer(); ?>

    </body>

    </html>