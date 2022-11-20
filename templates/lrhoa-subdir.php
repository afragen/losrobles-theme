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

get_header();
global $post, $pagename;
?>

<div id="primary" class="content-area">
	<div id="content" role="main">
		<div class="entry-content">
			<article>
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<header class="entry-header">
						<h1 class="entry-title"><?php echo $post->post_title; ?></h1>
					</header>

					<?php get_template_part( 'content', 'page' ); ?>
				<?php endwhile; // end of the loop. ?>

				<?php $default_dir = '/lrhoa-docs/' . $pagename . '/'; ?>
				<div class="lrhoa_member_data">
					<?php
					if ( ( is_user_logged_in() && current_user_can( 'members' ) )
						|| 'public-documents' === $pagename ) :
						?>
						<?php include_once locate_template( './templates/list-files.php' ); ?>
					<?php else : ?>
						<p>You do not have permission to view this page.</p>
					<?php endif ?>
				</div>
			</article>
		</div>
	</div><!-- #content -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
