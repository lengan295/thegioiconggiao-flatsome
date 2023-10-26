<?php
// Add custom Theme Functions here
// add customize javascript
add_action('wp_enqueue_scripts', function () {
   // IONIONCS
  wp_enqueue_style('ionicons', get_stylesheet_directory_uri() . '/css/ionicons.css', array(), rand(111,9999), 'all');
  wp_enqueue_style('header', get_stylesheet_directory_uri() . '/css/header.css', array(), rand(111,9999), 'all');
  wp_enqueue_style('footer', get_stylesheet_directory_uri() . '/css/footer.css', array(), rand(111,9999), 'all');
// wp_enqueue_script('owl-carousel', get_stylesheet_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), null, true);
});

// Turn off auto gen <p> of contact form 7
add_filter('wpcf7_autop_or_not', false);

// Include another php
include('shortcodes.php');