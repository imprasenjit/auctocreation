<!-- Modern Gallery Section -->
<section class="modern-section section-gallery" id="gallery">
    <div class="container">
        <?php
        $argsGallery = array(
            'post_type' => 'gallery_image',
            'orderby' => 'menu_order',
            'posts_per_page' => 12
        );
        $galleryList = new WP_Query($argsGallery);

        if ($galleryList->have_posts()) :
        ?>
            <!-- Section Header -->
            <div class="section-header" data-aos="fade-up">
                <h2 class="section-title">Gallery</h2>
                <p class="section-subtitle">A visual journey through our memorable events and productions</p>
            </div>

            <!-- Gallery Grid -->
            <div class="gallery-grid" data-aos="fade-up" data-aos-delay="200">
                <?php
                $galleryCount = 0;
                while ($galleryList->have_posts()) : $galleryList->the_post();
                    if (has_post_thumbnail(get_the_ID())) {
                        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');
                        $full_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                        $caption = get_the_post_thumbnail_caption();
                        $title = get_the_title();
                        $delay = ($galleryCount % 4) * 100 + 300;
                ?>
                        <div class="gallery-item" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                            <div class="gallery-card">
                                <div class="gallery-image-wrapper">
                                    <img src="<?php echo esc_url($featured_img_url); ?>"
                                        class="gallery-image"
                                        alt="<?php echo esc_attr($caption ? $caption : $title); ?>"
                                        loading="lazy">
                                    <div class="gallery-overlay">
                                        <div class="gallery-overlay-content">
                                            <a href="<?php echo esc_url($full_img_url); ?>"
                                                class="gallery-zoom"
                                                data-bs-toggle="modal"
                                                data-bs-target="#galleryModal"
                                                data-bs-img="<?php echo esc_url($full_img_url); ?>"
                                                data-bs-title="<?php echo esc_attr($title); ?>"
                                                aria-label="View larger image">
                                                <i class="fas fa-search-plus" aria-hidden="true"></i>
                                            </a>
                                            <?php if ($title): ?>
                                                <h5 class="gallery-title"><?php echo esc_html($title); ?></h5>
                                            <?php endif; ?>
                                            <?php if ($caption): ?>
                                                <p class="gallery-caption"><?php echo esc_html($caption); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                        $galleryCount++;
                    }
                endwhile;
                ?>
            </div>

            <!-- View More Button -->
            <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="400">
                <a href="<?php echo get_site_url() . "/gallery"; ?>" class="btn btn-modern btn-lg">
                    <i class="fas fa-images me-2" aria-hidden="true"></i>
                    View Complete Gallery
                </a>
            </div>

        <?php
        else:
        ?>
            <!-- Fallback Content -->
            <div class="section-header" data-aos="fade-up">
                <h2 class="section-title">Gallery</h2>
                <p class="section-subtitle">Explore our portfolio of successful events and productions</p>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="200">
                <div class="col-md-6 mb-4">
                    <div class="card modern-card text-center h-100">
                        <div class="card-body">
                            <div class="feature-icon mb-3">
                                <i class="fas fa-camera fa-3x text-primary" aria-hidden="true"></i>
                            </div>
                            <h4>Event Photography</h4>
                            <p class="card-text">Professional photography capturing every special moment of your events.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card modern-card text-center h-100">
                        <div class="card-body">
                            <div class="feature-icon mb-3">
                                <i class="fas fa-video fa-3x text-primary" aria-hidden="true"></i>
                            </div>
                            <h4>Video Documentation</h4>
                            <p class="card-text">Comprehensive video coverage and documentation of all our productions.</p>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        endif;
        wp_reset_postdata();
        ?>
    </div>
</section>

<!-- Gallery Modal -->
<div class="modal fade" id="galleryModal" tabindex="-1" aria-labelledby="galleryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="galleryModalLabel">Gallery Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img id="galleryModalImage" src="" class="img-fluid" alt="">
            </div>
        </div>
    </div>
</div>