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


$functions = glob(__DIR__ . '/functions/*.php');
foreach ($functions as $function) {
    require $function;
}
add_filter('acf/settings/google_api_key', function () {
    return 'AIzaSyBfIoDgHxNJcnrY_rlM6AlQ0-tlbLirNSY';
});


function theSlickGallery($slug)
{
    $images = get_field($slug);

    $size = 'large'; // (thumbnail, medium, large, full or custom size)
    if ($images) {
        $class = (count($images) > 1) ? 'js-single-slide' : '';
        echo('<div class="slick-gallery ' . $class . '">');

        foreach ($images as $key => $image) {
            echo('<div>');
            if ($image['width'] > $image['height']) {
                echo('<div class="slick-gallery__image ">');
            } else {
                echo('<div class="slick-gallery__image is-portrait">');
            }
            echo(wp_get_attachment_image($image['ID'], $size));
            echo('</div>');
            echo('<div class="slick-gallery__meta">');
            if ($image['caption']) {
                echo('<p class="slick-gallery__caption">' . $image['caption'] . '</p>');
            }
            if ($image['description']) {
                echo('<p class="slick-gallery__description">' . $image['description'] . '</p>');
            }
            echo('</div>');
            echo('</div>');
        }
        echo('</div>');
    }
}


?>
