<?php
/**
 * **************************************
 * Main.php
 *
 * The main template file, that loads the header, footer and sidebar
 * apart from loading the appropriate rtMedia template
 * ***************************************
 *
 * @package rtMedia
 */
 
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// By default it is not an ajax request.
global $rt_ajax_request;
$rt_ajax_request = false;

// Todo sanitize and fix $_SERVER variable usage.
// Check if it is an ajax request.
$_rt_ajax_request = rtm_get_server_var( 'HTTP_X_REQUESTED_WITH', 'FILTER_SANITIZE_STRING' );
if ( 'xmlhttprequest' === strtolower( $_rt_ajax_request ) ) {
	$rt_ajax_request = true;
}

// Get currently active template (Nouveau / Legacy).
$bp_template = get_option( '_bp_theme_package_id' );

$class = '';
// Getting extran classes for #buddypress when Nouveau is active.
if ( 'nouveau' === $bp_template && ! $rt_ajax_request && function_exists( 'bp_nouveau_get_container_classes' ) ) {
	$class = bp_nouveau_get_container_classes();
}
?>
<div id="buddypress" class="<?php echo esc_attr( $class ); ?>">
<?php
// if it's not an ajax request, load headers.
if ( ! $rt_ajax_request ) {
	// if this is a BuddyPress page, set template type to buddypress to load appropriate headers.
	if ( class_exists( 'BuddyPress' ) && ! bp_is_blog_page() && apply_filters( 'rtm_main_template_buddypress_enable', true ) ) {
		$template_type = 'buddypress';
	} else {
		$template_type = '';
	}

	// When Nouveau is active.
	if ( 'nouveau' === $bp_template ) {

		if ( 'buddypress' === $template_type ) {

			if ( bp_displayed_user_id() ) {
				?>
				<?php bp_nouveau_member_hook( 'before', 'home_content' ); ?>

				<div id="item-header" role="complementary" data-bp-item-id="<?php echo esc_attr( bp_displayed_user_id() ); ?>" data-bp-item-component="members" class="users-header single-headers">

					<?php bp_nouveau_member_header_template_part(); ?>

				</div><!-- #item-header -->

				<div class="bp-wrap">
					<?php if ( ! bp_nouveau_is_object_nav_in_sidebar() ) : ?>

						<?php bp_get_template_part( 'members/single/parts/item-nav' ); ?>

					<?php endif; ?>

					<div id="item-body" class="item-body">
					
						<?php if ( ! beehive_is_bp_profile_vartical_nav() ) : ?>
							<div class="row">
						<?php endif; ?>
						
							<?php if ( in_array( beehive()->layout->get(), array( 'social-collapsed', 'full' ), true ) && ! beehive_is_bp_profile_vartical_nav() ) : ?>
								<div class="col-lg-3 profile-col-aside left">
									<aside class="widget-area profile-widget-area displayed-profile-info">
										<?php do_action( 'beehive_before_displayed_profile_info' ); ?>
										<?php if ( bp_is_active( 'friends' ) || bp_is_active( 'groups' ) ) : ?>
										<div class="widget">
											<ul class="connections">
												<?php if ( bp_is_active( 'friends' ) ) : ?>
													<li><span class="count color-primary"><?php bp_total_friend_count( bp_get_member_user_id() ); ?></span><p><?php esc_html_e( 'Friends', 'beehive' ); ?></p></li>
												<?php endif; ?>
												<?php if ( bp_is_active( 'groups' ) ) : ?>
													<li><span class="count color-primary"><?php bp_total_group_count_for_user( bp_get_member_user_id() ); ?></span><p><?php esc_html_e( 'Groups', 'beehive' ); ?></p></li>
												<?php endif; ?>
											</ul>
										</div>
										<?php endif; ?>
										<?php do_action( 'beehive_after_displayed_profile_info' ); ?>
									</aside>
								</div>
							<?php endif; ?>
							
							<?php if ( ! beehive_is_bp_profile_vartical_nav() ) : ?>
								<?php
								if ( in_array( beehive()->layout->get(), array( 'social-collapsed', 'full' ), true ) ) {
									$beehive_profile_col_width = ( is_active_sidebar( beehive()->sidebars->get_sidebar_id( 'Member Profile Sidebar' ) ) ) ? 6 : 9;
								} else {
									$beehive_profile_col_width = 12;
								}
								?>
								<div class="col-lg-<?php echo esc_attr( $beehive_profile_col_width ); ?> profile-col-main">
							<?php endif; ?>

								<?php do_action( 'bp_before_member_body' ); ?>
								<?php do_action( 'bp_before_member_media' ); ?>
								<nav class="<?php bp_nouveau_single_item_subnav_classes(); ?>" id="subnav" role="navigation" aria-label="<?php esc_attr_e( 'rtMedia menu', 'buddypress-media' ); ?>">
									<ul class="subnav">

										<?php rtmedia_sub_nav(); ?>

										<?php do_action( 'rtmedia_sub_nav' ); ?>

									</ul>
								</nav><!-- .item-list-tabs#subnav -->

								<?php
								rtmedia_load_template();

								do_action( 'bp_after_member_media' );
								do_action( 'bp_after_member_body' );
								?>
							
							<?php if ( ! beehive_is_bp_profile_vartical_nav() ) : ?>
								</div>
							<?php endif; ?>
						
						<?php if ( in_array( beehive()->layout->get(), array( 'social-collapsed', 'full' ), true ) && ! beehive_is_bp_profile_vartical_nav() && is_active_sidebar( beehive()->sidebars->get_sidebar_id( 'Member Profile Sidebar' ) ) ) : ?>
							<div class="col-lg-3 profile-col-aside right">
								<aside id="member_profile_sidebar" class="widget-area profile-widget-area member-profile-sidebar">
									<?php dynamic_sidebar( beehive()->sidebars->get_sidebar_id( 'Member Profile Sidebar' ) ); ?>
								</aside>
							</div>
						<?php endif; ?>
						
						<?php if ( ! beehive_is_bp_profile_vartical_nav() ) : ?>
							</div>
						<?php endif; ?>
									
					</div><!--#item-body-->
					
				</div><!-- // .bp-wrap -->

				<?php bp_nouveau_member_hook( 'after', 'home_content' ); ?>
				<?php
			} else if ( bp_is_group() ) {
				if ( bp_has_groups() ) {
					while ( bp_groups() ) :
						bp_the_group();
						?>
				
						<?php bp_nouveau_group_hook( 'before', 'home_content' ); ?>
				
						<div id="item-header" role="complementary" data-bp-item-id="<?php bp_group_id(); ?>" data-bp-item-component="groups" class="groups-header single-headers">
				
							<?php bp_nouveau_group_header_template_part(); ?>
				
						</div><!-- #item-header -->
				
						<div class="bp-wrap">
				
							<?php if ( ! bp_nouveau_is_object_nav_in_sidebar() ) : ?>
				
								<?php bp_get_template_part( 'groups/single/parts/item-nav' ); ?>
				
							<?php endif; ?>
				
							<div id="item-body" class="item-body">
							
								<?php if ( ! beehive_is_bp_profile_vartical_nav() ) : ?>
									<div class="row">
								<?php endif; ?>
								
								<?php if ( in_array( beehive()->layout->get(), array( 'social-collapsed', 'full' ), true ) && ! beehive_is_bp_profile_vartical_nav() ) : ?>
									<div class="col-lg-3 profile-col-aside left">
										<aside class="widget-area profile-widget-area displayed-profile-info">
											<?php do_action( 'beehive_before_displayed_group_info' ); ?>
											<div class="widget">
												<?php if ( ! bp_nouveau_groups_front_page_description() && bp_nouveau_group_has_meta( 'description' ) ) : ?>
													<div class="widget-block about">
														<h5 class="widget-title"><?php esc_html_e( 'About Group', 'beehive' ); ?></h5>
														<div class="about-group"><?php bp_group_description(); ?></div>
													</div>
												<?php endif; ?>
												<div class="widget-block group-members">
													<h5 class="widget-title"><?php esc_html_e( 'Newest Members', 'beehive' ); ?></h5>
													<?php
													if ( bp_group_has_members(
														array(
															'group_id' => bp_get_group_id(),
															'max' => 7,
															'exclude_admins_mods' => false,
														)
													) ) :
														?>
														<div class="newest-group-members">
															<ul>
																<?php
																while ( bp_group_members() ) :
																	bp_group_the_member();
																	?>

																<li><a href="<?php bp_group_member_domain(); ?>" title="<?php bp_group_member_name(); ?>" target="_blank"><?php bp_group_member_avatar( 'type=thumb&width=30&height=30' ); ?></a></li>
																<?php endwhile; ?>
															</ul>
														</div>
													<?php endif; ?>
												</div>
											</div>
											<?php do_action( 'beehive_after_displayed_group_info' ); ?>
										</aside>
									</div>
								<?php endif; ?>
							
								<?php if ( ! beehive_is_bp_profile_vartical_nav() ) : ?>
										<?php
										if ( in_array( beehive()->layout->get(), array( 'social-collapsed', 'full' ), true ) ) {
											$beehive_profile_col_width = ( is_active_sidebar( beehive()->sidebars->get_sidebar_id( 'Group Profile Sidebar' ) ) ) ? 6 : 9;
										} else {
											$beehive_profile_col_width = 12;
										}
										?>
									<div class="col-lg-<?php echo esc_attr( $beehive_profile_col_width ); ?> profile-col-main">
								<?php endif; ?>
								
								<?php if ( beehive_is_bp_profile_vartical_nav() && ( ! bp_nouveau_groups_front_page_description() && bp_nouveau_group_has_meta( 'description' ) ) ) : ?>
									<div class="desc-wrap group-desc">
										<div class="group-description">
											<?php bp_group_description(); ?>
										</div>
									</div>
								<?php endif; ?>
								
								<?php
								do_action( 'bp_before_group_body' );
								do_action( 'bp_before_group_media' );

								$bp_is_group_home = bp_is_group_home();
								if ( $bp_is_group_home && ! bp_current_user_can( 'groups_access_group' ) ) {
									/**
									 * Fires before the display of the group status message.
									 *
									 * @since 1.1.0
									 */
									do_action( 'bp_before_group_status_message' );
									?>

									<div id="message" class="info">
										<p><?php bp_group_status_message(); ?></p>
									</div>

									<?php

									/**
									 * Fires after the display of the group status message.
									 *
									 * @since 1.1.0
									 */
									do_action( 'bp_after_group_status_message' );
								} else {
									?>
									<nav class="<?php bp_nouveau_single_item_subnav_classes(); ?>" id="subnav" role="navigation" aria-label="<?php esc_attr_e( 'rtMedia menu', 'buddypress-media' ); ?>">
										<ul class="subnav">
											<?php rtmedia_sub_nav(); ?>
											<?php do_action( 'rtmedia_sub_nav' ); ?>
										</ul>
									</nav><!-- .item-list-tabs#subnav -->
									<?php

									rtmedia_load_template();
								}

								do_action( 'bp_after_group_media' );
								do_action( 'bp_after_group_body' );
								?>
									
								<?php if ( ! beehive_is_bp_profile_vartical_nav() ) : ?>
									</div>
								<?php endif; ?>
								
								<?php if ( in_array( beehive()->layout->get(), array( 'social-collapsed', 'full' ), true ) && ! beehive_is_bp_profile_vartical_nav() && is_active_sidebar( beehive()->sidebars->get_sidebar_id( 'Group Profile Sidebar' ) ) ) : ?>
									<div class="col-lg-3 profile-col-aside right">
										<aside id="member_profile_sidebar" class="widget-area profile-widget-area member-profile-sidebar">
											<?php dynamic_sidebar( beehive()->sidebars->get_sidebar_id( 'Group Profile Sidebar' ) ); ?>
										</aside>
									</div>
								<?php endif; ?>
								
								<?php if ( ! beehive_is_bp_profile_vartical_nav() ) : ?>
									</div>
								<?php endif; ?>

							</div><!-- // .item-body -->
				
						</div><!-- // .bp-wrap -->
				
						<?php bp_nouveau_group_hook( 'after', 'home_content' ); ?>
				
						<?php
					endwhile;
				}
			}
		} else { // if BuddyPress.
			echo '<div id="item-body">';

			rtmedia_load_template();

			if ( ! $rt_ajax_request ) {
				if ( 'buddypress' === $template_type ) {
					if ( function_exists( 'bp_is_group' ) && bp_is_group() ) {
						do_action( 'bp_after_group_media' );
						do_action( 'bp_after_group_body' );
					}
					if ( function_exists( 'bp_displayed_user_id' ) && bp_displayed_user_id() ) {
						do_action( 'bp_after_member_media' );
						do_action( 'bp_after_member_body' );
					}
				}
				echo '</div><!--#item-body-->';
				if ( 'buddypress' === $template_type ) {
					if ( function_exists( 'bp_is_group' ) && bp_is_group() ) {
						do_action( 'bp_after_group_home_content' );
					}
					if ( function_exists( 'bp_displayed_user_id' ) && bp_displayed_user_id() ) {
						do_action( 'bp_after_member_home_content' );
					}
				}
			}
		}
	}
	
} else { // If ajax/iframe request, just load images.
	rtmedia_load_template();
}
// close all markup.
?>
</div><!--#buddypress-->
<?php
