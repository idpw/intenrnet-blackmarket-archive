<?php
/** Tell WordPress to run twentyten_setup() when the 'after_setup_theme' hook is run. */

add_action('after_setup_theme', 'themes_setup');

if (!function_exists('themes_setup')):

    function themes_setup()
    {
        function wp_custom_admin_css()
        {
            $url = get_bloginfo('template_directory') . "/assets/css/admin.css";
            echo "<link rel='stylesheet' type='text/css' href='{$url}'>";

        }

        add_action('admin_head', 'wp_custom_admin_css', 100);
        #
        # add extra image size
        #
        add_image_size("xlarge", 1600, 1600, false);
    }
endif;
