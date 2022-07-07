<?php
/**
 * Sidebar to display recent post
 */
?>

<aside class="right-sidebar">
    <?php 
        if( is_registered_sidebar( 'sidebar' ) ) {
            dynamic_sidebar( 'sidebar' );
        }
    ?>