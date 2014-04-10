<!DOCTYPE html>

<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript">
    //<![CDATA[
    if (typeof newsletter_check !== "function") {
    window.newsletter_check = function (f) {
    var re = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-]{1,})+\.)+([a-zA-Z0-9]{2,})+$/;
    if (!re.test(f.elements["ne"].value)) {
    alert("The email is not correct");
    return false;
    }
    if (f.elements["nn"] && (f.elements["nn"].value == "" || f.elements["nn"].value == f.elements["nn"].defaultValue)) {
    alert("The name is not correct");
    return false;
    }
    if (f.elements["ns"] && (f.elements["ns"].value == "" || f.elements["ns"].value == f.elements["ns"].defaultValue)) {
    alert("The last name is not correct");
    return false;
    }
    if (f.elements["ny"] && !f.elements["ny"].checked) {
    alert("You must accept the privacy statement");
    return false;
    }
    return true;
    }
    }
    //]]>
    </script>
<title>Speck</title>   
<?php wp_head(); ?>
</head>
<body>
<header id="masthead" class="site-header" role="banner">
    <div class="site-branding">
	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
    </div>
</header>
<nav id="site-navigation" class="main-navigation" role="navigation">
    <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
</nav>