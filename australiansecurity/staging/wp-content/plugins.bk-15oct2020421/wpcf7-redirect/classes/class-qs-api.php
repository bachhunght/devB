<?php
/**
 * Class Qs_Api
 * A class used for contacting Query Solutions API
 */

defined( 'ABSPATH' ) || exit;

class Qs_Api {

	public function __construct() {
		$this->activation_url = WPCF7_PRO_REDIRECT_PLUGIN_ACTIVATION_URL;
		$this->api_url        = WPCF7_PRO_REDIRECT_PLUGIN_UPDATES;
		$this->store_id       = WPCF7_PRO_REDIRECT_PLUGIN_ID;
		$this->sku            = WPCF7_PRO_REDIRECT_PLUGIN_SKU;
	}

	public function extension_has_update( $extension ) {
		$current_ver = $extension->get_extension_ver();
		$params      = array(
			'action'        => 'license_key_validate',
			'store_code'    => $this->store_id,
			'license_key'   => $extension->get_serial(),
			'domain'        => $this->get_current_domain(),
			'sku'           => $extension->get_name(),
			'activation_id' => $extension->get_activation_id(),
		);
		$results     = $this->api_call( $this->activation_url, $params );
		if ( ! is_wp_error( $results ) && isset( $results->data->version ) ) {
			return floatval( $results->data->version ) > floatval( $current_ver );
		}
	}

	/**
	 * Make the API call
	 */
	public function api_call( $url, $params ) {
		$args = array(
			'timeout'     => 100,
			'redirection' => 5,
			'httpversion' => '1.0',
			'blocking'    => true,
			'headers'     => array(),
			'cookies'     => array(),
			'body'        => $params,
			'compress'    => false,
			'decompress'  => true,
			'sslverify'   => true,
			'stream'      => false,
			'filename'    => null,
		);

		$results = wp_remote_post( $url, $args );

		if ( ! is_wp_error( $results ) ) {
			$body    = wp_remote_retrieve_body( $results );
			$results = json_decode( $body );

			if ( ! isset( $results->error ) ) {
				return new WP_Error( $params['action'], 'Unknow error' );
			}

			if ( $results->error ) {
				return new WP_Error( $params['action'], $results->errors );
			}

			if ( isset( $results->data ) ) {
				$results->data->downloadable = '';
			}
		}

		return $results;
	}

	/**
	 * Get the domain where the plugin is intalled for authentication
	 */
	public function get_current_domain() {
		return isset( $_SERVER['HTTP_HOST'] ) ? $_SERVER['HTTP_HOST'] : '';
	}

	/**
	 * Check if the serial is valid
	 *
	 * @param $activation_id
	 * @param $serial
	 * @param $sku
	 */
	public function validate_serial( $activation_id, $serial, $sku = '' ) {
		$params = array(
			'action'        => 'license_key_validate',
			'store_code'    => $this->store_id,
			'license_key'   => $serial,
			'domain'        => $this->get_current_domain(),
			'sku'           => $sku ? $sku : $this->sku,
			'activation_id' => $activation_id,
		);

		$results = $this->api_call( $this->activation_url, $params );

		return  $results;
	}

	/**
	 * Deactivate the specific activation serial
	 *
	 * @param $activation_id
	 * @param $serial
	 * @param string $sku
	 */
	public function deactivate_liscense( $activation_id, $serial, $sku = '' ) {
		$params = array(
			'action'        => 'license_key_deactivate',
			'store_code'    => $this->store_id,
			'license_key'   => $serial,
			'domain'        => $this->get_current_domain(),
			'sku'           => $sku ? $sku : $this->sku,
			'activation_id' => $activation_id,
		);

		$results = $this->api_call( $this->activation_url, $params );

		return $results;
	}

	public function get_extension_file( $activation_data, $sku ) {
		$params = array(
			'action'        => 'get_extension_file',
			'store_code'    => $this->store_id,
			'license_key'   => $activation_data->the_key,
			'domain'        => $this->get_current_domain(),
			'sku'           => $sku ? $sku : $this->sku,
			'activation_id' => $activation_data->activation_id,
			'sub_action'    => 'download',
		);

		$url = add_query_arg( $params, $this->api_url );

		$args = array(
			'timeout'     => 100,
			'redirection' => 5,
			'httpversion' => '1.0',
			'blocking'    => true,
			'headers'     => array(),
			'cookies'     => array(),
			'body'        => $params,
			'compress'    => false,
			'decompress'  => true,
			'sslverify'   => true,
			'stream'      => false,
			'filename'    => null,
		);

		$results = wp_remote_post( $url, $args );

		if ( ! is_wp_error( $results ) && $results ) {

			$results = wp_remote_retrieve_body( $results );

			if ( ! is_wp_error( $results ) ) {
				$results = json_decode( $results );
				$results = download_url( $results->download_link, 1000 );
			}
		} elseif ( ! $results ) {
			$results = new WP_Error( 'get_extension_file', __( 'Cannot download the file', 'wpcf7-redirect' ) );
		}

		return $results;
	}

	/**
	 * Activate the serial
	 *
	 * @param $serial
	 * @param $sku
	 */
	public function activate_serial( $serial, $sku = '' ) {
		$params = array(
			'action'      => 'license_key_activate',
			'store_code'  => $this->store_id,
			'license_key' => $serial,
			'domain'      => $this->get_current_domain(),
			'sku'         => $sku ? $sku : $this->sku,
		);

		$results = $this->api_call( $this->activation_url, $params );

		return $results;
	}

	/**
	 * Check if the API returned a vlid response
	 *
	 * @param $results
	 * @return boolean
	 */
	public function is_valid_response( $results ) {
		if ( ! is_wp_error( $results ) ) {
			if ( is_object( $results ) ) {
				if ( isset( $results->error ) && ! $results->error ) {
					return true;
				}
			} else {
				if ( isset( $results['error'] ) && ! $results['error'] ) {
					return true;
				}
			}
		}
		return false;
	}
}
