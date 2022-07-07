<?php
/**
 * Plugin Solutions & Features Page
 *
 * @package WP Logo Showcase Responsive Slider
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Taking some variables
$popup_add_link = add_query_arg( array( 'post_type' => WPLS_POST_TYPE ), admin_url( 'post-new.php' ) );
?>

<div id="wrap">
	<div class="wpls-sf-wrap">
		<div class="wpls-sf-inr">
			<!-- Start - Welcome Box -->
			<div class="wpls-sf-welcome-wrap">
				<div class="wpls-sf-welcome-inr">
					<div class="wpls-sf-welcome-left">
						<div class="wpls-sf-subtitle">Getting Started</div>
						<h2 class="wpls-sf-title">Welcome to Logo Showcase</h2>
						<p class="wpls-sf-content">Showcase your clients, partners logos associated with your business with logo carousels in an aesthetically appealing and professional way.</p>
						<a href="<?php echo esc_url( $popup_add_link ); ?>" class="wpls-sf-btn">Launch Logo Showcase</a></br> <b>OR</b> </br><a href="<?php echo WPLS_PLUGIN_LINK_WELCOME; ?>"  target="_blank" class="wpls-sf-btn wpls-sf-btn-orange">Grab Now Pro Features</a>
						<div class="wpls-rc-wrap">
							<div class="wpls-rc-inr">
								<div class="wpls-rc-icon">
									<img src="<?php echo esc_url( WPLS_URL ); ?>assets/images/popup-icon/14-days-money-back-guarantee.png" alt="14-days-money-back-guarantee" title="14-days-money-back-guarantee" />
								</div>
								<div class="wpls-rc-cont">
									<h3>14 Days Refund Policy</h3>
									<p>14-day No Question Asked Refund Guarantee</p>
								</div>
							</div>
							<div class="wpls-rc-inr">
								<div class="wpls-rc-icon">
									<img src="<?php echo esc_url( WPLS_URL ); ?>assets/images/popup-icon/popup-design.png" alt="popup-design" title="popup-design" />
								</div>
								<div class="wpls-rc-cont">
									<h3>Include Done-For-You Logo Showcase Setup</h3>
									<p>Our  experts team will design 1 free logo showcase  for you as per your need.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="wpls-sf-welcome-right">
						<div class="wpls-sf-fp-ttl">Free vs Pro</div>
						<div class="wpls-sf-fp-box-wrp">
							<div class="wpls-sf-fp-box">
								<i class="dashicons dashicons-desktop"></i>
								<div class="wpls-sf-box-ttl">1 Layout (Slider/Carousel)</div>
								<div class="wpls-sf-tag">Free</div>
							</div>
							<div class="wpls-sf-fp-box">
								<i class="dashicons dashicons-align-center"></i>
								<div class="wpls-sf-box-ttl">Center Mode</div>
								<div class="wpls-sf-tag">Free</div>
							</div>
							<div class="wpls-sf-fp-box">
								<i class="dashicons dashicons-admin-links"></i>
								<div class="wpls-sf-box-ttl">Logo Link</div>
								<div class="wpls-sf-tag">Free</div>
							</div>
							<div class="wpls-sf-fp-box">
								<i class="dashicons dashicons-format-image"></i>
								<div class="wpls-sf-box-ttl">Logo Image</div>
								<div class="wpls-sf-tag">Free</div>
							</div>
							<div class="wpls-sf-fp-box wpls-sf-pro-box">
								<i class="dashicons dashicons-format-aside"></i>
								<div class="wpls-sf-box-ttl">Logo Description</div>
								<div class="wpls-sf-tag">Pro</div>
							</div>
							<div class="wpls-sf-fp-box wpls-sf-pro-box">
								<i class="dashicons dashicons-images-alt"></i>
								<div class="wpls-sf-box-ttl">Logo Image URL</div>
								<div class="wpls-sf-tag">Pro</div>
							</div>
							<div class="wpls-sf-fp-box wpls-sf-pro-box">
								<i class="dashicons dashicons-layout"></i>
								<div class="wpls-sf-box-ttl">6 Layouts (Grid, Slider, Center, List, Ticker and Filter )</div>
								<div class="wpls-sf-tag">Pro</div>
							</div>
							<div class="wpls-sf-fp-box wpls-sf-pro-box">
								<i class="dashicons dashicons-art"></i>
								<div class="wpls-sf-box-ttl">15+ Designs</div>
								<div class="wpls-sf-tag">Pro</div>
							</div>
							<div class="wpls-sf-fp-box wpls-sf-pro-box">
								<i class="dashicons dashicons-html"></i>
								<div class="wpls-sf-box-ttl">WP Templating Features </div>
								<div class="wpls-sf-tag">Pro</div>
							</div>
							<div class="wpls-sf-fp-box wpls-sf-pro-box">
								<i class="dashicons dashicons-shortcode"></i>
								<div class="wpls-sf-box-ttl">Shortcode Generator</div>
								<div class="wpls-sf-tag">Pro</div>
							</div>
							<div class="wpls-sf-fp-box wpls-sf-pro-box">
								<i class="dashicons dashicons-move"></i>
								<div class="wpls-sf-box-ttl">Drag & Drop Slide Order Change</div>
								<div class="wpls-sf-tag">Pro</div>
							</div>
							<div class="wpls-sf-fp-box wpls-sf-pro-box">
								<i class="dashicons dashicons-remove"></i>
								<div class="wpls-sf-box-ttl">Exclude Logos and Exclude Some Categories</div>
								<div class="wpls-sf-tag">Pro</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End - Welcome Box -->
			
			<!-- Start - Logo Showcase - Features -->
			<div class="wpls-features-section">
				<div class="wpls-center wpls-features-ttl">
					<h2 class="wpls-sf-ttl">Powerful Pro Features, Simplified</h2>
				
				</div>
				<div class="wpls-features-section-inr">
					<div class="wpls-features-box-wrap">
						<ul class="wpls-features-box-grid">
							<li>
							<div class="wpls-popup-icon"><img src="<?php echo WPLS_URL; ?>/assets/images/popup-icon/grid.png" /></div>
							Logo Grid View							
							</li>
							<li>
							<div class="wpls-popup-icon"><img src="<?php echo WPLS_URL; ?>/assets/images/popup-icon/slider-carousel.png" /></div>
							Logo Slider View</li>
							<li>
							<div class="wpls-popup-icon"><img src="<?php echo WPLS_URL; ?>/assets/images/popup-icon/center-mode.png" /></div>
							Logo Slider Center Mode</li>
							<li>
							<div class="wpls-popup-icon"><img src="<?php echo WPLS_URL; ?>/assets/images/popup-icon/filter.png" /></div>
							Logo Filter View</li>
							<li>
							<div class="wpls-popup-icon"><img src="<?php echo WPLS_URL; ?>/assets/images/popup-icon/slider-carousel.png" /></div>
							Logo Ticker View</li>
							<li>
							<div class="wpls-popup-icon"><img src="<?php echo WPLS_URL; ?>/assets/images/popup-icon/list.png" /></div>
							Logo List View</li>
							
						</ul>
					</div>
					<a href="<?php echo WPLS_PLUGIN_LINK_WELCOME; ?>" target="_blank" class="wpls-sf-btn wpls-sf-btn-orange"><span class="dashicons dashicons-cart"></span> Grab Now Pro Features</a>
					<div class="wpls-rc-wrap">
						<div class="wpls-rc-inr">
							<div class="wpls-rc-icon">
								<img src="<?php echo esc_url( WPLS_URL ); ?>assets/images/popup-icon/14-days-money-back-guarantee.png" alt="14-days-money-back-guarantee" title="14-days-money-back-guarantee" />
							</div>
							<div class="wpls-rc-cont">
								<h3>14 Days Refund Policy</h3>
								<p>14-day No Question Asked Refund Guarantee</p>
							</div>
						</div>
						<div class="wpls-rc-inr">
							<div class="wpls-rc-icon">
								<img src="<?php echo esc_url( WPLS_URL ); ?>assets/images/popup-icon/popup-design.png" alt="popup-design" title="popup-design" />
							</div>
								<div class="wpls-rc-cont">
									<h3>Free Done-For-You Logo Showcase Setup</h3>
									<p>Our  experts team will design 1 free logo showcase  for you as per your need.</p>
								</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End - Logo Showcase - Features -->

			

			<!-- Start - Testimonial Section -->
			<div class="wpls-sf-testimonial-wrap">
				<div class="wpls-center wpls-features-ttl">
					<h2 class="wpls-sf-ttl">Looking for a Reason to Use Logo Showcase? Here are 40+...</h2>				
										
				</div>
				<div class="wpls-testimonial-section-inr">
					<div class="wpls-testimonial-box-wrap">
						<div class="wpls-testimonial-box-grid">
								<h3 class="wpls-testimonial-title">The best plugin I could find!</h3>
								<div class="wpls-testimonial-desc">I really enjoy the plugin. I tried more than 10 implementations, but this one is the best I could find. It can do more than what you initially see “on the surface”. The team should work a bit more on their presentation page and document it a bit better. For example default shortcode variables. Overall, very good plugin!</div>
								<div class="wpls-testimonial-clnt">@kashannadeem</div>
								<div class="wpls-testimonial-rating"><img src="<?php echo WPLS_URL; ?>/assets/images/rating.png" /></div>
						</div>
						<div class="wpls-testimonial-box-grid">
								<h3 class="wpls-testimonial-title">Годный плагин</h3>
								<div class="wpls-testimonial-desc">Достаточно фич в бесплатной версии. Конфликтов не обнаружено. Порог входа для нуба высоковат, но туториал помогаэ. Вобщем, можно юзать со всей силы :).</div>
								<div class="wpls-testimonial-clnt">@yurazz</div>
								<div class="wpls-testimonial-rating"><img src="<?php echo WPLS_URL; ?>/assets/images/rating.png" /></div>
						</div>
						<div class="wpls-testimonial-box-grid">
								<h3 class="wpls-testimonial-title">Doesn’t work</h3>
								<div class="wpls-testimonial-desc">Plugin works great! Thanks to the help of support I was able to make a edit to my CSS. Thank you!.</div>
								<div class="wpls-testimonial-clnt">@bijoufashion</div>
								<div class="wpls-testimonial-rating"><img src="<?php echo WPLS_URL; ?>/assets/images/rating.png" /></div>
						</div>
						
						<div class="wpls-testimonial-box-grid">
								<h3 class="wpls-testimonial-title">Great plugin</h3>
								<div class="wpls-testimonial-desc">Simple, intuitive and functional plugin. The customer care service is competent and punctual in the answers.</div>
								<div class="wpls-testimonial-clnt">@arsoftware2018</div>
								<div class="wpls-testimonial-rating"><img src="<?php echo WPLS_URL; ?>/assets/images/rating.png" /></div>
						</div>
						<div class="wpls-testimonial-box-grid">
								<h3 class="wpls-testimonial-title">Quick en Great Support</h3>
								<div class="wpls-testimonial-desc">Needed a little help with some settings for a logo showcase. They helped me out very quickly and friendly. Thanks for helping me out!</div>
								<div class="wpls-testimonial-clnt">@complementreclame</div>
								<div class="wpls-testimonial-rating"><img src="<?php echo WPLS_URL; ?>/assets/images/rating.png" /></div>
						</div>
						<div class="wpls-testimonial-box-grid">
								<h3 class="wpls-testimonial-title">Very Good Plug In!</h3>
								<div class="wpls-testimonial-desc">The Plug In works brilliantly, if you do get stuck somewhere the Support is quick to respond and very helpful.Definetly 5 Stars!</div>
								<div class="wpls-testimonial-clnt">@neubuerg</div>
								<div class="wpls-testimonial-rating"><img src="<?php echo WPLS_URL; ?>/assets/images/rating.png" /></div>
						</div>
					</div>
					<a href="https://wordpress.org/support/plugin/wp-logo-showcase-responsive-slider-slider/reviews/?filter=5" target="_blank" class="wpls-sf-btn"><span class="dashicons dashicons-star-filled"></span> View All Reviews</a> OR <a href="<?php echo WPLS_PLUGIN_LINK_WELCOME; ?>"  target="_blank" class="wpls-sf-btn wpls-sf-btn-orange">Grab Now Pro Features</a>
					<div class="wpls-rc-wrap">
						<div class="wpls-rc-inr">
							<div class="wpls-rc-icon">
								<img src="<?php echo esc_url( WPLS_URL ); ?>assets/images/popup-icon/14-days-money-back-guarantee.png" alt="14-days-money-back-guarantee" title="14-days-money-back-guarantee" />
							</div>
							<div class="wpls-rc-cont">
								<h3>14 Days Refund Policy</h3>
								<p>14-day No Question Asked Refund Guarantee</p>
							</div>
						</div>
						<div class="wpls-rc-inr">
							<div class="wpls-rc-icon">
								<img src="<?php echo esc_url( WPLS_URL ); ?>assets/images/popup-icon/popup-design.png" alt="popup-design" title="popup-design" />
							</div>
								<div class="wpls-rc-cont">
									<h3>Free Done-For-You Logo Showcase Setup</h3>
									<p>Our  experts team will design 1 free logo showcase  for you as per your need.</p>
								</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End - Testimonial Section -->
		</div>
	</div><!-- end .wpls-sf-wrap -->
</div><!-- end .wrap -->