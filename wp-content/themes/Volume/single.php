<?php get_header(); ?>
<div id="container">
<div id="content">
<?php the_post(); ?>
<div id="nav-above" class="navigation">
<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">&laquo;</span> %title' ) ?></div>
<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">&raquo;</span>' ) ?></div>
</div><!-- #nav-above -->

<!--post ID-->
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<!--get title of post-->
<h1 class="post-entry-title">
<?php the_title(); ?>
</h1>

<!--author info-->                           
<div class="entry-meta-post">
<span class="meta-prep meta-prep-author"><?php _e('By ', 'Volume'); ?>
</span>
<!--inject author link-->
<span class="author vcard">
<a class="url fn n" href="<?php echo get_author_posts_url( false, $authordata->ID, $authordata->user_nicename ); ?>" title="<?php printf( __( 'View all posts by %s', 'Volume' ), $authordata->display_name ); ?>">
<?php the_author(); ?>
</a>
</span>

<!--bar-->                           
<span class="meta-sep"> | </span>

<!--date "published" line-->                                    
<span class="meta-prep meta-prep-entry-date">
<?php _e('Published ', 'Volume'); ?>
</span>

<!--date-->                                   
<span class="entry-date">
<abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?>
</abbr>
</span>

<!--edit link-->
<?php edit_post_link( __( 'Edit', 'Volume' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t" ) ?>                                               

</div><!-- .entry-meta -->

<!--content-->                               
<div class="entry-content">
<?php the_content(); ?>
<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'Volume' ) . '&after=</div>') ?>
</div><!-- .entry-content -->

<div class="entry-utility">

<!--prints a link to the permalink for bookmarking purposes and the RSS for this particular single post-->
<?php printf( __( 'This entry was posted in %1$s%2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>. Follow any comments here with the <a href="%5$s" title="Comments RSS to %4$s" rel="alternate" type="application/rss+xml">RSS feed for this post</a>.', 'Volume' ),
get_the_category_list(', '), //stores category list in printf
get_the_tag_list( __( ' and tagged ', 'Volume' ), ', ', '' ), //stores and lists tags
get_permalink(), //stores permalink information
the_title_attribute('echo=0'), //stores title attribute
get_post_comments_feed_link() ) //stores and links to rss ?> 

<!--checks for comments and trackbacks to be open-->
<?php if ( ('open' == $post->comment_status) && ('open' == $post->ping_status) ) : // Comments and trackbacks open ?>

<!--enable comments and trackbacks-->
<?php printf( __( '<a class="comment-link" href="#respond" title="Post a comment">Post a comment</a> or leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your post" rel="trackback">Trackback URL</a>.', 'Volume' ), get_trackback_url() ) ?>

<!--checks for closed comments and open trackbacks-->
<?php elseif ( !('open' == $post->comment_status) && ('open' == $post->ping_status) ) : // Only trackbacks open ?>

<!--enable trackbacks-->
<?php printf( __( 'Comments are closed, but you can leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your post" rel="trackback">Trackback URL</a>.', 'Volume' ), get_trackback_url() ) ?>

<!--check for closed trackbacks-->
<?php elseif ( ('open' == $post->comment_status) && !('open' == $post->ping_status) ) : // Only comments open ?>

<!--enable comments-->
<?php _e( 'Trackbacks are closed, but you can <a class="comment-link" href="#respond" title="Post a comment">post a comment</a>.', 'Volume' ) ?>

<!--check for closed comments and trackbacks-->
<?php elseif ( !('open' == $post->comment_status) && !('open' == $post->ping_status) ) : // Comments and trackbacks closed ?>
<!--displays closed comments and trackbacks status-->
<?php _e( 'Both comments and trackbacks are currently closed.', 'Volume' ) ?>

<?php endif; ?>

<!--edit link-->
<?php edit_post_link( __( 'Edit', 'Volume' ), "\n\t\t\t\t\t<span class=\"edit-link\">", "</span>" ) ?>


</div><!-- .entry-utility -->   


</div><!-- #post-<?php the_ID(); ?> -->          

<!--bottom navigation-->
<div id="nav-below" class="navigation">

<div class="nav-previous">
<?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Older posts', 'Volume' )) ?>
</div>

<div class="nav-next">
<?php previous_posts_link(__( 'Newer posts <span class="meta-nav">&raquo;</span>', 'Volume' )) ?>
</div>

</div><!-- #nav-below -->   

<!--calls comments template-->                  
<?php comments_template('', true); ?> 


</div><!-- #content -->

</div><!-- #container -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
