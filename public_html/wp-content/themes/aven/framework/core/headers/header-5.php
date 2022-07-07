<?php
/*
 * Header Template 5
 */

	echo '<div id="header-logo-bar" class="header-logo-section navbar">'.
		 '<div class="container">'.
		 aven_zozo_logo( 'logo-center', 'logo' ).
		 '</div><!-- .container -->'.
		 '</div><!-- .header-logo-section -->'.
		
		 '<div id="header-main" class="header-main-section navbar">'.
		 '<div class="container">'.
		 '<div class="zozo-header-main-bar">'.
		 '<ul class="nav navbar-nav navbar-left zozo-main-bar">'.
		 '<li>'. aven_zozo_header_elements_wrapper( 'main-bar', 'left', 'header-5' ) .'</li>'.
		 '</ul>'.
		 '<ul class="nav navbar-nav navbar-right zozo-main-bar">'.
		 '<li>'. aven_zozo_header_elements_wrapper( 'main-bar', 'right', 'header-5' ) .'</li>'.
		 '</ul>'.
		 aven_zozo_header_elements_wrapper( 'main-bar', '', 'header-5', '', 'yes', 'toggle' ).
		 '</div>'.
		 '</div><!-- .container -->'.
		 '</div><!-- .header-main-section -->'.
		 aven_zozo_header_elements_wrapper( 'main-bar', '', 'header-5', '', 'yes', 'fullscreen' );

?>
		