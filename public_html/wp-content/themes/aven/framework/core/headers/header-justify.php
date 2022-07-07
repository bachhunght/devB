<?php
/*
 * Header Template 13
 */

	echo '<div id="header-main" class="header-main-section navbar">'.
		 '<div class="container">'.
		 aven_zozo_logo( 'logo-left', 'logo' ).
		 '<div class="zozo-header-main-bar zozo-header-justify">'.
		 '<div class="zozo-header-position-center">'.
		 '<ul class="nav navbar-nav navbar-left zozo-main-bar">'.
		 '<li>'. aven_zozo_header_elements_wrapper( 'main-bar', 'left', 'header-justify' ) .'</li>'.
		 '</ul>'.
		 '<ul class="nav navbar-nav navbar-right zozo-main-bar">'.
		 '<li>'. aven_zozo_header_elements_wrapper( 'main-bar', 'right', 'header-justify' ) .'</li>'.
		 '</ul>'.
		 aven_zozo_header_elements_wrapper( 'main-bar', '', 'header-justify', '', 'yes', 'toggle' ).
		 '</div>'.
		 '</div>'.
		 '</div><!-- .container -->'.
		 '</div><!-- .header-main-section -->'.
		 aven_zozo_header_elements_wrapper( 'main-bar', '', 'header-justify', '', 'yes', 'fullscreen' );

?>
		