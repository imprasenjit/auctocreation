<!-- Owned Property Section -->
<section id="owned-property" class="section section-alt">
    <div class="container">
        <?php
        $args_property = array(
            'post_type' => 'owned_property',
            'orderby' => 'menu_order',
            'posts_per_page' => -1
        );
        $property_slides = new WP_Query($args_property);

        if ($property_slides->have_posts()): ?>

            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 class="section-title text-gradient mb-3" data-aos="fade-up">Our Venues & Properties</h2>
                    <p class="section-subtitle text-muted mb-5" data-aos="fade-up" data-aos-delay="200">
                        Premium venues and state-of-the-art facilities for your perfect event
                    </p>
                </div>
            </div>

            <!-- Property Showcase -->
            <div class="property-showcase">
                <div class="row">
                    <?php
                    $property_count = 0;
                    while ($property_slides->have_posts()): $property_slides->the_post();
                        $property_type = get_post_meta(get_the_ID(), 'property_type', true) ?: 'venue';
                        $property_capacity = get_post_meta(get_the_ID(), 'property_capacity', true);
                        $property_location = get_post_meta(get_the_ID(), 'property_location', true);
                        $property_features = get_post_meta(get_the_ID(), 'property_features', true);
                    ?>
                        <div class="col-lg-6 col-xl-4 mb-4" data-aos="fade-up" data-aos-delay="<?php echo $property_count * 150; ?>">
                            <div class="property-card modern-card h-100">
                                <?php if (has_post_thumbnail()): ?>
                                    <div class="property-image-wrapper">
                                        <img src="<?php the_post_thumbnail_url('owned_property_slides'); ?>"
                                            alt="<?php echo esc_html(get_the_title()); ?>"
                                            class="property-image">
                                        <div class="property-badge">
                                            <i class="fas fa-building"></i>
                                            <span><?php echo ucfirst($property_type); ?></span>
                                        </div>
                                        <div class="property-overlay">
                                            <div class="overlay-actions">
                                                <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#propertyModal<?php echo get_the_ID(); ?>">
                                                    <i class="fas fa-eye me-1"></i> View Details
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div class="property-content">
                                    <h4 class="property-title mb-3">
                                        <?php echo esc_html(get_the_title()); ?>
                                    </h4>

                                    <?php if (get_the_excerpt()): ?>
                                        <p class="property-description text-muted mb-3">
                                            <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                                        </p>
                                    <?php endif; ?>

                                    <div class="property-details">
                                        <?php if ($property_location): ?>
                                            <div class="detail-item d-flex align-items-center mb-2">
                                                <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                                <span class="small"><?php echo esc_html($property_location); ?></span>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ($property_capacity): ?>
                                            <div class="detail-item d-flex align-items-center mb-2">
                                                <i class="fas fa-users text-primary me-2"></i>
                                                <span class="small">Capacity: <?php echo esc_html($property_capacity); ?> guests</span>
                                            </div>
                                        <?php endif; ?>

                                        <div class="detail-item d-flex align-items-center mb-3">
                                            <i class="fas fa-star text-primary me-2"></i>
                                            <span class="small">Premium Facility</span>
                                        </div>
                                    </div>

                                    <div class="property-actions d-flex gap-2">
                                        <button class="btn btn-primary btn-sm flex-fill" data-bs-toggle="modal" data-bs-target="#propertyModal<?php echo get_the_ID(); ?>">
                                            View Details
                                        </button>
                                        <button class="btn btn-outline btn-sm flex-fill" data-bs-toggle="modal" data-bs-target="#bookingModal">
                                            Book Now
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Property Detail Modal -->
                        <div class="modal fade" id="propertyModal<?php echo get_the_ID(); ?>" tabindex="-1" aria-labelledby="propertyModalLabel<?php echo get_the_ID(); ?>" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="propertyModalLabel<?php echo get_the_ID(); ?>">
                                            <?php echo esc_html(get_the_title()); ?>
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <?php if (has_post_thumbnail()): ?>
                                            <img src="<?php the_post_thumbnail_url('large'); ?>"
                                                alt="<?php echo esc_html(get_the_title()); ?>"
                                                class="img-fluid rounded mb-3">
                                        <?php endif; ?>

                                        <?php if (get_the_content()): ?>
                                            <div class="content mb-4">
                                                <?php echo wpautop(get_the_content()); ?>
                                            </div>
                                        <?php endif; ?>

                                        <div class="property-full-details">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h6 class="fw-bold mb-3">Property Details</h6>

                                                    <?php if ($property_location): ?>
                                                        <p><strong>Location:</strong> <?php echo esc_html($property_location); ?></p>
                                                    <?php endif; ?>

                                                    <?php if ($property_capacity): ?>
                                                        <p><strong>Capacity:</strong> <?php echo esc_html($property_capacity); ?> guests</p>
                                                    <?php endif; ?>

                                                    <p><strong>Type:</strong> <?php echo ucfirst($property_type); ?></p>
                                                </div>

                                                <?php if ($property_features): ?>
                                                    <div class="col-md-6">
                                                        <h6 class="fw-bold mb-3">Features & Amenities</h6>
                                                        <div class="features-list">
                                                            <?php
                                                            $features = explode(',', $property_features);
                                                            foreach ($features as $feature):
                                                            ?>
                                                                <span class="badge bg-primary me-1 mb-1"><?php echo trim($feature); ?></span>
                                                            <?php endforeach; ?>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#bookingModal">
                                            Book This Venue
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php
                        $property_count++;
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>

            <!-- Property Features Section -->
            <div class="property-features-section mt-5" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="features-showcase modern-card">
                            <h3 class="text-center mb-4">Why Choose Our Venues?</h3>
                            <div class="row">
                                <div class="col-md-4 text-center mb-4">
                                    <div class="feature-icon mb-3">
                                        <i class="fas fa-wifi fa-2x text-primary"></i>
                                    </div>
                                    <h5>Modern Amenities</h5>
                                    <p class="text-muted">High-speed WiFi, AV equipment, and modern facilities</p>
                                </div>
                                <div class="col-md-4 text-center mb-4">
                                    <div class="feature-icon mb-3">
                                        <i class="fas fa-parking fa-2x text-primary"></i>
                                    </div>
                                    <h5>Ample Parking</h5>
                                    <p class="text-muted">Convenient parking spaces for all guests</p>
                                </div>
                                <div class="col-md-4 text-center mb-4">
                                    <div class="feature-icon mb-3">
                                        <i class="fas fa-utensils fa-2x text-primary"></i>
                                    </div>
                                    <h5>Catering Services</h5>
                                    <p class="text-muted">Professional catering and dining arrangements</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>
    </div>

    <!-- Booking Modal -->
    <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookingModalLabel">Book a Venue</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="venueBookingForm">
                        <div class="mb-3">
                            <label for="eventDate" class="form-label">Event Date</label>
                            <input type="date" class="form-control" id="eventDate" required>
                        </div>
                        <div class="mb-3">
                            <label for="guestCount" class="form-label">Number of Guests</label>
                            <input type="number" class="form-control" id="guestCount" min="1" required>
                        </div>
                        <div class="mb-3">
                            <label for="eventType" class="form-label">Event Type</label>
                            <select class="form-select" id="eventType" required>
                                <option value="">Select Event Type</option>
                                <option value="wedding">Wedding</option>
                                <option value="corporate">Corporate Event</option>
                                <option value="birthday">Birthday Party</option>
                                <option value="anniversary">Anniversary</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="contactName" class="form-label">Your Name</label>
                            <input type="text" class="form-control" id="contactName" required>
                        </div>
                        <div class="mb-3">
                            <label for="contactPhone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="contactPhone" required>
                        </div>
                        <div class="mb-3">
                            <label for="contactEmail" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="contactEmail" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="submitBooking()">Submit Request</button>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Property Section Styles */
    .property-card {
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .property-card:hover {
        transform: translateY(-5px);
    }

    .property-image-wrapper {
        position: relative;
        height: 200px;
        overflow: hidden;
    }

    .property-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .property-badge {
        position: absolute;
        top: 15px;
        left: 15px;
        background: rgba(231, 76, 60, 0.9);
        color: white;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 500;
        backdrop-filter: blur(10px);
    }

    .property-badge i {
        margin-right: 5px;
    }

    .property-overlay {
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

    .property-card:hover .property-overlay {
        opacity: 1;
    }

    .property-card:hover .property-image {
        transform: scale(1.1);
    }

    .property-content {
        padding: 1.5rem;
    }

    .property-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--primary-color);
    }

    .detail-item {
        font-size: 0.875rem;
    }

    .features-showcase {
        background: linear-gradient(135deg, var(--light-gray), white);
        padding: 3rem 2rem;
        border-radius: var(--border-radius-lg);
    }

    .feature-icon {
        width: 60px;
        height: 60px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(231, 76, 60, 0.1);
        border-radius: 50%;
    }

    .features-list .badge {
        font-size: 0.75rem;
    }

    /* Mobile Responsiveness */
    @media (max-width: 768px) {
        .property-card {
            margin-bottom: 1rem;
        }

        .features-showcase {
            padding: 2rem 1rem;
        }

        .property-actions {
            flex-direction: column;
        }

        .property-actions .btn {
            margin-bottom: 0.5rem;
        }
    }
</style>

<script>
    function submitBooking() {
        // Get form data
        const formData = new FormData(document.getElementById('venueBookingForm'));
        const data = Object.fromEntries(formData);

        // Basic validation
        if (!data.eventDate || !data.guestCount || !data.eventType || !data.contactName || !data.contactPhone || !data.contactEmail) {
            alert('Please fill in all required fields.');
            return;
        }

        // In a real application, you would submit this data to your server
        alert('Thank you for your booking request! We will contact you within 24 hours to confirm the details.');

        // Close modal and reset form
        const modal = bootstrap.Modal.getInstance(document.getElementById('bookingModal'));
        modal.hide();
        document.getElementById('venueBookingForm').reset();
    }
</script>