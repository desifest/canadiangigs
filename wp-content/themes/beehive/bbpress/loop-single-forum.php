<?php

/**
 * Forums Loop - Single Forum
 *
 * @package bbPress
 * @subpackage Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<ul id="bbp-forum-<?php bbp_forum_id(); ?>" <?php bbp_forum_class(); ?>>

	<li class="bbp-forum-info">

		<span class="bbp-title-icon forum-icon color-primary h4"><i class="uil-comments"></i></span>

		<?php if ( bbp_is_user_home() && bbp_is_subscriptions() ) : ?>

			<span class="bbp-row-actions">

				<?php do_action( 'bbp_theme_before_forum_subscription_action' ); ?>

				<?php
				bbp_forum_subscription_link(
					array(
						'before'      => '',
						'subscribe'   => '<i class="uil-comment-plus"></i>',
						'unsubscribe' => '<i class="uil-minus-circle"></i>',
					)
				);
				?>

				<?php do_action( 'bbp_theme_after_forum_subscription_action' ); ?>

			</span>

		<?php endif; ?>

		<?php do_action( 'bbp_theme_before_forum_title' ); ?>

		<h4 class="forum-title"><a class="bbp-forum-title" href="<?php bbp_forum_permalink(); ?>"><?php bbp_forum_title(); ?></a></h4>

		<?php do_action( 'bbp_theme_after_forum_title' ); ?>

		<?php do_action( 'bbp_theme_before_forum_description' ); ?>

		<div class="bbp-forum-content"><?php bbp_forum_content(); ?></div>

		<?php do_action( 'bbp_theme_after_forum_description' ); ?>

		<?php do_action( 'bbp_theme_before_forum_sub_forums' ); ?>

		<?php bbp_list_forums(); ?>

		<?php do_action( 'bbp_theme_after_forum_sub_forums' ); ?>

		<?php bbp_forum_row_actions(); ?>

	</li>

	<li class="bbp-forum-topic-count bbp-topic-color"><?php bbp_forum_topic_count(); ?></li>

	<li class="bbp-forum-reply-count bbp-post-color"><?php bbp_show_lead_topic() ? bbp_forum_reply_count() : bbp_forum_post_count(); ?></li>

	<li class="bbp-forum-freshness">

		<?php do_action( 'bbp_theme_before_forum_freshness_link' ); ?>

		<span class="mute"><?php bbp_forum_freshness_link(); ?></span>

		<?php do_action( 'bbp_theme_after_forum_freshness_link' ); ?>

		<p class="bbp-topic-meta">

			<?php do_action( 'bbp_theme_before_topic_author' ); ?>

			<span class="bbp-topic-freshness-author">
			<?php
			bbp_author_link(
				array(
					'post_id' => bbp_get_forum_last_active_id(),
					'size'    => 14,
				)
			);
			?>
			</span>

			<?php do_action( 'bbp_theme_after_topic_author' ); ?>

		</p>
	</li>

</ul><!-- #bbp-forum-<?php bbp_forum_id(); ?> -->
