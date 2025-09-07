<?php

/**
 * The main template file
 * Modern WordPress theme for Auctocreation
 */

get_header();
?>

<main id="main-content">
    <?php if (is_front_page()): ?>

        <!-- Modern Funky Hero Banner -->
        <?php get_template_part('template-parts/banner-modern-funky'); ?>

        <!-- Modern About Section -->
        <?php get_template_part('template-parts/about-modern'); ?>

        <!-- Modern Services Section (WordPress Production Data) -->
        <?php get_template_part('template-parts/services-modern'); ?>

        <!-- Modern Gallery Section (WordPress Gallery Data) -->
        <?php get_template_part('template-parts/gallery-modern'); ?>

        <!-- Modern Festivals Section (WordPress Festival Data) -->
        <?php get_template_part('template-parts/festivals-modern'); ?>

        <!-- Modern Contact Section -->
        <?php get_template_part('template-parts/contact-modern'); ?>

    <?php endif; ?>
</main>

<!-- Modern Floating Social Icons -->
<?php get_template_part('template-parts/floating-social'); ?>

<?php get_footer(); ?>