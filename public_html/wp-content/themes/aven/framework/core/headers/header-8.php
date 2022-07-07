<?php
/*
 * Header Template 8
 */

	echo '<div id="header-main" class="header-main-section navbar">'.
		 '<div class="container">'.
		 aven_zozo_logo( 'logo-center', 'logo' ).
		 '<div class="zozo-header-main-bar">'.
		 '<ul class="nav navbar-nav navbar-left zozo-main-bar">'.
		 '<li>'. aven_zozo_header_elements( 'primary-menu', 'main-bar', '' ) .'</li>'.
		 '</ul>'.
		 '<ul class="nav navbar-nav navbar-right zozo-main-bar">'.
		 '<li>'. aven_zozo_header_elements( 'primary-right-menu', 'main-bar', '' ) .'</li>'.
		 '<li>'. aven_zozo_header_elements_wrapper( 'main-bar', 'right', 'header-8' ) .'</li>'.
		 '</ul>'.
		 aven_zozo_header_elements_wrapper( 'main-bar', '', 'header-8', '', 'yes', 'toggle' ).
		 '</div>'.
		 '</div><!-- .container -->'.
		 '</div><!-- .header-main-section -->'.
		 aven_zozo_header_elements_wrapper( 'main-bar', '', 'header-8', '', 'yes', 'fullscreen' );
?>
		