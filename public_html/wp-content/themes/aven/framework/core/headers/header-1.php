<?php
/*
 * Header Template 1
 */
 
	echo '<div id="header-main" class="header-main-section navbar">'.
		 '<div class="container">'.
		 aven_zozo_logo( 'logo-left', 'logo' ).
		 '<div class="zozo-header-main-bar">'.
		 '<ul class="nav navbar-nav navbar-right zozo-main-bar">'.
		 '<li>'. aven_zozo_header_elements_wrapper( 'main-bar', '', 'header-1' ) .'</li>'.
		 '</ul>'.
		 aven_zozo_header_elements_wrapper( 'main-bar', '', 'header-1', '', 'yes', 'toggle' ).
		 '</div>'.
		 '</div><!-- .container -->'.
		 '</div><!-- .header-main-section -->'.
		 aven_zozo_header_elements_wrapper( 'main-bar', '', 'header-1', '', 'yes', 'fullscreen' );
	
?>
		