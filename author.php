<?php
/**
 * The template file for authors/users
 */

get_header();
global $author_name;

$member = get_user_by( 'slug', $author_name );
if ( ! $member instanceof \WP_User ) {
	return;
}
$username         = $member->get( 'user_login' );
$street_number    = explode( '-', $username );
$street_number    = array_shift( $street_number );
$street_number    = preg_replace( '/[a-z]/', '', $street_number );
$empty_phone      = '(xxx) xxx-xxxx';
$phone_number     = ! empty( $member->get( 'lrhoa_phone_number' ) ) ? $member->get( 'lrhoa_phone_number' ) : $empty_phone;
$emergency_number = ! empty( $member->get( 'lrhoa_emergency_number' ) ) ? $member->get( 'lrhoa_emergency_number' ) : $empty_phone;

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="entry-content">
				<article>
					<header class="entry-header">
						<h1 class="entry-title"><?php echo 'Member Contact Information'; ?></h1>
					</header>
					<div class="lrhoa_member_data">
						<?php
						if ( is_user_logged_in() && current_user_can( 'members' ) ) {
							print esc_attr( $member->get( 'display_name' ) ) . '<br>';
							print esc_attr( $street_number ) . ' Los Robles<br>';
							print esc_attr( $phone_number ) . '<br>';
							print '<a href="mailto:">' . esc_attr( $member->get( 'user_email' ) ) . '</a><br>';

							print 'Emergency Contact: ' . esc_attr( $emergency_number ) . '<br>';
						} else {
							print 'You must log in to view this page.';
						}
						?>
					</div>
				</article>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
