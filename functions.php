<?php
// Add custom Theme Functions here
// add customize javascript
add_action('wp_enqueue_scripts', function () {
    // OWL CAROUSEL
    wp_enqueue_style('owl-carousel', get_stylesheet_directory_uri() . '/css/owl.carousel.min.css', array(), null, 'all');
    wp_enqueue_style('owl-carousel-default', get_stylesheet_directory_uri() . '/css/owl.theme.default.min.css', array(), null, 'all');
    wp_enqueue_script('owl-carousel', get_stylesheet_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '2.3.4', true);
    // IONIONCS
    wp_enqueue_style('ionicons', get_stylesheet_directory_uri() . '/css/ionicons.css', array(), rand(111, 9999), 'all');
    wp_enqueue_style('header', get_stylesheet_directory_uri() . '/css/header.css', array(), rand(111, 9999), 'all');
    wp_enqueue_style('footer', get_stylesheet_directory_uri() . '/css/footer.css', array(), rand(111, 9999), 'all');
    wp_enqueue_style('common-css', get_stylesheet_directory_uri() . '/css/common.css', array(), rand(111, 9999), 'all');

    if (is_front_page()) {
        wp_enqueue_style('front-page', get_stylesheet_directory_uri() . '/css/front-page.css', array(), rand(111, 9999), 'all');
        wp_enqueue_script('front-page', get_stylesheet_directory_uri() . '/js/front-page.js', array('jquery'), rand(111, 9999), true);
    }

    if (is_product()) {
        wp_enqueue_style('product-page', get_stylesheet_directory_uri() . '/css/product-page.css', array(), rand(111, 9999), 'all');
        wp_enqueue_script('product-page', get_stylesheet_directory_uri() . '/js/product-page.js', array('jquery'), rand(111, 9999), true);
    }

    wp_enqueue_style('category-page', get_stylesheet_directory_uri() . '/css/category-page.css', array(), rand(111, 9999), 'all');
    wp_enqueue_script('category-page', get_stylesheet_directory_uri() . '/js/category-page.js', array('jquery'), rand(111, 9999), true);

    if (!is_front_page() && !is_blog() && !is_woocommerce() && !is_cart()) {
        wp_enqueue_style('policy-pages', get_stylesheet_directory_uri() . '/css/policy-pages.css', array(), rand(111, 9999), 'all');
    }
});

// Turn off auto gen <p> of contact form 7
add_filter('wpcf7_autop_or_not', false);

// Add custom text for products that dont have price
add_filter('woocommerce_empty_price_html', function () {
    return '<span class="price"><span class="woocommerce-Price-amount amount">Liên hệ</span></span>';
});

// Check if is blog page or not
function is_blog()
{
    return (is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type();
}

add_action('flatsome_products_after', function () {
    echo do_shortcode('[block id="cau-hoi-thuong-gap"]');
});

// Include another php, must be placed at the bottom
include('shortcodes.php');