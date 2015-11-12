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

				<?php
				/* Start the Loop */

					if ( $pods ) {
						$my_pods_user = pods( 'user', $member->ID );

						echo '<div class="lrhoa_member_data">';
						echo $member->data->display_name . '<br>';
						echo $my_pods_user->field('street_number') . ' Los Robles<br>';
						echo $my_pods_user->field('phone_number') . '<br>';
						echo '<a href="mailto:">' . $member->data->user_email . '</a><br>';

						echo 'Emergency Contact: ' . $my_pods_user->field('emergency_contact_phone') . '<br>';
						echo '</div>';
					}
				?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
