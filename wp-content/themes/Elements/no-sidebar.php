<?php
/*
Template Name: No-Sidebar
*/
get_header(); ?>
 
        <div id="primary-fixed" class="fixed-content-area">
            <div id="content-fixed" class="site-content" role="main">
 
                <?php while ( have_posts() ) : the_post(); ?>
 
                    <?php get_template_part( 'content', 'page' ); ?>
 
                    <?php comments_template( '', true ); ?>
 
                <?php endwhile; // end of the loop. ?>
 
            </div><!-- #content .site-content -->
        </div><!-- #primary .content-area -->
 
<?php get_footer(); ?>