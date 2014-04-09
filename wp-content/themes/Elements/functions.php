<?php
/**
 * theme functions and definitions
 *
 * @package theme
 * @since theme 1.0
 */

 if ( ! isset( $content_width ) )
    $content_width = 654; /* pixels */
    
if ( ! function_exists( 'theme_setup' ) ):

function theme_setup() {
    
    require( get_template_directory() . '/inc/template-tags.php' );
    require( get_template_directory() . '/inc/tweaks.php' );
    load_theme_textdomain( 'theme', get_template_directory() . '/languages' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-formats', array( 'aside' ) );
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'theme' ),
        'secondary' => __( 'Secondary Menu', 'theme' )
    ) );
}
endif; // theme_setup
add_action( 'after_setup_theme', 'theme_setup' );

/**
 * Enqueue scripts and styles
 */
function theme_scripts() {
    if (!is_page_template('main.php')) {
        wp_enqueue_style( 'style', get_stylesheet_uri() );
    } else {  
        wp_enqueue_style('mainstyle.css', get_template_directory_uri() . '/styles/mainstyle.css' );
    }
 
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
 
    wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', array( 'jquery' ), '20120206', true );
 
    if ( is_singular() && wp_attachment_is_image() ) {
        wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
    }
}

//hooks theme_scripts into wp_enqueue_scripts fucntion or event
add_action( 'wp_enqueue_scripts', 'theme_scripts' );


/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since Theme 1.0
 */
function theme_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Primary Widget Area', 'theme' ),
        'id' => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ) );
 
    register_sidebar( array(
        'name' => __( 'Secondary Widget Area', 'theme' ),
        'id' => 'sidebar-2',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ) );
}
add_action( 'widgets_init', 'theme_widgets_init' );

?>