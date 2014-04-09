
<?php get_header(); ?>

<div id="container">
<div id="content">


<?php the_post(); ?>
<!--link to parent post-->
<h1 class="page-title">
<a href="<?php echo get_permalink($post->post_parent) ?>" title="<?php printf( __( 'Return to %s', '' ), esc_html( get_the_title($post->post_parent), 1 ) ) ?>" rev="attachment">
<!--backarrow-->
<span class="meta-nav">&laquo; </span>
<?php echo get_the_title($post->post_parent) ?>
</a>
</h1>


<!--post ID-->
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<!--title-->  
<h2 class="entry-title">
<?php the_title(); ?>
</h2>

<!--author info-->                           
<div class="entry-meta">
<span class="meta-prep meta-prep-author"><?php _e('By ', ''); ?>
</span>
<span class="author vcard">
<a class="url fn n" href="<?php echo get_author_posts_url( false, $authordata->ID, $authordata->user_nicename ); ?>" title="<?php printf( __( 'View all posts by %s', 'y' ), $authordata->display_name ); ?>">
<?php the_author(); ?>
</a>
</span>

<!--bar-->                           
<span class="meta-sep"> | </span>

<!--"published" line-->                                    
<span class="meta-prep meta-prep-entry-date">
<?php _e('Published ', ''); ?>
</span>

<!--date-->                                   
<span class="entry-date">
<abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?>
</abbr>
</span>

<!--edit link-->
<?php edit_post_link( __( 'Edit', '' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t" ) ?>                                               

</div><!-- .entry-meta -->

<!--content-->                               
<div class="entry-content">

<!--allow attachements-->
<div class="entry-attachment">
<!--checks if attachment is an image or source-->                                  
<?php if ( wp_attachment_is_image( $post->id ) ) : $att_image = wp_get_attachment_image_src( $post->id, "medium"); ?>
<p class="attachment">

<!--gets attachment url and posts it based on attachment parameters-->
<a href="<?php echo wp_get_attachment_url($post->id); ?>" title="<?php the_title(); ?>" rel="attachment">
<img src="<?php echo $att_image[0];?>" width="<?php echo $att_image[1];?>" height="<?php echo $att_image[2];?>"  class="attachment-medium" alt="<?php $post->post_excerpt; ?>" />
</a>

</p>

<!--else gets attachment parameters and posts-->
<?php else : ?>         
<a href="<?php echo wp_get_attachment_url($post->ID) ?>" title="<?php echo esc_html( get_the_title($post->ID), 1 ) ?>" rel="attachment">
<!--gets basename from post identifier-->
<?php echo basename($post->guid) ?>
</a>          
<?php endif; ?>         
</div>                          
<div class="entry-caption">
<!--creates attachement excerpt and posts-->
<?php if ( !empty($post->post_excerpt) ) the_excerpt() ?>
</div>

<!--navigation-->                    
<?php the_content( __( 'Continue reading <span class="meta-nav">&raquo;</span>', '' )  ); ?>
<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', '' ) . '&after=</div>') ?>

</div><!-- .entry-content -->


<div class="entry-utility">

<!--prints a link to the permalink for bookmarking purposes and the RSS for this particular single post-->
<?php printf( __( 'This entry was posted in %1$s%2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>. Follow any comments here with the <a href="%5$s" title="Comments RSS to %4$s" rel="alternate" type="application/rss+xml">RSS feed for this post</a>.', '' ),
get_the_category_list(', '),
get_the_tag_list( __( ' and tagged ', '' ), ', ', '' ),
get_permalink(),
the_title_attribute('echo=0'),
get_post_comments_feed_link() ) ?>

<!--checks for comments and trackbacks to be open-->
<?php if ( ('open' == $post->comment_status) && ('open' == $post->ping_status) ) : // Comments and trackbacks open ?>

<!--enable comments and trackbacks-->
<?php printf( __( '<a class="comment-link" href="#respond" title="Post a comment">Post a comment</a> or leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your post" rel="trackback">Trackback URL</a>.', '' ), get_trackback_url() ) ?>

<!--checks for closed comments and open trackbacks-->
<?php elseif ( !('open' == $post->comment_status) && ('open' == $post->ping_status) ) : // Only trackbacks open ?>

<!--enable trackbacks-->
<?php printf( __( 'Comments are closed, but you can leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your post" rel="trackback">Trackback URL</a>.', '' ), get_trackback_url() ) ?>

<!--check for closed trackbacks-->
<?php elseif ( ('open' == $post->comment_status) && !('open' == $post->ping_status) ) : // Only comments open ?>

<!--enable comments-->
<?php _e( 'Trackbacks are closed, but you can <a class="comment-link" href="#respond" title="Post a comment">post a comment</a>.', '' ) ?>

<!--check for closed comments and trackbacks-->
<?php elseif ( !('open' == $post->comment_status) && !('open' == $post->ping_status) ) : // Comments and trackbacks closed ?>
<!--displays closed comments and trackbacks status-->
<?php _e( 'Both comments and trackbacks are currently closed.', '' ) ?>

<?php endif; ?>

<!--edit link-->
<?php edit_post_link( __( 'Edit', '' ), "\n\t\t\t\t\t<span class=\"edit-link\">", "</span>" ) ?>


</div><!-- .entry-utility -->   


</div><!-- #post-<?php the_ID(); ?> -->          



<!--calls comments template-->               
<?php comments_template('', true); ?> 


</div><!-- #content -->
</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
