<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package SpeckTheme
 */
?>
<!DOCTYPE html>
<![if gt IE 6]>
<link rel="stylesheet" type="text/css" href="ie-style.css" />
<![endif]>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="bloghead" class="blog-header" role="banner">
		<div class="blog-branding">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><h1 class="blog-menu-title"><?php bloginfo( 'name' ); ?></h1></a>
		</div>

		<nav id="blog-navigation" class="blog-navigation" role="navigation">
		
			<?php wp_nav_menu( array( 'theme_location' => 'blog' ) ); ?>
			
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="blog-content" class="blog-content">
