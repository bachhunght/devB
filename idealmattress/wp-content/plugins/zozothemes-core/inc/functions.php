<?php

//Theme Option
include_once( ZOZO_CORE_ADMIN . '/theme-options.php');

/**
 * Include Widgets
 */
add_filter('widget_text', 'do_shortcode');

//Get server details
function aven_get_server_details( $str ){
	return $_SERVER[$str];
}

/* =========================================================
 * Send Email via Ajax when contact form Submitted
 * ========================================================= */

add_action('wp_ajax_zozo_sendmail', 'aven_zozo_contact_send_mail');
add_action('wp_ajax_nopriv_zozo_sendmail', 'aven_zozo_contact_send_mail');

if( ! function_exists( "aven_zozo_contact_send_mail" ) ) {

	function aven_zozo_contact_send_mail() {
	
		$sendto = '';
	   	// Get Send to Email address from submitted form
		if( $_POST['send_to_email'] != '' ) {
			$sendto = trim($_POST['send_to_email']);
		}
		
		if( $sendto == '' ) {
			$sendto = get_bloginfo('admin_email');
		}
				
		// Get Name value from submitted form
		if( $_POST['contact_name'] != '' ) {
			$name = trim($_POST['contact_name']);
		}
		
		// Get Email id from submitted form
		$email = trim($_POST['contact_email']);
		
		// Get Phone number from submitted form
		if( $_POST['contact_phone'] != '' ) {		
			$phone = trim($_POST['contact_phone']);
		}
		
		// Get Subject from submitted form
		if( $_POST['mail_subject'] != '' ) {
			$subject = trim($_POST['mail_subject']);
		} else {
			$subject = esc_html__('Contact Message From ', 'aven') . $name;
		}
		
		if( $_POST['mail_from_name'] != '' ) {
			$from_name = trim($_POST['mail_from_name']);
		} else {
			$from_name = $name;
		}
		
		if( $_POST['mail_from_email'] != '' ) {
			$from_email = trim($_POST['mail_from_email']);
		} else {
			$from_email = $email;
		}
		
		// Get Message from submitted form
		$message = trim($_POST['contact_message']);
		
		$name_label_opt = aven_zozo_get_theme_option( 'zozo_labels_name' );
		$email_label_opt = aven_zozo_get_theme_option( 'zozo_labels_email' );
		$subject_label_opt = aven_zozo_get_theme_option( 'zozo_labels_subject' );
		$phone_label_opt = aven_zozo_get_theme_option( 'zozo_labels_phone' );
		$message_label_opt = aven_zozo_get_theme_option( 'zozo_labels_message' );
		
		$name_label = $name_label_opt ? $name_label_opt : esc_html__('Name', 'aven');
		$email_label = $email_label_opt ? $email_label_opt : esc_html__('Email', 'aven');
		$subject_label = $subject_label_opt ? $subject_label_opt : esc_html__('Subject', 'aven');
		$phone_label = $phone_label_opt ? $phone_label_opt : esc_html__('Phone Number', 'aven');
		$message_label = $message_label_opt ? $message_label_opt : esc_html__('Message', 'aven');	
		
		$success_msg = aven_zozo_get_theme_option( 'zozo_contact_form_success' );
		$error_msg = aven_zozo_get_theme_option( 'zozo_contact_form_error' );
		
		$success_msg = str_replace( "{name}", $name, $success_msg );
		$error_msg = str_replace( "{name}", $name, $error_msg );
				
		$body = "<p>$name_label: $name</p>";
		$body .= "<p>$email_label: $email</p>";
		$body .= "<p>$phone_label: $phone</p>";
		$body .= "<p>$subject_label: $subject</p>";
		$body .= "<p>$message_label: $message</p>";
		
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		
		$headers .= 'From: ' . esc_attr( $from_name ) . ' <' . esc_attr( $from_email ) . '>' . "\r\n";
		$headers .= 'Reply-To: ' . esc_attr( $name ) . ' <' . esc_attr( $email ) . '>' . "\r\n";

		if( wp_mail($sendto, $subject, $body, $headers) ) {
			$msg_array = array( 'status' => 'true', 'data' => $success_msg );
			echo json_encode($msg_array);
		} else {
			$msg_array = array( 'status' => 'false', 'data' => $error_msg );
			echo json_encode($msg_array);
		}
		die();
	}
	
}


/* =============================================================
 *	HTML Allowed Tags for wp_kses
 * ============================================================= */
if( ! function_exists('aven_zozo_expanded_allowed_tags') ) {
	function aven_zozo_expanded_allowed_tags() {
		$allowed_tags = wp_kses_allowed_html( 'post' );
		
		// iframe
		$allowed_tags['iframe'] = array(
			'src' 					=> array(),
			'id' 					=> array(),
			'height' 				=> array(),
			'width' 				=> array(),
			'frameborder' 			=> array(),
			'allowFullScreen' 		=> array(),
			'webkitAllowFullScreen' => array(),
			'mozallowfullscreen' 	=> array(),
		);
		
		// style
		$allowed_tags['style'] = array(
			'type' => array(),
		);
		
		// link
		$allowed_tags['link'] = array(
			'type'  => array(),
			'href'  => array(),
			'rel'   => array(),
			'sizes' => array(),
		);
		
		// meta
		$allowed_tags['meta'] = array(
			'name'  	=> array(),
			'content'   => array(),			
		);
		
		// select
		$allowed_tags['select'] = array(
			'name'  	=> array(),
			'multiple'  => array(),
			'required'  => array(),
			'class' 	=> array(),	
			'size' 		=> array(),
		);
		
		// option
		$allowed_tags['option'] = array(
			'id'  		=> array(),
			'value'  	=> array(),
			'label'  	=> array(),
			'selected'  => array(),			
		);
		
		// input
		$allowed_tags['input'] = array(
			'type'  	=> array(),
			'id'  		=> array(),
			'class' 	=> array(),	
			'value' 	=> array(),
			'name'  	=> array(),
			'checked'   => array(),
			'readonly'  => array(),
		);
		 
		return $allowed_tags;
	}
}
