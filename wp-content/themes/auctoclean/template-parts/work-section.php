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
                    $work_date = get_post_meta(get_the_ID(), '_work_date', true);
                    $work_location = get_post_meta(get_the_ID(), '_work_location', true);
                    $work_gallery = get_post_meta(get_the_ID(), '_work_gallery', true);

                    // Get categories for filtering
                    $categories = get_the_terms(get_the_ID(), 'work_category');
                    $category_classes = '';
                    if ($categories) {
                        foreach ($categories as $category) {
                            $category_classes .= $category->slug . ' ';
                        }
                    }
            ?>
                    <div class="col-lg-4 col-md-6 mb-4 work-item <?php echo esc_attr($category_classes); ?>"
                        data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                        <div class="card work-card h-100">
                            <div class="work-image-container">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('work-thumb', array('class' => 'card-img-top work-image')); ?>
                                <?php else : ?>
                                    <div class="work-placeholder d-flex align-items-center justify-content-center bg-light">
                                        <i class="fas fa-image fa-3x text-muted"></i>
                                    </div>
                                <?php endif; ?>

                                <div class="work-overlay">
                                    <div class="work-overlay-content">
                                        <a href="<?php the_permalink(); ?>" class="btn btn-light btn-sm me-2">
                                            <i class="fas fa-eye"></i> <?php _e('View Details', 'auctoclean'); ?>
                                        </a>
                                        <?php if (has_post_thumbnail()) : ?>
                                            <a href="<?php the_post_thumbnail_url('full'); ?>" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#workModal" data-work-id="<?php the_ID(); ?>">
                                                <i class="fas fa-search-plus"></i> <?php _e('Quick View', 'auctoclean'); ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="work-meta mb-2">
                                    <?php if ($categories) : ?>
                                        <div class="work-categories">
                                            <?php foreach ($categories as $category) : ?>
                                                <span class="badge bg-primary me-1"><?php echo esc_html($category->name); ?></span>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <h5 class="card-title">
                                    <a href="<?php the_permalink(); ?>" class="text-decoration-none">
                                        <?php the_title(); ?>
                                    </a>
                                </h5>

                                <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>

                                <div class="work-details">
                                    <?php if ($work_client) : ?>
                                        <div class="work-detail mb-1">
                                            <small class="text-muted">
                                                <i class="fas fa-user me-1"></i>
                                                <strong><?php _e('Client:', 'auctoclean'); ?></strong> <?php echo esc_html($work_client); ?>
                                            </small>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($work_date) : ?>
                                        <div class="work-detail mb-1">
                                            <small class="text-muted">
                                                <i class="fas fa-calendar me-1"></i>
                                                <strong><?php _e('Date:', 'auctoclean'); ?></strong> <?php echo esc_html(date('M Y', strtotime($work_date))); ?>
                                            </small>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($work_location) : ?>
                                        <div class="work-detail">
                                            <small class="text-muted">
                                                <i class="fas fa-map-marker-alt me-1"></i>
                                                <strong><?php _e('Location:', 'auctoclean'); ?></strong> <?php echo esc_html($work_location); ?>
                                            </small>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata();

            else : ?>
                <div class="col-12 text-center" data-aos="fade-up">
                    <div class="empty-state py-5">
                        <i class="fas fa-folder-open fa-5x text-muted mb-4"></i>
                        <h3><?php _e('Portfolio Coming Soon', 'auctoclean'); ?></h3>
                        <p class="lead"><?php _e('Our portfolio is being updated. Please check back soon to see our amazing work!', 'auctoclean'); ?></p>
                        <a href="#contact" class="btn btn-primary">
                            <?php _e('Contact Us for Examples', 'auctoclean'); ?>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <?php if ($work_query->have_posts() && $work_query->found_posts > 9) : ?>
            <!-- Load More Button -->
            <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="800">
                <button class="btn btn-outline-primary btn-lg" id="load-more-work" data-page="1">
                    <i class="fas fa-plus me-2"></i>
                    <?php _e('Load More Projects', 'auctoclean'); ?>
                </button>
            </div>
        <?php endif; ?>

        <!-- Work CTA -->
        <div class="work-cta text-center mt-5 pt-5 border-top" data-aos="fade-up" data-aos-delay="900">
            <h3 class="mb-3"><?php echo get_theme_mod('work_cta_title', __('Have a Project in Mind?', 'auctoclean')); ?></h3>
            <p class="lead mb-4"><?php echo get_theme_mod('work_cta_text', __('Let\'s create something amazing together. Contact us to discuss your next event.', 'auctoclean')); ?></p>
            <a href="<?php echo esc_url(get_theme_mod('work_cta_url', '#contact')); ?>" class="btn btn-primary btn-lg">
                <?php echo esc_html(get_theme_mod('work_cta_button', __('Start Your Project', 'auctoclean'))); ?>
            </a>
        </div>
    </div>
</section>

<!-- Work Modal for Quick View -->
<div class="modal fade" id="workModal" tabindex="-1" aria-labelledby="workModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="<?php _e('Close', 'auctoclean'); ?>"></button>
            </div>
            <div class="modal-body" id="workModalContent">
                <!-- Content will be loaded here via AJAX -->
            </div>
        </div>
    </div>
</div>