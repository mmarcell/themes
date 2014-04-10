<?php
    //include jquery library and flexslider scripts
    function my_add_scripts() {
    wp_deregister_script('jquery');
    wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js", false, null);
    wp_enqueue_script('jquery');
    wp_enqueue_script('flexslider', dirname( get_bloginfo('stylesheet_url') ) .'/js/jquery.flexslider-min.js', array('jquery'));
    wp_enqueue_script('flexslider-init', dirname( get_bloginfo('stylesheet_url') ) .'/js/flexslider-init.js', array('jquery', 'flexslider'));
    // register your script location, dependencies and version
    wp_register_script('custom_script', dirname( get_bloginfo('stylesheet_url') ) . '/js/custom-script.js', array('jquery'), '1.0' );
    wp_enqueue_script('custom_script');
    wp_enqueue_script('jquery_easing', dirname( get_bloginfo('stylesheet_url') ) . '/js/jquery.easing.1.3.js', array('jquery'));
    wp_enqueue_script('jquery_touch_swipe', dirname( get_bloginfo('stylesheet_url') ) . '/js/jquery.touchSwipe.min.js', array('jquery'));
    wp_enqueue_script('liquid_slider', dirname( get_bloginfo('stylesheet_url') ) . '/js/jquery.liquid-slider.min.js', array('jquery'));
    }
    add_action('wp_enqueue_scripts', 'my_add_scripts');
    
    //include flexslider css
    function my_add_styles() {
    wp_enqueue_style('flexslider', get_bloginfo('stylesheet_directory').'/js/flexslider.css');
    wp_register_style( 'liquid_slider_css', dirname( get_bloginfo('stylesheet_url') ) . '/style-liquid-slider.css');
    wp_enqueue_style( 'liquid_slider_css' );
    }
    add_action('wp_enqueue_scripts', 'my_add_styles');
    
    add_theme_support( 'post-thumbnails' );
    add_image_size(1200, 600, true);
    
function exclude_category( $query ) {
    if ( $query->is_home() && $query->is_main_query() ) {
	$cat_id = get_cat_ID('slide');
        $query->set( 'cat', '-' . $cat_id );
    }
}
add_action( 'pre_get_posts', 'exclude_category' );
    
/**
 * _s functions and definitions
 *
 * @package _s
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}