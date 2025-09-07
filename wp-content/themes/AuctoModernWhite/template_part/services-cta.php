<?php

/**
 * Services CTA Section Template Part
 * 
 * @package AuctoModernWhite
 */
?>

<div class="services-cta-section" data-aos="fade-up">
    <div class="container">
        <div class="cta-container">
            <div class="row align-items-center">
                <div class="col-lg-8" data-aos="fade-right" data-aos-delay="200">
                    <div class="cta-content">
                        <div class="cta-badge mb-3">
                            <span class="badge-glow"></span>
                            <i class="fas fa-handshake"></i>
                            <span>Ready to Start?</span>
                        </div>

                        <h2 class="cta-title mb-4">
                            Let's Create Something
                            <span class="gradient-text">Extraordinary</span>
                        </h2>

                        <p class="cta-description mb-4">
                            Transform your vision into reality with our expert team. From concept to execution, we're here to deliver exceptional experiences that exceed expectations and drive results.
                        </p>

                        <div class="cta-features">
                            <div class="feature-item">
                                <i class="fas fa-check-circle"></i>
                                <span>Free consultation and project assessment</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check-circle"></i>
                                <span>Custom solutions tailored to your needs</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check-circle"></i>
                                <span>24/7 support throughout the project</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4" data-aos="fade-left" data-aos-delay="400">
                    <div class="cta-actions">
                        <div class="action-card">
                            <div class="card-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <h4>Call Us Now</h4>
                            <p>Speak directly with our event specialists</p>
                            <a href="tel:+91-9876543210" class="btn btn-primary">
                                <i class="fas fa-phone me-2"></i>
                                +91-9876543210
                            </a>
                        </div>

                        <div class="action-card">
                            <div class="card-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <h4>Send Message</h4>
                            <p>Get a detailed proposal for your event</p>
                            <a href="mailto:info@auctocreation.com" class="btn btn-outline-primary">
                                <i class="fas fa-envelope me-2"></i>
                                Send Email
                            </a>
                        </div>

                        <div class="action-card">
                            <div class="card-icon">
                                <i class="fas fa-calendar"></i>
                            </div>
                            <h4>Schedule Meeting</h4>
                            <p>Book a consultation at your convenience</p>
                            <a href="#contact" class="btn btn-secondary smooth-scroll">
                                <i class="fas fa-calendar me-2"></i>
                                Book Meeting
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cta-stats mt-5" data-aos="fade-up" data-aos-delay="600">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 mb-4">
                        <div class="stat-box">
                            <div class="stat-icon">
                                <i class="fas fa-trophy"></i>
                            </div>
                            <h3 class="stat-number">500+</h3>
                            <p class="stat-label">Successful Events</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 mb-4">
                        <div class="stat-box">
                            <div class="stat-icon">
                                <i class="fas fa-smile"></i>
                            </div>
                            <h3 class="stat-number">98%</h3>
                            <p class="stat-label">Client Satisfaction</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 mb-4">
                        <div class="stat-box">
                            <div class="stat-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <h3 class="stat-number">10+</h3>
                            <p class="stat-label">Years Experience</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 mb-4">
                        <div class="stat-box">
                            <div class="stat-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <h3 class="stat-number">2M+</h3>
                            <p class="stat-label">People Reached</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .services-cta-section {
        background: #f8fafc;
        padding: 100px 0;
        position: relative;
    }

    .services-cta-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.05) 0%, rgba(118, 75, 162, 0.05) 100%);
    }

    .cta-container {
        background: white;
        border-radius: 30px;
        padding: 60px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
        position: relative;
        z-index: 2;
        border: 1px solid #e2e8f0;
    }

    .cta-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 8px 20px;
        border-radius: 25px;
        font-weight: 600;
        font-size: 0.9rem;
    }

    .cta-title {
        font-size: clamp(2.5rem, 6vw, 3.5rem);
        font-weight: 800;
        color: #1e293b;
        line-height: 1.2;
    }

    .gradient-text {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .cta-description {
        font-size: 1.2rem;
        color: #475569;
        line-height: 1.7;
    }

    .cta-features {
        display: grid;
        gap: 15px;
    }

    .feature-item {
        display: flex;
        align-items: center;
        gap: 12px;
        color: #475569;
        font-weight: 500;
    }

    .feature-item i {
        color: #10b981;
        font-size: 1.1rem;
    }

    .cta-actions {
        display: grid;
        gap: 25px;
    }

    .action-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 30px;
        border-radius: 20px;
        text-align: center;
        color: white;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .action-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), transparent);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .action-card:hover::before {
        opacity: 1;
    }

    .action-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(102, 126, 234, 0.3);
    }

    .card-icon {
        width: 60px;
        height: 60px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        color: white;
        font-size: 1.5rem;
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .action-card h4 {
        color: white;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .action-card p {
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 25px;
        font-size: 0.95rem;
    }

    .btn {
        padding: 12px 30px;
        border-radius: 25px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: none;
        cursor: pointer;
    }

    .btn-primary {
        background: rgba(255, 255, 255, 0.2);
        color: white;
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .btn-primary:hover {
        background: rgba(255, 255, 255, 0.3);
        color: white;
        transform: translateY(-2px);
    }

    .btn-outline-primary {
        background: transparent;
        color: white;
        border: 2px solid rgba(255, 255, 255, 0.3);
    }

    .btn-outline-primary:hover {
        background: rgba(255, 255, 255, 0.1);
        color: white;
        border-color: rgba(255, 255, 255, 0.5);
    }

    .btn-secondary {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        color: white;
    }

    .btn-secondary:hover {
        transform: translateY(-2px);
        color: white;
        box-shadow: 0 5px 15px rgba(240, 147, 251, 0.4);
    }

    .cta-stats {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 20px;
        padding: 50px;
        margin-top: 50px;
    }

    .stat-box {
        text-align: center;
        color: white;
    }

    .stat-icon {
        width: 80px;
        height: 80px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        color: white;
        font-size: 1.8rem;
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        transition: all 0.3s ease;
    }

    .stat-box:hover .stat-icon {
        transform: scale(1.1);
        background: rgba(255, 255, 255, 0.3);
    }

    .stat-number {
        font-size: 3rem;
        font-weight: 800;
        color: #f093fb;
        margin-bottom: 10px;
        text-shadow: 0 2px 10px rgba(240, 147, 251, 0.3);
    }

    .stat-label {
        color: rgba(255, 255, 255, 0.9);
        font-size: 1rem;
        margin: 0;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .services-cta-section {
            padding: 80px 0;
        }

        .cta-container {
            padding: 40px 30px;
            border-radius: 20px;
        }

        .cta-actions {
            margin-top: 40px;
        }

        .action-card {
            padding: 25px;
        }

        .card-icon {
            width: 50px;
            height: 50px;
            font-size: 1.3rem;
        }

        .cta-stats {
            padding: 40px 30px;
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            font-size: 1.5rem;
        }

        .stat-number {
            font-size: 2.5rem;
        }
    }

    @media (max-width: 480px) {
        .cta-container {
            padding: 30px 20px;
        }

        .cta-features {
            gap: 12px;
        }

        .feature-item {
            font-size: 0.95rem;
        }

        .action-card {
            padding: 20px;
        }

        .cta-stats {
            padding: 30px 20px;
        }
    }
</style>