<!-- Modern Gallery Section - WordPress Dynamic -->
<section class="modern-section gallery-section-dark" id="gallery">
    <!-- Background Elements -->
    <div class="gallery-bg-modern"></div>
    <div class="floating-elements-gallery">
        <div class="gallery-particle particle-1"></div>
        <div class="gallery-particle particle-2"></div>
        <div class="gallery-particle particle-3"></div>
        <div class="gallery-particle particle-4"></div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5" data-aos="fade-up">
                <div class="section-badge mb-4">
                    <span class="badge-modern">
                        <i class="fas fa-camera me-2"></i>
                        Our Portfolio
                    </span>
                </div>
                <h2 class="modern-section-title mb-4">
                    Event <span class="gradient-text">Gallery</span>
                </h2>
                <p class="modern-subtitle">
                    Take a look at some of our most memorable events and celebrations we've brought to life.
                </p>
            </div>
        </div>

        <?php
        // Fetch gallery images from WordPress
        $argsGallery = array(
            'post_type' => 'gallery_image',
            'orderby' => 'menu_order',
            'posts_per_page' => 8  // Show 8 images in modern layout
        );
        $galleryList = new WP_Query($argsGallery);

        if ($galleryList->have_posts()) :
        ?>

            <!-- Dynamic Gallery Grid -->
            <div class="row g-4 gallery-grid-modern">
                <?php
                $gallery_count = 0;
                while ($galleryList->have_posts()) : $galleryList->the_post();
                    if (has_post_thumbnail(get_the_ID())):
                        $delay = 200 + ($gallery_count * 100);
                ?>
                        <div class="col-lg-3 col-md-4 col-sm-6" data-aos="zoom-in" data-aos-delay="<?php echo $delay; ?>">
                            <div class="gallery-item-modern">
                                <div class="gallery-image-container">
                                    <img src="<?php the_post_thumbnail_url('medium_large'); ?>"
                                        alt="<?php echo esc_attr(get_the_post_thumbnail_caption()); ?>"
                                        class="gallery-image">
                                    <div class="gallery-overlay">
                                        <div class="gallery-content">
                                            <?php if (get_the_title()): ?>
                                                <h5 class="gallery-title"><?php echo esc_html(get_the_title()); ?></h5>
                                            <?php endif; ?>
                                            <?php if (get_the_post_thumbnail_caption()): ?>
                                                <p class="gallery-caption"><?php echo esc_html(get_the_post_thumbnail_caption()); ?></p>
                                            <?php endif; ?>
                                            <a href="<?php the_post_thumbnail_url('full'); ?>"
                                                class="gallery-zoom"
                                                data-lightbox="gallery"
                                                data-title="<?php echo esc_attr(get_the_post_thumbnail_caption()); ?>">
                                                <i class="fas fa-expand-alt"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="gallery-glow"></div>
                            </div>
                        </div>
                <?php
                        $gallery_count++;
                    endif;
                endwhile;
                wp_reset_postdata();
                ?>
            </div>

            <!-- View More Button -->
            <div class="row mt-5">
                <div class="col-12 text-center" data-aos="fade-up" data-aos-delay="800">
                    <a href="<?php echo get_site_url() . '/gallery'; ?>" class="btn btn-modern-primary btn-lg">
                        <span>View Complete Gallery</span>
                        <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>

        <?php else: ?>

            <!-- Fallback Message -->
            <div class="row">
                <div class="col-12 text-center" data-aos="fade-up">
                    <div class="gallery-fallback">
                        <i class="fas fa-images gallery-fallback-icon"></i>
                        <h4>Gallery Coming Soon</h4>
                        <p>We're currently updating our portfolio with amazing event photos.</p>
                    </div>
                </div>
            </div>

        <?php endif; ?>
    </div>
</section>