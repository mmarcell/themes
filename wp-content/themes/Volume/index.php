<?php get_header();?>

<!--Container for widget areas-->
<div id="container">
<div id="content">

<!-- Top post navigation *OPTIONAL* --> 
<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
<div id="nav-above" class="navigation">
<!--navigates to previous posts-->
<div class="nav-previous">
<!--next_posts_link actually creates a link to previous posts while previous_posts_link does the opposite-->
<!--meta-nav is navigation meta-data built in to wordpress-->
<?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> <i>Older News</i>', 'Volume' )) ?>
</div>

<!--navigates to next post-->
<div class="nav-next">
<?php previous_posts_link(__( '<i>Newer News</i> <span class="meta-nav">&raquo;</span>', 'Volume' )) ?>
</div>
</div><!-- #nav-above -->
<!--closing bracket-->
<?php } ?>

<!--The Loop-->
<!--iterates through posts and displays the current post-->           
<?php while ( have_posts() ) : the_post() ?>

<!-- Create a div with a unique ID thanks to the_ID() and semantic classes with post_class() -->
<!-- defines a unique post ID saying post-# for navigation, exposes various metadata about post to browser-->
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div id="fptop">
<!-- an h2 title for individual posts -->
<!--establishes a permanent link to the content, creates a title for the browser and establishes a bookmark. Also creates a viewable title--> 
<h2 class="entry-title">
<a href="<?php the_permalink(); ?>" title="<?php printf( __('Permalink to %s', 'Volume'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
<?php the_title(); ?>
</a>




<!-------------------------------------------META----------------------------->

<!-- Microformatted, translatable post meta -->
<div class="entry-meta">
<span class="meta-prep meta-prep-author">
<!--prints "By" -->
<?php _e('By ', 'Volume'); ?>
</span>
<!-- defines author information-->
<span class="author vcard">
<a class="url fn n" href="<?php echo get_author_posts_url( false, $authordata->ID, $authordata->user_nickname ); ?>" title="<?php printf( __( 'View all posts by %s', 'Volume' ), $authordata->display_name ); ?>">
<?php the_author(); ?>
</a>
</span>
<!--seperator-->
<span class="meta-sep"> | </span>
<!--published-->
<span class="meta-prep meta-prep-entry-date">
<?php _e('Published ', 'Volume'); ?>
</span>
<!--date-->
<span class="entry-date">
<abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO'); ?>">
<?php the_time( get_option( 'date_format' ) ); ?>
</abbr>
</span>
<!--provides link to edit post if allowed-->
<?php edit_post_link( __( 'Edit', 'Volume' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t" ); ?>
</div><!-- .entry-meta -->





</h2>
</div><!-- #fptop-->



<div id="fullpost">


<!--enter content-->         
<div class="entry-content">
<?php the_content( __( 'Continue reading <span class="meta-nav">&raquo;</span>', 'Volume' )  ); ?>
<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'Volume' ) . '&after=</div>'); ?>
</div><!-- .entry-content -->

<!-- Microformatted category and tag links along with a comments link -->

<div class="entry-utility">

<!--category-->
<span class="cat-links">
<span class="entry-utility-prep entry-utility-prep-cat-links"><?php _e( 'Posted in ', 'Volume' ); ?>
</span>
<?php echo get_the_category_list(', '); ?>
</span>

<!--tags-->
<span class="meta-sep"> | </span>
<?php the_tags( '<span class="tag-links"><span class="entry-utility-prep entry-utility-prep-tag-links">' . __('Tagged ', 'Volume' ) . '</span>', ", ", "</span>\n\t\t\t\t\t\t<span class=\"meta-sep\">|</span>\n" ) ?>

<!--comments-->
<span class="comments-link">
<?php comments_popup_link( __( 'Leave a comment', 'Volume' ), __( '1 Comment', 'Volume' ), __( '% Comments', 'Volume' ) ) ?></span>

<!--edit posts link-->
<?php edit_post_link( __( 'Edit', 'Volume' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t\n" ) ?>

</div><!-- #fullpost -->
</div><!-- #entry-utility -->
</div><!-- #post-<?php the_ID(); ?> -->
<!-- <div id="fpbottom"> </div> -->



<?php
if (($wp_query->current_post + 1) < ($wp_query->post_count)) {
echo '<div class="post-item-divider"></div>';
}
?>


<!-- Close up the post div and then end the loop with endwhile -->

<?php endwhile; ?>




<!-- Bottom post navigation *OPTIONAL* -->
<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>

<div id="nav-below" class="navigation">

<!--<div class="nav-previous"> -->
<?php //next_posts_link(__( '<span class="meta-nav">&laquo;</span> Older posts', 'Volume' )) ?>
<!--</div>
<div class="nav-next"> -->
<?php //previous_posts_link(__( 'Newer posts <span class="meta-nav">&raquo;</span>', 'Volume' )) ?>
<!--</div> -->

</div><!-- #nav-below -->

<!--closing bracket-->
<?php } ?>




</div><!-- #content -->
</div><!-- #container -->

<?php get_sidebar(); ?>

<?php get_footer();?>
