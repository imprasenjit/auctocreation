<!-- Wizcraft-Style Professional Hero Banner -->
<section id="hero-banner" class="hero-banner position-relative overflow-hidden">
    <!-- Background Elements -->
    <div class="hero-bg"></div>
    <div class="hero-overlay"></div>

    <!-- Animated Background Shapes -->
    <div class="bg-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
    </div>

    <div class="container">
        <div class="row align-items-center min-vh-100 py-5">
            <!-- Content Column -->
            <div class="col-lg-6 col-md-12" data-aos="fade-right" data-aos-duration="1000">
                <div class="hero-content">
                    <!-- Pre-title -->
                    <div class="hero-pretitle mb-3" data-aos="fade-up" data-aos-delay="200">
                        <span class="badge bg-orange-light text-orange px-3 py-2 fw-medium">
                            <i class="fas fa-star me-2"></i>
                            Professional Event Management
                        </span>
                    </div>

                    <!-- Main Title -->
                    <h1 class="hero-title display-3 fw-bold text-dark mb-4" data-aos="fade-up" data-aos-delay="300">
                        <?php echo get_theme_mod('hero_main_title', 'Event Management Services That Turn <span class="text-orange">Ideas into Reality</span>'); ?>
                    </h1>

                    <!-- Subtitle -->
                    <p class="hero-subtitle lead text-muted mb-4" data-aos="fade-up" data-aos-delay="400">
                        <?php echo get_theme_mod('hero_subtitle', 'Creating extraordinary experiences through innovative event management, brand communication, and digital marketing solutions that drive business outcomes.'); ?>
                    </p>

                    <!-- Key Features -->
                    <div class="hero-features mb-5" data-aos="fade-up" data-aos-delay="500">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="feature-highlight d-flex align-items-center">
                                    <div class="feature-icon me-3">
                                        <i class="fas fa-check-circle text-orange"></i>
                                    </div>
                                    <span class="fw-medium">30+ Years Legacy</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="feature-highlight d-flex align-items-center">
                                    <div class="feature-icon me-3">
                                        <i class="fas fa-check-circle text-orange"></i>
                                    </div>
                                    <span class="fw-medium">600+ Global Brands</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="feature-highlight d-flex align-items-center">
                                    <div class="feature-icon me-3">
                                        <i class="fas fa-check-circle text-orange"></i>
                                    </div>
                                    <span class="fw-medium">10K+ Experiences Created</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="feature-highlight d-flex align-items-center">
                                    <div class="feature-icon me-3">
                                        <i class="fas fa-check-circle text-orange"></i>
                                    </div>
                                    <span class="fw-medium">50+ Awards Won</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- CTA Buttons -->
                    <div class="hero-actions" data-aos="fade-up" data-aos-delay="600">
                        <a href="<?php echo home_url('/contact'); ?>" class="btn btn-orange btn-lg me-3 px-4 py-3">
                            <i class="fas fa-rocket me-2"></i>
                            Start Your Project
                        </a>
                        <a href="<?php echo home_url('/our-businesses'); ?>" class="btn btn-outline-dark btn-lg px-4 py-3">
                            <i class="fas fa-play-circle me-2"></i>
                            Our Services
                        </a>
                    </div>

                    <!-- Trust Indicators -->
                    <div class="trust-indicators mt-5" data-aos="fade-up" data-aos-delay="700">
                        <div class="row g-3">
                            <div class="col-md-3 col-6">
                                <div class="trust-metric text-center">
                                    <div class="metric-number h4 fw-bold text-orange mb-1">30+</div>
                                    <div class="metric-label small text-muted">Years Legacy</div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="trust-metric text-center">
                                    <div class="metric-number h4 fw-bold text-orange mb-1">600+</div>
                                    <div class="metric-label small text-muted">Global Brands</div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="trust-metric text-center">
                                    <div class="metric-number h4 fw-bold text-orange mb-1">10K+</div>
                                    <div class="metric-label small text-muted">Experiences</div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="trust-metric text-center">
                                    <div class="metric-number h4 fw-bold text-orange mb-1">50+</div>
                                    <div class="metric-label small text-muted">Awards Won</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Visual Column -->
            <div class="col-lg-6 col-md-12 mt-5 mt-lg-0" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="300">
                <div class="hero-visual position-relative">
                    <!-- Main Hero Image -->
                    <div class="hero-image-container">
                        <?php if (get_theme_mod('hero_main_image')): ?>
                            <img src="<?php echo esc_url(get_theme_mod('hero_main_image')); ?>"
                                alt="Professional Event Management"
                                class="hero-main-image img-fluid rounded-4 shadow-lg">
                        <?php else: ?>
                            <div class="hero-placeholder bg-gradient-orange rounded-4 shadow-lg d-flex align-items-center justify-content-center" style="height: 500px;">
                                <div class="text-center text-white">
                                    <i class="fas fa-calendar-alt display-2 mb-3 opacity-75"></i>
                                    <h4 class="fw-bold">Professional Event Management</h4>
                                    <p class="mb-0 opacity-75">Upload hero image via Customizer</p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Floating Statistics Cards -->
                    <div class="floating-stats">
                        <!-- Stat Card 1 -->
                        <div class="stat-card stat-card-1" data-aos="fade-up" data-aos-delay="800">
                            <div class="stat-icon">
                                <i class="fas fa-users text-orange"></i>
                            </div>
                            <div class="stat-content">
                                <div class="stat-number">600+</div>
                                <div class="stat-label">Global Brands</div>
                            </div>
                        </div>

                        <!-- Stat Card 2 -->
                        <div class="stat-card stat-card-2" data-aos="fade-up" data-aos-delay="900">
                            <div class="stat-icon">
                                <i class="fas fa-calendar-check text-orange"></i>
                            </div>
                            <div class="stat-content">
                                <div class="stat-number">10K+</div>
                                <div class="stat-label">Events Delivered</div>
                            </div>
                        </div>

                        <!-- Stat Card 3 -->
                        <div class="stat-card stat-card-3" data-aos="fade-up" data-aos-delay="1000">
                            <div class="stat-icon">
                                <i class="fas fa-award text-orange"></i>
                            </div>
                            <div class="stat-content">
                                <div class="stat-number">30+</div>
                                <div class="stat-label">Years Legacy</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="scroll-indicator position-absolute bottom-0 start-50 translate-middle-x mb-4">
        <a href="#about" class="scroll-btn" data-aos="bounce" data-aos-delay="1200">
            <i class="fas fa-chevron-down"></i>
        </a>
    </div>
</section>

<!-- Custom CSS for Wizcraft-style Banner -->
<style>
    :root {
        --wizcraft-orange: #ff6b00;
        --wizcraft-orange-light: #ff8533;
        --wizcraft-orange-dark: #e55a00;
        --wizcraft-dark: #2c3e50;
        --wizcraft-gray: #6c757d;
        --wizcraft-light: #f8f9fa;
    }

    .hero-banner {
        position: relative;
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        padding: 120px 0 100px;
    }

    .hero-bg::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><g fill="%23ff6b00" fill-opacity="0.05"><circle cx="30" cy="30" r="4"/></g></svg>') repeat;
        opacity: 0.3;
    }

    .bg-shapes {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: 1;
    }

    .shape {
        position: absolute;
        background: linear-gradient(45deg, var(--wizcraft-orange), var(--wizcraft-orange-light));
        border-radius: 50%;
        opacity: 0.1;
        animation: float 6s ease-in-out infinite;
    }

    .shape-1 {
        width: 300px;
        height: 300px;
        top: 10%;
        right: -50px;
        animation-delay: 0s;
    }

    .shape-2 {
        width: 200px;
        height: 200px;
        bottom: 20%;
        left: -50px;
        animation-delay: 2s;
    }

    .shape-3 {
        width: 150px;
        height: 150px;
        top: 50%;
        right: 20%;
        animation-delay: 4s;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px) rotate(0deg);
        }

        50% {
            transform: translateY(-20px) rotate(5deg);
        }
    }

    .hero-content {
        position: relative;
        z-index: 2;
    }

    .hero-pretitle .badge {
        font-size: 0.9rem;
        border-radius: 25px;
        border: 1px solid var(--wizcraft-orange);
    }

    .bg-orange-light {
        background-color: rgba(255, 107, 0, 0.1) !important;
    }

    .hero-title {
        font-size: clamp(2.5rem, 5vw, 4rem);
        line-height: 1.2;
        font-weight: 700;
        margin-bottom: 1.5rem;
    }

    .text-orange {
        color: var(--wizcraft-orange) !important;
    }

    .hero-subtitle {
        font-size: 1.25rem;
        line-height: 1.6;
        color: var(--wizcraft-gray);
        max-width: 90%;
    }

    .feature-highlight {
        padding: 0.5rem 0;
    }

    .feature-highlight .feature-icon {
        width: 24px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .btn-orange {
        background: linear-gradient(45deg, var(--wizcraft-orange), var(--wizcraft-orange-light));
        border: none;
        color: white;
        font-weight: 600;
        border-radius: 50px;
        box-shadow: 0 4px 15px rgba(255, 107, 0, 0.3);
        transition: all 0.3s ease;
    }

    .btn-orange:hover {
        background: linear-gradient(45deg, var(--wizcraft-orange-dark), var(--wizcraft-orange));
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(255, 107, 0, 0.4);
        color: white;
    }

    .btn-outline-dark {
        border-radius: 50px;
        font-weight: 600;
        border: 2px solid var(--wizcraft-dark);
        color: var(--wizcraft-dark);
        transition: all 0.3s ease;
    }

    .btn-outline-dark:hover {
        background: var(--wizcraft-dark);
        color: white;
        transform: translateY(-2px);
    }

    .brand-logo {
        height: 40px;
        width: auto;
        opacity: 0.6;
        filter: grayscale(1);
        transition: all 0.3s ease;
    }

    .brand-logo:hover {
        opacity: 1;
        filter: grayscale(0);
    }

    .trust-metric {
        padding: 1rem;
        background: rgba(255, 255, 255, 0.8);
        border-radius: 10px;
        border: 1px solid rgba(255, 107, 0, 0.1);
        transition: all 0.3s ease;
    }

    .trust-metric:hover {
        background: white;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transform: translateY(-2px);
    }

    .metric-number {
        color: var(--wizcraft-orange);
    }

    .metric-label {
        font-weight: 500;
    }

    .hero-visual {
        position: relative;
    }

    .hero-main-image {
        width: 100%;
        height: auto;
        border-radius: 20px !important;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
    }

    .bg-gradient-orange {
        background: linear-gradient(135deg, var(--wizcraft-orange), var(--wizcraft-orange-light)) !important;
    }

    .floating-stats {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .stat-card {
        position: absolute;
        background: white;
        border-radius: 15px;
        padding: 1.5rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 107, 0, 0.1);
        display: flex;
        align-items: center;
        backdrop-filter: blur(10px);
        transition: all 0.3s ease;
        min-width: 200px;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
    }

    .stat-card-1 {
        top: 15%;
        right: -10%;
    }

    .stat-card-2 {
        bottom: 30%;
        left: -10%;
    }

    .stat-card-3 {
        bottom: 10%;
        right: 10%;
    }

    .stat-icon {
        width: 50px;
        height: 50px;
        background: rgba(255, 107, 0, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        font-size: 1.5rem;
    }

    .stat-number {
        font-size: 1.5rem;
        font-weight: bold;
        color: var(--wizcraft-orange);
        line-height: 1;
    }

    .stat-label {
        font-size: 0.875rem;
        color: var(--wizcraft-gray);
        font-weight: 500;
    }

    .scroll-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 50px;
        height: 50px;
        background: white;
        color: var(--wizcraft-orange);
        border-radius: 50%;
        text-decoration: none;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 107, 0, 0.2);
        transition: all 0.3s ease;
    }

    .scroll-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        color: var(--wizcraft-orange);
        background: rgba(255, 107, 0, 0.1);
    }

    /* Responsive Design */
    @media (max-width: 991px) {
        .hero-banner {
            padding: 100px 0 80px;
        }

        .floating-stats {
            position: static;
            margin-top: 2rem;
        }

        .stat-card {
            position: static;
            margin-bottom: 1rem;
            width: 100%;
            max-width: 300px;
        }

        .stat-card-1,
        .stat-card-2,
        .stat-card-3 {
            position: static;
            top: auto;
            bottom: auto;
            left: auto;
            right: auto;
        }

        .hero-subtitle {
            max-width: 100%;
        }
    }

    @media (max-width: 768px) {
        .hero-banner {
            padding: 80px 0 60px;
        }

        .hero-actions .btn {
            width: 100%;
            margin-bottom: 1rem;
        }

        .hero-actions .btn:last-child {
            margin-bottom: 0;
        }

        .trust-indicators .brand-logos {
            justify-content: center;
        }

        .trust-indicators .trust-metric {
            margin-bottom: 1rem;
        }
    }

    /* Animation improvements */
    .hero-content>* {
        animation-fill-mode: both;
    }

    /* Enhanced hover effects */
    .hero-actions .btn {
        position: relative;
        overflow: hidden;
    }

    .hero-actions .btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: all 0.5s ease;
    }

    .hero-actions .btn:hover::before {
        left: 100%;
    }
</style>