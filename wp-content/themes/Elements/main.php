<?php
/*
Template Name: Main Page
*/
?>
<!DOCTYPE HTML>
<title>
Giles Smiles Photography
</title>
<head>
<?php wp_head(); ?>
<meta name="viewport" content="width=device-width" />
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Amatic SC">
<link href='http://fonts.googleapis.com/css?family=Loved+by+the+King' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Handlee' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Coming+Soon' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Radley' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Julius+Sans+One' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Sacramento' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Gilda+Display' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/styles/mainstyle.css" media="screen" />
</head>
<body>
<div class="wrapper">
<div id="mn_about">
<div id="logo">
</div><!-- #logo -->
<div id="slide1">
<?php //if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow('giles1'); } ?>
<?php do_action('slideshow_deploy', 'slides1'); ?>
</div>
<div id="about">
<p>
I am a military wife and mother of three beautiful girls who has found her niche in the world as one who captures once in a lifetime moments. 
I appreciate the beauty in all things and have a passion for my work as an artist. 
My father's love of nature and macro photography led me to look at the world through very detailed oriented eyes. 
I love simple shapes and colors and lines, as well as the complexity of faces and the emotions they portray.
</p> 
</div>
<div id="slide2">
<?php //if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow('giles2'); } ?>
<?php do_action('slideshow_deploy', 'slides2-2'); ?>
</div>
</div>
<div id="mn_menu">
<div class="position">
<?php
wp_nav_menu( array( 'theme_location' => 'primary', 'container' => 'div', 'container_class' => 'menu' ) );
?>
</div><!-- .position -->
</div><!-- #mn_menu -->


</div><!-- .wrapper -->
<div id="push">
    
</div>
<div id="mn_footer">
<a href="">
<div id="sect_logo">
</div>
</a>
<div id="sect_comment">
</div>
<div id="sect_social">
<span id="follow">
Follow Us On:
</span>
<a href="">
<div id="btn_1">
</div>
</a>
<a href="http://500px.com/GilesSmiles">
<div id="btn_2">
</div>
</a>
<a href="http://pinterest.com/gilessmilesphot/">
<div id="btn_3">
</div>
</a>
<a href="http://www.facebook.com/GilesSmilesPhoto">
<div id="btn_4">
</div>
</a>
<a href="https://twitter.com/#!/GilesSmilesPhot">
<div id="btn_5">
</div>
</a>
</div><!-- #sect_social -->
</div><!-- #mn_footer -->



<?php wp_footer(); ?>

</body>
</html>