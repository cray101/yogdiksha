<?php
/*
Template Name: No-sidebar page
*/
?>
<?php
/**
 * The template for displaying no-sidebar pages
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

 get_header('main'); ?>

	<div id="primary" class="content-area">
		<!--div id="content" class="site-content" role="main" style="background: transparent url(<?php header_image(); ?>) scroll no-repeat left top;"-->
		<!--div id="content" class="site-content" role="main" style="background: transparent url('wordpress/wp-content/uploads/2014/01/YD-mainpage-03.png' ) repeat left top;"-->
		<div id="content" class="site-content" role="main" style="background: transparent url('http://localhost:8888/wpyogdiksha-nov2013/images/stupa.jpg') no-repeat left top;background-attachment:fixed">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<!-- header class="entry-header" -->
						<h1 class="entry-title"><?php /*the_title();*/ ?></h1>
					<!-- /header --><!-- .entry-header -->
					<div class="entry-content-centre" style="background:rgba(255,255,255,0.6)">
						<?php the_content(); ?>
					</div><!-- .entry-content-centre -->

					<footer class="entry-meta">
						<?php /*edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' );*/ ?>
					</footer><!-- .entry-meta -->
				</article><!-- #post -->

				<!-- #?php comments_template(); ?-->
			<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php /*if(is_front_page()) : else : get_sidebar(); endif;*/ ?>
<?php /*get_sidebar();*/ ?>
<?php get_footer(); ?>
