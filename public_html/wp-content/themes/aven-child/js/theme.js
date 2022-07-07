( function( $ ){
		   
	var IDEAL = window.IDEAL || {};
	window.IDEAL = IDEAL;

    /**
     * Variations_Form expects a jQuery this.form object.
     */
    IDEAL.Variations_Form = function( form ) {
        this.form = form;       
        
        var self = this;
        var $body = $( 'body' );
        
        var on_select_value = function() {            

            var $li = $( this ).closest( 'div' );
			var $item = $( this ).closest( 'td.value' );

            // Already selected, quit early to prevent focus/change loop
            if ( $li.hasClass( 'selected' ) ) {
                return;
            }
			
			$item.find( 'div.selected' ).removeClass( 'selected' );
            
            $li.addClass( 'selected' );
        };

        var init_each = function() {
			self.form.find( '.variations input[type=radio]:checked' ).each( function() {
				$( this ).closest( 'div' ).addClass( 'selected' );
			});
        };
        
        var init = function() {
			
            $body.on( 'click', '.variations_form .variations input[type=radio]', on_select_value );

            IDEAL.forms_initialized = true;

        };

        init_each();

        if ( false === IDEAL.forms_initialized ) {
            init();
        }

    };
	
    IDEAL.GForm_Forms = function( gform ) {
        this.gform = gform;       
        
        var self = this;
        var $body = $( 'body' );
        
        var gform_on_select_value = function() {            

            var $li = $( this ).closest( 'li' );
			var $item = $( this ).closest( 'ul.gfield_radio' );

            // Already selected, quit early to prevent focus/change loop
            if ( $li.hasClass( 'selected' ) ) {
                return;
            }
			
			$item.find( 'li.selected' ).removeClass( 'selected' );
            
            $li.addClass( 'selected' );
        };

        var g_init_each = function() {
			self.gform.find( '.ginput_container.ginput_container_radio .gfield_radio input[type=radio]:checked' ).each( function() {
				$( this ).closest( 'li' ).addClass( 'selected' );
			});
        };
        
        var g_init = function() {
			
            $body.on( 'click', '.ginput_container.ginput_container_radio .gfield_radio input[type=radio]', gform_on_select_value );

            IDEAL.gforms_initialized = true;

        };

        g_init_each();

        if ( false === IDEAL.gforms_initialized ) {
            g_init();
        }

    };
	
	/***
	 * Finally queue up all the scripts.
	 */
	 
	IDEAL.forms_initialized = false;
	IDEAL.gforms_initialized = false;

	$( document ).ready( function() {

		var $form = $( '.variations_form' );

		if ( $form.length ) {
			IDEAL.Variations_Form( $form );
		}
		
		var $gform = $( '.gform_variation_wrapper.gform_wrapper' );

		if ( $gform.length ) {
			IDEAL.GForm_Forms( $gform );
		}

	});

})( jQuery );
