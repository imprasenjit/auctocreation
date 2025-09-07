<?php

/**
 * The template for displaying all single posts
 */

get_header();
?>

<main id="main-content" class="single-post">

    <!-- Page Header -->
    <section class="page-header section section-alt">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php if (function_exists('yoast_breadcrumb') && !is_front_page()): ?>
                        <nav class="breadcrumb-nav mb-3">
                            <?php yoast_breadcrumb('<p id="breadcrumbs">', '</p>'); ?>
                        </nav>
                    <?php endif; ?>

                    <h1 class="page-title mb-0" data-aos="fade-up">
                        <?php the_title(); ?>
                    </h1>

                    <div class="post-meta mt-3" data-aos="fade-up" data-aos-delay="200">
                        <span class="meta-item me-4">
                            <i class="fas fa-calendar-alt me-2"></i>
                            <time datetime="<?php echo get_the_date('c'); ?>">
                                <?php echo get_the_date(); ?>
                            </time>
                        </span>

                        <span class="meta-item me-4">
                            <i class="fas fa-user me-2"></i>
                            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" class="text-decoration-none">
                                <?php the_author(); ?>
                            </a>
                        </span>

                        <?php if (get_the_category()): ?>
                            <span class="meta-item me-4">
                                <i class="fas fa-folder me-2"></i>
                                <?php the_category(', '); ?>
                            </span>
                        <?php endif; ?>

                        <?php if (get_the_tags()): ?>
                            <span class="meta-item">
                                <i class="fas fa-tags me-2"></i>
                                <?php the_tags('', ', '); ?>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="section">
        <div class="container">
            <div class="row">
                <!-- Post Content -->
                <div class="col-lg-8">
                    <?php while (have_posts()): the_post(); ?>
                        <article <?php post_class('modern-card mb-5'); ?> data-aos="fade-up">

                            <?php if (has_post_thumbnail()): ?>
                                <div class="post-featured-image mb-4">
                                    <?php the_post_thumbnail('large', array('class' => 'img-fluid rounded')); ?>

                                    <?php if (get_the_post_thumbnail_caption()): ?>
                                        <p class="image-caption text-muted mt-2 small">
                                            <?php echo get_the_post_thumbnail_caption(); ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>

                            <div class="post-content">
                                <?php
                                the_content();

                                wp_link_pages(array(
                                    'before' => '<div class="page-links mt-4"><span class="page-links-title">' . __('Pages:', 'auctocreation-modern') . '</span>',
                                    'after' => '</div>',
                                    'link_before' => '<span class="page-number">',
                                    'link_after' => '</span>',
                                ));
                                ?>
                            </div>

                            <!-- Post Footer -->
                            <footer class="post-footer mt-5 pt-4 border-top">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <?php if (get_the_tags()): ?>
                                            <div class="post-tags">
                                                <strong class="me-2">Tags:</strong>
                                                <?php
                                                $tags = get_the_tags();
                                                foreach ($tags as $tag):
                                                ?>
                                                    <a href="<?php echo get_tag_link($tag->term_id); ?>" class="badge bg-secondary text-decoration-none me-1">
                                                        <?php echo $tag->name; ?>
                                                    </a>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="col-md-6 text-md-end mt-3 mt-md-0">
                                        <div class="social-share">
                                            <strong class="me-2">Share:</strong>
                                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>"
                                                target="_blank"
                                                rel="noopener"
                                                class="btn btn-sm btn-outline-primary me-1">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                            <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>"
                                                target="_blank"
                                                rel="noopener"
                                                class="btn btn-sm btn-outline-info me-1">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                            <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(get_permalink()); ?>"
                                                target="_blank"
                                                rel="noopener"
                                                class="btn btn-sm btn-outline-primary me-1">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                            <a href="whatsapp://send?text=<?php echo urlencode(get_the_title() . ' - ' . get_permalink()); ?>"
                                                class="btn btn-sm btn-outline-success">
                                                <i class="fab fa-whatsapp"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </footer>
                        </article>

                        <!-- Author Bio -->
                        <?php if (get_the_author_meta('description')): ?>
                            <div class="author-bio modern-card mb-5" data-aos="fade-up">
                                <div class="row align-items-center">
                                    <div class="col-md-2 text-center mb-3 mb-md-0">
                                        <img src="<?php echo get_avatar_url(get_the_author_meta('ID'), 80); ?>"
                                            alt="<?php the_author(); ?>"
                                            class="rounded-circle author-avatar">
                                    </div>
                                    <div class="col-md-10">
                                        <h5 class="author-name mb-2">
                                            About <?php the_author(); ?>
                                        </h5>
                                        <p class="author-description text-muted mb-0">
                                            <?php echo get_the_author_meta('description'); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- Post Navigation -->
                        <nav class="post-navigation modern-card mb-5" data-aos="fade-up">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php
                                    $prev_post = get_previous_post();
                                    if ($prev_post):
                                    ?>
                                        <a href="<?php echo get_permalink($prev_post->ID); ?>" class="nav-link text-decoration-none">
                                            <div class="nav-direction">
                                                <i class="fas fa-chevron-left me-2"></i>Previous Post
                                            </div>
                                            <div class="nav-title"><?php echo get_the_title($prev_post->ID); ?></div>
                                        </a>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6 text-md-end">
                                    <?php
                                    $next_post = get_next_post();
                                    if ($next_post):
                                    ?>
                                        <a href="<?php echo get_permalink($next_post->ID); ?>" class="nav-link text-decoration-none">
                                            <div class="nav-direction">
                                                Next Post<i class="fas fa-chevron-right ms-2"></i>
                                            </div>
                                            <div class="nav-title"><?php echo get_the_title($next_post->ID); ?></div>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </nav>

                        <!-- Comments -->
                        <?php if (comments_open() || get_comments_number()): ?>
                            <div class="comments-section modern-card" data-aos="fade-up">
                                <?php comments_template(); ?>
                            </div>
                        <?php endif; ?>

                    <?php endwhile; ?>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <aside class="sidebar">
                        <?php if (is_active_sidebar('blog-sidebar')): ?>
                            <?php dynamic_sidebar('blog-sidebar'); ?>
                        <?php else: ?>
                            <!-- Default Sidebar Content -->
                            <div class="modern-card mb-4" data-aos="fade-up">
                                <h5>Recent Posts</h5>
                                <?php
                                $recent_posts = wp_get_recent_posts(array(
                                    'numberposts' => 5,
                                    'post_status' => 'publish'
                                ));

                                if ($recent_posts):
                                ?>
                                    <ul class="list-unstyled">
                                        <?php foreach ($recent_posts as $recent): ?>
                                            <li class="mb-3 pb-3 border-bottom">
                                                <a href="<?php echo get_permalink($recent['ID']); ?>" class="text-decoration-none">
                                                    <h6 class="mb-1"><?php echo $recent['post_title']; ?></h6>
                                                    <small class="text-muted">
                                                        <i class="fas fa-calendar-alt me-1"></i>
                                                        <?php echo get_the_date('', $recent['ID']); ?>
                                                    </small>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>

                            <div class="modern-card mb-4" data-aos="fade-up" data-aos-delay="200">
                                <h5>Categories</h5>
                                <ul class="list-unstyled">
                                    <?php
                                    $categories = get_categories();
                                    foreach ($categories as $category):
                                    ?>
                                        <li class="mb-2">
                                            <a href="<?php echo get_category_link($category->term_id); ?>" class="text-decoration-none d-flex justify-content-between">
                                                <span><?php echo $category->name; ?></span>
                                                <span class="badge bg-secondary"><?php echo $category->count; ?></span>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                            <div class="modern-card" data-aos="fade-up" data-aos-delay="400">
                                <h5>Get In Touch</h5>
                                <p class="mb-3">Interested in our event management services?</p>
                                <a href="#contact" class="btn btn-primary w-100">Contact Us</a>
                            </div>
                        <?php endif; ?>
                    </aside>
                </div>
            </div>
        </div>
    </section>
</main>

<style>
    .post-meta .meta-item {
        color: var(--gray);
        font-size: 0.875rem;
    }

    .post-meta a {
        color: var(--gray);
        transition: color 0.3s ease;
    }

    .post-meta a:hover {
        color: var(--accent-color);
    }

    .post-content {
        line-height: 1.8;
    }

    .post-content h2,
    .post-content h3,
    .post-content h4,
    .post-content h5,
    .post-content h6 {
        margin-top: 2rem;
        margin-bottom: 1rem;
    }

    .post-content p {
        margin-bottom: 1.5rem;
    }

    .post-content img {
        max-width: 100%;
        height: auto;
        border-radius: var(--border-radius);
    }

    .image-caption {
        text-align: center;
        font-style: italic;
    }

    .social-share .btn {
        border-radius: 50%;
        width: 35px;
        height: 35px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0;
    }

    .author-bio {
        background: var(--light-gray);
        border-left: 4px solid var(--accent-color);
    }

    .author-avatar {
        width: 80px;
        height: 80px;
    }

    .post-navigation .nav-link {
        display: block;
        padding: 1rem;
        border-radius: var(--border-radius);
        background: var(--light-gray);
        transition: background 0.3s ease;
        color: var(--primary-color);
    }

    .post-navigation .nav-link:hover {
        background: var(--accent-color);
        color: white;
    }

    .nav-direction {
        font-size: 0.875rem;
        opacity: 0.8;
        margin-bottom: 0.5rem;
    }

    .nav-title {
        font-weight: 600;
    }

    @media (max-width: 768px) {
        .post-navigation .col-md-6:first-child {
            margin-bottom: 1rem;
        }

        .social-share {
            text-align: center !important;
        }

        .post-tags {
            text-align: center;
            margin-bottom: 1rem;
        }
    }
</style>

<?php get_footer(); ?>