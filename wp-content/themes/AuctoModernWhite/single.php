<?php

/**
 * Template for displaying single posts
 *
 * @package AuctoModernWhite
 * @version 2.0
 */

get_header(); ?>

<main id="main-content" class="single-post-page">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <?php while (have_posts()) : the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class('single-post-article'); ?>>

                        <!-- Post Header -->
                        <header class="post-header mb-4" data-aos="fade-up">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="post-featured-image mb-4">
                                    <?php the_post_thumbnail('large', array('class' => 'img-fluid rounded')); ?>
                                </div>
                            <?php endif; ?>

                            <h1 class="post-title h2 mb-3"><?php the_title(); ?></h1>

                            <div class="post-meta d-flex flex-wrap align-items-center gap-3 mb-4">
                                <span class="meta-item">
                                    <i class="fas fa-calendar-alt me-2"></i>
                                    <?php echo get_the_date(); ?>
                                </span>

                                <span class="meta-item">
                                    <i class="fas fa-user me-2"></i>
                                    <?php echo get_the_author(); ?>
                                </span>

                                <?php if (has_category()) : ?>
                                    <span class="meta-item">
                                        <i class="fas fa-folder me-2"></i>
                                        <?php the_category(', '); ?>
                                    </span>
                                <?php endif; ?>

                                <?php if (has_tag()) : ?>
                                    <span class="meta-item">
                                        <i class="fas fa-tags me-2"></i>
                                        <?php the_tags('', ', '); ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </header>

                        <!-- Post Content -->
                        <div class="post-content" data-aos="fade-up" data-aos-delay="100">
                            <?php the_content(); ?>

                            <?php
                            wp_link_pages(array(
                                'before' => '<div class="page-links mt-4"><span class="page-links-title">Pages:</span>',
                                'after'  => '</div>',
                            ));
                            ?>
                        </div>

                        <!-- Post Footer -->
                        <footer class="post-footer mt-5 pt-4 border-top" data-aos="fade-up" data-aos-delay="200">
                            <?php if (has_tag()) : ?>
                                <div class="post-tags mb-3">
                                    <h6 class="mb-2">Tags:</h6>
                                    <?php the_tags('<div class="tag-list">', '', '</div>'); ?>
                                </div>
                            <?php endif; ?>

                            <!-- Share Buttons -->
                            <div class="social-share">
                                <h6 class="mb-3">Share this post:</h6>
                                <div class="share-buttons d-flex gap-2">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>"
                                        target="_blank"
                                        class="btn btn-outline-primary btn-sm">
                                        <i class="fab fa-facebook-f me-1"></i> Facebook
                                    </a>

                                    <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>"
                                        target="_blank"
                                        class="btn btn-outline-info btn-sm">
                                        <i class="fab fa-twitter me-1"></i> Twitter
                                    </a>

                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(get_permalink()); ?>"
                                        target="_blank"
                                        class="btn btn-outline-primary btn-sm">
                                        <i class="fab fa-linkedin-in me-1"></i> LinkedIn
                                    </a>

                                    <a href="mailto:?subject=<?php echo urlencode(get_the_title()); ?>&body=<?php echo urlencode(get_permalink()); ?>"
                                        class="btn btn-outline-secondary btn-sm">
                                        <i class="fas fa-envelope me-1"></i> Email
                                    </a>
                                </div>
                            </div>
                        </footer>

                    </article>

                    <!-- Post Navigation -->
                    <nav class="post-navigation mt-5" data-aos="fade-up" data-aos-delay="300">
                        <div class="nav-links d-flex justify-content-between">
                            <?php
                            $prev_post = get_previous_post();
                            $next_post = get_next_post();
                            ?>

                            <div class="nav-previous">
                                <?php if ($prev_post) : ?>
                                    <a href="<?php echo get_permalink($prev_post); ?>" class="btn btn-outline-secondary">
                                        <i class="fas fa-chevron-left me-2"></i>
                                        <span class="nav-text">
                                            <small class="d-block text-muted">Previous Post</small>
                                            <?php echo wp_trim_words($prev_post->post_title, 6); ?>
                                        </span>
                                    </a>
                                <?php endif; ?>
                            </div>

                            <div class="nav-next">
                                <?php if ($next_post) : ?>
                                    <a href="<?php echo get_permalink($next_post); ?>" class="btn btn-outline-secondary">
                                        <span class="nav-text text-end">
                                            <small class="d-block text-muted">Next Post</small>
                                            <?php echo wp_trim_words($next_post->post_title, 6); ?>
                                        </span>
                                        <i class="fas fa-chevron-right ms-2"></i>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </nav>

                    <!-- Comments Section -->
                    <?php if (comments_open() || get_comments_number()) : ?>
                        <section class="comments-section mt-5" data-aos="fade-up" data-aos-delay="400">
                            <?php comments_template(); ?>
                        </section>
                    <?php endif; ?>

                <?php endwhile; ?>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <aside class="sidebar ps-lg-4" data-aos="fade-left" data-aos-delay="200">

                    <!-- Back to Home -->
                    <div class="widget mb-4">
                        <a href="<?php echo home_url(); ?>" class="btn btn-primary w-100">
                            <i class="fas fa-home me-2"></i>
                            Back to Home
                        </a>
                    </div>

                    <!-- Recent Posts -->
                    <div class="widget recent-posts mb-4">
                        <h5 class="widget-title mb-3">Recent Posts</h5>
                        <?php
                        $recent_posts = wp_get_recent_posts(array(
                            'numberposts' => 5,
                            'post_status' => 'publish'
                        ));

                        if ($recent_posts) :
                        ?>
                            <ul class="list-unstyled">
                                <?php foreach ($recent_posts as $recent) : ?>
                                    <li class="mb-3">
                                        <a href="<?php echo get_permalink($recent['ID']); ?>"
                                            class="text-decoration-none">
                                            <h6 class="mb-1"><?php echo $recent['post_title']; ?></h6>
                                            <small class="text-muted">
                                                <?php echo date('F j, Y', strtotime($recent['post_date'])); ?>
                                            </small>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>

                    <!-- Categories -->
                    <?php
                    $categories = get_categories(array('hide_empty' => true));
                    if ($categories) :
                    ?>
                        <div class="widget categories mb-4">
                            <h5 class="widget-title mb-3">Categories</h5>
                            <ul class="list-unstyled">
                                <?php foreach ($categories as $category) : ?>
                                    <li class="mb-2">
                                        <a href="<?php echo get_category_link($category->term_id); ?>"
                                            class="text-decoration-none d-flex justify-content-between">
                                            <span><?php echo $category->name; ?></span>
                                            <span class="badge bg-secondary"><?php echo $category->count; ?></span>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                </aside>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>