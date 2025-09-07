<?php

/**
 * Template for displaying archive pages
 *
 * @package AuctoModernWhite
 * @version 2.0
 */

get_header(); ?>

<main id="main-content" class="archive-page">
    <div class="container py-5">

        <!-- Archive Header -->
        <div class="row">
            <div class="col-12 text-center mb-5" data-aos="fade-up">
                <h1 class="display-4 mb-3">
                    <?php
                    if (is_category()) {
                        echo 'Category: ' . single_cat_title('', false);
                    } elseif (is_tag()) {
                        echo 'Tag: ' . single_tag_title('', false);
                    } elseif (is_date()) {
                        echo 'Archive: ' . get_the_date('F Y');
                    } elseif (is_author()) {
                        echo 'Author: ' . get_the_author();
                    } else {
                        echo 'Archives';
                    }
                    ?>
                </h1>

                <?php if (is_category() && category_description()) : ?>
                    <div class="archive-description lead text-muted">
                        <?php echo category_description(); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Posts Grid -->
        <div class="row">
            <div class="col-lg-8">
                <?php if (have_posts()) : ?>
                    <div class="row">
                        <?php
                        $delay = 0;
                        while (have_posts()) : the_post();
                        ?>
                            <div class="col-md-6 mb-4" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                                <article id="post-<?php the_ID(); ?>" <?php post_class('post-card h-100'); ?>>

                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="post-thumbnail mb-3">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('medium', array('class' => 'img-fluid rounded')); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>

                                    <div class="post-content">
                                        <h3 class="post-title h5 mb-2">
                                            <a href="<?php the_permalink(); ?>" class="text-decoration-none">
                                                <?php the_title(); ?>
                                            </a>
                                        </h3>

                                        <div class="post-meta mb-2">
                                            <small class="text-muted">
                                                <i class="fas fa-calendar-alt me-1"></i>
                                                <?php echo get_the_date(); ?>

                                                <span class="mx-2">|</span>

                                                <i class="fas fa-user me-1"></i>
                                                <?php echo get_the_author(); ?>
                                            </small>
                                        </div>

                                        <div class="post-excerpt">
                                            <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                                        </div>

                                        <a href="<?php the_permalink(); ?>"
                                            class="btn btn-outline-primary btn-sm mt-3">
                                            Read More <i class="fas fa-arrow-right ms-1"></i>
                                        </a>
                                    </div>
                                </article>
                            </div>
                        <?php
                            $delay += 100;
                            if ($delay > 300) $delay = 0;
                        endwhile;
                        ?>
                    </div>

                    <!-- Pagination -->
                    <div class="row mt-4">
                        <div class="col-12" data-aos="fade-up">
                            <?php
                            the_posts_pagination(array(
                                'mid_size' => 2,
                                'prev_text' => '<i class="fas fa-chevron-left"></i> Previous',
                                'next_text' => 'Next <i class="fas fa-chevron-right"></i>',
                                'class' => 'pagination justify-content-center'
                            ));
                            ?>
                        </div>
                    </div>

                <?php else : ?>

                    <!-- No Posts Found -->
                    <div class="no-posts text-center py-5" data-aos="fade-up">
                        <i class="fas fa-search fa-3x text-muted mb-3"></i>
                        <h3>No posts found</h3>
                        <p class="text-muted mb-4">Sorry, no posts were found in this archive.</p>
                        <a href="<?php echo home_url(); ?>" class="btn btn-primary">
                            <i class="fas fa-home me-2"></i>
                            Back to Home
                        </a>
                    </div>

                <?php endif; ?>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <aside class="sidebar ps-lg-4" data-aos="fade-left" data-aos-delay="200">

                    <!-- Search Widget -->
                    <div class="widget search-widget mb-4">
                        <h5 class="widget-title mb-3">Search</h5>
                        <form role="search" method="get" action="<?php echo home_url('/'); ?>">
                            <div class="input-group">
                                <input type="search"
                                    class="form-control"
                                    placeholder="Search posts..."
                                    value="<?php echo get_search_query(); ?>"
                                    name="s">
                                <button class="btn btn-outline-secondary" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Categories Widget -->
                    <?php
                    $categories = get_categories(array('hide_empty' => true));
                    if ($categories) :
                    ?>
                        <div class="widget categories-widget mb-4">
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

                    <!-- Recent Posts Widget -->
                    <div class="widget recent-posts-widget mb-4">
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

                    <!-- Back to Home -->
                    <div class="widget mb-4">
                        <a href="<?php echo home_url(); ?>" class="btn btn-primary w-100">
                            <i class="fas fa-home me-2"></i>
                            Back to Home
                        </a>
                    </div>

                </aside>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>