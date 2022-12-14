<?php
/**
 * BuddyPress - Users Cover Image Header
 *
 * @since 3.0.0
 * @version 7.0.0
 */
?>

<div id="cover-image-container">
	<div id="header-cover-image"></div>

	<div id="item-header-cover-image">
		<div class="row">

			<div class="col-lg-3">
				<div id="item-header-avatar">
					<div class="item-avatar">
						<a href="<?php bp_displayed_user_link(); ?>">
							<?php bp_displayed_user_avatar( 'type=full' ); ?>
						</a>
						<?php if ( beehive()->options->get( 'key=change-avatar-icon' ) && bp_is_my_profile() ) : ?>
							<a href="<?php echo esc_url( bp_get_members_component_link( 'profile', 'change-avatar' ) . '#item-body' ); ?>" class="upload-profile-photo background-primary" data-toggle="tooltip" data-placement="bottom" title="<?php esc_html_e( 'Change Profile Photo', 'buddypress' ); ?>"><i class="uil-camera-plus"></i></a>
						<?php endif; ?>
					</div>
					<h3 class="profile-name"><?php echo esc_html( bp_core_get_user_displayname( bp_displayed_user_id() ) ); ?></h3>
					<?php
						bp_member_type_list(
							bp_displayed_user_id(),
							array(
								'label'        => array(
									'plural'   => '',
									'singular' => '',
								),
								'list_element' => 'span',
							)
						);
						?>
				</div><!-- #item-header-avatar -->
			</div>

			<div class="col-lg-9">

				<div id="item-header-content">

					<?php if ( bp_is_active( 'activity' ) && bp_activity_do_mentions() ) : ?>
						<h2 class="user-nicename">@<?php bp_displayed_user_mentionname(); ?></h2>
					<?php endif; ?>

					<?php bp_nouveau_member_hook( 'before', 'header_meta' ); ?>

					<?php if ( bp_nouveau_member_has_meta() ) : ?>
						<div class="item-meta">

							<?php bp_nouveau_member_meta(); ?>

						</div><!-- #item-meta -->
					<?php endif; ?>

					<?php
					bp_nouveau_member_header_buttons(
						array(
							'container'         => 'ul',
							'button_element'    => 'button',
							'container_classes' => array( 'member-header-actions' ),
						)
					);
					?>

				</div><!-- #item-header-content -->
			</div>

		</div>
	</div><!-- #item-header-cover-image -->
</div><!-- #cover-image-container -->
