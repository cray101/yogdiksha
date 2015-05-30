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
<!--
		<div style="float:right;padding-right:10%" id="google_translate_element">
			<script type="text/javascript">
				function googleTranslateElementInit() {
					new google.translate.TranslateElement(
						{pageLanguage: 'en', includedLanguages: 'hi,sk,ru', 
						layout: google.translate.TranslateElement.InlineLayout.SIMPLE, 
						gaTrack: true, gaId: 'UA-37451495-1'}, 'google_translate_element');
					}
                       </script>
                       <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
                       </script>
		</div>
-->
<!-- google translate button-->

		<footer id="colophon" class="site-footer" role="contentinfo">
			<?php get_sidebar( 'main' ); ?>

                        <div style="position:relative;float:right;padding-right:15%;padding-top:10px">
                                <?php DISPLAY_ACURAX_ICONS(); ?>
                        </div>
                        <div class="site-info" style="position:relative;float:left;padding-left:10%">
				<?php do_action( 'twentythirteen_credits' ); ?>
				 &#169; 2015 <a href="http://yogdiksha.com" title="Yogdiksha"><?php printf( __( 'Yogdiksha.com' ), 'Yogdiksha' ); ?></a>
<p>Powered by <a href="http://wordpress.org" title=Wordpress>wordpress</a>, <a href= "http://aws.amazon.com" title="amazon s3">amazon aws</a> and <a title="cray">cray</a>
</p>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-37451495-1', 'yogdiksha.com');
  ga('send', 'pageview');

</script>

</body>
</html>
