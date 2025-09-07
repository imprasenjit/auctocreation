<?php

/**
 * Template part for displaying hero carousel
 * Uses Pods data fetching with WordPress fallback
 */

// Get slides data using Pods or fallback to standard WP
if (auctoclean_is_pods_active()) {
    // Use Pods to get hero slides
    $slides = pods('hero_slides', array(
        'limit' => 5,
        'orderby' => 'slide_order.meta_value ASC, post_date ASC'
    ));
} else {
    // Fallback to WP_Query
    $slides_query = new WP_Query(array(
        'post_type' => 'slides',
        'posts_per_page' => 5,
        'post_status' => 'publish',
        'meta_key' => '_slide_order',
        'orderby' => 'meta_value_num',
        'order' => 'ASC'
    ));
}

// Check if we have slides (Pods or WP_Query)
$has_slides = false;
$slide_count = 0;

if (auctoclean_is_pods_active() && isset($slides)) {
    $has_slides = $slides->total() > 0;
} elseif (isset($slides_query)) {
    $has_slides = $slides_query->have_posts();
}

if ($has_slides) : ?>
    <section id="hero" class="hero-carousel">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
            <!-- Indicators -->
            <div class="carousel-indicators">
                <?php
                $slide_count = 0;

                if (auctoclean_is_pods_active() && isset($slides)) {
                    // Pods method
                    while ($slides->fetch()) {
                ?>
                        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="<?php echo $slide_count; ?>"
                            <?php echo ($slide_count === 0) ? 'class="active" aria-current="true"' : ''; ?>
                            aria-label="<?php printf(__('Slide %d', 'auctoclean'), $slide_count + 1); ?>"></button>
                    <?php
                        $slide_count++;
                    }
                    $slides->reset(); // Reset for next loop
                } else {
                    // WordPress fallback method
                    while ($slides_query->have_posts()) : $slides_query->the_post();
                    ?>
                        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="<?php echo $slide_count; ?>"
                            <?php echo ($slide_count === 0) ? 'class="active" aria-current="true"' : ''; ?>
                            aria-label="<?php printf(__('Slide %d', 'auctoclean'), $slide_count + 1); ?>"></button>
                <?php
                        $slide_count++;
                    endwhile;
                    $slides_query->rewind_posts();
                }
                ?>
            </div>

            <!-- Carousel Inner -->
            <div class="carousel-inner">
                <?php
                $slide_count = 0;

                if (auctoclean_is_pods_active() && isset($slides)) {
                    // Pods method
                    while ($slides->fetch()) {
                        $slide_subtitle = $slides->field('slide_subtitle');
                        $slide_button_text = $slides->field('slide_button_text');
                        $slide_button_url = $slides->field('slide_button_url');
                        $slide_button_2_text = $slides->field('slide_button_2_text');
                        $slide_button_2_url = $slides->field('slide_button_2_url');

                        $slide_title = $slides->display('post_title');
                        $slide_content = $slides->display('post_content');
                        $slide_thumbnail = $slides->display('post_thumbnail.guid');
                ?>
                        <div class="carousel-item <?php echo ($slide_count === 0) ? 'active' : ''; ?>">
                            <?php if ($slide_thumbnail) : ?>
                                <img src="<?php echo esc_url($slide_thumbnail); ?>" class="d-block w-100 carousel-image" alt="<?php echo esc_attr($slide_title); ?>">
                            <?php else : ?>
                                <div class="carousel-placeholder d-flex align-items-center justify-content-center bg-primary" style="height: 100vh;">
                                    <div class="text-white text-center">
                                        <i class="fas fa-image fa-5x mb-3 opacity-50"></i>
                                        <p><?php _e('Upload slide image in post', 'auctoclean'); ?></p>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="hero-overlay"></div>

                            <div class="carousel-caption d-md-block" data-aos="fade-up" data-aos-delay="300">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8 text-center">
                                            <h1 class="display-4 fw-bold mb-3"><?php echo esc_html($slide_title ?: get_theme_mod('hero_title', 'Auctocreation')); ?></h1>

                                            <?php if ($slide_subtitle) : ?>
                                                <h2 class="h4 mb-4 text-light opacity-90"><?php echo esc_html($slide_subtitle); ?></h2>
                                            <?php endif; ?>

                                            <p class="lead mb-4"><?php echo wp_kses_post($slide_content ?: get_theme_mod('hero_subtitle', 'Creating Extraordinary Events & Experiences')); ?></p>

                                            <div class="hero-buttons mt-4">
                                                <?php if ($slide_button_text && $slide_button_url) : ?>
                                                    <a href="<?php echo esc_url($slide_button_url); ?>" class="btn btn-outline-light btn-lg me-3"><?php echo esc_html($slide_button_text); ?></a>
                                                <?php endif; ?>

                                                <?php if ($slide_button_2_text && $slide_button_2_url) : ?>
                                                    <a href="<?php echo esc_url($slide_button_2_url); ?>" class="btn btn-primary btn-lg"><?php echo esc_html($slide_button_2_text); ?></a>
                                                <?php elseif (!$slide_button_text) : ?>
                                                    <a href="#about" class="btn btn-outline-light btn-lg me-3"><?php _e('Learn More', 'auctoclean'); ?></a>
                                                    <a href="#contact" class="btn btn-primary btn-lg"><?php _e('Get Started', 'auctoclean'); ?></a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                        $slide_count++;
                    }
                } else {
                    // WordPress fallback method
                    while ($slides_query->have_posts()) : $slides_query->the_post();
                        $slide_subtitle = auctoclean_get_field('slide_subtitle', get_the_ID());
                        $slide_button_text = auctoclean_get_field('slide_button_text', get_the_ID());
                        $slide_button_url = auctoclean_get_field('slide_button_url', get_the_ID());
                        $slide_button_2_text = auctoclean_get_field('slide_button_2_text', get_the_ID());
                        $slide_button_2_url = auctoclean_get_field('slide_button_2_url', get_the_ID());
                    ?>
                        <div class="carousel-item <?php echo ($slide_count === 0) ? 'active' : ''; ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('hero-slide', array('class' => 'd-block w-100 carousel-image')); ?>
                            <?php else : ?>
                                <div class="carousel-placeholder d-flex align-items-center justify-content-center bg-primary" style="height: 100vh;">
                                    <div class="text-white text-center">
                                        <i class="fas fa-image fa-5x mb-3 opacity-50"></i>
                                        <p><?php _e('Upload slide image in post', 'auctoclean'); ?></p>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="hero-overlay"></div>

                            <div class="carousel-caption d-md-block" data-aos="fade-up" data-aos-delay="300">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8 text-center">
                                            <h1 class="display-4 fw-bold mb-3"><?php the_title(); ?></h1>

                                            <?php if ($slide_subtitle) : ?>
                                                <h2 class="h4 mb-4 text-light opacity-90"><?php echo esc_html($slide_subtitle); ?></h2>
                                            <?php endif; ?>

                                            <p class="lead mb-4"><?php echo wp_kses_post(get_the_content() ?: get_theme_mod('hero_subtitle', 'Creating Extraordinary Events & Experiences')); ?></p>

                                            <div class="hero-buttons mt-4">
                                                <?php if ($slide_button_text && $slide_button_url) : ?>
                                                    <a href="<?php echo esc_url($slide_button_url); ?>" class="btn btn-outline-light btn-lg me-3"><?php echo esc_html($slide_button_text); ?></a>
                                                <?php endif; ?>

                                                <?php if ($slide_button_2_text && $slide_button_2_url) : ?>
                                                    <a href="<?php echo esc_url($slide_button_2_url); ?>" class="btn btn-primary btn-lg"><?php echo esc_html($slide_button_2_text); ?></a>
                                                <?php elseif (!$slide_button_text) : ?>
                                                    <a href="#about" class="btn btn-outline-light btn-lg me-3"><?php _e('Learn More', 'auctoclean'); ?></a>
                                                    <a href="#contact" class="btn btn-primary btn-lg"><?php _e('Get Started', 'auctoclean'); ?></a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                        $slide_count++;
                    endwhile;
                    wp_reset_postdata();
                }
                ?>
            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden"><?php _e('Previous', 'auctoclean'); ?></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden"><?php _e('Next', 'auctoclean'); ?></span>
            </button>
        </div>
    </section>

<?php else : ?>
    <!-- Fallback Hero Section -->
    <section id="hero" class="hero-carousel">
        <div class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active hero-fallback">
                    <div class="hero-overlay"></div>
                    <div class="carousel-caption d-md-block" data-aos="fade-up" data-aos-delay="300">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8 text-center">
                                    <h1 class="display-4 fw-bold mb-3"><?php echo get_theme_mod('hero_title', get_bloginfo('name')); ?></h1>
                                    <p class="lead mb-4"><?php echo get_theme_mod('hero_subtitle', get_bloginfo('description')); ?></p>
                                    <div class="hero-buttons mt-4">
                                        <a href="#about" class="btn btn-outline-light btn-lg me-3"><?php _e('Learn More', 'auctoclean'); ?></a>
                                        <a href="#contact" class="btn btn-primary btn-lg"><?php _e('Get Started', 'auctoclean'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>