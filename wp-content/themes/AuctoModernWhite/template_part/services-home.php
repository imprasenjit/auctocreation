<?php

/**
 * Template part for displaying services section - Text Cloud Design
 *
 * @package AuctoModernWhite
 */

// Services text data - unique words only
$services_data = array(
    array(
        'text' => 'CONCERT PLANNING.',
        'type' => 'primary',
        'delay' => 100
    ),
    array(
        'text' => 'crowd management.',
        'type' => 'secondary',
        'delay' => 150
    ),
    array(
        'text' => 'EVENT PERMISSION.',
        'type' => 'primary',
        'delay' => 200
    ),
    array(
        'text' => 'designing.',
        'type' => 'secondary',
        'delay' => 250
    ),
    array(
        'text' => 'MUSIC FESTIVAL.',
        'type' => 'primary',
        'delay' => 300
    ),
    array(
        'text' => 'branding.',
        'type' => 'secondary',
        'delay' => 350
    ),
    array(
        'text' => 'GROUND PRODUCTION.',
        'type' => 'primary',
        'delay' => 400
    ),
    array(
        'text' => 'experience IP\'s.',
        'type' => 'secondary',
        'delay' => 450
    ),
    array(
        'text' => 'scaffolding.',
        'type' => 'secondary',
        'delay' => 500
    ),
    array(
        'text' => 'EXHIBITIONS.',
        'type' => 'primary',
        'delay' => 550
    ),
    array(
        'text' => 'product launches.',
        'type' => 'secondary',
        'delay' => 600
    ),
    array(
        'text' => 'STAGING.',
        'type' => 'primary',
        'delay' => 650
    ),
    array(
        'text' => 'corporate meetings.',
        'type' => 'secondary',
        'delay' => 700
    ),
    array(
        'text' => 'MICE EVENTS',
        'type' => 'primary',
        'delay' => 750
    ),
    array(
        'text' => 'VENUE RECCE',
        'type' => 'primary',
        'delay' => 800
    ),
    array(
        'text' => 'planning.',
        'type' => 'secondary',
        'delay' => 850
    ),
    array(
        'text' => 'LAYOUTING.',
        'type' => 'primary',
        'delay' => 900
    ),
    array(
        'text' => 'crisis handling.',
        'type' => 'secondary',
        'delay' => 950
    ),
    array(
        'text' => 'LOGISTICS.',
        'type' => 'primary',
        'delay' => 1000
    ),
    array(
        'text' => 'coordination.',
        'type' => 'secondary',
        'delay' => 1050
    )
);
?>

<!-- Services Section - Text Cloud Design -->
<section class="services-text-cloud" id="services" aria-label="Our professional services">
    <div class="container">
        <!-- Section Header -->
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <div class="section-badge mb-3">
                <span class="badge-simple">Our Services</span>
            </div>
            <h2 class="section-title mb-4">
                Comprehensive Event Solutions
            </h2>
            <p class="section-subtitle">
                From concept to execution, we deliver exceptional event experiences across all industries and scales.
            </p>
        </div>

        <!-- Services Text Cloud -->
        <div class="services-cloud-container" data-aos="fade-up" data-aos-delay="200">
            <div class="services-text-grid">
                <?php foreach ($services_data as $index => $service) : ?>
                    <div class="service-text-item <?php echo esc_attr($service['type']); ?>"
                        data-aos="fade-in"
                        data-aos-delay="<?php echo esc_attr($service['delay']); ?>"
                        data-aos-duration="800">
                        <span class="service-text"><?php echo esc_html($service['text']); ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Services CTA -->
        <div class="services-cta text-center mt-5" data-aos="fade-up" data-aos-delay="400">
            <h3 class="cta-title mb-3">Ready to Bring Your Vision to Life?</h3>
            <p class="cta-description mb-4">Connect with our expert team to discuss your event requirements and get a personalized solution.</p>
            <div class="cta-buttons">
                <a href="#contact" class="btn btn-accent btn-lg me-3">Get Started</a>
                <a href="#portfolio" class="btn btn-outline-primary btn-lg">View Our Work</a>
            </div>
        </div>
    </div>

    <!-- Background Elements -->
    <div class="services-bg-elements" aria-hidden="true">
        <div class="bg-element bg-element-1"></div>
        <div class="bg-element bg-element-2"></div>
        <div class="bg-element bg-element-3"></div>
    </div>
</section>