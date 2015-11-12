<?php
/*
Template Name: Users List
*/


get_header(); ?>

<div id="primary" class="content-area">
	<div id="content" role="main">
		<div class="entry-content">
			<article>
				<header class="entry-header">
					<h1 class="entry-title"><?php echo 'Member Directory'; ?></h1>
				</header>
				<div class="lrhoa_member_data">
					<ul>
						<?php
						$users = new WP_User_Query( array(
								'meta_key' => 'last_name',
								'orderby'  => 'meta_value',
								'fields'   => 'all_with_meta',
								'role'     => 'members',
						) );
						if ( ! empty( $users->results ) ) {
							foreach ( $users->results as $user ) {
								echo '<li><a href="' . esc_url( get_author_posts_url( $user->ID ) ) . '">' . esc_attr( $user->first_name ) . ' ' . esc_attr( $user->last_name ) . '</a></li>';
							}
						} else {
								echo 'No members found.';
						}
						?>
					</ul>
				</div>
			</article>
		</div>
	</div><!-- #content -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
