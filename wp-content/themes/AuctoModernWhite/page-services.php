<?php

/**
 * Template Name: Services Page
 * 
 * A custom page template for showcasing different service categories
 * 
 * @package AuctoModernWhite
 */

get_header();
?>

<!-- Fixed Social Media Links (Desktop Only) -->
<div class="icon-bar d-none d-lg-block" data-aos="fade-left" data-aos-delay="200">
    <a href="http://www.facebook.com/aucto.creation"
        class="facebook"
        aria-label="Follow us on Facebook"
        target="_blank"
        rel="noopener noreferrer">
        <i class="fab fa-facebook-f" aria-hidden="true"></i>
    </a>
    <a href="https://www.youtube.com/c/AuctoCreation"
        class="youtube"
        aria-label="Subscribe to our YouTube channel"
        target="_blank"
        rel="noopener noreferrer">
        <i class="fab fa-youtube" aria-hidden="true"></i>
    </a>
</div>

<!-- Main Content -->
<main id="main" class="site-main services-page" role="main">

    <!-- Services Hero Banner -->
    <section id="services-hero" class="full-width-section">
        <?php get_template_part('template_part/services-hero'); ?>
    </section>

    <!-- Festivals Section -->
    <section id="festivals" class="service-section full-width-section">
        <?php get_template_part('template_part/festivals', 'services'); ?>
    </section>

    <!-- Intellectual Property Section -->
    <section id="intellectual-property" class="service-section contained-section">
        <div class="site-contained">
            <?php get_template_part('template_part/intellectual-property', 'services'); ?>
        </div>
    </section>

    <!-- Corporate Events Section -->
    <section id="corporate-events" class="service-section full-width-section">
        <?php get_template_part('template_part/corporate-events', 'services'); ?>
    </section>

    <!-- Exhibition Section -->
    <section id="exhibition" class="service-section contained-section">
        <div class="site-contained">
            <?php get_template_part('template_part/exhibition', 'services'); ?>
        </div>
    </section>

    <!-- Brand Activation Section -->
    <section id="brand-activation" class="service-section full-width-section">
        <?php get_template_part('template_part/brand-activation', 'services'); ?>
    </section>

    <!-- Services CTA Section -->
    <section id="services-cta" class="contained-section">
        <div class="site-contained">
            <?php get_template_part('template_part/services-cta'); ?>
        </div>
    </section>

</main><!-- #main -->

<?php
get_footer();
?>