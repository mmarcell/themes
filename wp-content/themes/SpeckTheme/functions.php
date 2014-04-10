<?php

function my_add_scripts() {
    wp_deregister_script('jquery');
    wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js", false, null);
    wp_enqueue_script('jquery');
    wp_enqueue_script('flexslider', get_template_directory_uri().'/js/jquery.flexslider-min.js', array('jquery'));
    wp_enqueue_script('flexslider-init', get_template_directory_uri() .'/js/flexslider-init.js', array('jquery', 'flexslider'));
    // register your script location, dependencies and version
    wp_enqueue_script('jquery_easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array('jquery'));
    wp_enqueue_script('jquery_touch_swipe', get_template_directory_uri() . '/js/jquery.touchSwipe.min.js', array('jquery'));
    wp_enqueue_script('liquid_slider', get_template_directory_uri() . '/js/jquery.liquid-slider.min.js', array('jquery'));
    wp_enqueue_script('liquid_slider_custom', get_template_directory_uri() . '/js/liquid-slider-custom.js', array('jquery'));
    /*wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom.js', array('jquery'));
    wp_enqueue_script('custom_min', get_template_directory_uri() . '/js/jquery.liquid-slider-custom.min.js', array('jquery'));*/
    }
add_action('wp_enqueue_scripts', 'my_add_scripts');

function my_add_styles() {
    wp_enqueue_style('speck-style', get_stylesheet_uri());
    wp_register_style('main-style', get_template_directory_uri() . '/main-style.css');
    wp_enqueue_style('main-style');
    wp_register_style('layout-style', get_template_directory_uri() . '/layouts/content-sidebar.css');
    wp_enqueue_style('layout-style');
    wp_enqueue_style('flexslider', get_template_directory_uri() . '/js/flexslider.css');
    wp_register_style( 'liquid_slider_css', get_template_directory_uri() . '/style-liquid-slider.css');
    wp_enqueue_style( 'liquid_slider_css' );
    wp_register_style( 'liquid_slider_custom', get_template_directory_uri() . '/liquid-slider-custom.css');
    wp_enqueue_style( 'liquid_slider_custom' );
}
add_action('wp_enqueue_scripts', 'my_add_styles');

function speck_register_slideshow() {
  $labels = array(
    'name' => 'Slides',
    'singular_name' => 'Slide',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Slide',
    'edit_item' => 'Edit Slide',
    'new_item' => 'New Slide',
    'all_items' => 'All Slides',
    'view_item' => 'View Slide',
    'search_items' => 'Search Slides',
    'not_found' =>  'No Slides found',
    'not_found_in_trash' => 'No Slides found in Trash',
    'parent_item_colon' => '',
    'menu_name' => 'Slideshow'
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'slide' ),
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'editor', 'thumbnail' )
  );
  register_post_type( 'slide', $args );
}
add_action( 'init', 'speck_register_slideshow' );

function speck_register_profile() {
  $labels = array(
    'name' => 'Profiles',
    'singular_name' => 'Profile',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Profile',
    'edit_item' => 'Edit Profile',
    'new_item' => 'New Profile',
    'all_items' => 'All Profiles',
    'view_item' => 'View Profile',
    'search_items' => 'Search Profiles',
    'not_found' =>  'No Profiles found',
    'not_found_in_trash' => 'No Profiles found in Trash',
    'parent_item_colon' => '',
    'menu_name' => 'Profiles'
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'profile' ),
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'editor', 'thumbnail' )
  );
  register_post_type( 'profile', $args );
}
add_action( 'init', 'speck_register_profile' );


add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-formats', array( 'post', 'slide', 'profile' ) );
add_image_size(1200, 511, true);

register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'SpeckTheme' ),
		'secondary' => __( 'Secondary Menu', 'SpeckTheme' ),
		'blog' =>__( 'Blog Menu', 'SpeckTheme')
) );

function register_widgets() {
register_sidebar( array(
    'name' => 'Front Page Widget',
    'id' => 'main-widget',
    'before_widget' => '<div class="widget-item">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>',
    ));
register_sidebar( array(
    'name' => 'Blog Sidebar',
    'id' => 'blog-widget',
    'before_widget' => '<div class="blog-widget-item">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="blog-widget-title">',
    'after_title' => '</h2>',
    ));
}

add_action( 'widgets_init', 'register_widgets' );

function custom_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
	return ' <span class="rdmore"><a href="'. get_permalink( get_the_ID() ) . '"><< READ MORE >></span></a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

function speck_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on speck, use a find and replace
	 * to change 'speck' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'speck', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
}

add_action( 'after_setup_theme', 'speck_setup' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

?>