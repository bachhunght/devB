(function( $ ) {

	"use strict";

	$(document).ready(function(){
		
		if( $( "ul.nav.instagram-pics" ).length ){
			$( "ul.nav.instagram-pics" ).each(function( index ) {

				var ele = $(this);
				var insta_user_name = ele.data( 'username' ) ? ele.data( 'username' ) : 'zozothemedemo';
				var limit = ele.data( 'limit' ) ? ele.data( 'limit' ) : 9;
				var target = ele.data( 'target' ) ? ele.data( 'target' ) : 'blank';
				var img_size = ele.data( 'size' ) ? ele.data( 'size' ) : 'thumbnail';
				zozo_get_instagram_image( ele, insta_user_name, limit, target, img_size );

			});
		}
		
		
	});

	function zozo_get_instagram_image( ele, insta_user_name, limit, target, img_size ) {

		var insta_out = '';
		var insta_img_size = 150;
		if( img_size == 'small' ){
			insta_img_size = 320;
		}else if( img_size == 'large' ){
			insta_img_size = 640;
		}
				
		try {
			axios.get('https://www.instagram.com/'+ insta_user_name +'/').then( userInfoSource => {

				// userInfoSource.data contains the HTML from axios
				var jsonObject = userInfoSource.data.match(/<script type="text\/javascript">window\._sharedData = (.*)<\/script>/)[1].slice(0, -1);

				var userInfo = JSON.parse(jsonObject);
				// Retrieve only the first 10 results
				var mediaArray = userInfo.entry_data.ProfilePage[0].graphql.user.edge_owner_to_timeline_media.edges.splice(0, limit);
				
				for (let media of mediaArray) {
					var node = media.node;
					
					// Process only if is an image
					if ((node.__typename && node.__typename !== 'GraphImage')) {
						continue
					}

					// Push the thumbnail src in the array
					var img_id = node.shortcode;
					$.each(node.thumbnail_resources, function( index, value ) {
						if( value.config_height == insta_img_size ){
							insta_out += '<li class="instagram-pic"><a href="https://www.instagram.com/p/'+ img_id +'" target="'+ target +'"><div class="insta-footer-img" style="background-image:url('+ value.src +');"></div></a></li>';
						}
					});
				}
				$(ele).append(insta_out);
			});
		}catch (e) {
			console.error('Unable to retrieve photos. Reason: ' + e.toString());
		}
		
	}
	
})( jQuery );