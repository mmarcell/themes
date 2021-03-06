<?php
/**
 * @package _s
 */
?>

<article class="hentry" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-side">
		<?php the_post_thumbnail( __( 'medium' )); ?>
		<div class="entry-meta">
			<?php _s_posted_on(); ?>
		</div><!-- .entry-meta -->
			<footer class="entry-meta">
			<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
				<?php
					/* translators: used between list items, there is a space after the comma */
					$categories_list = get_the_category_list( __( ', ', '_s' ) );
					if ( $categories_list && _s_categorized_blog() ) :
				?>
				<span class="cat-links">
					<?php printf( __( 'Posted in %1$s', '_s' ), $categories_list ); ?>
				</span>
				<?php endif; // End if categories ?>
	
				<?php
					/* translators: used between list items, there is a space after the comma */
					$tags_list = get_the_tag_list( '', __( ', ', '_s' ) );
					if ( $tags_list ) :
				?>
				<span class="tags-links">
					<?php printf( __( 'Tagged %1$s', '_s' ), $tags_list ); ?>
				</span>
				<?php endif; // End if $tags_list ?>
			<?php endif; // End if 'post' == get_post_type() ?>
	
			<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', '_s' ), __( '1 Comment', '_s' ), __( '% Comments', '_s' ) ); ?></span>
			<?php endif; ?>
	
			<?php edit_post_link( __( 'Edit', '_s' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- .entry-meta -->
	</div>

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-content">
		<header class="entry-header">
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			<?php if ( 'post' == get_post_type() ) : ?>
			<?php endif; ?>
		</header><!-- .entry-header -->
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->
	<?php else : ?>
	<div class="entry-content">
		<header class="entry-header">
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			<?php if ( 'post' == get_post_type() ) : ?>
			<?php endif; ?>
		</header><!-- .entry-header -->
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', '_s' ) ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', '_s' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>
</article><!-- #post-## -->
