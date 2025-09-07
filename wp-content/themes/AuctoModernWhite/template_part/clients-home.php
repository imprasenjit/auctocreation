<?php
// Get client logos from custom post type or use fallback logos
$args = array(
    'post_type' => 'client_logos',
    'orderby' => 'menu_order',
    'posts_per_page' => -1,
    'post_status' => 'publish'
);
$clients = new WP_Query($args);

// Fallback logos if no custom post type data
$fallback_logos = array(
    array('name' => 'Amazon', 'logo' => get_template_directory_uri() . '/images/clients/ama.png'),
    array('name' => 'Blade Live', 'logo' => get_template_directory_uri() . '/images/clients/blade.png'),
    array('name' => 'BookMyShow', 'logo' => get_template_directory_uri() . '/images/clients/bms.png'),
    array('name' => 'IIT Guwahati', 'logo' => get_template_directory_uri() . '/images/clients/iitg.png'),
    array('name' => 'Ministry of AYUSH', 'logo' => get_template_directory_uri() . '/images/clients/moA.png'),
    array('name' => 'Only Much Louder', 'logo' => get_template_directory_uri() . '/images/clients/oml.png'),
    array('name' => 'Scoop', 'logo' => get_template_directory_uri() . '/images/clients/scoop.png'),
    array('name' => 'Wizcraft', 'logo' => get_template_directory_uri() . '/images/clients/wizcrft.png'),
);
?>

<!-- Clients Section -->
<section class="clients-section" id="clients" aria-label="Our trusted clients and partners">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <h2 class="section-title h3 mb-3">Trusted by Leading Brands</h2>
            <p class="section-subtitle">We've had the privilege of working with some of the top brands</p>
        </div>
    </div>

    <!-- Full-width client logos slider -->
    <div class="clients-slider-wrapper container" data-aos="fade-up" data-aos-delay="200">
        <div class="clients-slider" id="clientsSlider">
            <div class="clients-track" id="clientsTrack">
                <?php if ($clients->have_posts()) : ?>
                    <?php while ($clients->have_posts()) : $clients->the_post();
                        $logo_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                        $client_name = get_the_title();
                        $client_url = get_post_meta(get_the_ID(), 'client_url', true); // Custom field for client website
                        if ($logo_url) : ?>
                            <div class="client-logo-item">
                                <?php if ($client_url) : ?>
                                    <a href="<?php echo esc_url($client_url); ?>" target="_blank" rel="noopener" aria-label="Visit <?php echo esc_attr($client_name); ?> website">
                                    <?php endif; ?>
                                    <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr($client_name); ?> logo" class="client-logo" loading="lazy">
                                    <?php if ($client_url) : ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php else : ?>
                    <!-- Fallback logos -->
                    <?php foreach ($fallback_logos as $client) : ?>
                        <div class="client-logo-item">
                            <img src="<?php echo esc_url($client['logo']); ?>" alt="<?php echo esc_attr($client['name']); ?> logo" class="client-logo" loading="lazy">
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

                <!-- Duplicate logos for seamless loop -->
                <?php if ($clients->have_posts()) : ?>
                    <?php $clients->rewind_posts(); ?>
                    <?php while ($clients->have_posts()) : $clients->the_post();
                        $logo_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                        $client_name = get_the_title();
                        $client_url = get_post_meta(get_the_ID(), 'client_url', true);
                        if ($logo_url) : ?>
                            <div class="client-logo-item">
                                <?php if ($client_url) : ?>
                                    <a href="<?php echo esc_url($client_url); ?>" target="_blank" rel="noopener" aria-label="Visit <?php echo esc_attr($client_name); ?> website">
                                    <?php endif; ?>
                                    <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr($client_name); ?> logo" class="client-logo" loading="lazy">
                                    <?php if ($client_url) : ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php else : ?>
                    <!-- Duplicate fallback logos for seamless loop -->
                    <?php foreach ($fallback_logos as $client) : ?>
                        <div class="client-logo-item">
                            <img src="<?php echo esc_url($client['logo']); ?>" alt="<?php echo esc_attr($client['name']); ?> logo" class="client-logo" loading="lazy">
                        </div>
                    <?php endforeach; ?>
                    <!-- Additional duplicate for smoother infinite scroll -->
                    <?php foreach ($fallback_logos as $client) : ?>
                        <div class="client-logo-item">
                            <img src="<?php echo esc_url($client['logo']); ?>" alt="<?php echo esc_attr($client['name']); ?> logo" class="client-logo" loading="lazy">
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <!-- Gradient overlays for smooth edges -->

    </div>

    <!-- <div class="container">
        <div class="clients-cta text-center mt-5" data-aos="fade-up" data-aos-delay="400">
            <p class="mb-3">Ready to join our list of satisfied clients?</p>
            <a href="#contact" class="btn btn-accent btn-lg">Start Your Project</a>
        </div>
    </div> -->
</section>

<?php wp_reset_postdata(); ?>