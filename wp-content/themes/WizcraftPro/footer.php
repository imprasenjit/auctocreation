    <!-- Footer Start -->
    <footer id="footer" class="footer-section bg-dark text-light">
        <!-- Main Footer Content -->
        <div class="container py-5">
            <div class="row">
                <!-- Company Info Column -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="footer-widget">
                        <!-- Company Brand -->
                        <div class="footer-brand mb-4">
                            <?php
                            $custom_logo_id = get_theme_mod('custom_logo');
                            if ($custom_logo_id) {
                                $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                                echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '" class="footer-logo mb-3" style="height: 50px; width: auto;">';
                            } else {
                                echo '<div class="footer-brand-text">';
                                echo '<h4 class="text-orange fw-bold">' . get_bloginfo('name') . '</h4>';
                                echo '</div>';
                            }
                            ?>

                            <?php if (get_theme_mod('company_description')): ?>
                                <p class="footer-description text-light-gray">
                                    <?php echo wp_kses_post(get_theme_mod('company_description')); ?>
                                </p>
                            <?php else: ?>
                                <p class="footer-description text-light-gray">
                                    Creating extraordinary experiences through innovative event management and brand communication solutions. Your vision, our expertise.
                                </p>
                            <?php endif; ?>
                        </div>

                        <!-- Social Media Links -->
                        <div class="social-links">
                            <h6 class="text-orange mb-3">Connect With Us</h6>
                            <div class="d-flex gap-3">
                                <?php if (get_theme_mod('facebook_url')): ?>
                                    <a href="<?php echo esc_url(get_theme_mod('facebook_url')); ?>" class="social-link" target="_blank" rel="noopener">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                <?php endif; ?>

                                <?php if (get_theme_mod('twitter_url')): ?>
                                    <a href="<?php echo esc_url(get_theme_mod('twitter_url')); ?>" class="social-link" target="_blank" rel="noopener">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                <?php endif; ?>

                                <?php if (get_theme_mod('linkedin_url')): ?>
                                    <a href="<?php echo esc_url(get_theme_mod('linkedin_url')); ?>" class="social-link" target="_blank" rel="noopener">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                <?php endif; ?>

                                <?php if (get_theme_mod('instagram_url')): ?>
                                    <a href="<?php echo esc_url(get_theme_mod('instagram_url')); ?>" class="social-link" target="_blank" rel="noopener">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                <?php endif; ?>

                                <?php if (get_theme_mod('youtube_url')): ?>
                                    <a href="<?php echo esc_url(get_theme_mod('youtube_url')); ?>" class="social-link" target="_blank" rel="noopener">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Links Column -->
                <div class="col-lg-2 col-md-6 mb-4">
                    <div class="footer-widget">
                        <h6 class="footer-title text-orange mb-3">Quick Links</h6>
                        <?php
                        if (has_nav_menu('footer_quick_links')) {
                            wp_nav_menu(array(
                                'theme_location' => 'footer_quick_links',
                                'menu_class' => 'footer-links list-unstyled',
                                'container' => false,
                                'depth' => 1,
                                'fallback_cb' => false
                            ));
                        } else {
                            echo '<ul class="footer-links list-unstyled">';
                            echo '<li><a href="' . home_url() . '" class="footer-link">Home</a></li>';
                            echo '<li><a href="' . home_url('/about') . '" class="footer-link">About Us</a></li>';
                            echo '<li><a href="' . home_url('/corporate-events') . '" class="footer-link">Corporate Events</a></li>';
                            echo '<li><a href="' . home_url('/virtual-events') . '" class="footer-link">Virtual Events</a></li>';
                            echo '<li><a href="' . home_url('/brand-communication') . '" class="footer-link">Brand Communication</a></li>';
                            echo '<li><a href="' . home_url('/contact') . '" class="footer-link">Contact</a></li>';
                            echo '</ul>';
                        }
                        ?>
                    </div>
                </div>

                <!-- Services Column -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="footer-widget">
                        <h6 class="footer-title text-orange mb-3">Our Services</h6>
                        <ul class="footer-links list-unstyled">
                            <li><a href="<?php echo home_url('/corporate-events'); ?>" class="footer-link">Corporate Events</a></li>
                            <li><a href="<?php echo home_url('/virtual-events'); ?>" class="footer-link">Virtual & Hybrid Events</a></li>
                            <li><a href="<?php echo home_url('/large-format-events'); ?>" class="footer-link">Large Format Events</a></li>
                            <li><a href="<?php echo home_url('/mice'); ?>" class="footer-link">MICE</a></li>
                            <li><a href="<?php echo home_url('/brand-communication'); ?>" class="footer-link">Brand Communication</a></li>
                            <li><a href="<?php echo home_url('/performance-marketing'); ?>" class="footer-link">Performance Marketing</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Contact Info Column -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="footer-widget">
                        <h6 class="footer-title text-orange mb-3">Get In Touch</h6>
                        <div class="contact-info">
                            <?php if (get_theme_mod('company_address')): ?>
                                <div class="contact-item mb-3">
                                    <i class="fas fa-map-marker-alt text-orange me-2"></i>
                                    <span class="text-light-gray"><?php echo wp_kses_post(get_theme_mod('company_address')); ?></span>
                                </div>
                            <?php endif; ?>

                            <?php if (get_theme_mod('company_phone')): ?>
                                <div class="contact-item mb-3">
                                    <i class="fas fa-phone text-orange me-2"></i>
                                    <a href="tel:<?php echo esc_attr(get_theme_mod('company_phone')); ?>" class="footer-link">
                                        <?php echo esc_html(get_theme_mod('company_phone')); ?>
                                    </a>
                                </div>
                            <?php endif; ?>

                            <?php if (get_theme_mod('company_email')): ?>
                                <div class="contact-item mb-3">
                                    <i class="fas fa-envelope text-orange me-2"></i>
                                    <a href="mailto:<?php echo esc_attr(get_theme_mod('company_email')); ?>" class="footer-link">
                                        <?php echo esc_html(get_theme_mod('company_email')); ?>
                                    </a>
                                </div>
                            <?php endif; ?>

                            <!-- Newsletter Signup -->
                            <div class="newsletter-signup mt-4">
                                <h6 class="text-orange mb-2">Stay Updated</h6>
                                <p class="small text-light-gray mb-3">Subscribe to our newsletter for latest updates</p>
                                <form class="newsletter-form d-flex">
                                    <input type="email" class="form-control form-control-sm me-2" placeholder="Your email" required>
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        <i class="fas fa-paper-plane"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom border-top border-secondary">
            <div class="container py-4">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <p class="mb-0 text-light-gray">
                            &copy; <?php echo date('Y'); ?> <?php echo get_bloginfo('name'); ?>. All rights reserved.
                        </p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <div class="footer-bottom-links">
                            <a href="<?php echo home_url('/privacy-policy'); ?>" class="footer-link me-3">Privacy Policy</a>
                            <a href="<?php echo home_url('/terms-of-service'); ?>" class="footer-link">Terms of Service</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button class="back-to-top" id="backToTop" title="Back to top">
        <i class="fas fa-chevron-up"></i>
    </button>

    <?php wp_footer(); ?>

    <!-- Back to Top Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const backToTop = document.getElementById('backToTop');

            // Show/hide back to top button
            window.addEventListener('scroll', function() {
                if (window.pageYOffset > 300) {
                    backToTop.classList.add('show');
                } else {
                    backToTop.classList.remove('show');
                }
            });

            // Smooth scroll to top
            backToTop.addEventListener('click', function(e) {
                e.preventDefault();
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
    </script>

    </body>

    </html>