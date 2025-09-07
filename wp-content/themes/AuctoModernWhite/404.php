<?php

/**
 * Template for displaying 404 error page
 *
 * @package AuctoModernWhite
 * @version 2.0
 */

get_header(); ?>

<main id="main-content" class="error-404-page">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">

                <!-- 404 Animation/Icon -->
                <div class="error-icon mb-5" data-aos="zoom-in">
                    <div class="error-number">
                        <span class="display-1 fw-bold text-primary">4</span>
                        <span class="display-1 fw-bold text-secondary">0</span>
                        <span class="display-1 fw-bold text-primary">4</span>
                    </div>
                    <i class="fas fa-exclamation-triangle fa-3x text-warning mt-3"></i>
                </div>

                <!-- Error Message -->
                <div class="error-content" data-aos="fade-up" data-aos-delay="200">
                    <h1 class="display-4 mb-3">Oops! Page Not Found</h1>
                    <p class="lead text-muted mb-4">
                        The page you are looking for might have been removed, had its name changed,
                        or is temporarily unavailable.
                    </p>
                </div>

                <!-- Search Box -->
                <div class="error-search mb-5" data-aos="fade-up" data-aos-delay="400">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <h5 class="mb-3">Try searching for what you need:</h5>
                            <form role="search" method="get" action="<?php echo home_url('/'); ?>">
                                <div class="input-group input-group-lg">
                                    <input type="search"
                                        class="form-control"
                                        placeholder="Search for pages, posts, or content..."
                                        name="s">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-search me-2"></i>Search
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="error-links" data-aos="fade-up" data-aos-delay="600">
                    <h5 class="mb-4">Or try these popular pages:</h5>
                    <div class="row g-3 justify-content-center">
                        <div class="col-auto">
                            <a href="<?php echo home_url(); ?>" class="btn btn-outline-primary">
                                <i class="fas fa-home me-2"></i>Home
                            </a>
                        </div>
                        <div class="col-auto">
                            <a href="<?php echo home_url(); ?>#production" class="btn btn-outline-secondary">
                                <i class="fas fa-film me-2"></i>Production
                            </a>
                        </div>
                        <div class="col-auto">
                            <a href="<?php echo home_url(); ?>#festivals" class="btn btn-outline-secondary">
                                <i class="fas fa-calendar-alt me-2"></i>Festivals
                            </a>
                        </div>
                        <div class="col-auto">
                            <a href="<?php echo home_url(); ?>#gallery" class="btn btn-outline-secondary">
                                <i class="fas fa-images me-2"></i>Gallery
                            </a>
                        </div>
                        <div class="col-auto">
                            <a href="<?php echo home_url(); ?>#contact" class="btn btn-outline-secondary">
                                <i class="fas fa-envelope me-2"></i>Contact
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Recent Posts -->
                <?php
                $recent_posts = wp_get_recent_posts(array(
                    'numberposts' => 3,
                    'post_status' => 'publish'
                ));

                if ($recent_posts) :
                ?>
                    <div class="error-recent-posts mt-5" data-aos="fade-up" data-aos-delay="800">
                        <h5 class="mb-4">Recent Posts</h5>
                        <div class="row g-4">
                            <?php foreach ($recent_posts as $recent) : ?>
                                <div class="col-md-4">
                                    <div class="card h-100">
                                        <?php
                                        $thumbnail = get_the_post_thumbnail($recent['ID'], 'medium', array('class' => 'card-img-top'));
                                        if ($thumbnail) {
                                            echo $thumbnail;
                                        }
                                        ?>
                                        <div class="card-body">
                                            <h6 class="card-title">
                                                <a href="<?php echo get_permalink($recent['ID']); ?>"
                                                    class="text-decoration-none">
                                                    <?php echo $recent['post_title']; ?>
                                                </a>
                                            </h6>
                                            <small class="text-muted">
                                                <?php echo date('F j, Y', strtotime($recent['post_date'])); ?>
                                            </small>
                                            <p class="card-text mt-2">
                                                <?php echo wp_trim_words($recent['post_content'], 15); ?>
                                            </p>
                                            <a href="<?php echo get_permalink($recent['ID']); ?>"
                                                class="btn btn-sm btn-outline-primary">
                                                Read More
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Contact Info -->
                <div class="error-contact mt-5 pt-5 border-top" data-aos="fade-up" data-aos-delay="1000">
                    <h5 class="mb-3">Still can't find what you're looking for?</h5>
                    <p class="text-muted mb-4">
                        Get in touch with us and we'll help you find what you need.
                    </p>
                    <div class="row g-3 justify-content-center">
                        <div class="col-auto">
                            <a href="tel:+91-1234567890" class="btn btn-outline-success">
                                <i class="fas fa-phone me-2"></i>Call Us
                            </a>
                        </div>
                        <div class="col-auto">
                            <a href="mailto:info@auctocreation.com" class="btn btn-outline-info">
                                <i class="fas fa-envelope me-2"></i>Email Us
                            </a>
                        </div>
                        <div class="col-auto">
                            <a href="<?php echo home_url(); ?>#contact" class="btn btn-outline-warning">
                                <i class="fas fa-map-marker-alt me-2"></i>Visit Us
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>

<style>
    .error-404-page {
        min-height: 70vh;
        display: flex;
        align-items: center;
    }

    .error-number {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
    }

    .error-number span {
        animation: bounce 2s infinite;
    }

    .error-number span:nth-child(2) {
        animation-delay: 0.1s;
    }

    .error-number span:nth-child(3) {
        animation-delay: 0.2s;
    }

    @keyframes bounce {

        0%,
        20%,
        50%,
        80%,
        100% {
            transform: translateY(0);
        }

        40% {
            transform: translateY(-20px);
        }

        60% {
            transform: translateY(-10px);
        }
    }

    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }
</style>

<?php get_footer(); ?>