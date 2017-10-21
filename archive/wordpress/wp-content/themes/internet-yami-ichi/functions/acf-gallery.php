<?php

/**
 * @param $slug
 */
function theGallery($slug)
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

