<?php

/**
 * WizcraftPro Theme Functions
 * Professional WordPress theme inspired by Wizcraft's corporate design
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Include required files
// require_once get_template_directory() . '/includes/class-wp-bootstrap-navwalker.php';

/**
 * Theme Setup
 */
function wizcraftpro_setup()
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
        'primary' => __('Primary Menu', 'wizcraftpro'),
        'footer' => __('Footer Menu', 'wizcraftpro')
    ));

    // Image sizes
    add_image_size('wizcraft-hero', 1920, 800, true);
    add_image_size('wizcraft-service', 400, 300, true);
    add_image_size('wizcraft-portfolio', 600, 400, true);
    add_image_size('wizcraft-team', 300, 300, true);
    add_image_size('wizcraft-client', 200, 100, true);
}
add_action('after_setup_theme', 'wizcraftpro_setup');

/**
 * Enqueue styles and scripts
 */
function wizcraftpro_scripts()
{
    // Google Fonts - Wizcraft professional font stack
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Playfair+Display:wght@400;500;600;700;800;900&display=swap',
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

    // AOS (Animate On Scroll) CSS
    wp_enqueue_style(
        'aos-css',
        'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css',
        array(),
        '2.3.4'
    );

    // Font Awesome 6
    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
        array(),
        '6.4.0'
    );

    // Swiper CSS for sliders
    wp_enqueue_style(
        'swiper-css',
        'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css',
        array(),
        '8.0.0'
    );

    // Main theme styles
    wp_enqueue_style(
        'wizcraftpro-style',
        get_stylesheet_uri(),
        array('bootstrap', 'aos-css'),
        wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'wizcraftpro_scripts', 5);

/**
 * Enqueue JavaScript files
 */
function wizcraftpro_scripts_js()
{
    // Bootstrap 5 JS Bundle
    wp_enqueue_script(
        'bootstrap-js',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js',
        array(),
        '5.3.0',
        true
    );

    // AOS (Animate On Scroll) JS
    wp_enqueue_script(
        'aos-js',
        'https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js',
        array(),
        '2.3.4',
        true
    );

    // Swiper JS
    wp_enqueue_script(
        'swiper-js',
        'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js',
        array(),
        '8.0.0',
        true
    );

    // Main theme JavaScript
    wp_enqueue_script(
        'wizcraftpro-js',
        get_stylesheet_directory_uri() . '/assets/js/main.js',
        array('jquery', 'bootstrap-js', 'aos-js'),
        wp_get_theme()->get('Version'),
        true
    );

    // Localize script for AJAX
    wp_localize_script('wizcraftpro-js', 'ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('wizcraftpro_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'wizcraftpro_scripts_js');

/**
 * Custom Post Types Registration
 */
function register_wizcraftpro_post_types()
{
    // Services Post Type
    register_post_type('services', array(
        'labels' => array(
            'name' => __('Services', 'wizcraftpro'),
            'singular_name' => __('Service', 'wizcraftpro'),
            'menu_name' => __('Services', 'wizcraftpro'),
            'add_new' => __('Add New Service', 'wizcraftpro'),
            'add_new_item' => __('Add New Service', 'wizcraftpro'),
            'edit_item' => __('Edit Service', 'wizcraftpro'),
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-admin-tools',
        'show_in_rest' => true,
    ));

    // Portfolio/Case Studies Post Type
    register_post_type('portfolio', array(
        'labels' => array(
            'name' => __('Portfolio', 'wizcraftpro'),
            'singular_name' => __('Portfolio Item', 'wizcraftpro'),
            'menu_name' => __('Portfolio', 'wizcraftpro'),
            'add_new' => __('Add New Project', 'wizcraftpro'),
            'add_new_item' => __('Add New Project', 'wizcraftpro'),
            'edit_item' => __('Edit Project', 'wizcraftpro'),
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-portfolio',
        'show_in_rest' => true,
    ));

    // Team Members Post Type
    register_post_type('team', array(
        'labels' => array(
            'name' => __('Team Members', 'wizcraftpro'),
            'singular_name' => __('Team Member', 'wizcraftpro'),
            'menu_name' => __('Team', 'wizcraftpro'),
            'add_new' => __('Add New Member', 'wizcraftpro'),
            'add_new_item' => __('Add New Team Member', 'wizcraftpro'),
            'edit_item' => __('Edit Team Member', 'wizcraftpro'),
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-groups',
        'show_in_rest' => true,
    ));

    // Testimonials Post Type
    register_post_type('testimonials', array(
        'labels' => array(
            'name' => __('Testimonials', 'wizcraftpro'),
            'singular_name' => __('Testimonial', 'wizcraftpro'),
            'menu_name' => __('Testimonials', 'wizcraftpro'),
            'add_new' => __('Add New Testimonial', 'wizcraftpro'),
            'add_new_item' => __('Add New Testimonial', 'wizcraftpro'),
            'edit_item' => __('Edit Testimonial', 'wizcraftpro'),
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-format-quote',
        'show_in_rest' => true,
    ));
}
add_action('init', 'register_wizcraftpro_post_types');

/**
 * Register Widget Areas
 */
function wizcraftpro_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'wizcraftpro'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'wizcraftpro'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Widget Area 1', 'wizcraftpro'),
        'id' => 'footer-1',
        'description' => esc_html__('Add widgets here.', 'wizcraftpro'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Widget Area 2', 'wizcraftpro'),
        'id' => 'footer-2',
        'description' => esc_html__('Add widgets here.', 'wizcraftpro'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Widget Area 3', 'wizcraftpro'),
        'id' => 'footer-3',
        'description' => esc_html__('Add widgets here.', 'wizcraftpro'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer Widget Area 4', 'wizcraftpro'),
        'id' => 'footer-4',
        'description' => esc_html__('Add widgets here.', 'wizcraftpro'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
}
add_action('widgets_init', 'wizcraftpro_widgets_init');

/**
 * Customize WP Admin
 */
function wizcraftpro_admin_style()
{
    echo '<style>
        #adminmenu .wp-has-current-submenu .wp-submenu, #adminmenu .wp-has-current-submenu .wp-submenu.wp-submenu-wrap, #adminmenu .wp-submenu, #adminmenu a.wp-has-current-submenu:focus + .wp-submenu {
            background: #ff6b00;
        }
        #adminmenu li.current a.menu-top, #adminmenu li.wp-has-current-submenu a.wp-has-current-submenu, #adminmenu li.wp-has-current-submenu.wp-menu-open a.wp-has-current-submenu, .wp-core-ui .button-primary {
            background: #ff6b00;
            border-color: #e55a00;
        }
    </style>';
}
add_action('admin_head', 'wizcraftpro_admin_style');

/**
 * Theme Customizer
 */
function wizcraftpro_customize_register($wp_customize)
{
    // Hero Section
    $wp_customize->add_section('wizcraftpro_hero', array(
        'title' => __('Hero Section', 'wizcraftpro'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('hero_title', array(
        'default' => 'Event Management Services That Turn Ideas into Reality',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_title', array(
        'label' => __('Hero Title', 'wizcraftpro'),
        'section' => 'wizcraftpro_hero',
        'type' => 'text',
    ));

    $wp_customize->add_setting('hero_subtitle', array(
        'default' => 'Wizcraft Entertainment Agency Pvt. Ltd. is a global experiential marketing company, delivering impact driven brand experiences.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('hero_subtitle', array(
        'label' => __('Hero Subtitle', 'wizcraftpro'),
        'section' => 'wizcraftpro_hero',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('hero_background_image');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_background_image', array(
        'label' => __('Hero Background Image', 'wizcraftpro'),
        'section' => 'wizcraftpro_hero',
    )));

    // Company Stats
    $wp_customize->add_section('wizcraftpro_stats', array(
        'title' => __('Company Statistics', 'wizcraftpro'),
        'priority' => 35,
    ));

    $wp_customize->add_setting('stat_years', array(
        'default' => '33+',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('stat_years', array(
        'label' => __('Years of Experience', 'wizcraftpro'),
        'section' => 'wizcraftpro_stats',
        'type' => 'text',
    ));

    $wp_customize->add_setting('stat_experiences', array(
        'default' => '10K+',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('stat_experiences', array(
        'label' => __('Experiences Created', 'wizcraftpro'),
        'section' => 'wizcraftpro_stats',
        'type' => 'text',
    ));

    $wp_customize->add_setting('stat_awards', array(
        'default' => '50+',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('stat_awards', array(
        'label' => __('Awards Won', 'wizcraftpro'),
        'section' => 'wizcraftpro_stats',
        'type' => 'text',
    ));
}
add_action('customize_register', 'wizcraftpro_customize_register');

// Clean up WordPress head
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');

/**
 * Add async/defer to scripts
 */
function wizcraftpro_script_loader_tag($tag, $handle, $src)
{
    $defer_scripts = array('aos-js', 'swiper-js');
    $async_scripts = array('font-awesome');

    if (in_array($handle, $defer_scripts)) {
        return str_replace(' src', ' defer src', $tag);
    }

    if (in_array($handle, $async_scripts)) {
        return str_replace(' src', ' async src', $tag);
    }

    return $tag;
}
add_filter('script_loader_tag', 'wizcraftpro_script_loader_tag', 10, 3);
