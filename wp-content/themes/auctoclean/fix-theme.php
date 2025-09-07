<?php

/**
 * Theme Activation Fix Script
 * This script will force activate the AuctoModern theme
 * Access via: yourdomain.com/wp-content/themes/AuctoModern/fix-theme.php
 */

// WordPress Bootstrap
define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');

// Force theme activation
echo "<h1>Theme Activation Fix</h1>";

echo "<h2>Current Status:</h2>";
echo "<p><strong>Current stylesheet:</strong> " . get_option('stylesheet') . "</p>";
echo "<p><strong>Current template:</strong> " . get_option('template') . "</p>";
echo "<p><strong>Theme directory URI:</strong> " . get_template_directory_uri() . "</p>";

echo "<h2>Available Themes:</h2>";
$themes = wp_get_themes();
foreach ($themes as $theme_name => $theme_obj) {
    echo "<p>- " . $theme_name . " (" . $theme_obj->get('Name') . ")</p>";
}

echo "<h2>Fixing Theme...</h2>";

// Force switch to AuctoModern theme
$result1 = update_option('stylesheet', 'AuctoModern');
$result2 = update_option('template', 'AuctoModern');

echo "<p>Setting stylesheet to 'AuctoModern': " . ($result1 ? 'SUCCESS' : 'FAILED') . "</p>";
echo "<p>Setting template to 'AuctoModern': " . ($result2 ? 'SUCCESS' : 'FAILED') . "</p>";

// Clear any cached theme data
wp_clean_themes_cache();

echo "<h2>Updated Status:</h2>";
echo "<p><strong>New stylesheet:</strong> " . get_option('stylesheet') . "</p>";
echo "<p><strong>New template:</strong> " . get_option('template') . "</p>";
echo "<p><strong>New theme directory URI:</strong> " . get_template_directory_uri() . "</p>";

// Test asset paths
$css_path = get_template_directory_uri() . '/assets/css/modern-sections.css';
$js_path = get_template_directory_uri() . '/assets/js/modern-sections.js';

echo "<h2>Asset Path Tests:</h2>";
echo "<p><strong>CSS Path:</strong> <a href='" . $css_path . "' target='_blank'>" . $css_path . "</a></p>";
echo "<p><strong>JS Path:</strong> <a href='" . $js_path . "' target='_blank'>" . $js_path . "</a></p>";

echo "<h2>File Existence Check:</h2>";
$css_file = get_template_directory() . '/assets/css/modern-sections.css';
$js_file = get_template_directory() . '/assets/js/modern-sections.js';

echo "<p><strong>CSS File:</strong> " . $css_file . " - " . (file_exists($css_file) ? 'EXISTS' : 'MISSING') . "</p>";
echo "<p><strong>JS File:</strong> " . $js_file . " - " . (file_exists($js_file) ? 'EXISTS' : 'MISSING') . "</p>";

echo "<h2>Next Steps:</h2>";
echo "<p>1. <a href='" . admin_url() . "'>Go to WordPress Admin</a></p>";
echo "<p>2. <a href='" . home_url() . "'>View Your Website</a></p>";
echo "<p>3. Clear any caching plugins if you have them</p>";
echo "<p>4. Check if the modern sections CSS and JS are now loading properly</p>";

?>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 40px;
    }

    h1 {
        color: #0073aa;
    }

    h2 {
        color: #333;
        border-bottom: 1px solid #ccc;
        padding-bottom: 5px;
    }

    p {
        margin: 10px 0;
    }

    a {
        color: #0073aa;
    }
</style>