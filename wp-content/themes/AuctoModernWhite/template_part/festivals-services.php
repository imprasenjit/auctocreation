<!-- Ultra Modern Festivals Section -->
<section class="ultra-modern-festivals" id="festivals">
    <!-- Animated Background -->
    <div class="festivals-bg-particles" aria-hidden="true">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <!-- Gradient Overlay -->
    <div class="festivals-gradient-overlay" aria-hidden="true"></div>

    <div class="container">
        <?php
        $argsFestival = array(
            'post_type' => 'festival',
            'orderby' => 'menu_order',
            'posts_per_page' => -1
        );
        $festivalSlides = new WP_Query($argsFestival);

        if ($festivalSlides->have_posts()) :
        ?>
            <!-- Ultra Modern Section Header -->
            <div class="modern-section-header" data-aos="fade-up">
                <div class="header-badge">
                    <span class="badge-glow"></span>
                    <i class="fas fa-music" aria-hidden="true"></i>
                    <span>Festivals</span>
                </div>
                <h2 class="ultra-modern-title">
                    <span class="title-line">Cultural</span>
                    <span class="title-line gradient-text">Celebrations</span>
                </h2>
                <p class="modern-subtitle">Celebrating culture and community through memorable festivals that bring people together</p>
                <div class="title-decoration" aria-hidden="true">
                    <div class="decoration-line"></div>
                    <div class="decoration-dot"></div>
                    <div class="decoration-line"></div>
                </div>
            </div>

            <!-- Revolutionary Festivals Grid -->
            <div class="revolutionary-festivals-grid" data-aos="fade-up" data-aos-delay="200">
                <?php
                $festivalCount = 0;
                while ($festivalSlides->have_posts()) : $festivalSlides->the_post();
                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');
                    $caption = get_the_post_thumbnail_caption();
                    $title = get_the_title();
                    $content = get_the_content();
                    $excerpt = get_the_excerpt();
                    $delay = ($festivalCount % 3) * 100 + 300;
                ?>
                    <div class="ultra-festival-card" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                        <div class="festival-card-inner">
                            <?php if ($featured_img_url): ?>
                                <div class="festival-image-container">
                                    <div class="image-backdrop" aria-hidden="true"></div>
                                    <img src="<?php echo esc_url($featured_img_url); ?>"
                                        class="festival-image"
                                        alt="<?php echo esc_attr($caption ? $caption : $title); ?>"
                                        loading="lazy">
                                    <div class="festival-floating-badge">
                                        <div class="badge-glow-effect" aria-hidden="true"></div>
                                        <i class="fas fa-calendar-alt" aria-hidden="true"></i>
                                    </div>
                                    <div class="festival-overlay">
                                        <div class="overlay-content">
                                            <div class="overlay-icon">
                                                <i class="fas fa-music" aria-hidden="true"></i>
                                            </div>
                                            <span class="overlay-text">View Festival</span>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="festival-content">
                                <div class="festival-type-badge">
                                    <span>Cultural Event</span>
                                </div>

                                <?php if ($title): ?>
                                    <h4 class="festival-title"><?php echo esc_html($title); ?></h4>
                                <?php endif; ?>

                                <?php if ($excerpt): ?>
                                    <div class="festival-highlight">
                                        <div class="highlight-accent" aria-hidden="true"></div>
                                        <p class="highlight-text"><?php echo esc_html($excerpt); ?></p>
                                    </div>
                                <?php elseif ($caption): ?>
                                    <div class="festival-highlight">
                                        <div class="highlight-accent" aria-hidden="true"></div>
                                        <p class="highlight-text"><?php echo esc_html($caption); ?></p>
                                    </div>
                                <?php endif; ?>

                                <div class="festival-footer">
                                    <div class="festival-meta">
                                        <div class="meta-item">
                                            <i class="fas fa-users" aria-hidden="true"></i>
                                            <span>Community</span>
                                        </div>
                                        <div class="festival-category">
                                            <i class="fas fa-tag" aria-hidden="true"></i>
                                            <span>Festival</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    $festivalCount++;
                endwhile;
                ?>
            </div>

            <!-- Modern CTA Section -->
            <?php if ($festivalSlides->found_posts > 6): ?>
                <div class="modern-cta-section" data-aos="fade-up" data-aos-delay="400">
                    <div class="cta-content">
                        <h3 class="cta-title">Ready to celebrate?</h3>
                        <p class="cta-description">Let us help you create unforgettable festival experiences</p>
                        <a href="#gallery" class="btn btn-gradient btn-lg">
                            <i class="fas fa-calendar-check me-2" aria-hidden="true"></i>
                            View All Festivals
                            <span class="btn-glow" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
            <?php endif; ?>

        <?php
        else:
        ?>
            <!-- Modern Fallback Content -->
            <div class="modern-section-header" data-aos="fade-up">
                <div class="header-badge">
                    <span class="badge-glow"></span>
                    <i class="fas fa-music" aria-hidden="true"></i>
                    <span>Festivals</span>
                </div>
                <h2 class="ultra-modern-title">
                    <span class="title-line">Cultural</span>
                    <span class="title-line gradient-text">Celebrations</span>
                </h2>
                <p class="modern-subtitle">We organize and manage festivals that bring communities together</p>
            </div>

            <div class="modern-fallback-grid" data-aos="fade-up" data-aos-delay="200">
                <div class="fallback-card">
                    <div class="card-glow" aria-hidden="true"></div>
                    <div class="fallback-icon">
                        <i class="fas fa-music" aria-hidden="true"></i>
                    </div>
                    <h4>Music Festivals</h4>
                    <p>Professional organization of music festivals with world-class sound and staging.</p>
                </div>
                <div class="fallback-card">
                    <div class="card-glow" aria-hidden="true"></div>
                    <div class="fallback-icon">
                        <i class="fas fa-theater-masks" aria-hidden="true"></i>
                    </div>
                    <h4>Cultural Events</h4>
                    <p>Celebrating local culture and traditions through well-organized cultural festivals.</p>
                </div>
                <div class="fallback-card">
                    <div class="card-glow" aria-hidden="true"></div>
                    <div class="fallback-icon">
                        <i class="fas fa-utensils" aria-hidden="true"></i>
                    </div>
                    <h4>Food Festivals</h4>
                    <p>Gastronomic experiences that showcase local and international cuisines.</p>
                </div>
            </div>
        <?php
        endif;
        wp_reset_postdata();
        ?>
    </div>
</section>