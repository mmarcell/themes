<?php
/**
* The template for displaying the footer.
*
* Contains the closing of the id=main div and all content after
*
* @package Theme
* @since Theme 1.0
*/
?>
 
</div><!-- #main .site-main -->
 
<footer id="colophon" class="site-footer" role="contentinfo">

<div id="footer-sidebar" class="footer">
    <div id="footer-width">
    <div id="footer-sidebar1">
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(3) ) : ?>
    <?php endif; ?>
    </div>
    <span class="bar">
    </span>
    <div id="footer-sidebar2">
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(4) ) : ?>
    <?php endif; ?>
    </div>
    <span class="bar">
    </span>
    <div id="footer-sidebar3">
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(5) ) : ?>
    <?php endif; ?>
    </div>
    </div>
</div>

<div style="clear-both">
</div>

    <div class="site-info">
        <?php do_action( 'theme_credits' ); ?>
        <a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'theme' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'theme' ), 'WordPress' ); ?></a>
        <span class="sep"> | </span>
        <?php printf( __( 'Theme: Elements by %2$s.', 'theme' ), 'Theme', '<a href="https://twitter.com/MJMarcell" rel="designer">Mylon Marcell</a>' ); ?>
    </div><!-- .site-info -->
</footer><!-- #colophon .site-footer -->
</div><!-- #page .hfeed .site -->
 
<?php wp_footer(); ?>
 
</body>
</html>