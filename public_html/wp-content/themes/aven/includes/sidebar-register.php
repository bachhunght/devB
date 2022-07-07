<?php
/**
 * Register widgetized areas
 */
if ( ! function_exists( 'aven_zozo_widgets_init' ) ) {
	function aven_zozo_widgets_init() {
	
	// Primary Sidebar
	    
	register_sidebar( array(
		'name'          => esc_html__( 'Main Sidebar', 'aven' ),
		'id'            => 'primary',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
		'description' 	=> esc_html__( 'The default sidebar used in two or three-column layouts.', 'aven' ),
	) );
	
	// Secondary Sidebar
	
	register_sidebar( array(
		'name'          => esc_html__( 'Secondary Sidebar', 'aven' ),
		'id'            => 'secondary',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
		'description' 	=> esc_html__( 'A secondary sidebar used in three-column layouts.', 'aven' ),
	) );
	
	// Secondary Menu Sidebar
	
	register_sidebar( array(
		'name'          => esc_html__( 'Secondary Menu Sidebar', 'aven' ),
		'id'            => 'secondary-menu',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
		'description' 	=> esc_html__( 'A secondary menu sidebar used to show your widgets on secondary menu area if enabled in theme options.', 'aven' ),
	) );
	
	// Footer Widgets Sidebar
	$is_footer_widgets = '';
	$is_footer_widgets = aven_zozo_get_theme_option( 'zozo_footer_widgets_enable' ) ? aven_zozo_get_theme_option( 'zozo_footer_widgets_enable' ) : 0;
	
	if( $is_footer_widgets ) {
		
		$columns = '';
		$columns = 4;
		for ( $i = 1; $i <= intval( $columns ); $i++ ) {
		
			register_sidebar( array(
				'name'          => sprintf( esc_html__( 'Footer %d', 'aven' ), $i ),
				'id'            => sprintf( 'footer-widget-%d', $i ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
				'description'	=> sprintf( esc_html__( 'Footer widget Area %d.', 'aven' ), $i ),
			) );
				
		}
		
	}
	
	// Sliding Widgets Sidebar
	$sliding_widgets = '';
	$sliding_widgets = aven_zozo_get_theme_option( 'zozo_enable_sliding_bar' ) ? aven_zozo_get_theme_option( 'zozo_enable_sliding_bar' ) : 0;
	
	if( $sliding_widgets ) {
	
		$columns = '';
		$columns = aven_zozo_get_theme_option( 'zozo_sliding_bar_columns' );
		
		if ( ! $columns ) $columns = 3;
		for ( $i = 1; $i <= intval( $columns ); $i++ ) {
		
			register_sidebar( array(
				'name'          => sprintf( esc_html__( 'Sliding Bar Widget %d', 'aven' ), $i ),
				'id'            => sprintf( 'sliding-bar-%d', $i ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
				'description'	=> sprintf( esc_html__( 'Sliding Bar Widget Area %d.', 'aven' ), $i ),
			) );
				
		}
	}
	
	/**
	 * Woocommerce Sidebar
	 */
	if( class_exists('Woocommerce') ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Shop Sidebar', 'aven' ),
			'id'            => 'shop-sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
			'description' 	=> esc_html__( 'Shop Sidebar to show your widgets on Shop Pages.', 'aven' ),
		) );
	}
	
	/**
	 * EPL Sidebar
	 */
	if( class_exists('Easy_Property_Listings') ) {
		register_sidebar( array(
			'name'          => esc_html__( 'EPL Sidebar', 'aven' ),
			'id'            => 'epl-sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
			'description' 	=> esc_html__( 'EPL Sidebar to show your widgets on property single pages.', 'aven' ),
		) );
	}
		
	} // End aven_zozo_widgets_init()
}

add_action( 'widgets_init', 'aven_zozo_widgets_init' );  
?>