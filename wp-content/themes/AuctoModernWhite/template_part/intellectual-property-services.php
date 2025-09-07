<?php

/**
 * Intellectual Property Services Section Template Part
 * 
 * @package AuctoModernWhite
 */
?>

<!-- Ultra Modern IP Services Section -->
<section class="ultra-modern-ip-services" id="ip-services">
    <!-- Animated Background -->
    <div class="ip-bg-particles" aria-hidden="true">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <!-- Gradient Overlay -->
    <div class="ip-gradient-overlay" aria-hidden="true"></div>

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
            <!-- Ultra Modern Section Header -->
            <div class="modern-section-header" data-aos="fade-up">
                <div class="header-badge">
                    <span class="badge-glow"></span>
                    <i class="fas fa-shield-alt" aria-hidden="true"></i>
                    <span>Intellectual Property</span>
                </div>
                <h2 class="ultra-modern-title">
                    <span class="title-line">Protecting</span>
                    <span class="title-line gradient-text">Creative Assets</span>
                </h2>
                <p class="modern-subtitle">Comprehensive intellectual property management and protection services for your creative works</p>
                <div class="title-decoration" aria-hidden="true">
                    <div class="decoration-line"></div>
                    <div class="decoration-dot"></div>
                    <div class="decoration-line"></div>
                </div>
            </div>

            <!-- Revolutionary IP Grid -->
            <div class="revolutionary-ip-grid" data-aos="fade-up" data-aos-delay="200">
                <?php
                $ipCount = 0;
                while ($ownedProperties->have_posts()) : $ownedProperties->the_post();
                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');
                    $caption = get_the_post_thumbnail_caption();
                    $title = get_the_title();
                    $content = get_the_content();
                    $excerpt = get_the_excerpt();
                    $delay = ($ipCount % 3) * 100 + 300;
                ?>
                    <div class="ultra-ip-card" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                        <div class="ip-card-inner">
                            <?php if ($featured_img_url): ?>
                                <div class="ip-image-container">
                                    <div class="image-backdrop" aria-hidden="true"></div>
                                    <img src="<?php echo esc_url($featured_img_url); ?>"
                                        class="ip-image"
                                        alt="<?php echo esc_attr($caption ? $caption : $title); ?>"
                                        loading="lazy">
                                    <div class="ip-floating-badge">
                                        <div class="badge-glow-effect" aria-hidden="true"></div>
                                        <i class="fas fa-copyright" aria-hidden="true"></i>
                                    </div>
                                    <div class="ip-overlay">
                                        <div class="overlay-content">
                                            <div class="overlay-icon">
                                                <i class="fas fa-shield-alt" aria-hidden="true"></i>
                                            </div>
                                            <span class="overlay-text">Protected Asset</span>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="ip-content">
                                <div class="ip-type-badge">
                                    <span>Owned Property</span>
                                </div>

                                <?php if ($title): ?>
                                    <h4 class="ip-title"><?php echo esc_html($title); ?></h4>
                                <?php endif; ?>

                                <?php if ($caption): ?>
                                    <div class="ip-highlight">
                                        <div class="highlight-accent" aria-hidden="true"></div>
                                        <p class="highlight-text"><?php echo esc_html($caption); ?></p>
                                    </div>
                                <?php elseif ($excerpt): ?>
                                    <div class="ip-highlight">
                                        <div class="highlight-accent" aria-hidden="true"></div>
                                        <p class="highlight-text"><?php echo esc_html($excerpt); ?></p>
                                    </div>
                                <?php endif; ?>

                                <div class="ip-footer">
                                    <div class="ip-meta">
                                        <div class="meta-item">
                                            <i class="fas fa-shield-check" aria-hidden="true"></i>
                                            <span>Protected</span>
                                        </div>
                                        <div class="ip-status">
                                            <i class="fas fa-check-circle" aria-hidden="true"></i>
                                            <span>Active</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    $ipCount++;
                endwhile;
                ?>
            </div>

            <!-- IP Services Showcase -->
            <div class="ip-services-showcase" data-aos="fade-up" data-aos-delay="400">
                <div class="services-header">
                    <h3 class="services-title">Our IP Services</h3>
                    <div class="services-line" aria-hidden="true"></div>
                </div>

                <div class="services-grid">
                    <div class="service-card copyright">
                        <div class="service-backdrop" aria-hidden="true"></div>
                        <div class="service-content">
                            <div class="service-icon">
                                <div class="icon-glow" aria-hidden="true"></div>
                                <i class="fas fa-copyright" aria-hidden="true"></i>
                            </div>
                            <div class="service-text">
                                <h5>Copyright Protection</h5>
                                <p class="service-description">Comprehensive copyright registration and protection services for creative works, ensuring your intellectual property rights are secured.</p>
                            </div>
                        </div>
                        <div class="service-decoration" aria-hidden="true">
                            <div class="decoration-element"></div>
                            <div class="decoration-element"></div>
                            <div class="decoration-element"></div>
                        </div>
                    </div>

                    <div class="service-card trademark">
                        <div class="service-backdrop" aria-hidden="true"></div>
                        <div class="service-content">
                            <div class="service-icon">
                                <div class="icon-glow" aria-hidden="true"></div>
                                <i class="fas fa-trademark" aria-hidden="true"></i>
                            </div>
                            <div class="service-text">
                                <h5>Trademark Services</h5>
                                <p class="service-description">Professional trademark registration, monitoring, and enforcement to protect your brand identity and commercial interests.</p>
                            </div>
                        </div>
                        <div class="service-decoration" aria-hidden="true">
                            <div class="decoration-element"></div>
                            <div class="decoration-element"></div>
                            <div class="decoration-element"></div>
                        </div>
                    </div>

                    <div class="service-card licensing">
                        <div class="service-backdrop" aria-hidden="true"></div>
                        <div class="service-content">
                            <div class="service-icon">
                                <div class="icon-glow" aria-hidden="true"></div>
                                <i class="fas fa-handshake" aria-hidden="true"></i>
                            </div>
                            <div class="service-text">
                                <h5>Licensing & Monetization</h5>
                                <p class="service-description">Strategic licensing solutions to maximize the commercial value of your intellectual property assets and generate revenue streams.</p>
                            </div>
                        </div>
                        <div class="service-decoration" aria-hidden="true">
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
                    <i class="fas fa-shield-alt" aria-hidden="true"></i>
                    <span>Intellectual Property</span>
                </div>
                <h2 class="ultra-modern-title">
                    <span class="title-line">Protecting</span>
                    <span class="title-line gradient-text">Creative Assets</span>
                </h2>
                <p class="modern-subtitle">Professional intellectual property management and protection services</p>
            </div>

            <div class="modern-fallback-grid" data-aos="fade-up" data-aos-delay="200">
                <div class="fallback-card">
                    <div class="card-glow" aria-hidden="true"></div>
                    <div class="fallback-icon">
                        <i class="fas fa-copyright" aria-hidden="true"></i>
                    </div>
                    <h4>Copyright Protection</h4>
                    <p>Comprehensive copyright registration and protection for your creative works and intellectual assets.</p>
                </div>
                <div class="fallback-card">
                    <div class="card-glow" aria-hidden="true"></div>
                    <div class="fallback-icon">
                        <i class="fas fa-trademark" aria-hidden="true"></i>
                    </div>
                    <h4>Trademark Services</h4>
                    <p>Professional trademark registration, monitoring, and enforcement for brand protection.</p>
                </div>
                <div class="fallback-card">
                    <div class="card-glow" aria-hidden="true"></div>
                    <div class="fallback-icon">
                        <i class="fas fa-handshake" aria-hidden="true"></i>
                    </div>
                    <h4>Licensing Solutions</h4>
                    <p>Strategic licensing and monetization of intellectual property assets for maximum value.</p>
                </div>
            </div>
        <?php
        endif;
        wp_reset_postdata();
        ?>
    </div>
</section>