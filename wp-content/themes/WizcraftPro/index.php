<?php get_header(); ?>

<!-- Hero Section - Wizcraft Style -->
<section id="hero" class="hero-section position-relative overflow-hidden">
    <div class="hero-bg"></div>
    <div class="container">
        <div class="row align-items-center min-vh-100 py-5">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                <div class="hero-content">
                    <h1 class="hero-title display-4 fw-bold text-dark mb-4">
                        <?php echo get_theme_mod('hero_title', 'Creating Extraordinary <span class="text-orange">Experiences</span>'); ?>
                    </h1>

                    <p class="hero-subtitle lead text-muted mb-4">
                        <?php echo get_theme_mod('hero_subtitle', 'We specialize in corporate events, brand communication, and innovative marketing solutions that bring your vision to life with precision and creativity.'); ?>
                    </p>

                    <div class="hero-features mb-5">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="feature-item d-flex align-items-center">
                                    <i class="fas fa-calendar-check text-orange me-3"></i>
                                    <span class="fw-medium">Professional Event Management</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="feature-item d-flex align-items-center">
                                    <i class="fas fa-bullhorn text-orange me-3"></i>
                                    <span class="fw-medium">Brand Communication</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="feature-item d-flex align-items-center">
                                    <i class="fas fa-chart-line text-orange me-3"></i>
                                    <span class="fw-medium">Performance Marketing</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="feature-item d-flex align-items-center">
                                    <i class="fas fa-globe text-orange me-3"></i>
                                    <span class="fw-medium">Virtual & Hybrid Events</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hero-cta">
                        <a href="<?php echo home_url('/contact'); ?>" class="btn btn-primary btn-lg me-3">
                            Get Started Today
                            <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                        <a href="<?php echo home_url('/our-businesses'); ?>" class="btn btn-outline-dark btn-lg">
                            Our Services
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                <div class="hero-image">
                    <?php if (get_theme_mod('hero_image')): ?>
                        <img src="<?php echo esc_url(get_theme_mod('hero_image')); ?>" alt="Professional Event Management" class="img-fluid rounded-3 shadow-lg">
                    <?php else: ?>
                        <div class="hero-placeholder bg-light rounded-3 shadow-lg d-flex align-items-center justify-content-center" style="height: 500px;">
                            <div class="text-center text-muted">
                                <i class="fas fa-image display-3 mb-3"></i>
                                <p>Hero Image Placeholder</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="scroll-indicator">
        <a href="#about" class="scroll-down">
            <i class="fas fa-chevron-down"></i>
        </a>
    </div>
</section>

<!-- About Section -->
<section id="about" class="section-padding bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">About Our Company</h2>
                <p class="section-subtitle">
                    We are a leading event management and brand communication company dedicated to creating memorable experiences that drive results.
                </p>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-lg-6 mb-4" data-aos="fade-right">
                <div class="about-content">
                    <h3 class="h4 fw-bold mb-4">Excellence in Event Management</h3>
                    <p class="text-muted mb-4">
                        With years of experience in the industry, we have established ourselves as a trusted partner for businesses looking to create impactful events and brand experiences. Our comprehensive approach combines creativity, technology, and strategic thinking.
                    </p>

                    <div class="stats-grid">
                        <div class="row g-4">
                            <div class="col-6">
                                <div class="stat-item text-center">
                                    <div class="stat-number h2 fw-bold text-orange mb-1">500+</div>
                                    <div class="stat-label text-muted">Events Managed</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="stat-item text-center">
                                    <div class="stat-number h2 fw-bold text-orange mb-1">100+</div>
                                    <div class="stat-label text-muted">Happy Clients</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="stat-item text-center">
                                    <div class="stat-number h2 fw-bold text-orange mb-1">15+</div>
                                    <div class="stat-label text-muted">Years Experience</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="stat-item text-center">
                                    <div class="stat-number h2 fw-bold text-orange mb-1">50+</div>
                                    <div class="stat-label text-muted">Team Members</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4" data-aos="fade-left">
                <div class="about-features">
                    <div class="feature-card mb-4">
                        <div class="feature-icon">
                            <i class="fas fa-lightbulb text-orange"></i>
                        </div>
                        <div class="feature-content">
                            <h5 class="fw-bold mb-2">Innovation & Creativity</h5>
                            <p class="text-muted mb-0">We bring fresh ideas and innovative solutions to every project, ensuring your events stand out.</p>
                        </div>
                    </div>

                    <div class="feature-card mb-4">
                        <div class="feature-icon">
                            <i class="fas fa-users text-orange"></i>
                        </div>
                        <div class="feature-content">
                            <h5 class="fw-bold mb-2">Expert Team</h5>
                            <p class="text-muted mb-0">Our experienced team of professionals ensures flawless execution from concept to completion.</p>
                        </div>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-award text-orange"></i>
                        </div>
                        <div class="feature-content">
                            <h5 class="fw-bold mb-2">Quality Assurance</h5>
                            <p class="text-muted mb-0">We maintain the highest standards of quality in all our services and deliverables.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">Our Business Verticals</h2>
                <p class="section-subtitle">
                    Comprehensive solutions across multiple business verticals to meet all your event and marketing needs.
                </p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="service-card h-100">
                    <div class="service-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="service-content">
                        <h4 class="service-title">Corporate Events</h4>
                        <p class="service-description">
                            Professional corporate event management including conferences, seminars, product launches, and team building activities.
                        </p>
                        <a href="<?php echo home_url('/corporate-events'); ?>" class="service-link">Learn More <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="service-card h-100">
                    <div class="service-icon">
                        <i class="fas fa-video"></i>
                    </div>
                    <div class="service-content">
                        <h4 class="service-title">Virtual & Hybrid Events</h4>
                        <p class="service-description">
                            Cutting-edge virtual and hybrid event solutions that connect audiences globally with interactive experiences.
                        </p>
                        <a href="<?php echo home_url('/virtual-events'); ?>" class="service-link">Learn More <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="service-card h-100">
                    <div class="service-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div class="service-content">
                        <h4 class="service-title">Large Format Events</h4>
                        <p class="service-description">
                            Spectacular large-scale events, exhibitions, trade shows, and festivals with comprehensive management.
                        </p>
                        <a href="<?php echo home_url('/large-format-events'); ?>" class="service-link">Learn More <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="400">
                <div class="service-card h-100">
                    <div class="service-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <div class="service-content">
                        <h4 class="service-title">MICE</h4>
                        <p class="service-description">
                            Meetings, Incentives, Conferences, and Events with end-to-end planning and execution services.
                        </p>
                        <a href="<?php echo home_url('/mice'); ?>" class="service-link">Learn More <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="500">
                <div class="service-card h-100">
                    <div class="service-icon">
                        <i class="fas fa-bullhorn"></i>
                    </div>
                    <div class="service-content">
                        <h4 class="service-title">Brand Communication</h4>
                        <p class="service-description">
                            Strategic brand communication and marketing solutions to enhance your brand presence and engagement.
                        </p>
                        <a href="<?php echo home_url('/brand-communication'); ?>" class="service-link">Learn More <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="600">
                <div class="service-card h-100">
                    <div class="service-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="service-content">
                        <h4 class="service-title">Performance Marketing</h4>
                        <p class="service-description">
                            Data-driven performance marketing strategies to maximize ROI and achieve measurable business results.
                        </p>
                        <a href="<?php echo home_url('/performance-marketing'); ?>" class="service-link">Learn More <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section bg-primary text-white position-relative overflow-hidden">
    <div class="cta-bg"></div>
    <div class="container section-padding">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8" data-aos="fade-up">
                <h2 class="display-5 fw-bold mb-4">Ready to Create Something Amazing?</h2>
                <p class="lead mb-4">
                    Let's discuss your next event or marketing campaign. Our team is ready to bring your vision to life with our expertise and creativity.
                </p>
                <div class="cta-buttons">
                    <a href="<?php echo home_url('/contact'); ?>" class="btn btn-light btn-lg me-3">
                        Start Your Project
                        <i class="fas fa-rocket ms-2"></i>
                    </a>
                    <a href="tel:<?php echo esc_attr(get_theme_mod('company_phone', '+1-234-567-8900')); ?>" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-phone me-2"></i>
                        Call Now
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
// Display blog posts if this is the blog home page
if (is_home() && !is_front_page()):
?>
    <section id="blog" class="section-padding bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center mb-5">
                    <h2 class="section-title">Latest News & Insights</h2>
                    <p class="section-subtitle">Stay updated with our latest projects, industry insights, and company news.</p>
                </div>
            </div>

            <div class="row">
                <?php if (have_posts()): ?>
                    <?php while (have_posts()): the_post(); ?>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <article class="blog-card h-100">
                                <?php if (has_post_thumbnail()): ?>
                                    <div class="blog-image">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('medium', array('class' => 'img-fluid')); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>

                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <span class="blog-date">
                                            <i class="far fa-calendar me-1"></i>
                                            <?php echo get_the_date(); ?>
                                        </span>
                                        <span class="blog-category">
                                            <i class="far fa-folder me-1"></i>
                                            <?php the_category(', '); ?>
                                        </span>
                                    </div>

                                    <h3 class="blog-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>

                                    <p class="blog-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>

                                    <a href="<?php the_permalink(); ?>" class="blog-link">
                                        Read More <i class="fas fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </article>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <div class="col-12 text-center">
                        <p class="text-muted">No posts found.</p>
                    </div>
                <?php endif; ?>
            </div>

            <?php if (get_next_posts_link() || get_previous_posts_link()): ?>
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="blog-pagination">
                            <?php
                            the_posts_pagination(array(
                                'mid_size' => 2,
                                'prev_text' => '<i class="fas fa-chevron-left"></i> Previous',
                                'next_text' => 'Next <i class="fas fa-chevron-right"></i>',
                            ));
                            ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>