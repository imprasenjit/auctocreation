<?php

/**
 * Template part for displaying services section
 * Uses Pods data fetching with WordPress fallback
 */

// Get services data using Pods or fallback to standard WP
if (auctoclean_is_pods_active()) {
    $services = pods('services', array(
        'limit' => 6,
        'orderby' => 'menu_order ASC, post_date ASC'
    ));
} else {
    $services_query = new WP_Query(array(
        'post_type' => 'services',
        'posts_per_page' => 6,
        'post_status' => 'publish',
        'orderby' => 'menu_order date',
        'order' => 'ASC'
    ));
}
?>

<section id="services" class="section services-section">
    <div class="container">
        <div class="section-title text-center mb-5" data-aos="fade-up">
            <h2><?php echo get_theme_mod('services_title', __('Our Services', 'auctoclean')); ?></h2>
            <p class="section-subtitle"><?php echo get_theme_mod('services_subtitle', __('From intimate gatherings to grand celebrations, we offer comprehensive event management services.', 'auctoclean')); ?></p>
        </div>

        <div class="row">
            <?php
            $has_services = false;
            if (auctoclean_is_pods_active() && isset($services)) {
                $has_services = $services->total() > 0;
            } elseif (isset($services_query)) {
                $has_services = $services_query->have_posts();
            }

            if ($has_services) :
                $delay = 0;

                if (auctoclean_is_pods_active() && isset($services)) {
                    // Pods method
                    while ($services->fetch()) {
                        $delay += 100;
                        $service_icon = $services->field('service_icon') ?: 'fas fa-cogs';
                        $service_price = $services->field('service_price');
                        $service_features = $services->field('service_features');
                        $service_gallery = $services->field('service_gallery');

                        $service_title = $services->display('post_title');
                        $service_content = $services->display('post_content');
                        $service_excerpt = $services->display('post_excerpt');
                        $service_permalink = $services->display('permalink');
            ?>
                        <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                            <div class="card service-card h-100">
                                <div class="card-body text-center">
                                    <div class="service-icon mb-3">
                                        <i class="<?php echo esc_attr($service_icon); ?>"></i>
                                    </div>

                                    <h4 class="card-title"><?php echo esc_html($service_title); ?></h4>

                                    <p class="card-text"><?php echo wp_trim_words($service_content, 20); ?></p>

                                    <?php if ($service_features) :
                                        $features = explode("\n", $service_features);
                                    ?>
                                        <ul class="service-features list-unstyled mb-3">
                                            <?php foreach ($features as $feature) :
                                                $feature = trim($feature);
                                                if (!empty($feature)) :
                                            ?>
                                                    <li><i class="fas fa-check-circle text-primary me-2"></i><?php echo esc_html($feature); ?></li>
                                            <?php
                                                endif;
                                            endforeach;
                                            ?>
                                        </ul>
                                    <?php endif; ?>

                                    <?php if ($service_price) : ?>
                                        <div class="service-price mb-3">
                                            <span class="price-tag h5 text-primary"><?php echo esc_html($service_price); ?></span>
                                        </div>
                                    <?php endif; ?>

                                    <div class="mt-auto">
                                        <a href="<?php echo esc_url($service_permalink); ?>" class="btn btn-outline-primary"><?php _e('Learn More', 'auctoclean'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                } else {
                    // WordPress fallback method
                    while ($services_query->have_posts()) : $services_query->the_post();
                        $delay += 100;
                        $service_icon = auctoclean_get_field('service_icon', get_the_ID(), 'fas fa-cogs');
                        $service_price = auctoclean_get_field('service_price', get_the_ID());
                        $service_features = auctoclean_get_field('service_features', get_the_ID());
                    ?>
                        <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                            <div class="card service-card h-100">
                                <div class="card-body text-center">
                                    <div class="service-icon mb-3">
                                        <i class="<?php echo esc_attr($service_icon); ?>"></i>
                                    </div>

                                    <h4 class="card-title"><?php the_title(); ?></h4>

                                    <p class="card-text"><?php echo wp_trim_words(get_the_content(), 20); ?></p>

                                    <?php if ($service_features) :
                                        $features = explode("\n", $service_features);
                                    ?>
                                        <ul class="service-features list-unstyled mb-3">
                                            <?php foreach ($features as $feature) :
                                                $feature = trim($feature);
                                                if (!empty($feature)) :
                                            ?>
                                                    <li><i class="fas fa-check-circle text-primary me-2"></i><?php echo esc_html($feature); ?></li>
                                            <?php
                                                endif;
                                            endforeach;
                                            ?>
                                        </ul>
                                    <?php endif; ?>

                                    <?php if ($service_price) : ?>
                                        <div class="service-price mb-3">
                                            <span class="price-tag h5 text-primary"><?php echo esc_html($service_price); ?></span>
                                        </div>
                                    <?php endif; ?>

                                    <div class="mt-auto">
                                        <a href="<?php the_permalink(); ?>" class="btn btn-outline-primary"><?php _e('Learn More', 'auctoclean'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                }
            else :
                // Fallback services if none are created
                $default_services = array(
                    array(
                        'title' => __('Wedding Planning', 'auctoclean'),
                        'icon' => 'fas fa-heart',
                        'description' => __('Creating magical wedding moments with personalized planning and flawless execution.', 'auctoclean'),
                        'price' => __('Starting at $2,500', 'auctoclean')
                    ),
                    array(
                        'title' => __('Corporate Events', 'auctoclean'),
                        'icon' => 'fas fa-building',
                        'description' => __('Professional corporate event management for conferences, seminars, and business gatherings.', 'auctoclean'),
                        'price' => __('Starting at $1,500', 'auctoclean')
                    ),
                    array(
                        'title' => __('Concerts & Shows', 'auctoclean'),
                        'icon' => 'fas fa-music',
                        'description' => __('Large-scale entertainment events with professional stage management and production.', 'auctoclean'),
                        'price' => __('Starting at $5,000', 'auctoclean')
                    ),
                    array(
                        'title' => __('Private Celebrations', 'auctoclean'),
                        'icon' => 'fas fa-birthday-cake',
                        'description' => __('Intimate celebrations and personal milestones with customized themes and experiences.', 'auctoclean'),
                        'price' => __('Starting at $800', 'auctoclean')
                    ),
                    array(
                        'title' => __('Event Photography', 'auctoclean'),
                        'icon' => 'fas fa-camera',
                        'description' => __('Professional photography and videography services to capture your special moments.', 'auctoclean'),
                        'price' => __('Starting at $500', 'auctoclean')
                    ),
                    array(
                        'title' => __('Event Design', 'auctoclean'),
                        'icon' => 'fas fa-palette',
                        'description' => __('Creative event design and decoration services to bring your vision to life.', 'auctoclean'),
                        'price' => __('Starting at $300', 'auctoclean')
                    )
                );

                $delay = 0;
                foreach ($default_services as $service) :
                    $delay += 100;
                    ?>
                    <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                        <div class="card service-card h-100">
                            <div class="card-body text-center">
                                <div class="service-icon mb-3">
                                    <i class="<?php echo $service['icon']; ?>"></i>
                                </div>
                                <h4 class="card-title"><?php echo $service['title']; ?></h4>
                                <p class="card-text"><?php echo $service['description']; ?></p>

                                <div class="service-price mb-3">
                                    <span class="price-tag h6 text-primary"><?php echo $service['price']; ?></span>
                                </div>

                                <div class="mt-auto">
                                    <a href="#contact" class="btn btn-outline-primary"><?php _e('Learn More', 'auctoclean'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php endforeach;
            endif; ?>
        </div>
    </div>
</section>