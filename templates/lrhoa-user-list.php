<?php
/*
Template Name: Users List
*/


get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
			<article>
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Member Directory', 'twentysixteen' ); ?></h1>
				</header>
				<div class="entry-content">
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
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
