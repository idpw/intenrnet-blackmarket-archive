"use strict";

import $ from 'jquery';
import jQuery from 'jquery';

window.$ = $;
window.jQuery = jQuery;

require('jquery.easing');
require('./plugins/jquery.cookie');
require('./plugins/slick');
require('./plugins/masonry.pkgd');
require('./plugins/imagesloaded.pkgd');


/**
 *
 */
class App {
  constructor() {

    $('.js-single-slide').slick({
      dots: true,
      adaptiveHeight: true,
      arrows: false
    });



  }
}

// Start JavaScript Application
// ============================
$(function () {
  let app = new App();
});

