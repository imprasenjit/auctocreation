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
                            <li class="breadcrumb-item"><a href="<?php echo get_permalink(get_option('page_for_posts')); ?>">News & Media</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
                        </ol>
                    </nav>

                    <!-- Post Meta -->
                    <div class="post-meta mb-3">
                        <span class="post-date me-3">
                            <i class="far fa-calendar text-orange me-1"></i>
                            <?php echo get_the_date(); ?>
                        </span>
                        <span class="post-author me-3">
                            <i class="far fa-user text-orange me-1"></i>
                            <?php the_author(); ?>
                        </span>
                        <span class="post-category">
                            <i class="far fa-folder text-orange me-1"></i>
                            <?php the_category(', '); ?>
                        </span>
                    </div>

                    <!-- Post Title -->
                    <h1 class="page-title h2 fw-bold text-dark mb-0"><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Main Content Column -->
                <div class="col-lg-8">
                    <article id="post-<?php the_ID(); ?>" <?php post_class('blog-post-single'); ?>>

                        <!-- Featured Image -->
                        <?php if (has_post_thumbnail()): ?>
                            <div class="post-featured-image mb-4">
                                <?php the_post_thumbnail('large', array('class' => 'img-fluid rounded')); ?>
                            </div>
                        <?php endif; ?>

                        <!-- Post Content -->
                        <div class="post-content">
                            <?php
                            the_content();

                            // Page pagination for multi-page posts
                            wp_link_pages(array(
                                'before' => '<div class="page-links mt-4"><span class="page-links-title">' . __('Pages:', 'wizcraftpro') . '</span>',
                                'after' => '</div>',
                                'link_before' => '<span>',
                                'link_after' => '</span>',
                                'pagelink' => '<span class="screen-reader-text">' . __('Page', 'wizcraftpro') . ' </span>%',
                                'separator' => '<span class="screen-reader-text">, </span>',
                            ));
                            ?>
                        </div>

                        <!-- Post Tags -->
                        <?php if (has_tag()): ?>
                            <div class="post-tags mt-4 pt-4 border-top">
                                <h6 class="fw-bold mb-3">
                                    <i class="fas fa-tags text-orange me-2"></i>
                                    Tags
                                </h6>
                                <div class="tag-list">
                                    <?php the_tags('', '', ''); ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- Social Share -->
                        <div class="post-share mt-4 pt-4 border-top">
                            <h6 class="fw-bold mb-3">
                                <i class="fas fa-share-alt text-orange me-2"></i>
                                Share This Post
                            </h6>
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

                        <!-- Author Bio -->
                        <?php
                        $author_bio = get_the_author_meta('description');
                        if ($author_bio):
                        ?>
                            <div class="author-bio mt-5 p-4 bg-light rounded">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <?php echo get_avatar(get_the_author_meta('ID'), 80, '', '', array('class' => 'rounded-circle')); ?>
                                    </div>
                                    <div class="col">
                                        <h6 class="author-name fw-bold mb-2">
                                            About <?php the_author(); ?>
                                        </h6>
                                        <p class="author-description text-muted mb-0">
                                            <?php echo wp_kses_post($author_bio); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- Post Navigation -->
                        <nav class="post-navigation mt-5 pt-4 border-top">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <?php
                                    $prev_post = get_previous_post();
                                    if ($prev_post):
                                    ?>
                                        <div class="nav-previous">
                                            <div class="nav-label text-muted small mb-1">
                                                <i class="fas fa-chevron-left me-1"></i>
                                                Previous Post
                                            </div>
                                            <a href="<?php echo get_permalink($prev_post); ?>" class="nav-title fw-medium text-decoration-none">
                                                <?php echo wp_trim_words($prev_post->post_title, 8); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6 mb-3 text-md-end">
                                    <?php
                                    $next_post = get_next_post();
                                    if ($next_post):
                                    ?>
                                        <div class="nav-next">
                                            <div class="nav-label text-muted small mb-1">
                                                Next Post
                                                <i class="fas fa-chevron-right ms-1"></i>
                                            </div>
                                            <a href="<?php echo get_permalink($next_post); ?>" class="nav-title fw-medium text-decoration-none">
                                                <?php echo wp_trim_words($next_post->post_title, 8); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </nav>

                    </article>

                    <!-- Comments Section -->
                    <?php
                    if (comments_open() || get_comments_number()):
                        comments_template();
                    endif;
                    ?>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="blog-sidebar">

                        <!-- Recent Posts Widget -->
                        <div class="sidebar-widget mb-5">
                            <h5 class="widget-title fw-bold mb-4">
                                <i class="fas fa-clock text-orange me-2"></i>
                                Recent Posts
                            </h5>
                            <div class="recent-posts-list">
                                <?php
                                $recent_posts = wp_get_recent_posts(array(
                                    'numberposts' => 5,
                                    'post_status' => 'publish',
                                    'exclude' => array(get_the_ID())
                                ));

                                foreach ($recent_posts as $post):
                                ?>
                                    <div class="recent-post-item mb-3 pb-3 border-bottom">
                                        <h6 class="recent-post-title mb-2">
                                            <a href="<?php echo get_permalink($post['ID']); ?>" class="text-decoration-none">
                                                <?php echo wp_trim_words($post['post_title'], 8); ?>
                                            </a>
                                        </h6>
                                        <div class="recent-post-meta text-muted small">
                                            <i class="far fa-calendar me-1"></i>
                                            <?php echo get_the_date('', $post['ID']); ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- Categories Widget -->
                        <?php
                        $categories = get_categories(array('hide_empty' => true));
                        if ($categories):
                        ?>
                            <div class="sidebar-widget mb-5">
                                <h5 class="widget-title fw-bold mb-4">
                                    <i class="fas fa-folder text-orange me-2"></i>
                                    Categories
                                </h5>
                                <div class="categories-list">
                                    <?php foreach ($categories as $category): ?>
                                        <a href="<?php echo get_category_link($category->term_id); ?>"
                                            class="category-link d-flex justify-content-between align-items-center py-2 px-3 mb-2 bg-light rounded text-decoration-none">
                                            <span><?php echo $category->name; ?></span>
                                            <span class="badge bg-orange text-white"><?php echo $category->count; ?></span>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- Call to Action Widget -->
                        <div class="sidebar-widget mb-5">
                            <div class="cta-widget bg-primary text-white p-4 rounded">
                                <h5 class="widget-title fw-bold mb-3 text-white">
                                    <i class="fas fa-bullhorn me-2"></i>
                                    Need Professional Event Management?
                                </h5>
                                <p class="mb-3">
                                    Let us help you create extraordinary experiences for your next corporate event or brand campaign.
                                </p>
                                <a href="<?php echo home_url('/contact'); ?>" class="btn btn-light fw-medium">
                                    Get a Quote <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Tags Widget -->
                        <?php
                        $tags = get_tags(array('hide_empty' => true));
                        if ($tags):
                        ?>
                            <div class="sidebar-widget mb-5">
                                <h5 class="widget-title fw-bold mb-4">
                                    <i class="fas fa-tags text-orange me-2"></i>
                                    Popular Tags
                                </h5>
                                <div class="tags-cloud">
                                    <?php foreach ($tags as $tag): ?>
                                        <a href="<?php echo get_tag_link($tag->term_id); ?>"
                                            class="tag-item badge bg-light text-dark me-2 mb-2 text-decoration-none">
                                            <?php echo $tag->name; ?>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>

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
        .post-featured-image img {
            object-fit: cover;
            width: 100%;
            height: auto;
            max-height: 400px;
        }

        .post-content {
            font-size: 1.1rem;
            line-height: 1.8;
        }

        .post-content h2,
        .post-content h3,
        .post-content h4 {
            margin-top: 2rem;
            margin-bottom: 1rem;
        }

        .post-content p {
            margin-bottom: 1.5rem;
        }

        .tag-list .tag {
            display: inline-block;
            background: var(--wizcraft-orange);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            font-size: 0.875rem;
            text-decoration: none;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
        }

        .tag-list .tag:hover {
            background: var(--wizcraft-orange-dark);
            color: white;
            text-decoration: none;
        }

        .share-buttons .btn {
            transition: all 0.3s ease;
        }

        .share-buttons .btn:hover {
            transform: translateY(-1px);
        }

        .nav-title:hover {
            color: var(--wizcraft-orange) !important;
        }

        .recent-post-title a:hover {
            color: var(--wizcraft-orange);
        }

        .category-link:hover {
            background: var(--wizcraft-orange) !important;
            color: white !important;
        }

        .category-link:hover .badge {
            background: white !important;
            color: var(--wizcraft-orange) !important;
        }

        .tag-item:hover {
            background: var(--wizcraft-orange) !important;
            color: white !important;
        }

        .bg-orange {
            background-color: var(--wizcraft-orange) !important;
        }
    </style>

<?php endwhile; ?>

<?php get_footer(); ?>