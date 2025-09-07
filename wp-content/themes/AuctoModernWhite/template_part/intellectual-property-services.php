<?php

/**
 * Intellectual Property Services Section Template Part
 * 
 * @package AuctoModernWhite
 */
?>

<div class="ip-section" data-aos="fade-up">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 order-lg-2" data-aos="fade-left" data-aos-delay="200">
                <div class="section-content">
                    <div class="section-badge mb-4">
                        <span class="badge-glow"></span>
                        <i class="fas fa-lightbulb"></i>
                        <span>Intellectual Property</span>
                    </div>

                    <h2 class="section-title mb-4">
                        Protecting Your
                        <span class="gradient-text">Creative Assets</span>
                    </h2>

                    <p class="section-description mb-4">
                        We understand the value of creative intellectual property and provide comprehensive protection and management services for your artistic works, ensuring your creative investments are safeguarded.
                    </p>

                    <div class="ip-services">
                        <div class="ip-service-item">
                            <div class="service-header">
                                <div class="service-icon">
                                    <i class="fas fa-copyright"></i>
                                </div>
                                <h4>Copyright Protection</h4>
                            </div>
                            <p>Comprehensive copyright registration and protection for your creative works, music, films, and artistic content.</p>
                            <ul class="service-features">
                                <li><i class="fas fa-check"></i> Music copyright registration</li>
                                <li><i class="fas fa-check"></i> Film and video protection</li>
                                <li><i class="fas fa-check"></i> Artistic work documentation</li>
                            </ul>
                        </div>

                        <div class="ip-service-item">
                            <div class="service-header">
                                <div class="service-icon">
                                    <i class="fas fa-trademark"></i>
                                </div>
                                <h4>Trademark Services</h4>
                            </div>
                            <p>Brand protection through trademark registration and enforcement for your business identity and creative brands.</p>
                            <ul class="service-features">
                                <li><i class="fas fa-check"></i> Brand name registration</li>
                                <li><i class="fas fa-check"></i> Logo protection</li>
                                <li><i class="fas fa-check"></i> Trademark monitoring</li>
                            </ul>
                        </div>

                        <div class="ip-service-item">
                            <div class="service-header">
                                <div class="service-icon">
                                    <i class="fas fa-file-contract"></i>
                                </div>
                                <h4>Licensing & Contracts</h4>
                            </div>
                            <p>Professional licensing agreements and contracts to monetize your intellectual property effectively.</p>
                            <ul class="service-features">
                                <li><i class="fas fa-check"></i> License agreements</li>
                                <li><i class="fas fa-check"></i> Distribution contracts</li>
                                <li><i class="fas fa-check"></i> Revenue optimization</li>
                            </ul>
                        </div>
                    </div>

                    <div class="ip-achievements mt-5">
                        <div class="achievement-highlight">
                            <div class="achievement-icon">
                                <i class="fas fa-award"></i>
                            </div>
                            <div class="achievement-content">
                                <h5>National Film Award Winner</h5>
                                <p>62nd National Film Award for Best Film in Other Language Category (2015)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 order-lg-1" data-aos="fade-right" data-aos-delay="400">
                <div class="ip-visual">
                    <div class="visual-container">
                        <div class="ip-icons-grid">
                            <div class="ip-icon-item copyright">
                                <div class="icon-wrapper">
                                    <i class="fas fa-copyright"></i>
                                </div>
                                <span>Copyright</span>
                            </div>

                            <div class="ip-icon-item trademark">
                                <div class="icon-wrapper">
                                    <i class="fas fa-trademark"></i>
                                </div>
                                <span>Trademark</span>
                            </div>

                            <div class="ip-icon-item patent">
                                <div class="icon-wrapper">
                                    <i class="fas fa-lightbulb"></i>
                                </div>
                                <span>Patents</span>
                            </div>

                            <div class="ip-icon-item licensing">
                                <div class="icon-wrapper">
                                    <i class="fas fa-file-contract"></i>
                                </div>
                                <span>Licensing</span>
                            </div>

                            <div class="ip-icon-item protection">
                                <div class="icon-wrapper">
                                    <i class="fas fa-shield-alt"></i>
                                </div>
                                <span>Protection</span>
                            </div>

                            <div class="ip-icon-item monetization">
                                <div class="icon-wrapper">
                                    <i class="fas fa-coins"></i>
                                </div>
                                <span>Monetization</span>
                            </div>
                        </div>

                        <div class="center-logo">
                            <div class="logo-circle">
                                <i class="fas fa-brain"></i>
                                <span>IP</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .ip-section {
        background: #f8fafc;
        padding: 100px 0;
        position: relative;
    }

    .ip-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.05) 0%, rgba(118, 75, 162, 0.05) 100%);
    }

    .section-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 10px 25px;
        border-radius: 30px;
        font-weight: 600;
        position: relative;
        overflow: hidden;
    }

    .section-title {
        font-size: clamp(2.5rem, 6vw, 3.5rem);
        font-weight: 800;
        color: #2d3748;
        line-height: 1.2;
    }

    .gradient-text {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .section-description {
        font-size: 1.2rem;
        color: #4a5568;
        line-height: 1.7;
    }

    .ip-services {
        display: grid;
        gap: 30px;
    }

    .ip-service-item {
        background: white;
        padding: 35px;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        border: 1px solid #e2e8f0;
    }

    .ip-service-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 50px rgba(102, 126, 234, 0.15);
    }

    .service-header {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 20px;
    }

    .service-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
    }

    .service-header h4 {
        color: #2d3748;
        font-weight: 700;
        margin: 0;
    }

    .ip-service-item p {
        color: #4a5568;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    .service-features {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .service-features li {
        display: flex;
        align-items: center;
        gap: 10px;
        color: #4a5568;
        margin-bottom: 10px;
    }

    .service-features i {
        color: #667eea;
        font-size: 0.9rem;
    }

    .ip-achievements {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 30px;
        border-radius: 20px;
        color: white;
    }

    .achievement-highlight {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .achievement-icon {
        width: 60px;
        height: 60px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: #f093fb;
    }

    .achievement-content h5 {
        color: white;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .achievement-content p {
        color: rgba(255, 255, 255, 0.9);
        margin: 0;
    }

    .ip-visual {
        position: relative;
        height: 500px;
    }

    .visual-container {
        position: relative;
        width: 100%;
        height: 100%;
    }

    .ip-icons-grid {
        position: relative;
        width: 100%;
        height: 100%;
    }

    .ip-icon-item {
        position: absolute;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
        animation: iconFloat 6s ease-in-out infinite;
    }

    .icon-wrapper {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.8rem;
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
        transition: all 0.3s ease;
    }

    .ip-icon-item span {
        font-weight: 600;
        color: #2d3748;
        font-size: 0.9rem;
    }

    .ip-icon-item:hover .icon-wrapper {
        transform: scale(1.1);
        box-shadow: 0 15px 40px rgba(102, 126, 234, 0.4);
    }

    .copyright {
        top: 10%;
        left: 10%;
        animation-delay: 0s;
    }

    .trademark {
        top: 15%;
        right: 15%;
        animation-delay: 1s;
    }

    .patent {
        top: 60%;
        left: 5%;
        animation-delay: 2s;
    }

    .licensing {
        bottom: 15%;
        right: 10%;
        animation-delay: 3s;
    }

    .protection {
        bottom: 20%;
        left: 20%;
        animation-delay: 4s;
    }

    .monetization {
        top: 45%;
        right: 25%;
        animation-delay: 5s;
    }

    @keyframes iconFloat {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-15px);
        }
    }

    .center-logo {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .logo-circle {
        width: 120px;
        height: 120px;
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        border-radius: 50%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 2rem;
        font-weight: 800;
        box-shadow: 0 20px 60px rgba(240, 147, 251, 0.4);
        animation: pulse 3s ease-in-out infinite;
    }

    @keyframes pulse {

        0%,
        100% {
            transform: translate(-50%, -50%) scale(1);
        }

        50% {
            transform: translate(-50%, -50%) scale(1.05);
        }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .ip-section {
            padding: 80px 0;
        }

        .ip-visual {
            height: 400px;
            margin-top: 50px;
        }

        .ip-service-item {
            padding: 25px;
        }

        .service-header {
            flex-direction: column;
            text-align: center;
            gap: 15px;
        }

        .service-icon {
            width: 50px;
            height: 50px;
            font-size: 1.3rem;
        }

        .icon-wrapper {
            width: 60px;
            height: 60px;
            font-size: 1.5rem;
        }

        .logo-circle {
            width: 100px;
            height: 100px;
            font-size: 1.7rem;
        }
    }
</style>