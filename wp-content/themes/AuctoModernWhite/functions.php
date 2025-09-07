<?php

/**
 * AuctoModernWhite Theme Functions
 * 
 * @package AuctoModernWhite
 * @version 2.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
	exit;
}

// Include menu serializer
require_once get_template_directory() . '/inc/menu-serializer.php';

/**
 * Theme Setup
 */
function auctocreation_theme_setup()
{
	// Add theme support for title tag
	add_theme_support('title-tag');

	// Add theme support for post thumbnails
	add_theme_support('post-thumbnails');

	// Add theme support for custom logo
	add_theme_support('custom-logo', array(
		'height' => 120,
		'width' => 300,
		'flex-height' => true,
		'flex-width' => true,
	));

	// Add theme support for HTML5 markup
	add_theme_support('html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	));

	// Add theme support for responsive embeds
	add_theme_support('responsive-embeds');

	// Add theme support for editor styles
	add_theme_support('editor-styles');

	// Register navigation menus
	register_nav_menus(array(
		'primary' => __('Primary Menu', 'auctocreation'),
		'footer' => __('Footer Menu', 'auctocreation')
	));

	// Add custom image sizes
	add_image_size('slides', 1200, 580, true);
	add_image_size('production_slides', 400, 300, true);
	add_image_size('festival', 400, 300, true);
	add_image_size('gallery_image', 1080, 640, true);
	add_image_size('owned_property_slides', 400, 300, true);
	add_image_size('achievement_slides', 600, 400, true);
}
add_action('after_setup_theme', 'auctocreation_theme_setup');

/**
 * Enqueue Styles and Scripts
 */
function auctocreation_enqueue_assets()
{
	// Modern CSS Framework (Bootstrap 5 – upgraded)
	wp_enqueue_style('bootstrap-5', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', array(), '5.3.3');

	// Font Awesome 6
	wp_enqueue_style('font-awesome-6', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0');

	// AOS Animation Library
	wp_enqueue_style('aos', 'https://unpkg.com/aos@2.3.1/dist/aos.css', array(), '2.3.1');

	// Google Fonts
	wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap', array(), null);

	// Gallery specific styles
	if (is_page_template('page-gallery.php') || is_page('gallery')) {
		wp_enqueue_style('lightgallery', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/css/lightgallery-bundle.min.css', array(), '2.7.1');
	}

	// Main theme stylesheet (should be last)
	wp_enqueue_style('auctocreation-style', get_stylesheet_uri(), array('bootstrap-5', 'font-awesome-6'), wp_get_theme()->get('Version'));

	// Header mobile styles
	wp_enqueue_style('header-styles', get_template_directory_uri() . '/css/header-styles.css', array('auctocreation-style'), wp_get_theme()->get('Version'));

	// JavaScript files
	wp_enqueue_script('bootstrap-5-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array(), '5.3.3', true);

	// AOS Animation
	wp_enqueue_script('aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), '2.3.1', true);

	// Gallery specific scripts
	if (is_page_template('page-gallery.php') || is_page('gallery')) {
		wp_enqueue_script('lightgallery-js', 'https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/lightgallery.min.js', array('jquery'), '2.7.1', true);
	} else {
		// Google Maps for contact section
		wp_enqueue_script('google-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU', array(), null, true);
	}

	// Theme custom scripts
	wp_enqueue_script('auctocreation-app', get_template_directory_uri() . '/app.js', array('jquery', 'bootstrap-5-js'), wp_get_theme()->get('Version'), true);

	// Localize script for AJAX
	wp_localize_script('auctocreation-app', 'auctocreation_ajax', array(
		'ajax_url' => admin_url('admin-ajax.php'),
		'nonce' => wp_create_nonce('auctocreation_nonce'),
		'home_url' => home_url('/'),
		'current_page' => get_queried_object_id(),
		'is_home' => is_front_page(),
		'is_services' => is_page('services')
	));
}
add_action('wp_enqueue_scripts', 'auctocreation_enqueue_assets');

/**
 * Add custom body classes
 */
function auctocreation_body_classes($classes)
{
	$classes[] = 'modern-theme';

	if (is_front_page()) {
		$classes[] = 'home-page';
	}

	if (is_page_template('page-gallery.php')) {
		$classes[] = 'gallery-page';
	}

	return $classes;
}
add_filter('body_class', 'auctocreation_body_classes');

/**
 * Customize excerpt length
 */
function auctocreation_excerpt_length($length)
{
	return 25;
}
add_filter('excerpt_length', 'auctocreation_excerpt_length');

/**
 * Customize excerpt more text
 */
function auctocreation_excerpt_more($more)
{
	return '...';
}
add_filter('excerpt_more', 'auctocreation_excerpt_more');

/**
 * Remove unnecessary WordPress features for performance
 */
function auctocreation_cleanup()
{
	// Remove emoji scripts
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('wp_print_styles', 'print_emoji_styles');

	// Remove unnecessary WordPress generator meta tag
	remove_action('wp_head', 'wp_generator');

	// Remove Windows Live Writer manifest
	remove_action('wp_head', 'wlwmanifest_link');
}
add_action('init', 'auctocreation_cleanup');

/**
 * Add security headers
 */
function auctocreation_security_headers()
{
	if (!is_admin()) {
		header('X-Content-Type-Options: nosniff');
		header('X-Frame-Options: SAMEORIGIN');
		header('X-XSS-Protection: 1; mode=block');
	}
}
add_action('send_headers', 'auctocreation_security_headers');

/**
 * Auto-create and serialize navigation menus based on template parts
 */
function auctocreation_create_default_menus()
{
	// Check if menus already exist
	$primary_menu = wp_get_nav_menu_object('Primary Navigation');
	$footer_menu = wp_get_nav_menu_object('Footer Navigation');

	// Create Primary Navigation Menu
	if (!$primary_menu) {
		$primary_menu_id = wp_create_nav_menu('Primary Navigation');

		if (!is_wp_error($primary_menu_id)) {
			// Define menu items based on template parts and sections
			$menu_items = array(
				array(
					'menu-item-title' => 'Home',
					'menu-item-url' => home_url('/#myPage'),
					'menu-item-status' => 'publish',
					'menu-item-type' => 'custom'
				),
				array(
					'menu-item-title' => 'About Us',
					'menu-item-url' => home_url('/#about'),
					'menu-item-status' => 'publish',
					'menu-item-type' => 'custom'
				),
				array(
					'menu-item-title' => 'Services',
					'menu-item-url' => home_url('/#services'),
					'menu-item-status' => 'publish',
					'menu-item-type' => 'custom'
				),
				array(
					'menu-item-title' => 'Clients',
					'menu-item-url' => home_url('/#clients'),
					'menu-item-status' => 'publish',
					'menu-item-type' => 'custom'
				),
				array(
					'menu-item-title' => 'Achievements',
					'menu-item-url' => home_url('/#achievements'),
					'menu-item-status' => 'publish',
					'menu-item-type' => 'custom'
				),
				array(
					'menu-item-title' => 'Our Work',
					'menu-item-url' => home_url('/services'),
					'menu-item-status' => 'publish',
					'menu-item-type' => 'custom'
				),
				// array(
				// 	'menu-item-title' => 'Gallery',
				// 	'menu-item-url' => home_url('/gallery'),
				// 	'menu-item-status' => 'publish',
				// 	'menu-item-type' => 'custom'
				// ),
				array(
					'menu-item-title' => 'Contact',
					'menu-item-url' => home_url('/#contact'),
					'menu-item-status' => 'publish',
					'menu-item-type' => 'custom'
				)
			);

			// Add menu items
			foreach ($menu_items as $item) {
				wp_update_nav_menu_item($primary_menu_id, 0, $item);
			}

			// Assign menu to location
			$locations = get_theme_mod('nav_menu_locations');
			$locations['primary'] = $primary_menu_id;
			set_theme_mod('nav_menu_locations', $locations);
		}
	}

	// Create Footer Navigation Menu
	if (!$footer_menu) {
		$footer_menu_id = wp_create_nav_menu('Footer Navigation');

		if (!is_wp_error($footer_menu_id)) {
			// Define footer menu items
			$footer_menu_items = array(
				array(
					'menu-item-title' => 'Privacy Policy',
					'menu-item-url' => home_url('/privacy-policy'),
					'menu-item-status' => 'publish',
					'menu-item-type' => 'custom'
				),
				array(
					'menu-item-title' => 'Terms & Conditions',
					'menu-item-url' => home_url('/terms-conditions'),
					'menu-item-status' => 'publish',
					'menu-item-type' => 'custom'
				)
			);

			// Add footer menu items
			foreach ($footer_menu_items as $item) {
				wp_update_nav_menu_item($footer_menu_id, 0, $item);
			}

			// Assign footer menu to location
			$locations = get_theme_mod('nav_menu_locations');
			$locations['footer'] = $footer_menu_id;
			set_theme_mod('nav_menu_locations', $locations);
		}
	}
}

/**
 * Create menus on theme activation
 */
function auctocreation_after_switch_theme()
{
	auctocreation_create_default_menus();
	auctocreation_create_services_page();
}
add_action('after_switch_theme', 'auctocreation_after_switch_theme');

/**
 * Create Services Page automatically
 */
function auctocreation_create_services_page()
{
	// Check if Services page already exists
	$services_page = get_page_by_path('services');

	if (!$services_page) {
		// Create the Services page
		$page_data = array(
			'post_title'    => 'Our Work',
			'post_name'     => 'services',
			'post_content'  => 'This page showcases our comprehensive range of services including festivals, intellectual property management, corporate events, exhibitions, and brand activation.',
			'post_status'   => 'publish',
			'post_type'     => 'page',
			'post_author'   => 1,
			'page_template' => 'page-services.php'
		);

		$page_id = wp_insert_post($page_data);

		if ($page_id && !is_wp_error($page_id)) {
			// Set the page template
			update_post_meta($page_id, '_wp_page_template', 'page-services.php');
		}
	}
}

/**
 * Menu Walker for custom navigation styling
 */
class Auctocreation_Walker_Nav_Menu extends Walker_Nav_Menu
{
	/**
	 * Start Level - Add CSS classes to submenu
	 */
	function start_lvl(&$output, $depth = 0, $args = null)
	{
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"dropdown-menu\">\n";
	}

	/**
	 * Start Element - Add CSS classes to menu items
	 */
	function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
	{
		$indent = ($depth) ? str_repeat("\t", $depth) : '';

		$classes = empty($item->classes) ? array() : (array) $item->classes;
		$classes[] = 'nav-item';

		$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
		$class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

		$id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
		$id = $id ? ' id="' . esc_attr($id) . '"' : '';

		$output .= $indent . '<li' . $id . $class_names . '>';

		$attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
		$attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
		$attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';

		// Add smart navigation class for section links
		$link_class = 'nav-link';
		$data_attributes = '';

		if (strpos($item->url, '#') !== false) {
			$link_class .= ' smart-nav-link';
			// Extract the section from the URL
			$url_parts = parse_url($item->url);
			if (isset($url_parts['fragment'])) {
				$data_attributes .= ' data-section="' . esc_attr($url_parts['fragment']) . '"';
			}
		}

		$attributes .= ' class="' . $link_class . '"';
		$attributes .= $data_attributes;
		$attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

		$item_output = isset($args->before) ? $args->before : '';
		$item_output .= '<a' . $attributes . '>';
		$item_output .= (isset($args->link_before) ? $args->link_before : '') . apply_filters('the_title', $item->title, $item->ID) . (isset($args->link_after) ? $args->link_after : '');
		$item_output .= '</a>';
		$item_output .= isset($args->after) ? $args->after : '';

		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
	}
}

/**
 * Get section navigation array for easy management
 */
function auctocreation_get_section_navigation()
{
	return array(
		'myPage' => array(
			'title' => 'Home',
			'template' => 'banner-home',
			'description' => 'Hero banner section with main call-to-action'
		),
		'about' => array(
			'title' => 'About Us',
			'template' => 'about-home',
			'description' => 'Company story, mission, and team information'
		),
		'clients' => array(
			'title' => 'Our Clients',
			'template' => 'clients-home',
			'description' => 'Showcase of client testimonials and logos'
		),
		'services' => array(
			'title' => 'Services',
			'template' => 'services-home',
			'description' => 'Complete list of our event management services'
		),
		'achievements' => array(
			'title' => 'Achievements',
			'template' => 'achievement-home',
			'description' => 'Awards, recognitions, and success stories'
		),
		'contact' => array(
			'title' => 'Contact Us',
			'template' => 'contact-home',
			'description' => 'Contact form and business information'
		)
	);
}

/**
 * Fallback menu if no menu is assigned
 */
function auctocreation_fallback_menu()
{
	$sections = auctocreation_get_section_navigation();
	echo '<ul class="navbar-nav ms-auto">';

	foreach ($sections as $section_id => $section_data) {
		$url = home_url('/#' . $section_id);
		$class = 'nav-link smart-nav-link';

		echo '<li class="nav-item">';
		echo '<a class="' . $class . '" href="' . esc_url($url) . '" data-section="' . esc_attr($section_id) . '">' . esc_html($section_data['title']) . '</a>';
		echo '</li>';
	}

	// Add Our Work link
	echo '<li class="nav-item">';
	echo '<a class="nav-link" href="' . esc_url(home_url('/services')) . '">Our Work</a>';
	echo '</li>';

	// Add Gallery link
	// echo '<li class="nav-item">';
	// echo '<a class="nav-link" href="' . esc_url(home_url('/gallery')) . '">Gallery</a>';
	// echo '</li>';

	echo '</ul>';
}
