<?php

/**
 * Festivals Services Section Template Part
 * 
 * @package AuctoModernWhite
 */
?>

<div class="festivals-section" data-aos="fade-up">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
                <div class="section-content">
                    <div class="section-badge mb-4">
                        <span class="badge-glow"></span>
                        <i class="fas fa-music"></i>
                        <span>Festivals</span>
                    </div>

                    <h2 class="section-title mb-4">
                        Creating Unforgettable
                        <span class="gradient-text">Festival Experiences</span>
                    </h2>

                    <p class="section-description mb-4">
                        From intimate music gatherings to large-scale cultural festivals, we orchestrate celebrations that bring communities together and create lasting memories. Our expertise spans across all festival formats and sizes.
                    </p>

                    <div class="features-list mb-5">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                            <div class="feature-content">
                                <h5>Cultural Festivals</h5>
                                <p>Traditional and contemporary cultural celebrations with authentic experiences</p>
                            </div>
                        </div>

                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-music"></i>
                            </div>
                            <div class="feature-content">
                                <h5>Music Festivals</h5>
                                <p>Multi-stage music events with world-class sound and lighting systems</p>
                            </div>
                        </div>

                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-utensils"></i>
                            </div>
                            <div class="feature-content">
                                <h5>Food Festivals</h5>
                                <p>Culinary celebrations showcasing diverse flavors and dining experiences</p>
                            </div>
                        </div>

                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-palette"></i>
                            </div>
                            <div class="feature-content">
                                <h5>Arts & Crafts</h5>
                                <p>Creative showcases for artists, artisans, and cultural heritage</p>
                            </div>
                        </div>
                    </div>

                    <div class="section-stats">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="stat-box">
                                    <h4>150+</h4>
                                    <p>Festivals Organized</p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="stat-box">
                                    <h4>2M+</h4>
                                    <p>Attendees Served</p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="stat-box">
                                    <h4>98%</h4>
                                    <p>Success Rate</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="400">
                <div class="festivals-gallery">
                    <div class="gallery-grid">
                        <div class="gallery-item main-image">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/festivals-main.jpg"
                                alt="Festival Main Event"
                                class="img-fluid">
                            <div class="image-overlay">
                                <div class="overlay-content">
                                    <i class="fas fa-play"></i>
                                    <span>Watch Highlights</span>
                                </div>
                            </div>
                        </div>

                        <div class="gallery-item small-image">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/festivals-music.jpg"
                                alt="Music Festival"
                                class="img-fluid">
                            <div class="image-label">Music</div>
                        </div>

                        <div class="gallery-item small-image">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/festivals-food.jpg"
                                alt="Food Festival"
                                class="img-fluid">
                            <div class="image-label">Food</div>
                        </div>

                        <div class="gallery-item small-image">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/festivals-cultural.jpg"
                                alt="Cultural Festival"
                                class="img-fluid">
                            <div class="image-label">Cultural</div>
                        </div>

                        <div class="gallery-item small-image">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/festivals-arts.jpg"
                                alt="Arts Festival"
                                class="img-fluid">
                            <div class="image-label">Arts</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .festivals-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 100px 0;
        position: relative;
        overflow: hidden;
    }

    .festivals-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="1" fill="%23fff" opacity="0.1"/></svg>') repeat;
    }

    .section-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(15px);
        padding: 10px 25px;
        border-radius: 30px;
        color: white;
        font-weight: 600;
        position: relative;
        overflow: hidden;
    }

    .section-title {
        font-size: clamp(2.5rem, 6vw, 3.5rem);
        font-weight: 800;
        color: white;
        line-height: 1.2;
    }

    .gradient-text {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .section-description {
        font-size: 1.2rem;
        color: rgba(255, 255, 255, 0.9);
        line-height: 1.7;
    }

    .features-list {
        display: grid;
        gap: 25px;
    }

    .feature-item {
        display: flex;
        align-items: flex-start;
        gap: 20px;
        padding: 25px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: all 0.3s ease;
    }

    .feature-item:hover {
        transform: translateX(10px);
        background: rgba(255, 255, 255, 0.15);
    }

    .feature-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
        flex-shrink: 0;
    }

    .feature-content h5 {
        color: white;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .feature-content p {
        color: rgba(255, 255, 255, 0.8);
        margin: 0;
        line-height: 1.5;
    }

    .section-stats {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(15px);
        border-radius: 20px;
        padding: 30px;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .stat-box {
        text-align: center;
        color: white;
    }

    .stat-box h4 {
        font-size: 2.5rem;
        font-weight: 800;
        color: #f093fb;
        margin-bottom: 8px;
    }

    .stat-box p {
        color: rgba(255, 255, 255, 0.8);
        margin: 0;
        font-size: 0.9rem;
    }

    .festivals-gallery {
        position: relative;
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: 2fr 1fr 1fr;
        grid-template-rows: 1fr 1fr 1fr;
        gap: 15px;
        height: 500px;
    }

    .gallery-item {
        position: relative;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        transition: all 0.3s ease;
    }

    .gallery-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.4);
    }

    .main-image {
        grid-row: 1 / -1;
    }

    .gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .gallery-item:hover img {
        transform: scale(1.1);
    }

    .image-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(240, 147, 251, 0.8), rgba(245, 87, 108, 0.8));
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .gallery-item:hover .image-overlay {
        opacity: 1;
    }

    .overlay-content {
        text-align: center;
        color: white;
    }

    .overlay-content i {
        font-size: 3rem;
        margin-bottom: 10px;
        display: block;
    }

    .overlay-content span {
        font-weight: 600;
        font-size: 1.1rem;
    }

    .image-label {
        position: absolute;
        bottom: 15px;
        left: 15px;
        right: 15px;
        background: rgba(0, 0, 0, 0.7);
        color: white;
        padding: 8px 15px;
        border-radius: 15px;
        font-weight: 600;
        text-align: center;
        backdrop-filter: blur(10px);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .festivals-section {
            padding: 80px 0;
        }

        .gallery-grid {
            grid-template-columns: 1fr;
            grid-template-rows: 300px 150px 150px 150px 150px;
            height: auto;
        }

        .main-image {
            grid-row: 1 / 2;
        }

        .features-list {
            grid-template-columns: 1fr;
        }

        .feature-item {
            padding: 20px;
        }

        .feature-icon {
            width: 50px;
            height: 50px;
            font-size: 1.3rem;
        }
    }
</style>