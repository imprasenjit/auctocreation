<!-- Modern Festivals Section -->
<section class="modern-section section-festivals" id="festivals">
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
            <!-- Section Header -->
            <div class="section-header" data-aos="fade-up">
                <h2 class="section-title">Festivals</h2>
                <p class="section-subtitle">Celebrating culture and community through memorable festivals</p>
            </div>

            <!-- Festivals Grid -->
            <div class="festivals-grid" data-aos="fade-up" data-aos-delay="200">
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
                    <div class="festival-card hover-lift" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                        <div class="card modern-card h-100">
                            <?php if ($featured_img_url): ?>
                                <div class="card-image">
                                    <img src="<?php echo esc_url($featured_img_url); ?>"
                                        class="card-img-top"
                                        alt="<?php echo esc_attr($caption ? $caption : $title); ?>"
                                        loading="lazy">
                                    <div class="festival-badge">
                                        <i class="fas fa-calendar-alt" aria-hidden="true"></i>
                                    </div>
                                    <div class="card-overlay">
                                        <div class="card-overlay-content">
                                            <i class="fas fa-music" aria-hidden="true"></i>
                                            <span>View Festival</span>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="card-body d-flex flex-column">
                                <?php if ($title): ?>
                                    <h4 class="card-title"><?php echo esc_html($title); ?></h4>
                                <?php endif; ?>
                                <?php if ($caption): ?>
                                    <p class="card-text flex-grow-1"><?php echo esc_html($caption); ?></p>
                                <?php elseif ($excerpt): ?>
                                    <p class="card-text flex-grow-1"><?php echo esc_html($excerpt); ?></p>
                                <?php endif; ?>
                                <div class="card-footer-custom mt-auto">
                                    <small class="text-muted">
                                        <i class="fas fa-users me-1" aria-hidden="true"></i>
                                        Community Event
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    $festivalCount++;
                endwhile;
                ?>
            </div>

            <!-- View More Button -->
            <?php if ($festivalSlides->found_posts > 6): ?>
                <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="400">
                    <a href="#gallery" class="btn btn-modern btn-lg">
                        <i class="fas fa-calendar-check me-2" aria-hidden="true"></i>
                        View All Festivals
                    </a>
                </div>
            <?php endif; ?>

        <?php
        else:
        ?>
            <!-- Fallback Content -->
            <div class="section-header" data-aos="fade-up">
                <h2 class="section-title">Festivals</h2>
                <p class="section-subtitle">We organize and manage festivals that bring communities together</p>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="200">
                <div class="col-md-4 mb-4">
                    <div class="card modern-card text-center h-100">
                        <div class="card-body">
                            <div class="feature-icon mb-3">
                                <i class="fas fa-music fa-3x text-primary" aria-hidden="true"></i>
                            </div>
                            <h4>Music Festivals</h4>
                            <p class="card-text">Professional organization of music festivals with world-class sound and staging.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card modern-card text-center h-100">
                        <div class="card-body">
                            <div class="feature-icon mb-3">
                                <i class="fas fa-theater-masks fa-3x text-primary" aria-hidden="true"></i>
                            </div>
                            <h4>Cultural Events</h4>
                            <p class="card-text">Celebrating local culture and traditions through well-organized cultural festivals.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card modern-card text-center h-100">
                        <div class="card-body">
                            <div class="feature-icon mb-3">
                                <i class="fas fa-utensils fa-3x text-primary" aria-hidden="true"></i>
                            </div>
                            <h4>Food Festivals</h4>
                            <p class="card-text">Gastronomic experiences that showcase local and international cuisines.</p>
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