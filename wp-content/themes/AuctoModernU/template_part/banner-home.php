<!-- Hero Banner Section -->
<section id="hero" class="hero-section position-relative overflow-hidden">
    <?php
    $args = array(
        'post_type' => 'slides',
        'orderby' => 'menu_order',
        'posts_per_page' => -1
    );
    $slides = new WP_Query($args);

    if ($slides->have_posts()): ?>

        <!-- Modern Carousel -->
        <div id="heroCarousel" class="carousel slide modern-carousel position-absolute w-100 h-100" data-bs-ride="carousel" data-bs-interval="5000">

            <!-- Carousel Indicators -->
            <div class="carousel-indicators">
                <?php
                $indicator_count = 0;
                while ($slides->have_posts()): $slides->the_post();
                ?>
                    <button
                        type="button"
                        data-bs-target="#heroCarousel"
                        data-bs-slide-to="<?php echo $indicator_count; ?>"
                        class="<?php echo ($indicator_count === 0) ? 'active' : ''; ?>"
                        aria-current="<?php echo ($indicator_count === 0) ? 'true' : 'false'; ?>"
                        aria-label="Slide <?php echo $indicator_count + 1; ?>">
                    </button>
                <?php
                    $indicator_count++;
                endwhile;
                wp_reset_postdata();
                ?>
            </div>

            <!-- Carousel Inner -->
            <div class="carousel-inner h-100">
                <?php
                $slide_count = 0;
                while ($slides->have_posts()): $slides->the_post();
                ?>
                    <div class="carousel-item h-100 <?php echo ($slide_count === 0) ? 'active' : ''; ?>">
                        <div class="carousel-background" style="background-image: url('<?php the_post_thumbnail_url('hero_slide'); ?>');"></div>

                        <!-- Slide Content Overlay -->
                        <div class="carousel-caption-custom d-flex align-items-center justify-content-center h-100">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-8 mx-auto text-center text-white">
                                        <?php if (get_the_title()): ?>
                                            <h1 class="hero-slide-title mb-4" data-aos="fade-up" data-aos-delay="300">
                                                <?php the_title(); ?>
                                            </h1>
                                        <?php endif; ?>

                                        <?php if (get_the_content()): ?>
                                            <p class="hero-slide-content mb-5" data-aos="fade-up" data-aos-delay="500">
                                                <?php echo wp_trim_words(get_the_content(), 25); ?>
                                            </p>
                                        <?php endif; ?>

                                        <div class="hero-buttons" data-aos="fade-up" data-aos-delay="700">
                                            <a href="#about" class="btn btn-primary me-3">Learn More</a>
                                            <a href="#contact" class="btn btn-outline">Get Started</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    $slide_count++;
                endwhile;
                wp_reset_postdata();
                ?>
            </div>

            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    <?php else: ?>

        <!-- Fallback Hero Content -->
        <div class="hero-content-fallback d-flex align-items-center justify-content-center h-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center text-white">
                        <h1 class="hero-title mb-4" data-aos="fade-up">
                            <?php echo get_theme_mod('hero_title', 'Auctocreation'); ?>
                        </h1>
                        <p class="hero-subtitle mb-5" data-aos="fade-up" data-aos-delay="200">
                            <?php echo get_theme_mod('hero_subtitle', 'We believe that every event is a unique story waiting to be told. As the leading event management company in Northeast India, we specialize in turning visions into reality.'); ?>
                        </p>
                        <div class="hero-buttons" data-aos="fade-up" data-aos-delay="400">
                            <a href="#about" class="btn btn-primary me-3">Discover More</a>
                            <a href="#contact" class="btn btn-outline">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Background Pattern for Fallback -->
        <div class="hero-bg-pattern"></div>

    <?php endif; ?>

    <!-- Scroll Down Indicator -->
    <div class="scroll-indicator position-absolute bottom-0 start-50 translate-middle-x mb-4" data-aos="fade-up" data-aos-delay="1000">
        <a href="#about" class="text-white text-decoration-none">
            <div class="scroll-icon">
                <span></span>
            </div>
            <p class="small mt-2">Scroll Down</p>
        </a>
    </div>
</section>

<style>
    /* Hero Section Custom Styles */
    .hero-section {
        height: 100vh;
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
    }

    .modern-carousel .carousel-item {
        height: 100vh;
    }

    .modern-carousel .carousel-background {
        height: 100%;
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        position: relative;
    }

    .modern-carousel .carousel-background::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(44, 62, 80, 0.7) 0%, rgba(231, 76, 60, 0.4) 100%);
    }

    .carousel-caption-custom {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 2;
    }

    .hero-slide-title {
        font-size: 3.5rem;
        font-weight: 700;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .hero-slide-content {
        font-size: 1.2rem;
        line-height: 1.8;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
    }

    .hero-content-fallback {
        height: 100vh;
        z-index: 2;
        position: relative;
    }

    .hero-bg-pattern {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background:
            radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
            radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.3) 0%, transparent 50%),
            radial-gradient(circle at 40% 40%, rgba(120, 219, 226, 0.3) 0%, transparent 50%);
    }

    /* Carousel Controls Custom Styling */
    .modern-carousel .carousel-control-prev,
    .modern-carousel .carousel-control-next {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        top: 50%;
        transform: translateY(-50%);
        transition: all 0.3s ease;
    }

    .modern-carousel .carousel-control-prev {
        left: 30px;
    }

    .modern-carousel .carousel-control-next {
        right: 30px;
    }

    .modern-carousel .carousel-control-prev:hover,
    .modern-carousel .carousel-control-next:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: translateY(-50%) scale(1.1);
    }

    /* Custom Carousel Indicators */
    .modern-carousel .carousel-indicators {
        bottom: 30px;
    }

    .modern-carousel .carousel-indicators [data-bs-target] {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        border: 2px solid rgba(255, 255, 255, 0.5);
        background: transparent;
        margin: 0 5px;
        transition: all 0.3s ease;
    }

    .modern-carousel .carousel-indicators .active {
        background: white;
        border-color: white;
        transform: scale(1.2);
    }

    /* Scroll Indicator Animation */
    .scroll-indicator .scroll-icon {
        width: 30px;
        height: 50px;
        border: 2px solid rgba(255, 255, 255, 0.5);
        border-radius: 25px;
        position: relative;
    }

    .scroll-indicator .scroll-icon span {
        position: absolute;
        top: 8px;
        left: 50%;
        width: 4px;
        height: 8px;
        background: white;
        border-radius: 2px;
        transform: translateX(-50%);
        animation: scroll-down 2s infinite;
    }

    @keyframes scroll-down {

        0%,
        20% {
            transform: translateX(-50%) translateY(0px);
            opacity: 0;
        }

        50% {
            opacity: 1;
        }

        100% {
            transform: translateX(-50%) translateY(20px);
            opacity: 0;
        }
    }

    /* Responsive Design */
    @media (max-width: 768px) {

        .hero-slide-title,
        .hero-title {
            font-size: 2.5rem;
        }

        .hero-slide-content,
        .hero-subtitle {
            font-size: 1rem;
        }

        .modern-carousel .carousel-control-prev {
            left: 15px;
        }

        .modern-carousel .carousel-control-next {
            right: 15px;
        }

        .modern-carousel .carousel-control-prev,
        .modern-carousel .carousel-control-next {
            width: 45px;
            height: 45px;
        }
    }
</style>