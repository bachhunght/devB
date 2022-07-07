<?php

class GBT_MT_Icons {

	/**
	 *  Constructor
	 */
	private function __construct() {}

	/**
	 * Icons List
	 *
	 * @return array
	 */
	private static function theme_icons() {
		return array(
			'arrow-down'			=> 'M 7.4296875 9.5 L 5.9296875 11 L 12 17.070312 L 18.070312 11 L 16.570312 9.5 L 12 14.070312 L 7.4296875 9.5 z',
			'arrow-right'			=> 'M 10 5.9296875 L 8.5 7.4296875 L 13.070312 12 L 8.5 16.570312 L 10 18.070312 L 16.070312 12 L 10 5.9296875 z',
			'arrow-left'			=> 'M 13 5.9296875 L 6.9296875 12 L 13 18.070312 L 14.5 16.570312 L 9.9296875 12 L 14.5 7.4296875 L 13 5.9296875 z',
			'comment' 				=> 'M 4.0019531 3 C 2.9088903 3 2.0019531 3.9069372 2.0019531 5 L 2.0019531 17 C 2.0019531 18.093063 2.9088903 19 4.0019531 19 L 18.001953 19 L 22.001953 23 L 21.990234 4.9980469 C 21.990235 3.9049841 21.082089 3 19.990234 3 L 4.0019531 3 z M 4.0019531 5 L 19.990234 5 L 19.998047 18.167969 L 18.830078 17 L 4.0019531 17 L 4.0019531 5 z M 7 8 L 7 10 L 17 10 L 17 8 L 7 8 z M 7 12 L 7 14 L 14 14 L 14 12 L 7 12 z',
			'wishlist'				=> 'M16.5,3C13.605,3,12,5.09,12,5.09S10.395,3,7.5,3C4.462,3,2,5.462,2,8.5c0,4.171,4.912,8.213,6.281,9.49 C9.858,19.46,12,21.35,12,21.35s2.142-1.89,3.719-3.36C17.088,16.713,22,12.671,22,8.5C22,5.462,19.538,3,16.5,3z M14.811,16.11 c-0.177,0.16-0.331,0.299-0.456,0.416c-0.751,0.7-1.639,1.503-2.355,2.145c-0.716-0.642-1.605-1.446-2.355-2.145 c-0.126-0.117-0.28-0.257-0.456-0.416C7.769,14.827,4,11.419,4,8.5C4,6.57,5.57,5,7.5,5c1.827,0,2.886,1.275,2.914,1.308L12,8 l1.586-1.692C13.596,6.295,14.673,5,16.5,5C18.43,5,20,6.57,20,8.5C20,11.419,16.231,14.827,14.811,16.11z',
			'wishlist-full'			=> 'M16.256,3.005C13.515,3.117,12,5.09,12,5.09s-1.515-1.973-4.256-2.085C5.906,2.93,4.221,3.845,3.111,5.312 c-3.862,5.104,3.45,11.075,5.17,12.678c1.029,0.959,2.299,2.098,3.057,2.773c0.379,0.338,0.944,0.338,1.323,0 c0.758-0.675,2.028-1.814,3.057-2.773c1.72-1.603,9.033-7.574,5.17-12.678C19.779,3.845,18.094,2.93,16.256,3.005z',
			'plus'					=> 'M 11 3 L 11 11 L 3 11 L 3 13 L 11 13 L 11 21 L 13 21 L 13 13 L 21 13 L 21 11 L 13 11 L 13 3 L 11 3 z',
			'check'					=> 'M 20.292969 5.2929688 L 9 16.585938 L 4.7070312 12.292969 L 3.2929688 13.707031 L 9 19.414062 L 21.707031 6.7070312 L 20.292969 5.2929688 z',
			'download'				=> 'M 12 4 C 9.6655084 4 7.7006133 5.2494956 6.4296875 7.0136719 C 2.8854572 7.05389 0 9.9465993 0 13.5 C 0 17.078268 2.9217323 20 6.5 20 L 18.5 20 C 21.525577 20 24 17.525577 24 14.5 C 24 11.509638 21.577034 9.0762027 18.599609 9.0195312 C 17.729938 6.1415745 15.152096 4 12 4 z M 12 6 C 14.504527 6 16.55398 7.825491 16.931641 10.214844 L 17.083984 11.175781 L 18.048828 11.050781 C 18.272182 11.021699 18.414903 11 18.5 11 C 20.444423 11 22 12.555577 22 14.5 C 22 16.444423 20.444423 18 18.5 18 L 6.5 18 C 4.0022677 18 2 15.997732 2 13.5 C 2 11.002268 4.0022677 9 6.5 9 C 6.534993 9 6.6164592 9.0069899 6.75 9.0136719 L 7.3613281 9.0449219 L 7.6660156 8.5136719 C 8.5301088 7.0123517 10.137881 6 12 6 z M 11 9 L 11 13 L 8 13 L 12 17 L 16 13 L 13 13 L 13 9 L 11 9 z',
			'info'					=> 'M 12 2 C 6.4889971 2 2 6.4889971 2 12 C 2 17.511003 6.4889971 22 12 22 C 17.511003 22 22 17.511003 22 12 C 22 6.4889971 17.511003 2 12 2 z M 12 4 C 16.430123 4 20 7.5698774 20 12 C 20 16.430123 16.430123 20 12 20 C 7.5698774 20 4 16.430123 4 12 C 4 7.5698774 7.5698774 4 12 4 z M 11 7 L 11 9 L 13 9 L 13 7 L 11 7 z M 11 11 L 11 17 L 13 17 L 13 11 L 11 11 z',
			'hamburger'				=> 'M 2 5 L 2 7 L 22 7 L 22 5 L 2 5 z M 2 11 L 2 13 L 22 13 L 22 11 L 2 11 z M 2 17 L 2 19 L 22 19 L 22 17 L 2 17 z',
			'picture'				=> 'M 4 4 C 2.9069372 4 2 4.9069372 2 6 L 2 18 C 2 19.093063 2.9069372 20 4 20 L 20 20 C 21.093063 20 22 19.093063 22 18 L 22 6 C 22 4.9069372 21.093063 4 20 4 L 4 4 z M 4 6 L 20 6 L 20 18 L 4 18 L 4 6 z M 14.5 11 L 11 15 L 8.5 12.5 L 5.7773438 16 L 18.25 16 L 14.5 11 z',
			'folder'				=> 'M 4 4 C 2.9057453 4 2 4.9057453 2 6 L 2 18 C 2 19.094255 2.9057453 20 4 20 L 20 20 C 21.094255 20 22 19.094255 22 18 L 22 8 C 22 6.9057453 21.094255 6 20 6 L 12 6 L 10 4 L 4 4 z M 4 6 L 9.171875 6 L 11.171875 8 L 20 8 L 20 18 L 4 18 L 4 6 z',
			'edit'					=> 'M 18.414062 2 C 18.158062 2 17.902031 2.0979687 17.707031 2.2929688 L 5 15 C 5 15 6.005 15.005 6.5 15.5 C 6.995 15.995 6.984375 16.984375 6.984375 16.984375 C 6.984375 16.984375 8.003 17.003 8.5 17.5 C 8.997 17.997 9 19 9 19 L 21.707031 6.2929688 C 22.098031 5.9019687 22.098031 5.2689063 21.707031 4.8789062 L 19.121094 2.2929688 C 18.926094 2.0979688 18.670063 2 18.414062 2 z M 18.414062 4.4140625 L 19.585938 5.5859375 L 18.537109 6.6347656 L 17.365234 5.4628906 L 18.414062 4.4140625 z M 15.951172 6.8769531 L 17.123047 8.0488281 L 9.4609375 15.710938 C 9.2099375 15.538938 8.9455469 15.408594 8.6855469 15.308594 C 8.5875469 15.050594 8.4590625 14.789063 8.2890625 14.539062 L 15.951172 6.8769531 z M 3.6699219 17 L 3 21 L 7 20.330078 L 3.6699219 17 z',
			'reply'					=> 'M 7.2929688 2.2929688 L 2.5859375 7 L 7.2929688 11.707031 L 8.7070312 10.292969 L 6.4140625 8 L 15 8 C 17.220375 8 19 9.7796254 19 12 L 19 21 L 21 21 L 21 12 C 21 8.6983746 18.301625 6 15 6 L 6.4140625 6 L 8.7070312 3.7070312 L 7.2929688 2.2929688 z',
			'close'					=> 'M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z',
			'expand'				=> 'M 11 3 C 10.448 3 10 3.448 10 4 L 10 6 C 10 6.552 10.448 7 11 7 L 13 7 C 13.552 7 14 6.552 14 6 L 14 4 C 14 3.448 13.552 3 13 3 L 11 3 z M 11 10 C 10.448 10 10 10.448 10 11 L 10 13 C 10 13.552 10.448 14 11 14 L 13 14 C 13.552 14 14 13.552 14 13 L 14 11 C 14 10.448 13.552 10 13 10 L 11 10 z M 11 17 C 10.448 17 10 17.448 10 18 L 10 20 C 10 20.552 10.448 21 11 21 L 13 21 C 13.552 21 14 20.552 14 20 L 14 18 C 14 17.448 13.552 17 13 17 L 11 17 z',
			'search'				=> 'M 9 2 C 5.1458514 2 2 5.1458514 2 9 C 2 12.854149 5.1458514 16 9 16 C 10.747998 16 12.345009 15.348024 13.574219 14.28125 L 14 14.707031 L 14 16 L 20 22 L 22 20 L 16 14 L 14.707031 14 L 14.28125 13.574219 C 15.348024 12.345009 16 10.747998 16 9 C 16 5.1458514 12.854149 2 9 2 z M 9 4 C 11.773268 4 14 6.2267316 14 9 C 14 11.773268 11.773268 14 9 14 C 6.2267316 14 4 11.773268 4 9 C 4 6.2267316 6.2267316 4 9 4 z',
			'shopping-cart'			=> 'M 10 2 C 8.897 2 8 2.897 8 4 L 8 6 L 3 6 L 3 19 C 3 20.103 3.897 21 5 21 L 19 21 C 20.103 21 21 20.103 21 19 L 21 6 L 16 6 L 16 4 C 16 2.897 15.103 2 14 2 L 10 2 z M 10 4 L 14 4 L 14 6 L 10 6 L 10 4 z M 5 8 L 19 8 L 19.001953 19 L 5 19 L 5 8 z M 9 10 C 8.448 10 8 10.448 8 11 C 8 11.552 8.448 12 9 12 C 9.552 12 10 11.552 10 11 C 10 10.448 9.552 10 9 10 z M 15 10 C 14.448 10 14 10.448 14 11 C 14 11.552 14.448 12 15 12 C 15.552 12 16 11.552 16 11 C 16 10.448 15.552 10 15 10 z',
			'share'					=> 'M 18 2 C 16.35499 2 15 3.3549904 15 5 C 15 5.1909529 15.021791 5.3771224 15.056641 5.5585938 L 7.921875 9.7207031 C 7.3985399 9.2778539 6.7320771 9 6 9 C 4.3549904 9 3 10.35499 3 12 C 3 13.64501 4.3549904 15 6 15 C 6.7320771 15 7.3985399 14.722146 7.921875 14.279297 L 15.056641 18.439453 C 15.021555 18.621514 15 18.808386 15 19 C 15 20.64501 16.35499 22 18 22 C 19.64501 22 21 20.64501 21 19 C 21 17.35499 19.64501 16 18 16 C 17.26748 16 16.601593 16.279328 16.078125 16.722656 L 8.9433594 12.558594 C 8.9782095 12.377122 9 12.190953 9 12 C 9 11.809047 8.9782095 11.622878 8.9433594 11.441406 L 16.078125 7.2792969 C 16.60146 7.7221461 17.267923 8 18 8 C 19.64501 8 21 6.6450096 21 5 C 21 3.3549904 19.64501 2 18 2 z M 18 4 C 18.564129 4 19 4.4358706 19 5 C 19 5.5641294 18.564129 6 18 6 C 17.435871 6 17 5.5641294 17 5 C 17 4.4358706 17.435871 4 18 4 z M 6 11 C 6.5641294 11 7 11.435871 7 12 C 7 12.564129 6.5641294 13 6 13 C 5.4358706 13 5 12.564129 5 12 C 5 11.435871 5.4358706 11 6 11 z M 18 18 C 18.564129 18 19 18.435871 19 19 C 19 19.564129 18.564129 20 18 20 C 17.435871 20 17 19.564129 17 19 C 17 18.435871 17.435871 18 18 18 z',
			
		);
	} 

	/**
	 * Returns the icon
	 *
	 * @param  string $icon_name 
	 *
	 * @return string
	 */
	public static function getIcon( $icon_name ) {

		$icon = array_key_exists($icon_name, self::theme_icons())? self::theme_icons()[$icon_name] : '';

		return $icon;
	}
}