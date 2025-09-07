<!-- Achievement Section -->
<section id="achievements" class="section section-alt">
    <div class="container">
        <?php
        $args_achievement = array(
            'post_type' => 'achievement',
            'orderby' => 'menu_order',
            'posts_per_page' => -1
        );
        $achievement_slides = new WP_Query($args_achievement);

        if ($achievement_slides->have_posts()): ?>

            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 class="section-title text-gradient mb-3" data-aos="fade-up">Our Achievements</h2>
                    <p class="section-subtitle text-muted mb-5" data-aos="fade-up" data-aos-delay="200">
                        Recognition and milestones that define our excellence
                    </p>
                </div>
            </div>

            <!-- Achievement Timeline -->
            <div class="achievement-timeline" data-aos="fade-up">
                <?php
                $achievement_count = 0;
                while ($achievement_slides->have_posts()): $achievement_slides->the_post();
                    $is_left = ($achievement_count % 2 === 0);
                ?>
                    <div class="timeline-item <?php echo $is_left ? 'timeline-left' : 'timeline-right'; ?>" data-aos="fade-<?php echo $is_left ? 'right' : 'left'; ?>" data-aos-delay="<?php echo $achievement_count * 200; ?>">
                        <div class="timeline-content modern-card">
                            <?php if (has_post_thumbnail()): ?>
                                <div class="achievement-image mb-3">
                                    <img src="<?php the_post_thumbnail_url('achievement_slides'); ?>"
                                        alt="<?php echo esc_html(get_the_title()); ?>"
                                        class="img-fluid rounded">
                                </div>
                            <?php endif; ?>

                            <div class="achievement-badge mb-3">
                                <i class="fas fa-trophy text-primary"></i>
                                <span class="badge-text">Achievement</span>
                            </div>

                            <h4 class="achievement-title mb-3">
                                <?php echo esc_html(get_the_title()); ?>
                            </h4>

                            <?php if (get_the_content()): ?>
                                <p class="achievement-description text-muted mb-3">
                                    <?php echo wp_trim_words(get_the_content(), 20); ?>
                                </p>
                            <?php endif; ?>

                            <?php if ($date = get_post_meta(get_the_ID(), 'achievement_date', true)): ?>
                                <div class="achievement-date">
                                    <i class="fas fa-calendar-alt me-2"></i>
                                    <?php echo esc_html($date); ?>
                                </div>
                            <?php endif; ?>

                            <button class="btn btn-outline mt-3" data-bs-toggle="modal" data-bs-target="#achievementModal<?php echo get_the_ID(); ?>">
                                Read More
                            </button>
                        </div>

                        <div class="timeline-marker">
                            <div class="timeline-icon">
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Achievement Modal -->
                    <div class="modal fade" id="achievementModal<?php echo get_the_ID(); ?>" tabindex="-1" aria-labelledby="achievementModalLabel<?php echo get_the_ID(); ?>" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="achievementModalLabel<?php echo get_the_ID(); ?>">
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

                                    <?php if ($date = get_post_meta(get_the_ID(), 'achievement_date', true)): ?>
                                        <div class="achievement-meta mt-3">
                                            <p><strong>Date:</strong> <?php echo esc_html($date); ?></p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php
                    $achievement_count++;
                endwhile;
                wp_reset_postdata();
                ?>
            </div>

            <!-- Achievement Stats -->
            <div class="row mt-5" data-aos="fade-up">
                <div class="col-lg-10 mx-auto">
                    <div class="achievement-stats modern-card">
                        <div class="row text-center">
                            <div class="col-md-4 mb-3">
                                <h3 class="text-gradient mb-2">10+</h3>
                                <p class="text-muted">Years of Excellence</p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <h3 class="text-gradient mb-2">50+</h3>
                                <p class="text-muted">Awards & Recognition</p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <h3 class="text-gradient mb-2">500+</h3>
                                <p class="text-muted">Successful Projects</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>
    </div>
</section>

<style>
    /* Achievement Timeline Styles */
    .achievement-timeline {
        position: relative;
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem 0;
    }

    .achievement-timeline::before {
        content: '';
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        width: 4px;
        height: 100%;
        background: linear-gradient(to bottom, var(--primary-color), var(--accent-color));
        border-radius: 2px;
    }

    .timeline-item {
        position: relative;
        margin-bottom: 3rem;
        width: 100%;
    }

    .timeline-left .timeline-content {
        margin-right: calc(50% + 30px);
        text-align: right;
    }

    .timeline-right .timeline-content {
        margin-left: calc(50% + 30px);
        text-align: left;
    }

    .timeline-marker {
        position: absolute;
        left: 50%;
        top: 20px;
        transform: translateX(-50%);
        z-index: 2;
    }

    .timeline-icon {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--accent-color), var(--secondary-color));
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.2rem;
        box-shadow: var(--shadow-lg);
    }

    .achievement-badge {
        display: inline-flex;
        align-items: center;
        background: rgba(231, 76, 60, 0.1);
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 0.875rem;
        font-weight: 500;
        color: var(--accent-color);
    }

    .achievement-badge i {
        margin-right: 8px;
    }

    .achievement-image img {
        max-height: 200px;
        object-fit: cover;
    }

    .achievement-date {
        font-size: 0.875rem;
        color: var(--gray);
        font-weight: 500;
    }

    .achievement-stats {
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        color: white;
        padding: 3rem;
        border-radius: var(--border-radius-lg);
    }

    .achievement-stats h3 {
        color: white;
        font-size: 3rem;
        font-weight: 700;
    }

    .achievement-stats p {
        color: rgba(255, 255, 255, 0.8);
        font-size: 1.1rem;
    }

    /* Mobile Responsiveness */
    @media (max-width: 768px) {
        .achievement-timeline::before {
            left: 30px;
        }

        .timeline-left .timeline-content,
        .timeline-right .timeline-content {
            margin: 0;
            margin-left: 60px;
            text-align: left;
        }

        .timeline-marker {
            left: 30px;
        }

        .achievement-stats {
            padding: 2rem 1rem;
        }

        .achievement-stats h3 {
            font-size: 2rem;
        }
    }

    @media (max-width: 480px) {
        .timeline-item {
            margin-bottom: 2rem;
        }

        .timeline-icon {
            width: 40px;
            height: 40px;
            font-size: 1rem;
        }
    }
</style>