<?php
/**
 * The template file for authors/users
 */

get_header();

$pods = pods( 'user', get_query_var( 'post_type_author' ), true );
$member = get_user_by( 'slug', $author_name );

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="entry-content">
				<article>
					<header class="entry-header">
						<h1 class="entry-title"><?php echo 'Member Contact Information'; ?></h1>
					</header>
					<div class="lrhoa_member_data">
						<?php  if ( $pods && is_user_logged_in() && current_user_can( 'members' ) ) {
						$my_pods_user = pods( 'user', $member->ID );

						print( esc_attr( $member->data->display_name ) . '<br>' );
						print( esc_attr( $my_pods_user->field('street_number') ) . ' Los Robles<br>' );
						print( esc_attr( $my_pods_user->field('phone_number') ). '<br>' );
						print( '<a href="mailto:">' . esc_attr( $member->data->user_email ) . '</a><br>' );

						print( 'Emergency Contact: ' . esc_attr( $my_pods_user->field('emergency_contact_phone') ) . '<br>' );
						} else {
							print( 'You must log in to view this page.' );
						}
						?>
					</div>
				</article>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
