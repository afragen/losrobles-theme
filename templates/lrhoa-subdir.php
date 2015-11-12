<?php
/**
 * Template Name: Subdirectory List Template
 *
 * Description: Twenty Twelve loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

		<div id="primary">
			<div id="content" role="main">
				<article>

					<?php while ( have_posts() ) : the_post(); ?>
					<header class="entry-header">
						<h1 class="entry-title"><?php echo $post->post_title; ?></h1>
					</header>
					<div class="entry-content">

						<?php get_template_part( 'content', 'page' ); ?>
						<?php endwhile; // end of the loop. ?>

						<?php $default_dir = "/lrhoa-docs/" . $name . "/"; ?>

						<?php include_once( locate_template( './templates/list-files.php' ) ); ?>
				</article>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
