<?php
function aven_zozo_epl_get_property_icons() {
	global $property;
	$land = $bed = $bath = $rooms = $parking = $construction = $category = '';
	
	$property_land_area_unit = $property->get_property_meta('property_land_area_unit');
	if( isset( $property_land_area_unit ) && $property_land_area_unit == 'squareMeter' ) {
		$property_land_area_unit = esc_html__('sqm' , 'aven');
	}
	if( intval( $property->get_property_meta('property_land_area') ) != 0 ) {
		$land = '<div class="property-icon-item"><div class="property-icon-inner icon land">';
		$land .= '<h6><span class="property-icon-item-label">'. esc_html__('Area', 'aven') .'</span>';
		$land .= '<span class="property-icon-value">'. $property->get_property_meta('property_land_area') . ' '.$property_land_area_unit.'</span></h6>';
		$land .= '</div></div>';
	}
	
	if( $property->get_property_meta('property_bedrooms') != '' ) {
		$bed = '<div class="property-icon-item"><div class="property-icon-inner icon beds">';
		$bed .= '<h6><span class="property-icon-item-label">'. esc_html__('Bedrooms', 'aven').'</span>';
		$bed .= '<span class="property-icon-value">'. $property->get_property_meta('property_bedrooms') . '</span></h6>';
		$bed .= '</div></div>';
	}
	
	if( $property->get_property_meta('property_bathrooms') != '' ) {
		$bath = '<div class="property-icon-item"><div class="property-icon-inner icon bath">';
		$bath .= '<h6><span class="property-icon-item-label">'. esc_html__('Bathrooms', 'aven').'</span>';
		$bath .= '<span class="property-icon-value">'. $property->get_property_meta('property_bathrooms') . '</span></h6>';
		$bath .= '</div></div>';
	}
	
	if( $property->get_property_meta('property_rooms') != '' ) {
		$rooms = '<div class="property-icon-item"><div class="property-icon-inner icon rooms">';
		$rooms .= '<h6><span class="property-icon-item-label">'. esc_html__('Rooms', 'aven').'</span>';
		$rooms .= '<span class="property-icon-value">'. $property->get_property_meta('property_rooms') . '</span></h6>';
		$rooms .= '</div></div>';
	}
	
	if( $property->get_property_meta('property_garage') != '' && $property->get_property_meta('property_carport') != '' ) {
		$property_parking = '';
		
		$property_garage 	= intval($property->get_property_meta('property_garage'));
		$property_carport 	= intval($property->get_property_meta('property_carport'));
		$property_parking 	= $property_carport + $property_garage;
		if( $property_parking != 0 ) {
			$parking = '<div class="property-icon-item"><div class="property-icon-inner icon parking">';
			$parking .= '<h6><span class="property-icon-item-label">'. esc_html__('Parking Spaces', 'aven').'</span>';
			$parking .= '<span class="property-icon-value">'. $property_parking . '</span></h6>';
			$parking .= '</div></div>';
		}
	}
	
	$property_new_construction = $property->get_property_meta('property_new_construction');
	if( isset($property_new_construction) && ($property_new_construction == 1 || $property_new_construction == 'yes') ) {
		$construction = '<div class="property-icon-item"><div class="property-icon-inner icon new_construction">';
		$construction .= '<h6><span class="property-icon-item-label">'. esc_html__('Construction', 'aven').'</span>';
		$construction .= '<span class="property-icon-value">'. esc_html__('New', 'aven') . '</span></h6>';
		$construction .= '</div></div>';
	}
	
	$property_category = $property->get_property_category();
	if( isset( $property_category ) && $property_category != '' ) {
		$category = '<div class="property-icon-item"><div class="property-icon-inner icon type_category">';
		$category .= '<h6><span class="property-icon-item-label">'. esc_html__('Type', 'aven').'</span>';
		$category .= '<span class="property-icon-value">'. $property_category . '</span></h6>';
		$category .= '</div></div>';
	}
		
	return $land . $bed . $bath . $rooms . $parking . $construction . $category;
}

function aven_zozo_epl_property_icons_output() {
	echo aven_zozo_epl_get_property_icons();
}
add_action('aven_zozo_epl_property_icons','aven_zozo_epl_property_icons_output');

function aven_zozo_epl_loop_get_property_icons( $show_all = 'yes', $only_bb = 'no' ) {
	global $property;
	$land = $bed = $bath = $rooms = $parking = $construction = $category = '';
	
	$property_land_area_unit = $property->get_property_meta('property_land_area_unit');
	if( isset( $property_land_area_unit ) && $property_land_area_unit == 'squareMeter' ) {
		$property_land_area_unit = esc_html__('sqm' , 'aven');
	}
	if( intval( $property->get_property_meta('property_land_area') ) != 0 ) {
		$land = '<div class="property-icon-item"><div class="property-icon-inner">';
		$land .= '<h6><span class="property-icon"><img src="'. ZOZOTHEME_URL .'/images/epl/icon-sqft.svg" alt="Icon Sqft" /></span>';
		$land .= '<span class="property-icon-value">'. $property->get_property_meta('property_land_area') . ' '.$property_land_area_unit.'</span></h6>';
		$land .= '</div></div>';
	}
	
	if( $property->get_property_meta('property_bedrooms') != '' ) {
		$bed = '<div class="property-icon-item"><div class="property-icon-inner">';
		$bed .= '<h6><span class="property-icon"><img src="'. ZOZOTHEME_URL .'/images/epl/icon-bed.svg" alt="Icon Bed" /></span>';
		$bed .= '<span class="property-icon-value">'. $property->get_property_meta('property_bedrooms') . ' '. esc_html__('Bedrooms', 'aven').'</span></h6>';
		$bed .= '</div></div>';
	}
	
	if( $property->get_property_meta('property_bathrooms') != '' ) {
		$bath = '<div class="property-icon-item"><div class="property-icon-inner">';
		$bath .= '<h6><span class="property-icon"><img src="'. ZOZOTHEME_URL .'/images/epl/icon-bath.svg" alt="Icon Bath" /></span>';
		$bath .= '<span class="property-icon-value">'. $property->get_property_meta('property_bathrooms') . ' '. esc_html__('Bathrooms', 'aven').'</span></h6>';
		$bath .= '</div></div>';
	}
	
	if( $property->get_property_meta('property_garage') != '' ) {
		$property_garage = '';
		$property_garage 	= intval($property->get_property_meta('property_garage'));
		if( $property_garage != 0 ) {
			$parking = '<div class="property-icon-item"><div class="property-icon-inner">';
			$parking .= '<h6><span class="property-icon"><img src="'. ZOZOTHEME_URL .'/images/epl/icon-garages.svg" alt="Icon Garages" /></span>';
			if( $property_garage == 1 ) { 
				$parking .= '<span class="property-icon-value">'. $property_garage . ' '. esc_html__('Garage', 'aven').'</span></h6>';
			} else {
				$parking .= '<span class="property-icon-value">'. $property_garage . ' '. esc_html__('Garages', 'aven').'</span></h6>';
			}
			$parking .= '</div></div>';
		}
	}
	
	if( $show_all == 'yes' ) {
		return $land . $bed . $bath . $parking;
	} elseif( $only_bb == 'yes' && $show_all == 'no' ) {
		return $bed . $bath;
	}
}

function aven_zozo_epl_loop_property_icons_output() {
	echo aven_zozo_epl_loop_get_property_icons();
}
add_action('aven_zozo_epl_loop_property_icons', 'aven_zozo_epl_loop_property_icons_output');
remove_action('epl_property_icons', 'epl_property_icons');
add_action('epl_property_icons', 'aven_zozo_epl_loop_property_icons_output', 10);

function aven_zozo_epl_get_property_bb_icons_output() {
	echo aven_zozo_epl_loop_get_property_icons( $show_all = 'no', $only_bb = 'yes' );
}
add_action('aven_zozo_epl_get_property_bb_icons', 'aven_zozo_epl_get_property_bb_icons_output');

function aven_zozo_epl_property_tab_section_output() {
	global $property;
	$post_type = $property->post_type;
	$the_property_feature_list = '';
	
	if ( 'commercial' == $post_type || 'commercial_land' == $post_type || 'business' == $post_type ) {
		$the_property_feature_list .= $property->get_property_commercial_category('li');
	}
	
	$additional_features 	= array (
		'property_remote_garage',
		'property_secure_parking',
		'property_study',
		'property_dishwasher',
		'property_built_in_robes',
		'property_gym',
		'property_workshop',
		'property_rumpus_room',
		'property_floor_boards',
		'property_broadband',
		'property_pay_tv',
		'property_vacuum_system',
		'property_intercom',
		'property_spa',
		'property_tennis_court',
		'property_balcony',
		'property_deck',
		'property_courtyard',
		'property_outdoor_entertaining',
		'property_shed',
		'property_open_fire_place',
		'property_ducted_cooling',
		'property_split_system_heating',
		'property_hydronic_heating',
		'property_split_system_aircon',
		'property_gas_heating',
		'property_reverse_cycle_aircon',
		'property_evaporative_cooling'

	);
	$additional_features = apply_filters('epl_property_additional_features_list',$additional_features);
	
	if ( 'property' == $property->post_type || 'rental' == $property->post_type || 'rural' == $property->post_type){
		foreach($additional_features as $additional_feature){
			$the_property_feature_list .= $property->get_additional_features_html($additional_feature);
		}
	}
	
	if( $property->post_type != 'land' || $property->post_type != 'business') {
		if( $the_property_feature_list != '' ) { ?>
			<h5 class="tab-title"><?php _e('Additional Features', 'aven'); ?></h5>
			<div class="epl-tab-content tab-content">
				<ul class="listing-info epl-tab-<?php echo esc_attr( $property->get_epl_settings('display_feature_columns') ); ?>-columns">
					<?php echo ''. $the_property_feature_list; ?>							
				</ul>
			</div>
	<?php }
	} ?>

	<div class="epl-tab-content epl-tab-content-additional tab-content">
		<?php
			//Land Category
			if( 'land' == $property->post_type || 'commercial_land' == $property->post_type ) {
				echo '<div class="epl-land-category">' . $property->get_property_land_category() . '</div>';
			}
			
			//Commercial Options
			if ( $property->post_type == 'commercial' ) {
				if ( $property->get_property_meta('property_com_plus_outgoings') == 1) {
					echo '<div class="epl-commercial-outgoings price-type">'. esc_html__('Plus Outgoings', 'aven').'</div>';
				}
			}
		?>
	</div>
<?php }
add_action('aven_zozo_epl_property_tab_section', 'aven_zozo_epl_property_tab_section_output');

function aven_zozo_epl_property_video_callback( $width = 600 ) {

	global $property;
	$property_video_url	= $property->get_property_meta('property_video_url');
	
	if( isset( $property_video_url ) && $property_video_url != '' ) {
		echo '<div class="epl-tab-section epl-tab-section-video">';
		echo '<h5 class="tab-title">'. apply_filters('epl_property_tab_title_video', esc_html__('Property Video', 'aven')) .'</h5>';
		echo '<div class="tab-content">';
		
		if ( has_post_thumbnail() ) { ?>
			<div class="epl-video-featured-image">
				<a href="<?php echo esc_url( $property_video_url ); ?>" class="epl-video-play" data-rel="prettyPhoto">
					<div class="epl-play-btn"></div>
					<?php the_post_thumbnail( 'aven-blog-large' ); ?>
				</a>
			</div>
		<?php } else { 
			$video_width = $width != '' ? $width : 600;
			echo epl_get_video_html($property_video_url, $video_width);
		}
		
		echo '</div>';
		echo '</div>';
	}
	
}
remove_action('epl_property_content_after', 'epl_property_video_callback');
add_action('aven_zozo_epl_property_video', 'aven_zozo_epl_property_video_callback', 10, 2);

function aven_zozo_epl_property_map_wrapper_before() {
	echo '<div class="epl-tab-section epl-tab-section-map">';
	echo '<h5 class="tab-title">'. apply_filters('epl_property_tab_title_map', esc_html__('Property Map', 'aven')) .'</h5>';
	echo '<div class="tab-content">';
}
add_action('epl_property_map', 'aven_zozo_epl_property_map_wrapper_before', 1);

function aven_zozo_epl_property_map_wrapper_after() {
	echo '</div>';
	echo '</div>';
}
add_action('epl_property_map', 'aven_zozo_epl_property_map_wrapper_after', 99);

remove_action('epl_buttons_single_property', 'epl_buttons_wrapper_before', 1);
remove_action('epl_buttons_single_property', 'epl_buttons_wrapper_after', 99);

// Remove Plugin Shortcode and Register Theme Shortcode for EPL
add_action( 'after_setup_theme', 'aven_remove_epl_listing_shortcode', 10 );

function aven_remove_epl_listing_shortcode() {
    remove_shortcode( 'listing' );
}

/**
 * This shortcode allows for you to specify the property type(s) using 
 * [listing post_type="property,rental" status="current,sold,leased" template="default"] option. You can also 
 * limit the number of entries that display. using  [listing limit="5"]
 */
function aven_zozo_epl_shortcode_listing( $atts ) {
	$property_types = epl_get_active_post_types();
	if(!empty($property_types)) {
		 $property_types = array_keys($property_types);
	}
	
	extract( shortcode_atts( array(
		'post_type' 	=>	$property_types, //Post Type
		'status'		=>	array('current' , 'sold' , 'leased' ),
		'limit'			=>	'10', // Number of maximum posts to show
		'template'		=>	false, // Template can be set to "slim" for home open style template
		'location'		=>	'', // Location slug. Should be a name like sorrento
		'tools_top'		=>	'off', // Tools before the loop like Sorter and Grid on or off
		'tools_bottom'	=>	'off', // Tools after the loop like pagination on or off
		'sortby'		=>	'', // Options: price, date : Default date
		'sort_order'	=>	'DESC',
		'navigation'	=>	'on', // Previous/Next page navigation on or off
		'query_object'	=>	'' // only for internal use . if provided use it instead of custom query 
	), $atts ) );
	
	if(is_string($post_type) && $post_type == 'rental') {
		$meta_key_price = 'property_rent';
	} else {
		$meta_key_price = 'property_price';
	}
	
	$sort_options = array(
		'price'			=>	$meta_key_price,
		'date'			=>	'post_date'
	);
	if( !is_array($post_type) ) {
		$post_type 			= array_map('trim',explode(',',$post_type) );
	}
	ob_start();
	$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
	$args = array(
		'post_type' 		=>	$post_type,
		'posts_per_page'	=>	$limit,
		'paged' 		=>	$paged
	);
	
	if(!empty($location) ) {
		if( !is_array( $location ) ) {
			$location = explode(",", $location);
			$location = array_map('trim', $location);
			
			$args['tax_query'][] = array(
				'taxonomy'	=> 'location',
				'field'		=> 'slug',
				'terms' 	=> $location
			);
		}
	}
	
	if(!empty($status)) {
		if(!is_array($status)) {
			$status = explode(",", $status);
			$status = array_map('trim', $status);
			
			$args['meta_query'][] = array(
				'key'		=> 'property_status',
				'value'		=> $status,
				'compare'	=> 'IN'
			);
			
			add_filter('epl_sorting_options','epl_sorting_options_callback');
		}
	}

	if( $sortby != '' ) {
	
		if($sortby == 'price') {
			$args['orderby']	=	'meta_value_num';
			$args['meta_key']	=	$meta_key_price;
		} else {
			$args['orderby']	=	'post_date';
			$args['order']		=	'DESC';

		}
		$args['order']			=	$sort_order;
	}
	
	if( isset( $_GET['sortby'] ) ) {
		$orderby = sanitize_text_field( trim($_GET['sortby']) );
		if($orderby == 'high') {
			$args['orderby']	=	'meta_value_num';
			$args['meta_key']	=	$meta_key_price;
			$args['order']		=	'DESC';
		} elseif($orderby == 'low') {
			$args['orderby']	=	'meta_value_num';
			$args['meta_key']	=	$meta_key_price;
			$args['order']		=	'ASC';
		} elseif($orderby == 'new') {
			$args['orderby']	=	'post_date';
			$args['order']		=	'DESC';
		} elseif($orderby == 'old') {
			$args['orderby']	=	'post_date';
			$args['order']		=	'ASC';
		} elseif($orderby == 'status_desc') {
			$args['orderby']	=	'meta_value';
			$args['meta_key']	=	'property_status';
			$args['order']		=	'DESC';
		} elseif($orderby == 'status_asc') {
			$args['orderby']	=	'meta_value';
			$args['meta_key']	=	'property_status';
			$args['order']		=	'ASC';
		}
		
	}

	$query_open = new WP_Query( $args );
	
	if( is_object($query_object) ) {
		$query_open = $query_object;
	}
	
	if ( $query_open->have_posts() ) { ?>
		<div class="zozo-epl-listings-wrapper epl-shortcode">
			<div class="entry-content loop-content epl-shortcode-listing <?php echo epl_template_class( $template ); ?>">
				<?php
					if ( $tools_top == 'on' ) {
						do_action( 'epl_property_loop_start' );
					}
				?>
				<div class="zozo-epl-listing-loop epl-clearfix">
				<?php	
					while ( $query_open->have_posts() ) {
						$query_open->the_post();
						$template = str_replace('_','-',$template);
						epl_property_blog($template);
					}
				?>
				</div>
				<?php
					if ( $tools_bottom == 'on' ) {
						do_action( 'epl_property_loop_end' );
					}
				?>
			</div>
			<?php if ( $navigation == 'on' ) { ?>
				<div class="loop-footer">
					<?php do_action('epl_pagination', array('query'	=>	$query_open)); ?>
				</div>
			<?php } ?>
			
		</div>
		<?php 
	} else { ?>
		<div class="zozo-epl-listings-wrapper">
			<div class="entry-header clearfix">
				<h3 class="entry-title"><?php esc_html_e('Listing not Found', 'aven'); ?></h3>
			</div>
		</div>
	<?php }
	wp_reset_postdata();
	return ob_get_clean();
}