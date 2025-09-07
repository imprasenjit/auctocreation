<!-- Production Section -->
<section id="production" class="section section-alt">
    <div class="container">
        <?php
        $args_production = array(
            'post_type' => 'production_slide',
            'orderby' => 'menu_order',
            'posts_per_page' => -1
        );
        $production_slides = new WP_Query($args_production);

        if ($production_slides->have_posts()): ?>

            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 class="section-title text-gradient mb-3" data-aos="fade-up">Production Services</h2>
                    <p class="section-subtitle text-muted mb-5" data-aos="fade-up" data-aos-delay="200">
                        Professional production services for events of all scales
                    </p>
                </div>
            </div>

            <div class="row modern-grid grid-3">
                <?php
                $production_count = 0;
                while ($production_slides->have_posts()): $production_slides->the_post();
                ?>
                    <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="<?php echo $production_count * 100; ?>">
                        <div class="modern-card production-card h-100">
                            <?php if (has_post_thumbnail()): ?>
                                <div class="card-image-wrapper mb-4">
                                    <img src="<?php the_post_thumbnail_url('production_slides'); ?>"
                                        alt="<?php echo esc_html(get_the_post_thumbnail_caption()); ?>"
                                        class="img-fluid rounded production-image">
                                    <div class="card-overlay">
                                        <div class="overlay-content">
                                            <i class="fas fa-play-circle fa-3x text-white"></i>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="card-content text-center">
                                <h4 class="card-title mb-3">
                                    <?php echo esc_html(get_the_title()); ?>
                                </h4>

                                <?php if (get_the_post_thumbnail_caption()): ?>
                                    <p class="card-description text-muted">
                                        <?php echo esc_html(get_the_post_thumbnail_caption()); ?>
                                    </p>
                                <?php endif; ?>

                                <?php if (get_the_content()): ?>
                                    <p class="card-excerpt">
                                        <?php echo wp_trim_words(get_the_content(), 15); ?>
                                    </p>
                                <?php endif; ?>

                                <a href="#" class="btn btn-outline mt-3" data-bs-toggle="modal" data-bs-target="#productionModal<?php echo get_the_ID(); ?>">
                                    Learn More <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Modal for Production Details -->
                    <div class="modal fade" id="productionModal<?php echo get_the_ID(); ?>" tabindex="-1" aria-labelledby="productionModalLabel<?php echo get_the_ID(); ?>" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="productionModalLabel<?php echo get_the_ID(); ?>">
                                        <?php echo esc_html(get_the_title()); ?>
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <?php if (has_post_thumbnail()): ?>
                                        <img src="<?php the_post_thumbnail_url('large'); ?>"
                                            alt="<?php echo esc_html(get_the_title()); ?>"
                                            class="img-fluid rounded mb-3">
                                    <?php endif; ?>

                                    <?php if (get_the_content()): ?>
                                        <div class="content">
                                            <?php echo wpautop(get_the_content()); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <a href="#contact" class="btn btn-primary" data-bs-dismiss="modal">Get Quote</a>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php
                    $production_count++;
                endwhile;
                wp_reset_postdata();
                ?>
            </div>

            <!-- Production CTA -->
            <div class="row mt-5">
                <div class="col-lg-8 mx-auto text-center" data-aos="fade-up">
                    <div class="cta-box modern-card">
                        <h3 class="mb-3">Need Custom Production Services?</h3>
                        <p class="mb-4">We provide end-to-end production solutions tailored to your specific requirements.</p>
                        <a href="#contact" class="btn btn-primary">Discuss Your Project</a>
                    </div>
                </div>
            </div>

        <?php endif; ?>
    </div>
</section>

<style>
    /* Production Section Custom Styles */
    .production-card {
        transition: all 0.3s ease;
        overflow: hidden;
    }

    .production-card:hover {
        transform: translateY(-10px);
    }

    .card-image-wrapper {
        position: relative;
        overflow: hidden;
        border-radius: var(--border-radius);
    }

    .production-image {
        transition: transform 0.3s ease;
    }

    .card-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(44, 62, 80, 0.8);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .card-image-wrapper:hover .card-overlay {
        opacity: 1;
    }

    .card-image-wrapper:hover .production-image {
        transform: scale(1.1);
    }

    .overlay-content {
        text-align: center;
    }

    .cta-box {
        background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
        color: white;
        padding: 3rem;
        border-radius: var(--border-radius-lg);
    }

    .cta-box h3 {
        color: white;
    }

    @media (max-width: 768px) {
        .modern-grid {
            grid-template-columns: 1fr;
        }

        .cta-box {
            padding: 2rem;
        }
    }
</style>