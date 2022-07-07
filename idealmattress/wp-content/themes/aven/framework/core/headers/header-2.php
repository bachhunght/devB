<?php
/*
 * Header Template 2
 */
 
	echo '<div id="header-main" class="header-main-section navbar">'.
		 '<div class="container">'.
		 aven_zozo_logo( 'navbar-right', 'logo' ).
		 '<div class="zozo-header-main-bar">'.
		 '<ul class="nav navbar-nav navbar-left zozo-main-bar">'.
		 '<li>'. aven_zozo_header_elements_wrapper( 'main-bar', '', 'header-2' ) .'</li>'.
		 '</ul>'.
		 aven_zozo_header_elements_wrapper( 'main-bar', '', 'header-2', '', 'yes', 'toggle' ).
		 '</div>'.
		 '</div><!-- .container -->'.
		 '</div><!-- .header-main-section -->'.
		 aven_zozo_header_elements_wrapper( 'main-bar', '', 'header-2', '', 'yes', 'fullscreen' );

?>
		