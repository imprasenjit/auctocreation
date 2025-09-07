<?php

/**
 * Services Hero Section Template Part
 * 
 * @package AuctoModernWhite
 */
?>

<div class="services-hero-section" data-aos="fade-up">
    <div class="hero-background">
        <div class="hero-overlay"></div>
        <div class="hero-particles">
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
        </div>
    </div>

    <div class="container">
        <div class="row align-items-center min-vh-80">
            <div class="col-lg-6" data-aos="fade-right" data-aos-delay="300">
                <div class="hero-content">
                    <div class="hero-badge mb-4">
                        <span class="badge-glow"></span>
                        <i class="fas fa-star"></i>
                        <span>Our Work</span>
                    </div>

                    <h1 class="hero-title mb-4">
                        <span class="title-line">Comprehensive</span>
                        <span class="title-line gradient-text">Event Solutions</span>
                    </h1>

                    <p class="hero-description mb-5">
                        From grand festivals to intimate corporate gatherings, we deliver exceptional experiences that resonate with your audience and exceed expectations. Explore our comprehensive range of specialized services.
                    </p>

                    <!-- <div class="hero-stats row">
                        <div class="col-sm-4 mb-3">
                            <div class="stat-item">
                                <h3 class="stat-number">500+</h3>
                                <p class="stat-label">Events Delivered</p>
                            </div>
                        </div>
                        <div class="col-sm-4 mb-3">
                            <div class="stat-item">
                                <h3 class="stat-number">10+</h3>
                                <p class="stat-label">Years Experience</p>
                            </div>
                        </div>
                        <div class="col-sm-4 mb-3">
                            <div class="stat-item">
                                <h3 class="stat-number">100%</h3>
                                <p class="stat-label">Client Satisfaction</p>
                            </div>
                        </div>
                    </div> -->

                    <!-- <div class="hero-actions mt-5">
                        <a href="#festivals" class="btn btn-primary btn-lg smooth-scroll me-3">
                            <i class="fas fa-rocket me-2"></i>
                            Explore Services
                        </a>
                        <a href="#services-cta" class="btn btn-outline-primary btn-lg smooth-scroll">
                            <i class="fas fa-phone me-2"></i>
                            Get Quote
                        </a>
                    </div> -->
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="500">
                <div class="hero-visual">
                    <div class="visual-container">
                        <div class="floating-cards">
                            <div class="service-card festivals">
                                <i class="fas fa-music"></i>
                                <span>Festivals</span>
                            </div>
                            <div class="service-card corporate">
                                <i class="fas fa-building"></i>
                                <span>Corporate</span>
                            </div>
                            <div class="service-card exhibition">
                                <i class="fas fa-eye"></i>
                                <span>Exhibition</span>
                            </div>
                            <div class="service-card brand">
                                <i class="fas fa-rocket"></i>
                                <span>Branding</span>
                            </div>
                            <div class="service-card ip">
                                <i class="fas fa-lightbulb"></i>
                                <span>IP Rights</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .site-main section {
        height: 515px;
    }

    .services-hero-section {
        position: relative;
        background: linear-gradient(135deg, #00802F 0%, #0091AA 100%);
        overflow: hidden;
        top: -83px;
        padding: 120px 0;
    }

    .hero-background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.3);
    }

    .hero-particles .particle {
        position: absolute;
        width: 4px;
        height: 4px;
        background: rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        animation: float 6s ease-in-out infinite;
    }

    .hero-particles .particle:nth-child(1) {
        top: 20%;
        left: 20%;
        animation-delay: 0s;
    }

    .hero-particles .particle:nth-child(2) {
        top: 40%;
        left: 60%;
        animation-delay: 2s;
    }

    .hero-particles .particle:nth-child(3) {
        top: 60%;
        left: 80%;
        animation-delay: 4s;
    }

    .hero-particles .particle:nth-child(4) {
        top: 80%;
        left: 30%;
        animation-delay: 1s;
    }

    .hero-particles .particle:nth-child(5) {
        top: 30%;
        left: 90%;
        animation-delay: 3s;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px) rotate(0deg);
            opacity: 1;
        }

        50% {
            transform: translateY(-20px) rotate(180deg);
            opacity: 0.5;
        }
    }

    .hero-content {
        position: relative;
        z-index: 2;
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        padding: 8px 20px;
        border-radius: 25px;
        color: white;
        font-weight: 600;
        position: relative;
        overflow: hidden;
    }

    .badge-glow {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
        animation: shimmer 2s infinite;
    }

    @keyframes shimmer {
        0% {
            transform: translateX(-100%);
        }

        100% {
            transform: translateX(100%);
        }
    }

    .hero-title {
        font-size: clamp(3rem, 8vw, 4.5rem);
        font-weight: 800;
        line-height: 1.1;
        color: white;
        margin: 0;
    }

    .title-line {
        display: block;
    }

    .gradient-text {
        background: linear-gradient(135deg, #6ed493 0%, #53c7db 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .hero-description {
        font-size: 1.25rem;
        color: rgba(255, 255, 255, 0.9);
        line-height: 1.6;
    }

    .stat-item {
        text-align: center;
        color: white;
    }

    .stat-number {
        font-size: 2.5rem;
        font-weight: 800;
        color: #41d8a6;
        margin-bottom: 8px;
    }

    .stat-label {
        font-size: 0.9rem;
        color: rgba(255, 255, 255, 0.8);
        margin: 0;
    }

    .btn-primary {
        background: linear-gradient(135deg, #6ed493 0%, #53c7db 100%);
        border: none;
        padding: 15px 35px;
        font-weight: 600;
        border-radius: 50px;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(65, 216, 166, 0.4);
    }

    .btn-outline-primary {
        color: white;
        border: 2px solid rgba(255, 255, 255, 0.3);
        padding: 15px 35px;
        font-weight: 600;
        border-radius: 50px;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
    }

    .btn-outline-primary:hover {
        background: rgba(255, 255, 255, 0.2);
        border-color: rgba(255, 255, 255, 0.5);
        color: white;
        transform: translateY(-3px);
    }

    .hero-visual {
        position: relative;
        height: 500px;
    }

    .visual-container {
        position: relative;
        width: 100%;
        height: 100%;
    }

    .floating-cards {
        position: relative;
        width: 100%;
        height: 100%;
    }

    .service-card {
        position: absolute;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 20px;
        padding: 25px;
        text-align: center;
        color: white;
        font-weight: 600;
        transition: all 0.3s ease;
        animation: cardFloat 6s ease-in-out infinite;
    }

    .service-card i {
        font-size: 2rem;
        display: block;
        margin-bottom: 10px;
        color: #41d8a6;
    }

    .service-card.festivals {
        top: 10%;
        left: 10%;
        animation-delay: 0s;
    }

    .service-card.corporate {
        top: 20%;
        right: 20%;
        animation-delay: 1s;
    }

    .service-card.exhibition {
        top: 50%;
        left: 5%;
        animation-delay: 2s;
    }

    .service-card.brand {
        bottom: 20%;
        right: 10%;
        animation-delay: 3s;
    }

    .service-card.ip {
        bottom: 10%;
        left: 40%;
        animation-delay: 4s;
    }

    @keyframes cardFloat {

        0%,
        100% {
            transform: translateY(0px) rotate(0deg);
        }

        33% {
            transform: translateY(-15px) rotate(2deg);
        }

        66% {
            transform: translateY(-5px) rotate(-1deg);
        }
    }

    .service-card:hover {
        transform: translateY(-10px) scale(1.05);
        box-shadow: 0 15px 40px rgba(65, 216, 166, 0.3);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .services-hero-section {
            padding: 80px 0;
        }

        .hero-title {
            font-size: clamp(2.5rem, 8vw, 3.5rem);
        }

        .hero-description {
            font-size: 1.1rem;
        }

        .stat-number {
            font-size: 2rem;
        }

        .hero-visual {
            height: 300px;
            margin-top: 50px;
        }

        .service-card {
            padding: 15px 20px;
            font-size: 0.9rem;
        }

        .service-card i {
            font-size: 1.5rem;
        }
    }
</style>