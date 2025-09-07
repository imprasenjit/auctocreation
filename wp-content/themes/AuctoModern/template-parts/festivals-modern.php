<!-- Modern Festivals Section - WordPress Dynamic -->
<section class="modern-section festivals-section-dark" id="festivals">
    <!-- Background Elements -->
    <div class="festivals-bg-modern"></div>
    <div class="floating-shapes-festivals">
        <div class="festival-shape shape-1"></div>
        <div class="festival-shape shape-2"></div>
        <div class="festival-shape shape-3"></div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5" data-aos="fade-up">
                <div class="section-badge mb-4">
                    <span class="badge-modern">
                        <i class="fas fa-music me-2"></i>
                        Our Events
                    </span>
                </div>
                <h2 class="modern-section-title mb-4">
                    Recent <span class="gradient-text">Festivals</span>
                </h2>
                <p class="modern-subtitle">
                    Experience the magic of our recent festival productions and large-scale event management.
                </p>
            </div>
        </div>

        <?php
        // Fetch festivals from WordPress
        $argsFestival = array(
            'post_type' => 'festival',
            'orderby' => 'menu_order',
            'posts_per_page' => 6
        );
        $festivalSlides = new WP_Query($argsFestival);

        if ($festivalSlides->have_posts()) :
        ?>

            <!-- Festivals Grid -->
            <div class="row g-4">
                <?php
                $festival_count = 0;
                $delay = 200;
                while ($festivalSlides->have_posts()) : $festivalSlides->the_post();
                    if (has_post_thumbnail(get_the_ID())):
                ?>
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                            <div class="festival-card-modern">
                                <div class="festival-image-container">
                                    <img src="<?php the_post_thumbnail_url('large'); ?>"
                                        alt="<?php echo esc_attr(get_the_post_thumbnail_caption()); ?>"
                                        class="festival-image">
                                    <div class="festival-overlay">
                                        <div class="festival-content">
                                            <h4 class="festival-title"><?php echo esc_html(get_the_title()); ?></h4>
                                            <?php if (get_the_post_thumbnail_caption()): ?>
                                                <p class="festival-description"><?php echo esc_html(get_the_post_thumbnail_caption()); ?></p>
                                            <?php endif; ?>
                                            <?php if (get_the_content()): ?>
                                                <div class="festival-details">
                                                    <?php the_content(); ?>
                                                </div>
                                            <?php endif; ?>
                                            <div class="festival-actions">
                                                <button class="btn btn-modern-outline btn-sm" onclick="openFestivalModal(<?php echo get_the_ID(); ?>)">
                                                    <span>View Details</span>
                                                    <i class="fas fa-eye ms-2"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="festival-info">
                                    <h5><?php echo esc_html(get_the_title()); ?></h5>
                                    <?php if (get_the_post_thumbnail_caption()): ?>
                                        <p><?php echo esc_html(get_the_post_thumbnail_caption()); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="festival-glow"></div>
                            </div>
                        </div>
                <?php
                        $delay += 200;
                        $festival_count++;
                    endif;
                endwhile;
                wp_reset_postdata();
                ?>
            </div>

            <!-- View More Button -->
            <div class="row mt-5">
                <div class="col-lg-8 mx-auto text-center" data-aos="fade-up" data-aos-delay="800">
                    <div class="festival-cta-modern">
                        <h3 class="mb-4">Ready to Plan Your Festival?</h3>
                        <p class="mb-4">Let us help you create an unforgettable festival experience that brings people together.</p>
                        <a href="#contact" class="btn btn-modern-primary btn-lg">
                            <span>Plan Your Event</span>
                            <i class="fas fa-calendar-plus ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>

        <?php else: ?>

            <!-- Fallback Content -->
            <div class="row">
                <div class="col-12 text-center" data-aos="fade-up">
                    <div class="festivals-fallback">
                        <i class="fas fa-calendar-alt festivals-fallback-icon"></i>
                        <h4>Upcoming Festivals</h4>
                        <p>Stay tuned for our exciting festival lineup coming soon!</p>
                        <a href="#contact" class="btn btn-modern-primary mt-3">
                            <span>Get Notified</span>
                            <i class="fas fa-bell ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>

        <?php endif; ?>
    </div>
</section>