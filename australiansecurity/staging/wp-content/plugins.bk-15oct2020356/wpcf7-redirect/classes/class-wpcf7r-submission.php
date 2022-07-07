<?php
/**
 * Redirection for Contact Form 7 Submission handler
 */

defined( 'ABSPATH' ) || exit;

class WPCF7r_Submission {
	public function __construct() {

	}

	/**
	 * Change the response object returned to the client
	 */
	public function manipulate_cf7_response_object( $response ) {

		if ( isset( $this->response ) && $this->response ) {
			$response = array_merge( $this->response, $response );
		}

		return apply_filters( 'wpcf7r_manipulate_cf7_response_object', $response, $this );
	}

	/**
	 * Add plugin support to browsers that don't support ajax
	 */
	public function non_ajax_redirection( $wpcf7 ) {

		if ( ! WPCF7_Submission::is_restful() ) {

			$submission = WPCF7_Submission::get_instance();

			$wpcf7_form = get_cf7r_form( $wpcf7, $submission );

			if ( 'mail_sent' === $wpcf7_form->get_submission_status() ) {

				$results = $this->handle_valid_actions( $wpcf7 );

				if ( $results ) {
					foreach ( $results as $result_type => $result_actions ) {
						if ( 'FireScript' === $result_type && $result_action ) {
							$this->scripts = $result_actions;

							add_action( 'wp_head', array( $this, 'add_header_script' ) );
						}

						foreach ( $result_actions as $result_action ) {
							if ( 'Redirect' === $result_type ) {
								$this->redirect_url = $result_action['redirect_url'];

								if ( 'new_tab' === $result_action['type'] ) {
									add_action( 'wp_head', array( $this, 'open_new_tab' ) );
								} else {
									//do this last
									add_action( 'wp_head', array( $this, 'Redirect' ), 9999 );
								}
							}
						}
					}
				}
			}
		}
	}

	/**
	 * Print header scripts for non ajax submits
	 */
	public function add_header_script() {
		if ( isset( $this->scripts ) && $this->scripts ) {
			foreach ( $this->scripts as $script ) {
				wp_add_inline_script( 'wpcf7-redirect-script', $script );
			}
		}
	}

	/**
	 * Redirect support for non ajax browsers
	 */
	public function redirect() {
		//allow other plugins to manipulate the redirect url settings
		$redirect_url = apply_filters( 'wpcf7_redirect_url', $this->redirect_url );

		wp_add_inline_script( 'wpcf7-redirect-script', 'window.location ="' . $redirect_url . '";' );
	}

	/**
	 * Open new tab on non ajax submits
	 */
	public function open_new_tab() {
		//allow other plugins to manipulate the redirect url settings
		$redirect_url = apply_filters( 'wpcf7_redirect_url', $this->redirect_url );

		wp_add_inline_script( 'wpcf7-redirect-script', 'window.open("' . $redirect_url . '");' );
	}

	/**
	 * This function is fired before send email
	 */
	public function handle_valid_actions( $wpcf7 ) {

		$submission = WPCF7_Submission::get_instance();

		$wpcf7_form = get_cf7r_form( $wpcf7, $submission );

		if ( $submission && $wpcf7_form->has_actions() ) {
			//get the submitted data
			$this->posted_data = $submission->get_posted_data();

			//process all relevant actions
			$this->response = $wpcf7_form->process_actions();

			//skip default contact form 7 email
			if ( isset( $this->response['send_mail'] ) && $this->response['send_mail'] ) {
				add_filter(
					'wpcf7_skip_mail',
					function() {
						return true;
					}
				);
			}

			$this->save_lead_actions( $this->response );

			$wpcf7_form->maybe_perform_pre_result_action();

			return $this->response;
		}
	}

	/**
	 * Save lead actions
	 *
	 * @param  $actions_results
	 */
	public function save_lead_actions( $actions_results ) {
		foreach ( $actions_results as $action_type => $actions_result ) {
			WPCF7R_Leads_Manager::save_action( WPCF7R_Action::get_lead_id(), $action_type, $actions_result );
		}
	}

	/**
	 * Early hook to catch cf7 submissions before they are processed
	 */
	public function after_cf7_object_created( $cf7 ) {
		if ( WPCF7_Submission::is_restful() || isset( $_POST['_wpcf7'] ) ) {
			//get an instance of contact form 7 redirection post
			$wpcf7_form = get_cf7r_form( $cf7 );

			//check if the form has validation actions
			$actions = $wpcf7_form->get_active_actions();

			if ( $actions ) {
				foreach ( $actions as $action ) {
					$results = $action->process_pre_submit_actions();
					//saved reference for the items removed from the $_POST data
					if ( isset( $results['removed_params'] ) && $results['removed_params'] ) {
						$wpcf7_form->set_removed_posted_data( $results['removed_params'] );
					}
				}
			}
		}
	}

	/**
	 * Handle validation actions
	 *
	 * @param  $results
	 * @param  $tags
	 */
	public function handle_validation_actions( $wpcf_validation_obj, $tags ) {

		//store refrence to the form tags status
		$wpcf_validation_obj->tags = $tags;
		//get an instance of the form submission
		$submission = WPCF7_Submission::get_instance();

		if ( ! $submission ) {
			return $wpcf_validation_obj;
		}
		//get an instance of the contact form 7 form
		$cf7_form = $submission->get_contact_form();
		//get an instance of contact form 7 redirection post
		$wpcf7_form = get_cf7r_form( $cf7_form, $submission, $wpcf_validation_obj );
		//check if the form has validation actions

		if ( $submission && $wpcf7_form->has_actions() ) {
			//process all actions
			$invalid_tags = $wpcf7_form->process_validation_actions();
		}

		$new_validation_obj = new WPCF7_Validation();

		// Invalidate all invalid tags
		if ( isset( $invalid_tags ) && $invalid_tags ) {
			foreach ( reset( $invalid_tags ) as $custom_error_action_results ) {
				if ( isset( $custom_error_action_results['invalid_tags'] ) && $custom_error_action_results['invalid_tags'] ) {
					foreach ( $custom_error_action_results['invalid_tags'] as $wp_error ) {
						$error = $wp_error->get_error_message();

						$new_validation_obj->invalidate( $error['tag'], $error['error_message'] );
					}
				}

				//invalidate default tag errors
				foreach ( $tags as $tag ) {
					if ( ! $custom_error_action_results['ignored_tags'] || ! in_array( $tag->name, $custom_error_action_results['ignored_tags'], true ) ) {
						$result = apply_filters( "wpcf7_validate_{$tag->type}", $new_validation_obj, $tag );
					}
				}
			}
		}

		return $new_validation_obj;
	}
}
