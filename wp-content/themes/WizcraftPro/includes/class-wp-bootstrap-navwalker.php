<?php

/**
 * WP Bootstrap Navwalker
 * 
 * @package WizcraftPro
 * @author Edward McIntyre - @twittem, WP Bootstrap, William Patton - @pattonwebz
 * @version 5.0.0
 * @used-by Navigation menus
 * @docs https://github.com/wp-bootstrap/wp-bootstrap-navwalker/
 */

if (!class_exists('WP_Bootstrap_Navwalker_5')) {
    class WP_Bootstrap_Navwalker_5 extends Walker_Nav_Menu
    {

        /**
         * Starts the list before the elements are added.
         *
         * @since 3.0.0
         *
         * @see Walker::start_lvl()
         *
         * @param string   $output Used to append additional content (passed by reference).
         * @param int      $depth  Depth of menu item. Used for padding.
         * @param stdClass $args   An object of wp_nav_menu() arguments.
         */
        public function start_lvl(&$output, $depth = 0, $args = array())
        {
            if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
                $t = '';
                $n = '';
            } else {
                $t = "\t";
                $n = "\n";
            }
            $indent = str_repeat($t, $depth);
            // Default class to add to the file.
            $classes = array('dropdown-menu');
            /**
             * Filters the CSS class(es) applied to a menu list element.
             *
             * @since 4.8.0
             *
             * @param array    $classes The CSS classes that are applied to the menu `<ul>` element.
             * @param stdClass $args    An object of `wp_nav_menu()` arguments.
             * @param int      $depth   Depth of menu item. Used for padding.
             */
            $class_names = join(' ', apply_filters('nav_menu_submenu_css_class', $classes, $args, $depth));
            $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
            /**
             * The `.dropdown-menu` container needs to have a labelledby
             * attribute which points to it's trigger link.
             *
             * Form a string for the labelledby attribute from the the latest
             * link with an id that was added to the $output.
             */
            $labelledby = '';
            // Find all links with an id in the output.
            preg_match_all('/(<a[^>]*)(id="|\')(.*?)("|\')/i', $output, $matches);
            // With pointer at end of array check if we got an ID match.
            if (end($matches[3])) {
                // Build a string to use as aria-labelledby.
                $labelledby = 'aria-labelledby="' . end($matches[3]) . '"';
            }
            $output .= "{$n}{$indent}<ul$class_names $labelledby>{$n}";
        }

        /**
         * Ends the list after the elements are added.
         *
         * @since 3.0.0
         *
         * @see Walker::end_lvl()
         *
         * @param string   $output Used to append additional content (passed by reference).
         * @param int      $depth  Depth of menu item. Used for padding.
         * @param stdClass $args   An object of wp_nav_menu() arguments.
         */
        public function end_lvl(&$output, $depth = 0, $args = array())
        {
            if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
                $t = '';
                $n = '';
            } else {
                $t = "\t";
                $n = "\n";
            }
            $indent = str_repeat($t, $depth);
            $output .= "$indent</ul>{$n}";
        }

        /**
         * Starts the element output.
         *
         * @since 3.0.0
         * @since 4.4.0 The {@see 'nav_menu_item_args'} filter was added.
         *
         * @see Walker::start_el()
         *
         * @param string   $output Used to append additional content (passed by reference).
         * @param WP_Post  $item   Menu item data object.
         * @param int      $depth  Depth of menu item. Used for padding.
         * @param stdClass $args   An object of wp_nav_menu() arguments.
         * @param int      $id     Current item ID.
         */
        public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
        {
            if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
                $t = '';
                $n = '';
            } else {
                $t = "\t";
                $n = "\n";
            }
            $indent = ($depth) ? str_repeat($t, $depth) : '';

            $classes = empty($item->classes) ? array() : (array) $item->classes;
            $classes[] = 'nav-item menu-item-' . $item->ID;

            $args = apply_filters('nav_menu_item_args', $args, $item, $depth);

            // Check for dropdown.
            $is_dropdown = in_array('menu-item-has-children', $classes);
            if ($is_dropdown && ($depth === 0)) {
                $classes[] = 'dropdown';
            }

            /**
             * Filters the arguments for a single nav menu item.
             *
             * @since 4.4.0
             *
             * @param stdClass $args  An object of wp_nav_menu() arguments.
             * @param WP_Post  $item  Menu item data object.
             * @param int      $depth Depth of menu item. Used for padding.
             */
            $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
            $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

            $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
            $id = $id ? ' id="' . esc_attr($id) . '"' : '';

            $indent = ($depth) ? str_repeat($t, $depth) : '';

            $output .= $indent . '<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement"' . $id . $class_names . '>';

            $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
            $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
            $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
            $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

            // For items in dropdowns use .dropdown-item instead of .nav-link.
            if ($depth > 0) {
                $linkclass = 'dropdown-item';
            } else {
                $linkclass = 'nav-link';
                if ($is_dropdown) {
                    $attributes .= ' class="' . $linkclass . ' dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"';
                    $attributes .= ' id="menu-item-dropdown-' . $item->ID . '"';
                } else {
                    $attributes .= ' class="' . $linkclass . '"';
                }
            }

            if (!$is_dropdown && $depth > 0) {
                $attributes .= ' class="' . $linkclass . '"';
            }

            $item_output = isset($args->before) ? $args->before : '';
            $item_output .= '<a' . $attributes . ' itemprop="url">';
            $item_output .= isset($args->link_before) ? $args->link_before : '';
            $item_output .= '<span itemprop="name">' . apply_filters('the_title', $item->title, $item->ID) . '</span>';
            $item_output .= isset($args->link_after) ? $args->link_after : '';
            $item_output .= '</a>';
            $item_output .= isset($args->after) ? $args->after : '';

            $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
        }

        /**
         * Ends the element output.
         *
         * @since 3.0.0
         *
         * @see Walker::end_el()
         *
         * @param string   $output Used to append additional content (passed by reference).
         * @param WP_Post  $item   Menu item data object. Not used.
         * @param int      $depth  Depth of page. Not Used.
         * @param stdClass $args   An object of wp_nav_menu() arguments.
         */
        public function end_el(&$output, $item, $depth = 0, $args = array())
        {
            if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
                $t = '';
                $n = '';
            } else {
                $t = "\t";
                $n = "\n";
            }
            $output .= "</li>{$n}";
        }
    }
}
