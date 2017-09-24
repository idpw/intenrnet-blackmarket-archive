# VCCW

[![Build Status](https://travis-ci.org/vccw-team/vccw.svg?branch=master)](https://travis-ci.org/vccw-team/vccw)

This is a Vagrant configuration designed for development of WordPress plugins, themes, or websites.

To get started, check out <http://vccw.cc/>

## Configuration

1. Copy `provision/default.yml` to `site.yml`.
1. Edit the `site.yml`.
1. Run `vagrant up`.

### Note

* The `site.yml` has to be in the same directory with Vagrantfile.
* You can put difference to the `site.yml`.

## WordPress plugins

This theme uses several plugins, below,
 
- archive/wordpress/wp-content/plugins/admin-menu-editor
- archive/wordpress/wp-content/plugins/advanced-custom-fields-pro
- archive/wordpress/wp-content/plugins/akismet
- archive/wordpress/wp-content/plugins/custom-post-type-permalinks
- archive/wordpress/wp-content/plugins/custom-post-type-ui
- archive/wordpress/wp-content/plugins/duplicate-post
- archive/wordpress/wp-content/plugins/ewww-image-optimizer
- archive/wordpress/wp-content/plugins/post-types-order
- archive/wordpress/wp-content/plugins/public-post-preview
- archive/wordpress/wp-content/plugins/regenerate-thumbnails
- archive/wordpress/wp-content/plugins/tinymce-advanced
- archive/wordpress/wp-content/plugins/user-role-editor
- archive/wordpress/wp-content/plugins/wordpress-seo
- archive/wordpress/wp-content/plugins/wp-multibyte-patch
- archive/wordpress/wp-content/plugins/wp-total-hacks

And all plugins are ignored from this repository.
