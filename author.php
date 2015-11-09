<?php
/**
 * The template file for authors/users
 */

get_header();

$pods = pods( 'user', get_query_var( 'post_type_author' ), true );
$user = get_user_by( 'slug', $author_name );

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<p>I really need to work on this.</p>

				<?php
				/* Start the Loop */
				//note: this loop will have no posts if author has no posts. If using 'pods_s_show_authors_without_posts' output is handled below.

					if ( $pods ) {

						//fetch current post in loop
						$pods = $pods->fetch( $user->ID );
						echo $user->data->display_name;
					}
				?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
