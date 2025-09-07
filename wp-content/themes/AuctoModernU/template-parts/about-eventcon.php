<!-- EventCon About Section -->
<section class="eventcon-about py-5" id="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right">
                <div class="about-content">
                    <h2 class="section-title mb-4">ABOUT THE EVENT</h2>
                    <p class="lead mb-4">
                        Join us for the most spectacular music festival of 2025. An electrifying night
                        filled with incredible performances, stunning visuals, and unforgettable memories.
                    </p>
                    <p class="mb-4">
                        This year's concert features world-renowned artists, cutting-edge stage design,
                        and an immersive experience that will leave you breathless. From pulsating beats
                        to mesmerizing light shows, every moment is crafted to perfection.
                    </p>

                    <div class="event-features">
                        <div class="feature-item">
                            <i class="fas fa-music"></i>
                            <span>World-Class Artists</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-bolt"></i>
                            <span>High-Energy Performances</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-star"></i>
                            <span>Premium Experience</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-heart"></i>
                            <span>Unforgettable Memories</span>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="#lineup" class="btn btn-eventcon-primary me-3">VIEW LINEUP</a>
                        <a href="#tickets" class="btn btn-eventcon-outline">GET TICKETS</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left">
                <div class="about-image-container">
                    <div class="image-overlay"></div>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/concert-stage.jpg"
                        alt="Concert Stage" class="img-fluid rounded">
                    <div class="play-button">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#videoModal">
                            <i class="fas fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Event Stats -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="event-stats-grid" data-aos="fade-up">
                    <div class="stat-item">
                        <div class="stat-number">50K+</div>
                        <div class="stat-label">Expected Attendees</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">15+</div>
                        <div class="stat-label">Amazing Artists</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">8</div>
                        <div class="stat-label">Hours of Music</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">3</div>
                        <div class="stat-label">Epic Stages</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Video Modal -->
<div class="modal fade" id="videoModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-dark border-0">
            <div class="modal-header border-0">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-0">
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ"
                        title="Event Trailer" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>