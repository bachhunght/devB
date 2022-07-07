<?php
/*
 * Header Template 3
 */

	echo '<div id="header-main" class="header-main-section navbar">'.
		 '<div class="container">'.
		 aven_zozo_logo( 'logo-center', 'logo' ).
		 '<div class="zozo-header-main-bar">'.
		 '<ul class="nav navbar-nav zozo-main-bar">'.
		 '<li>'. aven_zozo_header_elements_wrapper( 'main-bar', '', 'header-3' ) .'</li>'.
		 '</ul>'.
		 aven_zozo_header_elements_wrapper( 'main-bar', '', 'header-3', '', 'yes', 'toggle' ).
		 '</div>'.
		 '</div><!-- .container -->'.
		 '</div><!-- .header-main-section -->'.
		 aven_zozo_header_elements_wrapper( 'main-bar', '', 'header-3', '', 'yes', 'fullscreen' );

?>
		