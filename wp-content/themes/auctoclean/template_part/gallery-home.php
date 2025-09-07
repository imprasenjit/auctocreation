<!-- Gallery Preview Section -->
<section id="gallery-preview" class="section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="section-title text-gradient mb-3" data-aos="fade-up">Event Gallery</h2>
                <p class="section-subtitle text-muted mb-5" data-aos="fade-up" data-aos-delay="200">
                    Capturing moments that matter - A glimpse into our memorable events
                </p>
            </div>
        </div>

        <?php
        $args_gallery = array(
            'post_type' => 'attachment',
            'post_mime_type' => 'image',
            'post_status' => 'inherit',
            'posts_per_page' => 12,
            'orderby' => 'date',
            'order' => 'DESC'
        );

        // Alternative: Get posts with featured images
        $args_gallery_posts = array(
            'post_type' => 'post',
            'posts_per_page' => 12,
            'meta_query' => array(
                array(
                    'key' => '_thumbnail_id',
                    'compare' => 'EXISTS'
                )
            )
        );

        $gallery_query = new WP_Query($args_gallery_posts);

        if ($gallery_query->have_posts()): ?>

            <!-- Gallery Filter Tabs -->
            <div class="gallery-filters text-center mb-5" data-aos="fade-up">
                <button class="filter-btn active" data-filter="*">All</button>
                <button class="filter-btn" data-filter=".wedding">Weddings</button>
                <button class="filter-btn" data-filter=".corporate">Corporate</button>
                <button class="filter-btn" data-filter=".festival">Festivals</button>
                <button class="filter-btn" data-filter=".concert">Concerts</button>
            </div>

            <!-- Gallery Grid -->
            <div class="gallery-grid" id="galleryGrid">
                <?php
                $gallery_count = 0;
                $categories = array('wedding', 'corporate', 'festival', 'concert');

                while ($gallery_query->have_posts()): $gallery_query->the_post();
                    $category = $categories[array_rand($categories)]; // Random category for demo
                ?>
                    <div class="gallery-item <?php echo $category; ?>" data-aos="fade-up" data-aos-delay="<?php echo $gallery_count * 50; ?>">
                        <div class="gallery-card">
                            <div class="gallery-image-wrapper">
                                <?php if (has_post_thumbnail()): ?>
                                    <img src="<?php the_post_thumbnail_url('gallery_image'); ?>"
                                        alt="<?php echo esc_html(get_the_title()); ?>"
                                        class="gallery-image">
                                <?php else: ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder-gallery.jpg"
                                        alt="Gallery Image"
                                        class="gallery-image">
                                <?php endif; ?>

                                <div class="gallery-overlay">
                                    <div class="overlay-content">
                                        <a href="<?php the_post_thumbnail_url('large'); ?>"
                                            class="gallery-link"
                                            data-lightbox="gallery"
                                            data-title="<?php echo esc_html(get_the_title()); ?>">
                                            <i class="fas fa-search-plus fa-2x"></i>
                                        </a>
                                        <div class="gallery-info mt-3">
                                            <h5 class="text-white mb-1"><?php the_title(); ?></h5>
                                            <p class="text-light small mb-0"><?php echo ucfirst($category); ?> Event</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    $gallery_count++;
                endwhile;
                wp_reset_postdata();
                ?>
            </div>

            <!-- View More Button -->
            <div class="text-center mt-5" data-aos="fade-up">
                <a href="<?php echo get_permalink(get_page_by_path('gallery')); ?>" class="btn btn-primary btn-lg">
                    View Complete Gallery <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>

        <?php else: ?>

            <!-- Placeholder Gallery -->
            <div class="gallery-grid">
                <?php for ($i = 1; $i <= 8; $i++): ?>
                    <div class="gallery-item" data-aos="fade-up" data-aos-delay="<?php echo $i * 50; ?>">
                        <div class="gallery-card">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder-gallery-<?php echo $i; ?>.jpg"
                                    alt="Sample Gallery Image <?php echo $i; ?>"
                                    class="gallery-image">
                                <div class="gallery-overlay">
                                    <div class="overlay-content">
                                        <a href="#" class="gallery-link">
                                            <i class="fas fa-search-plus fa-2x"></i>
                                        </a>
                                        <div class="gallery-info mt-3">
                                            <h5 class="text-white mb-1">Event Gallery <?php echo $i; ?></h5>
                                            <p class="text-light small mb-0">Sample Event</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>

            <div class="text-center mt-5" data-aos="fade-up">
                <p class="text-muted mb-4">More gallery images coming soon!</p>
                <a href="#contact" class="btn btn-primary">Contact Us for Event Photography</a>
            </div>

        <?php endif; ?>
    </div>
</section>

<style>
    /* Gallery Preview Styles */
    .gallery-filters {
        margin-bottom: 3rem;
    }

    .filter-btn {
        background: transparent;
        border: 2px solid var(--primary-color);
        color: var(--primary-color);
        padding: 10px 24px;
        margin: 0 8px 8px 0;
        border-radius: 25px;
        font-weight: 500;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .filter-btn.active,
    .filter-btn:hover {
        background: var(--primary-color);
        color: white;
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 24px;
        margin-bottom: 2rem;
    }

    .gallery-card {
        background: white;
        border-radius: var(--border-radius-lg);
        overflow: hidden;
        box-shadow: var(--shadow-md);
        transition: all 0.3s ease;
    }

    .gallery-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-xl);
    }

    .gallery-image-wrapper {
        position: relative;
        aspect-ratio: 4/3;
        overflow: hidden;
    }

    .gallery-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .gallery-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(44, 62, 80, 0.9);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .gallery-card:hover .gallery-overlay {
        opacity: 1;
    }

    .gallery-card:hover .gallery-image {
        transform: scale(1.1);
    }

    .overlay-content {
        text-align: center;
        color: white;
    }

    .gallery-link {
        color: white;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .gallery-link:hover {
        color: var(--accent-color);
    }

    .gallery-info h5 {
        font-size: 1.1rem;
        font-weight: 600;
    }

    /* Animation classes for filtering */
    .gallery-item {
        transition: all 0.3s ease;
    }

    .gallery-item.hidden {
        opacity: 0;
        transform: scale(0.8);
    }

    /* Mobile Responsiveness */
    @media (max-width: 768px) {
        .gallery-grid {
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 16px;
        }

        .filter-btn {
            padding: 8px 16px;
            margin: 0 4px 8px 0;
            font-size: 0.875rem;
        }
    }

    @media (max-width: 480px) {
        .gallery-grid {
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 12px;
        }

        .gallery-overlay .fas {
            font-size: 1.5rem;
        }
    }
</style>

<script>
    // Gallery Filter Functionality
    document.addEventListener('DOMContentLoaded', function() {
        const filterButtons = document.querySelectorAll('.filter-btn');
        const galleryItems = document.querySelectorAll('.gallery-item');

        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                const filter = this.getAttribute('data-filter');

                // Update active button
                filterButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');

                // Filter gallery items
                galleryItems.forEach(item => {
                    if (filter === '*' || item.classList.contains(filter.substring(1))) {
                        item.classList.remove('hidden');
                    } else {
                        item.classList.add('hidden');
                    }
                });
            });
        });
    });
</script>