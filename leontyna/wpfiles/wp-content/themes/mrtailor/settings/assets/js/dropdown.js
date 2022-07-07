( function( $ ) {
    'use strict';

    $( document ).ready( function( $ ) {

        $( '.customize-control-dropdown' ).closest( 'li[id*="_dropdown"]' ).toggleClass( 'collapsed' );
        $( '.customize-control-dropdown' ).closest( 'li[id*="_dropdown"]' ).nextUntil( 'li[id*="_dropdown"]' ).addClass( 'dropdown-item' );
        $( '.customize-control-dropdown' ).closest( 'li[id*="_dropdown"]' ).nextUntil( 'li[id*="_dropdown"]' ).toggleClass( 'hidden-control' );

        $( '.customize-control-dropdown' ).on('click',  function() {
            $(this).closest( 'li[id*="_dropdown"]' ).toggleClass( 'collapsed' );
            $(this).closest( 'li[id*="_dropdown"]' ).nextUntil( 'li[id*="_dropdown"]' ).toggleClass( 'hidden-control' );
        } );
    });
    
}( jQuery ) );