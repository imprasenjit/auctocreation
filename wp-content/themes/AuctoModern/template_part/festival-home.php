<!-- Festival Section -->
<section id="festivals" class="section">
    <div class="container">
        <?php
        $args_festival = array(
            'post_type' => 'festival',
            'orderby' => 'menu_order',
            'posts_per_page' => -1
        );
        $festival_slides = new WP_Query($args_festival);

        if ($festival_slides->have_posts()): ?>

            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 class="section-title text-gradient mb-3" data-aos="fade-up">Festival Management</h2>
                    <p class="section-subtitle text-muted mb-5" data-aos="fade-up" data-aos-delay="200">
                        Creating memorable festival experiences across Northeast India
                    </p>
                </div>
            </div>

            <!-- Festival Carousel -->
            <div id="festivalCarousel" class="carousel slide mb-5" data-bs-ride="carousel" data-aos="fade-up">
                <div class="carousel-inner">
                    <?php
                    $festival_count = 0;
                    $festivals_per_slide = 3;
                    $total_festivals = $festival_slides->found_posts;

                    while ($festival_slides->have_posts()): $festival_slides->the_post();

                        if ($festival_count % $festivals_per_slide === 0): ?>
                            <div class="carousel-item <?php echo ($festival_count === 0) ? 'active' : ''; ?>">
                                <div class="row">
                                <?php endif; ?>

                                <div class="col-md-4 mb-4">
                                    <div class="modern-card festival-card h-100">
                                        <?php if (has_post_thumbnail()): ?>
                                            <div class="festival-image-wrapper mb-3">
                                                <img src="<?php the_post_thumbnail_url('festival'); ?>"
                                                    alt="<?php echo esc_html(get_the_title()); ?>"
                                                    class="img-fluid rounded festival-image">
                                                <div class="festival-overlay">
                                                    <div class="festival-badge">
                                                        <i class="fas fa-calendar-alt"></i>
                                                        <span>Festival</span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <div class="card-content">
                                            <h4 class="card-title mb-3">
                                                <?php echo esc_html(get_the_title()); ?>
                                            </h4>

                                            <?php if (get_the_content()): ?>
                                                <p class="card-excerpt text-muted mb-3">
                                                    <?php echo wp_trim_words(get_the_content(), 12); ?>
                                                </p>
                                            <?php endif; ?>

                                            <div class="festival-meta d-flex justify-content-between align-items-center">
                                                <span class="festival-location">
                                                    <i class="fas fa-map-marker-alt text-primary me-1"></i>
                                                    <?php echo get_post_meta(get_the_ID(), 'festival_location', true) ?: 'Northeast India'; ?>
                                                </span>
                                                <a href="#" class="btn btn-sm btn-outline" data-bs-toggle="modal" data-bs-target="#festivalModal<?php echo get_the_ID(); ?>">
                                                    View Details
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                $festival_count++;

                                if ($festival_count % $festivals_per_slide === 0 || $festival_count === $total_festivals): ?>
                                </div>
                            </div>
                    <?php endif;

                            endwhile;
                            wp_reset_postdata();
                    ?>
                </div>

                <!-- Carousel Controls -->
                <?php if ($total_festivals > $festivals_per_slide): ?>
                    <button class="carousel-control-prev" type="button" data-bs-target="#festivalCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#festivalCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                <?php endif; ?>
            </div>

            <!-- Festival Statistics -->
            <div class="row festival-stats" data-aos="fade-up">
                <div class="col-md-3 col-6 mb-4">
                    <div class="stat-card modern-card text-center">
                        <div class="stat-icon mb-3">
                            <i class="fas fa-music fa-2x text-primary"></i>
                        </div>
                        <h3 class="stat-number text-gradient">50+</h3>
                        <p class="stat-label">Festivals Organized</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="stat-card modern-card text-center">
                        <div class="stat-icon mb-3">
                            <i class="fas fa-users fa-2x text-primary"></i>
                        </div>
                        <h3 class="stat-number text-gradient">100K+</h3>
                        <p class="stat-label">Total Attendees</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="stat-card modern-card text-center">
                        <div class="stat-icon mb-3">
                            <i class="fas fa-award fa-2x text-primary"></i>
                        </div>
                        <h3 class="stat-number text-gradient">25+</h3>
                        <p class="stat-label">Awards Won</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="stat-card modern-card text-center">
                        <div class="stat-icon mb-3">
                            <i class="fas fa-heart fa-2x text-primary"></i>
                        </div>
                        <h3 class="stat-number text-gradient">95%</h3>
                        <p class="stat-label">Client Satisfaction</p>
                    </div>
                </div>
            </div>

            <!-- Festival Modals -->
            <?php
            while ($festival_slides->have_posts()): $festival_slides->the_post();
            ?>
                <div class="modal fade" id="festivalModal<?php echo get_the_ID(); ?>" tabindex="-1" aria-labelledby="festivalModalLabel<?php echo get_the_ID(); ?>" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="festivalModalLabel<?php echo get_the_ID(); ?>">
                                    <?php echo esc_html(get_the_title()); ?>
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <?php if (has_post_thumbnail()): ?>
                                    <img src="<?php the_post_thumbnail_url('large'); ?>"
                                        alt="<?php echo esc_html(get_the_title()); ?>"
                                        class="img-fluid rounded mb-3">
                                <?php endif; ?>

                                <?php if (get_the_content()): ?>
                                    <div class="content">
                                        <?php echo wpautop(get_the_content()); ?>
                                    </div>
                                <?php endif; ?>

                                <div class="festival-details mt-3">
                                    <?php if ($location = get_post_meta(get_the_ID(), 'festival_location', true)): ?>
                                        <p><strong>Location:</strong> <?php echo esc_html($location); ?></p>
                                    <?php endif; ?>

                                    <?php if ($date = get_post_meta(get_the_ID(), 'festival_date', true)): ?>
                                        <p><strong>Date:</strong> <?php echo esc_html($date); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <a href="#contact" class="btn btn-primary" data-bs-dismiss="modal">Plan Similar Event</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            endwhile;
            wp_reset_postdata();
            ?>

        <?php endif; ?>
    </div>
</section>

<style>
    /* Festival Section Custom Styles */
    .festival-card {
        transition: all 0.3s ease;
        overflow: hidden;
    }

    .festival-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-xl);
    }

    .festival-image-wrapper {
        position: relative;
        overflow: hidden;
        border-radius: var(--border-radius);
    }

    .festival-image {
        transition: transform 0.3s ease;
    }

    .festival-overlay {
        position: absolute;
        top: 15px;
        right: 15px;
    }

    .festival-badge {
        background: rgba(231, 76, 60, 0.9);
        color: white;
        padding: 8px 12px;
        border-radius: 20px;
        font-size: 0.875rem;
        font-weight: 500;
        backdrop-filter: blur(10px);
    }

    .festival-badge i {
        margin-right: 5px;
    }

    .festival-card:hover .festival-image {
        transform: scale(1.05);
    }

    .festival-meta {
        margin-top: auto;
        padding-top: 1rem;
        border-top: 1px solid #eee;
    }

    .festival-location {
        font-size: 0.875rem;
        color: var(--gray);
    }

    .stat-card {
        padding: 2rem 1rem;
        transition: all 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-5px);
    }

    .stat-number {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .stat-label {
        font-size: 0.875rem;
        color: var(--gray);
        margin: 0;
    }

    #festivalCarousel .carousel-control-prev,
    #festivalCarousel .carousel-control-next {
        background: rgba(44, 62, 80, 0.1);
        border: none;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        top: 50%;
        transform: translateY(-50%);
    }

    #festivalCarousel .carousel-control-prev {
        left: -25px;
    }

    #festivalCarousel .carousel-control-next {
        right: -25px;
    }

    @media (max-width: 768px) {
        .stat-number {
            font-size: 2rem;
        }

        #festivalCarousel .carousel-control-prev,
        #festivalCarousel .carousel-control-next {
            display: none;
        }

        .festival-stats {
            margin-top: 2rem;
        }
    }
</style>