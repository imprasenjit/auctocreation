<!-- Ultra Modern Achievements Section -->
<section class="ultra-modern-achievements" id="achievements">
    <!-- Animated Background -->
    <div class="achievements-bg-particles" aria-hidden="true">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <!-- Gradient Overlay -->
    <div class="achievements-gradient-overlay" aria-hidden="true"></div>

    <div class="container">
        <?php
        $argsAchievements = array(
            'post_type' => 'achievement',
            'orderby' => 'menu_order',
            'posts_per_page' => -1
        );
        $achievements = new WP_Query($argsAchievements);

        if ($achievements->have_posts()) :
        ?>
            <!-- Ultra Modern Section Header -->
            <div class="modern-section-header" data-aos="fade-up">
                <div class="header-badge">
                    <span class="badge-glow"></span>
                    <i class="fas fa-trophy" aria-hidden="true"></i>
                    <span>Achievements</span>
                </div>
                <!-- <h2 class="ultra-modern-title">
                    <span class="title-line">Excellence</span>
                    <span class="title-line gradient-text">Recognized</span>
                </h2> -->
                <p class="modern-subtitle">Industry recognition and awards that showcase our commitment to outstanding event experiences</p>
                <div class="title-decoration" aria-hidden="true">
                    <div class="decoration-line"></div>
                    <div class="decoration-dot"></div>
                    <div class="decoration-line"></div>
                </div>
            </div>

            <!-- Revolutionary Achievements Grid -->
            <div class="revolutionary-achievements-grid" data-aos="fade-up" data-aos-delay="200">
                <?php
                $achievementCount = 0;
                while ($achievements->have_posts()) : $achievements->the_post();
                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');
                    $caption = get_the_post_thumbnail_caption();
                    $title = get_the_title();
                    $excerpt = get_the_excerpt();
                    $content = get_the_content();
                    $delay = ($achievementCount % 3) * 100 + 300;
                ?>
                    <div class="ultra-achievement-card" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                        <div class="achievement-card-inner">
                            <?php if ($featured_img_url): ?>
                                <div class="achievement-image-container">
                                    <div class="image-backdrop" aria-hidden="true"></div>
                                    <img src="<?php echo esc_url($featured_img_url); ?>"
                                        class="achievement-image"
                                        alt="<?php echo esc_attr($caption ? $caption : $title); ?>"
                                        loading="lazy">
                                    <div class="achievement-floating-badge">
                                        <div class="badge-glow-effect" aria-hidden="true"></div>
                                        <i class="fas fa-medal" aria-hidden="true"></i>
                                    </div>
                                    <div class="achievement-overlay">
                                        <div class="overlay-content">
                                            <div class="overlay-icon">
                                                <i class="fas fa-award" aria-hidden="true"></i>
                                            </div>
                                            <span class="overlay-text">View Achievement</span>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="achievement-content">
                                <div class="achievement-type-badge">
                                    <span>Recognition</span>
                                </div>

                                <?php if ($title): ?>
                                    <h4 class="achievement-title"><?php echo esc_html($title); ?></h4>
                                <?php endif; ?>

                                <?php if ($excerpt): ?>
                                    <div class="achievement-highlight">
                                        <div class="highlight-accent" aria-hidden="true"></div>
                                        <p class="highlight-text"><?php echo esc_html($excerpt); ?></p>
                                    </div>
                                <?php endif; ?>

                                <?php if ($caption): ?>
                                    <p class="achievement-description"><?php echo esc_html($caption); ?></p>
                                <?php endif; ?>

                                <div class="achievement-footer">
                                    <div class="achievement-meta">
                                        <div class="meta-item">
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <span>Excellence</span>
                                        </div>
                                        <div class="achievement-date">
                                            <i class="fas fa-calendar" aria-hidden="true"></i>
                                            <span><?php echo get_the_date('Y'); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    $achievementCount++;
                endwhile;
                ?>
            </div>

            <!-- Spotlight Achievements -->
            <div class="spotlight-achievements" data-aos="fade-up" data-aos-delay="400">
                <div class="spotlight-header">
                    <h3 class="spotlight-title">Spotlight Achievements</h3>
                    <div class="spotlight-line" aria-hidden="true"></div>
                </div>

                <div class="spotlight-grid">
                    <div class="spotlight-card film-award">
                        <div class="spotlight-backdrop" aria-hidden="true"></div>
                        <div class="spotlight-content">
                            <div class="spotlight-icon">
                                <div class="icon-glow" aria-hidden="true"></div>
                                <i class="fas fa-film" aria-hidden="true"></i>
                            </div>
                            <div class="spotlight-text">
                                <h5>62nd National Film Award</h5>
                                <p class="spotlight-description">Mr Rajib Kalita, owner of Aucto Creation won the '62nd National Film Award' for the 'Best Film' in other language category in 2015 for a "Rabha" language feature film "ORONG".</p>
                                <div class="spotlight-year">2015</div>
                            </div>
                        </div>
                        <div class="spotlight-decoration" aria-hidden="true">
                            <div class="decoration-element"></div>
                            <div class="decoration-element"></div>
                            <div class="decoration-element"></div>
                        </div>
                    </div>

                    <div class="spotlight-card music-award">
                        <div class="spotlight-backdrop" aria-hidden="true"></div>
                        <div class="spotlight-content">
                            <div class="spotlight-icon">
                                <div class="icon-glow" aria-hidden="true"></div>
                                <i class="fas fa-music" aria-hidden="true"></i>
                            </div>
                            <div class="spotlight-text">
                                <h5>33rd National Games Theme Song</h5>
                                <p class="spotlight-description">Mr Rajib Kalita had the proud privilege to compose 'THEME SONG' OF '33RD National Games' hosted by Guwahati, Assam in the year 2007.</p>
                                <div class="spotlight-year">2007</div>
                            </div>
                        </div>
                        <div class="spotlight-decoration" aria-hidden="true">
                            <div class="decoration-element"></div>
                            <div class="decoration-element"></div>
                            <div class="decoration-element"></div>
                        </div>
                    </div>
                </div>
            </div>

        <?php
        else:
        ?>
            <!-- Modern Fallback Content -->
            <div class="modern-section-header" data-aos="fade-up">
                <div class="header-badge">
                    <span class="badge-glow"></span>
                    <i class="fas fa-trophy" aria-hidden="true"></i>
                    <span>Achievements</span>
                </div>
                <h2 class="ultra-modern-title">
                    <span class="title-line">Excellence</span>
                    <span class="title-line gradient-text">Recognized</span>
                </h2>
                <p class="modern-subtitle">Recognition and industry awards showcasing our commitment to outstanding event experiences</p>
            </div>

            <div class="modern-fallback-grid" data-aos="fade-up" data-aos-delay="200">
                <div class="fallback-card">
                    <div class="card-glow" aria-hidden="true"></div>
                    <div class="fallback-icon">
                        <i class="fas fa-trophy" aria-hidden="true"></i>
                    </div>
                    <h4>Industry Awards</h4>
                    <p>Recognition for excellence in event management and production services.</p>
                </div>
                <div class="fallback-card">
                    <div class="card-glow" aria-hidden="true"></div>
                    <div class="fallback-icon">
                        <i class="fas fa-star" aria-hidden="true"></i>
                    </div>
                    <h4>Client Satisfaction</h4>
                    <p>Consistently high ratings and positive feedback from our clients.</p>
                </div>
                <div class="fallback-card">
                    <div class="card-glow" aria-hidden="true"></div>
                    <div class="fallback-icon">
                        <i class="fas fa-certificate" aria-hidden="true"></i>
                    </div>
                    <h4>Professional Certifications</h4>
                    <p>Certified professionals with expertise in event management.</p>
                </div>
            </div>
        <?php
        endif;
        wp_reset_postdata();
        ?>
    </div>
</section>