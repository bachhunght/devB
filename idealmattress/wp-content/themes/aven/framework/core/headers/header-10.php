<?php
/*
 * Header Template 10
 */
	
	$header_options = aven_zozo_header_options();
	
	//header options
	$header_top_bar = $header_options['header_top_bar'];
	$header_vertical_position = $header_options['header_vertical_position'];

	$header_output = '';

	$header_output .= '<div id="header-side-nav" class="header-sidenav-section header-position-'. esc_attr( $header_vertical_position ) .'">';
	$header_output .= '<div class="header-side-wrapper">';
	if( isset($header_top_bar) && $header_top_bar == 'yes' ) {
		$topbar_left_output = $topbar_right_output = '';
		$topbar_left_output = aven_zozo_header_elements_wrapper( 'top-bar', 'left' );
		$topbar_right_output = aven_zozo_header_elements_wrapper( 'top-bar', 'right' );
		
		$header_output .= '<div id="header-side-top-bar" class="header-top-section header-side-top-section">';
		$header_output .= '<div class="container">';
		$header_output .= '<div class="row">';
			if( isset( $topbar_left_output ) && $topbar_left_output != '' ) {
				$header_output .= '<div class="col-sm-6 zozo-top-left">'. $topbar_left_output .'</div>';
			}
			if( isset( $topbar_right_output ) && $topbar_right_output != '' ) {
				$header_output .= '<div class="col-sm-6 zozo-top-right">'. $topbar_right_output .'</div>';
			}
		$header_output .= '</div>';
		$header_output .= '</div>';
		$header_output .= '</div>';
	}
				
	$header_output .= '<div id="header-side-main" class="header-main-section navbar">';
	$header_output .= '<div class="container">';
	$header_output .= aven_zozo_logo( 'logo-center', 'logo' );
	$header_output .= '<div class="zozo-header-main-bar">';
	$header_output .= '<ul class="nav navbar-nav zozo-main-bar zozo-vertical-side-bar">';
	$header_output .= '<li>'. aven_zozo_header_elements_wrapper( 'main-bar', '', 'header-10' ) .'</li>';
	$header_output .= '</ul>';
	$header_output .= '</div>';
	$header_output .= '</div><!-- .container -->';
	$header_output .= '</div><!-- .header-main-section -->';
	$header_output .= '</div>';
	$header_output .= '</div><!-- .header-sidenav-section -->';
	
	echo ''. $header_output;
?>
		