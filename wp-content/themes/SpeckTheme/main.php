<?php
/*
Template Name: Main
*/
?>
<!DOCTYPE html>
<?php require_once("main-head.php"); ?>
<div class="nav">
    
</div>

<div class="main-slider">
    <div class="flexslider">
	<ul class="slides">
	<?php
	query_posts(array('category_name' => 'Featured', 'posts_per_page' => 3));
	if(have_posts()) :
	    while(have_posts()) : the_post();
	?>
	  <li>
		<?php the_post_thumbnail("full"); ?>
		<!--<p class="flex-caption"><?php //the_excerpt(); ?></p>-->
	  </li>
	<?php
	    endwhile;
	endif;
	wp_reset_query();
	?>
	</ul><!--slides-->
    </div><!--.flexslider-->
</div><!--.main-slider-->
<div class="bottom">
    <div class="fade-top">
    </div>
    <div class="top-bot">
        <h2><div class="linediv">||||||||||||||||</div>&nbsp Try. &nbsp Something. &nbsp Neue. &nbsp<div class="linediv">||||||||||||||||</div></h2>
            <div class="liquid-slider" id="one">
                <?php
                // Default $args
                    $args = array(
                            'post_type' => 'slide', // required
                            'suppress_filters' => FALSE, // required
                            'posts_per_page' => ALL // optional*/
                    );
                    // The Query
                     ?>
			    <?php
				$posts = new WP_Query($args);
                                $i = 0;
                                $a = 0;
                                $x = 0;
                                $b = wp_count_posts('slide');
                                $num_posts = $b->publish;
                                if ($i == 0) {
                                    echo '<div class="panel">';
                                }
				// The Loop
				if ($posts->have_posts()) {
					while ( $posts->have_posts() ) {
                                                $i++;
                                                $x++;
                                                if (have_posts()) {
                                                $z = $x / 4;
                                                if ($x == $num_posts) {
                                                    $z--;
                                                }
                                                }
                                                //echo $i;
                                                $posts->the_post();
						//print_r($arr);
						//echo get_the_title();
                                                $img_size = "thumbnail";
						echo
						'<li class="ls-image">' . '<a href="' . esc_url( get_permalink( get_page_by_title( get_the_title()))) . '">' . get_the_post_thumbnail( $post_id, $img_size ) . '</a>' . 
						'</li>';
                                                
						if ($i == 4 && $a < $z) {
                                                    echo "</div><div class='panel'>";
                                                    $i = 0;
                                                    $a++;
                                                } else {
                                                    echo "";
                                                }
                                                if (have_posts()) {
                                                $z = $x / 4;
                                                }
                                        }
				} else {
					// no posts found
                                
				}
				// Restore original Post Data
				wp_reset_postdata();
			    ?>   
                </div>
	    </div><!--.liquid-slider-->
        <div class="img-bar"></div>
    </div>
    <div class="fade-bot">
    </div>
    <div class="mid-bot">
        <div class="div-head">Find Speck</div>
            <div class="events">
		<div class="img-horse"></div>
                <div class="liquid-slider" id="slider-id">
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
				$i = 0;
                                $a = 0;
                                $x = 0;
                                $b = wp_count_posts('event');
                                $num_posts = $events->post_count;
                                if ($i == 0) {
                                    echo '<div class="panel">';
                                }
				// The Loop
				if ($events->have_posts()) {
					while ( $events->have_posts() ) {
						$i++;
                                                $x++;
                                                if (have_posts()) {
                                                $z = $x / 4;
                                                if ($x == $num_posts) {
                                                    $z--;
                                                }
                                                }
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
						if ($i == 4 && $a < $z) {
                                                    echo "</div><div class='panel'>";
                                                    $i = 0;
                                                    $a++;
                                                } else {
                                                    echo "";
                                                }
                                                if (have_posts()) {
                                                $z = $x / 4;
                                                }
					}
				} else {
					// no events found
				}
				// Restore original Post Data
				wp_reset_postdata();
			    ?>
		    </div><!--.panel-->
		</div><!--.liquid-slider-->
		<span id="pdf-dl">View our full calandar <a href="http://www.eatspeck.com/wordpress/wp-content/uploads/<?php echo date('Y'); ?>/<?php echo date('m'); ?>/calandar.pdf">here.</a></span>
	    </div><!--.events-->
    </div><!--.mid-bot-->
    <div class="bot-bot">
	<div class="fade">
	</div>
	<h1 class="blog-head">
            
	<div class="linediv">||||||||||||||||</div>
	About Speck
	<div class="linediv">||||||||||||||||</div>
	</h1>
	<div class="profiles">
        <?php //echo get_avatar( 'joshlinke@gmail.com', 150, '', true );
                $args = array(
                            'post_type' => 'profile', // required
                            'suppress_filters' => FALSE, // required
                            'posts_per_page' => ALL // optional*/
                );
                
                $profiles = new WP_query($args);
                    if ( $profiles->have_posts()) {
                        while ($profiles->have_posts()) {
                            $profiles->the_post();
                            echo "<div class='prof'>";
                            echo "<span class='bio-img'>"; 
                            echo the_post_thumbnail('small');
                            echo "</span>"; 
                            echo "<span class='prof-desc'>"; 
                            echo "<h3 class='prof-name'>";
                            echo the_title();
                            echo "</h3>";
                            echo "<span class='prof-exc'>";
                            echo the_excerpt();
                            echo "</span>"; 
                            echo "</span>";
                            echo "</div>";
                            
                            
                        
                        }
                    }    
            ?>
	</div>
	<h1 class="blog-head">
            
	<div class="linediv">||||||||||||||||</div>
	Our Latest News
	<div class="linediv">||||||||||||||||</div>
	</h1>
	<div class="posts">
	    <?php
	    $cat_id = get_cat_ID('Featured');
	    $args = array (
		    'post_type' => 'post',
		    'suppress_filters' => FALSE,
		    'posts_per_page' => 3,
		    'order' => 'desc',
		    'category__not_in' => array($cat_id)
		    );
	    $posts = new WP_query($args);
	    if ( $posts->have_posts()) {
		while ($posts->have_posts()) {
		    $posts->the_post();
		    if (has_post_thumbnail()) {
			echo "<li>";
			echo the_post_thumbnail('small');
			echo "<div class='p_d'>";
			echo "<p>";
			echo "<span>";
			echo the_time('M');
			echo "</span>";
			echo "</br>";
			echo "<span class='day'>";
			echo the_time('j');
			echo "</span>";
			echo "</p>";
			echo "</div>";
			echo "<div class='blog-bot'>";
			echo "<h3 class='blog-title'>";
			echo the_title();
			echo "</h3>";
			echo "<p class='blog-excerpt'>";
			echo the_excerpt();
			echo "</p>";
			echo "</div>";
		    }
		    echo "</li>";
		}
	    }
	    ?>
	</div>
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
    <div class="push">
	    <div class="bot-div">
	<h2>
            Find something neue... In your inbox.
        </h2>
	<div class="newsletter newsletter-subscription">
		<form method="post" action="http://localhost/wordpress/wp-content/plugins/newsletter/do/subscribe.php" onsubmit="return newsletter_check(this)">
		    <table cellspacing="0" cellpadding="3" border="0">
			<!-- first name -->
			<tr>
				<td><input class="newsletter-firstname" type="text" name="nn" value="First Name" size="30"required></td>
			</tr>
			<!-- last name -->
			<tr>
				<td><input class="newsletter-lastname" type="text" name="ns" value="Last Name" size="30"required></td>
			</tr>
			<!-- email -->
			<tr>
				<td align="left"><input class="newsletter-email" type="email" name="ne" value="Email" size="30" required></td>
			</tr>
			<tr>
				<td colspan="2" class="newsletter-td-submit">
					<input class="newsletter-submit" type="submit" value="Subscribe"/>
				</td>
			</tr>
		    </table>
		</form>
	</div>
    </div>
    </div>
    <div class="widget-bottom">
        <?php if ( dynamic_sidebar('Front Page Widget') ) : else : endif; ?>
    </div>
	<div class="footer-bottom">
        <div id="logo-bottom">
            <img src='<?php bloginfo('template_url'); ?>/img/sp_logo_white_notag.png' height="125px" width="500px">
        </div>
        <div id="foot-nav">
            <?php wp_nav_menu( array( 'theme_location' => 'secondary') ); ?>
            <span class="menu-div">
            ...............................................................................................................................
            </span>
	    <div class="social-two">
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
        </div><!--#foot-nav"-->
        </div><!--.footer-bottom-->
    </div><!--.bot-bot-->
    <div class="wp-bot">
	<span>Proudly Powered by WordPress and created by Mylon Marcell</span>
    </div>
</div><!--.bottom-->