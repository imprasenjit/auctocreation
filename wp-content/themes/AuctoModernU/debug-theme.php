<?php

/**
 * Theme Debug Information
 * This file helps debug theme directory issues
 */

// Get theme information
$current_theme = wp_get_theme();
$template_directory = get_template_directory();
$template_directory_uri = get_template_directory_uri();
$stylesheet_directory = get_stylesheet_directory();
$stylesheet_directory_uri = get_stylesheet_directory_uri();

?>
<!DOCTYPE html>
<html>

<head>
    <title>Theme Debug Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background: #f1f1f1;
        }

        .debug-info {
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
        }

        .debug-info h3 {
            color: #333;
            border-bottom: 2px solid #0073aa;
            padding-bottom: 10px;
        }

        .debug-item {
            margin: 10px 0;
            padding: 10px;
            background: #f9f9f9;
            border-left: 4px solid #0073aa;
        }

        .debug-item strong {
            color: #0073aa;
        }

        .file-check {
            margin: 5px 0;
        }

        .file-exists {
            color: #46b450;
        }

        .file-missing {
            color: #dc3232;
        }
    </style>
</head>

<body>
    <h1>WordPress Theme Debug Information</h1>

    <div class="debug-info">
        <h3>Theme Information</h3>
        <div class="debug-item">
            <strong>Theme Name:</strong> <?php echo $current_theme->get('Name'); ?>
        </div>
        <div class="debug-item">
            <strong>Theme Version:</strong> <?php echo $current_theme->get('Version'); ?>
        </div>
        <div class="debug-item">
            <strong>Theme Directory:</strong> <?php echo $current_theme->get_stylesheet_directory(); ?>
        </div>
    </div>

    <div class="debug-info">
        <h3>Directory Paths</h3>
        <div class="debug-item">
            <strong>Template Directory:</strong> <?php echo $template_directory; ?>
        </div>
        <div class="debug-item">
            <strong>Template Directory URI:</strong> <?php echo $template_directory_uri; ?>
        </div>
        <div class="debug-item">
            <strong>Stylesheet Directory:</strong> <?php echo $stylesheet_directory; ?>
        </div>
        <div class="debug-item">
            <strong>Stylesheet Directory URI:</strong> <?php echo $stylesheet_directory_uri; ?>
        </div>
    </div>

    <div class="debug-info">
        <h3>Asset Files Check</h3>
        <div class="debug-item">
            <strong>Modern Sections CSS:</strong>
            <div class="file-check">
                Path: <?php echo $template_directory . '/assets/css/modern-sections.css'; ?>
                <?php if (file_exists($template_directory . '/assets/css/modern-sections.css')): ?>
                    <span class="file-exists">✓ File exists</span>
                <?php else: ?>
                    <span class="file-missing">✗ File missing</span>
                <?php endif; ?>
            </div>
            <div class="file-check">
                URL: <?php echo $template_directory_uri . '/assets/css/modern-sections.css'; ?>
            </div>
        </div>

        <div class="debug-item">
            <strong>Modern Sections JS:</strong>
            <div class="file-check">
                Path: <?php echo $template_directory . '/assets/js/modern-sections.js'; ?>
                <?php if (file_exists($template_directory . '/assets/js/modern-sections.js')): ?>
                    <span class="file-exists">✓ File exists</span>
                <?php else: ?>
                    <span class="file-missing">✗ File missing</span>
                <?php endif; ?>
            </div>
            <div class="file-check">
                URL: <?php echo $template_directory_uri . '/assets/js/modern-sections.js'; ?>
            </div>
        </div>
    </div>

    <div class="debug-info">
        <h3>WordPress Options</h3>
        <div class="debug-item">
            <strong>Active Theme (stylesheet):</strong> <?php echo get_option('stylesheet'); ?>
        </div>
        <div class="debug-item">
            <strong>Active Template:</strong> <?php echo get_option('template'); ?>
        </div>
        <div class="debug-item">
            <strong>Site URL:</strong> <?php echo get_option('siteurl'); ?>
        </div>
        <div class="debug-item">
            <strong>Home URL:</strong> <?php echo get_option('home'); ?>
        </div>
    </div>

    <div class="debug-info">
        <h3>Direct Link Tests</h3>
        <div class="debug-item">
            <strong>Test CSS Link:</strong><br>
            <a href="<?php echo $template_directory_uri . '/assets/css/modern-sections.css'; ?>" target="_blank">
                <?php echo $template_directory_uri . '/assets/css/modern-sections.css'; ?>
            </a>
        </div>
        <div class="debug-item">
            <strong>Test JS Link:</strong><br>
            <a href="<?php echo $template_directory_uri . '/assets/js/modern-sections.js'; ?>" target="_blank">
                <?php echo $template_directory_uri . '/assets/js/modern-sections.js'; ?>
            </a>
        </div>
    </div>

    <p><a href="<?php echo home_url(); ?>">← Back to Home</a></p>
</body>

</html>