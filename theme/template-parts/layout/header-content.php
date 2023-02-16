<?php
/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TailWinder
 */

?>

<header id="masthead">
	<div id="site-logo">
		<?php
		$tailwinder_description = get_bloginfo( 'description', 'display' );

		if ( function_exists( 'the_custom_logo' ) ) {
			echo '<a href="'.esc_url( home_url( '/' ) ) .'" rel="home">';

			the_custom_logo();

			if ( $tailwinder_description || is_customize_preview() ) {
				echo '<span class="sr-only">' . $tailwinder_description . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			echo '</a>';
		} else {
			if ( is_front_page() ) {
				echo '<h1>';
				bloginfo( 'name' );
				echo '</h1>';
			} else {
				echo '<p><a href="';
				echo esc_url( home_url( '/' ) ) .'" rel="home">' . bloginfo( 'name' );
				echo '</a></p>';
			}

			if ( $tailwinder_description || is_customize_preview() ) {
				echo '<p class="sr-only">' . $tailwinder_description . '</p>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}
		?>
	</div><!-- #site-logo -->

	<nav id="site-navigation" class="" aria-label="<?php esc_attr_e( 'Main Navigation', 'tailwinder' ); ?>">
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
				'items_wrap'     => '<ul id="%1$s" class="hidden space-x-10 md:flex %2$s" aria-label="submenu">%3$s</ul>',
			)
		);
		?>
	</nav><!-- #site-navigation -->

	<div id="tertiary-navigation" class="">
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'menu-3',
				'menu_id'        => 'tertiary-menu',
				'items_wrap'     => '<ul id="%1$s" class="hidden space-x-10 md:flex justify-end %2$s" aria-label="submenu">%3$s</ul>',
			)
		);
		?>
		<button onclick="return openMobileMenu();" class="-my-2 -mr-2 md:hidden inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-lime-500" aria-controls="primary-menu" aria-expanded="false">
			<span class="sr-only"><?php esc_html_e( 'Primary Menu', 'tailwinder' ); ?></span>
			<svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
				<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
			</svg>
		</button>
	</div><!-- #tertiary-navigation -->
</header><!-- #masthead -->

<!-- mobile menu -->

<div class="absolute inset-x-0 top-0 origin-top-right transform transition md:hidden z-10 shadow-lg" id="mobile-menu">
	<div class="divide-y-2 divide-gray-50 bg-white p-2">
		<div class="px-5 pt-5 pb-6">
			<div class="flex items-center justify-between">
				<div>
					<?php
					if ( function_exists( 'the_custom_logo' ) ) {
						echo '<a href="'.esc_url( home_url( '/' ) ) .'" rel="home">';

						the_custom_logo();

						if ( $tailwinder_description || is_customize_preview() ) {
							echo '<span class="sr-only">' . $tailwinder_description . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						}

						echo '</a>';
					}
					?>
				</div>
				<div class="-mr-2">
					<button onclick="return closeMobileMenu();" class="inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-lime-500">
						<span class="sr-only">Close menu</span>
						<svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
							<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
						</svg>
					</button>
				</div>
			</div>
		</div>
		<div class="flow-root">
			<div class="-my-6 divide-y divide-gray-500/10">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu-mobile',
						'items_wrap'     => '<ul id="%1$s" class="space-y-2 py-6 %2$s" aria-label="submenu">%3$s</ul>',
					)
				);

				wp_nav_menu(
					array(
						'theme_location' => 'menu-3',
						'menu_id'        => 'tertiary-menu-mobile',
						'items_wrap'     => '<ul id="%1$s" class="%2$s" aria-label="submenu">%3$s</ul>',
					)
				);
				?>
			</div>
		</div>
	</div>
</div>
