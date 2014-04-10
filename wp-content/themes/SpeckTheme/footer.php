<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package SpeckTheme
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="blog-footer" role="contentinfo">
		<div class="blog-footer-bottom">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
        <div id="logo-bottom">
            <img src='<?php bloginfo('template_url'); ?>/img/sp_logo_black_notag.png' height="125px" width="500px">
        </div>
	</a>
        <div id="blog-foot-nav">
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
    <div class="blog-wp-bot">
	<span>Proudly Powered by WordPress and created by Mylon Marcell</span>
    </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>