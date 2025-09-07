<?php

/**
 * Template for displaying search results
 *
 * @package AuctoModernWhite
 * @version 2.0
 */

get_header(); ?>

<main id="main-content" class="search-page">
    <div class="container py-5">

        <!-- Search Header -->
        <div class="row">
            <div class="col-12 text-center mb-5" data-aos="fade-up">
                <h1 class="display-4 mb-3">Search Results</h1>
                <?php if (have_posts()) : ?>
                    <p class="lead text-muted">
                        Found <?php echo $wp_query->found_posts; ?> result(s) for:
                        <strong>"<?php echo get_search_query(); ?>"</strong>
                    </p>
                <?php else : ?>
                    <p class="lead text-muted">
                        No results found for: <strong>"<?php echo get_search_query(); ?>"</strong>
                    </p>
                <?php endif; ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">

                <?php if (have_posts()) : ?>

                    <!-- Search Results -->
                    <div class="search-results">
                        <?php
                        $delay = 0;
                        while (have_posts()) : the_post();
                        ?>
                            <article id="post-<?php the_ID(); ?>"
                                <?php post_class('search-result mb-4 p-4 bg-light rounded'); ?>
                                data-aos="fade-up"
                                data-aos-delay="<?php echo $delay; ?>">

                                <div class="row">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="col-md-3 mb-3 mb-md-0">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('medium', array('class' => 'img-fluid rounded')); ?>
                                            </a>
                                        </div>
                                        <div class="col-md-9">
                                        <?php else : ?>
                                            <div class="col-12">
                                            <?php endif; ?>

                                            <div class="search-result-content">
                                                <h3 class="result-title h5 mb-2">
                                                    <a href="<?php the_permalink(); ?>" class="text-decoration-none">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </h3>

                                                <div class="result-meta mb-2">
                                                    <small class="text-muted">
                                                        <i class="fas fa-calendar-alt me-1"></i>
                                                        <?php echo get_the_date(); ?>

                                                        <span class="mx-2">|</span>

                                                        <i class="fas fa-user me-1"></i>
                                                        <?php echo get_the_author(); ?>

                                                        <?php if (get_post_type() !== 'post') : ?>
                                                            <span class="mx-2">|</span>
                                                            <i class="fas fa-file me-1"></i>
                                                            <?php echo get_post_type(); ?>
                                                        <?php endif; ?>
                                                    </small>
                                                </div>

                                                <div class="result-excerpt mb-3">
                                                    <?php
                                                    $excerpt = get_the_excerpt();
                                                    $search_query = get_search_query();

                                                    if ($search_query) {
                                                        $excerpt = wp_trim_words($excerpt, 30);
                                                        // Highlight search terms
                                                        $excerpt = preg_replace('/(' . preg_quote($search_query, '/') . ')/i', '<mark>$1</mark>', $excerpt);
                                                    }

                                                    echo $excerpt;
                                                    ?>
                                                </div>

                                                <a href="<?php the_permalink(); ?>"
                                                    class="btn btn-outline-primary btn-sm">
                                                    Read More <i class="fas fa-arrow-right ms-1"></i>
                                                </a>
                                            </div>
                                            </div>
                                        </div>
                            </article>
                        <?php
                            $delay += 100;
                            if ($delay > 300) $delay = 0;
                        endwhile;
                        ?>
                    </div>

                    <!-- Pagination -->
                    <div class="search-pagination mt-4" data-aos="fade-up">
                        <?php
                        the_posts_pagination(array(
                            'mid_size' => 2,
                            'prev_text' => '<i class="fas fa-chevron-left"></i> Previous',
                            'next_text' => 'Next <i class="fas fa-chevron-right"></i>',
                            'class' => 'pagination justify-content-center'
                        ));
                        ?>
                    </div>

                <?php else : ?>

                    <!-- No Results -->
                    <div class="no-results text-center py-5" data-aos="fade-up">
                        <i class="fas fa-search fa-3x text-muted mb-4"></i>
                        <h3 class="mb-3">No results found</h3>
                        <p class="text-muted mb-4">
                            Sorry, but nothing matched your search terms. Please try again with some different keywords.
                        </p>

                        <!-- Search Suggestions -->
                        <div class="search-suggestions mb-4">
                            <h5>Search Suggestions:</h5>
                            <ul class="list-unstyled">
                                <li>• Check your spelling</li>
                                <li>• Try different keywords</li>
                                <li>• Try more general keywords</li>
                                <li>• Try fewer keywords</li>
                            </ul>
                        </div>

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

                    <!-- Search Again Widget -->
                    <div class="widget search-widget mb-4">
                        <h5 class="widget-title mb-3">Search Again</h5>
                        <form role="search" method="get" action="<?php echo home_url('/'); ?>">
                            <div class="input-group">
                                <input type="search"
                                    class="form-control"
                                    placeholder="Enter keywords..."
                                    value="<?php echo get_search_query(); ?>"
                                    name="s">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Popular Categories -->
                    <?php
                    $categories = get_categories(array(
                        'orderby' => 'count',
                        'order' => 'DESC',
                        'number' => 5,
                        'hide_empty' => true
                    ));

                    if ($categories) :
                    ?>
                        <div class="widget popular-categories mb-4">
                            <h5 class="widget-title mb-3">Popular Categories</h5>
                            <div class="d-flex flex-wrap gap-2">
                                <?php foreach ($categories as $category) : ?>
                                    <a href="<?php echo get_category_link($category->term_id); ?>"
                                        class="btn btn-outline-secondary btn-sm">
                                        <?php echo $category->name; ?>
                                        <span class="badge bg-secondary ms-1"><?php echo $category->count; ?></span>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>

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

                    <!-- Back to Home -->
                    <div class="widget">
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