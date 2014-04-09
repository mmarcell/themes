<?php
//////////////////////////////////LANGUAGES////////////////////////////////////////
//make theme ready for translation
//translations are in the /languages/directory path
//loads textdomain to local path /languages in the them path
load_theme_textdomain('Volume',TEMPLATEPATH . '/languages' );
//gets locale information and stores it in variable
$locale = get_locale();
//calls templatepath as a constant with the directory to the locale file
$locale_file = TEMPLATEPATH . "/languages/$locale.php";


//if the locale file can be read
if (is_readable($locale_file))
{
//requires the file "once" checks to see if file is already included
require_once($locale_file);
}

//Gets the page number
function get_page_number(){
//gets query variable "paged"
if (get_query_var('paged')) {
print '|' . __( 'Page' , 'Volume') . get_query_var('paged');
}
}
//end get_page_number


/////////////////////////////////////////////MENUS///////////////////////////////////////////
add_theme_support( 'nav-menus' );
add_action( 'init', 'register_my_menus' );
//register navigation menus
function register_my_menus()
{
register_nav_menus(
array( 'header-menu' => __( 'Header Menu' ), 'primary' => __( 'Primary' )
)
);
}




// For category lists on category archives: Returns other categories except the current one (redundant)
//cats_meow is a custom function
function cats_meow($glue) {
// assigns current category title to variable
$current_cat = single_cat_title( '', false );
//seperator
$separator = "\n";
//get categories in category list
$cats = explode( $separator, get_the_category_list($separator) );
//for each category string
foreach ( $cats as $i => $str ) {
//if current category
if ( strstr( $str, ">$current_cat<" ) ) {
//get rid of category
unset ($cats[$i]);
//break loop
break;
}
}
if (empty($cats))
return false;
return trim(join( $glue, $cats ));
} // end cats_meow

// For tag lists on tag archives: Returns other tags except the current one (redundant)
//tag_ur_it is a custom function
function tag_ur_it($glue) {
//assigns current tag title to variable
$current_tag = single_tag_title( '', '',  false );
//seperator
$separator = "\n";
//get tags in tag list
$tags = explode( $separator, get_the_tag_list( "", "$separator", "" ) );
foreach ( $tags as $i => $str ) {
if ( strstr( $str, ">$current_tag<" ) ) {
unset($tags[$i]);
break;
}
}
if ( empty($tags) )
return false;
return trim(join( $glue, $tags ));
} // end tag_ur_it


///////////////////////////////////WIDGETS//////////////////////////////////////
add_action( 'init', 'theme_widgets_init' );

// Register widgetized areas
function theme_widgets_init() {
// Area 1
register_sidebar( array (
'name' => 'primary_widget_area',
'id' => 'primary_widget_area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
// Area 2
register_sidebar( array (
'name' => 'secondary_widget_area',
'id' => 'secondary_widget_area', 
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
} // end theme_widgets_init


// Pre-set Widgets
$preset_widgets = array (
'primary_widget_area'  => array( 'search', 'pages', 'categories', 'archives' ),
'secondary_widget_area'  => array( 'links', 'meta' )
);

if ( !isset( $_GET['activated'] ) ) {
//update_option( 'sidebars_widgets', $preset_widgets );
}

// Check for static widgets in widget-ready areas
function is_sidebar_active( $index ){
global $wp_registered_sidebars;
$widgetcolums = wp_get_sidebars_widgets();
if ($widgetcolums[$index]) return true;
return false;
} // end is_sidebar_active
// Produces an avatar image with the hCard-compliant photo class
function commenter_link() {
$commenter = get_comment_author_link();
if ( ereg( '<a[^>]* class=[^>]+>', $commenter ) ) {
$commenter = ereg_replace( '(<a[^>]* class=[\'"]?)', '\\1url ' , $commenter );
} else {
$commenter = ereg_replace( '(<a )/', '\\1class="url "' , $commenter );
}
$avatar_email = get_comment_author_email();
$avatar = str_replace( "class='avatar", "class='photo avatar", get_avatar( $avatar_email, 80 ) );
echo $avatar . ' <span class="fn n">' . $commenter . '</span>';
} // end commenter_link
// Custom callback to list comments in the Volume style
function custom_comments($comment, $args, $depth) {
$GLOBALS['comment'] = $comment;
$GLOBALS['comment_depth'] = $depth;
?>
<li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
<div class="comment-author vcard"><?php commenter_link() ?></div>
<div class="comment-meta"><?php printf(__('Posted %1$s at %2$s <span class="meta-sep">|</span> <a href="%3$s" title="Permalink to this comment">Permalink</a>', 'Volume'),
get_comment_date(),
get_comment_time(),
'#comment-' . get_comment_ID() );
edit_comment_link(__('Edit', 'Volume'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?></div>
<?php if ($comment->comment_approved == '0') _e("\t\t\t\t\t<span class='unapproved'>Your comment is awaiting moderation.</span>\n", 'Volume') ?>
<div class="comment-content">
<?php comment_text() ?>
</div>
<?php // echo the comment reply link
if($args['type'] == 'all' || get_comment_type() == 'comment') :
comment_reply_link(array_merge($args, array(
'reply_text' => __('Reply','Volume'), 
'login_text' => __('Log in to reply.','Volume'),
'depth' => $depth,
'before' => '<div class="comment-reply-link">', 
'after' => '</div>'
)));
endif;
?>
<?php } // end custom_comments
// Custom callback to list pings
function custom_pings($comment, $args, $depth) {
$GLOBALS['comment'] = $comment;
?>
<li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
<div class="comment-author"><?php printf(__('By %1$s on %2$s at %3$s', 'Volume'),
get_comment_author_link(),
get_comment_date(),
get_comment_time() );
edit_comment_link(__('Edit', 'Volume'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?></div>
<?php if ($comment->comment_approved == '0') _e('\t\t\t\t\t<span class="unapproved">Your trackback is awaiting moderation.</span>\n', 'Volume') ?>
<div class="comment-content">
<?php comment_text() ?>
</div>
<?php } // end custom_pings ?>
<?php add_custom_background( 'my_custom_background_callback' ); ?>
<?php
/** Tell WordPress to run Volume_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'Volume_setup' );
if ( ! function_exists('Volume_setup') ):
/**
* @uses add_custom_image_header() To add support for a custom header.
* @uses register_default_headers() To register the default custom header images provided with the theme.
*
* @since 3.0.0
*/
function Volume_setup() {
// This theme uses post thumbnails
add_theme_support( 'post-thumbnails' );
// Your changeable header business starts here
define( 'HEADER_TEXTCOLOR', '' );
// No CSS, just IMG call. The %s is a placeholder for the theme template directory URI.
define( 'HEADER_IMAGE', '%s/images/headers/' );
// The height and width of your custom header. You can hook into the theme's own filters to change these values.
// Add a filter to Volume_header_image_width and Volume_header_image_height to change these values.
// Add a way for the custom header to be styled in the admin panel that controls
// custom headers. See Volume_admin_header_style(), below.
add_custom_image_header( '', 'Volume_admin_header_style' );
// We'll be using post thumbnails for custom header images on posts and pages.
// We want them to be 940 pixels wide by 198 pixels tall (larger images will be auto-cropped to fit).
define( 'HEADER_IMAGE_WIDTH', apply_filters( 'Volume_header_image_width', 980 ) );
define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'Volume_header_image_height', 300 ) );
// Don't support text inside the header image.
define( 'NO_HEADER_TEXT', true );
set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );
}
endif;

if ( ! function_exists( 'Volume_admin_header_style' ) ) :
/**
* Styles the header image displayed on the Appearance > Header admin panel.
*
* Referenced via add_custom_image_header() in Volume_setup().
*
* @since 3.0.0
*/
function Volume_admin_header_style() {
?>
<style type="text/css">
#headimg {
height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
}
#headimg h1, #headimg #desc {
display: none;
}
</style>
<?php
}
endif;
?>
<?php
include 'shortcodes.php';
add_filter('widget_text', 'do_shortcode');
function my_custom_background_callback() {
/* Get the background image. */
$image = get_background_image();
/* If there's an image, just call the normal WordPress callback. We won't do anything here. */
if ( !empty( $image ) ) {
_custom_background_cb();
return;
}
/* Get the background color. */
$color = get_background_color();
/* If no background color, return. */
if ( empty( $color ) )
return;
/* Use 'background' instead of 'background-color'. */
$style = "background: #{$color};";
?>
<style type="text/css">body { <?php echo trim($style);?> }</style>
<?php
}
?>
<?php
add_theme_support('automatic-feed-links');
?>