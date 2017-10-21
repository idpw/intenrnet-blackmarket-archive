<?php

$googleMapsApi = 'AIzaSyBfIoDgHxNJcnrY_rlM6AlQ0-tlbLirNSY';

add_filter('acf/settings/google_api_key', function () {
    return $googleMapsApi;
});


?>
