<?php

/**
 * Bootstrap 5 Nav Walker for WordPress
 * Custom navigation walker for Bootstrap 5 compatibility
 */

class WP_Bootstrap_Navwalker_5 extends Walker_Nav_Menu
{

    /**
     * Starts the list before the elements are added.
     */
    public function start_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class=\"dropdown-menu\">\n";
    }

    /**
     * Ends the list after the elements are added.
     */
    public function end_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</div>\n";
    }

    /**
     * Starts the element output.
     */
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        /**
         * Filters the arguments for a single nav menu item.
         */
        $args = apply_filters('nav_menu_item_args', $args, $item, $depth);

        /**
         * Filters the CSS class(es) applied to a menu item's list item element.
         */
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));

        if ($depth === 0) {
            $class_names = $class_names ? ' class="nav-item ' . esc_attr($class_names) . '"' : ' class="nav-item"';
            $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
            $id = $id ? ' id="' . esc_attr($id) . '"' : '';

            $output .= $indent . '<li' . $id . $class_names . '>';
        }

        $attributes  = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) . '"' : '';
        $attributes .= ! empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= ! empty($item->xfn) ? ' rel="'    . esc_attr($item->xfn) . '"' : '';
        $attributes .= ! empty($item->url) ? ' href="'   . esc_attr($item->url) . '"' : '';

        $item_output = isset($args->before) ? $args->before : '';

        if ($depth === 0) {
            if (in_array('menu-item-has-children', $classes)) {
                $item_output .= '<a class="nav-link dropdown-toggle" href="' . esc_attr($item->url) . '" role="button" data-bs-toggle="dropdown" aria-expanded="false"' . $attributes . '>';
            } else {
                $item_output .= '<a class="nav-link"' . $attributes . '>';
            }
        } else {
            $item_output .= '<a class="dropdown-item"' . $attributes . '>';
        }

        $item_output .= isset($args->link_before) ? $args->link_before : '';
        $item_output .= apply_filters('the_title', $item->title, $item->ID);
        $item_output .= isset($args->link_after) ? $args->link_after : '';
        $item_output .= '</a>';
        $item_output .= isset($args->after) ? $args->after : '';

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    /**
     * Ends the element output.
     */
    public function end_el(&$output, $item, $depth = 0, $args = array())
    {
        if ($depth === 0) {
            $output .= "</li>\n";
        }
    }

    /**
     * Used to test if a menu item has children
     */
    public static function fallback($args)
    {
        $defaults = array(
            'menu_class'  => 'navbar-nav ms-auto',
            'container'   => false,
            'echo'        => true,
            'link_before' => '',
            'link_after'  => ''
        );

        $args = wp_parse_args($args, $defaults);

        if ($args['echo']) {
            echo wp_page_menu($args);
        } else {
            return wp_page_menu($args);
        }
    }
}
