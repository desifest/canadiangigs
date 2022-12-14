<?php
/**
 * Notice when job has been submitted.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/job-submitted.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     wp-job-manager
 * @category    Template
 * @version     1.34.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $wp_post_types;

switch ( $job->post_status ) :
	case 'publish':
		// translators: view listing link.
		echo '<div class="job-manager-message">' . wp_kses_post( sprintf( __( '%1$s listed successfully. To view your listing <a href="%2$s" class="color-primary">click here</a>.', 'wp-job-manager' ), esc_html( $wp_post_types['job_listing']->labels->singular_name ), esc_url( get_permalink( $job->ID ) ) ) ) . '</div>';
		break;
	case 'pending':
		// translators: submitted job name.
		echo '<div class="job-manager-message">' . wp_kses_post( sprintf( esc_html__( '%s submitted successfully. Your listing will be visible once approved.', 'wp-job-manager' ), esc_html( $wp_post_types['job_listing']->labels->singular_name ) ) ) . '</div>';
		break;
	default:
		do_action( 'job_manager_job_submitted_content_' . str_replace( '-', '_', sanitize_title( $job->post_status ) ), $job ); // @codingStandardsIgnoreLine
		break;
endswitch;

do_action( 'job_manager_job_submitted_content_after', sanitize_title( $job->post_status ), $job );
