<?php
/*
 * Header Template 9
 */
	
	$header_options = aven_zozo_header_options();
	
	//header options
	$header_toggle_type = $header_options['header_toggle_type'];
	$header_toggle_position = $header_options['header_toggle_position'];

	$header_output = '';

	$header_output .= '<div id="header-main" class="header-main-section navbar">';
	$header_output .= '<div class="container">';
	$header_output .= aven_zozo_logo( 'logo-left', 'logo' );
	$header_output .= '<div class="zozo-header-main-bar">';
	$header_output .= '<ul class="nav navbar-nav navbar-right zozo-main-bar">';
	if( isset( $header_toggle_type ) && $header_toggle_type == 'toggle' ) {
		$header_output .= '<li class="header-side-wrapper"><a id="nav-side-menu" class="menu-bars-link" href="#"><span></span></a></li>';
	} else if( isset( $header_toggle_type ) && $header_toggle_type == 'overlay' ) {
		$header_output .= '<li class="header-side-wrapper header-overlay-link"><a id="nav-side-menu" class="menu-bars-link" href="#"><span></span></a></li>';
	}
	$header_output .= '</ul>';
	$header_output .= '</div>';
	$header_output .= '</div><!-- .container -->';
	$header_output .= '</div><!-- .header-main-section -->';
	
	if( isset( $header_toggle_type ) && $header_toggle_type == 'toggle' ) {
		$header_output .= '<div id="header-toggle" class="header-toggle-section header-position-'. esc_attr( $header_toggle_position ) .'">';
		$header_output .= '<div class="header-toggle-inner">';
		$header_output .= '<a id="nav-close-menu" href="#" class="close-menu flaticon-shapes"></a>';
	} else if( isset( $header_toggle_type ) && $header_toggle_type == 'overlay' ) {
		$header_output .= '<div id="header-overlay-menu" class="header-overlay-menu-wrapper">';
		$header_output .= '<a id="nav-close-menu" href="#" class="close-menu flaticon-shapes"></a>';
		$header_output .= '<div class="header-overlay-menu-inner">';
	}
	$header_output .= '<div id="header-side-main" class="header-side-main-section clearfix">';
	$header_output .= '<div class="zozo-header-side-main-bar">';
	$header_output .= aven_zozo_header_elements_wrapper( 'main-bar', '', 'header-9' );
	$header_output .= '</div>';
	$header_output .= '</div>';
	$header_output .= '</div>';
	$header_output .= '</div>';
	
	echo ''. $header_output;
?>
		