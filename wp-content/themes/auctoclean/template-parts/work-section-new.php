<?php

/**
 * Template part for displaying our work section
 * Uses Pods data fetching with WordPress fallback
 */

// Get work data using Pods or fallback to standard WP
if (auctoclean_is_pods_active()) {
    $work = pods('work_portfolio', array(
        'limit' => 9,
        'orderby' => 'menu_order DESC, post_date DESC'
    ));
} else {
    $work_query = new WP_Query(array(
        'post_type' => 'work',
        'posts_per_page' => 9,
        'post_status' => 'publish',
        'orderby' => 'menu_order date',
        'order' => 'DESC'
    ));
}

// Get work categories for filtering (for both Pods and WP)
if (auctoclean_is_pods_active()) {
    // Get unique categories from Pods
    $work_categories = array();
    if (isset($work) && $work->total() > 0) {
        while ($work->fetch()) {
            $category = $work->field('project_category');
            if ($category && !in_array($category, $work_categories)) {
                $work_categories[] = $category;
            }
        }
        $work->reset();
    }
} else {
    // Get work categories for filtering
    $work_categories = get_terms(array(
        'taxonomy' => 'work_category',
        'hide_empty' => true
    ));
}
?>

<section id="work" class="section work-section bg-light">
    <div class="container">
        <div class="section-title text-center mb-5" data-aos="fade-up">
            <h2><?php echo get_theme_mod('work_title', __('Our Work', 'auctoclean')); ?></h2>
            <p class="section-subtitle"><?php echo get_theme_mod('work_subtitle', __('Take a look at some of our recent projects and successful events we have organized.', 'auctoclean')); ?></p>
        </div>

        <?php if (!empty($work_categories)) : ?>
            <!-- Filter Buttons -->
            <div class="work-filters text-center mb-5" data-aos="fade-up" data-aos-delay="200">
                <button class="btn btn-outline-primary active me-2 mb-2" data-filter="*">
                    <?php _e('All', 'auctoclean'); ?>
                </button>
                <?php
                if (auctoclean_is_pods_active()) {
                    foreach ($work_categories as $category) : ?>
                        <button class="btn btn-outline-primary me-2 mb-2" data-filter=".<?php echo esc_attr(sanitize_title($category)); ?>">
                            <?php echo esc_html($category); ?>
                        </button>
                    <?php endforeach;
                } else {
                    foreach ($work_categories as $category) : ?>
                        <button class="btn btn-outline-primary me-2 mb-2" data-filter=".<?php echo esc_attr($category->slug); ?>">
                            <?php echo esc_html($category->name); ?>
                        </button>
                <?php endforeach;
                }
                ?>
            </div>
        <?php endif; ?>

        <div class="work-grid row">
            <?php
            $has_work = false;
            if (auctoclean_is_pods_active() && isset($work)) {
                $has_work = $work->total() > 0;
            } elseif (isset($work_query)) {
                $has_work = $work_query->have_posts();
            }

            if ($has_work) :
                $delay = 0;

                if (auctoclean_is_pods_active() && isset($work)) {
                    // Pods method
                    while ($work->fetch()) {
                        $delay += 100;

                        // Get work details from Pods
                        $work_client = $work->field('project_client');
                        $work_date = $work->field('project_date');
                        $work_location = $work->field('project_location');
                        $work_category = $work->field('project_category');
                        $work_featured = $work->field('project_featured');
                        $work_gallery = $work->field('project_gallery');

                        $work_title = $work->display('post_title');
                        $work_content = $work->display('post_content');
                        $work_excerpt = $work->display('post_excerpt');
                        $work_permalink = $work->display('permalink');
                        $work_thumbnail = $work->display('post_thumbnail.guid');

                        $category_class = $work_category ? sanitize_title($work_category) : 'other';
            ?>
                        <div class="col-lg-4 col-md-6 mb-4 work-item <?php echo esc_attr($category_class); ?>" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                            <div class="card work-card h-100 <?php echo $work_featured ? 'featured-work' : ''; ?>">
                                <?php if ($work_thumbnail) : ?>
                                    <div class="work-image-container position-relative overflow-hidden">
                                        <img src="<?php echo esc_url($work_thumbnail); ?>" class="card-img-top work-image" alt="<?php echo esc_attr($work_title); ?>">
                                        <div class="work-overlay">
                                            <div class="work-overlay-content">
                                                <h5 class="text-white mb-2"><?php echo esc_html($work_title); ?></h5>
                                                <?php if ($work_client) : ?>
                                                    <p class="text-light mb-2"><i class="fas fa-user me-2"></i><?php echo esc_html($work_client); ?></p>
                                                <?php endif; ?>
                                                <?php if ($work_category) : ?>
                                                    <span class="badge bg-primary"><?php echo esc_html($work_category); ?></span>
                                                <?php endif; ?>
                                                <div class="mt-3">
                                                    <a href="<?php echo esc_url($work_permalink); ?>" class="btn btn-light btn-sm">
                                                        <i class="fas fa-eye me-1"></i><?php _e('View Project', 'auctoclean'); ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div class="card-body">
                                    <h5 class="card-title"><?php echo esc_html($work_title); ?></h5>
                                    <p class="card-text"><?php echo wp_trim_words($work_excerpt ?: $work_content, 15); ?></p>

                                    <div class="work-meta">
                                        <?php if ($work_date) : ?>
                                            <small class="text-muted"><i class="fas fa-calendar me-1"></i><?php echo date('M Y', strtotime($work_date)); ?></small>
                                        <?php endif; ?>
                                        <?php if ($work_location) : ?>
                                            <small class="text-muted ms-3"><i class="fas fa-map-marker-alt me-1"></i><?php echo esc_html($work_location); ?></small>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                } else {
                    // WordPress fallback method
                    while ($work_query->have_posts()) : $work_query->the_post();
                        $delay += 100;

                        // Get work details from custom fields
                        $work_client = auctoclean_get_field('work_client', get_the_ID());
                        $work_date = auctoclean_get_field('work_date', get_the_ID());
                        $work_location = auctoclean_get_field('work_location', get_the_ID());
                        $work_featured = auctoclean_get_field('work_featured', get_the_ID());

                        // Get taxonomy terms
                        $work_terms = get_the_terms(get_the_ID(), 'work_category');
                        $category_classes = '';
                        if ($work_terms && !is_wp_error($work_terms)) {
                            foreach ($work_terms as $term) {
                                $category_classes .= $term->slug . ' ';
                            }
                        }
                    ?>
                        <div class="col-lg-4 col-md-6 mb-4 work-item <?php echo esc_attr(trim($category_classes)); ?>" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                            <div class="card work-card h-100 <?php echo $work_featured ? 'featured-work' : ''; ?>">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="work-image-container position-relative overflow-hidden">
                                        <?php the_post_thumbnail('work-thumb', array('class' => 'card-img-top work-image')); ?>
                                        <div class="work-overlay">
                                            <div class="work-overlay-content">
                                                <h5 class="text-white mb-2"><?php the_title(); ?></h5>
                                                <?php if ($work_client) : ?>
                                                    <p class="text-light mb-2"><i class="fas fa-user me-2"></i><?php echo esc_html($work_client); ?></p>
                                                <?php endif; ?>
                                                <?php if ($work_terms) : ?>
                                                    <?php foreach ($work_terms as $term) : ?>
                                                        <span class="badge bg-primary me-1"><?php echo esc_html($term->name); ?></span>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                                <div class="mt-3">
                                                    <a href="<?php the_permalink(); ?>" class="btn btn-light btn-sm">
                                                        <i class="fas fa-eye me-1"></i><?php _e('View Project', 'auctoclean'); ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div class="card-body">
                                    <h5 class="card-title"><?php the_title(); ?></h5>
                                    <p class="card-text"><?php echo wp_trim_words(get_the_excerpt() ?: get_the_content(), 15); ?></p>

                                    <div class="work-meta">
                                        <?php if ($work_date) : ?>
                                            <small class="text-muted"><i class="fas fa-calendar me-1"></i><?php echo date('M Y', strtotime($work_date)); ?></small>
                                        <?php endif; ?>
                                        <?php if ($work_location) : ?>
                                            <small class="text-muted ms-3"><i class="fas fa-map-marker-alt me-1"></i><?php echo esc_html($work_location); ?></small>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                }
            else :
                ?>
                <div class="col-12 text-center" data-aos="fade-up">
                    <div class="no-work-message">
                        <i class="fas fa-folder-open fa-5x text-muted mb-4"></i>
                        <h4 class="text-muted"><?php _e('Our Portfolio is Coming Soon', 'auctoclean'); ?></h4>
                        <p class="lead text-muted mb-4"><?php _e('We are currently updating our portfolio. Please check back soon to see our amazing work!', 'auctoclean'); ?></p>
                        <a href="#contact" class="btn btn-primary"><?php _e('Contact Us', 'auctoclean'); ?></a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>