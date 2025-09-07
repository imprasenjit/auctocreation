<?php get_header(); ?>

<section class="error-section section-padding bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="error-content" data-aos="fade-up">
                    <!-- Error Icon -->
                    <div class="error-icon mb-4">
                        <i class="fas fa-exclamation-triangle text-orange display-1"></i>
                    </div>

                    <!-- Error Code -->
                    <div class="error-code mb-4">
                        <span class="display-1 fw-bold text-primary">404</span>
                    </div>

                    <!-- Error Message -->
                    <h1 class="error-title h2 fw-bold mb-4">Page Not Found</h1>
                    <p class="error-description lead text-muted mb-5">
                        Sorry, the page you are looking for doesn't exist or has been moved.
                        Let's get you back on track.
                    </p>

                    <!-- Search Form -->
                    <div class="error-search mb-5">
                        <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
                            <div class="input-group input-group-lg justify-content-center">
                                <input type="search" class="form-control search-field" placeholder="Search our site..." value="<?php echo get_search_query(); ?>" name="s" style="max-width: 400px;">
                                <button type="submit" class="btn btn-primary search-submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Action Buttons -->
                    <div class="error-actions">
                        <a href="<?php echo home_url(); ?>" class="btn btn-primary btn-lg me-3">
                            <i class="fas fa-home me-2"></i>
                            Go Home
                        </a>
                        <a href="<?php echo home_url('/contact'); ?>" class="btn btn-outline-primary btn-lg">
                            <i class="fas fa-envelope me-2"></i>
                            Contact Us
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Helpful Links -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="helpful-links text-center" data-aos="fade-up" data-aos-delay="200">
                    <h4 class="mb-4">You might be looking for:</h4>
                    <div class="row justify-content-center">
                        <div class="col-lg-3 col-md-6 mb-3">
                            <a href="<?php echo home_url('/corporate-events'); ?>" class="help-link-card">
                                <i class="fas fa-building text-orange mb-2"></i>
                                <div class="fw-medium">Corporate Events</div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <a href="<?php echo home_url('/virtual-events'); ?>" class="help-link-card">
                                <i class="fas fa-video text-orange mb-2"></i>
                                <div class="fw-medium">Virtual Events</div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <a href="<?php echo home_url('/brand-communication'); ?>" class="help-link-card">
                                <i class="fas fa-bullhorn text-orange mb-2"></i>
                                <div class="fw-medium">Brand Communication</div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <a href="<?php echo home_url('/about'); ?>" class="help-link-card">
                                <i class="fas fa-info-circle text-orange mb-2"></i>
                                <div class="fw-medium">About Us</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Posts -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="recent-posts" data-aos="fade-up" data-aos-delay="400">
                    <h4 class="text-center mb-4">Latest Updates</h4>
                    <div class="row">
                        <?php
                        $recent_posts = wp_get_recent_posts(array(
                            'numberposts' => 3,
                            'post_status' => 'publish'
                        ));

                        if ($recent_posts):
                            foreach ($recent_posts as $post):
                        ?>
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="recent-post-card">
                                        <h5 class="recent-post-title">
                                            <a href="<?php echo get_permalink($post['ID']); ?>"><?php echo $post['post_title']; ?></a>
                                        </h5>
                                        <p class="recent-post-excerpt text-muted">
                                            <?php echo wp_trim_words($post['post_content'], 15); ?>
                                        </p>
                                        <a href="<?php echo get_permalink($post['ID']); ?>" class="recent-post-link">
                                            Read More <i class="fas fa-arrow-right ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            <?php
                            endforeach;
                        else:
                            ?>
                            <div class="col-12 text-center">
                                <p class="text-muted">No recent posts available.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .help-link-card {
        display: block;
        padding: 1.5rem 1rem;
        background: white;
        border-radius: 0.5rem;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        text-decoration: none;
        color: inherit;
        transition: all 0.3s ease;
        border: 1px solid #e9ecef;
    }

    .help-link-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        color: inherit;
        text-decoration: none;
    }

    .help-link-card i {
        font-size: 2rem;
        display: block;
    }

    .recent-post-card {
        background: white;
        padding: 1.5rem;
        border-radius: 0.5rem;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .recent-post-title a {
        color: #2c3e50;
        text-decoration: none;
        font-size: 1.1rem;
    }

    .recent-post-title a:hover {
        color: var(--wizcraft-orange);
    }

    .recent-post-link {
        color: var(--wizcraft-orange);
        text-decoration: none;
        font-weight: 500;
        margin-top: auto;
        font-size: 0.9rem;
    }

    .recent-post-link:hover {
        color: var(--wizcraft-orange-dark);
        text-decoration: none;
    }

    .search-field {
        border-right: none;
    }

    .search-field:focus {
        box-shadow: none;
        border-color: var(--wizcraft-orange);
    }

    .search-submit {
        border-left: none;
    }
</style>

<?php get_footer(); ?>