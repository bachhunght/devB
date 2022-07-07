<?php
/**
 * Login Form
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>


<div class="row">
	<div class="medium-10 medium-centered large-6 large-centered columns">
		
		<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

		<div class="login-register-container">
				
			<div class="row">
				
				<div class="medium-4 columns">
					<div class="account-img-container">
						
						<?php
						
						$my_account_image = "";
						if ( GBT_MT_Opt::getOption( 'my_account_image' ) != "" ) :
							
							if (is_ssl()) {
								$my_account_image = str_replace("http://", "https://", GBT_MT_Opt::getOption( 'my_account_image' ) );		
							} else {
								$my_account_image = GBT_MT_Opt::getOption( 'my_account_image' );
							}
						
						?>
                       
                        <img id="login-img" alt="My account" width="164" src="<?php echo esc_url($my_account_image); ?>">
						
						<?php else : ?>
                        
                        <img id="login-img" alt="My account" width="164" height="209" src="<?php echo get_template_directory_uri() . '/images/my_account.png'; ?>" data-interchange="[<?php echo get_template_directory_uri() . '/images/my_account.png'; ?>, (default)], [<?php echo get_template_directory_uri() . '/images/my_account_retina.png'; ?>, (retina)]">
						
						<?php endif; ?>
                        
                    </div>
				</div>
			
				<div class="medium-8 columns">
					<div class="account-forms-container">
						<ul class="account-tab-list">
							
							<li class="account-tab-item"><a class="account-tab-link current" href="#login" name="login"><?php esc_html_e( 'Login', 'woocommerce' ); ?></a></li>
							
							<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>
								<li class="account-tab-item last"><a class="account-tab-link" href="#register" name="register"><?php esc_html_e( 'Register', 'woocommerce' ); ?></a></li>
							<?php endif; ?>
						
						</ul>
						
						<div class="account-forms">
							<form id="login" method="post" class="login-form woocommerce-form woocommerce-form-login login">
					
								<?php do_action( 'woocommerce_login_form_start' ); ?>

								<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
									<label for="username"><?php esc_html_e( 'Username or email address', 'woocommerce' ); ?> <span class="required">*</span></label>
									<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
								</p>
								<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
									<label for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
									<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" />
								</p>

								<?php do_action( 'woocommerce_login_form' ); ?>

								<p class="form-row">
									<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
									<label for="rememberme" class="inline rememberme">
										<input class="woocommerce-Input woocommerce-Input--checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php esc_html_e( 'Remember me', 'woocommerce' ); ?>
									</label>
									<button type="submit" class="woocommerce-Button button" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>"><?php esc_html_e( 'Login', 'woocommerce' ); ?></button>
									
								</p>
								<p class="woocommerce-LostPassword lost_password">
									<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
								</p>

								<?php do_action( 'woocommerce_login_form_end' ); ?>
					
							</form>
							
						<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>
								
							<form id="register" method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >
					
								<?php do_action( 'woocommerce_register_form_start' ); ?>

							<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

								<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
									<label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?> <span class="required">*</span></label>
									<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
								</p>

							<?php endif; ?>

							<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
								<label for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
								<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" value="<?php if ( ! empty( $_POST['email'] ) ) echo esc_attr( $_POST['email'] ); ?>" />
							</p>

							<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

								<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
									<label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
									<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" />
								</p>

							<?php else : ?>

								<p><?php esc_html_e( 'A password will be sent to your email address.', 'woocommerce' ); ?></p>

							<?php endif; ?>

							<!-- Spam Trap -->
							<div style="<?php echo ( ( is_rtl() ) ? 'right' : 'left' ); ?>: -999em; position: absolute;"><label for="trap"><?php esc_html_e( 'Anti-spam', 'woocommerce' ); ?></label><input type="text" name="email_2" id="trap" tabindex="-1" /></div>

							<?php do_action( 'woocommerce_register_form' ); ?>
							<?php do_action( 'register_form' ); ?>

							<p class="woocomerce-FormRow form-row">
								<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
								<button type="submit" class="woocommerce-Button button" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
							</p>

							<?php do_action( 'woocommerce_register_form_end' ); ?>
					
							</form>					
								
						<?php endif; ?>
                        	
						</div><!-- .account-forms-->
					</div><!-- .account-forms-container-->
				</div><!-- .medium-8-->
			</div><!-- .row-->
		</div><!-- .login-register-container-->
		
		<?php do_action( 'woocommerce_after_customer_login_form' ); ?>

	</div><!-- .large-6-->
</div><!-- .rows-->
