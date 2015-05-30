<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

		</div><!-- #main -->
		<footer id="colophon" class="site-footer" role="contentinfo">
			<?php get_sidebar( 'main' ); ?>

                        <div style="position:relative;float:right;padding-right:15%;padding-top:10px">
                                <?php DISPLAY_ACURAX_ICONS(); ?>
                        </div>
                        <div class="site-info">
				<?php do_action( 'twentythirteen_credits' ); ?>
				 &#169; 2013 <a href="http://yogdiksha.com" title="Yogdiksha"><?php printf( __( 'Yogdiksha.com' ), 'Yogdiksha' ); ?></a>. <p>Powered by <a href="http://wordpress.org" title=Wordpress>Wordpress</a>, <a href= "http://aws.amazon.com" title="Amazon AWS">Amazon</a> and <a title="Chaitanya">cray101</a></p>
			</div><!-- .site-info -->

		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-37451495-1']);
  _gaq.push(['_setDomainName', 'yogdiksha.com']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
