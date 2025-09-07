<?php
/**
 * The template for displaying all pages
 */

get_header();
?>

<main id="main-content" class="page-content">
    
    <!-- Page Header -->
    <?php if (!is_front_page()): ?>
        <section class="page-header section section-alt">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <?php if (function_exists('yoast_breadcrumb')): ?>
                            <nav class="breadcrumb-nav mb-3">
                                <?php yoast_breadcrumb('<p id="breadcrumbs">', '</p>'); ?>
                            </nav>
                        <?php endif; ?>
                        
                        <h1 class="page-title mb-3" data-aos="fade-up">
                            <?php the_title(); ?>
                        </h1>
                        
                        <?php if (has_excerpt()): ?>
                            <p class="page-subtitle lead text-muted" data-aos="fade-up" data-aos-delay="200">
                                <?php the_excerpt(); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- Main Content -->
    <section class="section">
        <div class="container">
            <?php while (have_posts()): the_post(); ?>
                
                <?php if (is_page('gallery')): ?>
                    <!-- Gallery Page Specific Layout -->
                    <div class="gallery-page">
                        <?php if (get_the_content()): ?>
                            <div class="row mb-5">
                                <div class="col-lg-8 mx-auto text-center">
                                    <div class="page-intro" data-aos="fade-up">
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                        <!-- Gallery Grid -->
                        <div class="gallery-grid-full">
                            <?php
                            // Get gallery images (you might want to implement this with a custom field or gallery)
                            $gallery_images = get_post_meta(get_the_ID(), 'gallery_images', true);
                            
                            if ($gallery_images):
                                foreach ($gallery_images as $image):
                            ?>
                                <div class="gallery-item" data-aos="fade-up">
                                    <div class="gallery-card">
                                        <img src="<?php echo $image['url']; ?>" 
                                             alt="<?php echo $image['alt']; ?>" 
                                             class="gallery-image">
                                        <div class="gallery-overlay">
                                            <a href="<?php echo $image['url']; ?>" 
                                               data-lightbox="gallery" 
                                               class="gallery-link">
                                                <i class="fas fa-search-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                endforeach;
                            else:
                                // Fallback gallery content
                                for ($i = 1; $i <= 12; $i++):
                            ?>
                                <div class="gallery-item" data-aos="fade-up" data-aos-delay="<?php echo $i * 100; ?>">
                                    <div class="gallery-card">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/gallery-placeholder-<?php echo $i; ?>.jpg" 
                                             alt="Gallery Image <?php echo $i; ?>" 
                                             class="gallery-image">
                                        <div class="gallery-overlay">
                                            <a href="#" class="gallery-link">
                                                <i class="fas fa-search-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                endfor;
                            endif;
                            ?>
                        </div>
                    </div>

                <?php elseif (is_page('contact')): ?>
                    <!-- Contact Page Specific Layout -->
                    <div class="contact-page">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <?php if (get_the_content()): ?>
                                    <div class="page-content modern-card mb-5" data-aos="fade-up">
                                        <?php the_content(); ?>
                                    </div>
                                <?php endif; ?>
                                
                                <!-- Contact Form -->
                                <div class="contact-form modern-card" data-aos="fade-up" data-aos-delay="200">
                                    <h3 class="mb-4">Get In Touch</h3>
                                    <form id="contactForm" class="contact-form-fields">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="firstName" class="form-label">First Name *</label>
                                                <input type="text" class="form-control" id="firstName" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="lastName" class="form-label">Last Name *</label>
                                                <input type="text" class="form-control" id="lastName" required>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="email" class="form-label">Email Address *</label>
                                                <input type="email" class="form-control" id="email" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="phone" class="form-label">Phone Number</label>
                                                <input type="tel" class="form-control" id="phone">
                                            </div>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="eventType" class="form-label">Event Type</label>
                                            <select class="form-select" id="eventType">
                                                <option value="">Select Event Type</option>
                                                <option value="wedding">Wedding</option>
                                                <option value="corporate">Corporate Event</option>
                                                <option value="birthday">Birthday Party</option>
                                                <option value="anniversary">Anniversary</option>
                                                <option value="festival">Festival</option>
                                                <option value="concert">Concert</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="eventDate" class="form-label">Preferred Event Date</label>
                                            <input type="date" class="form-control" id="eventDate">
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="message" class="form-label">Message *</label>
                                            <textarea class="form-control" id="message" rows="5" required placeholder="Tell us about your event requirements..."></textarea>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary btn-lg w-100">
                                            Send Message <i class="fas fa-paper-plane ms-2"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Contact Information -->
                        <div class="row mt-5">
                            <div class="col-lg-4 mb-4" data-aos="fade-up">
                                <div class="contact-info-card modern-card text-center h-100">
                                    <div class="contact-icon mb-3">
                                        <i class="fas fa-map-marker-alt fa-2x text-primary"></i>
                                    </div>
                                    <h5>Visit Us</h5>
                                    <p class="text-muted">
                                        Guwahati, Assam<br>
                                        Northeast India
                                    </p>
                                </div>
                            </div>
                            
                            <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                                <div class="contact-info-card modern-card text-center h-100">
                                    <div class="contact-icon mb-3">
                                        <i class="fas fa-phone fa-2x text-primary"></i>
                                    </div>
                                    <h5>Call Us</h5>
                                    <p class="text-muted">
                                        <a href="tel:+91-xxx-xxx-xxxx" class="text-decoration-none">+91 XXX XXX XXXX</a><br>
                                        Mon - Sat: 9:00 AM - 6:00 PM
                                    </p>
                                </div>
                            </div>
                            
                            <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="400">
                                <div class="contact-info-card modern-card text-center h-100">
                                    <div class="contact-icon mb-3">
                                        <i class="fas fa-envelope fa-2x text-primary"></i>
                                    </div>
                                    <h5>Email Us</h5>
                                    <p class="text-muted">
                                        <a href="mailto:info@auctocreation.com" class="text-decoration-none">info@auctocreation.com</a><br>
                                        We'll respond within 24 hours
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Google Map -->
                        <div class="row mt-5">
                            <div class="col-12" data-aos="fade-up">
                                <div class="map-container modern-card">
                                    <div id="map" style="height: 400px; border-radius: var(--border-radius);"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php else: ?>
                    <!-- Default Page Layout -->
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <article <?php post_class('modern-card'); ?> data-aos="fade-up">
                                <?php if (has_post_thumbnail() && !is_front_page()): ?>
                                    <div class="page-featured-image mb-4">
                                        <?php the_post_thumbnail('large', array('class' => 'img-fluid rounded')); ?>
                                        
                                        <?php if (get_the_post_thumbnail_caption()): ?>
                                            <p class="image-caption text-muted text-center mt-2 small">
                                                <?php echo get_the_post_thumbnail_caption(); ?>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="page-content">
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
                            </article>
                        </div>
                    </div>
                <?php endif; ?>

            <?php endwhile; ?>
        </div>
    </section>
</main>

<style>
/* Gallery Page Styles */
.gallery-grid-full {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 24px;
    margin-top: 2rem;
}

.gallery-card {
    position: relative;
    aspect-ratio: 4/3;
    overflow: hidden;
    border-radius: var(--border-radius-lg);
    box-shadow: var(--shadow-md);
    transition: all 0.3s ease;
}

.gallery-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-xl);
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
    background: rgba(44, 62, 80, 0.8);
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

.gallery-link {
    color: white;
    font-size: 2rem;
    text-decoration: none;
    transition: color 0.3s ease;
}

.gallery-link:hover {
    color: var(--accent-color);
}

/* Contact Page Styles */
.contact-form-fields .form-control,
.contact-form-fields .form-select {
    border-radius: var(--border-radius);
    padding: 12px 16px;
    border: 2px solid #e9ecef;
    transition: all 0.3s ease;
}

.contact-form-fields .form-control:focus,
.contact-form-fields .form-select:focus {
    border-color: var(--accent-color);
    box-shadow: 0 0 0 0.2rem rgba(231, 76, 60, 0.25);
}

.contact-info-card {
    padding: 2rem 1.5rem;
    transition: all 0.3s ease;
}

.contact-info-card:hover {
    transform: translateY(-5px);
}

.contact-icon {
    width: 80px;
    height: 80px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(231, 76, 60, 0.1);
    border-radius: 50%;
}

.map-container {
    overflow: hidden;
}

/* Page Content Styles */
.page-content {
    line-height: 1.8;
}

.page-content h2,
.page-content h3,
.page-content h4,
.page-content h5,
.page-content h6 {
    margin-top: 2rem;
    margin-bottom: 1rem;
    color: var(--primary-color);
}

.page-content p {
    margin-bottom: 1.5rem;
}

.page-content img {
    max-width: 100%;
    height: auto;
    border-radius: var(--border-radius);
    margin: 1rem 0;
}

.page-content blockquote {
    border-left: 4px solid var(--accent-color);
    padding-left: 1.5rem;
    margin: 2rem 0;
    font-style: italic;
    font-size: 1.125rem;
}

.page-links {
    text-align: center;
    padding: 1rem 0;
    border-top: 1px solid #eee;
}

.page-links .page-number {
    display: inline-block;
    padding: 8px 16px;
    margin: 0 4px;
    border-radius: var(--border-radius);
    background: var(--light-gray);
    color: var(--primary-color);
    text-decoration: none;
    transition: all 0.3s ease;
}

.page-links .page-number:hover,
.page-links .page-number.current {
    background: var(--accent-color);
    color: white;
}

/* Mobile Responsiveness */
@media (max-width: 768px) {
    .gallery-grid-full {
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 16px;
    }
    
    .contact-info-card {
        padding: 1.5rem 1rem;
    }
    
    .contact-icon {
        width: 60px;
        height: 60px;
    }
    
    .contact-icon i {
        font-size: 1.5rem;
    }
}
</style>

<?php get_footer(); ?>
