<?php

/*
	Filter gravityforms countries list to show them with country code
 */
add_filter(
	'gform_countries',
	function ( $countries ) {
		$new_countries = array();

		foreach ( $countries as $country ) {
			$code                   = GF_Fields::get( 'address' )->get_country_code( $country );
			$new_countries[ $code ] = $country;
		}

		return $new_countries;
	}
);
/**
 * Adding useful classes to body
 * - User logged in : logged-in / not-logged-in
 * - Child theme ID: cc-commoners (using domain)
 * - User is an accepted member
 */
add_filter(
	'body_class',
	function ( $classes ) {
		$classes[] = ( is_user_logged_in() ) ? 'logged-in' : 'not-logged-in';
		$classes[] = 'cc-commoners';
		$classes[] = ( bp_commoners::current_user_is_accepted() ) ? 'accepted-member' : '';
		return $classes;
	}
);
add_filter(
	'wpseo_breadcrumb_separator',
	function ( $sep ) {
		$sep = '<i class="icon chevron-right"></i>';
		return $sep;
	}
);

add_filter(
	'wpseo_breadcrumb_links',
	function ( $links ) {
		if ( is_page( 'members' ) ) {
			$links[1]['text'] = __( 'Members', 'cc-commoners' );
		}

		return $links;
	}
);
add_filter(
	'cc_color_palette_base_widgets',
	function( $colors ) {
		$ccgn_color_palette = array(
			'soft-tomato' => 'Soft Tomato',
			'soft-blue'   => 'Soft Blue',
		);
		return $ccgn_color_palette;
	}
);
/**
 * Add select with action to the main menu
 */

add_filter( 'wp_nav_menu_items', 'ccgn_add_select_with_options', 10, 2 );
function ccgn_add_select_with_options( $items, $args ) {
	if ( $args->theme_location == 'main-navigation' ) {
		if ( is_user_logged_in() ) {
			$current_user        = get_user_by( 'ID', get_current_user_id() );
			$member_or_applicant = ( bp_commoners::current_user_is_accepted() ) ? 'member' : 'applicant';
			$items              .= '<li class="navbar-item menu-item user-menu">';
			$items              .= '<div class="control has-icons-left">';
				$items          .= '<div class="select">';
					$items      .= '<select>';
						$items  .= '<option value="">' . $current_user->display_name . '</option>';
						$items  .= '<option value="' . bp_loggedin_user_domain() . 'profile/edit/">' . __( 'Edit profile', 'cc-commoners' ) . '</option>';
						$items  .= '<option value="' . bp_loggedin_user_domain() . 'profile/change-avatar/">' . __( 'Change avatar', 'cc-commoners' ) . '</option>';
						$items  .= '<option value="' . site_url( 'vouch' ) . '">' . __( 'Vouch requests', 'cc-commoners' ) . '</option>';
						$items  .= '<option value="' . site_url( 'user-status' ) . '">' . __( 'Status', 'cc-commoners' ) . '</option>';
			if ( ccgn_current_user_is_membership_council() ) {
				$items .= '<option value="' . admin_url( 'admin.php?page=global-network-application-approval' ) . '">' . __( 'Applications', 'cc-commoners' ) . '</option>';
			}
			$items         .= '<option value="' . wp_logout_url() . '">' . __( 'Log out', 'cc-commoners' ) . '</option>';
					$items .= '</select>';
				$items     .= '</div>';
				$items     .= '<div class="icon is-small is-left">';
				$items     .= '<span class="dashicons dashicons-admin-users"></span>';
			$items         .= '</div>';
				$items     .= '</div>';
			$items         .= '</li>';
		} else {
			$items .= '<a href="' . site_url( 'wp-login.php?redirect_to=' . get_permalink( get_the_ID() ) ) . '" class="login-button button is-success is-light">';
			$items .= '<span class="icon is-small"><span class="dashicons dashicons-admin-users"></span></span>';
			$items .= 'Log in';
			$items .= '</a>';
		}
	}
	return $items;
}
/*
	Disable admin bar except for administrators
 */

add_action( 'after_setup_theme', 'remove_admin_bar' );

function remove_admin_bar() {
	if ( ! current_user_can( 'administrator' ) && ! is_admin() ) {
		show_admin_bar( false );
	}
}
/**
 *  We add member metadata when and administrator is added to the website
 *  The administraror will be an approved individual member but won't be listed in the members section because isn't a subscriber
 */
function add_admin_member_metadata( $user_id ) {
	if ( ! current_user_can( 'edit_user', $user_id ) ) {
		return false;
	}
	if ( isset( $_POST['md_multiple_roles'] ) && ( in_array( 'administrator', $_POST['md_multiple_roles'] ) ) ) {
		ccgn_user_set_individual_applicant( $user_id );
		_ccgn_registration_user_set_stage( $user_id, 'accepted' );
	}
}
// Hooks for user (Update/add)
add_action( 'personal_options_update', 'add_admin_member_metadata' );
add_action( 'edit_user_profile_update', 'add_admin_member_metadata' );
add_action( 'user_register', 'add_admin_member_metadata' ); // When adding new users
