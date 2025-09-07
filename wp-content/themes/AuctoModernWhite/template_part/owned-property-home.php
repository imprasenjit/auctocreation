<!-- Modern Owned Property Section -->
<section class="modern-section section-owned-property" id="ownedProperty">
    <div class="container">
        <?php
        $argsOwnedProperty = array(
            'post_type' => 'owned_property',
            'orderby' => 'menu_order',
            'posts_per_page' => -1
        );
        $ownedProperties = new WP_Query($argsOwnedProperty);

        if ($ownedProperties->have_posts()) :
        ?>
            <!-- Section Header -->
            <div class="section-header" data-aos="fade-up">
                <h2 class="section-title">Owned Properties</h2>
                <p class="section-subtitle">Our state-of-the-art facilities and venues for exceptional events</p>
            </div>

            <!-- Properties Grid -->
            <div class="properties-grid" data-aos="fade-up" data-aos-delay="200">
                <?php
                $propertyCount = 0;
                while ($ownedProperties->have_posts()) : $ownedProperties->the_post();
                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
                    $caption = get_the_post_thumbnail_caption();
                    $title = get_the_title();
                    $content = get_the_content();
                    $excerpt = get_the_excerpt();
                    $delay = ($propertyCount % 3) * 100 + 300;
                ?>
                    <div class="property-card hover-lift" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                        <div class="card modern-card h-100">
                            <?php if ($featured_img_url): ?>
                                <div class="card-image">
                                    <img src="<?php echo esc_url($featured_img_url); ?>"
                                        class="card-img-top"
                                        alt="<?php echo esc_attr($caption ? $caption : $title); ?>"
                                        loading="lazy">
                                    <div class="property-badge">
                                        <i class="fas fa-building" aria-hidden="true"></i>
                                    </div>
                                    <div class="card-overlay">
                                        <div class="card-overlay-content">
                                            <i class="fas fa-home" aria-hidden="true"></i>
                                            <span>View Property</span>
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

                                <div class="property-features mt-auto">
                                    <div class="feature-item">
                                        <i class="fas fa-users text-primary me-2" aria-hidden="true"></i>
                                        <span>Event Venue</span>
                                    </div>
                                    <div class="feature-item">
                                        <i class="fas fa-wifi text-primary me-2" aria-hidden="true"></i>
                                        <span>Modern Facilities</span>
                                    </div>
                                </div>

                                <div class="card-footer-custom mt-3">
                                    <a href="#contact" class="btn btn-outline btn-sm">
                                        <i class="fas fa-phone me-1" aria-hidden="true"></i>
                                        Book Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    $propertyCount++;
                endwhile;
                ?>
            </div>

            <!-- Contact CTA -->
            <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="400">
                <div class="property-cta">
                    <h4>Interested in our venues?</h4>
                    <p class="mb-4">Contact us for availability and booking information</p>
                    <a href="#contact" class="btn btn-modern btn-lg">
                        <i class="fas fa-calendar-alt me-2" aria-hidden="true"></i>
                        Check Availability
                    </a>
                </div>
            </div>

        <?php
        else:
        ?>
            <!-- Fallback Content -->
            <div class="section-header" data-aos="fade-up">
                <h2 class="section-title">Owned Properties</h2>
                <p class="section-subtitle">Premium venues and facilities for your special events</p>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="200">
                <div class="col-md-4 mb-4">
                    <div class="card modern-card text-center h-100">
                        <div class="card-body">
                            <div class="feature-icon mb-3">
                                <i class="fas fa-building fa-3x text-primary" aria-hidden="true"></i>
                            </div>
                            <h4>Event Halls</h4>
                            <p class="card-text">Spacious and well-equipped halls perfect for conferences and celebrations.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card modern-card text-center h-100">
                        <div class="card-body">
                            <div class="feature-icon mb-3">
                                <i class="fas fa-home fa-3x text-primary" aria-hidden="true"></i>
                            </div>
                            <h4>Banquet Facilities</h4>
                            <p class="card-text">Elegant banquet facilities with modern amenities for weddings and parties.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card modern-card text-center h-100">
                        <div class="card-body">
                            <div class="feature-icon mb-3">
                                <i class="fas fa-microphone fa-3x text-primary" aria-hidden="true"></i>
                            </div>
                            <h4>Studio Spaces</h4>
                            <p class="card-text">Professional studio spaces equipped for recording and production work.</p>
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