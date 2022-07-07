<?php
/*
 * Header Template 4
 */


	echo '<div id="header-logo-bar" class="header-logo-section navbar">'.
		 '<div class="container">'.
		 aven_zozo_logo( 'logo-left', 'logo' ).
		 '<div class="zozo-header-logo-bar">'.
		 '<ul class="nav navbar-nav navbar-right zozo-logo-bar">'.
		 '<li>'. aven_zozo_header_elements_wrapper( 'logo-bar', '', 'header-4' ) .'</li>'.
		 '</ul>'.
		 '</div>'.
		 '</div><!-- .container -->'.
		 '</div><!-- .header-logo-section -->'.	
		 '<div id="header-main" class="header-main-section navbar">'.
		 '<div class="container">'.
		 '<div class="zozo-header-main-bar">'.
		 '<ul class="nav navbar-nav navbar-left zozo-main-bar">'.
		 '<li>'. aven_zozo_header_elements_wrapper( 'main-bar', 'left', 'header-4' ) .'</li>'.
		 '</ul>'.
		 '<ul class="nav navbar-nav navbar-right zozo-main-bar">'.
		 '<li>'. aven_zozo_header_elements_wrapper( 'main-bar', 'right', 'header-4' ) .'</li>'.
		 '</ul>'.
		 aven_zozo_header_elements_wrapper( 'main-bar', '', 'header-4', '', 'yes', 'toggle' ).
		 '</div>'.
		 '</div><!-- .container -->'.
		 '</div><!-- .header-main-section -->'.
		 aven_zozo_header_elements_wrapper( 'main-bar', '', 'header-4', '', 'yes', 'fullscreen' );

?>
		