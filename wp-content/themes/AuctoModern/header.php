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

    <?php wp_head(); ?>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body <?php body_class(); ?> id="page-top" data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70">

    <!-- Modern Dark Navigation -->
    <nav class="navbar navbar-expand-lg modern-dark-nav fixed-top" id="mainNav">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand d-flex align-items-center" href="<?php echo home_url(); ?>">
                <?php
                echo '<img src="' . get_stylesheet_directory_uri() . '/images/logo/logo.JPG" alt="' . get_bloginfo('name') . '" class="logo-img" style="height: 80px; width: auto;">';

                ?>
            </a>

            <!-- Mobile menu toggle -->
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="toggler-line"></span>
                <span class="toggler-line"></span>
                <span class="toggler-line"></span>
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
                    // Modern fallback menu
                    echo '<ul class="navbar-nav ms-auto">';
                    echo '<li class="nav-item"><a class="nav-link" href="' . home_url() . '">Home</a></li>';
                    echo '<li class="nav-item"><a class="nav-link" href="' . home_url('/about') . '">About</a></li>';
                    echo '<li class="nav-item dropdown">';
                    echo '<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Services</a>';
                    echo '<ul class="dropdown-menu dark-dropdown">';
                    echo '<li><a class="dropdown-item" href="' . home_url('/corporate-events') . '">Corporate Events</a></li>';
                    echo '<li><a class="dropdown-item" href="' . home_url('/virtual-events') . '">Virtual Events</a></li>';
                    echo '<li><a class="dropdown-item" href="' . home_url('/brand-activation') . '">Brand Activation</a></li>';
                    echo '</ul></li>';
                    echo '<li class="nav-item"><a class="nav-link" href="' . home_url('/gallery') . '">Gallery</a></li>';
                    echo '<li class="nav-item"><a class="nav-link" href="' . home_url('/contact') . '">Contact</a></li>';
                    echo '</ul>';
                }
                ?>

                <!-- Modern Search & CTA -->
                <div class="d-none d-lg-flex align-items-center ms-3">
                    <button class="search-toggle me-3" type="button" data-bs-toggle="modal" data-bs-target="#searchModal">
                        <i class="fas fa-search"></i>
                    </button>
                    <a href="<?php echo home_url('/contact'); ?>" class="btn btn-modern-primary">
                        Get Started
                        <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Search Modal -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-dark border-0">
                <div class="modal-body p-4">
                    <form role="search" method="get" action="<?php echo home_url(); ?>">
                        <div class="input-group input-group-lg">
                            <input type="search" class="form-control bg-dark border-secondary text-white"
                                placeholder="Search for anything..."
                                name="s"
                                value="<?php echo get_search_query(); ?>"
                                autofocus>
                            <button class="btn btn-modern-primary" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                    <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modern Floating Social Icons -->
    <div class="floating-social d-none d-xl-block">
        <?php if (get_theme_mod('facebook_url')): ?>
            <a href="<?php echo esc_url(get_theme_mod('facebook_url')); ?>" target="_blank" rel="noopener" class="social-icon facebook" title="Facebook">
                <i class="fab fa-facebook-f"></i>
            </a>
        <?php else: ?>
            <a href="https://www.facebook.com/aucto.creation" target="_blank" rel="noopener" class="social-icon facebook" title="Facebook">
                <i class="fab fa-facebook-f"></i>
            </a>
        <?php endif; ?>

        <?php if (get_theme_mod('youtube_url')): ?>
            <a href="<?php echo esc_url(get_theme_mod('youtube_url')); ?>" target="_blank" rel="noopener" class="social-icon youtube" title="YouTube">
                <i class="fab fa-youtube"></i>
            </a>
        <?php else: ?>
            <a href="https://www.youtube.com/c/AuctoCreation" target="_blank" rel="noopener" class="social-icon youtube" title="YouTube">
                <i class="fab fa-youtube"></i>
            </a>
        <?php endif; ?>

        <?php if (get_theme_mod('instagram_url')): ?>
            <a href="<?php echo esc_url(get_theme_mod('instagram_url')); ?>" target="_blank" rel="noopener" class="social-icon instagram" title="Instagram">
                <i class="fab fa-instagram"></i>
            </a>
        <?php else: ?>
            <a href="#" target="_blank" rel="noopener" class="social-icon instagram" title="Instagram">
                <i class="fab fa-instagram"></i>
            </a>
        <?php endif; ?>

        <div class="social-line"></div>
    </div>

    <!-- Page Content Starts Here -->