<?php get_header(); ?>
<?php get_sidebar(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <h2>
        <?php the_title() ?>
    </h2>

    <?php
    $image = get_field('main_image');
    $size = 'large';
    if ($image) :?>
        <div>
            <?php
            echo(wp_get_attachment_image($image['ID'], $size));
            if ($image['caption']) {
                echo('<p>' . $image['caption'] . '</p>');
            }
            if ($image['description']) {
                echo('<p>' . $image['description'] . '</p>');
            }
            ?>
        </div>
    <?php endif; ?>
    <p>
        <?php the_field('country') ?>
        <?php the_field('city') ?>
        <?php the_field('venue') ?>
    </p>
    <div>
        <?php

        $location = get_field('map');
        var_dump($location);

        if (!empty($location)):
            ?>
            <div class="acf-map" style="width: 100%; height: 400px;">
                <div class="marker" data-lat="<?php echo $location['lat']; ?>"
                     data-lng="<?php echo $location['lng']; ?>"></div>
            </div>
        <?php endif; ?>
    </div>
    <p>
        from <?php the_field('start_date') ?> to <?php the_field('end_date') ?> <br/>
    </p>
    <p>
        <?php the_field('time') ?>
    </p>


    <div>
        <?php
        if (have_rows('organizers')):?>
            Organized by
            <ul class="organizers">
                <?php
                while (have_rows('organizers')) : the_row();

                    echo('<li>');
                    if (get_sub_field('website')) {
                        echo('<a href="' . get_sub_field('website') . '" target="_blank">');
                    }
                    if (get_sub_field('name')) {
                        the_sub_field('name');
                    } else {
                        the_sub_field('website');
                    }

                    if (get_sub_field('website')) {
                        echo('</a>');
                    }
                    echo('</li>');

                endwhile;
                ?>
            </ul>
        <?php endif; ?>
    </div>


    <div>
        Gallery
        <div class="l-content-wrapper">
            <?php theGallery('gallery') ?>
        </div>
    </div>
    <div>
        <?php
        if (have_rows('organizers')):?>
            Vendors
            <ul class="vendors">
                <?php
                while (have_rows('vendors')) : the_row();

                    echo('<li>');
                    if (get_sub_field('website')) {
                        echo('<a href="' . get_sub_field('website') . '" target="_blank">');
                    }
                    if (get_sub_field('name')) {
                        the_sub_field('name');
                    } else {
                        the_sub_field('website');
                    }

                    if (get_sub_field('website')) {
                        echo('</a>');
                    }
                    echo('</li>');

                endwhile;
                ?>
            </ul>
        <?php endif; ?>
    </div>
    <div>
        <?php
        if (have_rows('related_links')):?>
            Related Links
            <ul class="related_links">
                <?php
                while (have_rows('related_links')) : the_row();

                    echo('<li>');
                    if (get_sub_field('website')) {
                        echo('<a href="' . get_sub_field('website') . '" target="_blank">');
                    }
                    if (get_sub_field('name')) {
                        the_sub_field('name');
                    } else {
                        the_sub_field('website');
                    }

                    if (get_sub_field('website')) {
                        echo('</a>');
                    }
                    echo('</li>');

                endwhile;
                ?>
            </ul>
        <?php endif; ?>
    </div>
    <?php the_content() ?>
<?php endwhile; endif; ?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBfIoDgHxNJcnrY_rlM6AlQ0-tlbLirNSY"></script>
<script type="text/javascript">
  (function ($) {

    /*
    *  new_map
    *
    *  This function will render a Google Map onto the selected jQuery element
    *
    *  @type	function
    *  @date	8/11/2013
    *  @since	4.3.0
    *
    *  @param	$el (jQuery element)
    *  @return	n/a
    */

    function new_map($el) {

      // var
      var $markers = $el.find('.marker');


      // vars
      var args = {
        zoom: 16,
        center: new google.maps.LatLng(0, 0),
        mapTypeId: google.maps.MapTypeId.ROADMAP
      };


      // create map
      var map = new google.maps.Map($el[0], args);


      // add a markers reference
      map.markers = [];


      // add markers
      $markers.each(function () {

        add_marker($(this), map);

      });


      // center map
      center_map(map);


      // return
      return map;

    }

    /*
    *  add_marker
    *
    *  This function will add a marker to the selected Google Map
    *
    *  @type	function
    *  @date	8/11/2013
    *  @since	4.3.0
    *
    *  @param	$marker (jQuery element)
    *  @param	map (Google Map object)
    *  @return	n/a
    */

    function add_marker($marker, map) {

      // var
      var latlng = new google.maps.LatLng($marker.attr('data-lat'), $marker.attr('data-lng'));

      // create marker
      var marker = new google.maps.Marker({
        position: latlng,
        map: map
      });

      // add to array
      map.markers.push(marker);

      // if marker contains HTML, add it to an infoWindow
      if ($marker.html()) {
        // create info window
        var infowindow = new google.maps.InfoWindow({
          content: $marker.html()
        });

        // show info window when marker is clicked
        google.maps.event.addListener(marker, 'click', function () {

          infowindow.open(map, marker);

        });
      }

    }

    /*
    *  center_map
    *
    *  This function will center the map, showing all markers attached to this map
    *
    *  @type	function
    *  @date	8/11/2013
    *  @since	4.3.0
    *
    *  @param	map (Google Map object)
    *  @return	n/a
    */

    function center_map(map) {

      // vars
      var bounds = new google.maps.LatLngBounds();

      // loop through all markers and create bounds
      $.each(map.markers, function (i, marker) {

        var latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());

        bounds.extend(latlng);

      });

      // only 1 marker?
      if (map.markers.length == 1) {
        // set center of map
        map.setCenter(bounds.getCenter());
        map.setZoom(16);
      }
      else {
        // fit to bounds
        map.fitBounds(bounds);
      }

    }

    /*
    *  document ready
    *
    *  This function will render each map when the document is ready (page has loaded)
    *
    *  @type	function
    *  @date	8/11/2013
    *  @since	5.0.0
    *
    *  @param	n/a
    *  @return	n/a
    */
// global var
    var map = null;

    $(document).ready(function () {

      $('.acf-map').each(function () {

        // create map
        map = new_map($(this));

      });

    });

  })(jQuery);
</script>

<?php get_footer(); ?>




