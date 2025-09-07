<!-- Modern Auctocreation Section -->
<section class="modern-section testimonials-section section-auctocreation" id="auctocreation">
    <div class="container">
        <?php
        $argsAuctoQuote = array(
            'post_type' => 'aucto_quotes',
            'orderby' => 'menu_order',
            'posts_per_page' => -1
        );
        $auctoQuotes = new WP_Query($argsAuctoQuote);
        ?>

        <?php if ($auctoQuotes->have_posts()) : ?>
            <!-- Section Header -->
            <div class="section-header" data-aos="fade-up">
                <h2 class="section-title">Auctocreation</h2>
                <p class="section-subtitle">Words that inspire and testimonials from our valued clients</p>
            </div>

            <!-- Modern Testimonials Carousel -->
            <div class="testimonials-carousel" data-aos="fade-up" data-aos-delay="200">
                <div id="modernTestimonials" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

                    <!-- Testimonials -->
                    <div class="carousel-inner">
                        <?php
                        $quotesCount = 0;
                        while ($auctoQuotes->have_posts()) : $auctoQuotes->the_post();
                            $quote = get_the_excerpt();
                            $title = get_the_title();
                            $content = get_the_content();
                        ?>
                            <div class="carousel-item <?php echo ($quotesCount === 0) ? 'active' : ''; ?>">
                                <div class="testimonial-content">
                                    <div class="quote-icon">
                                        <i class="fas fa-quote-left" aria-hidden="true"></i>
                                    </div>

                                    <?php if ($quote): ?>
                                        <blockquote class="testimonial-quote">
                                            <?php echo esc_html($quote); ?>
                                        </blockquote>
                                    <?php endif; ?>

                                    <?php if ($title): ?>
                                        <div class="testimonial-author">
                                            <h5><?php echo esc_html($title); ?></h5>
                                            <span class="author-title">Client</span>
                                        </div>
                                    <?php endif; ?>

                                    <div class="testimonial-decoration">
                                        <div class="stars">
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                            <i class="fas fa-star" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                            $quotesCount++;
                        endwhile;
                        ?>
                    </div>

                    <!-- Modern Controls -->
                    <button class="carousel-control-prev testimonial-control" type="button" data-bs-target="#modernTestimonials" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true">
                            <i class="fas fa-chevron-left"></i>
                        </span>
                        <span class="visually-hidden">Previous</span>
                    </button>

                    <button class="carousel-control-next testimonial-control" type="button" data-bs-target="#modernTestimonials" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true">
                            <i class="fas fa-chevron-right"></i>
                        </span>
                        <span class="visually-hidden">Next</span>
                    </button>

                    <!-- Modern Indicators -->
                    <div class="carousel-indicators testimonial-indicators">
                        <?php
                        $indicatorCount = 0;
                        $auctoQuotes->rewind_posts();
                        while ($auctoQuotes->have_posts()) : $auctoQuotes->the_post();
                        ?>
                            <button type="button"
                                data-bs-target="#modernTestimonials"
                                data-bs-slide-to="<?php echo $indicatorCount; ?>"
                                <?php if ($indicatorCount === 0) { ?>class="active" aria-current="true" <?php } ?>
                                aria-label="Testimonial <?php echo $indicatorCount + 1; ?>">
                            </button>
                        <?php
                            $indicatorCount++;
                        endwhile;
                        ?>
                    </div>
                </div>
            </div>

        <?php else: ?>
            <!-- Fallback Content -->
            <div class="section-header" data-aos="fade-up">
                <h2 class="section-title">Auctocreation</h2>
                <p class="section-subtitle">Dedicated to creating exceptional events and memorable experiences</p>
            </div>

            <div class="auctocreation-info" data-aos="fade-up" data-aos-delay="200">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-4">
                        <div class="info-content">
                            <h3>Our Mission</h3>
                            <p class="lead">At Auctocreation, we believe in transforming ordinary events into extraordinary experiences. Our dedicated team brings creativity, professionalism, and attention to detail to every project.</p>

                            <div class="mission-points">
                                <div class="point">
                                    <i class="fas fa-check-circle text-primary me-3" aria-hidden="true"></i>
                                    <span>Professional event management</span>
                                </div>
                                <div class="point">
                                    <i class="fas fa-check-circle text-primary me-3" aria-hidden="true"></i>
                                    <span>Creative production services</span>
                                </div>
                                <div class="point">
                                    <i class="fas fa-check-circle text-primary me-3" aria-hidden="true"></i>
                                    <span>Client satisfaction guarantee</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <div class="info-stats">
                            <div class="stat-item">
                                <div class="stat-number">500+</div>
                                <div class="stat-label">Events Organized</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">15+</div>
                                <div class="stat-label">Years Experience</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">100%</div>
                                <div class="stat-label">Client Satisfaction</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php wp_reset_postdata(); ?>
    </div>
</section>