<?php
/**
 Template Name: Main
 */

get_header(); ?>
	
	<div id="slider">
	    <div class="flexslider">
		<ul class="slides">
		    <?php
		    query_posts(array('category_name' => 'slide', 'posts_per_page' => 5));
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
		</ul>
	    </div>
        </div>
	    <main id="main" class="site-main" role="main">

		

	    </main><!-- #main -->
<?php get_footer(); ?>
