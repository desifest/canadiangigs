<?php
/**
 * BuddyPress - Users Header
 *
 * @since 3.0.0
 * @version 7.0.0
 */
?>

<div class="no-cover">
	<div class="row">

		<div class="col-lg-3">
			<div id="item-header-avatar">
			<div class="item-avatar">
				<a href="<?php bp_displayed_user_link(); ?>">
					<?php bp_displayed_user_avatar( 'type=full' ); ?>
				</a>
				<?php if ( beehive()->options->get( 'key=change-avatar-icon' ) && bp_is_my_profile() ) : ?>
					<a href="<?php echo esc_url( bp_get_members_component_link( 'profile', 'change-avatar' ) . '#item-body' ); ?>" class="upload-profile-photo background-primary"><i class="uil-camera-plus"></i></a>
				<?php endif; ?>
			</div>
			</div><!-- #item-header-avatar -->
		</div>

		<div class="col-lg-9">
			<div id="item-header-content">

				<?php if ( bp_is_active( 'activity' ) && bp_activity_do_mentions() ) : ?>
					<h2 class="user-nicename">@<?php bp_displayed_user_mentionname(); ?></h2>
				<?php endif; ?>

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
</div>
