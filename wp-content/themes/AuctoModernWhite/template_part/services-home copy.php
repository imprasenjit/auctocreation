<?php

/**
 * Template part for displaying services section
 *
 * @package AuctoModernWhite
 */

// Get services from custom post type or use fallback services
$args = array(
    'post_type' => 'services',
    'orderby' => 'menu_order',
    'posts_per_page' => -1,
    'post_status' => 'publish'
);
$services = new WP_Query($args);

// Fallback services if no custom post type data
$fallback_services = array(
    array(
        'title' => 'Event Production',
        'description' => 'Complete end-to-end event production services from concept to execution.',
        'icon' => 'fas fa-video',
        'link' => '#contact'
    ),
    array(
        'title' => 'Live Concerts',
        'description' => 'Professional concert production with state-of-the-art sound and lighting.',
        'icon' => 'fas fa-music',
        'link' => '#contact'
    ),
    array(
        'title' => 'Corporate Events',
        'description' => 'Seamless corporate event management for conferences and brand activations.',
        'icon' => 'fas fa-building',
        'link' => '#contact'
    ),
    array(
        'title' => 'Festival Management',
        'description' => 'Large-scale festival planning and execution with expert logistics.',
        'icon' => 'fas fa-calendar-alt',
        'link' => '#contact'
    ),
    array(
        'title' => 'Technical Services',
        'description' => 'Professional audio, video, and lighting equipment with expert technicians.',
        'icon' => 'fas fa-cogs',
        'link' => '#contact'
    ),
    array(
        'title' => 'Venue Management',
        'description' => 'Complete venue setup and management for events of all sizes.',
        'icon' => 'fas fa-map-marker-alt',
        'link' => '#contact'
    )
);
?>

<!-- Services Section -->
<section class="services-section" id="services" aria-label="Our professional services">
    <div class="container">
        <!-- Section Header -->
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <div class="section-badge mb-3">
                <span class="badge-simple">Our Services</span>
            </div>
            <h2 class="section-title mb-4">
                Professional Event Production Services
            </h2>
            <p class="section-subtitle">
                From intimate gatherings to large-scale productions, we deliver exceptional experiences that exceed expectations.
            </p>
        </div>

        <!-- Services Grid -->
        <div class="services-grid" data-aos="fade-up" data-aos-delay="200">
            <?php if ($services->have_posts()) : ?>
                <?php while ($services->have_posts()) : $services->the_post();
                    $service_icon = get_post_meta(get_the_ID(), 'service_icon', true) ?: 'fas fa-star';
                    $service_link = get_post_meta(get_the_ID(), 'service_link', true) ?: '#contact';
                    $service_excerpt = get_the_excerpt() ?: wp_trim_words(get_the_content(), 20);
                ?>
                    <div class="service-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-icon-wrapper">
                            <div class="service-icon">
                                <i class="<?php echo esc_attr($service_icon); ?>" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="service-content">
                            <h3 class="service-title"><?php the_title(); ?></h3>
                            <p class="service-description"><?php echo esc_html($service_excerpt); ?></p>
                            <a href="<?php echo esc_url($service_link); ?>" class="service-link">
                                Learn More <i class="fas fa-arrow-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <!-- Fallback Services -->
                <?php foreach ($fallback_services as $index => $service) : ?>
                    <div class="service-card" data-aos="fade-up" data-aos-delay="<?php echo 100 + ($index * 50); ?>">
                        <div class="service-icon-wrapper">
                            <div class="service-icon">
                                <i class="<?php echo esc_attr($service['icon']); ?>" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="service-content">
                            <h3 class="service-title"><?php echo esc_html($service['title']); ?></h3>
                            <p class="service-description"><?php echo esc_html($service['description']); ?></p>
                            <a href="<?php echo esc_url($service['link']); ?>" class="service-link">
                                Learn More <i class="fas fa-arrow-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <!-- Services CTA -->
        <div class="services-cta text-center mt-5" data-aos="fade-up" data-aos-delay="400">
            <h3 class="cta-title mb-3">Ready to Create Something Amazing?</h3>
            <p class="cta-description mb-4">Let's discuss your event vision and make it a reality with our expert team.</p>
            <div class="cta-buttons">
                <a href="#contact" class="btn btn-accent btn-lg me-3">Get Quote</a>
                <a href="#portfolio" class="btn btn-outline-dark btn-lg">View Portfolio</a>
            </div>
        </div>
    </div>

    <!-- Background Decoration -->
    <div class="services-decoration" aria-hidden="true">
        <div class="decoration-element decoration-1"></div>
        <div class="decoration-element decoration-2"></div>
    </div>
</section>

<?php wp_reset_postdata(); ?>