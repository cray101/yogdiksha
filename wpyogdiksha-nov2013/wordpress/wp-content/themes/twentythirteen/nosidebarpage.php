<?php
/*
Template Name: NoSidebar Page
*/
?>
<?php
/**
 * Template for displaying pages with no sidebar
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

 get_header(); ?>
 <?php /*get_header('main');*/ ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main" style="background: transparent url('http://localhost:8888/wpyogdiksha-nov2013/images/texture-02.png') repeat left top;background-attachment:fixed;">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<!-- header class="entry-header" -->
						<h1 class="entry-title"><?php /*the_title();*/ ?></h1>
					<!-- /header --><!-- .entry-header -->
					<!--div class="entry-content-centre"-->
					<div class="entry-content">
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
