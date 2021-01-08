<?php
/**
 * BuddyPress - Users Cover Image Header
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 * @version 3.0.0
 */

?>

<?php

/**
 * Fires before the display of a member's header.
 *
 * @since 1.2.0
 */
do_action( 'bp_before_member_header' ); ?>
	<div id="cover-image-container">
		<a href="#" id="menu-profile-open" data-toggle="menu-profile-dropdown"><i class="ion-gear-b"></i></a>
		<div class="dropdown-pane" id="menu-profile-dropdown" data-alignment="center" data-dropdown>
			<div class="item-list-tabs no-ajax" id="subnav" aria-label="<?php esc_attr_e( 'Member secondary navigation', 'buddypress' ); ?>" role="navigation">
				<ul class="dropdown-navigation">
					<?php // bp_get_options_nav(); ?>
				</ul>
			</div>
		</div>
		<div id="item-header-cover-image">
			<div id="item-header-avatar">
				<a href="<?php bp_displayed_user_link(); ?>">
					<figure class="image profile">
						<?php bp_displayed_user_avatar( array( 'type' => 'full', 'class' => 'profile') ); ?>
					</figure>
				</a>
			</div><!-- #item-header-avatar -->


		</div><!-- #item-header-cover-image -->
	</div><!-- #cover-image-container -->
<div id="item-header-content">

	<?php if ( bp_is_active( 'activity' ) && bp_activity_do_mentions() ) : ?>
		<h2 class="user-nicename">@<?php bp_displayed_user_mentionname(); ?></h2>
	<?php endif; ?>

	<div id="item-buttons"><?php

		/**
		 * Fires in the member header actions section.
		 *
		 * @since 1.2.6
		 */
		do_action( 'bp_member_header_actions' ); ?></div><!-- #item-buttons -->

	<?php

	/**
	 * Fires before the display of the member's header meta.
	 *
	 * @since 1.2.0
	 */
	do_action( 'bp_before_member_header_meta' ); ?>

</div><!-- #item-header-content -->
<?php

/**
 * Fires after the display of a member's header.
 *
 * @since 1.2.0
 */
do_action( 'bp_after_member_header' ); ?>

<div id="template-notices" role="alert" aria-atomic="true">
	<?php

	/** This action is documented in bp-templates/bp-legacy/buddypress/activity/index.php */
	do_action( 'template_notices' ); ?>

</div>
