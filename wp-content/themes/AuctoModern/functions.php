<?php

/**
 * AuctoModern Theme Functions
 * Modern WordPress theme for Auctocreation with Bootstrap 5 and contemporary features
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}


// Include required files
require_once get_stylesheet_directory() . '/inc/nav-walker.php';

/**
 * Theme Setup
 */
function auctocreation_modern_setup()
{
    // Add theme support for various features
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ));

    // Add theme support for responsive embeds
    add_theme_support('responsive-embeds');

    // Add theme support for editor styles
    add_theme_support('editor-styles');

    // Navigation Menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'auctocreation-modern'),
        'footer' => __('Footer Menu', 'auctocreation-modern')
    ));

    // Image sizes - keeping same as original theme
    add_image_size('slides', 1200, 580, true);
    add_image_size('production_slides', 400, 300, true);
    add_image_size('festival', 400, 300, true);
    add_image_size('gallery_image', 1080, 640, true);
    add_image_size('owned_property_slides', 400, 300, true);
    add_image_size('achievement_slides', 600, 400, true);

    // Add modern image sizes
    add_image_size('hero_slide', 1920, 800, true);
    add_image_size('card_image', 350, 250, true);
    add_image_size('thumbnail_modern', 200, 200, true);
}
add_action('after_setup_theme', 'auctocreation_modern_setup');

/**
 * Enqueue styles and scripts
 */
function auctocreation_modern_scripts()
{
    // Google Fonts - EventCon style font stack
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&family=Oswald:wght@300;400;500;600;700&family=Open+Sans:wght@300;400;600;700;800&display=swap',
        array(),
        null
    );

    // Bootstrap 5 CSS
    wp_enqueue_style(
        'bootstrap',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css',
        array(),
        '5.3.0'
    );

    // Font Awesome 6
    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
        array(),
        '6.4.0'
    );

    // AOS (Animate On Scroll) CSS
    wp_enqueue_style(
        'aos-css',
        'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css',
        array(),
        '2.3.4'
    );

    // Gallery specific styles
    if (is_page('gallery') || basename(get_permalink()) === 'gallery') {
        wp_enqueue_style(
            'lightgallery-css',
            'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/css/lightgallery-bundle.min.css',
            array(),
            '2.7.1'
        );
    }

    // Main theme styles
    wp_enqueue_style(
        'auctocreation-modern-style',
        get_stylesheet_uri(),
        array('bootstrap'),
        wp_get_theme()->get('Version')
    );

    // Custom CSS file
    wp_enqueue_style(
        'custom-styles',
        get_stylesheet_directory_uri() . '/assets/css/custom.css',
        array('auctocreation-modern-style'),
        wp_get_theme()->get('Version')
    );

    // Modern Sections CSS
    wp_enqueue_style(
        'modern-sections',
        get_stylesheet_directory_uri() . '/assets/css/modern-sections.css',
        array('auctocreation-modern-style'),
        wp_get_theme()->get('Version')
    );

    // WordPress Dynamic Content CSS
    wp_enqueue_style(
        'wordpress-dynamic',
        get_stylesheet_directory_uri() . '/assets/css/wordpress-dynamic.css',
        array('modern-sections'),
        wp_get_theme()->get('Version')
    );

    // JavaScript Enhancement Styles
    wp_enqueue_style(
        'js-enhancements',
        get_stylesheet_directory_uri() . '/assets/css/js-enhancements.css',
        array('wordpress-dynamic'),
        wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'auctocreation_modern_scripts', 5); // Higher priority

/**
 * Enqueue JavaScript files
 */
function auctocreation_modern_scripts_js()
{
    // Bootstrap 5 JS Bundle (includes Popper)
    wp_enqueue_script(
        'bootstrap-js',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js',
        array(),
        '5.3.0',
        true
    );

    // Gallery specific scripts
    if (is_page('gallery') || basename(get_permalink()) === 'gallery') {
        wp_enqueue_script(
            'lightgallery-js',
            'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/lightgallery.min.js',
            array('jquery'),
            '2.7.1',
            true
        );

        wp_enqueue_script(
            'gallery-custom-js',
            get_stylesheet_directory_uri() . '/assets/js/gallery.js',
            array('lightgallery-js'),
            wp_get_theme()->get('Version'),
            true
        );
    } else {
        // Google Maps API (disabled for now - uncomment when needed)
        /*
        wp_enqueue_script(
            'google-maps',
            'https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=initMap',
            array(),
            null,
            true
        );
        */
    }

    // Main theme JavaScript
    wp_enqueue_script(
        'auctocreation-modern-js',
        get_stylesheet_directory_uri() . '/assets/js/main.js',
        array('jquery', 'bootstrap-js'),
        wp_get_theme()->get('Version'),
        true
    );

    // AOS (Animate On Scroll) JavaScript
    wp_enqueue_script(
        'aos-js',
        'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js',
        array('jquery'),
        '2.3.4',
        true
    );

    // Theme Coordinator (handles initialization and error management)
    wp_enqueue_script(
        'theme-coordinator-js',
        get_stylesheet_directory_uri() . '/assets/js/theme-coordinator.js',
        array('jquery', 'bootstrap-js', 'aos-js'),
        wp_get_theme()->get('Version'),
        true
    );

    // Modern Sections JavaScript
    wp_enqueue_script(
        'modern-sections-js',
        get_stylesheet_directory_uri() . '/assets/js/modern-sections.js',
        array('jquery', 'auctocreation-modern-js', 'theme-coordinator-js'),
        wp_get_theme()->get('Version'),
        true
    );

    // WordPress Dynamic Content JavaScript
    wp_enqueue_script(
        'wordpress-dynamic-js',
        get_stylesheet_directory_uri() . '/assets/js/wordpress-dynamic.js',
        array('jquery', 'modern-sections-js'),
        wp_get_theme()->get('Version'),
        true
    );

    // Debug Helper (only for logged-in users or when WP_DEBUG is true)
    if (current_user_can('manage_options') || (defined('WP_DEBUG') && WP_DEBUG)) {
        wp_enqueue_script(
            'debug-helper-js',
            get_stylesheet_directory_uri() . '/assets/js/debug-helper.js',
            array('theme-coordinator-js'),
            wp_get_theme()->get('Version'),
            true
        );
    }

    // Localize script for AJAX
    wp_localize_script('auctocreation-modern-js', 'ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('auctocreation_nonce')
    ));

    // Localize script for Modern Sections with theme directory
    wp_localize_script('modern-sections-js', 'modern_theme_object', array(
        'theme_url' => get_stylesheet_directory_uri(),
        'images_url' => get_stylesheet_directory_uri() . '/assets/images/backgrounds/'
    ));
}
add_action('wp_enqueue_scripts', 'auctocreation_modern_scripts_js');

/**
 * Custom Post Types Registration
 */
function register_custom_post_types()
{
    // Slides Post Type
    register_post_type('slides', array(
        'labels' => array(
            'name' => 'Slides',
            'singular_name' => 'Slide',
            'add_new' => 'Add New Slide',
            'add_new_item' => 'Add New Slide',
            'edit_item' => 'Edit Slide',
            'new_item' => 'New Slide',
            'view_item' => 'View Slide',
            'search_items' => 'Search Slides',
            'not_found' => 'No slides found',
            'not_found_in_trash' => 'No slides found in trash'
        ),
        'public' => true,
        'has_archive' => false,
        'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
        'menu_icon' => 'dashicons-images-alt2',
        'show_in_rest' => true
    ));

    // Add other custom post types as needed
    // Productions, Festivals, Achievements, etc.
}
add_action('init', 'register_custom_post_types');

/**
 * Customizer API
 */
function auctocreation_modern_customize_register($wp_customize)
{
    // Hero Section
    $wp_customize->add_section('hero_section', array(
        'title' => __('Hero Section', 'auctocreation-modern'),
        'priority' => 30
    ));

    $wp_customize->add_setting('hero_title', array(
        'default' => 'Auctocreation',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('hero_title', array(
        'label' => __('Hero Title', 'auctocreation-modern'),
        'section' => 'hero_section',
        'type' => 'text'
    ));

    $wp_customize->add_setting('hero_subtitle', array(
        'default' => 'We believe that every event is a unique story waiting to be told.',
        'sanitize_callback' => 'sanitize_textarea_field'
    ));

    $wp_customize->add_control('hero_subtitle', array(
        'label' => __('Hero Subtitle', 'auctocreation-modern'),
        'section' => 'hero_section',
        'type' => 'textarea'
    ));

    // Colors
    $wp_customize->add_section('theme_colors', array(
        'title' => __('Theme Colors', 'auctocreation-modern'),
        'priority' => 40
    ));

    $wp_customize->add_setting('primary_color', array(
        'default' => '#2c3e50',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
        'label' => __('Primary Color', 'auctocreation-modern'),
        'section' => 'theme_colors'
    )));

    $wp_customize->add_setting('accent_color', array(
        'default' => '#e74c3c',
        'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'accent_color', array(
        'label' => __('Accent Color', 'auctocreation-modern'),
        'section' => 'theme_colors'
    )));
}
add_action('customize_register', 'auctocreation_modern_customize_register');

/**
 * Widget Areas
 */
function auctocreation_modern_widgets_init()
{
    register_sidebar(array(
        'name' => __('Footer Widget Area', 'auctocreation-modern'),
        'id' => 'footer-widget-area',
        'description' => __('Appears in the footer area', 'auctocreation-modern'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));
}
add_action('widgets_init', 'auctocreation_modern_widgets_init');

/**
 * Security enhancements
 */
// Remove WordPress version number
remove_action('wp_head', 'wp_generator');

// Remove RSD link
remove_action('wp_head', 'rsd_link');

// Remove Windows Live Writer link
remove_action('wp_head', 'wlwmanifest_link');

/**
 * Performance optimizations
 */
// Remove query strings from static resources
function remove_query_strings($src)
{
    $parts = explode('?ver', $src);
    return $parts[0];
}
add_filter('script_loader_src', 'remove_query_strings', 15, 1);
add_filter('style_loader_src', 'remove_query_strings', 15, 1);

/**
 * Custom excerpt length
 */
function auctocreation_modern_excerpt_length($length)
{
    return 25;
}
add_filter('excerpt_length', 'auctocreation_modern_excerpt_length', 999);

/**
 * Custom excerpt more
 */
function auctocreation_modern_excerpt_more($more)
{
    return '...';
}
add_filter('excerpt_more', 'auctocreation_modern_excerpt_more');

/**
 * Add preload for critical resources
 */
function add_preload_resources()
{
    // Preload Google Fonts
    echo '<link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">' . "\n";
    echo '<noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap"></noscript>' . "\n";
}
add_action('wp_head', 'add_preload_resources', 1);

/**
 * Add theme meta tags
 */
function add_theme_meta_tags()
{
    echo '<meta name="theme-color" content="#2c3e50">' . "\n";
    echo '<meta name="msapplication-TileColor" content="#2c3e50">' . "\n";
}
add_action('wp_head', 'add_theme_meta_tags', 2);

/**
 * Customizer Settings for Wizcraft Banner
 */
function auctocreation_customize_register($wp_customize)
{
    // Wizcraft Hero Section
    $wp_customize->add_section('wizcraft_hero_section', array(
        'title' => 'Wizcraft Hero Banner',
        'description' => 'Customize the main hero banner settings',
        'priority' => 30,
    ));

    // Hero Main Title
    $wp_customize->add_setting('hero_main_title', array(
        'default' => 'Event Management Services That Turn <span class="text-orange">Ideas into Reality</span>',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control('hero_main_title', array(
        'label' => 'Hero Main Title',
        'section' => 'wizcraft_hero_section',
        'type' => 'textarea',
        'description' => 'Use HTML tags for styling. Use <span class="text-orange">text</span> for orange colored text.',
    ));

    // Hero Subtitle
    $wp_customize->add_setting('hero_subtitle', array(
        'default' => 'Creating extraordinary experiences through innovative event management, brand communication, and digital marketing solutions that drive business outcomes.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('hero_subtitle', array(
        'label' => 'Hero Subtitle',
        'section' => 'wizcraft_hero_section',
        'type' => 'textarea',
    ));

    // Hero Main Image
    $wp_customize->add_setting('hero_main_image', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_main_image', array(
        'label' => 'Hero Main Image',
        'section' => 'wizcraft_hero_section',
        'description' => 'Upload the main hero image (recommended size: 600x500px)',
    )));

    // Company Information Section
    $wp_customize->add_section('company_info_section', array(
        'title' => 'Company Information',
        'description' => 'Set your company details',
        'priority' => 31,
    ));

    // Company Phone
    $wp_customize->add_setting('company_phone', array(
        'default' => '+91 98765 43210',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('company_phone', array(
        'label' => 'Company Phone',
        'section' => 'company_info_section',
        'type' => 'text',
    ));

    // Company Email
    $wp_customize->add_setting('company_email', array(
        'default' => 'info@yourcompany.com',
        'sanitize_callback' => 'sanitize_email',
    ));

    $wp_customize->add_control('company_email', array(
        'label' => 'Company Email',
        'section' => 'company_info_section',
        'type' => 'email',
    ));

    // Company Address
    $wp_customize->add_setting('company_address', array(
        'default' => 'Your Company Address, City, State - PIN Code',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('company_address', array(
        'label' => 'Company Address',
        'section' => 'company_info_section',
        'type' => 'textarea',
    ));

    // Social Media Section
    $wp_customize->add_section('social_media_section', array(
        'title' => 'Social Media Links',
        'description' => 'Add your social media profile URLs',
        'priority' => 32,
    ));

    // Social media links
    $social_platforms = array(
        'facebook' => 'Facebook URL',
        'twitter' => 'Twitter URL',
        'linkedin' => 'LinkedIn URL',
        'instagram' => 'Instagram URL',
        'youtube' => 'YouTube URL'
    );

    foreach ($social_platforms as $platform => $label) {
        $wp_customize->add_setting($platform . '_url', array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control($platform . '_url', array(
            'label' => $label,
            'section' => 'social_media_section',
            'type' => 'url',
        ));
    }
}
add_action('customize_register', 'auctocreation_customize_register');
