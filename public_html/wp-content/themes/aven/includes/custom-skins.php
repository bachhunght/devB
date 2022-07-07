<?php 
/* ======================================
 * Add theme custom styles 
 * ====================================== */

global $post; 

$post_id = '';
$post_id = aven_zozo_get_post_id();

// Custom Color Scheme
$custom_color = '';
if( aven_zozo_get_theme_option( 'zozo_custom_scheme_color' ) != '' ) {
	$custom_color = aven_zozo_get_theme_option( 'zozo_custom_scheme_color' );
	$custom_color_rgb = aven_zozo_hex2rgb( $custom_color );
	$custom_color_dark = aven_zozo_color_luminance( $custom_color, '-0.2' );
	
	// Color
	echo 'a {
		color: '. $custom_color .';
	}
	.page-title-section .page-title-breadcrumbs .zozo-breadcrumbs a:hover,
	.page-title-section.page-titleskin-dark .page-title-breadcrumbs .zozo-breadcrumbs a:hover,
	.page-title-section.page-titleskin-dark .page-title-breadcrumbs .zozo-breadcrumbs a:focus,
	.sidebar .zozo-latest-posts .posts-title a:hover {
		color: '. $custom_color .';
	}
	blockquote:before,
	blockquote:after {
		background-color: '. $custom_color .';
	}
	.bg-style.bg-normal {
		background-color: '. $custom_color .'!important;
		fill: '. $custom_color .';
	}
	.bg-overlay-primary:before {
		background: rgba('. $custom_color_rgb[0] . ','. $custom_color_rgb[1] . ','. $custom_color_rgb[2] . ',0.8);
	}
	.typo-dark h1 > a:hover,
	.typo-dark h1 > a:active,
	.typo-dark h1 > a:focus,
	.typo-dark h2 > a:hover,
	.typo-dark h2 > a:active,
	.typo-dark h2 > a:focus,
	.typo-dark h3 > a:hover,
	.typo-dark h3 > a:active,
	.typo-dark h3 > a:focus,
	.typo-dark h4 > a:hover,
	.typo-dark h4 > a:active,
	.typo-dark h4 > a:focus,
	.typo-dark h5 > a:hover,
	.typo-dark h5 > a:active,
	.typo-dark h5 > a:focus,
	.typo-dark h6 > a:hover,
	.typo-dark h6 > a:active,
	.typo-dark h6 > a:focus,
	.typo-light h1 > a:hover,
	.typo-light h1 > a:active,
	.typo-light h1 > a:focus,
	.typo-light h2 > a:hover,
	.typo-light h2 > a:active,
	.typo-light h2 > a:focus,
	.typo-light h3 > a:hover,
	.typo-light h3 > a:active,
	.typo-light h3 > a:focus,
	.typo-light h4 > a:hover,
	.typo-light h4 > a:active,
	.typo-light h4 > a:focus,
	.typo-light h5 > a:hover,
	.typo-light h5 > a:active,
	.typo-light h5 > a:focus,
	.typo-light h6 > a:hover,
	.typo-light h6 > a:active,
	.typo-light h6 > a:focus {
		color: '. $custom_color .';
	}
	
	/*--------------Page loader-----------*/
	.pageloader .ball-clip-rotate > div {
		border-color: '. $custom_color .';
		border-bottom-color: transparent;
	}
	/* ------------- Button ------------- */
	.btn,
	.btn.btn-default,
	input[type="submit"],
	button[type="submit"],
	.vc_general.vc_btn3.vc_btn3-color-primary-bg,
	.vc_btn.vc_btn-primary-bg,
	.vc_general.vc_btn3.vc_btn3-color-juicy-pink,
	.btn-modal.btn-primary {
		background: '. $custom_color .';
	}
	.btn:hover,
	.btn:focus,
	input[type="submit"]:hover,
	input[type="submit"]:focus,
	.tagcloud a:hover,
	.tagcloud a:focus,
	.vc_general.vc_btn3.vc_btn3-style-default:hover,
	.vc_general.vc_btn3.vc_btn3-style-default:focus,
	.vc_general.vc_btn3.vc_btn3-style-default:active,
	.vc_general.vc_btn3.vc_btn3-color-primary-bg:hover,
	.vc_general.vc_btn3.vc_btn3-color-primary-bg:focus,
	.vc_general.vc_btn3.vc_btn3-color-primary-bg:active,
	.vc_btn.vc_btn-primary-bg:hover,
	.vc_btn.vc_btn-primary-bg:focus,
	.vc_btn.vc_btn-primary-bg:active,
	.vc_general.vc_btn3.vc_btn3-color-juicy-pink:hover,
	.vc_general.vc_btn3.vc_btn3-color-juicy-pink:focus,
	.vc_general.vc_btn3.vc_btn3-color-juicy-pink:active,
	.wpcf7 input[type="submit"]:hover,
	.wpcf7 input[type="submit"]:focus,
	.pager li > a:hover,
	.pager li > span:hover,
	.pager li > a:focus,
	.pager li > span:focus,
	.owl-carousel.owl-theme .owl-controls .owl-nav div:hover {
		background-color: rgba('. $custom_color_rgb[0] . ','. $custom_color_rgb[1] . ','. $custom_color_rgb[2] . ',0.8);
		box-shadow:0 5px 11px 0 rgba(0, 0, 0, 0.18), 0 4px 15px 0 rgba(0, 0, 0, 0.15);
		-webkit-0 5px 11px 0 rgba(0, 0, 0, 0.18), 0 4px 15px 0 rgba(0, 0, 0, 0.15);
		-moz-0 5px 11px 0 rgba(0, 0, 0, 0.18), 0 4px 15px 0 rgba(0, 0, 0, 0.15);
		-ms-0 5px 11px 0 rgba(0, 0, 0, 0.18), 0 4px 15px 0 rgba(0, 0, 0, 0.15);
		-o-0 5px 11px 0 rgba(0, 0, 0, 0.18), 0 4px 15px 0 rgba(0, 0, 0, 0.15);
	}
	.btn-transparent-black:hover,
	.btn.btn-transparent-black:hover,
	.btn-transparent-white:hover,
	.btn.btn-transparent-white:hover,
	.btn-transparent-black-inverse,
	.btn.btn-transparent-black-inverse,
	.btn-transparent-white-inverse,
	.btn.btn-transparent-white-inverse,
	.btn-transparent-color,
	.btn.btn-transparent-color,
	.btn-transparent-color-inverse:hover,
	.btn.btn-transparent-color-inverse:hover {
		color: '. $custom_color .';
	}
	.btn-transparent-color:hover,
	.btn.btn-transparent-color:hover,
	.btn-transparent-color-inverse,
	.btn.btn-transparent-color-inverse {
		background-color: '. $custom_color .';
	}
	.vc_general.vc_btn3.vc_btn3-style-outline.vc_btn3-color-primary-bg,
	.vc_general.vc_btn3.vc_btn3-style-outline.vc_btn3-color-primary-bg:hover,
	.btn-transparent-color,
	.btn.btn-transparent-color,
	.btn-transparent-color-inverse:hover,
	.btn.btn-transparent-color-inverse:hover,
	.btn-transparent-color:hover,
	.btn.btn-transparent-color:hover,
	.btn-transparent-color-inverse,
	.btn.btn-transparent-color-inverse {
		border-color: '. $custom_color .';
	}
	.bg-skin-dark .vc_general.vc_btn3.vc_btn3-style-outline.vc_btn3-color-primary-bg {
		color: '. $custom_color .';
	}
	.parallax-background .parallax-content a.btn:hover,
	.parallax-background .parallax-content a.btn:active,
	.parallax-background .parallax-content a.btn:focus {
		color: '. $custom_color .';
	}
	#respond .form-submit input[type="submit"],
	input[type="submit"],
	.wpcf7 input[type="submit"],
	button[type="submit"] {
		background-color: '. $custom_color .';
	}
	.bg-style.dark-wrapper .vc_general.vc_cta3 .vc_cta3-actions .vc_general.vc_btn3.vc_btn3-style-transparent.vc_btn3-color-primary-bg {
		color: '. $custom_color .';
	}
	/* Go Button Styles */
	.vc_btn3-color-primary-bg.vc_btn3-style-outline:hover,
	.vc_btn3-color-primary-bg.vc_btn3-style-outline:focus,
	.vc_btn3-color-primary-bg.vc_btn3-style-outline:active {
		background-color: '. $custom_color .';
	}
	.vc_btn3-color-primary-bg.vc_btn3-style-outline {
		border-color: '. $custom_color .';
	}
	.vc_btn3-color-primary-bg.vc_btn3-style-outline,
	.vc_general.vc_btn3.vc_btn3-style-transparent.vc_btn3-color-primary-bg {
		color: '. $custom_color .';
	}
	button.ubtn .ubtn-hover {
		background: '. $custom_color .';
	}
	.ubtn.ubtn-center-dg-bg .ubtn-hover,
	.ubtn.ubtn-top-bg .ubtn-hover,
	.ubtn.ubtn-bottom-bg .ubtn-hover,
	.ubtn.ubtn-left-bg .ubtn-hover,
	.ubtn.ubtn-right-bg .ubtn-hover,
	.ubtn.ubtn-center-hz-bg .ubtn-hover,
	.ubtn.ubtn-center-vt-bg .ubtn-hover {
		background-color: '. $custom_color .';
	}
	/* ------------- VC Progress Bar ------------- */
	.bar-style-tooltip .tooltip .tooltip-inner {
		background: '. $custom_color .';
	}
	.bar-style-tooltip .tooltip.top .tooltip-arrow {
		border-top-color: '. $custom_color .';
	}
	/* ------------- Header top section ------------- */
	.header-top-section a:hover,
	.header-top-section a:focus,
	.mobile-header-section a:hover,
	.mobile-header-section a:focus,
	.mobile-cart-wrapper a:hover,
	.mobile-cart-wrapper a:focus,
	.mobile-menu-wrapper a:hover,
	.mobile-menu-wrapper a:focus,
	.header-main-bar-sidemenu > a.active {
		color: '. $custom_color .';
	}
	.cart-count {
		background: '. $custom_color .';
	}
	/* ------------- Header logo section ------------- */
	.header-logo-section .navbar-nav > li a:hover,
	.header-logo-section .header-contact-details li > a:hover {
		color: '. $custom_color .';
	}
	.header-logo-section .header-contact-details > li.header-phone:before,
	.header-logo-section .header-contact-details > li.header-email:before {
		color: '. $custom_color .';
	}
	.header-details-box:hover .header-details-icon > i {
		color: '. $custom_color .';
	}
	/* ------------- Navigation menu ------------- */
	.header-section .header-main-section .zozo-main-nav > li > a:hover,
	.header-section .header-main-section .zozo-main-nav > li:hover > a,
	.header-section .header-main-section .zozo-main-nav > li.active > a,
	.header-section a:hover,
	.header-section i:hover,
	.header-section .zozo-main-nav li.current-menu-ancestor > a,
	.header-section .zozo-main-nav li.current-menu-parent > a,
	.header-section .zozo-main-nav li.current-menu-item > a,
	.header-section .header-main-section .zozo-main-nav.navbar-nav .dropdown-menu > li > a:focus,
	.header-section .header-main-section .zozo-main-nav.navbar-nav .dropdown-menu > li > a:hover,
	.header-section .header-main-section .zozo-main-nav.navbar-nav .sub-menu > li > a:focus,
	.header-section .header-main-section .zozo-main-nav.navbar-nav .sub-menu > li > a:hover,
	.header-section .header-main-section .dropdown-menu > li.dropdown:hover > a,
	.header-section .header-main-section .sub-menu > li.dropdown:hover > a,
	.header-section .header-main-section .dropdown-menu > .active > a,
	.header-section .header-main-section .dropdown-menu > .active > a:focus,
	.header-section .header-main-section .dropdown-menu > .active > a:hover,
	.header-section .header-main-section .menu-item.active > a,
	.header-section .header-main-section .mobile-sub-menu > li > a:hover,
	.header-section .header-main-section .mobile-sub-menu > li > a:active,
	.header-section .header-main-section .mobile-sub-menu > li > a:focus,
	.header-section .header-toggle-section .nav > li > a:focus,
	.header-section .header-toggle-section .nav > li > a:hover,
	.header-section .header-logo-section .header-contact-details li a:hover,
	.header-section .header-toggle-section .header-contact-details li a:hover,
	.header-toggle-content .btn-toggle-close,
	.header-toggle-section .header-side-top-section .header-side-top-submenu.dropdown-menu li > a:hover,
	.header-main-section li.header-side-wrapper > a:focus,
	.header-skin-light.header-transparent .header-top-section ul > li a:hover,
	.header-section.header-skin-dark .header-main-section .zozo-main-nav li.current-menu-item > a,
	.header-section .zozo-main-nav .mobile-sub-menu > li > a:hover,
	.header-section.header-menu-skin-dark .header-main-section a:hover,
	.header-section.header-menu-skin-light .header-main-section a:hover,
	.header-section.type-header-6 .header-logo-section .woo-cart .cart-icon:hover i,
	.header-section .woo-cart-item .cart-item-content .cart-product-title:hover,
	.header-overlay-menu-wrapper .zozo-main-nav > li > a:hover {
		color: '. $custom_color .';
	}
	.zozo-main-nav.navbar-nav .dropdown-menu,
	.zozo-main-nav.navbar-nav .dropdown-menu .sub-menu,
	.zozo-main-nav.navbar-nav .sub-menu,
	.zozo-megamenu-wrapper,
	.header-side-top-submenu.dropdown-menu {
		border-color: '. $custom_color .';
	}
	.header-section .header-main-section .header-top-cart .cart-icon .cart-count,
	.header-toggle-section .header-top-cart .cart-icon {
		background: '. $custom_color .';
	}
	.header-section.header-skin-light .zozo-megamenu-widgets-container .widget li a:hover,
	.header-section.header-skin-dark .zozo-megamenu-widgets-container .widget li a:hover {
		color: '. $custom_color .';
	}
	.header-section.header-transparent .header-top-section a:hover,
	.header-section.header-semi-transparent .header-top-section a:hover,
	.header-section.header-transparent .header-top-section a:focus,
	.header-section.header-semi-transparent .header-top-section a:focus {
		color: '. $custom_color .';
	}
	.mobile-menu-wrapper .mobile-menu-nav,
	.mobile-cart-wrapper .mobile-cart-link {
		background:'. $custom_color .';
	}
	/* TOGGLE HEADER */
	.header-section.type-header-9 .header-toggle-section .close-menu,
	.header-toggle-section .header-side-top-section .header-side-topmenu .btn:hover {
		background:'. $custom_color .';
	}
	.header-side-main-section .main-bar-item.item-cart .cart-icon {
		background:'. $custom_color .';
	}
	.header-section .menu-item .new-tag {
		background:'. $custom_color .';
	}
	.header-section .menu-item .new-tag:before {
		border-right-color:'. $custom_color .';
	}
	/* FULL SCREEN SEARCH */
	.header-fullscreen-search-wrapper .fullscreen-search-inner .btn.btn-search:hover,
	.header-fullscreen-search-wrapper .fullscreen-search-inner .btn.btn-search:focus {
		color: '. $custom_color .';
	}
	/* MOBILE NAV */
	.main-mobile-nav .zozo-main-nav li.active > .toggle-wrapper a,
	.main-mobile-nav .mobile-sub-menu li.active > a,
	.main-mobile-nav .zozo-main-nav li a:hover,
	.main-mobile-nav .zozo-main-nav .submenu-toggle:hover,
	.main-mobile-nav .current-menu-ancestor > .toggle-wrapper a,
	.main-mobile-nav .current-menu-ancestor > .toggle-wrapper .zozo-megamenu-title {
		color: '. $custom_color .';
	}
	/* ------------- Form ------------- */
	#contactform1 .form-group input:focus,
	#contactform1 .form-control:focus,
	#contactform1 textarea:focus,
	input:focus,
	.form-control:focus,
	textarea:focus,
	#respond input:focus,
	#respond textarea:focus,
	#buddypress #whats-new:focus {
		border-color: '. $custom_color .' !important;
	}
	/* ------------------ Slidingbar ------------------ */
	.sliding-bar-widgets .widget.widget_recent_entries li a:hover,
	.sliding-bar-widgets .widget.widget_recent_comments li .comment-author-link a:hover,
	.sliding-bar-widgets .widget.zozo_category_posts_widget li a:hover,
	.sliding-bar-widgets .widget.widget_categories li a:hover,
	.sliding-bar-widgets .widget.widget_archive li a:hover,
	.sliding-bar-widgets .widget.widget_meta li a:hover,
	.sliding-bar-widgets .widget.widget_nav_menu li a:hover,
	.sliding-bar-widgets .widget.widget_nav_menu li.current_page_item a,
	.sliding-bar-widgets .widget.widget_recent_entries li a:focus,
	.sliding-bar-widgets .widget.widget_recent_comments li .comment-author-link a:focus,
	.sliding-bar-widgets .widget.zozo_category_posts_widget li a:focus,
	.sliding-bar-widgets .widget.widget_categories li a:focus,
	.sliding-bar-widgets .widget.widget_archive li a:focus,
	.sliding-bar-widgets .widget.widget_meta li a:focus,
	.sliding-bar-widgets .widget.widget_nav_menu li a:focus {
		color: '. $custom_color .';
	}
	.sliding-bar-widgets .zozo-latest-posts .posts-title a:hover,
	.sliding-bar-widgets .zozo-latest-posts .posts-title a:focus {
		color: '. $custom_color .';
	}
	.sliding-bar-widgets .tweet-user-name a:hover,
	.sliding-bar-widgets .tweet-user-name a:focus {
		color: '. $custom_color .';
	}
	/* ------------------ Secondary Menu widgets ------------------ */
	.secondary_menu .widget.widget_recent_entries li a:hover,
	.secondary_menu .widget.widget_recent_comments li .comment-author-link a:hover,
	.secondary_menu .widget.zozo_category_posts_widget li a:hover,
	.secondary_menu .widget.widget_categories li a:hover,
	.secondary_menu .widget.widget_archive li a:hover,
	.secondary_menu .widget.widget_meta li a:hover,
	.secondary_menu .widget.widget_nav_menu li a:hover,
	.secondary_menu .widget.widget_nav_menu li.current_page_item a,
	.secondary_menu .widget li .tweet-user-name a:hover,
	.secondary_menu .widget.zozo_popular_posts_widget .posts-title > a:hover,
	.secondary_menu .zozo-tabs-widget a:hover,
	.secondary_menu .widget.widget_pages li > a:hover {
		color: '. $custom_color .';
	}
	/* ------------- Search Form ------------- */
	.search-form .input-group-btn .btn:hover {
		background-color: '. $custom_color .';
		color: #fff;
	}
	/* ------------- Parallax Sub Title ------------- */
	.parallax-sub-title, .typo-light .parallax-sub-title {
		color: '. $custom_color .';
	}
	/* ------------- Feature Box ------------- */
	.grid-item a > .grid-title:hover,
	.typo-light .grid-item a > .grid-title:hover {
		color: '. $custom_color .';
	}
	/* Icon Color */
	.zozo-icon.icon-bordered.icon-shape,
	.zozo-icon.icon-light.icon-shape,
	.zozo-feature-box .grid-item .grid-icon-wrapper .grid-icon.icon-none,
	.zozo-feature-box .grid-item .grid-icon-wrapper .grid-icon.icon-shape.icon-transparent,
	.zozo-feature-box .grid-item .grid-icon-wrapper .grid-icon.icon-shape.icon-pattern,
	.zozo-feature-box .grid-item .grid-icon-wrapper .grid-icon.icon-shape.icon-bordered,
	.zozo-features-list-wrapper .features-list-inner .features-icon {
		color: '. $custom_color .';
	}
	.bg-style.bg-normal .zozo-icon.icon-bg.icon-shape,
	.bg-style.bg-normal .zozo-icon.icon-border-bg.icon-shape,
	.bg-style.bg-normal .zozo-icon.icon-border-bg-space.icon-shape,
	.bg-style.bg-normal .zozo-feature-box .grid-item:hover .grid-icon-wrapper.icon-hv-bg .zozo-icon,
	.bg-style.bg-normal .zozo-feature-box .grid-item:hover .grid-icon-wrapper.icon-hv-bg-br .zozo-icon,
	.bg-style.bg-normal .zozo-feature-box .grid-item:hover .grid-icon-wrapper.icon-hv-br .zozo-icon {
		color: '. $custom_color .';
	}
	/* Icon BG Color */
	.zozo-icon.icon-bg.icon-shape,
	.zozo-icon.icon-border-bg.icon-shape,
	.zozo-icon.icon-border-bg-space.icon-shape {
		background-color: '. $custom_color .';
	}
	/* Icon Bordered w/ Background Alt Style */
	.zozo-icon.icon-border-bg-space.icon-shape:after {
		box-shadow: 0 0 0 2px '. $custom_color .';
	}
	/* Icon Hover Color */
	.zozo-feature-box .grid-item:hover .grid-icon-wrapper.icon-hv-color .zozo-icon.icon-light.icon-shape,
	.zozo-feature-box .grid-item:hover .grid-icon-wrapper.icon-hv-color .grid-icon.icon-none.icon-skin-light,
	.zozo-feature-box .grid-item:hover .grid-icon-wrapper.icon-hv-color .grid-icon.icon-none.icon-skin-dark {
		color: '. $custom_color .';
	}
	/* Icon Hover Bg Color */
	.feature-box-style.style-box-with-bg .grid-item .grid-box-inner.grid-text-center:after,
	.feature-box-style.style-box-with-bg .grid-item .grid-box-inner .grid-icon:after,
	.grid-item .grid-box-inner .grid-overlay-top .grid-icon-wrapper .grid-icon:after,
	.icon-bottom-line .grid-icon-wrapper:after {
		background-color: '. $custom_color .';
	}
	/* Icon Hover border & Bg color */
	.zozo-feature-box .grid-item:hover .grid-icon-wrapper.icon-hv-bg-br .grid-icon.icon-shape.icon-bordered,
	.zozo-feature-box .grid-item:hover .grid-icon-wrapper.icon-hv-all .grid-icon.icon-shape.icon-bordered-bg {
		border-color: '. $custom_color .';
	}
	.zozo-feature-box.feature-box-style.style-overlay-box .grid-box-inner,
	.grid-item .grid-box-inner .grid-overlay-bottom {
		background-color: '. $custom_color .';
	}
	/* Icon Hover Icon & Bg Color */
	.zozo-feature-box .grid-item:hover .grid-icon-wrapper.icon-hv-bg-icon .grid-icon.icon-shape,
	.zozo-feature-box .grid-item:hover .grid-icon-wrapper.icon-hv-all .grid-icon.icon-shape {
		color: '. $custom_color .';
	}
	.zozo-feature-box .grid-item:hover .grid-icon-wrapper.icon-hv-bg-icon .grid-icon.icon-shape.icon-dark,
	.zozo-feature-box .grid-item:hover .grid-icon-wrapper.icon-hv-bg .zozo-icon.icon-dark.icon-shape,
	.zozo-feature-box .grid-item:hover .grid-icon-wrapper.icon-hv-bg-icon .grid-icon.icon-shape.icon-light,
	.zozo-feature-box .grid-item:hover .grid-icon-wrapper.icon-hv-bg-icon .grid-icon.icon-shape.icon-bordered,
	.zozo-feature-box .grid-item:hover .grid-icon-wrapper.icon-hv-all .grid-icon.icon-shape.icon-dark,
	.zozo-feature-box .grid-item:hover .grid-icon-wrapper.icon-hv-all .grid-icon.icon-shape.icon-light,
	.zozo-feature-box .grid-item:hover .grid-icon-wrapper.icon-hv-all .grid-icon.icon-shape.icon-bordered {
		background-color: '. $custom_color .';
	}
	.zozo-feature-box .grid-item:hover .grid-icon-wrapper.icon-hv-bg-icon .grid-icon.icon-shape.icon-pattern,
	.zozo-feature-box .grid-item:hover .grid-icon-wrapper.icon-hv-all .grid-icon.icon-shape.icon-pattern {
		background-color: '. $custom_color .';
	}
	.top-border-style:after {
		border-color: '. $custom_color .';
	}
	/* ------------- Progress Bar ------------- */
	.vc_progress_bar .vc_single_bar .vc_bar {
		background-color: '. $custom_color .';
	}
	/* ------------- Tabs ------------- */
	.nav-tabs > li > a:hover,
	.zozo-left-vertical .nav-tabs > li > a:hover,
	.zozo-right-vertical .nav-tabs > li > a:hover {
		background-color: '. $custom_color .';
	}
	.nav-tabs > li > a:hover,
	.zozo-left-vertical .nav-tabs > li > a:hover,
	.zozo-right-vertical .nav-tabs > li > a:hover,
	.zozo-left-vertical .nav-tabs > li.active > a,
	.zozo-right-vertical .nav-tabs > li.active > a,
	.zozo-tab-horizontal .nav-tabs > li.active a,
	.zozo-tab-horizontal .nav-tabs > li > a:hover,
	.zozo-right-vertical .nav-tabs.tabs-right > li.active > a {
		background: '. $custom_color .';
	}
	/* VC Tabs */
	.vc_tta-color-white.vc_tta-style-classic .vc_tta-tab.vc_active > a {
		border-bottom-color: '. $custom_color .'!important;
	}
	/* VC FAQ */
	.vc_toggle .vc_toggle_icon {
		background-color: '. $custom_color .';
	}
	/* ------------- Accordion ------------- */
	.zozo-accordion.zozo-accordion-default .panel-title a,
	.zozo-accordion.zozo-accordion-classic .panel-title a {
		color: '. $custom_color .';
	}
	/* ------------- Counter ------------- */
	.counter-style-1 .zozo-counter-count,
	.zozo-counter:hover .counter-icon > i {
		color: '. $custom_color .';
	}
	/* ------------- Pie chart ------------- */
	.zozo-piechart-content .circle-counter-title {
		 color: '. $custom_color .';
	}
	/* ------------- Dropcap ------------- */
	.dropcap {
		color: '. $custom_color .';
	}
	.text-hightlight {
		background-color: '. $custom_color .';
	}
	/* ------------- Service Box ------------- */
	.zozo-vc-service-box .service-box-inner .service-ribbon-text,
	.zozo-vc-service-box .service-desc {
		background-color: '. $custom_color .';
	}
	.zozo-vc-service-box:hover .service-box-inner {
		box-shadow: 0 0 7px '. $custom_color .' inset;
		-webkit-box-shadow: 0 0 7px '. $custom_color .' inset;
		-moz-box-shadow: 0 0 7px '. $custom_color .' inset;
		-ms-box-shadow: 0 0 7px '. $custom_color .' inset;
		-o-box-shadow: 0 0 7px '. $custom_color .' inset;
		border-color: '. $custom_color .';
	}
	/* ------------- Team Member ------------- */
	.team-item .team-member-name a:hover {
		color: '. $custom_color .';
	}
	.team-content {
		border-color: '. $custom_color .';
	}
	/* ------------- Testimonials ------------- */
	.testimonial-item .testimonial-content blockquote:before,
	.testimonial-item .testimonial-content blockquote:after {
		color: '. $custom_color .';
	}
	.zozo-video-controls #video-play:hover,
	.zozo-video-controls #video-play:focus {
		color: '. $custom_color .';
	}
	/* ------------- Twitter Slider ------------- */
	.zozo-twitter-slider-wrapper:before {
		background: '. $custom_color .';
	}
	/* ------------- Owl Carousel Navigation ------------- */
	.owl-carousel.owl-theme .owl-controls .owl-nav div {
	   background-color: '. $custom_color .';
	}
	/* ------------- Owl Carousel Dots ------------- */
	.owl-carousel.owl-theme .owl-controls .owl-dots .owl-dot.active span {
		background: '. $custom_color .';
	}
	/* ------------- Call To Action ------------- */
	.vc_btn3.vc_btn3-style-custom {
		background: '. $custom_color .'!important;
	}
	.vc_btn3.vc_btn3-style-custom:hover {
		background-color: rgba('. $custom_color_rgb[0] . ','. $custom_color_rgb[1] . ','. $custom_color_rgb[2] . ',0.8)!important;
	}
	.vc_icon_element-background-color-primary-bg {
		background: '. $custom_color .';
	}
	/* VC Slider */
	.vc_row .vc_images_carousel .vc_carousel-indicators .vc_active {
		border-color: '. $custom_color .';
		background: none;
	}
	.vc_row .vc_images_carousel .vc_carousel-indicators li {
		background-color: '. $custom_color .';
		border-color: '. $custom_color .';
	}
	/* ------------- Pricing Table ------------- */
	.zozo-pricing-item.active .pricing-head:after {
		background-color: '. $custom_color .';
	}
	.zozo-pricing-item .pricing-ribbon-wrapper .pricing-ribbon {
		background: '. $custom_color .'; /* Old browsers */
		background: -moz-linear-gradient(top,  '. $custom_color .' 0%, #2D87C4 100%); /* FF3.6+ */
		background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,'. $custom_color .'), color-stop(100%,#2D87C4)); /* Chrome,Safari4+ */
		background: -webkit-linear-gradient(top,  '. $custom_color .' 0%,#2D87C4 100%); /* Chrome10+,Safari5.1+ */
		background: -o-linear-gradient(top, '. $custom_color .' 0%,#2D87C4 100%); /* Opera 11.10+ */
		background: -ms-linear-gradient(top, '. $custom_color .' 0%,#2D87C4 100%); /* IE10+ */
		background: linear-gradient(to bottom, '. $custom_color .' 0%,#2D87C4 100%); /* W3C */
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="'. $custom_color .'", endColorstr="#2D87C4",GradientType=0 ); /* IE6-9 */
	}
	.zozo-pricing-table-wrapper.featured-item .pricing-box .pricing-head h4,
	.zozo-pricing-table-wrapper.featured-item .pricing-bottom .btn.btn-default {
		background-color: '. $custom_color .';
	}
	.zozo-pricing-table-wrapper.featured-item {
		border-color: '. $custom_color .';
	}
	.zozo-pricing-table-wrapper.featured-item .zozo-pricing-item .pricing-cost-wrapper {
		background-color: '. $custom_color .';
	}
	/* ------------- Portfolio ------------- */
	.portfolio-tabs.arrow-style-filter .smart-sub-menu.portfolio-sub-filter li a:hover,
	.portfolio-tabs.arrow-style-filter .smart-sub-menu.portfolio-sub-filter li a.active {
		background: '. $custom_color .';
	}
	.portfolio-tabs.transparent-filter .smart-sub-menu.portfolio-sub-filter li a:hover,
	.portfolio-tabs.transparent-filter .smart-sub-menu.portfolio-sub-filter li a.active {
		color: '. $custom_color .';
	}
	.portfolio-tabs.default-filter .smart-sub-menu.portfolio-sub-filter > li > a:after {
		background: '. $custom_color .';
	}
	.portfolio-cat > a:hover,.portfolio-cat > a:focus {
		color:'. $custom_color .';
	}
	.portfolio-overlay {
		background-color: rgba('. $custom_color_rgb[0] . ','. $custom_color_rgb[1] . ','. $custom_color_rgb[2] . ',0.8);
	}
	.style-classic .portfolio-inner-wrapper a:hover {
		color: '. $custom_color .';
	}
	.portfolio-item .overlay-content .portfolio-title a,
	.portfolio-tabs.icon_type li a.active,
	.portfolio-tabs.icon_type li a i {
		color: '. $custom_color .';
	}
	.style-list_style .portfolio-title a:hover, 
	.style-style_one .overlay-full .portfolio-title a:hover, 
	.style-style_one .overlay-full .portfolio-cat a:hover {
		color: '. $custom_color .';
	}
	.portfolio-tabs.icon_type::after,
	.style-style_two .portfolio-bottom {
		background-color: '. $custom_color .';
	}
	.portfolio-content a.classic-img-link:hover:before {
		border-color: '. $custom_color .';
		color: '. $custom_color .';
	}
	.portfolio-single .portfolio-info-title::before, .portfolio-single .portfolio-desc-title::before{
		background-color: '. $custom_color .';
	}
	.portfolio-carousel-slider .owl-prev.style-light,
	.portfolio-carousel-slider .owl-next.style-light,
	.blog-carousel-slider .owl-prev.style-light,
	.blog-carousel-slider .owl-next.style-light {
		background: '. $custom_color .';
	}
	/* ------------- Pagination & Pager ------------- */
	.pagination > li > span.current,
	.pagination > li > a:hover,
	.pagination > li > span:hover,
	.pagination > li > a:focus,
	.pagination > li > span:focus {
		background-color: '. $custom_color .';
	} 
	/* .pagination > li > a.prev,
	.pagination > li > a.next {
		background-color: '. $custom_color .';
	} */
	.pagination > li > a.prev:hover:after,
	.pagination > li > a.prev:active:after,
	.pagination > li > a.prev:focus:after,
	.pagination > li > a.next:hover:after,
	.pagination > li > a.next:active:after,
	.pagination > li > a.next:focus:after {
		background-color: '. $custom_color .';
		border-color: '. $custom_color .';
	}
	.pager li > a,
	.pager li > span {
		border-color: '. $custom_color .';
		background-color: '. $custom_color .';
	}
	/* ------------- Social Email Icon ------------- */
	.zozo-social-share-icons li a {
		background-color: transparent;
		border-color: '. $custom_color .';
	}
	.zozo-social-share-icons li.email a:hover {
		background-color: '. $custom_color .'!important;
	}
	.zozo-social-icons.soc-icon-transparent li.email a:hover,
	.zozo-social-icons.soc-icon-transparent li.email a:hover i {
		color: '. $custom_color .';
	}
	.zozo-social-icons li.email a:hover {
		background-color: '. $custom_color .';
	}
	/* Portfolio Single Social Email Icon */
	.portfolio-single .zozo-social-share-box .zozo-social-share-icons li a,
	.portfolio-single .zozo-social-share-box .zozo-social-icons.soc-icon-transparent li a,
	.portfolio-single .zozo-social-share-box .zozo-social-icons.soc-icon-transparent li a i{
		background-color: '. $custom_color .';
		border: 1px solid '. $custom_color .';
		color:#fff;
	}
	/* Addons Icon Color */
	.stats-block .aio-icon i {
		color: '. $custom_color .';
	}
	/* ------------- Blog ------------- */
	.latest-posts-layout .entry-meta .read-more > a:after {
		color: '. $custom_color .';
	}
	.grid-posts .posts-content-container,
	.latest-posts-slider .posts-content-container {
		border-color: '. $custom_color .';
	}
	.large-posts h2.entry-title a:hover,
	.large-posts h2.entry-title a:focus {
		color: '. $custom_color .';
	}
	.entry-meta a:hover,
	.entry-meta a:active,
	.entry-meta a:focus {
		color: '. $custom_color .';
	}
	.post .btn-more.read-more-link:hover, .post .btn-more.read-more-link:active, .post .btn-more.read-more-link:focus {
		color: '. $custom_color .';
	}
	.grid-layout .comments-link > a:hover {
		color: '. $custom_color .';
	}
	.post-tags > a:hover,
	.post-tags > a:active,
	.post-tags > a:focus {
		color: '. $custom_color .';
	}
	.comment-form .zozo-input-group-addon .input-group-addon {
		color: '. $custom_color .';
	}
	.comment-container span i,
	.comment-container a i {
		color: '. $custom_color .';
	}
	#respond.comment-respond .form-submit input[type="submit"] {
		border-color: '. $custom_color .';
		background-color: '. $custom_color .';
	}
	.post blockquote:after {
		background: '. $custom_color .';
	}
	article.post .post-inner-wrapper .post-featured-image a:after,
	.latest-posts-slider .post-featured-image a:after,
	.related-post-item .entry-thumbnail .post-img:after,
	.epl-listing-post .property-box .epl-blog-image:after {
		background-color: rgba('. $custom_color_rgb[0] . ','. $custom_color_rgb[1] . ','. $custom_color_rgb[2] . ',0.8);
	}
	/* Blog List */
	.entry-title a:hover,
	.related-content-wrapper h5 .post-link:hover {
		color: '. $custom_color .';
	}
	/*widget*/
	.tagcloud a {
		background-color: '. $custom_color .';
	}
	.latest-posts-menu .entry-date i {
		color: '. $custom_color .';
	}
	.zozo-tabs-widget .tabs .zozo-tab-content a:hover {
		color: '. $custom_color .';
	}
	.footer-widgets .widget a:hover {
		color: '. $custom_color .';
	}
	.widget .menu-services-menu-container ul li a:hover,
	.widget .menu-services-menu-container ul li.current-menu-item a,
	.widget .menu-services-menu-container ul li.current-menu-item a:hover {
		background-color: '. $custom_color .';
	}
	/* Futured Images Slider */
	.featured-caption .featured-caption-inner .featured-post-title a:hover {
		color: '. $custom_color .';
	}
	/* ------------- Audio & Video Player ------------- */
	.zozo-client-grid img:hover {
		border-color: '. $custom_color .';
	}
	/* Time Table */
	.time-table .table > thead {
		background-color:'. $custom_color .';
	}
	/* ------------- Contact Form ------------- */
	.zozo-input-group-addon .input-group-addon {
		color: '. $custom_color .';
	}
	/* ------------- Contact Us ------------- */
	.contact-info-inner h4.contact-widget-title {
		color: '. $custom_color .';
	}
	.contact-info-inner h5 a {
		color: '. $custom_color .';
	}
	.zozo-social-icons.social-style-background li a,
	.contact-info-style2 h6 {
		background: '. $custom_color .';
	}
	/* ------------- Footer ------------- */
	.footer-widgets-section .flickr_photo_item a:after {
		background:'. $custom_color .';
	}
	.footer-backtotop a:hover,
	.footer-backtotop a:focus,
	.footer-backtotop a:active {
		background: '. $custom_color .';
	}
	/*Dark*/
	.footer-section.footer-skin-dark .widget.widget_recent_entries li a:hover,
	.footer-section.footer-skin-dark .widget.widget_recent_comments li .comment-author-link a:hover,
	.footer-section.footer-skin-dark .widget.zozo_category_posts_widget li a:hover,
	.footer-section.footer-skin-dark .widget.widget_categories li a:hover,
	.footer-section.footer-skin-dark .widget.widget_archive li a:hover,
	.footer-section.footer-skin-dark .widget.widget_meta li a:hover,
	.footer-section.footer-skin-dark .widget.widget_nav_menu li a:hover,
	.footer-section.footer-skin-dark .widget.widget_nav_menu li.current_page_item a,
	.footer-section.footer-skin-dark .widget li .tweet-user-name a:hover,
	.footer-section.footer-skin-dark .widget.zozo_popular_posts_widget .posts-title > a:hover,
	.footer-section.footer-skin-dark .zozo-tabs-widget a:hover,
	.footer-section.footer-skin-dark .widget.widget_pages li > a:hover {
		color: '. $custom_color .';
	}
	/* ------------- Responsive Video Section ------------- */
	.video-bg .mb_YTVTime {
		background:'. $custom_color .';
	}
	.zozo-vc-modal-overlay-close {
		background: '. $custom_color .';
	}
	/* ------------- Woocommerce ------------- */
	.woocommerce ul.products li.product:after,
	.woocommerce-page ul.products li.product:after {
		background: '. $custom_color .';
	}
	.woocommerce ul.products li.product:hover .product-buttons-overlay {
		background: rgba('. $custom_color_rgb[0] . ','. $custom_color_rgb[1] . ','. $custom_color_rgb[2] . ',0.8);
	}
	.product .product-img-box {
		border-color: '. $custom_color .';
	}
	.woo-cart-item .remove-cart-item:hover {
		color: '. $custom_color .';
	}
	.woocommerce ul.products li.product h3 > a:hover {
		color: '. $custom_color .';
	}
	.woo-dropdown > li strong:hover {
		color: '. $custom_color .';
	}
	.woocommerce .price > .amount,
	.woocommerce-page .price > .amount,
	.price ins > .amount {
		color: '. $custom_color .';
	}
	.woocommerce nav.woocommerce-pagination ul li a:hover,
	.woocommerce nav.woocommerce-pagination ul li span.page-numbers.current {
		background-color: '. $custom_color .';
	}
	.woocommerce span.onsale::before {
		border-color: transparent '. $custom_color .' transparent transparent;
	}
	/*.woocommerce #content input.button:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce-page #content input.button:hover, .woocommerce-page #respond input#submit:hover, .woocommerce-page a.button:hover, .woocommerce-page button.button:hover, .woocommerce-page input.button:hover {
		background: '. $custom_color .';
	}*/
	.woocommerce #respond input#submit:hover,
	.woocommerce a.button:hover,
	.woocommerce button.button:hover,
	.woocommerce input.button:hover {
		background: '. $custom_color .';
	}
	.wpb_row .wpb_column .wpb_wrapper .wcmp-product .wcmp-product-desc h2:hover,
	.wpb_row .wpb_column .wpb_wrapper .wcmp-product .wcmp-product-desc h2:focus {
		color: '. $custom_color .';
	}
	/* ------------- Woocommerce Single ------------- */
	.woocommerce #reviews .comment-text p.meta strong,
	.woocommerce-page #reviews .comment-text p.meta strong {
		color: '. $custom_color .';
	}
	.order-total span.amount {
		color: '. $custom_color .';
	}
	/* ------------- Woocommerce Tabs ------------- */
	.woocommerce #content div.product .woocommerce-tabs ul.tabs li:hover,
	.woocommerce div.product .woocommerce-tabs ul.tabs li:hover,
	.woocommerce-page #content div.product-box-wrapper .woocommerce-tabs ul.tabs li:hover,
	.woocommerce-page div.product .woocommerce-tabs ul.tabs li:hover,
	.woocommerce #content div.product .woocommerce-tabs ul.tabs li.active, .woocommerce div.product .woocommerce-tabs ul.tabs li.active, .woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active, .woocommerce-page div.product .woocommerce-tabs ul.tabs li.active {
		border-bottom-color: '. $custom_color .';
	}
	.woocommerce #review_form #respond .form-submit input:hover,
	.woocommerce #review_form #respond .form-submit input:active,
	.woocommerce #review_form #respond .form-submit input:focus,
	.woocommerce-page #review_form #respond .form-submit input:hover,
	.woocommerce-page #review_form #respond .form-submit input:active,
	.woocommerce-page #review_form #respond .form-submit input:focus {
		background: '. $custom_color .';
	}
	/* ------------- Woocommerce Buttons ------------- */
	.woocommerce #content input.button.alt,
	.woocommerce #respond input#submit.alt,
	.woocommerce a.button.alt,
	.woocommerce button.button.alt,
	.woocommerce input.button.alt,
	.woocommerce-page #content input.button.alt,
	.woocommerce-page #respond input#submit.alt,
	.woocommerce-page a.button.alt,
	.woocommerce-page button.button.alt,
	.woocommerce-page input.button.alt {
		background: '. $custom_color .';
		border-color: '. $custom_color .';
	}
	.woocommerce #content input.button,
	.woocommerce #respond input#submit,
	.woocommerce a.button,
	.woocommerce button.button,
	.woocommerce input.button,
	.woocommerce-page #content input.button,
	.woocommerce-page #respond input#submit,
	.woocommerce-page a.button,
	.woocommerce-page button.button,
	.woocommerce-page input.button {
		background: '. $custom_color .';
		border-color: '. $custom_color .';
	}
	.woocommerce #content input.button.alt:hover,
	.woocommerce #respond input#submit.alt:hover,
	.woocommerce a.button.alt:hover,
	.woocommerce button.button.alt:hover,
	.woocommerce input.button.alt:hover,
	.woocommerce-page #content input.button.alt:hover,
	.woocommerce-page #respond input#submit.alt:hover,
	.woocommerce-page a.button.alt:hover,
	.woocommerce-page button.button.alt:hover,
	.woocommerce-page input.button.alt:hover,
	.woocommerce #content input.button:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce-page #content input.button:hover, .woocommerce-page #respond input#submit:hover, .woocommerce-page a.button:hover, .woocommerce-page button.button:hover, .woocommerce-page input.button:hover {
		background-color: rgba('. $custom_color_rgb[0] . ','. $custom_color_rgb[1] . ','. $custom_color_rgb[2] . ',0.8);
		box-shadow:0 5px 11px 0 rgba(0, 0, 0, 0.18), 0 4px 15px 0 rgba(0, 0, 0, 0.15);
		-webkit-0 5px 11px 0 rgba(0, 0, 0, 0.18), 0 4px 15px 0 rgba(0, 0, 0, 0.15);
		-moz-0 5px 11px 0 rgba(0, 0, 0, 0.18), 0 4px 15px 0 rgba(0, 0, 0, 0.15);
		-ms-0 5px 11px 0 rgba(0, 0, 0, 0.18), 0 4px 15px 0 rgba(0, 0, 0, 0.15);
		-o-0 5px 11px 0 rgba(0, 0, 0, 0.18), 0 4px 15px 0 rgba(0, 0, 0, 0.15);
	}
	.woocommerce #content div.product form.cart .button,
	.woocommerce div.product form.cart .button,
	.woocommerce-page #content div.product form.cart .button,
	.woocommerce-page div.product form.cart .button {
		background: '. $custom_color .';
	}
	/*.woocommerce #respond input#submit.alt.disabled, .woocommerce #respond input#submit.alt.disabled:hover, .woocommerce #respond input#submit.alt:disabled, .woocommerce #respond input#submit.alt:disabled:hover, .woocommerce #respond input#submit.alt[disabled]:disabled, .woocommerce #respond input#submit.alt[disabled]:disabled:hover, .woocommerce a.button.alt.disabled, .woocommerce a.button.alt.disabled:hover, .woocommerce a.button.alt:disabled, .woocommerce a.button.alt:disabled:hover, .woocommerce a.button.alt[disabled]:disabled, .woocommerce a.button.alt[disabled]:disabled:hover, .woocommerce button.button.alt.disabled, .woocommerce button.button.alt.disabled:hover, .woocommerce button.button.alt:disabled, .woocommerce button.button.alt:disabled:hover, .woocommerce button.button.alt[disabled]:disabled, .woocommerce button.button.alt[disabled]:disabled:hover, .woocommerce input.button.alt.disabled, .woocommerce input.button.alt.disabled:hover, .woocommerce input.button.alt:disabled, .woocommerce input.button.alt:disabled:hover, .woocommerce input.button.alt[disabled]:disabled, .woocommerce input.button.alt[disabled]:disabled:hover {
		background: '. $custom_color .';
		border-color: '. $custom_color .';
	}*/
	.woocommerce .woocommerce-error .button,
	.woocommerce .woocommerce-info .button,
	.woocommerce .woocommerce-message .button {
		background: '. $custom_color .';
	}
	/* Woocommerce Cart */
	.shop_table.cart td.product-name > a:hover,
	.shop_table.cart td.product-price .amount,
	.shop_table.cart td.product-subtotal .amount {
		color: '. $custom_color .';
	}
	.woocommerce .cart-collaterals .cart_totals table tr.order-total td .amount,
	.woocommerce-page .cart-collaterals .cart_totals table tr.order-total td .amount {
		color: '. $custom_color .';
	}
	.zozo-woocommerce-thank-you .thank-you-text {
		color: '. $custom_color .';
	}
	/* Latest Product Slider */
	.woo-latest-slider-item .product-buttons-overlay .product-buttons a:after {
		color: '. $custom_color .';
	}
	.zozo-woo-latest-slider .woo-latest-product-content {
		border-color: '. $custom_color .';
	}
	/* ------------- Woocommerce Widgets ------------- */
	/* Filter By Price */
	.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
	.woocommerce-page .widget_price_filter .ui-slider .ui-slider-handle {
		border-bottom-color: '. $custom_color .';
	}
	.woocommerce .widget_price_filter .ui-slider-horizontal .ui-slider-range,
	.woocommerce-page .widget_price_filter .ui-slider-horizontal .ui-slider-range {
		background: '. $custom_color .';
	}
	/* Product Category */
	.product_list_widget .amount,
	.woocommerce ul.product_list_widget li a:hover,
	.sidebar .product-categories li:hover a {
		color: '. $custom_color .';
	}
	.sidebar .product-categories li:hover .count {
		background:'. $custom_color .';
	}
	.woocommerce .product-categories .current-cat > span,
	.theme-skin-dark .woocommerce .product-categories .current-cat > span {
		background:'. $custom_color .';
	}
	.woocommerce .product-categories .current-cat > a,
	.theme-skin-dark .woocommerce .product-categories .current-cat > a {
		color: '. $custom_color .';
	}
	.widget.widget_recent_entries li a:hover,
	.widget.widget_recent_comments li a:hover,
	.widget.zozo_category_posts_widget li a:hover,
	.widget.widget_categories li a:hover,
	.widget.widget_archive li a:hover,
	.widget.widget_meta li a:hover,
	.widget.widget_nav_menu li a:hover,
	.widget.widget_edd_categories_tags_widget li a:hover {
		color:'. $custom_color .';
	}
	/* Twitter */
	.widget .tweet-item h5:before {
		background:'. $custom_color .';
	}
	/* Footer */
	.footer-copyright-section .zozo-social-icons.soc-icon-transparent i:hover {
		color: '. $custom_color .';
	}
	/* Widgets */
	.secondary_menu .widget_nav_menu ul li.menu-item > a:hover,
	.secondary_menu .widget_nav_menu ul li.menu-item > a:active,
	.secondary_menu .widget_nav_menu ul li.menu-item > a:focus {
		color: '. $custom_color .';
	}
	/* ================================================================
	 * BACK TO TOP
	 * ================================================================ */
	#zozo-backtotop {
		background: '. $custom_color .';
	}
	#zozo-backtotop:hover {
		background: '. $custom_color .';
		background-color: rgba('. $custom_color_rgb[0] . ','. $custom_color_rgb[1] . ','. $custom_color_rgb[2] . ',0.8);
	}	
	/* --------------Selection Color-------------- */
	::-moz-selection {
		background:'. $custom_color .';
		color: #fff;
	}
	::selection {
		background:'. $custom_color .';
		color: #fff;
	}
	::-webkit-selection {
		background:'. $custom_color .';
		color: #fff;
	}
	/* -------------- Revolution Slider ------------- */
	.zozo-revslider-section span {
		color: '. $custom_color .';
	}
	.typo-light .text-color,
	.typo-dark .text-color,
	.text-color {
		color: '. $custom_color .';
	}
	.theme-bg-color {
		background: '. $custom_color .';
	}
	.zozo-revslider-section .tp-bullets.simplebullets.round .bullet {
		border-color: '. $custom_color .';
	}
	.zozo-revslider-section .tp-bullets.simplebullets.round .bullet.selected {
		background: '. $custom_color .';
	}
	.zozo-revslider-section .tp-button {
		border-color: '. $custom_color .'; 
		background: '. $custom_color .';	
	}
	.zozo-revslider-section .tp-button:hover {
		color: '. $custom_color .';
	}
	.zozo-revslider-section .tp-bannertimer {
		background: '. $custom_color .';
	}
	/* -------------- BuddyPress ------------- */
	#buddypress .comment-reply-link,
	#buddypress a.button,
	#buddypress button,
	#buddypress div.generic-button a,
	#buddypress input[type="button"],
	#buddypress input[type="reset"],
	#buddypress input[type="submit"],
	#buddypress ul.button-nav li a,
	a.bp-title-button {
		background: '. $custom_color .';
	}
	#buddypress div.item-list-tabs ul li.current a,
	#buddypress div.item-list-tabs ul li.selected a,
	#buddypress div.item-list-tabs ul li a:hover,
	#buddypress div.item-list-tabs ul li a:focus,
	#buddypress div.item-list-tabs ul li a:active {
		background: '. $custom_color .';
	}
	#buddypress div.activity-meta a {
		background: '. $custom_color .';
	}
	#buddypress div.activity-meta a:hover,
	#buddypress div.activity-meta a:focus,
	#buddypress div.activity-meta a:active,
	#buddypress div.item-list-tabs ul li.current a:hover,
	#buddypress div.item-list-tabs ul li.current a:focus,
	#buddypress div.item-list-tabs ul li.current a:active,
	#buddypress div.item-list-tabs ul li.selected a:hover,
	#buddypress div.item-list-tabs ul li.selected a:focus,
	#buddypress div.item-list-tabs ul li.selected a:active,
	#buddypress .comment-reply-link:hover,
	#buddypress a.button:focus,
	#buddypress a.button:hover,
	#buddypress button:hover,
	#buddypress div.generic-button a:hover,
	#buddypress input[type="button"]:hover,
	#buddypress input[type="reset"]:hover,
	#buddypress input[type="submit"]:hover,
	#buddypress ul.button-nav li a:hover,
	#buddypress ul.button-nav li.current a {
		background-color: rgba('. $custom_color_rgb[0] . ','. $custom_color_rgb[1] . ','. $custom_color_rgb[2] . ',0.8);
	}
	/* BB PRESS */
	.bbp-pagination-links a:hover,
	.bbp-pagination-links span.current {
		background: '. $custom_color .';
		border-color: '. $custom_color .';
	}
	/* -------------- Events Calendar ------------- */
	#tribe-events .tribe-events-button,
	.tribe-events-button,
	#tribe-bar-form .tribe-bar-submit input[type="submit"] {
		background-color: '. $custom_color .';
		border-color: '. $custom_color .';
	}
	#tribe-bar-views .tribe-bar-views-list .tribe-bar-views-option a:hover {
		color: '. $custom_color .';
	}
	.tribe-events-list .tribe-events-event-cost span {
		background-color: '. $custom_color .';
		border-color: '. $custom_color .';
	}
	#tribe-events-content .tribe-events-tooltip h4,
	#tribe_events_filters_wrapper .tribe_events_slider_val,
	.single-tribe_events a.tribe-events-gcal,
	.single-tribe_events a.tribe-events-ical {
		color: '. $custom_color .';
	}
	.single-tribe_events .tribe-events-schedule .tribe-events-cost {
		color: '. $custom_color .';
	}
	#tribe-events .tribe-events-button,
	#tribe-events .tribe-events-button:hover,
	#tribe_events_filters_wrapper input[type="submit"],
	.tribe-events-button,
	.tribe-events-button.tribe-active:hover,
	.tribe-events-button.tribe-inactive,
	.tribe-events-button:hover,
	.tribe-events-calendar td.tribe-events-present div[id*="tribe-events-daynum-"],
	.tribe-events-calendar td.tribe-events-present div[id*="tribe-events-daynum-"] > a {
		background-color: '. $custom_color .';
	}
	h2.tribe-events-page-title a:focus,
	h2.tribe-events-page-title a:hover,
	.tribe-events-list .type-tribe_events h2 a:hover,
	.tribe-events-list-event-title.entry-title.summary a:hover,
	.widget .tribe-events-list-widget-events h4.entry-title a:hover {
		color: '. $custom_color .';
	}
	/* Blog Icon */
	article.post .post-inner-wrapper .post-featured-image a:before,
	.related-post-item .entry-thumbnail .post-img:before,
	.epl-listing-post .property-box .epl-blog-image:before {
		background-color: '. $custom_color .';
	}
	.comment-container a:hover {
		color: '. $custom_color .';
	}
	/* Admin Page */
	.zozo-social-share-box .author-social li a,
	.zozo-social-share-box .author-social li a:hover,
	.zozo-social-share-box .author-social li a:focus,
	.zozo-social-share-box .author-social li a.active {
		background-color: '. $custom_color .';
	}
	.author-name a:hover {
		color: '. $custom_color .';
	}
	/* -------------- Plugins ------------- */
	/* Easy Listing Properties */
	ul.epl-author-tabs li.epl-author-current,
	ul.property_search-tabs li.epl-sb-current,
	li.tbhead.current {
		background-color: '. $custom_color .';
	}
	.tab-title:after,
	.epl-property-blog .price h5 {
		background-color: '. $custom_color .';
	}
	.epl-switching-sorting-wrap .epl-switch-view li.epl-current-view {
		background-color: '. $custom_color .';
	}
	.epl-property-single .status-sticker.under-offer:hover,
	.epl-property-blog .status-sticker.under-offer:hover,
	.epl-property-single .status-sticker:hover,
	.epl-property-blog .status-sticker:hover {
		background: '. $custom_color .';
	}
	.property-details-wrapper,
	.property-gallery-wrapper {
		background: '. $custom_color .';
	}
	.footer-skin-dark .widget_epl_recent_property .property-heading a:hover,
	.footer-skin-dark .widget_epl_recent_property .property-heading a:focus,
	.widget_epl_recent_property .property-heading a:hover,
	.widget_epl_recent_property .property-heading a:focus,
	.widget.widget_epl_recent_property input[type="submit"]:hover,
	.epl-play-btn:hover:after,
	.home-open-wrapper li a:hover,
	.home-open-wrapper li a:after,
	.property-features-list > li a:hover,
	.property-features-list > li a:after,
	.property-features-list > li a:hover,
	.property-features-list > li a:focus {
		color: '. $custom_color .';
	}
	.epl-button,
	.epl-button:hover,
	.epl-button:focus {
		background: '. $custom_color .';
	}
	.epl-author-title.author-title a:hover,
	.epl-author-title.author-title a:focus {
		color: '. $custom_color .';
	}
	/* Restaurent Reservation */
	.picker--focused .picker__day--highlighted,
	.picker__day--highlighted:hover,
	.picker__day--infocus:hover,
	.picker__day--outfocus:hover,
	.picker__wrap .picker--focused .picker__day--selected,
	.picker__wrap .picker__day--selected,
	.picker__wrap .picker__day--selected:hover,
	.picker__wrap .picker--focused .picker__day--selected,
	.picker__wrap .picker__day--selected,
	.picker__wrap .picker__day--selected:hover {
		background: '. $custom_color .' !important;
	}
	.picker__wrap .picker--focused .picker__day--highlighted,
	.picker__wrap .picker__day--highlighted:hover,
	.picker__wrap .picker__day--infocus:hover,
	.picker__wrap .picker__day--outfocus:hover {
		background-color: rgba('. $custom_color_rgb[0] . ','. $custom_color_rgb[1] . ','. $custom_color_rgb[2] . ',0.8);
	}
	.picker__wrap .picker__box .picker__button--clear:focus,
	.picker__wrap .picker__box .picker__button--clear:hover,
	.picker__wrap .picker__box .picker__button--close:focus,
	.picker__wrap .picker__box .picker__button--close:hover,
	.picker__wrap .picker__box .picker__button--today:focus,
	.picker__wrap .picker__box .picker__button--today:hover {
		background: '. $custom_color .';
		border-color: '. $custom_color .';
	}
	.picker__wrap .picker__box .picker__list-item--highlighted,
	.picker__list-item:hover,
	.picker__wrap .picker__box .picker--focused .picker__list-item--highlighted,
	.picker__wrap .picker__box .picker__list-item--highlighted:hover,
	.picker__wrap .picker__box .picker__list-item:hover {
		background: '. $custom_color .';
		border-color: '. $custom_color .';
	}
	.reservation .rtb-text .picker__input.picker__input--active {
		border-color: '. $custom_color .';
	}
	/* SportsPress */
	/*.sp-scrollable-table-wrapper thead tr th{
		color: '. $custom_color .';
	}
	.sp-template-event-blocks .sp-event-blocks h4.sp-event-title a:hover, .sp-data-table tbody a:hover, .sp-player-list-link.sp-view-all-link:hover, .type-page .sp-template.sp-template-countdown h5 a:hover, .type-page .sp-template.sp-template-countdown h3 a:hover{
		color: '. $custom_color .';
	}
	.typo-light .sp-template-event-blocks .sp-event-blocks h4.sp-event-title a{
		color: '. $custom_color .';
	}*/
	/* SportsPress */
	.sp-data-table thead {
		background: '. $custom_color .';
	}
	.bg-skin-dark table.sp-data-table td a:hover,
	.typo-light table.sp-data-table td a:hover {
		color: '. $custom_color .';
	}
	/* Easy Digial Download */
	.edd-submit.button.blue,
	.edd-submit.button.blue:hover,
	.edd-submit.button.blue:focus {
		background: '. $custom_color .';
	}
	.edd_price_option_price,
	.widget.widget_edd_cart_widget .edd-cart-meta.edd_subtotal span,
	.widget.widget_edd_cart_widget .edd-cart-meta.edd_total span {
		color: '. $custom_color .';
	}
	.widget.widget_edd_cart_widget .cart_item.edd_checkout > a,
	.widget.widget_edd_cart_widget .edd-cart-quantity {
		background: '. $custom_color .';
	}
	.edd_download_file .edd_download_file_link:hover {
		color: '. $custom_color .';
	}
	.single-download .edd_price span,
	.edd_download .edd_price {
		color: '. $custom_color .';
	}
	.edd-cart-added-alert {
		border-color: '. $custom_color .';
	}
	#edd_discounts_list .edd_discount:hover:before {
		background: '. $custom_color .';
	}
	/* Ultimate Visual Composer */
	.uvc-type-wrap .ultimate-typed-main,
	.uvc-heading-spacer .aio-icon {
		color: '. $custom_color .';
	}
	.smile-icon-timeline-wrap .timeline-separator-text .sep-text,
	.smile-icon-timeline-wrap .timeline-wrapper .timeline-dot,
	.timeline-feature-item .timeline-dot,
	.smile-icon-timeline-wrap .timeline-line z {
		background: '. $custom_color .';
	}
	.ultimate-vticker.ticker,
	.ultimate-vticker.ticker-down {
		color: '. $custom_color .';
	}
	/* Ultimate Addon Pricing */
	.ult_pricing_table_wrap.ult_design_4.ult-cs-yellow .ult_pricing_table {
		border-top-color: '. $custom_color .';
	}
	.ult_pricing_table_wrap.ult_design_1.ult-cs-yellow .ult_pricing_table,
	.ult_pricing_table_wrap.ult_design_1.ult-cs-yellow .ult_pricing_table .ult_price_link .ult_price_action_button,
	.ult_pricing_table_wrap.ult_design_4.ult-cs-yellow .ult_pricing_table .ult_price_link .ult_price_action_button {
		background: '. $custom_color .';
	}
	.ult-carousel-wrapper .slick-next,
	.ult-carousel-wrapper .slick-prev,
	.ult-carousel-wrapper .slick-next:hover,
	.ult-carousel-wrapper .slick-prev:hover,
	.ult-carousel-wrapper .slick-next:focus,
	.ult-carousel-wrapper .slick-prev:focus {
		color: '. $custom_color .';
	}
	.ult_pricing_table_wrap.ult-cs-custom .ult_pricing_table .ult_price_link .ult_price_action_button {
		background: '. $custom_color .';
	}
	.ult_pricing_table_wrap.ult-cs-custom .ult_pricing_table .ult_price_body_block,
	.ult_pricing_table_wrap.ult-cs-custom .ult_pricing_table .ult_pricing_heading {
		background: '. $custom_color .';
	}
	.ult_pricing_table_wrap.ult-cs-custom.ult_design_4 .ult_pricing_table .ult_price_link .ult_price_action_button {
		background: '. $custom_color .';
	}
	/* VC Post Grid */
	.vc_custom_heading.vc_gitem-post-data.vc_gitem-post-data-source-post_date > div {
		color: '. $custom_color .';
	}
	/* List Item */
	.hexagon li.icon_list_item .icon_list_icon {
		background: '. $custom_color .';
		border-color: '. $custom_color .';
	}
	.sitemap-wrapper ul li a:hover,
	.sitemap-wrapper ul li a:active,
	.sitemap-wrapper ul li a:focus {
		color: '. $custom_color .';
	}
	/* WPSL */
	.wpsl-search {
		background: '. $custom_color .';
	}
	#wpsl-search-wrap .wpsl-dropdown div {
		border-color: '. $custom_color .';
	}
	/* ================================================================
	 * Widget
	 * ================================================================ */
	/* Services menu */
	.menu-service-menu-container li a:hover,
	.menu-service-menu-container li a:focus,
	.menu-service-menu-container li a.active {
		background: '. $custom_color .';
	}
	/* ---------- MAX 767px ---------- */
	@media only screen and (max-width:767px) {
		.zozo-isotope-filters .zozo-smartmenu.portfolio-tabs .smart-sub-menu.portfolio-sub-filter > li > a:hover,
		.zozo-isotope-filters .zozo-smartmenu.portfolio-tabs .smart-sub-menu.portfolio-sub-filter > li > a.active{
			background: '. $custom_color .';
		}
	}'; 
}

$custom_color_skin_hover = aven_zozo_get_theme_option( 'zozo_custom_color_skin' );
if( isset( $custom_color_skin_hover['regular'] ) && $custom_color_skin_hover['regular'] != '' ) {
	echo '.btn,.btn.btn-default,input[type="submit"],button[type="submit"],.tagcloud a,.vc_general.vc_btn3.vc_btn3-style-default,.vc_general.vc_btn3.vc_btn3-color-primary-bg,.vc_btn.vc_btn-primary-bg,.vc_general.vc_btn3.vc_btn3-color-juicy-pink,.wpcf7 input[type="submit"],.pager li > a,.pager li > span,.owl-carousel.owl-theme .owl-controls .owl-nav div,#zozo-backtotop { background: '. $custom_color_skin_hover['regular'] .'}';
}
if( isset( $custom_color_skin_hover['hover'] ) && $custom_color_skin_hover['hover'] != '' ) {
	echo '.btn:hover, .btn:focus, input[type="submit"]:hover, input[type="submit"]:focus, .tagcloud a:hover, .tagcloud a:focus, .vc_general.vc_btn3.vc_btn3-style-default:hover, .vc_general.vc_btn3.vc_btn3-style-default:focus, .vc_general.vc_btn3.vc_btn3-style-default:active, .vc_general.vc_btn3.vc_btn3-color-primary-bg:hover, .vc_general.vc_btn3.vc_btn3-color-primary-bg:focus, .vc_general.vc_btn3.vc_btn3-color-primary-bg:active, .vc_btn.vc_btn-primary-bg:hover, .vc_btn.vc_btn-primary-bg:focus, .vc_btn.vc_btn-primary-bg:active, .vc_general.vc_btn3.vc_btn3-color-juicy-pink:hover, .vc_general.vc_btn3.vc_btn3-color-juicy-pink:focus, .vc_general.vc_btn3.vc_btn3-color-juicy-pink:active, .wpcf7 input[type="submit"]:hover, .wpcf7 input[type="submit"]:focus, .pager li > a:hover, .pager li > span:hover, .pager li > a:focus, .pager li > span:focus, .owl-carousel.owl-theme .owl-controls .owl-nav div:hover,.search-form .input-group-btn .btn:hover,.widget .menu-services-menu-container ul li a:hover, .widget .menu-services-menu-container ul li.current-menu-item a, .widget .menu-services-menu-container ul li.current-menu-item a:hover,#zozo-backtotop:hover { background: '. $custom_color_skin_hover['hover'] . '; }' . "\n";
}


// Link Color
$link_color_opt = aven_zozo_get_theme_option( 'zozo_link_color' );
if( isset( $link_color_opt['regular'] ) && $link_color_opt['regular'] != '' ) {
	echo '.btn,.btn.btn-default,input[type="submit"],button[type="submit"],.tagcloud a,.vc_general.vc_btn3.vc_btn3-style-default,.vc_general.vc_btn3.vc_btn3-color-primary-bg,.vc_btn.vc_btn-primary-bg,.vc_general.vc_btn3.vc_btn3-color-juicy-pink,.wpcf7 input[type="submit"],.pager li > a,.pager li > span,.owl-carousel.owl-theme .owl-controls .owl-nav div,#zozo-backtotop { color: '. $link_color_opt['regular'] . '; }' . "\n";
}

if( isset( $link_color_opt['hover'] ) && $link_color_opt['hover'] != '' ) {
	echo '.btn:hover, .btn:focus, .btn.btn-default:hover, .btn.btn-default:focus, input[type="submit"]:hover, input[type="submit"]:focus, button[type="submit"]:hover, button[type="submit"]:focus, .btn-modal.btn-primary:hover, .btn-modal.btn-primary:active, .btn-modal.btn-primary:focus, .tagcloud a:hover, .tagcloud a:focus, .vc_general.vc_btn3.vc_btn3-style-default:hover, .vc_general.vc_btn3.vc_btn3-style-default:focus, .vc_general.vc_btn3.vc_btn3-style-default:active, .vc_general.vc_btn3.vc_btn3-color-primary-bg:hover, .vc_general.vc_btn3.vc_btn3-color-primary-bg:focus, .vc_general.vc_btn3.vc_btn3-color-primary-bg:active, .vc_btn.vc_btn-primary-bg:hover, .vc_btn.vc_btn-primary-bg:focus, .vc_btn.vc_btn-primary-bg:active, .vc_general.vc_btn3.vc_btn3-color-juicy-pink:hover, .vc_general.vc_btn3.vc_btn3-color-juicy-pink:focus, .vc_general.vc_btn3.vc_btn3-color-juicy-pink:active, .wpcf7 input[type="submit"]:hover, .wpcf7 input[type="submit"]:focus, .pager li > a:hover, .pager li > span:hover, .pager li > a:focus, .pager li > span:focus, .owl-carousel.owl-theme .owl-controls .owl-nav div:hover,.search-form .input-group-btn .btn:hover,.widget .menu-services-menu-container ul li a:hover, .widget .menu-services-menu-container ul li.current-menu-item a, .widget .menu-services-menu-container ul li.current-menu-item a:hover,#zozo-backtotop:hover { color: '. $link_color_opt['hover'] . '; }' . "\n";
}

// Body Stylings 
$body_font_styles = '';
$body_font_opt = aven_zozo_get_theme_option( 'zozo_body_font' );
if( $body_font_opt  ) {
	$body_font_styles .= 'font-family: '. $body_font_opt['font-family'] .';';
	$body_font_styles .= 'font-size: '. $body_font_opt['font-size'] .';';
	if( isset( $body_font_opt['font-style'] ) && $body_font_opt['font-style'] != '' ) {
		$body_font_styles .= 'font-style: '. $body_font_opt['font-style'] .';';
	}
	if( isset( $body_font_opt['font-weight'] ) && $body_font_opt['font-weight'] != '' ) {
		$body_font_styles .= 'font-weight: '. $body_font_opt['font-weight'] .';';
	}
	$body_font_styles .= 'color: '. $body_font_opt['color'] .';';
	$body_font_styles .= 'line-height: '. $body_font_opt['line-height'] .';';
}

if( $body_font_styles ) {
	echo 'body { '. $body_font_styles . ' }' . "\n";
	echo '.ui-widget, .vc_tta-accordion .vc_tta-panel-title { '. $body_font_styles . ' }' . "\n";
}

// Header Top Bar Stylings
$header_top_bg_styles = '';				
$header_top_bg_opt = aven_zozo_get_theme_option( 'zozo_header_top_background_color' );
if( isset( $header_top_bg_opt ) && $header_top_bg_opt != '' ) {
	$header_top_bg_styles .= 'background-color: '. $header_top_bg_opt .';';
}
if( $header_top_bg_styles ) {
	echo '.header-section .header-top-section { '. $header_top_bg_styles . ' }' . "\n";
}

// Sliding Bar Stylings
$sliding_bg_opt = aven_zozo_get_theme_option( 'zozo_sliding_background_color' );
if( isset( $sliding_bg_opt ) && $sliding_bg_opt != '' ) {
	echo '.slidingbar-toggle-wrapper a { border-top-color: '. $sliding_bg_opt .'; }' . "\n";
	echo '.sliding-bar-section .slidingbar-inner { background-color: '. $sliding_bg_opt .'; }' . "\n";
}

// Header Stylings
$header_styles = '';

$header_spacing_opt = aven_zozo_get_theme_option( 'zozo_header_spacing' );
// Header Spacing
if( isset( $header_spacing_opt['padding-top'] ) && $header_spacing_opt['padding-top'] != '' ) {
	$header_styles .= 'padding-top: '. $header_spacing_opt['padding-top'] .';';
}			
if( isset( $header_spacing_opt['padding-bottom'] ) && $header_spacing_opt['padding-bottom'] != '' ) {
	$header_styles .= 'padding-bottom: '. $header_spacing_opt['padding-bottom'] .';';
}			
if( isset( $header_spacing_opt['padding-left'] ) && $header_spacing_opt['padding-left'] != '' ) {
	$header_styles .= 'padding-left: '. $header_spacing_opt['padding-left'] .';';
}			
if( isset( $header_spacing_opt['padding-right'] ) && $header_spacing_opt['padding-right'] != '' ) {
	$header_styles .= 'padding-right: '. $header_spacing_opt['padding-right'] .';';			
}			

if( $header_styles ) {
	echo '#zozo_wrapper #header { '. $header_styles . ' }' . "\n";
}

// Sticky Background Stylings
$sticky_styles = '';

$sticky_bg_opt = aven_zozo_get_theme_option( 'zozo_sticky_bg_image' );
if( isset( $sticky_bg_opt ) ) {
	if( isset( $sticky_bg_opt['background-image'] ) && $sticky_bg_opt['background-image'] != '' ) {
		$sticky_styles .= 'background-image: url('. $sticky_bg_opt['background-image'] .'); !important';
	}
	if( isset( $sticky_bg_opt['background-repeat'] ) && $sticky_bg_opt['background-repeat'] != '' ) {
		$sticky_styles .= 'background-repeat: '. $sticky_bg_opt['background-repeat'] .'; !important';
	}
	if( isset( $sticky_bg_opt['background-attachment'] ) && $sticky_bg_opt['background-attachment'] != '' ) {
		$sticky_styles .= 'background-attachment: '. $sticky_bg_opt['background-attachment'] .'; !important';
	}
	if( isset( $sticky_bg_opt['background-position'] ) && $sticky_bg_opt['background-position'] != '' ) {
		$sticky_styles .= 'background-position: '. $sticky_bg_opt['background-position'] .'; !important';
	}
	if( isset( $sticky_bg_opt['background-size'] ) && $sticky_bg_opt['background-size'] != '' ) {
		$sticky_styles .= 'background-size: '. $sticky_bg_opt['background-size'] .'; !important';
		$sticky_styles .= '-moz-background-size: '. $sticky_bg_opt['background-size'] .'; !important';
		$sticky_styles .= '-webkit-background-size: '. $sticky_bg_opt['background-size'] .'; !important';
		$sticky_styles .= '-o-background-size: '. $sticky_bg_opt['background-size'] .'; !important';
		$sticky_styles .= '-ms-background-size: '. $sticky_bg_opt['background-size'] .'; !important';
	}
}
if( isset( $sticky_bg_opt['background-color'] ) && $sticky_bg_opt['background-color'] != '' ) {
	$sticky_styles .= 'background-color: '. $sticky_bg_opt['background-color'] .' !important;';
}

if( $sticky_styles ) {
	echo '.header-section.header-transparent .is-sticky .header-main-section, .is-sticky .header-main-section { '. $sticky_styles .' }' . "\n";
}

// Header 7 and 8
$logo_width = '';
$logo_sticky_width = '';

$logo_opt = aven_zozo_get_theme_option( 'zozo_logo' );
if( isset( $logo_opt ) && $logo_opt['url'] != '' ) {
	$logo_width = $logo_opt['width'];
}
$sticky_logo_opt = aven_zozo_get_theme_option( 'zozo_logo' );
if( isset( $sticky_logo_opt ) && $sticky_logo_opt['url'] != '' ) {
	$logo_sticky_width = $sticky_logo_opt['width'];
}
if( $logo_width != '' || $logo_sticky_width != '' ) {
	echo '@media only screen and (min-width: 768px) {';
	if( $logo_width != '' ) {
		echo '.header-section.type-header-7 .navbar-header, .header-section.type-header-8 .navbar-header { max-width: '. ( $logo_width + 30 ) .'px; }'. "\n";
	}
	if( $logo_sticky_width != '' ) {
		echo '.header-section.type-header-7 .is-sticky .navbar-header, .header-section.type-header-8 .is-sticky .navbar-header { max-width: '. ( $logo_sticky_width + 30 ) .'px; }';
	}
	echo '}' . "\n";
} 

// Main Site Width
$fullwidth_site_width = aven_zozo_get_theme_option( 'zozo_fullwidth_site_width' );
$boxed_site_width = aven_zozo_get_theme_option( 'zozo_boxed_site_width' );
if( aven_zozo_get_theme_option( 'zozo_theme_layout' ) == 'fullwidth' ) {
	if( $fullwidth_site_width ) {
		echo '.fullwidth .container { max-width: '. $fullwidth_site_width .'px; }' . "\n";
		echo '.boxed .is-sticky .header-main-section { max-width: '. $boxed_site_width .'px; }' . "\n";
	}
} else {
	if ( $boxed_site_width ) {			
		echo '.boxed #zozo_wrapper { max-width: '. $boxed_site_width .'px; }' . "\n";
		echo '.boxed .container { max-width: '. $boxed_site_width .'px; }' . "\n";
		echo '.boxed .is-sticky .header-main-section { max-width: '. $boxed_site_width .'px; }' . "\n";
	}
}

// Dropdown Menu Width
$sub_menu_width = '';
$sub_menu_width_opt = aven_zozo_get_theme_option( 'zozo_dropdown_menu_width' );
if ( isset( $sub_menu_width_opt['width'] ) && $sub_menu_width_opt['width'] != '' ) {
	if( is_numeric( $sub_menu_width_opt['width'] ) ) {
		$sub_menu_width .= 'min-width: '. $sub_menu_width_opt['width'] . $sub_menu_width_opt['units'] .';';
	} else {
		$sub_menu_width .= 'min-width: '. $sub_menu_width_opt['width'] .';';
	}
	echo '.dropdown-menu { '. $sub_menu_width .' }' . "\n";
}

// Footer Background Stylings
$footer_styles = '';
$footer_bg_opt = aven_zozo_get_theme_option( 'zozo_footer_bg_image' );
if( isset( $footer_bg_opt ) ) {
	if( isset( $footer_bg_opt['background-image'] ) && $footer_bg_opt['background-image'] != '' ) {
		$footer_styles .= 'background-image: url('. $footer_bg_opt['background-image'] .');';
	}
	if( isset( $footer_bg_opt['background-repeat'] ) && $footer_bg_opt['background-repeat'] != ''  ) {
		$footer_styles .= 'background-repeat: '. $footer_bg_opt['background-repeat'] .';';
	}
	if( isset( $footer_bg_opt['background-attachment'] ) && $footer_bg_opt['background-attachment'] != '' ) {
		$footer_styles .= 'background-attachment: '. $footer_bg_opt['background-attachment'] .';';
	}
	if( isset( $footer_bg_opt['background-position'] ) && $footer_bg_opt['background-position'] != '' ) {
		$footer_styles .= 'background-position: '. $footer_bg_opt['background-position'] .';';
	}
	if( isset( $footer_bg_opt['background-size'] ) && $footer_bg_opt['background-size'] != '' ) {
		$footer_styles .= 'background-size: '. $footer_bg_opt['background-size'] .';';
		$footer_styles .= '-moz-background-size: '. $footer_bg_opt['background-size'] .';';
		$footer_styles .= '-webkit-background-size: '. $footer_bg_opt['background-size'] .';';
		$footer_styles .= '-o-background-size: '. $footer_bg_opt['background-size'] .';';
		$footer_styles .= '-ms-background-size: '. $footer_bg_opt['background-size'] .';';
	}
}
if( isset( $footer_bg_opt['background-color'] ) && $footer_bg_opt['background-color'] != '' ) {
	$footer_styles .= 'background-color: '. $footer_bg_opt['background-color'] .';';
}

if( $footer_styles ) {
	echo '#footer.footer-section { '. $footer_styles .' }' . "\n";
}

// Footer Spacing
$footer_widget_styles = '';
$footer_spacing_opt = aven_zozo_get_theme_option( 'zozo_footer_spacing' );
if( isset( $footer_spacing_opt['padding-top'] ) && $footer_spacing_opt['padding-top'] != '' ) {
	$footer_widget_styles .= 'padding-top: '. $footer_spacing_opt['padding-top'] .';';
}			
if( isset( $footer_spacing_opt['padding-bottom'] ) && $footer_spacing_opt['padding-bottom'] != '' ) {
	$footer_widget_styles .= 'padding-bottom: '. $footer_spacing_opt['padding-bottom'] .';';
}			
if( isset( $footer_spacing_opt['padding-left'] ) && $footer_spacing_opt['padding-left'] != '' ) {
	$footer_widget_styles .= 'padding-left: '. $footer_spacing_opt['padding-left'] .';';
}			
if( isset( $footer_spacing_opt['padding-right'] ) && $footer_spacing_opt['padding-right'] != '' ) {
	$footer_widget_styles .= 'padding-right: '. $footer_spacing_opt['padding-right'] .';';			
}			

if( $footer_widget_styles ) {
	echo '#footer .footer-widgets-section { '. $footer_widget_styles . ' }' . "\n";
}

// Footer Copyright Background Stylings
$footer_bar_styles = '';
$footer_copy_bg_opt = aven_zozo_get_theme_option( 'zozo_footer_copy_bg_image' );
if( isset( $footer_copy_bg_opt ) ) {
	if( isset( $footer_copy_bg_opt['background-image'] ) && $footer_copy_bg_opt['background-image'] != '' ) {
		$footer_bar_styles .= 'background-image: url('. $footer_copy_bg_opt['background-image'] .');';
	}
	if( isset( $footer_copy_bg_opt['background-repeat'] ) && $footer_copy_bg_opt['background-repeat'] != '' ) {
		$footer_bar_styles .= 'background-repeat: '. $footer_copy_bg_opt['background-repeat'] .';';
	}
	if( isset( $footer_copy_bg_opt['background-attachment'] ) && $footer_copy_bg_opt['background-attachment'] != '' ) {
		$footer_bar_styles .= 'background-attachment: '. $footer_copy_bg_opt['background-attachment'] .';';
	}
	if( isset( $footer_copy_bg_opt['background-position'] ) && $footer_copy_bg_opt['background-position'] != '' ) {
		$footer_bar_styles .= 'background-position: '. $footer_copy_bg_opt['background-position'] .';';
	}
	if( isset( $footer_copy_bg_opt['background-size'] ) && $footer_copy_bg_opt['background-size'] != '' ) {
		$footer_bar_styles .= 'background-size: '. $footer_copy_bg_opt['background-size'] .';';
		$footer_bar_styles .= '-moz-background-size: '. $footer_copy_bg_opt['background-size'] .';';
		$footer_bar_styles .= '-webkit-background-size: '. $footer_copy_bg_opt['background-size'] .';';
		$footer_bar_styles .= '-o-background-size: '. $footer_copy_bg_opt['background-size'] .';';
		$footer_bar_styles .= '-ms-background-size: '. $footer_copy_bg_opt['background-size'] .';';
	}
}
if( isset( $footer_copy_bg_opt['background-color'] ) && $footer_copy_bg_opt['background-color'] != '' ) {
	$footer_bar_styles .= 'background-color: '. $footer_copy_bg_opt['background-color'] .';';
}

$footer_copy_spacing_opt = aven_zozo_get_theme_option( 'zozo_footer_copyright_spacing' );
if( isset( $footer_copy_spacing_opt['padding-top'] ) && $footer_copy_spacing_opt['padding-top'] != '' ) {
	$footer_bar_styles .= 'padding-top: '. $footer_copy_spacing_opt['padding-top'] .';';
}
if( isset( $footer_copy_spacing_opt['padding-bottom'] ) && $footer_copy_spacing_opt['padding-bottom'] != '' ) {
	$footer_bar_styles .= 'padding-bottom: '. $footer_copy_spacing_opt['padding-bottom'] .';';
}
if( isset( $footer_copy_spacing_opt['padding-left'] ) && $footer_copy_spacing_opt['padding-left'] != '' ) {
	$footer_bar_styles .= 'padding-left: '. $footer_copy_spacing_opt['padding-left'] .';';
}
if( isset( $footer_copy_spacing_opt['padding-right'] ) && $footer_copy_spacing_opt['padding-right'] != '' ) {
	$footer_bar_styles .= 'padding-right: '. $footer_copy_spacing_opt['padding-right'] .';';			
}

if( $footer_bar_styles ) {
	echo '#footer .footer-copyright-section { '. $footer_bar_styles .' }' . "\n";
}

// H1 Styles
$h1_styles = '';
$h1_font_opt = aven_zozo_get_theme_option( 'zozo_h1_font_styles' );
if( $h1_font_opt ) {
	$h1_styles .= 'font-family: '. $h1_font_opt['font-family'] .';';
	$h1_styles .= 'font-size: '. $h1_font_opt['font-size'] .';';
	if( $h1_font_opt['font-style'] ) {
		$h1_styles .= 'font-style: '. $h1_font_opt['font-style'] .';';
	}
	$h1_styles .= 'font-weight: '. $h1_font_opt['font-weight'] .';';
	if( $h1_font_opt['color'] ) {
		$h1_styles .= 'color: '. $h1_font_opt['color'] .';';
	}
	if( $h1_font_opt['line-height'] ) {
		$h1_styles .= 'line-height: '. $h1_font_opt['line-height'] .';';
	}
}

if( $h1_styles ) {
	echo 'h1 { '. $h1_styles .' }' . "\n";
}

// H2 Styles
$h2_styles = '';
$h2_font_opt = aven_zozo_get_theme_option( 'zozo_h2_font_styles' );
if( $h2_font_opt ) {
	$h2_styles .= 'font-family: '. $h2_font_opt['font-family'] .';';
	$h2_styles .= 'font-size: '. $h2_font_opt['font-size'] .';';
	if( $h2_font_opt['font-style'] ) {
		$h2_styles .= 'font-style: '. $h2_font_opt['font-style'] .';';
	}
	$h2_styles .= 'font-weight: '. $h2_font_opt['font-weight'] .';';
	if( $h2_font_opt['color'] ) {
		$h2_styles .= 'color: '. $h2_font_opt['color'] .';';
	}
	if( $h2_font_opt['line-height'] ) {
		$h2_styles .= 'line-height: '. $h2_font_opt['line-height'] .';';
	}
}

if( $h2_styles ) {
	echo 'h2, .vc_cta3-actions .vc_general.vc_btn3.vc_btn3-style-transparent { '. $h2_styles .' }' . "\n";
}

// H3 Styles
$h3_styles = '';
$h3_font_opt = aven_zozo_get_theme_option( 'zozo_h3_font_styles' );
if( $h3_font_opt ) {
	$h3_styles .= 'font-family: '. $h3_font_opt['font-family'] .';';
	$h3_styles .= 'font-size: '. $h3_font_opt['font-size'] .';';
	if( $h3_font_opt['font-style'] ) {
		$h3_styles .= 'font-style: '. $h3_font_opt['font-style'] .';';
	}
	$h3_styles .= 'font-weight: '. $h3_font_opt['font-weight'] .';';
	if( $h3_font_opt['color'] ) {
		$h3_styles .= 'color: '. $h3_font_opt['color'].';';
	}
	if( $h3_font_opt['line-height'] ) {
		$h3_styles .= 'line-height: '. $h3_font_opt['line-height'] .';';
	}
}

if( $h3_styles ) {
	echo 'h3, .stats-number, .comment-reply-title { '. $h3_styles .' }' . "\n";
}

// H4 Styles
$h4_styles = '';
$h4_font_opt = aven_zozo_get_theme_option( 'zozo_h4_font_styles' );
if( $h4_font_opt ) {
	$h4_styles .= 'font-family: '. $h4_font_opt['font-family'] .';';
	$h4_styles .= 'font-size: '. $h4_font_opt['font-size'] .';';
	if( $h4_font_opt['font-style'] ) {
		$h4_styles .= 'font-style: '. $h4_font_opt['font-style'] .';';
	}
	$h4_styles .= 'font-weight: '. $h4_font_opt['font-weight'] .';';
	if( $h4_font_opt['color'] ) {
		$h4_styles .= 'color: '. $h4_font_opt['color'] .';';
	}
	if( $h4_font_opt['line-height'] ) {
		$h4_styles .= 'line-height: '. $h4_font_opt['line-height'] .';';
	}
}

if( $h4_styles ) {
	echo 'h4, legend { '. $h4_styles .' }' . "\n";
}

// H5 Styles
$h5_styles = '';
$h5_font_opt = aven_zozo_get_theme_option( 'zozo_h5_font_styles' );
if( $h5_font_opt ) {
	$h5_styles .= 'font-family: '. $h5_font_opt['font-family'] .';';
	$h5_styles .= 'font-size: '. $h5_font_opt['font-size'] .';';
	if( $h5_font_opt['font-style'] ) {
		$h5_styles .= 'font-style: '. $h5_font_opt['font-style'] .';';
	}
	$h5_styles .= 'font-weight: '. $h5_font_opt['font-weight'] .';';
	if( $h5_font_opt['color'] ) {
		$h5_styles .= 'color: '. $h5_font_opt['color'] .';';
	}
	if( $h5_font_opt['line-height'] ) {
		$h5_styles .= 'line-height: '. $h5_font_opt['line-height'] .';';
	}
}

if( $h5_styles ) {
	echo 'h5, #bbpress-forums li.bbp-header, #bbpress-forums fieldset.bbp-form legend, #bbpress-forums .bbp-body .bbp-forum-title, #bbpress-forums .bbp-body .bbp-topic-permalink, .vc_tta.vc_general .vc_tta-tab > a, .stats-text, .smile-icon-timeline-wrap .timeline-separator-text .sep-text { '. $h5_styles .' }' . "\n";
}

// H6 Styles
$h6_styles = '';
$h6_font_opt = aven_zozo_get_theme_option( 'zozo_h6_font_styles' );
if( $h6_font_opt ) {
	$h6_styles 		.= 'font-family: '. $h6_font_opt['font-family'] .';';
	$h6_styles 		.= 'font-size: '. $h6_font_opt['font-size'] .';';
	if( $h6_font_opt['font-style'] ) {
		$h6_styles 	.= 'font-style: '. $h6_font_opt['font-style'] .';';
	}
	$h6_styles 		.= 'font-weight: '. $h6_font_opt['font-weight'] .';';
	if( $h6_font_opt['color'] ) {
		$h6_styles 	.= 'color: '. $h6_font_opt['color'] .';';
	}
	if( $h6_font_opt['line-height'] ) {
		$h6_styles 	.= 'line-height: '. $h6_font_opt['line-height'] .';';
	}
}

if( $h6_styles ) {
	echo 'h6, #bbpress-forums #bbp-single-user-details #bbp-user-navigation a, .sp-scrollable-table-wrapper thead tr th, .rtb-booking-form fieldset legend, button.ubtn, .portfolio-tabs.icon_type li a { '. $h6_styles .' }' . "\n";
}

// Top Menu Font Styles
$topnav_styles = '';
$topnav_font_opt = aven_zozo_get_theme_option( 'zozo_top_menu_font_styles' );
if( $topnav_font_opt ) {
	$topnav_styles 		.= 'font-family: '. $topnav_font_opt['font-family'] .';';
	$topnav_styles 		.= 'font-size: '. $topnav_font_opt['font-size'] .';';
	if( $topnav_font_opt['font-style'] ) {
		$topnav_styles 	.= 'font-style: '. $topnav_font_opt['font-style'] .';';
	}
	$topnav_styles 		.= 'font-weight: '. $topnav_font_opt['font-weight'] .';';
	if( $topnav_font_opt['color'] ) {
		$topnav_styles 	.= 'color: '. $topnav_font_opt['color'] .';';
	}
	if( isset( $topnav_font_opt['line-height'] ) ) {
		$topnav_styles 	.= 'line-height: '. $topnav_font_opt['line-height'] .';';
	}
}

if( $topnav_styles ) {
	echo '.header-section .header-top-section a { '. $topnav_styles .' }' . "\n";
}

$topnav_hv_styles = '';
$topnav_hv_opt = aven_zozo_get_theme_option( 'zozo_top_menu_hcolor' );
if ( $topnav_hv_opt['hover'] ) {
	$topnav_hv_styles .= 'color: '. $topnav_hv_opt['hover'] .';';
}
if( $topnav_hv_styles ) {
	echo '.header-section .header-top-section a:hover, .header-section .header-top-section a:focus { '. $topnav_hv_styles .' }' . "\n";
}

// Main Menu Font Stylings
$menu_font_styles = '';
$menu_font_opt = aven_zozo_get_theme_option( 'zozo_menu_font_styles' );
if( $menu_font_opt ) {
	$menu_font_styles 		.= 'font-family: '. $menu_font_opt['font-family'] .';';
	$menu_font_styles 		.= 'font-size: '. $menu_font_opt['font-size'] .';';
	if( $menu_font_opt['font-style'] ) {
		$menu_font_styles 	.= 'font-style: '. $menu_font_opt['font-style'] .';';
	}
	$menu_font_styles 		.= 'font-weight: '. $menu_font_opt['font-weight'] .';';
	if( $menu_font_opt['color'] ) {
		$menu_font_styles 	.= 'color: '. $menu_font_opt['color'] .';';
	}
}

if( $menu_font_styles ) {
	echo '.zozo-main-nav > li > a { '. $menu_font_styles . ' }' . "\n";
}

$menu_hv_styles = '';
$menu_hv_opt = aven_zozo_get_theme_option( 'zozo_main_menu_hcolor' );
if ( $menu_hv_opt['hover'] ) {
	$menu_hv_styles .= 'color: '. $menu_hv_opt['hover'] .';';
}
if( $menu_hv_styles ) {
	echo '.header-section .header-main-section .zozo-main-nav > li > a:hover, .header-section .header-main-section .zozo-main-nav > li:hover > a, .header-section .header-main-section .zozo-main-nav > li.active > a, .header-section .header-main-section li i:hover, .header-section .header-main-section li a:hover, .header-section .zozo-main-nav li.current-menu-ancestor > a, .header-section .zozo-main-nav li.current-menu-parent > a, .header-section .zozo-main-nav li.current-menu-item > a, .header-section .header-toggle-section .nav > li > a:focus, .header-section .header-toggle-section .nav > li > a:hover, .header-main-section li.header-side-wrapper > a:focus, .header-section.header-skin-dark .header-main-section .zozo-main-nav li.current-menu-item > a { '. $menu_hv_styles .' }' . "\n";
}

// Sub Menu Font Stylings
$submenu_styles = '';
$submenu_font_opt = aven_zozo_get_theme_option( 'zozo_submenu_font_styles' );
if( $submenu_font_opt ) {
	$submenu_styles 		.= 'font-family: '. $submenu_font_opt['font-family'] .';';
	$submenu_styles 		.= 'font-size: '. $submenu_font_opt['font-size'] .';';
	if( $submenu_font_opt['font-style'] ) {
		$submenu_styles 	.= 'font-style: '. $submenu_font_opt['font-style'] .';';
	}
	$submenu_styles 		.= 'font-weight: '. $submenu_font_opt['font-weight'] .';';
	if( $submenu_font_opt['color'] ) {
		$submenu_styles 	.= 'color: '. $submenu_font_opt['color'] .';';
	}
	if( isset( $submenu_font_opt['line-height'] ) ) {
		$submenu_styles 	.= 'line-height: '. $submenu_font_opt['line-height'] .';';
	}
}

if( $submenu_styles ) {
	echo '.zozo-main-nav .dropdown-menu > li a, .zozo-main-nav .dropdown-menu .sub-menu a, .zozo-main-nav .zozo-megamenu-submenu li > a, .zozo-main-nav .zozo-megamenu .menu-item > a { '. $submenu_styles . ' }' . "\n";
}

$submenu_bg_styles = '';
if ( aven_zozo_get_theme_option( 'zozo_submenu_bg_color' ) ) {
	$submenu_bg_styles .= 'background-color: '. aven_zozo_get_theme_option( 'zozo_submenu_bg_color' ) .' !important;';
}

if( aven_zozo_get_theme_option( 'zozo_submenu_show_border' ) == 1 ) {

	$submenu_border_opt = aven_zozo_get_theme_option( 'zozo_main_submenu_border' );
	if( $submenu_border_opt['border-top'] ) {
		$submenu_bg_styles .= 'border-top-width: '. $submenu_border_opt['border-top'] .';';		
	}			
	if( $submenu_border_opt['border-bottom'] ) {
		$submenu_bg_styles .= 'border-bottom-width: '. $submenu_border_opt['border-bottom'] .';';
	}			
	if( $submenu_border_opt['border-left'] ) {
		$submenu_bg_styles .= 'border-left-width: '. $submenu_border_opt['border-left'] .';';
	}			
	if( $submenu_border_opt['border-right'] ) {
		$submenu_bg_styles .= 'border-right-width: '. $submenu_border_opt['border-right'] .';';			
	}
	
	if( isset( $submenu_border_opt['border-style'] ) && $submenu_border_opt['border-style'] != '' ) {
		$submenu_bg_styles .= 'border-style: '. $submenu_border_opt['border-style'] .';';
	}
	if( isset( $submenu_border_opt['border-color'] ) && $submenu_border_opt['border-color'] != '' ) {
		$submenu_bg_styles .= 'border-color: '. $submenu_border_opt['border-color'] .';';
	}

}

if( $submenu_bg_styles ) {
	echo '.zozo-main-nav.navbar-nav .dropdown-menu, .zozo-main-nav.navbar-nav .dropdown-menu .sub-menu, .zozo-main-nav.navbar-nav .sub-menu, .zozo-megamenu-wrapper, .header-side-top-submenu.dropdown-menu { '. $submenu_bg_styles . ' }' . "\n";
}

if( aven_zozo_get_theme_option( 'zozo_submenu_show_border' ) == 1 ) {
	$submenu_border_opt = aven_zozo_get_theme_option( 'zozo_main_submenu_border' );
	if( isset( $submenu_border_opt['border-top'] ) && is_numeric( $submenu_border_opt['border-top'] ) ){
		echo '.zozo-main-nav.navbar-nav .dropdown-menu .sub-menu { top: -'. ( $submenu_border_opt['border-top'] + 20 + 'px' ) .'; }' . "\n";
	}
}

if( aven_zozo_get_theme_option( 'zozo_submenu_show_border' ) == 0 ) {
	echo '.zozo-main-nav.navbar-nav .dropdown-menu, .zozo-main-nav.navbar-nav .dropdown-menu .sub-menu, .zozo-main-nav.navbar-nav .sub-menu, .zozo-megamenu-wrapper, .header-side-top-submenu.dropdown-menu { border: none !important; }' . "\n";
	echo '.zozo-main-nav.navbar-nav .dropdown-menu .sub-menu { top: 0; }' . "\n";
}

$submenu_hv_styles = $submenu_bg_hv_styles = '';
$submenu_hcolor_opt = aven_zozo_get_theme_option( 'zozo_sub_menu_hcolor' );
$submenu_hbgcolor_opt = aven_zozo_get_theme_option( 'zozo_submenu_hbg_color' );
if ( $submenu_hcolor_opt['hover'] ) {
	$submenu_hv_styles .= 'color: '. $submenu_hcolor_opt['hover'] .';';
}
if ( $submenu_hbgcolor_opt ) {
	$submenu_bg_hv_styles .= 'background-color: '. $submenu_hbgcolor_opt .';';			
}

if( $submenu_hv_styles ) {
	echo '.header-section .header-main-section .zozo-main-nav.navbar-nav .dropdown-menu > li > a:focus, .header-section .header-main-section .zozo-main-nav.navbar-nav .dropdown-menu > li > a:hover, .header-section .header-main-section .zozo-main-nav.navbar-nav .sub-menu > li > a:focus, .header-section .header-main-section .zozo-main-nav.navbar-nav .sub-menu > li > a:hover, .header-section .header-main-section .dropdown-menu > li.dropdown:hover > a, .header-section .header-main-section .sub-menu > li.dropdown:hover > a, .header-section .header-main-section .dropdown-menu > .active > a, .header-section .header-main-section .dropdown-menu > .active > a:focus,
.header-section .header-main-section .dropdown-menu > .active > a:hover, .header-section .header-main-section .mobile-sub-menu > li > a:hover, .header-section .header-main-section .mobile-sub-menu > li > a:active, .header-section .header-main-section .mobile-sub-menu > li > a:focus, .header-toggle-section .header-side-top-section .header-side-top-submenu.dropdown-menu li > a:hover, .header-section .zozo-main-nav .mobile-sub-menu > li > a:hover, .header-section .header-main-section .menu-item.active > a { '. $submenu_hv_styles .' }' . "\n";
}

if( $submenu_bg_hv_styles ) {
	echo '.zozo-main-nav.navbar-nav .dropdown-menu li.active, .zozo-main-nav.navbar-nav .dropdown-menu li:hover, .zozo-main-nav.navbar-nav .dropdown-menu .current-menu-parent, .zozo-main-nav.navbar-nav .current-menu-ancestor .dropdown-menu .current-menu-item, .zozo-megamenu-wrapper .zozo-megamenu .sub-menu li:hover, .zozo-megamenu-wrapper .zozo-megamenu .sub-menu li.active { '. $submenu_bg_hv_styles .' }' . "\n";
}

// Title Font Stylings
$title_styles = '';
$single_post_title_font_opt = aven_zozo_get_theme_option( 'zozo_single_post_title_fonts' );
if( $single_post_title_font_opt ) {
	$title_styles 		.= 'font-family: '. $single_post_title_font_opt['font-family'] .';';
	$title_styles 		.= 'font-size: '. $single_post_title_font_opt['font-size'] .';';
	if( $single_post_title_font_opt['font-style'] ) {
		$title_styles 	.= 'font-style: '. $single_post_title_font_opt['font-style'] .';';
	}
	if( $single_post_title_font_opt['font-weight'] ) {
		$title_styles 	.= 'font-weight: '. $single_post_title_font_opt['font-weight'] .';';
	}
	if( $single_post_title_font_opt['color'] ) {
		$title_styles 	.= 'color: '. $single_post_title_font_opt['color'] .';';
	}
	if( $single_post_title_font_opt['line-height'] ) {
		$title_styles 	.= 'line-height: '. $single_post_title_font_opt['line-height'] .';';
	}
}

if( $title_styles ) {
	echo '.entry-title, .page-title-section .page-title-captions h1.entry-title { '. $title_styles . ' }' . "\n";
}

// Blog Archive Font Stylings
$archive_styles = '';
$post_title_font_opt = aven_zozo_get_theme_option( 'zozo_post_title_font_styles' );
if( $post_title_font_opt ) {
	$archive_styles 		.= 'font-family: '. $post_title_font_opt['font-family'] .';';
	$archive_styles 		.= 'font-size: '. $post_title_font_opt['font-size'] .';';
	if( $post_title_font_opt['font-style'] ) {
		$archive_styles 	.= 'font-style: '. $post_title_font_opt['font-style'] .';';
	}
	if( $post_title_font_opt['font-weight'] ) {
		$archive_styles 	.= 'font-weight: '. $post_title_font_opt['font-weight'] .';';
	}
	if( $post_title_font_opt['color'] ) {
		$archive_styles 	.= 'color: '. $post_title_font_opt['color'] .';';
	}
	if( $post_title_font_opt['line-height'] ) {
		$archive_styles 	.= 'line-height: '. $post_title_font_opt['line-height'] .';';
	}
}

if( $archive_styles ) {
	echo '.post h2.entry-title, .category-title { '. $archive_styles . ' }' . "\n";
}

// Widget Title Font Stylings
$widget_title_styles = '';
$widget_title_font_opt = aven_zozo_get_theme_option( 'zozo_widget_title_fonts' );
if( $widget_title_font_opt ) {
	$widget_title_styles 		.= 'font-family: '. $widget_title_font_opt['font-family'] .';';
	$widget_title_styles 		.= 'font-size: '. $widget_title_font_opt['font-size'] .';';
	if( $widget_title_font_opt['font-style'] ) {
		$widget_title_styles 	.= 'font-style: '. $widget_title_font_opt['font-style'] .';';
	}
	if( $widget_title_font_opt['font-weight'] ) {
		$widget_title_styles 	.= 'font-weight: '. $widget_title_font_opt['font-weight'] .';';
	}
	if( $widget_title_font_opt['color'] ) {
		$widget_title_styles 	.= 'color: '. $widget_title_font_opt['color'] .';';
	}
	if( isset( $widget_title_font_opt['line-height'] ) ) {
		$widget_title_styles 	.= 'line-height: '. $widget_title_font_opt['line-height'] .';';
	}
}

if( $widget_title_styles ) {
	echo '.widget h3 { '. $widget_title_styles . ' }' . "\n";
}

// Widget Text Font Stylings
$widget_text_styles = '';
$widget_text_font_opt = aven_zozo_get_theme_option( 'zozo_widget_text_fonts' );
if( $widget_text_font_opt ) {
	$widget_text_styles 		.= 'font-family: '. $widget_text_font_opt['font-family'] .';';
	$widget_text_styles 		.= 'font-size: '. $widget_text_font_opt['font-size'] .';';
	if( $widget_text_font_opt['font-style'] ) {
		$widget_text_styles 	.= 'font-style: '. $widget_text_font_opt['font-style'] .';';
	}
	if( $widget_text_font_opt['font-weight'] ) {
		$widget_text_styles 	.= 'font-weight: '. $widget_text_font_opt['font-weight'] .';';
	}
	if( $widget_text_font_opt['color'] ) {
		$widget_text_styles 	.= 'color: '. $widget_text_font_opt['color'] .';';
	}
	if( isset( $widget_text_font_opt['line-height'] ) ) {
		$widget_text_styles 	.= 'line-height: '. $widget_text_font_opt['line-height'] .';';
	}
}

if( $widget_text_styles ) {
	echo '.widget div, .widget p { '. $widget_text_styles . ' }' . "\n";
}

// Footer Widget Title Font Stylings
$footer_widget_title_styles = '';
$footer_widget_title_font_opt = aven_zozo_get_theme_option( 'zozo_footer_widget_title_fonts' );
if( $footer_widget_title_font_opt ) {
	$footer_widget_title_styles 		.= 'font-family: '. $footer_widget_title_font_opt['font-family'] .';';
	$footer_widget_title_styles 		.= 'font-size: '. $footer_widget_title_font_opt['font-size'] .';';
	if( $footer_widget_title_font_opt['font-style'] ) {
		$footer_widget_title_styles 	.= 'font-style: '. $footer_widget_title_font_opt['font-style'] .';';
	}
	if( $footer_widget_title_font_opt['font-weight'] ) {
		$footer_widget_title_styles 	.= 'font-weight: '. $footer_widget_title_font_opt['font-weight'] .';';
	}
	if( $footer_widget_title_font_opt['color'] ) {
		$footer_widget_title_styles 	.= 'color: '. $footer_widget_title_font_opt['color'] .';';
	}
	if( isset( $footer_widget_title_font_opt['line-height'] ) ) {
		$footer_widget_title_styles 	.= 'line-height: '. $footer_widget_title_font_opt['line-height'] .';';
	}
}

if( $footer_widget_title_styles ) {
	echo '.footer-widgets .widget h3 { '. $footer_widget_title_styles . ' }' . "\n";
}

// Footer Widget Text Font Stylings
$footer_widget_text_styles = '';
$footer_widget_text_font_opt = aven_zozo_get_theme_option( 'zozo_footer_widget_text_fonts' );
if( $footer_widget_text_font_opt ) {
	$footer_widget_text_styles 		.= 'font-family: '. $footer_widget_text_font_opt['font-family'] .';';
	$footer_widget_text_styles 		.= 'font-size: '. $footer_widget_text_font_opt['font-size'] .';';
	if( $footer_widget_text_font_opt['font-style'] ) {
		$footer_widget_text_styles 	.= 'font-style: '. $footer_widget_text_font_opt['font-style'] .';';
	}
	if( $footer_widget_text_font_opt['font-weight'] ) {
		$footer_widget_text_styles 	.= 'font-weight: '. $footer_widget_text_font_opt['font-weight'] .';';
	}
	if( $footer_widget_text_font_opt['color'] ) {
		$footer_widget_text_styles 	.= 'color: '. $footer_widget_text_font_opt['color'] .';';
	}
	if( isset( $footer_widget_text_font_opt['line-height'] ) ) {
		$footer_widget_text_styles 	.= 'line-height: '. $footer_widget_text_font_opt['line-height'] .';';
	}
}

if( $footer_widget_text_styles ) {
	echo '.footer-widgets .widget div, .footer-widgets .widget p { '. $footer_widget_text_styles . ' }' . "\n";
}

// Logo, Menu Heights
// Logo Spacing
$logo_styles = '';
$logo_maxheight_opt = aven_zozo_get_theme_option( 'zozo_logo_maxheight' );
$logo_padding_opt = aven_zozo_get_theme_option( 'zozo_logo_padding' );

if( isset( $logo_maxheight_opt ) && $logo_maxheight_opt != '' ) {
	$logo_styles .= 'max-height: '. $logo_maxheight_opt .'px;';
}
if( isset( $logo_padding_opt['padding-top'] ) && $logo_padding_opt['padding-top'] != '' ) {
	$logo_styles .= 'padding-top: '. $logo_padding_opt['padding-top'] .';';
}			
if( isset( $logo_padding_opt['padding-bottom'] ) && $logo_padding_opt['padding-bottom'] != '' ) {
	$logo_styles .= 'padding-bottom: '. $logo_padding_opt['padding-bottom'] .';';
}			
if( isset( $logo_padding_opt['padding-left'] ) && $logo_padding_opt['padding-left'] != '' ) {
	$logo_styles .= 'padding-left: '. $logo_padding_opt['padding-left'] .';';
}
if( isset( $logo_padding_opt['padding-right'] ) && $logo_padding_opt['padding-right'] != '' ) {
	$logo_styles .= 'padding-right: '. $logo_padding_opt['padding-right'] .';';
}
if( isset( $logo_styles ) && $logo_styles != '' ) {
	echo '.navbar-header .navbar-brand img, .navbar-brand img { '. $logo_styles .' }' . "\n";
}

$logo_sticky_styles = '';
$sticky_logo_padding_opt = aven_zozo_get_theme_option( 'zozo_sticky_logo_padding' );

if( isset( $sticky_logo_padding_opt['padding-top'] ) && $sticky_logo_padding_opt['padding-top'] != '' ) {
	$logo_sticky_styles .= 'padding-top: '. $sticky_logo_padding_opt['padding-top'] .';';
}			
if( isset( $sticky_logo_padding_opt['padding-bottom'] ) && $sticky_logo_padding_opt['padding-bottom'] != '' ) {
	$logo_sticky_styles .= 'padding-bottom: '. $sticky_logo_padding_opt['padding-bottom'] .';';
}			
if( isset( $sticky_logo_padding_opt['padding-left'] ) && $sticky_logo_padding_opt['padding-left'] != '' ) {
	$logo_sticky_styles .= 'padding-left: '. $sticky_logo_padding_opt['padding-left'] .';';
}
if( isset( $sticky_logo_padding_opt['padding-right'] ) && $sticky_logo_padding_opt['padding-right'] != '' ) {
	$logo_sticky_styles .= 'padding-right: '. $sticky_logo_padding_opt['padding-right'] .';';
}
if( isset( $logo_sticky_styles ) && $logo_sticky_styles != '' ) {
	echo '.navbar-header.zozo-has-sticky-logo .navbar-brand img.zozo-sticky-logo { '. $logo_sticky_styles .' }' . "\n";
}

// Menu Heights
$menu_lheight_styles = '';
$menu_height = '';
$menu_height_opt = aven_zozo_get_theme_option( 'zozo_menu_height' );

if( isset( $menu_height_opt ) && $menu_height_opt['height'] != '' ) {
	if( is_numeric( $menu_height_opt['height'] ) ) {
		$menu_height = $menu_height_opt['height'] . $menu_height_opt['units'];
	} else {
		$menu_height = $menu_height_opt['height'];
	}
}			
if( isset( $menu_height ) && $menu_height != '' ) {
	echo '.header-section .header-main-section { height: '. $menu_height .'; }' . "\n";
	echo '.header-section .header-main-section .navbar-header .navbar-brand, .header-section .header-main-section .zozo-main-nav > li, .header-section .header-main-section .zozo-main-nav > li > a, .header-section .header-main-section .main-bar-item, .header-section .header-main-section .toggle-bar-item, .header-section .header-main-section .header-toggle-content, .type-header-9 .navbar-nav.zozo-main-bar > li, .type-header-9 .navbar-nav.zozo-main-bar > li a { line-height: '. $menu_height .'; height: '. $menu_height .'; }' . "\n";
	echo '.header-section.type-header-3 .header-main-section { height: '. ( $menu_height * 2 ) .'px; }' . "\n";
	echo '.header-section.type-header-3 .header-main-section .header-toggle-content { height: '. ( $menu_height - 1 ) .'px; line-height: '. ( $menu_height - 1 ) .'px; }' . "\n";
}

// Sticky Menu Height
$sticky_menu_height_styles = '';
$sticky_menu_height = '';
$sticky_menu_height_opt = aven_zozo_get_theme_option( 'zozo_sticky_menu_height' );

if( isset( $sticky_menu_height_opt ) && $sticky_menu_height_opt['height'] != '' ) {
	if( is_numeric( $sticky_menu_height_opt['height'] ) ) {
		$sticky_menu_height = $sticky_menu_height_opt['height'] . $sticky_menu_height_opt['units'];
	} else {
		$sticky_menu_height = $sticky_menu_height_opt['height'];
	}
}
if( isset( $sticky_menu_height ) && $sticky_menu_height != '' ) {
	echo '.header-section .is-sticky .header-main-section, .header-section.type-header-3 .is-sticky .header-main-section { height: '. $sticky_menu_height .'; }' . "\n";
	echo '.header-section .is-sticky .header-main-section .navbar-header .navbar-brand, .header-section .is-sticky .header-main-section .zozo-main-nav > li, .header-section .is-sticky .header-main-section .zozo-main-nav > li > a, .header-section .is-sticky .header-main-section .main-bar-item, .header-section .is-sticky .header-main-section .toggle-bar-item, .header-section .is-sticky .header-main-section .header-toggle-content, .type-header-9 .is-sticky .navbar-nav.zozo-main-bar > li, .type-header-9 .is-sticky .navbar-nav.zozo-main-bar > li a { line-height: '. $sticky_menu_height .'; height: '. $sticky_menu_height .'; }' . "\n";
}

// Logo Bar Heights for Header 4, 5, 6, 11
$logo_bar_height_styles = '';
$logo_bar_height = '';
$logo_bar_height_opt = aven_zozo_get_theme_option( 'zozo_logo_bar_height' );

if( isset( $logo_bar_height_opt ) && $logo_bar_height_opt['height'] != '' ) {
	if( is_numeric( $logo_bar_height_opt['height'] ) ) {
		$logo_bar_height = $logo_bar_height_opt['height'] . $logo_bar_height_opt['units'];
	} else {
		$logo_bar_height = $logo_bar_height_opt['height'];
	}
}
if( isset( $logo_bar_height ) && $logo_bar_height != '' ) {
	echo '.header-section .header-logo-section li, .header-section .header-logo-section .navbar-header .navbar-brand, .header-section .header-logo-section .logo-bar-item,  .header-section .header-logo-section .logo-bar-item .zozo-main-nav li > a, .header-section.type-header-6 .header-logo-section li.header-top-cart, .type-header-6 .header-logo-section .zozo-logo-bar { line-height: '. $logo_bar_height .'; height: '. $logo_bar_height .'; }' . "\n";
}

// Menu Heights for Header 4, 5, 6, 11
$menu_lheight_alt_styles = '';
$menu_height_alt = '';
$menu_height_alt_opt = aven_zozo_get_theme_option( 'zozo_menu_height_alt' );

if( isset( $menu_height_alt_opt ) && $menu_height_alt_opt['height'] != '' ) {
	if( is_numeric( $menu_height_alt_opt['height'] ) ) {
		$menu_height_alt = $menu_height_alt_opt['height'] . $menu_height_alt_opt['units'];
	} else {
		$menu_height_alt = $menu_height_alt_opt['height'];
	}
	$half_menu_height_alt = $menu_height_alt / 2;
}
if( isset( $menu_height_alt ) && $menu_height_alt != '' ) {
	echo '.header-section.header-fullwidth-menu .header-main-section { height: '. $menu_height_alt .'; }' . "\n";
	echo '.header-section.header-fullwidth-menu .header-main-section .navbar-header .navbar-brand, .header-section.header-fullwidth-menu .header-main-section .zozo-main-nav > li, .header-section.header-fullwidth-menu .header-main-section .zozo-main-nav > li > a, .header-section.header-fullwidth-menu .header-main-section .main-bar-item { line-height: '. $menu_height_alt .'; height: '. $menu_height_alt .'; }' . "\n";
	echo '.header-section.header-fullwidth-menu .header-main-section .header-toggle-content { height: '. ( $menu_height_alt - 1 ) .'px; line-height: '. ( $menu_height_alt - 1 ) .'px; }' . "\n";
}

// Sticky Menu Heights for Header 4, 5, 6, 11
$sticky_menu_height_alt_styles = '';
$sticky_menu_height_alt = '';
$sticky_menu_height_alt_opt = aven_zozo_get_theme_option( 'zozo_sticky_menu_height_alt' );

if( isset( $sticky_menu_height_alt_opt ) && $sticky_menu_height_alt_opt['height'] != '' ) {
	if( is_numeric( $sticky_menu_height_alt_opt['height'] ) ) {
		$sticky_menu_height_alt = $sticky_menu_height_alt_opt['height'] . $sticky_menu_height_alt_opt['units'];
	} else {
		$sticky_menu_height_alt = $sticky_menu_height_alt_opt['height'];
	}
	$half_sticky_menu_height_alt = $sticky_menu_height_alt / 2;
}			
if( isset( $sticky_menu_height_alt ) && $sticky_menu_height_alt != '' ) {
	echo '.header-section.header-fullwidth-menu .is-sticky .header-main-section { height: '. $sticky_menu_height_alt .'; }' . "\n";
	echo '.header-section.header-fullwidth-menu .is-sticky .header-main-section .navbar-header .navbar-brand, .header-section.header-fullwidth-menu .is-sticky .header-main-section .zozo-main-nav > li, .header-section.header-fullwidth-menu .is-sticky .header-main-section .zozo-main-nav > li > a, .header-section.header-fullwidth-menu .is-sticky .header-main-section .main-bar-item { line-height: '. $sticky_menu_height_alt .'; height: '. $sticky_menu_height_alt .'; }' . "\n";
}

// Social Link Bg Colors
$social_bg_color_opt = aven_zozo_get_theme_option( 'zozo_social_bg_color' );

if( isset( $social_bg_color_opt['regular'] ) && $social_bg_color_opt['regular'] != '' ) {
	echo '.zozo-social-icons.soc-icon-circle li a, .zozo-social-icons.soc-icon-square li a, .zozo-social-icons.soc-icon-rounded li a,.footer-section.footer-skin-dark .zozo-social-icons.soc-icon-circle li a, .footer-section.footer-skin-dark .zozo-social-icons.soc-icon-square li a, .footer-section.footer-skin-dark .zozo-social-icons.soc-icon-rounded li a { background-color: '. $social_bg_color_opt['regular'] . '; }' . "\n";
}
if( isset( $social_bg_color_opt['hover'] ) && $social_bg_color_opt['hover'] != '' ) {
	echo '.zozo-social-icons.soc-icon-circle li a:hover, .zozo-social-icons.soc-icon-square li a:hover, .zozo-social-icons.soc-icon-rounded li a:hover,.zozo-social-icons.soc-icon-circle li a:focus, .zozo-social-icons.soc-icon-square li a:focus, .zozo-social-icons.soc-icon-rounded li a:focus { background-color: '. $social_bg_color_opt['hover'] . ' !important; }' . "\n";
}

// Social Link Colors
$zozo_social_icon_color = aven_zozo_get_theme_option( 'zozo_social_icon_color' );

if( isset( $zozo_social_icon_color['regular'] ) && $zozo_social_icon_color['regular'] != '' ) {
	echo '.zozo-social-icons.soc-icon-circle li a i, .zozo-social-icons.soc-icon-square li a i, .zozo-social-icons.soc-icon-rounded li a i,.footer-section.footer-skin-dark .zozo-social-icons.soc-icon-circle li a i, .footer-section.footer-skin-dark .zozo-social-icons.soc-icon-square li a i, .footer-section.footer-skin-dark .zozo-social-icons.soc-icon-rounded li a i { color: '. $zozo_social_icon_color['regular'] . '; }' . "\n";
}
if( isset( $zozo_social_icon_color['hover'] ) && $zozo_social_icon_color['hover'] != '' ) {
	echo '.zozo-social-icons.soc-icon-circle li a:hover i, .zozo-social-icons.soc-icon-square li a:hover i, .zozo-social-icons.soc-icon-rounded li a:hover i,.zozo-social-icons.soc-icon-circle li a:focus i, .zozo-social-icons.soc-icon-square li a:focus i, .zozo-social-icons.soc-icon-rounded li a:focus i { color: '. $zozo_social_icon_color['hover'] . ' !important; }' . "\n";
}

// Gutenberg
echo '.wp-block-file .wp-block-file__button, .wp-block-button:not(.is-style-outline) .wp-block-button__link:not(.has-background) {
	background-color: '. $custom_color .';
}
.wp-block-file .wp-block-file__button:hover, .wp-block-button:not(.is-style-outline) .wp-block-button__link:not(.has-background):hover {
	background-color: rgba('. $custom_color_rgb[0] . ','. $custom_color_rgb[1] . ','. $custom_color_rgb[2] . ',0.8);
}
.wp-block-button.is-style-outline .wp-block-button__link:not(.has-text-color) {
	color: '. $custom_color .';
}
body:not(.single-post) .wp-block-button__link:not(.has-background) {
	background-color: '. $custom_color .';
}
body:not(.single-post) .wp-block-button__link:not(.has-background):hover {
	background-color: rgba('. $custom_color_rgb[0] . ','. $custom_color_rgb[1] . ','. $custom_color_rgb[2] . ',0.8);
}
.page-links .post-page-numbers:hover,
.page-links .post-page-numbers:active,
.page-links .post-page-numbers:focus,
.page-links .post-page-numbers.current {
	background-color: '. $custom_color .';
}
.mejs-controls .mejs-time-rail .mejs-time-current {
	background-color:'. $custom_color .';
}';