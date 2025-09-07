<!-- Modern Services Section -->
<section class="modern-section services-section-dark" id="services">
    <!-- Background Elements -->
    <div class="section-bg-services"></div>
    <div class="floating-shapes-services">
        <div class="service-shape shape-1"></div>
        <div class="service-shape shape-2"></div>
        <div class="service-shape shape-3"></div>
    </div>

    <div class="container">
        <!-- Section Header -->
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5" data-aos="fade-up">
                <div class="section-badge mb-4">
                    <span class="badge-modern">
                        <i class="fas fa-cogs me-2"></i>
                        Our Services
                    </span>
                </div>
                <h2 class="modern-section-title mb-4">
                    What We <span class="gradient-text">Offer</span>
                </h2>
                <p class="modern-subtitle">
                    From intimate gatherings to grand celebrations, we deliver exceptional event experiences tailored to your vision.
                </p>
            </div>
        </div>

        <!-- Services Grid - Dynamic from WordPress -->
        <div class="row g-4">
            <?php
            // Fetch production slides for services
            $argsProduction = array(
                'post_type' => 'production_silde',
                'orderby' => 'menu_order',
                'posts_per_page' => 6  // Limit to 6 services
            );
            $productionSlides = new WP_Query($argsProduction);

            if ($productionSlides->have_posts()) :
                $delay = 200;
                $glow_colors = ['pink', 'cyan', 'orange', 'green', 'purple', 'yellow'];
                $icons = ['fas fa-heart', 'fas fa-building', 'fas fa-music', 'fas fa-birthday-cake', 'fas fa-camera', 'fas fa-palette'];
                $service_count = 0;

                while ($productionSlides->have_posts()) : $productionSlides->the_post();
            ?>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                        <div class="service-card-modern">
                            <div class="service-icon-modern">
                                <i class="<?php echo $icons[$service_count % count($icons)]; ?>"></i>
                            </div>
                            <div class="service-content">
                                <h4><?php echo esc_html(get_the_title()); ?></h4>
                                <p><?php echo esc_html(get_the_post_thumbnail_caption()); ?></p>
                                <?php if (get_the_content()): ?>
                                    <div class="service-description">
                                        <?php the_content(); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="service-glow glow-<?php echo $glow_colors[$service_count % count($glow_colors)]; ?>"></div>
                        </div>
                    </div>
                <?php
                    $delay += 200;
                    $service_count++;
                endwhile;
                wp_reset_postdata();
            else:
                // Fallback to static services if no WordPress data
                ?>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-card-modern">
                        <div class="service-icon-modern">
                            <i class="fas fa-heart"></i>
                        </div>
                        <div class="service-content">
                            <h4>Wedding Planning</h4>
                            <p>Creating magical wedding moments with personalized planning and flawless execution.</p>
                        </div>
                        <div class="service-glow glow-pink"></div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-card-modern">
                        <div class="service-icon-modern">
                            <i class="fas fa-building"></i>
                        </div>
                        <div class="service-content">
                            <h4>Corporate Events</h4>
                            <p>Professional corporate event management for conferences and business gatherings.</p>
                        </div>
                        <div class="service-glow glow-cyan"></div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="service-card-modern">
                        <div class="service-icon-modern">
                            <i class="fas fa-music"></i>
                        </div>
                        <div class="service-content">
                            <h4>Concerts & Festivals</h4>
                            <p>Large-scale entertainment events with professional stage management.</p>
                        </div>
                        <div class="service-glow glow-orange"></div>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <!-- CTA Section -->
        <div class="row mt-5">
            <div class="col-lg-8 mx-auto text-center" data-aos="fade-up" data-aos-delay="1400">
                <div class="service-cta-modern">
                    <h3 class="mb-4">Ready to Start Planning?</h3>
                    <p class="mb-4">Let's discuss your event requirements and create something extraordinary together.</p>
                    <a href="#contact" class="btn btn-modern-primary btn-lg">
                        <span>Get Started Today</span>
                        <i class="fas fa-rocket ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>