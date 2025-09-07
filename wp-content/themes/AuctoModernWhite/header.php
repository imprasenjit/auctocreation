<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- SEO Meta Tags -->
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="keywords" content="event management, auctocreation, events, festivals, production">
    <meta name="author" content="<?php bloginfo('name'); ?>">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="<?php bloginfo('name'); ?>">
    <meta property="og:description" content="<?php bloginfo('description'); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo home_url(); ?>">

    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>

    <!-- Favicon -->
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/logo/logo.jpg" type="image/jpeg">
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/logo/logo.jpg">

    <!-- Preconnect to Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- WordPress Head -->
    <?php wp_head(); ?>

    <!-- (Bootstrap, FontAwesome, AOS, Theme styles enqueued via wp_head) -->
</head>

<body <?php body_class('modern-theme'); ?> id="myPage"><?php wp_body_open(); ?>

    <!-- Skip to main content for accessibility -->
    <a class="skip-to-content" href="#main-content">Skip to main content</a>

    <!-- Modern Overlay Navigation -->
    <header class="modern-navbar" role="banner"><!-- removed .container earlier; keeping full-width wrapper -->
        <div class="nav-accent-bar"></div>
        <nav class="navbar navbar-expand-lg fixed-top nav-surface simple-nav" id="mainNavbar" data-nav-sticky>
            <div class="container"><!-- changed from container-fluid px-4 to container for fixed max-width -->

                <!-- Brand/Logo -->
                <a class="navbar-brand" href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
                    <img class="logo-img"
                        src="<?php echo get_template_directory_uri(); ?>/images/logo/logo.jpg"
                        alt="<?php bloginfo('name'); ?> Logo"
                        width="100"
                        height="70">
                    <!-- <span class="brand-text d-none d-md-inline ms-2"><?php bloginfo('name'); ?></span> -->
                </a>

                <!-- Mobile Menu Toggle -->
                <button class="navbar-toggler custom-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarNav"
                    aria-controls="navbarNav"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="toggler-line"></span>
                    <span class="toggler-line"></span>
                    <span class="toggler-line"></span>
                </button>

                <!-- Navigation Menu -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class' => 'navbar-nav ms-auto',
                        'container' => false,
                        'walker' => new Auctocreation_Walker_Nav_Menu(),
                        'fallback_cb' => 'auctocreation_fallback_menu'
                    ));
                    ?>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main id="main-content" role="main">