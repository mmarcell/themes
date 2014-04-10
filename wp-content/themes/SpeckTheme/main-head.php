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
<!--[if lt IE 11]><p>Please upgrade your version of Internet Explorer.</p><![endif]-->

<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width; initial-scale = 1.0; maximum-scale=1.0; user-scalable=no" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		</div>

		<nav id="site-navigation" class="main-navigation" role="navigation">
		
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		
	<div id="div-hd-mobile">Find Us</div>
            <div id="event-mobile">
                <div class="liquid-slider" id="slider-mobile">
                <?php
                // Default $args
                    $args = array(
                            'post_type' => 'event', // required
                            'suppress_filters' => FALSE, // required
                            'posts_per_page' => ALL // optional*/
                    );
                    // The Query
                     ?>
			    <?php
				$events = new WP_Query($args);
				$c = $events->post_count;
                                if ($i == 0) {
                                    echo '<div class="panel">';
                                }
				// The Loop
				if ($events->have_posts()) {
					while ( $events->have_posts() ) {
						$i++;
						$events->the_post();
						$arr = em_get_locations_for(get_the_ID());
						//print_r($arr);
						$arr = $arr[0];
						if (is_object($arr)) {
						// Gets the properties of the given object
						// with get_object_vars function
						$arr = get_object_vars($arr);
						}
						//print_r($arr);
						//echo get_the_title();
						echo
						'<li class="listing">' . '<h2>' . get_the_title() . '</h2>' .
						'<h4>Date:</h4>' . em_get_the_start(get_the_ID(), 'date') .
						'<h4>Start:</h4>' . em_get_the_start(get_the_ID(), 'time') .
						'<h4>End:</h4>' . em_get_the_end(get_the_ID(), 'time') .
						'<h4>Location:</h4>' . '<a href="' . esc_url( get_permalink( get_page_by_title( get_the_title()))) . '">' . 
						$arr['location_meta']['address'] . '</a>' . 
						//em_get_event_date_link($year, $month, $day)
						'</li>';
						if ($i < $c) {
                                                    echo "</div><div class='panel'>";
                                                } else {
                                                    echo "";
						    $i = 0;
                                                }
					}
				} else {
					// no events found
				}
				// Restore original Post Data
				wp_reset_postdata();
			    ?>
		    </div>
		</div>
	    </div>
		<span>
			<div class="social">
				
                                <div class="insta">
				<a href="http://instagram.com/joshlinke">
                                </a>
				</div>  
                                
				<div class="vim">
				<a href="http://vimeo.com/specklouisville">
                                </a>
				</div>
                                
				<div class="tumblr">
				<a href="http://specklouisville.tumblr.com/">	
				</a>
                                </div>
                                
				<div class="twitter">
				<a href="https://twitter.com/eatspeck">
                                </a>
				</div>

				<div class="facebook">
				<a href="http://www.facebook.com/eatspeck">
                                </a>
				</div>

			</div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">