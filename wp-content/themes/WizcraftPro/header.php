<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <?php if (is_singular() && pings_open(get_queried_object())): ?>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php endif; ?>

    <!-- Favicon -->
    <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon.ico" type="image/x-icon">

    <!-- Preconnect for Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="page-top" data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70">

    <!-- Professional Navigation - Wizcraft Style -->
    <nav class="navbar navbar-expand-lg wizcraft-nav" id="mainNav">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand d-flex align-items-center" href="<?php echo home_url(); ?>">
                <?php
                $custom_logo_id = get_theme_mod('custom_logo');
                if ($custom_logo_id) {
                    $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                    echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '" class="logo-img" style="height: 45px; width: auto;">';
                } else {
                    // Fallback to text logo - Wizcraft style
                    echo '<div class="brand-text">';
                    echo '<div class="brand-name">' . get_bloginfo('name') . '</div>';
                    if (get_bloginfo('description')) {
                        echo '<div class="brand-tagline">' . get_bloginfo('description') . '</div>';
                    }
                    echo '</div>';
                }
                ?>
            </a>

            <!-- Mobile menu toggle -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navigation Menu -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <?php
                if (has_nav_menu('primary')) {
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class' => 'navbar-nav ms-auto',
                        'container' => false,
                        'depth' => 2,
                        'fallback_cb' => false,
                        'walker' => new WP_Bootstrap_Navwalker_5()
                    ));
                } else {
                    // Professional fallback menu - Wizcraft style
                    echo '<ul class="navbar-nav ms-auto">';
                    echo '<li class="nav-item"><a class="nav-link" href="' . home_url() . '">Home</a></li>';
                    echo '<li class="nav-item"><a class="nav-link" href="' . home_url('/about') . '">About Us</a></li>';
                    echo '<li class="nav-item dropdown">';
                    echo '<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Our Businesses</a>';
                    echo '<ul class="dropdown-menu">';
                    echo '<li><a class="dropdown-item" href="' . home_url('/corporate-events') . '">Corporate Events</a></li>';
                    echo '<li><a class="dropdown-item" href="' . home_url('/virtual-events') . '">Virtual & Hybrid Events</a></li>';
                    echo '<li><a class="dropdown-item" href="' . home_url('/large-format-events') . '">Large Format Events</a></li>';
                    echo '<li><a class="dropdown-item" href="' . home_url('/mice') . '">MICE</a></li>';
                    echo '<li><a class="dropdown-item" href="' . home_url('/brand-communication') . '">Brand Communication</a></li>';
                    echo '<li><a class="dropdown-item" href="' . home_url('/performance-marketing') . '">Performance Marketing</a></li>';
                    echo '</ul>';
                    echo '</li>';
                    echo '<li class="nav-item"><a class="nav-link" href="' . home_url('/news-media') . '">News & Media</a></li>';
                    echo '<li class="nav-item"><a class="nav-link" href="' . home_url('/contact') . '">Contact</a></li>';
                    echo '</ul>';
                }
                ?>

                <!-- CTA Button - Professional -->
                <div class="d-none d-lg-block ms-3">
                    <a href="<?php echo home_url('/contact'); ?>" class="btn btn-primary">
                        Get Quote
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Content Starts Here -->