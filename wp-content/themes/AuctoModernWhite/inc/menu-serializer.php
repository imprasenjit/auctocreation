<?php

/**
 * Menu Serialization and Management Utilities
 * 
 * @package AuctoModernWhite
 * @version 2.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Menu Serializer Class
 */
class AuctoCreation_Menu_Serializer
{
    /**
     * Serialize current menu structure to JSON
     */
    public static function export_menus_to_json()
    {
        $menus = wp_get_nav_menus();
        $menu_data = array();

        foreach ($menus as $menu) {
            $menu_items = wp_get_nav_menu_items($menu->term_id);
            $serialized_items = array();

            foreach ($menu_items as $item) {
                $serialized_items[] = array(
                    'title' => $item->title,
                    'url' => $item->url,
                    'description' => $item->description,
                    'attr_title' => $item->attr_title,
                    'target' => $item->target,
                    'classes' => $item->classes,
                    'xfn' => $item->xfn,
                    'menu_order' => $item->menu_order,
                    'parent_id' => $item->menu_item_parent
                );
            }

            $menu_data[$menu->slug] = array(
                'name' => $menu->name,
                'description' => $menu->description,
                'items' => $serialized_items
            );
        }

        return json_encode($menu_data, JSON_PRETTY_PRINT);
    }

    /**
     * Import menu structure from JSON
     */
    public static function import_menus_from_json($json_data)
    {
        $menu_data = json_decode($json_data, true);

        if (!$menu_data) {
            return new WP_Error('invalid_json', 'Invalid JSON data provided');
        }

        foreach ($menu_data as $menu_slug => $menu_info) {
            // Create menu if it doesn't exist
            $menu_id = wp_create_nav_menu($menu_info['name']);

            if (is_wp_error($menu_id)) {
                continue;
            }

            // Add menu items
            foreach ($menu_info['items'] as $item_data) {
                $menu_item_args = array(
                    'menu-item-title' => $item_data['title'],
                    'menu-item-url' => $item_data['url'],
                    'menu-item-description' => $item_data['description'],
                    'menu-item-attr-title' => $item_data['attr_title'],
                    'menu-item-target' => $item_data['target'],
                    'menu-item-classes' => implode(' ', $item_data['classes']),
                    'menu-item-xfn' => $item_data['xfn'],
                    'menu-item-position' => $item_data['menu_order'],
                    'menu-item-status' => 'publish',
                    'menu-item-type' => 'custom'
                );

                wp_update_nav_menu_item($menu_id, 0, $menu_item_args);
            }
        }

        return true;
    }

    /**
     * Get template-based menu structure
     */
    public static function get_template_based_menu_structure()
    {
        return array(
            'primary-navigation' => array(
                'name' => 'Primary Navigation',
                'description' => 'Main navigation menu based on template parts',
                'items' => array(
                    array(
                        'title' => 'Home',
                        'url' => home_url('/#myPage'),
                        'description' => 'Navigate to hero banner section',
                        'attr_title' => 'Home Section',
                        'target' => '',
                        'classes' => array('smooth-scroll'),
                        'xfn' => '',
                        'menu_order' => 1,
                        'parent_id' => 0
                    ),
                    array(
                        'title' => 'Services',
                        'url' => home_url('/#services'),
                        'description' => 'Our event management services',
                        'attr_title' => 'Services Section',
                        'target' => '',
                        'classes' => array('smooth-scroll'),
                        'xfn' => '',
                        'menu_order' => 2,
                        'parent_id' => 0
                    ),
                    array(
                        'title' => 'Clients',
                        'url' => home_url('/#clients'),
                        'description' => 'Our valued clients and testimonials',
                        'attr_title' => 'Clients Section',
                        'target' => '',
                        'classes' => array('smooth-scroll'),
                        'xfn' => '',
                        'menu_order' => 3,
                        'parent_id' => 0
                    ),
                    array(
                        'title' => 'Achievements',
                        'url' => home_url('/#achievements'),
                        'description' => 'Awards and recognitions',
                        'attr_title' => 'Achievements Section',
                        'target' => '',
                        'classes' => array('smooth-scroll'),
                        'xfn' => '',
                        'menu_order' => 4,
                        'parent_id' => 0
                    ),
                    array(
                        'title' => 'Gallery',
                        'url' => home_url('/gallery'),
                        'description' => 'Complete photo gallery',
                        'attr_title' => 'Gallery Page',
                        'target' => '',
                        'classes' => array(),
                        'xfn' => '',
                        'menu_order' => 5,
                        'parent_id' => 0
                    ),
                    array(
                        'title' => 'Contact',
                        'url' => home_url('/#contact'),
                        'description' => 'Get in touch with us',
                        'attr_title' => 'Contact Section',
                        'target' => '',
                        'classes' => array('smooth-scroll'),
                        'xfn' => '',
                        'menu_order' => 6,
                        'parent_id' => 0
                    )
                )
            ),
            'footer-navigation' => array(
                'name' => 'Footer Navigation',
                'description' => 'Footer links for legal pages',
                'items' => array(
                    array(
                        'title' => 'Privacy Policy',
                        'url' => home_url('/privacy-policy'),
                        'description' => 'Privacy policy page',
                        'attr_title' => 'Privacy Policy',
                        'target' => '',
                        'classes' => array(),
                        'xfn' => '',
                        'menu_order' => 1,
                        'parent_id' => 0
                    ),
                    array(
                        'title' => 'Terms & Conditions',
                        'url' => home_url('/terms-conditions'),
                        'description' => 'Terms and conditions page',
                        'attr_title' => 'Terms & Conditions',
                        'target' => '',
                        'classes' => array(),
                        'xfn' => '',
                        'menu_order' => 2,
                        'parent_id' => 0
                    )
                )
            )
        );
    }

    /**
     * Create menus from template structure
     */
    public static function create_template_based_menus()
    {
        $menu_structure = self::get_template_based_menu_structure();

        foreach ($menu_structure as $menu_slug => $menu_data) {
            // Check if menu already exists
            $existing_menu = wp_get_nav_menu_object($menu_data['name']);

            if (!$existing_menu) {
                // Create new menu
                $menu_id = wp_create_nav_menu($menu_data['name']);

                if (!is_wp_error($menu_id)) {
                    // Add menu items
                    foreach ($menu_data['items'] as $item) {
                        $menu_item_args = array(
                            'menu-item-title' => $item['title'],
                            'menu-item-url' => $item['url'],
                            'menu-item-description' => $item['description'],
                            'menu-item-attr-title' => $item['attr_title'],
                            'menu-item-target' => $item['target'],
                            'menu-item-classes' => implode(' ', $item['classes']),
                            'menu-item-xfn' => $item['xfn'],
                            'menu-item-position' => $item['menu_order'],
                            'menu-item-status' => 'publish',
                            'menu-item-type' => 'custom'
                        );

                        wp_update_nav_menu_item($menu_id, 0, $menu_item_args);
                    }

                    // Assign to location
                    $location = ($menu_slug === 'primary-navigation') ? 'primary' : 'footer';
                    $locations = get_theme_mod('nav_menu_locations');
                    $locations[$location] = $menu_id;
                    set_theme_mod('nav_menu_locations', $locations);
                }
            }
        }

        return true;
    }

    /**
     * Reset and recreate all menus
     */
    public static function reset_and_recreate_menus()
    {
        // Delete existing menus
        $existing_menus = wp_get_nav_menus();
        foreach ($existing_menus as $menu) {
            wp_delete_nav_menu($menu->term_id);
        }

        // Create new menus from template
        return self::create_template_based_menus();
    }
}

/**
 * Initialize menu serializer on admin
 */
if (is_admin()) {
    add_action('admin_menu', function () {
        add_submenu_page(
            'themes.php',
            'Menu Serializer',
            'Menu Serializer',
            'manage_options',
            'menu-serializer',
            'auctocreation_menu_serializer_page'
        );
    });
}

/**
 * Admin page for menu serializer
 */
function auctocreation_menu_serializer_page()
{
    if (isset($_POST['export_menus'])) {
        $json_data = AuctoCreation_Menu_Serializer::export_menus_to_json();
        echo '<div class="notice notice-success"><p>Menu structure exported successfully!</p></div>';
        echo '<textarea rows="20" cols="80" readonly>' . esc_textarea($json_data) . '</textarea>';
    }

    if (isset($_POST['create_template_menus'])) {
        AuctoCreation_Menu_Serializer::create_template_based_menus();
        echo '<div class="notice notice-success"><p>Template-based menus created successfully!</p></div>';
    }

    if (isset($_POST['reset_menus'])) {
        AuctoCreation_Menu_Serializer::reset_and_recreate_menus();
        echo '<div class="notice notice-success"><p>Menus reset and recreated successfully!</p></div>';
    }

?>
    <div class="wrap">
        <h1>Menu Serializer</h1>

        <div class="card">
            <h2>Export Current Menus</h2>
            <form method="post">
                <input type="submit" name="export_menus" class="button button-primary" value="Export Menus to JSON">
            </form>
        </div>

        <div class="card">
            <h2>Create Template-Based Menus</h2>
            <p>Create menus based on your template parts and sections.</p>
            <form method="post">
                <input type="submit" name="create_template_menus" class="button button-secondary" value="Create Template Menus">
            </form>
        </div>

        <div class="card">
            <h2>Reset All Menus</h2>
            <p><strong>Warning:</strong> This will delete all existing menus and create new template-based ones.</p>
            <form method="post">
                <input type="submit" name="reset_menus" class="button button-danger" value="Reset & Recreate Menus"
                    onclick="return confirm('Are you sure? This will delete all existing menus.')">
            </form>
        </div>
    </div>
<?php
}
