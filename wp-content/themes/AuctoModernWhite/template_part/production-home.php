<!-- Modern Production Section (Enhanced) -->
<section class="modern-section section-production" id="production">
    <div class="container">
        <?php
        $argsProduction = array(
            'post_type' => 'production_silde',
            'orderby' => 'menu_order',
            'posts_per_page' => -1
        );
        $productionSlides = new WP_Query($argsProduction);
        if ($productionSlides->have_posts()) : ?>

            <div class="section-header text-center" data-aos="fade-up">
                <h2 class="section-title mb-3">Production</h2>
                <p class="section-subtitle lead fw-medium text-muted">Our creative production services and portfolio</p>
            </div>

            <?php $total = $productionSlides->found_posts;
            $index = 0; ?>
            <div class="production-rail-wrapper" data-aos="fade-up" data-aos-delay="120">
                <div class="production-rail" role="list">
                    <?php while ($productionSlides->have_posts()) : $productionSlides->the_post();
                        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
                        $caption = get_the_post_thumbnail_caption();
                        $title = get_the_title();
                        $index++; ?>
                        <article class="prod-item" role="listitem" tabindex="0" aria-label="<?php echo esc_attr($title); ?> card">
                            <div class="prod-media ratio ratio-4x3">
                                <?php if ($featured_img_url): ?>
                                    <img src="<?php echo esc_url($featured_img_url); ?>" alt="<?php echo esc_attr($caption ? $caption : $title); ?>" loading="lazy" class="prod-img">
                                <?php endif; ?>
                                <div class="prod-overlay">
                                    <button class="prod-action view-btn" type="button" data-prod-title="<?php echo esc_attr($title); ?>" data-prod-caption="<?php echo esc_attr($caption); ?>" data-prod-img="<?php echo esc_url($featured_img_url); ?>">
                                        <i class="fas fa-eye" aria-hidden="true"></i>
                                        <span class="label">Preview</span>
                                    </button>
                                </div>
                            </div>
                            <div class="prod-meta">
                                <h3 class="prod-title h5 mb-1"><?php echo esc_html($title); ?></h3>
                                <?php if ($caption): ?><p class="prod-caption small text-muted mb-0"><?php echo esc_html($caption); ?></p><?php endif; ?>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
                <div class="rail-fade rail-fade-left" aria-hidden="true"></div>
                <div class="rail-fade rail-fade-right" aria-hidden="true"></div>
            </div>

            <?php if ($total > 8): ?>
                <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="300">
                    <a href="#gallery" class="btn btn-accent btn-lg shadow-sm"><i class="fas fa-images me-2" aria-hidden="true"></i>View All Productions</a>
                </div>
            <?php endif; ?>

        <?php else: ?>
            <div class="section-header text-center" data-aos="fade-up">
                <h2 class="section-title mb-3">Production</h2>
                <p class="section-subtitle lead fw-medium text-muted">Professional production services for all your event needs</p>
            </div>
            <div class="row g-4" data-aos="fade-up" data-aos-delay="160">
                <div class="col-sm-6 col-lg-4">
                    <div class="feature-tile h-100 p-4 rounded-4 glass-tile text-center">
                        <div class="icon-wrap mb-3"><i class="fas fa-video fa-2x" aria-hidden="true"></i></div>
                        <h3 class="h5">Video Production</h3>
                        <p class="small text-muted mb-0">Professional video production services for events and promotions.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="feature-tile h-100 p-4 rounded-4 glass-tile text-center">
                        <div class="icon-wrap mb-3"><i class="fas fa-music fa-2x" aria-hidden="true"></i></div>
                        <h3 class="h5">Audio Production</h3>
                        <p class="small text-muted mb-0">High-quality audio production and sound engineering services.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="feature-tile h-100 p-4 rounded-4 glass-tile text-center">
                        <div class="icon-wrap mb-3"><i class="fas fa-camera fa-2x" aria-hidden="true"></i></div>
                        <h3 class="h5">Photography</h3>
                        <p class="small text-muted mb-0">Professional photography services for all types of events.</p>
                    </div>
                </div>
            </div>
        <?php endif;
        wp_reset_postdata(); ?>
    </div>

    <!-- Modal Placeholder -->
    <div class="modal fade" id="productionPreviewModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded-4 shadow-lg">
                <div class="modal-header border-0">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pt-0">
                    <img src="" alt="" class="img-fluid rounded-3 mb-3 modal-prod-img">
                    <p class="modal-prod-caption text-muted small mb-0"></p>
                </div>
            </div>
        </div>
    </div>
</section>