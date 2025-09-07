<?php get_header(); ?>

<?php while (have_posts()): the_post(); ?>

    <!-- Page Header -->
    <section class="page-header bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb" class="mb-3">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>
                            <?php
                            // Get parent pages for breadcrumb
                            $ancestors = get_post_ancestors(get_the_ID());
                            if ($ancestors) {
                                $ancestors = array_reverse($ancestors);
                                foreach ($ancestors as $ancestor) {
                                    echo '<li class="breadcrumb-item"><a href="' . get_permalink($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                                }
                            }
                            ?>
                            <li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
                        </ol>
                    </nav>

                    <!-- Page Title -->
                    <h1 class="page-title h2 fw-bold text-dark mb-0"><?php the_title(); ?></h1>

                    <?php if (has_excerpt()): ?>
                        <p class="page-subtitle lead text-muted mt-3 mb-0">
                            <?php echo get_the_excerpt(); ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <!-- Featured Image -->
                    <?php if (has_post_thumbnail()): ?>
                        <div class="page-featured-image mb-5" data-aos="fade-up">
                            <?php the_post_thumbnail('large', array('class' => 'img-fluid rounded shadow')); ?>
                        </div>
                    <?php endif; ?>

                    <!-- Page Content -->
                    <div class="page-content" data-aos="fade-up" data-aos-delay="200">
                        <?php
                        the_content();

                        // Page pagination for multi-page content
                        wp_link_pages(array(
                            'before' => '<div class="page-links mt-4"><span class="page-links-title fw-bold">' . __('Pages:', 'wizcraftpro') . '</span>',
                            'after' => '</div>',
                            'link_before' => '<span class="page-number">',
                            'link_after' => '</span>',
                            'pagelink' => '<span class="screen-reader-text">' . __('Page', 'wizcraftpro') . ' </span>%',
                            'separator' => '<span class="screen-reader-text">, </span>',
                        ));
                        ?>
                    </div>

                    <!-- Child Pages -->
                    <?php
                    $child_pages = get_children(array(
                        'post_parent' => get_the_ID(),
                        'post_type' => 'page',
                        'post_status' => 'publish',
                        'orderby' => 'menu_order',
                        'order' => 'ASC'
                    ));

                    if ($child_pages):
                    ?>
                        <div class="child-pages mt-5 pt-4 border-top" data-aos="fade-up" data-aos-delay="400">
                            <h3 class="child-pages-title h4 fw-bold mb-4">
                                <i class="fas fa-folder-open text-orange me-2"></i>
                                Related Pages
                            </h3>
                            <div class="row">
                                <?php foreach ($child_pages as $child): ?>
                                    <div class="col-lg-4 col-md-6 mb-4">
                                        <div class="child-page-card h-100">
                                            <?php if (has_post_thumbnail($child->ID)): ?>
                                                <div class="child-page-image mb-3">
                                                    <a href="<?php echo get_permalink($child->ID); ?>">
                                                        <?php echo get_the_post_thumbnail($child->ID, 'medium', array('class' => 'img-fluid rounded')); ?>
                                                    </a>
                                                </div>
                                            <?php endif; ?>

                                            <div class="child-page-content">
                                                <h4 class="child-page-title h5 fw-bold mb-2">
                                                    <a href="<?php echo get_permalink($child->ID); ?>" class="text-decoration-none text-dark">
                                                        <?php echo $child->post_title; ?>
                                                    </a>
                                                </h4>

                                                <?php if ($child->post_excerpt): ?>
                                                    <p class="child-page-excerpt text-muted mb-3">
                                                        <?php echo wp_trim_words($child->post_excerpt, 15); ?>
                                                    </p>
                                                <?php else: ?>
                                                    <p class="child-page-excerpt text-muted mb-3">
                                                        <?php echo wp_trim_words($child->post_content, 15); ?>
                                                    </p>
                                                <?php endif; ?>

                                                <a href="<?php echo get_permalink($child->ID); ?>" class="child-page-link fw-medium text-orange">
                                                    Learn More <i class="fas fa-arrow-right ms-1"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Contact CTA Section (for specific pages) -->
                    <?php if (is_page(array('about', 'services', 'corporate-events', 'brand-communication'))): ?>
                        <div class="page-cta mt-5 pt-4 border-top" data-aos="fade-up" data-aos-delay="600">
                            <div class="row justify-content-center">
                                <div class="col-lg-8 text-center">
                                    <div class="cta-content bg-light p-5 rounded">
                                        <h3 class="cta-title h4 fw-bold mb-3">
                                            Ready to Get Started?
                                        </h3>
                                        <p class="cta-description text-muted mb-4">
                                            Let's discuss how we can help bring your vision to life with our professional event management and brand communication services.
                                        </p>
                                        <div class="cta-buttons">
                                            <a href="<?php echo home_url('/contact'); ?>" class="btn btn-primary btn-lg me-3">
                                                <i class="fas fa-envelope me-2"></i>
                                                Get in Touch
                                            </a>
                                            <?php if (get_theme_mod('company_phone')): ?>
                                                <a href="tel:<?php echo esc_attr(get_theme_mod('company_phone')); ?>" class="btn btn-outline-primary btn-lg">
                                                    <i class="fas fa-phone me-2"></i>
                                                    Call Now
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Social Share -->
                    <div class="page-share mt-5 pt-4 border-top" data-aos="fade-up" data-aos-delay="800">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h6 class="fw-bold mb-md-0 mb-3">
                                    <i class="fas fa-share-alt text-orange me-2"></i>
                                    Share This Page
                                </h6>
                            </div>
                            <div class="col-md-6 text-md-end">
                                <div class="share-buttons">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>"
                                        target="_blank"
                                        class="btn btn-sm btn-outline-primary me-2">
                                        <i class="fab fa-facebook-f me-1"></i>
                                        Facebook
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>"
                                        target="_blank"
                                        class="btn btn-sm btn-outline-info me-2">
                                        <i class="fab fa-twitter me-1"></i>
                                        Twitter
                                    </a>
                                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink()); ?>&title=<?php echo urlencode(get_the_title()); ?>"
                                        target="_blank"
                                        class="btn btn-sm btn-outline-primary me-2">
                                        <i class="fab fa-linkedin-in me-1"></i>
                                        LinkedIn
                                    </a>
                                    <button onclick="navigator.share ? navigator.share({title: '<?php echo esc_js(get_the_title()); ?>', url: '<?php echo get_permalink(); ?>'}) : copyToClipboard('<?php echo get_permalink(); ?>')"
                                        class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-link me-1"></i>
                                        Share Link
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <script>
        function copyToClipboard(url) {
            navigator.clipboard.writeText(url).then(function() {
                // Show success message
                const button = event.target.closest('button');
                const originalText = button.innerHTML;
                button.innerHTML = '<i class="fas fa-check me-1"></i>Copied!';
                setTimeout(() => {
                    button.innerHTML = originalText;
                }, 2000);
            });
        }
    </script>

    <style>
        .page-featured-image img {
            object-fit: cover;
            width: 100%;
            height: auto;
            max-height: 500px;
        }

        .page-content {
            font-size: 1.1rem;
            line-height: 1.8;
        }

        .page-content h2,
        .page-content h3,
        .page-content h4 {
            margin-top: 2.5rem;
            margin-bottom: 1.5rem;
            color: #2c3e50;
        }

        .page-content h2:first-child,
        .page-content h3:first-child,
        .page-content h4:first-child {
            margin-top: 0;
        }

        .page-content p {
            margin-bottom: 1.5rem;
        }

        .page-content blockquote {
            border-left: 4px solid var(--wizcraft-orange);
            padding-left: 1.5rem;
            margin: 2rem 0;
            font-style: italic;
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 0.25rem;
        }

        .page-links {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid #dee2e6;
        }

        .page-links .page-number {
            display: inline-block;
            padding: 0.5rem 0.75rem;
            margin: 0 0.25rem;
            background: #f8f9fa;
            border-radius: 0.25rem;
            text-decoration: none;
            color: #495057;
            transition: all 0.3s ease;
        }

        .page-links .page-number:hover {
            background: var(--wizcraft-orange);
            color: white;
        }

        .child-page-card {
            background: white;
            border: 1px solid #e9ecef;
            border-radius: 0.5rem;
            padding: 1.5rem;
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .child-page-card:hover {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
        }

        .child-page-title a:hover {
            color: var(--wizcraft-orange) !important;
        }

        .child-page-link {
            text-decoration: none;
            margin-top: auto;
        }

        .child-page-link:hover {
            color: var(--wizcraft-orange-dark) !important;
        }

        .cta-content {
            border: 2px solid #e9ecef;
        }

        .share-buttons .btn {
            transition: all 0.3s ease;
        }

        .share-buttons .btn:hover {
            transform: translateY(-1px);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .page-content {
                font-size: 1rem;
            }

            .child-page-card {
                margin-bottom: 1.5rem;
            }

            .cta-buttons .btn {
                margin-bottom: 0.5rem;
            }
        }
    </style>

<?php endwhile; ?>

<?php get_footer(); ?>