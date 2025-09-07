<!-- Modern Achievements Section -->
<section id="achievements" class="modern-section">
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
            <!-- Section Header -->
            <div class="section-header" data-aos="fade-up">
                <h2 class="section-title">Achievements</h2>
                <p class="section-subtitle">Recognition and awards that showcase our excellence in event management</p>
            </div>

            <!-- Achievements Grid -->
            <div class="achievements-grid" data-aos="fade-up" data-aos-delay="200">
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
                    <div class="achievement-card hover-lift" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                        <div class="card modern-card h-100">
                            <?php if ($featured_img_url): ?>
                                <div class="card-image">
                                    <img src="<?php echo esc_url($featured_img_url); ?>"
                                        class="card-img-top"
                                        alt="<?php echo esc_attr($caption ? $caption : $title); ?>"
                                        loading="lazy">
                                    <div class="achievement-badge">
                                        <i class="fas fa-trophy" aria-hidden="true"></i>
                                    </div>
                                    <div class="card-overlay">
                                        <div class="card-overlay-content">
                                            <i class="fas fa-award" aria-hidden="true"></i>
                                            <span>View Achievement</span>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="card-body d-flex flex-column">
                                <?php if ($title): ?>
                                    <h4 class="card-title"><?php echo esc_html($title); ?></h4>
                                <?php endif; ?>

                                <?php if ($excerpt): ?>
                                    <div class="achievement-excerpt">
                                        <p class="card-text font-weight-bold text-primary"><?php echo esc_html($excerpt); ?></p>
                                    </div>
                                <?php endif; ?>

                                <?php if ($caption): ?>
                                    <p class="card-text flex-grow-1"><?php echo esc_html($caption); ?></p>
                                <?php endif; ?>

                                <div class="achievement-meta mt-auto">
                                    <div class="achievement-type">
                                        <i class="fas fa-medal text-warning me-2" aria-hidden="true"></i>
                                        <span class="text-muted">Recognition</span>
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

            <!-- Notable Achievements -->
            <div class="notable-achievements mt-5" data-aos="fade-up" data-aos-delay="400">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="achievement-highlight">
                            <div class="highlight-icon">
                                <i class="fas fa-film fa-2x text-primary" aria-hidden="true"></i>
                            </div>
                            <div class="highlight-content">
                                <h5>62nd National Film Award</h5>
                                <p>Mr Rajib Kalita, owner of Aucto Creation has won the '62nd National Film Award' for the 'Best Film' in other language category in 2015 for a "Rabha" language feature film "ORONG".</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="achievement-highlight">
                            <div class="highlight-icon">
                                <i class="fas fa-music fa-2x text-primary" aria-hidden="true"></i>
                            </div>
                            <div class="highlight-content">
                                <h5>33rd National Games Theme Song</h5>
                                <p>Mr Rajib Kalita of Aucto Creation had the proud privilege to compose 'THEME SONG' OF '33RD National Games' hosted by Guwahati, Assam in the year 2007.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php
        else:
        ?>
            <!-- Fallback Content -->
            <div class="section-header" data-aos="fade-up">
                <h2 class="section-title">Achievements</h2>
                <p class="section-subtitle">Excellence recognized through awards and industry recognition</p>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="200">
                <div class="col-md-4 mb-4">
                    <div class="card modern-card text-center h-100">
                        <div class="card-body">
                            <div class="feature-icon mb-3">
                                <i class="fas fa-trophy fa-3x text-primary" aria-hidden="true"></i>
                            </div>
                            <h4>Industry Awards</h4>
                            <p class="card-text">Recognition for excellence in event management and production services.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card modern-card text-center h-100">
                        <div class="card-body">
                            <div class="feature-icon mb-3">
                                <i class="fas fa-star fa-3x text-primary" aria-hidden="true"></i>
                            </div>
                            <h4>Client Satisfaction</h4>
                            <p class="card-text">Consistently high ratings and positive feedback from our clients.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card modern-card text-center h-100">
                        <div class="card-body">
                            <div class="feature-icon mb-3">
                                <i class="fas fa-certificate fa-3x text-primary" aria-hidden="true"></i>
                            </div>
                            <h4>Professional Certifications</h4>
                            <p class="card-text">Certified professionals with expertise in event management.</p>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        endif;
        wp_reset_postdata();
        ?>
    </div>
</section>