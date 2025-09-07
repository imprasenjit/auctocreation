<?php

/**
 * Exhibition Services Section Template Part
 * 
 * @package AuctoModernWhite
 */
?>

<div class="exhibition-section" data-aos="fade-up">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
                <div class="exhibition-visual">
                    <div class="exhibition-showcase">
                        <div class="showcase-main">
                            <div class="booth-layout">
                                <div class="booth booth-1">
                                    <div class="booth-content">
                                        <i class="fas fa-tv"></i>
                                        <span>Tech</span>
                                    </div>
                                </div>
                                <div class="booth booth-2">
                                    <div class="booth-content">
                                        <i class="fas fa-car"></i>
                                        <span>Auto</span>
                                    </div>
                                </div>
                                <div class="booth booth-3">
                                    <div class="booth-content">
                                        <i class="fas fa-home"></i>
                                        <span>Home</span>
                                    </div>
                                </div>
                                <div class="booth booth-4">
                                    <div class="booth-content">
                                        <i class="fas fa-leaf"></i>
                                        <span>Eco</span>
                                    </div>
                                </div>
                                <div class="booth booth-5">
                                    <div class="booth-content">
                                        <i class="fas fa-utensils"></i>
                                        <span>Food</span>
                                    </div>
                                </div>
                                <div class="booth booth-6">
                                    <div class="booth-content">
                                        <i class="fas fa-palette"></i>
                                        <span>Art</span>
                                    </div>
                                </div>
                            </div>

                            <div class="visitor-flow">
                                <div class="visitor-dot"></div>
                                <div class="visitor-dot"></div>
                                <div class="visitor-dot"></div>
                                <div class="visitor-dot"></div>
                                <div class="visitor-dot"></div>
                            </div>
                        </div>

                        <div class="showcase-stats">
                            <div class="stat-circle">
                                <span class="number">500+</span>
                                <span class="label">Exhibitors</span>
                            </div>
                            <div class="stat-circle">
                                <span class="number">50K+</span>
                                <span class="label">Visitors</span>
                            </div>
                            <div class="stat-circle">
                                <span class="number">100+</span>
                                <span class="label">Events</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="400">
                <div class="section-content">
                    <div class="section-badge mb-4">
                        <span class="badge-glow"></span>
                        <i class="fas fa-eye"></i>
                        <span>Exhibition</span>
                    </div>

                    <h2 class="section-title mb-4">
                        Immersive
                        <span class="gradient-text">Exhibition Experiences</span>
                    </h2>

                    <p class="section-description mb-4">
                        We design and manage exhibitions that captivate visitors, showcase innovations, and create meaningful connections between exhibitors and audiences through thoughtful spatial design and engaging experiences.
                    </p>

                    <div class="exhibition-types">
                        <div class="type-item">
                            <div class="type-icon">
                                <i class="fas fa-industry"></i>
                            </div>
                            <div class="type-content">
                                <h5>Trade Shows</h5>
                                <p>Professional trade exhibitions connecting businesses with industry leaders and potential clients.</p>
                            </div>
                        </div>

                        <div class="type-item">
                            <div class="type-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="type-content">
                                <h5>Educational Exhibits</h5>
                                <p>Interactive educational displays and museum-quality exhibitions for learning institutions.</p>
                            </div>
                        </div>

                        <div class="type-item">
                            <div class="type-icon">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <div class="type-content">
                                <h5>Consumer Shows</h5>
                                <p>Public exhibitions showcasing products and services directly to end consumers.</p>
                            </div>
                        </div>

                        <div class="type-item">
                            <div class="type-icon">
                                <i class="fas fa-palette"></i>
                            </div>
                            <div class="type-content">
                                <h5>Art Exhibitions</h5>
                                <p>Curated art shows and gallery exhibitions celebrating creativity and artistic expression.</p>
                            </div>
                        </div>
                    </div>

                    <div class="exhibition-process mt-5">
                        <h4 class="process-title mb-4">Our Exhibition Process</h4>
                        <div class="process-steps">
                            <div class="step">
                                <div class="step-number">1</div>
                                <div class="step-content">
                                    <h6>Concept & Planning</h6>
                                    <p>Detailed planning and conceptualization</p>
                                </div>
                            </div>
                            <div class="step">
                                <div class="step-number">2</div>
                                <div class="step-content">
                                    <h6>Design & Layout</h6>
                                    <p>Space optimization and visual design</p>
                                </div>
                            </div>
                            <div class="step">
                                <div class="step-number">3</div>
                                <div class="step-content">
                                    <h6>Build & Setup</h6>
                                    <p>Professional construction and installation</p>
                                </div>
                            </div>
                            <div class="step">
                                <div class="step-number">4</div>
                                <div class="step-content">
                                    <h6>Event Management</h6>
                                    <p>Full-service event coordination</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .exhibition-section {
        background: #f7fafc;
        padding: 100px 0;
        position: relative;
    }

    .exhibition-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(99, 102, 241, 0.05) 0%, rgba(168, 85, 247, 0.05) 100%);
    }

    .section-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
        color: white;
        padding: 10px 25px;
        border-radius: 30px;
        font-weight: 600;
    }

    .section-title {
        font-size: clamp(2.5rem, 6vw, 3.5rem);
        font-weight: 800;
        color: #1e293b;
        line-height: 1.2;
    }

    .gradient-text {
        background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .section-description {
        font-size: 1.2rem;
        color: #475569;
        line-height: 1.7;
    }

    .exhibition-visual {
        position: relative;
        height: 600px;
    }

    .exhibition-showcase {
        position: relative;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
        border-radius: 25px;
        padding: 40px;
        overflow: hidden;
    }

    .showcase-main {
        position: relative;
        height: 70%;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .booth-layout {
        position: relative;
        width: 100%;
        height: 100%;
        padding: 20px;
    }

    .booth {
        position: absolute;
        width: 80px;
        height: 80px;
        background: rgba(255, 255, 255, 0.9);
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        animation: boothPulse 4s ease-in-out infinite;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    }

    .booth:hover {
        transform: scale(1.1);
        background: white;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .booth-content {
        text-align: center;
        color: #6366f1;
    }

    .booth-content i {
        font-size: 1.5rem;
        display: block;
        margin-bottom: 5px;
    }

    .booth-content span {
        font-size: 0.7rem;
        font-weight: 600;
    }

    .booth-1 {
        top: 20%;
        left: 10%;
        animation-delay: 0s;
    }

    .booth-2 {
        top: 15%;
        right: 20%;
        animation-delay: 0.5s;
    }

    .booth-3 {
        top: 50%;
        left: 5%;
        animation-delay: 1s;
    }

    .booth-4 {
        bottom: 30%;
        right: 15%;
        animation-delay: 1.5s;
    }

    .booth-5 {
        bottom: 20%;
        left: 30%;
        animation-delay: 2s;
    }

    .booth-6 {
        top: 40%;
        right: 40%;
        animation-delay: 2.5s;
    }

    @keyframes boothPulse {

        0%,
        100% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.05);
        }
    }

    .visitor-flow {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
    }

    .visitor-dot {
        position: absolute;
        width: 8px;
        height: 8px;
        background: #f59e0b;
        border-radius: 50%;
        animation: moveVisitor 8s linear infinite;
    }

    .visitor-dot:nth-child(1) {
        animation-delay: 0s;
        top: 60%;
        left: 0%;
    }

    .visitor-dot:nth-child(2) {
        animation-delay: 1.6s;
        top: 40%;
        left: 0%;
    }

    .visitor-dot:nth-child(3) {
        animation-delay: 3.2s;
        top: 80%;
        left: 0%;
    }

    .visitor-dot:nth-child(4) {
        animation-delay: 4.8s;
        top: 30%;
        left: 0%;
    }

    .visitor-dot:nth-child(5) {
        animation-delay: 6.4s;
        top: 70%;
        left: 0%;
    }

    @keyframes moveVisitor {
        0% {
            left: 0%;
            opacity: 0;
        }

        10% {
            opacity: 1;
        }

        90% {
            opacity: 1;
        }

        100% {
            left: 100%;
            opacity: 0;
        }
    }

    .showcase-stats {
        display: flex;
        justify-content: space-around;
        align-items: center;
        height: 30%;
        padding-top: 20px;
    }

    .stat-circle {
        width: 80px;
        height: 80px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: white;
        text-align: center;
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .stat-circle .number {
        font-size: 1.2rem;
        font-weight: 800;
        line-height: 1;
    }

    .stat-circle .label {
        font-size: 0.7rem;
        opacity: 0.9;
    }

    .exhibition-types {
        display: grid;
        gap: 25px;
    }

    .type-item {
        display: flex;
        align-items: flex-start;
        gap: 20px;
        padding: 25px;
        background: white;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        border: 1px solid #e2e8f0;
    }

    .type-item:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(99, 102, 241, 0.1);
    }

    .type-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
        flex-shrink: 0;
    }

    .type-content h5 {
        color: #1e293b;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .type-content p {
        color: #475569;
        margin: 0;
        line-height: 1.5;
    }

    .exhibition-process {
        background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
        padding: 35px;
        border-radius: 20px;
        color: white;
    }

    .process-title {
        color: white;
        font-weight: 700;
        text-align: center;
    }

    .process-steps {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 30px;
    }

    .step {
        text-align: center;
    }

    .step-number {
        width: 50px;
        height: 50px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
        font-size: 1.2rem;
        font-weight: 800;
        color: white;
        backdrop-filter: blur(15px);
        border: 2px solid rgba(255, 255, 255, 0.3);
    }

    .step h6 {
        color: white;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .step p {
        color: rgba(255, 255, 255, 0.9);
        font-size: 0.9rem;
        margin: 0;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .exhibition-section {
            padding: 80px 0;
        }

        .exhibition-visual {
            height: 400px;
            margin-top: 40px;
        }

        .exhibition-showcase {
            padding: 25px;
        }

        .booth {
            width: 60px;
            height: 60px;
        }

        .booth-content i {
            font-size: 1.2rem;
        }

        .booth-content span {
            font-size: 0.6rem;
        }

        .stat-circle {
            width: 60px;
            height: 60px;
        }

        .stat-circle .number {
            font-size: 1rem;
        }

        .stat-circle .label {
            font-size: 0.6rem;
        }

        .type-item {
            padding: 20px;
        }

        .type-icon {
            width: 50px;
            height: 50px;
            font-size: 1.3rem;
        }

        .process-steps {
            grid-template-columns: 1fr;
            gap: 20px;
        }
    }
</style>