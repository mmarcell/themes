<?php
/**
 * The Header for our theme.
 *
 * Displays the <head> section of HTML
 *
 * @package Theme
 * @since Theme 2.0
 */
?>

<!-- GET DOCTYPE AND ADD LANGUAGE SUPPORT -->
<!DOCTYPE html>
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<!-- BEGIN HEAD -->
<head>
     
<!-- META INFO -->
<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width" />


<!-- TITLE TAG -->
<title><?php
/*
 *Print the <title> tag based on what is being viewed.
 */
global $page, $paged;

wp_title( '|', true, 'right' );

//Add the blog name
bloginfo('name');
$site_description = get_bloginfo( 'description', 'display' );
if ( $site_description && ( is_home() || is_front_page()))
echo " | $site_description";

//Add a page number
if ( $paged >= 2 || $page >= 2)
echo ' | ' . sprintf(__( 'Page %s', 'theme'), max($paged, $page));
?>
</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!--provides support for browsers before IE9 -->
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<!-- HEAD HOOK -->
<?php wp_head(); ?>

<!-- FONTS -->
<link href='http://fonts.googleapis.com/css?family=Loved+by+the+King' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Handlee' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Coming+Soon' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Radley' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Julius+Sans+One' rel='stylesheet' type='text/css'>
</head>

<!-- ADDS BODY CLASSES -->

<body <?php body_class(); ?>>


<div id="page" class="hfeed site">
     <header id="masthead" class="site-header" role="banner">
          <hgroup>
               <h1 class="site-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <aside id="search-head" class="widget widget_search">
                         <?php get_search_form(); ?>
                    </aside>
               <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
          </hgroup>

          <nav role="navigation" class="site-navigation main-navigation">
               <div id="nav"><?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?></div>
               <h1 class="assistive-text"><?php _e( 'Menu', 'theme' ); ?></h1>
               <div class="assistive-text skip-link"><a href="#content" title
          </nav><!-- .site-navigation .main-navigation -->
          
     </header><!-- #masthead .site-header -->
     <div id="main" class="site-main">
          