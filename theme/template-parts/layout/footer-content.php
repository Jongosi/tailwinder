<?php
/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TailWinder
 */

?>

<footer id="colophon" class="mt-20 text-center lg:text-left bg-gray-100 text-gray-600">
	<div class="flex justify-center items-center lg:justify-between p-6 border-b border-gray-300">
        <div class="flex justify-center">
			<?php if ( has_nav_menu( 'menu-2' ) ) : ?>
				<nav aria-label="<?php esc_attr_e( 'Footer Menu', 'tailwinder' ); ?>">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-2',
							'menu_class'     => 'footer-menu',
							'depth'          => 1,
						)
					);
					?>
				</nav>
			<?php endif; ?>
		</div>
    </div>
	<div class="mx-6 py-12 text-center md:text-left">
		<div class="grid grid-1 md:grid-cols-4 lg:grid-cols-4 gap-8">
			<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
				<aside id="sidebar-1" role="complementary" aria-label="<?php esc_attr_e( 'Footer 1', 'tailwinder' ); ?>">
					<?php dynamic_sidebar( 'sidebar-1' ); ?>
				</aside>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
				<aside id="sidebar-2" role="complementary" aria-label="<?php esc_attr_e( 'Footer 2', 'tailwinder' ); ?>">
					<?php dynamic_sidebar( 'sidebar-2' ); ?>
				</aside>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
				<aside id="sidebar-3" role="complementary" aria-label="<?php esc_attr_e( 'Footer 3', 'tailwinder' ); ?>">
					<?php dynamic_sidebar( 'sidebar-3' ); ?>
				</aside>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
				<aside id="sidebar-4" role="complementary" aria-label="<?php esc_attr_e( 'Footer 4', 'tailwinder' ); ?>">
					<?php dynamic_sidebar( 'sidebar-4' ); ?>
				</aside>
			<?php endif; ?>
		</div>
	</div>

	<div class="text-center p-6 bg-gray-200">
		&copy; <?php echo esc_html( date_i18n( __( 'Y', 'tailwinder' ) ) ); ?>
		<?php
		$tailwinder_blog_info = get_bloginfo( 'name' );
		if ( ! empty( $tailwinder_blog_info ) ) :
			?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><strong><?php bloginfo( 'name' ); ?></strong></a>,
			<?php
		endif;

		/* translators: 1: WordPress link, 2: WordPress. */
		// printf(
		// 	'<a href="%1$s">proudly built by %2$s</a>.',
		// 	esc_url( __( 'https://twincreations.co.uk/', 'tailwinder' ) ),
		// 	'TwinCreations'
		// );
		?><span>all rights reserved.</span>
	</div>

</footer><!-- #colophon -->
