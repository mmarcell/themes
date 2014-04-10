<?php require_once("header.php"); ?>
<div class="div-hd-mobile">Find Us</div>
            <div class="event-mobile">
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
<div class="newsletter newsletter-subscription">
    <div class="div-hd-mobile">Join Our Newsletter</div>
    <form class="news-form" method="post" action="http://localhost/wordpress/wp-content/plugins/newsletter/do/subscribe.php" onsubmit="return newsletter_check(this)">
        <table class="news-table" cellspacing="0" cellpadding="3" border="0">
            <!-- first name -->
            <tr>
                    <td><input class="news-in" type="text" name="nn" value="First Name" size="30"required></td>
            </tr>
            <!-- last name -->
            <tr>
                    <td><input class="news-in" type="text" name="ns" value="Last Name" size="30"required></td>
            </tr>
            <!-- email -->
            <tr>
                    <td align="left"><input class="news-in" type="email" name="ne" value="Email" size="30" required></td>
            </tr>
            <tr>
                    <td colspan="2" class="newsletter-td-submit">
                            <input class="newsletter-submit" type="submit" value="Subscribe"/>
                    </td>
            </tr>
        </table>
    </form>
</div>
<?php require_once("footer.php"); ?>