<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes();?>>
<head profile="http://gmpg.org/xfn/11">


<!-------------------------------TITLE INFO----------------------------------------------------->
<title><?php
//if single post then print single title
if ( is_single() ) { single_post_title(); }
//if home or front page print blog title and description with page number
elseif ( is_home() || is_front_page() ) { bloginfo('name'); print ' | '; bloginfo('description'); get_page_number(); }
//if page show title of the page
elseif ( is_page() ) { single_post_title(''); }
//if search print default blog title and "search results for" and then the query without special characters and page number
elseif ( is_search() ) { bloginfo('name'); print ' | Search results for ' . esc_html($s); get_page_number(); }
//if error or page not found, print default title and "Not Found"
elseif ( is_404() ) { bloginfo('name'); print ' | Not Found'; }
//otherwise print default title with page number	
else { bloginfo('name'); wp_title('|'); get_page_number(); }
?></title>


<!----------------------SEARCH ENGINE OPTIMIZATION------------------------------------->
<!--specifies content type based on WordPress html type such as text/html as well as encoding such as UTF-8 found in reading admin page-->
<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<!--links to stylesheet url using bloginfo template tag-->
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
<!--if a single post, page, or attachement include wordpress Javascript "comment-reply.js" -->
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<!--links to blog feed for rss reader, prints latest posts. __() accepts string as argument and printf prints the result-->
<!-- rss2_url is rss feed-->
<!--prints to source blog header + latest posts-->
<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url'); ?>" title="<?php printf( __( '%s latest posts', 'Volume' ), esc_html( get_bloginfo('name'), 1 ) ); ?>" />
<!--links to blog comments, works the same as above-->
<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php printf( __( '%s latest comments', 'Volume' ), esc_html( get_bloginfo('name'), 1 ) ); ?>" />
<!--pingback link for rss readers-->
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />


<!--call to jquery script-->
<?php wp_enqueue_script("jquery"); ?>
<!--call to wp_head hook-->
<?php wp_head(); ?>


<!-------------------FONTS----------------->

<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Poiret One">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Linden Hill">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Annie Use Your Telescope">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Mate SC">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Handlee">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Buda">
</head>
<!---end head--->



<!---begin body--->
<body <?php body_class(); ?>>


<!--optimization for search engines-->
<div id="header">

<!-------------------------------------SITE TITLE------------------------------------->

<span id="blog-title">
<?php
//check I made to test the esc_html($s) statement as I was unfamiliar with how it functioned when I put together this theme, It may help those who may also question its functionality
//if (is_search()) print esc_html($s);
?>
<!--creates a link that directs to home page directory, also tells the browser 
that this is the home page of the site by giving it the same title as the displayed name-->
<a href="<?php echo home_url() ?>/" title="<?php bloginfo( 'name' ) ?>" rel="home">
<?php bloginfo( 'name' ) ?>
</a>
</span>



<!-------------------------------------DESCRIPTION------------------------------------->
<span id="branding">
<!--if home page or front page-->
<?php //if ( is_home() || is_front_page() ) { ?>
<!--put description on page in header or in div-->
<!--<h1 id="blog-description"><?php //bloginfo( 'description' ) ?></h1>-->
<?php //} else { ?>
<!--div containing blog description, uses template tag 'bloginfo'-->
<!--<div id="blog-description"><?php //bloginfo( 'description' ) ?></div>-->
<?php //} ?>
</span><!-- #branding -->


<!---------------------------------MENU AREA--------------------------------------->

<span id="access">
<!--http://codex.wordpress.org/Function_Reference/wp_nav_menu creates a preset list with the menu items as defined in Appearance>Menus and sorts the menu in specified order--> 
<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container' => 'div', 'container_class' => 'menu', 'container_id' => false ) ); ?>
</span><!-- #access -->

<!--<div class="divide">
</div>-->

</div><!-- #header -->

<!--------------------------------OPTIONAL HEADER IMAGE--------------------------->
<!-- <div class="hdrimg"> -->
<!--header-->   
<?php
// Check if this is a post or page, if it has a thumbnail, and if it's a big one
//if ( is_singular() && has_post_thumbnail( $post->ID ) && ( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail') ) && $image[1] >= HEADER_IMAGE_WIDTH ) :
// We have a new header image if one is not predefined
//echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' );
//else : ?>
<!--gets image size and displays image with width and height parameters-->
<?php //if(get_header_image()) 
//{?>					
<!-- <img src="<?php //header_image(); ?>" width="<?php //echo HEADER_IMAGE_WIDTH; ?>" height="<?php //echo HEADER_IMAGE_HEIGHT; ?>" alt="" /> 
<?php //} ?>
<?php //endif; ?>
<!-- </div> --> <!-- .hdrimg -->


<!--------------------------------SKIP LINK------------------------------------->
<div id="wrapper" class="hfeed">
<span class="skip-link">
<!--sets link to skip to page content area-->
<a href="#content" title="<?php _e( 'Skip to content', 'Volume' ) ?>"><?php _e( 'Skip to content', 'Volume' )?></a>
</span><!-- .skip-link -->
<!--divider image below header-->


<!----------------------------INDEX/PAGE/POST----------------------------------->
<div id="main">







    