<?php
/*
Template Name: Pages-Loop
*/
get_header(); ?>
    <?php query_posts(array(
                    'showposts' => '5',
                    'post_parent' => '280',
                    'post_type' => 'page'
                    )); ?>
        <div id="primary-fixed" class="fixed-content-area">
            <div id="content-fixed" class="site-content" role="main">
 
                <?php while (have_posts()) { the_post(); ?>
                    <div class="plentry">
                    <h2 id="pltitle">
                    <a href="<?php the_permalink();?>"><?php the_title(); ?></a>
                    </h2>
                    <div id="plthumb">
                    <?php the_post_thumbnail('large'); ?>
                    </div>
                    <span id="plexcerpt">
                    <?php the_excerpt();?>
                    </span>
                    </div>
                
                <?php }
                wp_reset_query(); ?>
 
 
            </div><!-- #content .site-content -->
        </div><!-- #primary .content-area -->
 
<?php get_footer(); ?>