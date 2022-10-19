<?php
/**
 * Single job listing.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/content-single-job_listing.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     wp-job-manager
 * @category    Template
 * @since       1.0.0
 * @version     1.28.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $post;
?>
<div class="single_job_listing">
	<?php if ( get_option( 'job_manager_hide_expired_content', 1 ) && 'expired' === $post->post_status ) : ?>
		<div class="job-manager-info"><?php esc_html_e( 'This listing has expired.', 'wp-job-manager' ); ?></div>
	<?php else : ?>
		<?php
			/**
			 * Hook
			 *
			 * @hooked job_listing_meta_display - 20
			 * @hooked job_listing_company_display - 30
			 */
			do_action( 'single_job_listing_start' );
		?>

		<?php the_company_video(); ?>

		<div class="job_description">
			<?php wpjm_the_job_description(); ?>
		</div>

		<?php if ( is_user_logged_in() && candidates_can_apply() ) {
            get_job_manager_template( 'job-application.php' );
		} else if (!is_user_logged_in() && candidates_can_apply() )
        {
            //login user

	wp_enqueue_script( 'wp-job-manager-job-application' );
	?>
    <div class="job_application application">
        <input type="button" class="application_button button" value="<?php esc_attr_e( 'Apply for job', 'wp-job-manager' ); ?>" />
        <div class="application_details">
            <?php esc_attr_e( 'To apply this job please', 'wp-job-manager' ); ?> <a href="#" class="login" data-toggle="modal" data-target="#login-modal"><?php esc_attr_e( 'Sing Up', 'wp-job-manager' ); ?></a>
        </div>
    </div>
    <?php
        }
		?>


		<?php
			/**
			 * Hook
			 */
			do_action( 'single_job_listing_end' );
		?>
	<?php endif; ?>
</div>
